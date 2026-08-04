<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketAssignmentRequest;
use App\Models\Ticket;
use App\Models\User;
use App\Repositories\Contracts\TicketAssignmentRepositoryInterface;
use App\Services\TicketAssignmentService;

class TicketAssignmentController extends Controller
{
    public function __construct(
        protected TicketAssignmentService $service,
        protected TicketAssignmentRepositoryInterface $repository
    ) {
    }

    /**
     * Form Assignment
     */
    public function create(Ticket $ticket)
    {
        $users = User::role('IT Support')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $histories = $this->repository
            ->history($ticket);

        return view(
            'tickets.assignment.create',
            compact(
                'ticket',
                'users',
                'histories'
            )
        );
    }

    /**
     * Simpan Assignment
     */
    public function store(
        StoreTicketAssignmentRequest $request,
        Ticket $ticket
    ) {
        try {

            $this->service->assign(
                $ticket,
                $request->validated()
            );

            return redirect()
                ->route('tickets.show', $ticket)
                ->with(
                    'success',
                    'Ticket berhasil di-assign.'
                );

        } catch (\Throwable $e) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );

        }
    }
}