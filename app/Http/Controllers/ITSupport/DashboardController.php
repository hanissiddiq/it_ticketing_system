<?php

namespace App\Http\Controllers\ITSupport;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $data = [

            'myTicket' => Ticket::where(
                'assigned_to',
                $user->id
            )->count(),

            'open' => Ticket::where(
                'assigned_to',
                $user->id
            )->where('status', 'ASSIGNED')->count(),

            'progress' => Ticket::where(
                'assigned_to',
                $user->id
            )->where('status', 'IN_PROGRESS')->count(),

            'pending' => Ticket::where(
                'assigned_to',
                $user->id
            )->where('status', 'PENDING')->count(),

            'resolved' => Ticket::where(
                'assigned_to',
                $user->id
            )->where('status', 'RESOLVED')->count(),

        ];

        $tickets = Ticket::with([
            'priority',
            'requester'
        ])
        ->where('assigned_to', $user->id)
        ->whereIn('status', [
            'ASSIGNED',
            'IN_PROGRESS',
            'PENDING'
        ])
        ->latest()
        ->take(10)
        ->get();


        return view(
            'itsupport.dashboard',
            compact('data','tickets')
        );
    }
}