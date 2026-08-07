<?php

namespace App\Services;

use App\Models\Ticket;
use App\Repositories\Contracts\TicketAssignmentRepositoryInterface;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class TicketAssignmentService
{
    public function __construct(
        protected TicketAssignmentRepositoryInterface $repository,
        protected TicketHistoryService $historyService
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

            // $this->validateAssignment($ticket);
            $this->validateAssignment(
                $ticket,
                $data['assigned_to']
            );

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
            $oldAssignedTo = $ticket->assigned_to;
            $oldStatus = $ticket->status;

            $ticket->update([

                'assigned_to' => $data['assigned_to'],

                'status'      => 'ASSIGNED',

            ]);

             /*
            |--------------------------------------------------------------------------
            | History Assignment
            |--------------------------------------------------------------------------
            */

            $this->historyService->log(

                ticket: $ticket,

                action: 'ASSIGNED',

                field: 'assigned_to',

                oldValue: $oldAssignedTo,

                newValue: $data['assigned_to'],

                description: 'Ticket berhasil di-assign.'

            );

            /*
            |--------------------------------------------------------------------------
            | History Status
            |--------------------------------------------------------------------------
            */

            if ($oldStatus != 'ASSIGNED') {

                $this->historyService->log(

                    ticket: $ticket,

                    action: 'STATUS_CHANGED',

                    field: 'status',

                    oldValue: $oldStatus,

                    newValue: 'ASSIGNED',

                    description: 'Status ticket berubah menjadi ASSIGNED.'

                );

            }

            return $assignment;
        });
    }

    /**
     * Validate Assignment Business Rules
     */
    protected function validateAssignment(
        Ticket $ticket,
        int $assignedTo
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
            // !empty($ticket->assigned_to)
            // && $ticket->assigned_to == request('assigned_to')
            $ticket->assigned_to &&
            $ticket->assigned_to == $assignedTo
        ) {

            throw new RuntimeException(
                'Ticket sudah ditugaskan kepada user tersebut.'
            );

        }

    }
}