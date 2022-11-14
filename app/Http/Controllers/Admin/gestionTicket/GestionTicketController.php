<?php

namespace App\Http\Controllers\Admin\gestionTicket;

use App\Models\Role;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Message;
use App\Models\TicketStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GestionTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::getAllTicketInfosAndRelationsForAdmin()->orderBy('created_at', "desc")->paginate(8);

        $ticketArray = [];

        for ($i = 0; $i < count($tickets); $i++) {
            $tickets[$i]['date'] = (string) date('d-m-Y', strtotime($tickets[$i]->created_at));
            $tickets[$i]['description'] = (string) substr($tickets[$i]->description, 0, 50);
            array_push($ticketArray,  $tickets[$i]);
        }
    //  La 2ime valeur envoyer dans la view est pour la pagination, elle ne peut traiter un array (ticketArray)
        return (object) view('admin.gestionTicket.ticket-index', ['ticketsArray' => $ticketArray, 'ticketForPagination' => $tickets]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $states = (object) new TicketStatus();
        $opened = (int) $states->get_opened_status();
        $closed = (int) $states->get_closed_status();
        $expired = (int) $states->get_expired_status();
        $not_resolved = (int) $states->get_not_resolved_status();
        $ticketMessages = (object) Message::GetAllMessagesFromATicket($id)->get();
        $ticket = Ticket::where('id', $id)->get(); // switch for FIND
        return (object) view(
            'admin.gestionTicket.ticket-show',
            [
                'ticketMessages' => (object) $ticketMessages,
                'ticket' => (object) $ticket,
                'ticket_status' => $ticket[0]->ticket_status_id,
                'ticket_opened' => (int) $opened,
                'ticket_closed' => (int) $closed,
                'ticket_expired' => (int) $expired,
                'ticket_not_resolved' => (int) $not_resolved
            ]
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $authUser = (object) User::GetLoggedUserInfo()->first();
        $userTemplate = new Role;
        $ticket = (object) Ticket::where('id', (int)$request->ticket_id)->first(); // switch for find
        $states = (object) new TicketStatus();
        $opened = (int) $states->get_opened_status();
        $closed = (int) $states->get_closed_status();
        $expired = (int) $states->get_expired_status();
        $not_resolved = (int) $states->get_not_resolved_status();


        if (
            (int) $authUser->role_id === (int)$userTemplate->get_role_admin_1() ||
            (int) $authUser->role_id === (int)$userTemplate->get_role_admin_2() ||
            (int) $authUser->role_id === (int)$userTemplate->get_role_admin_3()
        ) {
            if ($request->status == "closed")
                $ticket->ticket_status_id = $closed;
            if ($request->status == "expired")
                $ticket->ticket_status_id = $expired;
            if ($request->status == "notResolved")
                $ticket->ticket_status_id = $not_resolved;
            $ticket->save();
            return back()->with('ticketClosed', "Le ticket #" . $ticket->ticket_number . " est fermé");
        } else
            return back()->with('noPermission', 'Vous n\'avez pas la permission pour cela');
    }
}
