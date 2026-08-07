<?php

namespace App\Repositories;

use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use App\Models\TicketAttachment;
use App\Repositories\Contracts\TicketAttachmentRepositoryInterface;

class TicketAttachmentRepository implements TicketAttachmentRepositoryInterface
{
    /**
     * Upload attachment
     */
    public function upload(
        Ticket $ticket,
        UploadedFile $file,
        int $userId
    ): TicketAttachment {

        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs(
            'tickets/' . $ticket->ticket_number,
            $fileName,
            'public'
        );

        return TicketAttachment::create([

            'ticket_id'      => $ticket->id,

            'user_id'        => $userId,

            'original_name'  => $file->getClientOriginalName(),

            'file_name'      => $fileName,

            'mime_type'      => $file->getMimeType(),

            'extension'      => $file->getClientOriginalExtension(),

            'file_size'      => $file->getSize(),

            'file_path'      => $path,

        ]);

    }

    /**
     * List attachment
     */
    public function getByTicket(
        Ticket $ticket
    ): Collection {

        return TicketAttachment::where(
                'ticket_id',
                $ticket->id
            )
            ->latest()
            ->get();

    }

    /**
     * Detail attachment
     */
    public function find(
        int $id
    ): ?TicketAttachment {

        return TicketAttachment::find($id);

    }

    /**
     * Delete attachment
     */
    public function delete(
        TicketAttachment $attachment
    ): bool {

        if (
            Storage::disk('public')
                ->exists($attachment->file_path)
        ) {

            Storage::disk('public')
                ->delete($attachment->file_path);

        }

        return $attachment->delete();

    }
}