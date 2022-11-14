<?php

namespace App\Http\Controllers\Admin\gestionOrder;

use App\Models\User;
use App\Models\Order;
use App\Models\HistoryMeal;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GestionOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gestionOrder.order-search');
    }

    public function showAllOrders()
    {
        $orders = Order::with('order_status')->whereRelation('order_status', 'status', '=', 'En attente')->orderBy('created_at', "desc")->paginate(8);
        $orderStatus = OrderStatus::where('id', '>', '0')->get();
        return view('admin.gestionOrder.order-index', ['ordersArray' => $orders, 'orderStatus' => $orderStatus]);
    }

    public function showUserForSpecificOrder($id)
    {
        $user = User::with('infoUser')->find($id);
        return view('admin.gestionOrder.order-user-show', ['user' => $user]);
    }

    public function showOrderForSpecificUser(Request $request)
    {

        if (!(empty($request->email)) && !(empty($request->tel)))
            $order = Order::with('order_status')->where([['email', $request->email], ['telephone', $request->tel]])->orderBy('created_at', 'desc')->paginate(8);
        elseif (!(empty($request->order_number)))
            $order = Order::with('order_status')->where('order_number', $request->order_number)->orderBy('created_at', 'desc')->paginate(8);
        elseif (!(empty($request->tel)))
            $order = Order::with('order_status')->where('telephone', $request->tel)->orderBy('created_at', 'desc')->paginate(8);
        elseif (!(empty($request->email)))
            $order = Order::with('order_status')->where('email', $request->email)->orderBy('created_at', 'desc')->paginate(8);
        $orderStatus = OrderStatus::where('id', '>', '0')->get();


        if (!isset($order[0]))
            return back()->with('noOrderFound', "Aucune commande trouvé, veuillez réessayer");
        else
            return view('admin.gestionOrder.order-show', ['ordersArray' => $order, 'orderStatus' => $orderStatus]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $idOrder = [];
        $status = [];
        foreach ($request->status as $key => $value) {
            $idExp = explode('-', $value);
            array_push($idOrder, $idExp[0]);
            array_push($status, $idExp[1]);
        }

        $orders = Order::whereIn('id', $idOrder)->get();
        $orderStatusTemplate = new OrderStatus();

        try {
            for ($i = 0; $i < count($orders); $i++) {
                switch ($status[$i]) {
                    case 'En attente':
                        $orders[$i]->order_status_id = $orderStatusTemplate->get_status_waiting();
                        $orders[$i]->save();
                        break;
                    case 'Completé':
                        $orders[$i]->order_status_id = $orderStatusTemplate->get_status_completed();
                        $orders[$i]->save();
                        break;
                    case 'Annulé':
                        $orders[$i]->order_status_id = $orderStatusTemplate->get_status_cancelled();
                        $orders[$i]->save();
                        break;
                    case 'Erreur':
                        $orders[$i]->order_status_id = $orderStatusTemplate->get_status_error();
                        $orders[$i]->save();
                        break;
                };
            }
        } catch (\Exception $e) {
            return back()->with('errorUpdate', "Un erreur s'est produite lors du changement");
        }
        return back()->with('successResponse', "Les commandes sont complétées");
    }


    public function show(Order $order)
    {

        $meals = HistoryMeal::with('allergens')->whereIn('id', explode(",", str_replace(['[', ']'], '', $order->meals)))->get();

        foreach ($meals as $meal) {
            $meal->ingredients = (explode(",", str_replace(['[', ']', '"', '"'], '', $meal->ingredients)));
        }

        return view('admin.gestionOrder.order-unique-show', ['meals' => $meals, 'order' => $order]);
    }
}
