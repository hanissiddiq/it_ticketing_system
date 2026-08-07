<?php

namespace App\Http\Controllers\Helpdesk;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Ticket;
use App\Models\TicketComment;
use App\Services\CommentService;

class CommentController extends Controller
{
    public function __construct(
        protected CommentService $service
    ) {
    }

    /**
     * Store Comment
     */
    public function store(
        StoreCommentRequest $request,
        Ticket $ticket
    ) {

        $this->service->create(
            $ticket,
            [

                'user_id' => auth()->id(),

                'comment' => $request->comment,

                'is_internal' => $request->boolean(
                    'is_internal'
                ),

            ]
        );

        return back()->with(
            'success',
            'Komentar berhasil ditambahkan.'
        );

    }

    /**
     * Delete Comment
     */
    public function destroy(
        Ticket $ticket,
        TicketComment $comment
    ) {

        abort_unless(
            $comment->ticket_id == $ticket->id,
            404
        );

        $this->service->delete(
            $comment
        );

        return back()->with(
            'success',
            'Komentar berhasil dihapus.'
        );

    }

}