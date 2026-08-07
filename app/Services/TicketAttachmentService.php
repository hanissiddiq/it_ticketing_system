<?php

namespace App\Services;

use App\Models\Ticket;
use App\Models\TicketAttachment;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection ;
use App\Repositories\Contracts\TicketAttachmentRepositoryInterface;

class TicketAttachmentService
{
    public function __construct(
        protected TicketAttachmentRepositoryInterface $repository,
        protected TicketHistoryService $historyService
    ) {
    }

    /**
     * Upload multiple attachment
     */
    public function upload(
        Ticket $ticket,
        ?array $files,
        int $userId
    ): Collection {

        $attachments = collect();

        if (empty($files)) {
            return $attachments;
        }

        DB::transaction(function () use (
            $ticket,
            $files,
            $userId,
            &$attachments
        ) {

            foreach ($files as $file) {

                if (!$file instanceof UploadedFile) {
                    continue;
                }

                $attachment = $this->repository->upload(
                    ticket: $ticket,
                    file: $file,
                    userId: $userId
                );

                $attachments->push($attachment);

                $this->historyService->log(
                    ticket: $ticket,
                    action: 'UPLOAD_ATTACHMENT',
                    description: 'Upload attachment : ' . $attachment->original_name
                );
            }

        });

        return $attachments;
    }

    /**
     * Semua attachment ticket
     */
    public function list(
        Ticket $ticket
    ): Collection {

        return $this->repository
            ->getByTicket($ticket);

    }

    /**
     * Detail attachment
     */
    public function find(
        int $id
    ): ?TicketAttachment {

        return $this->repository
            ->find($id);

    }

    /**
     * Delete attachment
     */
    public function delete(
        TicketAttachment $attachment
    ): bool {

        return DB::transaction(function () use ($attachment) {

            $ticket = $attachment->ticket;

            $result = $this->repository
                ->delete($attachment);

            $this->historyService->log(
                ticket: $ticket,
                action: 'DELETE_ATTACHMENT',
                description: 'Menghapus attachment : ' . $attachment->original_name
            );

            return $result;

        });

    }
}