<?php

namespace App\Trait;

use App\Models\Role;


trait TicketStatusAvailable
{
    // private $TICKET_TYPE;
    // private $TICKET_STATUS_OUVERT;
    // private $TICKET_STATUS_CLOSE;
    // private $TICKET_STATUS_EXPIRED;
    // private $TICKET_STATUS_NOT_RESOLVED;

    public function get_status($status)
    {
        return $this->getAllTicketstatus($status);
    }

    public function get_opened_status()
    {
        return $this->getAllTicketstatus('Ouvert');
    }

    public function get_closed_status()
    {
        return $this->getAllTicketstatus('Fermé');
    }

    public function get_expired_status()
    {
        return $this->getAllTicketstatus('Expiré');
    }

    public function get_not_resolved_status()
    {
        return $this->getAllTicketstatus('Non-résolu');
    }



    public function getAllTicketstatus($type = null)
    {
        $tickets = $this->all();
        foreach ($tickets as $status) {
            if ($type == $status->status) {
                return $status->id;
            } elseif ($type == $status->status) {
                return $status->id;
            } elseif ($type == $status->status) {
                return $status->id;
            } elseif ($type == $status->status) {
                return $status->id;
            }
        }
    }
}
