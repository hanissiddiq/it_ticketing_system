<?php

namespace App\Http\Controllers\Requester;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $data = [

            'totalTicket' => Ticket::where(
                'requester_id',
                $user->id
            )->count(),

            'newTicket' => Ticket::where(
                'requester_id',
                $user->id
            )->where(
                'status',
                'NEW'
            )->count(),

            'assignedTicket' => Ticket::where(
                'requester_id',
                $user->id
            )->where(
                'status',
                'ASSIGNED'
            )->count(),

            'progressTicket' => Ticket::where(
                'requester_id',
                $user->id
            )->where(
                'status',
                'IN_PROGRESS'
            )->count(),

            'pendingTicket' => Ticket::where(
                'requester_id',
                $user->id
            )->where(
                'status',
                'PENDING'
            )->count(),

            'resolvedTicket' => Ticket::where(
                'requester_id',
                $user->id
            )->where(
                'status',
                'RESOLVED'
            )->count(),

            'closedTicket' => Ticket::where(
                'requester_id',
                $user->id
            )->where(
                'status',
                'CLOSED'
            )->count(),

        ];

        $tickets = Ticket::with([
                'priority',
                'category'
            ])
            ->where(
                'requester_id',
                $user->id
            )
            ->latest()
            ->take(10)
            ->get();

        return view(
            'requester.dashboard',
            compact(
                'data',
                'tickets'
            )
        );
    }
}