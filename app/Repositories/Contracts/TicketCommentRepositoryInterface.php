<?php

namespace App\Repositories\Contracts;

use App\Models\Ticket;
use App\Models\TicketComment;
use Illuminate\Database\Eloquent\Collection;

interface TicketCommentRepositoryInterface
{
    /**
     * Semua komentar ticket
     */
    public function getByTicket(
        Ticket $ticket,
        bool $includeInternal = true
    ): Collection;

    /**
     * Detail komentar
     */
    public function find(
        int $id
    ): ?TicketComment;

    /**
     * Tambah komentar
     */
    public function create(
        array $data
    ): TicketComment;

    /**
     * Update komentar
     */
    public function update(
        TicketComment $comment,
        array $data
    ): bool;

    /**
     * Hapus komentar
     */
    public function delete(
        TicketComment $comment
    ): bool;
}