@extends('template.main')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="mb-1">
                Ticket Management
            </h3>

            <small class="text-muted">
                Manage IT Helpdesk Tickets
            </small>

        </div>

        @can('ticket.create')

        <a
            href="{{ route('tickets.create') }}"
            class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Create Ticket

        </a>

        @endcan

    </div>

    {{-- Alert --}}
    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

    @endif

    {{-- Search --}}
    <div class="card mb-3">

        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-md-10">

                        <input
                            type="text"
                            name="keyword"
                            class="form-control"
                            placeholder="Search Ticket Number, Subject, Status..."
                            value="{{ request('keyword') }}">

                    </div>

                    <div class="col-md-2 d-grid">

                        <button class="btn btn-primary">

                            Search

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- Table --}}
    <div class="card">

        <div class="table-responsive">

            <table class="table table-hover table-bordered align-middle mb-0">

                <thead class="table-light">

                <tr>

                    <th width="60">

                        #

                    </th>

                    <th width="170">

                        Ticket No

                    </th>

                    <th>

                        Subject

                    </th>

                    <th width="180">

                        Requester

                    </th>

                    <th width="170">

                        Category

                    </th>

                    <th width="130">

                        Priority

                    </th>

                    <th width="140">

                        Status

                    </th>

                    <th width="180">

                        Assigned

                    </th>

                    <th width="220">

                        Action

                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($tickets as $ticket)

                    <tr>

                        <td>

                            {{ $loop->iteration + (($tickets->currentPage()-1) * $tickets->perPage()) }}

                        </td>

                        <td>

                            <strong>

                                {{ $ticket->ticket_number }}

                            </strong>

                        </td>

                        <td>

                            <strong>

                                {{ $ticket->subject }}

                            </strong>

                            <br>

                            <small class="text-muted">

                                {{ Str::limit($ticket->description,70) }}

                            </small>

                        </td>

                        <td>

                            {{ $ticket->requester->name }}

                        </td>

                        <td>

                            {{ $ticket->category->name }}

                            <br>

                            <small class="text-muted">

                                {{ $ticket->subCategory->name }}

                            </small>

                        </td>

                        <td>

                            @php

                                $priorityColor = match(strtolower($ticket->priority->name)){

                                    'low' => 'success',

                                    'medium' => 'warning',

                                    'high' => 'danger',

                                    'critical' => 'dark',

                                    default => 'secondary'

                                };

                            @endphp

                            <span class="badge bg-{{ $priorityColor }}">

                                {{ $ticket->priority->name }}

                            </span>

                        </td>

                        <td>

                            @php

                                $statusColor = match($ticket->status){

                                    'NEW' => 'secondary',

                                    'OPEN' => 'primary',

                                    'ASSIGNED' => 'info',

                                    'IN_PROGRESS' => 'warning',

                                    'PENDING' => 'dark',

                                    'ESCALATED' => 'danger',

                                    'RESOLVED' => 'success',

                                    'CLOSED' => 'success',

                                    'CANCELLED' => 'secondary',

                                    default => 'secondary'

                                };

                            @endphp

                            <span class="badge bg-{{ $statusColor }}">

                                {{ str_replace('_',' ',$ticket->status) }}

                            </span>

                        </td>

                        <td>

                            @if($ticket->assignee)

                                {{ $ticket->assignee->name }}

                            @else

                                <span class="text-muted">

                                    Not Assigned

                                </span>

                            @endif

                        </td>

                        <td>

                            @can('ticket.view')

                            <a
                                href="{{ route('tickets.show',$ticket) }}"
                                class="btn btn-info btn-sm">

                                Detail

                            </a>

                            @endcan

                            @can('ticket.update')

                            <a
                                href="{{ route('tickets.edit',$ticket) }}"
                                class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            @endcan

                            @can('ticket.delete')

                            <form
                                action="{{ route('tickets.destroy',$ticket) }}"
                                method="POST"
                                class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button
                                    onclick="return confirm('Delete this ticket?')"
                                    class="btn btn-danger btn-sm">

                                    Delete

                                </button>

                            </form>

                            @endcan

                       
                            @can('ticket.assignment')

                            <a
                                href="{{ route('tickets.assignment.create',$ticket) }}"
                                class="btn btn-primary btn-sm">

                                Assign

                            </a>

                            @endcan 
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="9"
                            class="text-center p-5">

                            <h5>

                                No Ticket Found

                            </h5>

                            <small class="text-muted">

                                Click Create Ticket to add a new ticket.

                            </small>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer">

            {{ $tickets->links() }}

        </div>

    </div>

</div>

@endsection