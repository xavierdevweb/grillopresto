<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Menu;
use App\Models\MenuType;
use App\Models\HistoryMeal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $meals = HistoryMeal::with('menu.menu_type')->whereRelation('menu', [['start_date', '<=', date('Y-m-d')], ['end_date', '>=', date('Y-m-d')]])->inRandomOrder()->take(4)->get();

        return view('./public/home', ['meals' => $meals]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function platSelectionne()
    {
        /*  $plats = Repas::where('selectionne', true)->get();

      return view('public.plat', ['plat sélectionné' => $plats]); */
        return view('public.plat');
    }

}
