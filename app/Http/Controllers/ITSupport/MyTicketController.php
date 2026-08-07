<?php

namespace App\Http\Controllers\ITSupport;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Repositories\Contracts\ITSupportTicketRepositoryInterface;
use Illuminate\Http\Request;

class MyTicketController extends Controller
{
    public function __construct(
        protected ITSupportTicketRepositoryInterface $ticketRepository
    ) {
    }

    public function index(Request $request)
    {
        $tickets = $this->ticketRepository->paginateMyTickets(
            auth()->id(),
            $request->keyword
        );

        return view(
            'itsupport.tickets.index',
            compact('tickets')
        );
    }

    public function show(Ticket $ticket)
    {
        $ticket = $this->ticketRepository->findMyTicket(
            auth()->id(),
            $ticket->id
        );

        return view(
            'itsupport.tickets.show',
            compact('ticket')
        );
    }
}