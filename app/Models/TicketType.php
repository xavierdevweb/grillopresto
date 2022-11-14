<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketType extends Model
{

    protected $fillable = [
        'type'
    ];

    use HasFactory;

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
