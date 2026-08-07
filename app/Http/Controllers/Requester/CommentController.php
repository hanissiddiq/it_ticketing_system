<?php

namespace App\Http\Controllers\Requester;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Ticket;
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

        abort_unless(
            $ticket->requester_id == auth()->id(),
            403
        );

        $this->service->create(
            // $ticket,
            // [
                // 'user_id' => auth()->id(),
                // 'comment' => $request->comment,
                // 'is_internal' => false,
                ticket: $ticket,
                comment: $request->comment,
                userId: auth()->id(),
                internal: false
            // ]
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
        int $comment
    ) {

        $comment = $this->service->find($comment);

        abort_if(!$comment, 404);

        abort_unless(
            $comment->user_id == auth()->id(),
            403
        );

        $this->service->delete($comment);

        return back()->with(
            'success',
            'Komentar berhasil dihapus.'
        );

    }
}