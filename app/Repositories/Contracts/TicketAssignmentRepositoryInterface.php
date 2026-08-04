<?php

namespace App\Repositories\Contracts;

use App\Models\Ticket;
use App\Models\TicketAssignment;

interface TicketAssignmentRepositoryInterface
{
    public function create(array $data): TicketAssignment;

    public function latestByTicket(
        Ticket $ticket
    );

    public function history(
        Ticket $ticket
    );
}