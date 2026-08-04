<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Repositories\Contracts\TicketRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TicketRepository implements TicketRepositoryInterface
{
    public function paginate(
        ?string $keyword = null,
        int $perPage = 10
    ): LengthAwarePaginator {

        return Ticket::with([
                'requester',
                'assignee',
                'department',
                'category',
                'subCategory',
                'priority',
            ])
            ->when($keyword, function ($query) use ($keyword) {

                $query->where(function ($q) use ($keyword) {

                    $q->where('ticket_number', 'like', "%{$keyword}%")
                      ->orWhere('subject', 'like', "%{$keyword}%")
                      ->orWhere('status', 'like', "%{$keyword}%");

                });

            })
            ->latest()
            ->paginate($perPage)
            ->withQueryString();
    }

    public function find(int $id): ?Ticket
    {
        return Ticket::with([
            'requester',
            'assignee',
            'department',
            'category',
            'subCategory',
            'priority',
        ])->find($id);
    }

    public function create(array $data): Ticket
    {
        return Ticket::create($data);
    }

    public function update(
        Ticket $ticket,
        array $data
    ): bool {

        return $ticket->update($data);
    }

    public function delete(
        Ticket $ticket
    ): bool {

        return $ticket->delete();
    }

    public function generateTicketNumber(): string
    {
        $today = now()->format('Ymd');

        $lastTicket = Ticket::whereDate(
                'created_at',
                today()
            )
            ->latest('id')
            ->first();

        $running = 1;

        if ($lastTicket) {

            $explode = explode('-', $lastTicket->ticket_number);

            $running = (int) end($explode) + 1;

        }

        return sprintf(
            'HD-%s-%06d',
            $today,
            $running
        );
    }
}