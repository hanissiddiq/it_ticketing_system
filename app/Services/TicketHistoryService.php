<?php

namespace App\Services;

use App\Models\Ticket;
use App\Repositories\Contracts\TicketHistoryRepositoryInterface;

class TicketHistoryService
{
    public function __construct(
        protected TicketHistoryRepositoryInterface $repository
    ) {
    }

    public function log(
        Ticket $ticket,
        string $action,
        ?string $field = null,
        $oldValue = null,
        $newValue = null,
        ?string $description = null
    ): void {

        $this->repository->create([

            'ticket_id' => $ticket->id,

            'user_id' => auth()->id(),

            'action' => $action,

            'field' => $field,

            'old_value' => $oldValue,

            'new_value' => $newValue,

            'description' => $description,

        ]);

    }
}