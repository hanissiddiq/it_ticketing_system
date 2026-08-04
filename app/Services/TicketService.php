<?php

namespace App\Services;

use App\Models\Ticket;
use App\Repositories\Contracts\TicketRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TicketService
{
    public function __construct(
        protected TicketRepositoryInterface $ticketRepository
    ) {
    }

    public function create(array $data): Ticket
    {
        return DB::transaction(function () use ($data) {

            $data['ticket_number'] = $this->ticketRepository
                ->generateTicketNumber();

            $data['status'] = 'NEW';

            return $this->ticketRepository->create($data);

        });
    }

    public function update(
        Ticket $ticket,
        array $data
    ): bool {

        return DB::transaction(function () use (
            $ticket,
            $data
        ) {

            return $this->ticketRepository
                ->update($ticket, $data);

        });
    }

    public function delete(
        Ticket $ticket
    ): bool {

        return DB::transaction(function () use (
            $ticket
        ) {

            return $this->ticketRepository
                ->delete($ticket);

        });
    }
}