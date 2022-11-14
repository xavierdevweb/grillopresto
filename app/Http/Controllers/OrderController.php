<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HistoryMeal;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authUserId = (object) User::GetLoggedUserInfo()->get('id');

        $allOrdersForLoggedUser = (object) Order::with('portion')->where('user_id', $authUserId[0]->id)->orderBy('created_at', "desc")->get();

        return (object) view('user.user-orders', ['ordersArray' => $allOrdersForLoggedUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    static function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    // $orderArray = [];

    // for ($i = 0; $i < count($meals); $i++) {
    //     $meals[$i]['date'] = (string) date('d-m-Y', strtotime($meals[$i]->created_at));

    //     $mealsObject =  Meal::createMealFromJson($meals[$i]);
    //     $meals[$i]->meals = $mealsObject;

    //     array_push($orderArray,  $meals[$i]);
    // }
    public function show(Order $order)
    {

        $meals = HistoryMeal::with('allergens')->whereIn('id', explode(",", str_replace(['[', ']'], '', $order->meals)))->get();

        foreach($meals as $meal){
            $meal->ingredients = (explode(",", str_replace(['[', ']', '"','"'], '', $meal->ingredients)));      
        }

        return view('user.user-orders-show', ['meals' => $meals, 'order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
