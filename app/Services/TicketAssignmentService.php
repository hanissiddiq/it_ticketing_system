<?php

namespace App\Services;

use App\Models\Ticket;
use App\Repositories\Contracts\TicketAssignmentRepositoryInterface;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class TicketAssignmentService
{
    public function __construct(
        protected TicketAssignmentRepositoryInterface $repository
    ) {
    }

    public function assign(
        Ticket $ticket,
        array $data
    ) {
        return DB::transaction(function () use (
            $ticket,
            $data
        ) {

            /*
            |--------------------------------------------------------------------------
            | Business Rules
            |--------------------------------------------------------------------------
            */

            $this->validateAssignment($ticket);

            /*
            |--------------------------------------------------------------------------
            | Simpan History Assignment
            |--------------------------------------------------------------------------
            */

            $assignment = $this->repository->create([

                'ticket_id'   => $ticket->id,

                'assigned_by' => auth()->id(),

                'assigned_to' => $data['assigned_to'],

                'notes'       => $data['notes'] ?? null,

                'assigned_at' => now(),

            ]);

            /*
            |--------------------------------------------------------------------------
            | Update Ticket
            |--------------------------------------------------------------------------
            */

            $ticket->update([

                'assigned_to' => $data['assigned_to'],

                'status'      => 'ASSIGNED',

            ]);

            return $assignment;
        });
    }

    /**
     * Validate Assignment Business Rules
     */
    protected function validateAssignment(
        Ticket $ticket
    ): void {

        /*
        |--------------------------------------------------------------------------
        | Ticket sudah selesai
        |--------------------------------------------------------------------------
        */

        if (in_array($ticket->status, [

            'RESOLVED',

            'CLOSED',

            'CANCELLED',

        ])) {

            throw new RuntimeException(
                'Ticket tidak dapat di-assign karena sudah selesai atau dibatalkan.'
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Tidak boleh assign ke user yang sama
        |--------------------------------------------------------------------------
        */

        if (
            !empty($ticket->assigned_to)
            && $ticket->assigned_to == request('assigned_to')
        ) {

            throw new RuntimeException(
                'Ticket sudah ditugaskan kepada user tersebut.'
            );

        }

    }
}