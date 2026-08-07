<?php

namespace App\Repositories;

use App\Models\Ticket;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Repositories\Contracts\ITSupportTicketRepositoryInterface;

class ITSupportTicketRepository implements ITSupportTicketRepositoryInterface
{
    public function paginateMyTickets(
        int $userId,
        ?string $keyword = null
    ): LengthAwarePaginator {

        return Ticket::with([
                'priority',
                'requester',
                'department',
                'category',
                'subCategory'
            ])
            ->where('assigned_to', $userId)

            ->when($keyword, function ($query) use ($keyword) {

                $query->where(function ($q) use ($keyword) {

                    $q->where('ticket_number', 'like', "%{$keyword}%")
                      ->orWhere('subject', 'like', "%{$keyword}%")
                      ->orWhere('status', 'like', "%{$keyword}%");

                });

            })

            ->latest()

            ->paginate(15)

            ->withQueryString();
    }

    public function findMyTicket(
        int $userId,
        int $ticketId
    ): ?Ticket {

        return Ticket::with([
                'priority',
                'requester',
                'department',
                'category',
                'subCategory',
                'attachments.user','comments.user.roles',
                'histories.user',
                // 'assignments.assigner',
                // 'assignments.assignee'
            ])
            ->where('assigned_to', $userId)
            ->findOrFail($ticketId);
    }

    public function countByStatus(
        int $userId,
        string $status
    ): int {

        return Ticket::where('assigned_to', $userId)
            ->where('status', $status)
            ->count();
    }

    public function totalTicket(
        int $userId
    ): int {

        return Ticket::where(
            'assigned_to',
            $userId
        )->count();
    }
}