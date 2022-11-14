<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\User;
use App\Models\Order;
use App\Models\ChartPrice;
use App\Models\Creditcard;
use App\Models\HistoryMeal;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreditCardRequest;
use App\Http\Controllers\OrderController;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {

        if (Auth::check()) {
            $allCardsForLoggedUser = Creditcard::where('user_id', Auth::user()->id)->get('card_number');
        } else
            $allCardsForLoggedUser = 0;
        return view('public.template.stripe', ['cc' => $allCardsForLoggedUser]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(CreditCardRequest $request)
    {

        // ******************************************************
        // TO BE ADDED, DB TRANSACTION , TRY CATCH, ROLLBACK
        // PESSIMISTIC LOCKING
        // CHANGE THE WAY THE CARD IS UPDATED/ADDED
        // ENCRYPT THE CREDIT CARD INFO AND REMOVE THE STORE FOR CVC
        // ******************************************************

        
        if (session()->exists('cart') && count(session()->all('cart')) > 0) {
            // FAIRE UN CUSTOM REQUEST WORKING NOW ITS NOT
            $validatedData = $request->validated();


            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripe = new \Stripe\StripeClient(
                'sk_test_51LiLVXLQyEBjABClty9cNuhsOxMMyxAOdg2fAM9SXjI2nwMarcOuVtILIuzEe89E9iF5PmSpwwKhcTZ7N63v2A9800IGFHhOAb'
            );

            if (Auth::check()) {
                $user = User::getLoggedUserInfo()->first();
                
                // If the existing user have an StipeToken , it means it already exist
                // Then we connect that token to the actual stripe transaction (Stripe server side)
                if ($user->stripeToken > 1) {
                    //Update the default creditcard for the logged user
                    $stripe->customers->update($user->stripeToken, ['source' => $request->stripeToken]);
                    // Create a new transaction for the logged user
                    $transaction = Stripe\Charge::create([
                        "amount" => ChartPrice::where('portion_id', $request->portion)->where('menu_type_id', HistoryMeal::where('id', session('cart')[0])->with('menu')->first()->menu->menu_type_id)->first('price')->price * count(session('cart')) * 100,
                        "currency" => "CAD",
                        "customer" => $user->stripeToken,
                        "description" => "Paiement Gill-O-Presto"
                    ]);
                    // Insert the credit card in the Database for the related user for the first transaction evermade for the user
                    $cc = Creditcard::verifyIfUserUsingExistingCard($request)->get('card_number');
                    if (!isset($cc[0])) {
                        Creditcard::newCardFill($request);
                    }
                }


                // iF LOGGED USER DONT HAVE A STRIPE ACCOUNT
                else {
                    // Create new client for Stripe for the ACTIVE LOGGED USER IN GRILL-O-PRESTO
                    $newClientLogged =  $stripe->customers->create([
                        'description' => "Client email: $user->email, Form email: $request->email",
                        'name' => $user->prenom . " " . $user->nom,
                        'email' => $user->email
                    ]);
                    //Update the default creditcard for the logged user

                    $stripe->customers->update($newClientLogged->id, ['source' => $request->stripeToken]);



                    // Create a new transaction for the logged user
                    $transaction = Stripe\Charge::create([
                        "amount" => ChartPrice::where('portion_id', $request->portion)->where('menu_type_id', HistoryMeal::where('id', session('cart')[0])->with('menu')->first()->menu->menu_type_id)->first('price')->price * count(session('cart')) * 100,
                        "currency" => "CAD",
                        "customer" => $newClientLogged->id,
                        "description" => "Paiement Gill-O-Presto"
                    ]);
                    $user->stripeToken = $newClientLogged->id;
                    $user->save();
                    // Insert the credit card in the Database for the related user

                    $cc = Creditcard::verifyIfUserUsingExistingCard($request)->get('card_number');
                    if (!isset($cc[0])) {
                        Creditcard::newCardFill($request);
                    }
                }
            }




            // IF ITS A GUEST CHECKOUT
            else {
                $fullName = $request->prenom . ' ' . $request->nom;
                // Create new guest user profile
                $newClient =  $stripe->customers->create([
                    'description' => "Form email: $request->email",
                    'name' => $fullName,
                    'email' => $request->email
                ]);

                // Create new credit card for guest user profile in stripe
                $stripe->customers->createSource(
                    $newClient->id,
                    ['source' => $request->stripeToken]
                );

                // Create new transaction for guest user
                $transaction = Stripe\Charge::create([
                    "amount" => ChartPrice::where('portion_id', $request->portion)->where('menu_type_id', HistoryMeal::where('id', session('cart')[0])->with('menu')->first()->menu->menu_type_id)->first('price')->price * count(session('cart')) * 100,
                    "currency" => "CAD",
                    "customer" => $newClient->id,
                    "description" => "Paiement Gill-O-Presto"
                ]);
            }

            if ($transaction->status === "succeeded") {

                $order = new Order;
                if (Auth::check()) {
                    $order->user_id = Auth::user()->id;
                } else {
                    $order->user_id = NULL;
                }

                $order->prenom = $request->prenom;
                $order->nom = $request->nom;
                $order->rue = $request->rue;
                $order->no_porte = $request->noPorte;
                $order->appartement = $request->appartement;
                $order->code_postal = $request->zip_code;
                $order->ville = $request->ville;
                $order->telephone = $request->tel;
                $order->email = $request->email;
                $order->menu_id = HistoryMeal::where('id', session('cart')[0])->first('menu_id')->menu_id;
                $order->price = ChartPrice::where('portion_id', $request->portion)->where('menu_type_id', HistoryMeal::where('id', session('cart')[0])->with('menu')->first()->menu->menu_type_id)->first('price')->price * count(session('cart'));
                $order->order_number = strtoupper(substr($transaction->id, 3));
                $order->order_status_id = OrderStatus::where('status', 'En attente')->first('id')->id;
                $order->portion_id = $request->portion;
                $order->meals = json_encode(session('cart'));

                $order->save();

                session()->forget('cart');
                session()->forget('menu');

                if (Auth::check()) {
                    return to_route('user.orders.index', Auth::user()->id)->with('paymentSuccess', "Merci, Votre paiement est passée");
                } else
                    return back()->with('paymentSuccess', "Merci, Votre paiement est passée");
            } else {
                return back()->with('paymentFailed', "Erreur lors du paiement");
            }
        }
        else {
            return back()->with('paymentFailed', "Vous n'avez aucun repas dans votre panier.");
        }
    }
}
