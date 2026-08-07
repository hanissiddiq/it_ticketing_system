<?php

namespace App\Http\Controllers\Helpdesk;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [

            'totalTicket' => Ticket::count(),

            'newTicket' => Ticket::where('status', 'NEW')->count(),

            'openTicket' => Ticket::where('status', 'OPEN')->count(),

            'assignedTicket' => Ticket::where('status', 'ASSIGNED')->count(),

            'progressTicket' => Ticket::where('status', 'IN_PROGRESS')->count(),

            'pendingTicket' => Ticket::where('status', 'PENDING')->count(),

            'resolvedTicket' => Ticket::where('status', 'RESOLVED')->count(),

            'closedTicket' => Ticket::where('status', 'CLOSED')->count(),
            'cancelledTicket' => Ticket::where('status','CANCELLED')->count(),

        ];

        $latestTickets = Ticket::with([
                'requester',
                'priority'
            ])
            ->latest()
            ->take(10)
            ->get();

        return view(
            'helpdesk.dashboard',
            compact('data','latestTickets')
        );
    }
}