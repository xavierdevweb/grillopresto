<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];


    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function get_status($status)
    {
        return $this->getAllOrderStatus($status);
    }

    public function get_status_completed()
    {
        return $this->getAllOrderStatus('Completé');
    }

    public function get_status_waiting()
    {
        return $this->getAllOrderStatus('En attente');
    }

    public function get_status_cancelled()
    {
        return $this->getAllOrderStatus('Annulé');
    }

    public function get_status_error()
    {
        return $this->getAllOrderStatus('Erreur');
    }

    public function getAllOrderStatus($role)
    {
        $orderStatus = $this->all();
        foreach ($orderStatus as $status) {
            if ($role == $status->status) {
                return $status->id;
            } elseif ($role == $status->status) {
                return $status->id;
            } elseif ($role == $status->status) {
                return $status->id;
            } elseif ($role == $status->status) {
                return $status->id;
            }
        }
    }
}
