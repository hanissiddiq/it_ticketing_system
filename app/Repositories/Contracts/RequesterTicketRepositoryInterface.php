<?php

namespace App\Repositories\Contracts;

use App\Models\Ticket;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;

interface RequesterTicketRepositoryInterface
{
    /**
     * Menampilkan ticket milik requester (pagination)
     */
    public function paginateByRequester(
        User $requester,
        array $filters = [],
        int $perPage = 10
    ): LengthAwarePaginator;

    /**
     * Menampilkan ticket terbaru milik requester
     */
    public function latestByRequester(
        User $requester,
        int $limit = 10
    ): Collection;

    /**
     * Detail ticket milik requester
     */
    public function findByRequester(
        int $ticketId,
        User $requester
    ): ?Ticket;

    /**
     * Membuat ticket baru
     */
    public function create(
        array $data
    ): Ticket;

    /**
     * Menutup ticket
     */
    public function close(
        Ticket $ticket
    ): bool;
}