<?php

namespace App\Services;

use App\Models\Ticket;
use App\Repositories\Contracts\TicketRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Services\TicketHistoryService;

class TicketService
{
    public function __construct(
        protected TicketRepositoryInterface $ticketRepository,
        protected TicketHistoryService $historyService
    ) {
    }

    public function create(array $data): Ticket
    {
        return DB::transaction(function () use ($data) {

            $data['ticket_number'] = $this->ticketRepository
                ->generateTicketNumber();

            $data['status'] = 'NEW';

            $ticket = $this->ticketRepository->create($data);

            /*
            |--------------------------------------------------------------------------
            | History
            |--------------------------------------------------------------------------
            */

            $this->historyService->log(
                ticket: $ticket,
                action: 'CREATED',
                description: 'Ticket berhasil dibuat.'
            );

            return $ticket;

            // return $this->ticketRepository->create($data);


        });
    }

    public function update(Ticket $ticket,array $data): bool {

        return DB::transaction(function () use (
            $ticket,
            $data
        ) {
                

            // return $this->ticketRepository
            //     ->update($ticket, $data);

             /*
            |--------------------------------------------------------------------------
            | Simpan nilai lama
            |--------------------------------------------------------------------------
            */

            $oldData = $ticket->only([
                'category_id',
                'sub_category_id',
                'priority_id',
                'status',
                'assigned_to',
            ]);

            $updated = $this->ticketRepository
                ->update($ticket, $data);

            if (! $updated) {
                return false;
            }

            /*
            |--------------------------------------------------------------------------
            | Reload Data
            |--------------------------------------------------------------------------
            */

            $ticket->refresh();

            /*
            |--------------------------------------------------------------------------
            | History Perubahan
            |--------------------------------------------------------------------------
            */

            $this->logChanges($ticket, $oldData);

            return true;



        });
    }

    public function delete(
        Ticket $ticket
    ): bool {

        return DB::transaction(function () use (
            $ticket
        ) {

            // return $this->ticketRepository->delete($ticket);
            $this->historyService->log(
                ticket: $ticket,
                action: 'DELETED',
                description: 'Ticket dihapus.'
            );

            return $this->ticketRepository
                ->delete($ticket);

        });
    }

    /**
     * Mencatat perubahan field penting.
     */
    protected function logChanges(
        Ticket $ticket,
        array $oldData
    ): void {

        foreach ($oldData as $field => $oldValue) {

            $newValue = $ticket->{$field};

            if ($oldValue != $newValue) {

                $this->historyService->log(

                    ticket: $ticket,

                    action: strtoupper($field) . '_UPDATED',

                    field: $field,

                    oldValue: $oldValue,

                    newValue: $newValue,

                    description: "{$field} berhasil diperbarui."

                );

            }

        }

    }
}