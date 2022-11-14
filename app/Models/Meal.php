<?php

namespace App\Models;

use App\Models\Ingrediant;
use App\Models\HistoryMeal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meal extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'ingrediants',
        'vegetarian',
        'gluten_free',
        'spicy',
        'menu_id',
        'image_path'
    ];




    protected static function createMealFromJson($meals)
    {
        $mealsArr = [];
        foreach ($meals as $meal) {
            $newMeal = new Meal();
            $newMeal->name = $meal['name'];
            $newMeal->ingredients = $meal['ingrediants'];
            $newMeal->description = $meal['description'];
            $newMeal->vegetarian = $meal['vegetarian'];
            $newMeal->gluten_free = $meal['gluten_free'];
            $newMeal->spicy = $meal['spicy'];
            $newMeal->allergens = $meal['allergens'];
            $newMeal->image_path = $meal['image_path'];
            array_push($mealsArr, $newMeal);
        }
        
        return $mealsArr;
    }

    public function allergens() {
        return $this->belongsToMany(Allergen::class);
    }
}
