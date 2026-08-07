<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Repositories\Contracts\RequesterTicketRepositoryInterface;

class RequesterTicketRepository implements RequesterTicketRepositoryInterface
{
    public function paginateByRequester(
        User $requester,
        array $filters = [],
        int $perPage = 10
    ): LengthAwarePaginator {

        return Ticket::with([
                'department',
                'category',
                'subCategory',
                'priority',
                'assignee'
            ])
            ->where(
                'requester_id',
                $requester->id
            )
            ->latest()
            ->paginate($perPage);
    }

    public function latestByRequester(
        User $requester,
        int $limit = 10
    ): Collection {

        return Ticket::with([
                'category',
                'priority'
            ])
            ->where(
                'requester_id',
                $requester->id
            )
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function findByRequester(
        int $ticketId,
        User $requester
    ): ?Ticket {

        return Ticket::with([
                'requester',
                'department',
                'category',
                'subCategory',
                'priority',
                'assignee',
                'updatedBy',
                'assignments.assigner',
                'assignments.assignee',
                'histories.user',
                'attachments.user',
                'comments.user.roles', 
            ])
            ->where('requester_id', $requester->id)
            ->find($ticketId);
    }

    public function create(
        array $data
    ): Ticket {

        return Ticket::create($data);

    }

    public function close(
        Ticket $ticket
    ): bool {

        return $ticket->update([

            'status' => 'CLOSED',

            'updated_by' => auth()->id(),

        ]);

    }
}