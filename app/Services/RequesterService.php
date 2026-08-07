<?php

namespace App\Services;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\RequesterTicketRepositoryInterface;
use App\Repositories\Contracts\TicketRepositoryInterface;

class RequesterService
{
    public function __construct(
        protected RequesterTicketRepositoryInterface $repository,
        protected TicketRepositoryInterface $ticketRepository,
        protected TicketHistoryService $historyService,
        protected TicketAttachmentService $attachmentService
    ) {
    }

    /**
     * Dashboard
     */
    public function latestTickets(
        User $requester,
        int $limit = 10
    ): Collection {

        return $this->repository
            ->latestByRequester(
                $requester,
                $limit
            );
    }

    /**
     * My Ticket
     */
    public function myTickets(
        User $requester,
        int $perPage = 10
    ): LengthAwarePaginator {

        return $this->repository
            ->paginateByRequester(
                $requester,
                [],
                $perPage
            );
    }

    /**
     * Detail Ticket
     */
    public function detail(
        int $ticketId,
        User $requester
    ): ?Ticket {

        return $this->repository
            ->findByRequester(
                $ticketId,
                $requester
            );
    }

    /**
     * Create Ticket
     */
    public function create(
        array $data
    ): Ticket {

        return DB::transaction(function () use ($data) {

            $data['ticket_number'] = $this->ticketRepository
                ->generateTicketNumber();

            $data['requester_id'] = auth()->id();

            $data['status'] = 'NEW';

            $ticket = $this->repository
                ->create($data);

            $this->historyService->log(
                ticket: $ticket,
                action: 'CREATE',
                description: 'Requester membuat ticket.'
            );

            $this->attachmentService->upload(
                ticket: $ticket,
                files: request()->file('attachments'),
                userId: auth()->id()
            );

            return $ticket;

        });

    }

    /**
     * Close Ticket
     */
    public function close(
        Ticket $ticket
    ): bool {

        return DB::transaction(function () use ($ticket) {

            if ($ticket->status !== 'RESOLVED') {

                throw new \Exception(
                    'Ticket hanya dapat ditutup jika status RESOLVED.'
                );

            }

            $result = $this->repository
                ->close($ticket);

            $this->historyService->log(
                ticket: $ticket,
                action: 'CLOSE',
                description: 'Requester menutup ticket.'
            );

            return $result;

        });

    }

}