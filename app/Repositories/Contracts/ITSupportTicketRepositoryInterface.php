<?php

namespace App\Repositories\Contracts;

use App\Models\Ticket;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ITSupportTicketRepositoryInterface
{
    /**
     * Semua tiket milik IT Support yang sedang login.
     */
    public function paginateMyTickets(
        int $userId,
        ?string $keyword = null
    ): LengthAwarePaginator;

    /**
     * Detail tiket yang dimiliki IT Support.
     */
    public function findMyTicket(
        int $userId,
        int $ticketId
    ): ?Ticket;

    /**
     * Dashboard Counter.
     */
    public function countByStatus(
        int $userId,
        string $status
    ): int;

    /**
     * Total tiket.
     */
    public function totalTicket(
        int $userId
    ): int;
}