<?php

namespace App\Http\Controllers\Admin\gestionMenu;

use App\Models\HistoryMeal;
use App\Models\Meal;
use App\Models\Menu;
use App\Models\MenuType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuAdminController extends Controller
{
    public function create()
    {
        $menuType = MenuType::all();
        $meals = Meal::all();

        return view('admin.gestionMenu.menu_add', ['menuType' => $menuType, 'meals' => $meals]);
    }

    public function store(Request $request)
    {

        if (!Menu::where('start_date', $request['start_date'])->with('menu_type')->whereRelation('menu_type', ['type' => $request['menu_type']])->exists()) {
            $menu = new Menu();

            $menu->menu_type_id = MenuType::where('type', $request['menu_type'])->get('id')[0]->id;
            $menu->start_date = $request['start_date'];
            $endDate = date('Y-m-d', strtotime("+7 day", strtotime($request['start_date'])));
            $menu->end_date = $endDate;
            $menu->save();

            $mealId = [];
            foreach ($request->all() as $key => $value) {
                if (explode('-', $key)[0] == 'meal') {
                    $idExp = explode('-', $key);
                    $id = $idExp[count($idExp) - 1];
                    array_push($mealId, $id);
                }
            }

            $meals = Meal::with('allergens')->find($mealId);
            foreach ($meals as $key => $meal) {
                $hMeal = new HistoryMeal();

                $hMeal->name = $meal->name;
                $hMeal->ingredients = $meal->ingredients;
                $hMeal->description = $meal->description;
                $hMeal->vegetarian = $meal->vegetarian;
                $hMeal->gluten_free = $meal->gluten_free;
                $hMeal->menu_id = Menu::where('start_date', $request['start_date'])->with('menu_type')->whereRelation('menu_type', ['type' => $request['menu_type']])->first('id')->id;
                $hMeal->image_path = $meal->image_path;
                $hMeal->save();
                $hMeal->allergens()->sync($meal->allergens);
            }

            return back()->with('success', 'Ajout du menu avec succès.');
        } else {
            return back()->with('menuAlreadyExists', 'Ce menu existe déjà, veuillez aller dans la section "modifier" pour lui apporter des changements.');
        }
    }


    public function research()
    {
        
        return view('admin.gestionMenu.menu_search', $this->getDateOfMenu());
    }
 
    public function search(Request $request) {
        $menus = Menu::whereMonth('start_date', $request['month'])->whereYear('start_date', $request['year'])->with('menu_type')->get();
        $dateMenu = $this->getDateOfMenu();
        return view('admin.gestionMenu.menu_search', ['menus' => $menus, 'years' => $dateMenu['years'], 'months' => $dateMenu['months']]);

    }

    private function getDateOfMenu() {
        $dates = Menu::orderBy('start_date', 'DESC')->get('start_date')->pluck('start_date');

        $years = [];
        foreach ($dates as $date) {
            if (!in_array(date('Y', strtotime($date)), $years))
                array_push($years, date('Y', strtotime($date)));
        }

        $months = [[], []];
        $monthFrench = [
            'Janvier',
            'Février',
            'Mars',
            'Avril',
            'Mai',
            'Juin',
            'Juillet',
            'Aout',
            'Septembre',
            'Octobre',
            'Novembre',
            'Décembre'
        ];

        foreach ($dates as $date) {
            if (!in_array(date('m', strtotime($date)), $months[1])) {
                array_push($months[0], $monthFrench[date('m', strtotime($date)) - 1]);
                array_push($months[1], date('m', strtotime($date)));
            }
        }

        return ['months' => $months, 'years' => $years];
    }

    public function edit($id) {
        $menu = Menu::with('history_meals')->with('menu_type')->find($id);

        $menuMealName = [];
        foreach ($menu->history_meals as $value) {
            array_push($menuMealName, $value->name);
        }

        $mealId = Meal::whereIn('name', $menuMealName)->get()->pluck('id', 'name');

        $meals = [];
        if($menu->menu_type->type == 'Classique') {
            $meals = Meal::all();
        }
        else if($menu->menu_type->type == 'Végétarien') {
            $meals = Meal::where('vegetarian', true)->get();
        }
        else if($menu->menu_type->type == 'Sans Gluten') {
            $meals = Meal::where('gluten_free', true)->get();
        }

        return view('admin.gestionMenu.menu_edit', ['menu' => $menu, 'meals' => $meals, 'mealId' => $mealId]);
    }

    public function destroy($id) {
        $responseMeals = HistoryMeal::with('menu')->whereRelation('menu', 'id', $id)->delete();
        if($responseMeals) {
            $responseMenu = Menu::find($id)->delete();
            if($responseMenu) {
                return redirect()->route('admin.menu.research')->with('success', 'La suppression s\'est passé comme prévu.');
            }
        }
        return redirect()->route('admin.menu.research')->with('error', 'La suppression ne s\'est pas passé comme prévu.');

    }

    public function update(Request $request, $id) {

        HistoryMeal::with('menu')->whereRelation('menu', 'id', $id)->delete();

        $mealId = [];
        foreach ($request->all() as $key => $value) {
            if (explode('-', $key)[0] == 'meal') {
                $idExp = explode('-', $key);
                $idMeal = $idExp[count($idExp) - 1];
                array_push($mealId, $idMeal);
            }
        }
        

        if(HistoryMeal::with('menu')->whereRelation('menu', 'id', $id)->first() == null) {
            $meals = Meal::find($mealId);
            foreach ($meals as $key => $meal) {
                $hMeal = new HistoryMeal();
    
                $hMeal->name = $meal->name;
                $hMeal->ingredients = $meal->ingredients;
                $hMeal->description = $meal->description;
                $hMeal->vegetarian = $meal->vegetarian;
                $hMeal->gluten_free = $meal->gluten_free;
                $hMeal->menu_id = $id;
                $hMeal->image_path = $meal->image_path;
                $hMeal->save();
            }
        }
        

        return back()->with('success', 'Modification du menu avec succès.');
      
    }

}
