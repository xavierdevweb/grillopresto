<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portion extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
