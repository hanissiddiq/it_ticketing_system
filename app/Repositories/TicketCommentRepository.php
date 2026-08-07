<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Models\TicketComment;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\TicketCommentRepositoryInterface;

class TicketCommentRepository implements TicketCommentRepositoryInterface
{
    /**
     * Semua komentar berdasarkan ticket
     */
    public function getByTicket(
        Ticket $ticket,
        bool $includeInternal = true
    ): Collection {

        $query = TicketComment::with('user')
            ->where(
                'ticket_id',
                $ticket->id
            );

        if (!$includeInternal) {

            $query->where(
                'is_internal',
                false
            );

        }

        return $query
            ->orderBy('created_at')
            ->get();

    }

    /**
     * Detail komentar
     */
    public function find(
        int $id
    ): ?TicketComment {

        return TicketComment::with([
                'user',
                'ticket'
            ])
            ->find($id);

    }

    /**
     * Simpan komentar
     */
    public function create(
        array $data
    ): TicketComment {

        return TicketComment::create($data);

    }

    /**
     * Update komentar
     */
    public function update(
        TicketComment $comment,
        array $data
    ): bool {

        return $comment->update($data);

    }

    /**
     * Hapus komentar
     */
    public function delete(
        TicketComment $comment
    ): bool {

        return $comment->delete();

    }
}