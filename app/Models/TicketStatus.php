<?php

namespace App\Models;

use App\Models\Ticket;

use App\Trait\TicketStatusAvailable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketStatus extends Model
{
    use TicketStatusAvailable;
    
    protected $fillable = [
        'status'
    ];


    use HasFactory;

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
