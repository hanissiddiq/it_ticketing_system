<?php

namespace App\Http\Controllers\Requester;

use App\Http\Controllers\Controller;
use App\Http\Requests\Requester\StoreRequesterTicketRequest;
use App\Models\Category;
use App\Models\Department;
use App\Models\Priority;
use App\Services\RequesterService;

class TicketController extends Controller
{
    public function __construct(
        protected RequesterService $service
    ) {
    }

    /**
     * My Ticket
     */
    public function index()
    {
        $tickets = $this->service->myTickets(
            auth()->user(),
            10
        );

        return view(
            'requester.tickets.index',
            compact('tickets')
        );
    }

    /**
     * Form Create Ticket
     */
    public function create()
    {
        $departments = Department::where('is_active', true)
            ->orderBy('name')
            ->get();

        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        $priorities = Priority::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view(
            'requester.tickets.create',
            compact(
                'departments',
                'categories',
                'priorities'
            )
        );
    }

    /**
     * Store Ticket
     */
    public function store(
        StoreRequesterTicketRequest $request
    ) {

        $this->service->create(
            $request->validated()
        );

        

        return redirect()
            ->route('requester.tickets.index')
            ->with(
                'success',
                'Ticket berhasil dibuat.'
            );

    }

    /**
     * Detail Ticket
     */
    public function show(
        int $ticket
    ) {

        $ticket = $this->service->detail(
            $ticket,
            auth()->user()
        );

        abort_if(!$ticket, 404);

        return view(
            'requester.tickets.show',
            compact('ticket')
        );

    }

    /**
     * Close Ticket
     */
    public function close(
        int $ticket
    ) {

        $ticket = $this->service->detail(
            $ticket,
            auth()->user()
        );

        abort_if(!$ticket, 404);

        $this->service->close(
            $ticket
        );

        return redirect()
            ->route(
                'requester.tickets.show',
                $ticket
            )
            ->with(
                'success',
                'Ticket berhasil ditutup.'
            );

    }

}