<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\TicketAttachment;
use Illuminate\Support\Facades\Storage;
use App\Services\TicketAttachmentService;
use Illuminate\Support\Facades\Gate;

class AttachmentController extends Controller
{
    public function __construct(
        protected TicketAttachmentService $service
    ) {
    }

    /**
     * Download Attachment
     */
    public function download(
        Ticket $ticket,
        TicketAttachment $attachment
    ) {

        abort_unless(
            $attachment->ticket_id == $ticket->id,
            404
        );

        // $this->authorize(
        //     'download',
        //     $attachment
        // );
        // 2. Ganti menjadi Gate::authorize
        Gate::authorize('download', $attachment); 

        return Storage::disk('public')
            ->download(
                $attachment->file_path,
                $attachment->original_name
            );

    }

    /**
     * Delete Attachment
     */
    public function destroy(
        Ticket $ticket,
        TicketAttachment $attachment
    ) {

        abort_unless(
            $attachment->ticket_id == $ticket->id,
            404
        );

        // $this->authorize(
        //     'delete',
        //     $attachment
        // );

        // 3. Ganti menjadi Gate::authorize
        Gate::authorize('delete', $attachment); 

        $this->service->delete(
            $attachment
        );

        return back()->with(
            'success',
            'Attachment berhasil dihapus.'
        );

    }

}