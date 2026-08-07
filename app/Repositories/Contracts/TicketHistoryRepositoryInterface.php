<?php

namespace App\Repositories\Contracts;

use App\Models\Ticket;
use App\Models\TicketHistory;

interface TicketHistoryRepositoryInterface
{
    public function create(
        array $data
    ): TicketHistory;

    public function byTicket(
        Ticket $ticket
    );
}