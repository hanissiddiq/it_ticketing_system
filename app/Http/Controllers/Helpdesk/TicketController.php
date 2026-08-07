<?php

namespace App\Http\Controllers\Helpdesk;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Category;
use App\Models\Department;
use App\Models\Priority;
use App\Models\SubCategory;
use App\Models\Ticket;
use App\Models\User;
use App\Repositories\Contracts\TicketRepositoryInterface;
use App\Services\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected TicketRepositoryInterface $ticketRepository;
    protected TicketService $ticketService;

    public function __construct(
        TicketRepositoryInterface $ticketRepository,
        TicketService $ticketService
    ) {
        $this->ticketRepository = $ticketRepository;
        $this->ticketService = $ticketService;
    }

    /**
     * Display Listing
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $tickets = $this->ticketRepository
            ->paginate($keyword);

        return view(
            'tickets.index',
            compact('tickets')
        );
    }

    /**
     * Show Create Form
     */
    public function create()
    {
        $departments = Department::where('is_active', true)
            ->orderBy('name')
            ->get();

        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        $subCategories = SubCategory::where('is_active', true)
            ->orderBy('name')
            ->get();

        $priorities = Priority::where('is_active', true)
            ->orderBy('name')
            ->get();

        $users = User::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view(
            'tickets.create',
            compact(
                'departments',
                'categories',
                'subCategories',
                'priorities',
                'users'
            )
        );
    }

    /**
     * Store Ticket
     */
    public function store(StoreTicketRequest $request)
    {
        try {

            $data = $request->validated();

            $data['requester_id'] = auth()->id();

            $ticket = $this->ticketService
                ->create($data);

            return redirect()
                ->route('tickets.index', $ticket)
                ->with(
                    'success',
                    'Ticket berhasil dibuat.'
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

        /**
     * Display the specified ticket.
     */
    public function show(Ticket $ticket)
    {
        $ticket->load([
            'requester',
            'assignee',
            'department',
            'category',
            'subCategory',
            'priority',
             'updatedBy',
             'assignments.assigner',
            'assignments.assignee',
            'attachments.user','comments.user',
            'histories.user',
        ]);

        

        return view(
            'helpdesk.tickets.show',
            compact('ticket')
        );
    }

    /**
     * Show the form for editing the specified ticket.
     */
    public function edit(Ticket $ticket)
    {
        $ticket->load([
            'requester',
            'assignee',
            'department',
            'category',
            'subCategory',
            'priority',
        ]);

        $departments = Department::where('is_active', true)
            ->orderBy('name')
            ->get();

        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        $subCategories = SubCategory::where('is_active', true)
            ->orderBy('name')
            ->get();

        $priorities = Priority::where('is_active', true)
            ->orderBy('name')
            ->get();

        $users = User::where('is_active', true)
            ->orderBy('name')
            ->get();

        $statuses = [
            'NEW',
            'OPEN',
            'ASSIGNED',
            'IN_PROGRESS',
            'PENDING',
            'ESCALATED',
            'RESOLVED',
            'CLOSED',
            'CANCELLED',
        ];

        return view(
            'tickets.edit',
            compact(
                'ticket',
                'departments',
                'categories',
                'subCategories',
                'priorities',
                'users',
                'statuses'
            )
        );
    }

    /**
     * Update the specified ticket.
     */
    public function update(
        UpdateTicketRequest $request,
        Ticket $ticket
    ) {
        try {

            $this->ticketService->update(
                $ticket,
                $request->validated()
            );

            return redirect()
                ->route('tickets.index', $ticket)
                ->with(
                    'success',
                    'Ticket berhasil diperbarui.'
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

    /**
     * Remove the specified ticket.
     */
    public function destroy(Ticket $ticket)
    {
        try {

            $this->ticketService->delete($ticket);

            return redirect()
                ->route('tickets.index')
                ->with(
                    'success',
                    'Ticket berhasil dihapus.'
                );

        } catch (\Throwable $e) {

            return back()
                ->with(
                    'error',
                    $e->getMessage()
                );

        }
    }
}