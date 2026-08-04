<?php

namespace App\Repositories\Contracts;

use App\Models\Ticket;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TicketRepositoryInterface
{
    public function paginate(
        ?string $keyword = null,
        int $perPage = 10
    ): LengthAwarePaginator;

    public function find(int $id): ?Ticket;

    public function create(array $data): Ticket;

    public function update(Ticket $ticket, array $data): bool;

    public function delete(Ticket $ticket): bool;

    public function generateTicketNumber(): string;
}