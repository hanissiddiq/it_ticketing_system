<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Models\TicketAssignment;
use App\Repositories\Contracts\TicketAssignmentRepositoryInterface;

class TicketAssignmentRepository
    implements TicketAssignmentRepositoryInterface
{
    public function create(
        array $data
    ): TicketAssignment
    {
        return TicketAssignment::create($data);
    }

    public function latestByTicket(
        Ticket $ticket
    )
    {
        return $ticket
            ->assignments()
            ->latest('assigned_at')
            ->first();
    }

    public function history(
        Ticket $ticket
    )
    {
        return $ticket
            ->assignments()
            ->with([
                'assigner',
                'assignee'
            ])
            ->latest('assigned_at')
            ->get();
    }
}