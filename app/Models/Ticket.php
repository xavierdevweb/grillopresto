<?php

namespace App\Models;

use App\Models\User;
use App\Models\TicketType;
use App\Models\TicketStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'ticket_type_id',
        'ticket_status_id',
        'description',
        'user_id',
        'email'
    ];


    public function scopeGetAllTicketInfosAndRelations($query, $authUserId)
    {
        return (object) $query->with((array)'ticket_type', (array)'ticket_status')->where('user_id', (int) $authUserId);
    }

    public function scopeGetAllTicketInfosAndRelationsForAdmin($query)
    {
        return (object) $query->with((array)'ticket_type', (array)'ticket_status')->whereRelation('ticket_status', 'status', '=', 'Ouvert');
    }

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }

    public function ticket_type()
    {
        return $this->belongsTo(TicketType::class);
    }


    public function ticket_status()
    {
        return $this->belongsTo(TicketStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
