<?php

namespace App\Models;

use App\Models\HistoryMeal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    public function history_meals() {
        return $this->hasMany(HistoryMeal::class);
    }

    public function menu_type() {
        return $this->belongsTo(MenuType::class);
    }

}
