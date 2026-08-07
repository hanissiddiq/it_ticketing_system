<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Models\TicketHistory;
use App\Repositories\Contracts\TicketHistoryRepositoryInterface;

class TicketHistoryRepository
implements TicketHistoryRepositoryInterface
{
    public function create(
        array $data
    ): TicketHistory {

        return TicketHistory::create($data);

    }

    public function byTicket(
        Ticket $ticket
    ) {

        return $ticket->histories()

            ->with('user')

            ->latest()

            ->get();

    }
}