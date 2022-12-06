<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\Allergen;
use App\Models\AllergenMeal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryMeal extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'ingrediants',
        'vegetarian',
        'gluten_free',
        'spicy',
        'menu_id',
        'allergens',
        'image_path',
        'is_on_home_page'
    ];
    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    public function allergens() {
        return $this->belongsToMany(Allergen::class);
    }
}
