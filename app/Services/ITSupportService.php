<?php

namespace App\Services;

use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class ITSupportService
{

    public function __construct(
        protected TicketHistoryService $historyService
    ) {
    }
    /**
     * Memastikan ticket memang milik IT Support yang login.
     */
    protected function validateOwnership(Ticket $ticket): void
    {
        if ($ticket->assigned_to !== auth()->id()) {
            throw new RuntimeException(
                'Ticket bukan merupakan tanggung jawab Anda.'
            );
        }
    }

    /**
     * Mulai mengerjakan ticket.
     */
    public function startWorking(Ticket $ticket): Ticket
    {
        return DB::transaction(function () use ($ticket) {

            $this->validateOwnership($ticket);

            if ($ticket->status !== 'ASSIGNED') {
                throw new RuntimeException(
                    'Hanya ticket dengan status ASSIGNED yang dapat dikerjakan.'
                );
            }

            $oldStatus = $ticket->status;

            $ticket->update([
                'status' => 'IN_PROGRESS',
            ]);

             $this->historyService->log(

                ticket: $ticket,

                action: 'STATUS_CHANGED',

                field: 'status',

                oldValue: $oldStatus,

                newValue: 'IN_PROGRESS',

                description: 'IT Support mulai mengerjakan ticket.'

            );

            return $ticket->fresh();
        });
    }

    /**
     * Mengubah ticket menjadi Pending.
     *  * IN_PROGRESS -> PENDING
     */
    public function pending(
        Ticket $ticket,
        ?string $reason = null
    ): Ticket {

        return DB::transaction(function () use (
            $ticket,
            $reason
        ) {

            $this->validateOwnership($ticket);

            if ($ticket->status !== 'IN_PROGRESS') {
                throw new RuntimeException(
                    'Hanya ticket IN_PROGRESS yang dapat diubah menjadi PENDING.'
                );
            }

            $oldStatus = $ticket->status;

            $ticket->update([
                'status' => 'PENDING',
            ]);

            // TODO:
            // Simpan alasan pending ke Ticket Comment
            // atau Ticket History.

            $this->historyService->log(

                ticket: $ticket,

                action: 'STATUS_CHANGED',

                field: 'status',

                oldValue: $oldStatus,

                newValue: 'PENDING',

                description: $reason ?: 'Ticket menjadi pending.'

            );

            return $ticket->fresh();
        });
    }

    /**
     * Resolve Ticket.
     */
    public function resolve(
        Ticket $ticket,
        ?string $solution = null
    ): Ticket {

        return DB::transaction(function () use (
            $ticket,
            $solution
        ) {

            $this->validateOwnership($ticket);

            if (! in_array($ticket->status, [
                'IN_PROGRESS',
                'PENDING',
            ])) {

                throw new RuntimeException(
                    'Ticket belum dapat diselesaikan.'
                );

            }

            $oldStatus = $ticket->status;

            $ticket->update([
                'status' => 'RESOLVED',
            ]);

            // TODO:
            // Simpan solusi ke Ticket Comment
            // Simpan ke Ticket History

             $this->historyService->log(

                ticket: $ticket,

                action: 'STATUS_CHANGED',

                field: 'status',

                oldValue: $oldStatus,

                newValue: 'RESOLVED',

                description: $solution ?: 'Ticket berhasil diselesaikan.'

            );

            return $ticket->fresh();
        });
    }

    /**
     * Re-Assignment.
     * Akan digunakan pada modul berikutnya.
     */
    public function reassign(
        Ticket $ticket,
        int $assignedTo,
        ?string $notes = null
    ): void {

        throw new RuntimeException(
            'Fitur Re-Assignment belum tersedia.'
        );
    }

    /**
     * Mengubah status ticket secara umum.
     */
    public function changeStatus(
        Ticket $ticket,
        string $status,
        ?string $notes = null
    ): Ticket {

        return match ($status) {

            'IN_PROGRESS' => $this->startWorking($ticket),

             'PENDING' => $this->pending(
                $ticket,
                $notes
            ),

            'RESOLVED' => $this->resolve(
                $ticket,
                $notes
            ),

            default => throw new RuntimeException(
                'Status ticket tidak valid.'
            ),

        };
    }
}