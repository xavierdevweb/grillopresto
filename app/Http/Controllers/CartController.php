<?php

namespace App\Http\Controllers;

use App\Models\HistoryMeal;
use Illuminate\Http\Request;
use App\Http\Requests\GuestRequest;
use App\Http\Controllers\Controller;
use App\Models\ChartPrice;
use App\Models\Creditcard;
use App\Models\MenuType;
use App\Models\Portion;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index($delete = null)
    {
        if ($delete) {

            $key = array_search($delete, session('cart'));
            session()->forget('cart.' . $key);
        }

        $portions = Portion::all();
        $meals = HistoryMeal::find(session('cart'));
        $priceInfo = [];
        if (session()->exists('menu'))
            $priceInfo = ChartPrice::where('menu_type_id', MenuType::where('type', session('menu'))->first('id')->id)->get();

        if (Auth::check())
            $cc = Creditcard::where('user_id', Auth::user()->id)->get();
        else
            $cc = "";
            
        $this->removeMenuSession();

        return view('public.cart', ['meals' => $meals, 'portions' => $portions, 'priceInfo' => $priceInfo, 'cc' => $cc]);
    }

    private function removeMenuSession()
    {
        if (session()->exists('cart') && count(session('cart')) == 0) {
            session()->forget('menu');
        }
    }
}
