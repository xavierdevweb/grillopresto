<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'response',
        'user_id',
        'ticket_id'
    ];


    public function scopeGetAllMessagesFromATicket($query, $id)
    {
        return (object) $query->with('user', 'user.infoUser', 'ticket', 'ticket.ticket_status')->where('ticket_id', (int) $id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
