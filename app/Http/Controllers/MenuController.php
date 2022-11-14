<?php

namespace App\Http\Controllers;

use App\Models\HistoryMeal;

class MenuController extends Controller
{

    public function index($menu = 'all')
    {

        $meals = [];

        if ($menu == 'all' || $menu == 'classic')
            $meals += ["classic" => HistoryMeal::with('menu.menu_type')->whereRelation('menu', [['start_date', '<=', date('Y-m-d')], ['end_date', '>=', date('Y-m-d')]])->whereRelation('menu.menu_type', 'type', 'Classique')->get()];

        if ($menu == 'all' || $menu == 'vegetarian')
            $meals += ["vegan" => HistoryMeal::with('menu.menu_type')->whereRelation('menu', [['start_date', '<=', date('Y-m-d')], ['end_date', '>=', date('Y-m-d')]])->whereRelation('menu.menu_type', 'type', 'Végétarien')->get()];

        if ($menu == 'all' || $menu == 'gluten-free')
            $meals += ["gluten_free" => HistoryMeal::with('menu.menu_type')->whereRelation('menu', [['start_date', '<=', date('Y-m-d')], ['end_date', '>=', date('Y-m-d')]])->whereRelation('menu.menu_type', 'type', 'Sans Gluten')->get()];

        $favMeals = HistoryMeal::with('menu.menu_type')->whereRelation('menu', [['start_date', '<=', date('Y-m-d')], ['end_date', '>=', date('Y-m-d')]])->inRandomOrder()->take(4)->get();

        return view('public.menu', ['meals' => $meals, 'favMeals' => $favMeals, 'menu' => $menu]);
    }

    public function single($meal_id, $addCart = false)
    {
        $meal = HistoryMeal::with('menu.menu_type')->with('allergens')->whereRelation('menu', [['start_date', '<=', date('Y-m-d')], ['end_date', '>=', date('Y-m-d')]])->find($meal_id);

        $meal->ingredients = json_decode($meal->ingredients);
        $meal->allergens = json_decode($meal->allergens);

        $this->removeMenuSession();
        $added = false;
        if ($addCart) {
            if (session()->missing('cart') || count(session('cart')) == 0) {
                session()->put('menu', $meal->menu->menu_type->type);
                session()->put('cart', []);
            }

            if (!in_array($meal->id, session('cart')) && count(session('cart')) < 5) {
                session()->push('cart', $meal->id);
                $added = true;
            }
        }
        return view('./public/singleMeal', ['meal' => $meal, 'addCart' => $addCart, 'added' => $added]);
    }

    private function removeMenuSession()
    {
        if (session()->exists('cart') && count(session('cart')) == 0) {
            session()->forget('menu');
        }
    }
}
