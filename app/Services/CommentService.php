<?php

namespace App\Services;

use App\Models\Ticket;
use App\Models\TicketComment;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\TicketCommentRepositoryInterface;

class CommentService
{
    public function __construct(
        protected TicketCommentRepositoryInterface $repository,
        protected TicketHistoryService $historyService
    ) {
    }

    /**
     * List Comment
     */
    public function list(
        Ticket $ticket,
        bool $includeInternal = true
    ): Collection {

        return $this->repository
            ->getByTicket(
                $ticket,
                $includeInternal
            );

    }

    /**
     * Public Comment
     */
    public function create(
        Ticket $ticket,
        string $comment,
        int $userId,
        bool $internal = false
    ): TicketComment {

        return DB::transaction(function () use (
            $ticket,
            $comment,
            $userId,
            $internal
        ) {

            if (
                in_array(
                    $ticket->status,
                    [
                        'CLOSED',
                        'CANCELLED'
                    ]
                )
            ) {

                throw new \Exception(
                    'Ticket sudah ditutup.'
                );

            }

            if (
                auth()->user()->hasRole('User')
                && $internal
            ) {

                throw new \Exception(
                    'Requester tidak dapat membuat komentar internal.'
                );

            }

            $ticketComment = $this->repository
                ->create([

                    'ticket_id' => $ticket->id,

                    'user_id' => $userId,

                    'comment' => $comment,

                    'is_internal' => $internal,

                ]);

            $this->historyService
                ->log(

                    ticket: $ticket,

                    action: 'COMMENT',

                    description: $internal
                        ? 'Menambahkan komentar internal.'
                        : 'Menambahkan komentar.'

                );

            return $ticketComment;

        });

    }

    /**
     * Update Comment
     */
    public function update(
        TicketComment $comment,
        array $data
    ): bool {

        return DB::transaction(function () use (
            $comment,
            $data
        ) {

            $result = $this->repository
                ->update(
                    $comment,
                    $data
                );

            $this->historyService
                ->log(

                    ticket: $comment->ticket,

                    action: 'UPDATE_COMMENT',

                    description: 'Komentar diperbarui.'

                );

            return $result;

        });

    }

    /**
     * Delete Comment
     */
    public function delete(
        TicketComment $comment
    ): bool {

        return DB::transaction(function () use (
            $comment
        ) {

            $ticket = $comment->ticket;

            $result = $this->repository
                ->delete($comment);

            $this->historyService
                ->log(

                    ticket: $ticket,

                    action: 'DELETE_COMMENT',

                    description: 'Komentar dihapus.'

                );

            return $result;

        });

    }

    /**
     * Find Comment
     */
    public function find(
        int $id
    ): ?TicketComment
    {
        return $this->repository->find($id);
    }

}