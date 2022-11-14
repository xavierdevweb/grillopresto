<?php

namespace App\Http\Controllers\Admin\gestionRepas;

use App\Http\Requests\MealRequest;
use App\Models\Meal;
use App\Models\Allergen;
use Illuminate\Http\Request;
use App\Trait\UserStateManager;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RepasAdminController extends Controller
{
    use UserStateManager;


    public function showAll($type = 'classique') {
        
        if($type == 'classique') {
            $meals = Meal::paginate(16);
        }
        elseif($type == 'vegetarien') {
            $meals = Meal::where('vegetarian', true)->paginate(8);
        }
        elseif($type == 'sans_gluten') {
            $meals = Meal::where('gluten_free', true)->paginate(8);
        }

        return view('admin.gestionMeal.showAll', ['meals' => $meals, 'type' => $type]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::all();
        return view('admin.gestionMeal.index', ['meals' => $meals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allergens = Allergen::all();
        return view('admin.gestionMeal.create', ['allergens' => $allergens]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MealRequest $request)
    {

        $request->validated();

        $allergens = [];
        foreach ($request->all() as $key => $value) {
            if (explode('-', $key)[0] == 'allergen') {
                $idExp = explode('-', $key);
                $idAllergen = $idExp[count($idExp) - 1];
                array_push($allergens, $idAllergen);
            }
        }


        $meal = new Meal();

        $meal->name = $request->name;
        $meal->ingredients = json_encode($request->ingredient);
        $meal->description = $request->description;
        $meal->vegetarian = ($request->vegetarian == 'on' ? true : false);
        $meal->gluten_free = ($request->gluten_free == 'on' ? true : false);
        $meal->image_path = $request->file('image')->store('image', 'public');
        $meal->save();
        $meal->allergens()->attach($allergens);

        return redirect()->route('admin.repas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        if($request->meal == null) {
            return back();
        }
        
        $meal = Meal::with('allergens')->find($request->meal);
        $meal->ingredients = json_decode($meal->ingredients);
        $meal->allergens = json_decode($meal->allergens);

        return view('admin.gestionMeal.show', ['meal' => $meal]);
    }

    public function showGet($id)
    {

        if($id == null) {
            return back();
        }
        
        $meal = Meal::with('allergens')->find($id);
        $meal->ingredients = json_decode($meal->ingredients);
        $meal->allergens = json_decode($meal->allergens);

        return view('admin.gestionMeal.show', ['meal' => $meal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $response = Meal::find($id)->delete();

        if($response) 
            return redirect()->route('admin.repas.index')->with('deleteSuccess', 'La suppression s\'est passé comem prévu.');
    }

}
