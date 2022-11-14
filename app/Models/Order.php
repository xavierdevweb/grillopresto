<?php

namespace App\Models;

use App\Models\Portion;
use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{

    protected $fillable = [
        'user_id',
        'prenom',
        'nom',
        'rue',
        'no_porte',
        'appartement',
        'code_postal',
        'ville',
        'telephone',
        'email',
        'menu_id',
        'prix',
        'order_number',
        'is_guest',
        'order_status_id',
        'portion_id',
        'meals'
    ];
    use HasFactory;


    public function order_status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function portion()
    {
        return $this->belongsTo(Portion::class);
    }
}
