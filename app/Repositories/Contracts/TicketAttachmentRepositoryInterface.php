<?php

namespace App\Repositories\Contracts;

use App\Models\Ticket;
use App\Models\TicketAttachment;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Collection;

interface TicketAttachmentRepositoryInterface
{
    /**
     * Upload attachment
     */
    public function upload(
        Ticket $ticket,
        UploadedFile $file,
        int $userId
    ): TicketAttachment;

    /**
     * Semua attachment ticket
     */
    public function getByTicket(
        Ticket $ticket
    ): Collection;

    /**
     * Detail attachment
     */
    public function find(
        int $id
    ): ?TicketAttachment;

    /**
     * Hapus attachment
     */
    public function delete(
        TicketAttachment $attachment
    ): bool;
}