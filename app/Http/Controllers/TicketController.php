<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\Message;
use App\Models\TicketType;
use App\Models\TicketStatus;
use Illuminate\Http\Request;
use App\Trait\RolesAvailable;
use App\Http\Requests\TicketRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class TicketController extends Controller
{

    use RolesAvailable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $authUserId = (object) User::GetLoggedUserInfo()->get('id');

        $allTicketsForLoggedUser = (object) Ticket::GetAllTicketInfosAndRelations($authUserId[0]->id)->orderBy('created_at', "desc")->paginate(8);

        $ticketArray = [];

        for ($i = 0; $i < count($allTicketsForLoggedUser); $i++) {
            $allTicketsForLoggedUser[$i]['date'] = (string) date('d-m-Y', strtotime($allTicketsForLoggedUser[$i]->created_at));
            $allTicketsForLoggedUser[$i]['description'] = (string) substr($allTicketsForLoggedUser[$i]->description, 0, 60);
            array_push($ticketArray,  $allTicketsForLoggedUser[$i]);
        }
        
        return (object) view('user.user-tickets', ['ticketsArray' => $allTicketsForLoggedUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {

        $order = Order::where('order_number', $id)->get('order_number');       
        if((!$order != null) && $order[0]->user_id == User::GetLoggedUserInfo()->get('id')){
            $order = $order[0]->order_number;
        }
        $typeTickets = (object) TicketType::all('id', 'type');
        return (object) view('user.user-tickets-create', ['ticketTypes' => (object) $typeTickets, 'orderNumber' => $order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        $validatedData = $request->validated();

        if ((bool) Auth::check()) {
            $authUserId = (object) User::GetLoggedUserInfo()->get('id');
        }

        $ticketNumber = mt_rand(10000, 2147483647);
        $ticketTypeOpen = (object) TicketStatus::where('status', 'Ouvert')->get();

        $newTicket = Ticket::create([
            'ticket_number' => (int) $ticketNumber,
            'ticket_type_id' => (int) $request->ticket_type_id,
            'ticket_status_id' => (int) $ticketTypeOpen[0]->id,
            'user_id' => Auth::check() ? (int) $authUserId[0]->id : NULL,
            'email' => $request->email,
            'description' => $request->description
        ]);

        return back()->with('SuccessTicket', 'Votre ticket a bien été envoyé');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $states = (object) new TicketStatus();
        $opened = (int) $states->get_opened_status();
        $closed = (int) $states->get_closed_status();
        $expired = (int) $states->get_expired_status();
        $not_resolved = (int) $states->get_not_resolved_status();
        $ticketMessages = (object) Message::GetAllMessagesFromATicket($id)->get();
        $ticket = Ticket::where('id', $id)->get();
        return (object) view(
            'user.user-tickets-show',
            [
                'ticketMessages' => (object) $ticketMessages,
                'ticket' => (object) $ticket,
                'ticket_status' => $ticket[0]->ticket_status_id,
                'ticket_opened' =>(int) $opened,
                'ticket_closed' => (int) $closed,
                'ticket_expired' => (int) $expired,
                'ticket_not_resolved' => (int) $not_resolved
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $authUserId = (object) User::GetLoggedUserInfo()->get();
        $userTemplate = new Role;

        $ticket = (object) Ticket::where('id', (int)$request->ticket_id)->get();
        $states = (object) new TicketStatus();
        $opened = (int) $states->get_opened_status();
        $closed = (int) $states->get_closed_status();
        $expired = (int) $states->get_expired_status();
        $not_resolved = (int) $states->get_not_resolved_status();


        if (
            $ticket[0]->user_id ==  $authUserId[0]->id ||
            (int) $authUserId[0]->role_id === (int)$userTemplate->get_role_admin_1() ||
            (int) $authUserId[0]->role_id === (int)$userTemplate->get_role_admin_2() ||
            (int) $authUserId[0]->role_id === (int)$userTemplate->get_role_admin_3()
        ) {
            $ticket[0]->ticket_status_id = $closed;
            $ticket[0]->save();
            return back()->with('ticketClosed', "Votre ticket #" . $ticket[0]->ticket_number . " est fermé");
        } else
            return back()->with('noPermission', 'Vous n\'avez pas la permission pour cela');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
