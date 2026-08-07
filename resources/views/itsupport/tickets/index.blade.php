@extends('template.main')

@section('title', 'My Ticket')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5 class="mb-0">
                My Assigned Ticket
            </h5>

            <form method="GET">

                <input
                    type="text"
                    name="keyword"
                    class="form-control"
                    placeholder="Cari Ticket..."
                    value="{{ request('keyword') }}"
                >

            </form>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered align-middle">

                <thead>

                <tr>

                    <th width="50">No</th>

                    <th>Ticket Number</th>

                    <th>Subject</th>

                    <th>Priority</th>

                    <th>Status</th>

                    <th>Requester</th>

                    <th width="180">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($tickets as $ticket)

                    <tr>

                        <td>
                            {{ $loop->iteration + ($tickets->firstItem() - 1) }}
                        </td>

                        <td>{{ $ticket->ticket_number }}</td>

                        <td>{{ $ticket->subject }}</td>

                        <td>

                            @php

                                $priorityColor = match(strtolower($ticket->priority->name)){

                                    'low' => 'success',

                                    'medium' => 'warning',

                                    'high' => 'danger',

                                    'critical' => 'danger',

                                    default => 'secondary'

                                };

                            @endphp

                            <span class="badge bg-{{ $priorityColor }}">

                                {{ $ticket->priority->name }}

                            </span>

                        </td>

                        <td>

                        @switch($ticket->status)

                            @case('NEW')
                                <span class="badge bg-secondary">
                                    NEW
                                </span>
                                @break

                            @case('OPEN')
                                <span class="badge bg-info">
                                    OPEN
                                </span>
                                @break

                            @case('ASSIGNED')
                                <span class="badge bg-primary">
                                    ASSIGNED
                                </span>
                                @break

                            @case('IN_PROGRESS')
                                <span class="badge bg-warning text-dark">
                                    IN PROGRESS
                                </span>
                                @break

                            @case('PENDING')
                                <span class="badge bg-dark">
                                    PENDING
                                </span>
                                @break

                            @case('RESOLVED')
                                <span class="badge bg-success">
                                    RESOLVED
                                </span>
                                @break

                            @case('CLOSED')
                                <span class="badge bg-secondary">
                                    CLOSED
                                </span>
                                @break

                            @case('CANCELLED')
                                <span class="badge bg-danger">
                                    CANCELLED
                                </span>
                                @break

                            @default
                                <span class="badge bg-light text-dark">
                                    {{ $ticket->status }}
                                </span>

                        @endswitch

                        </td>

                        <td>

                            {{ $ticket->requester->name }}

                        </td>

                        <td>

                            <a
                                href="{{ route('itsupport.tickets.show',$ticket) }}"
                                class="btn btn-info btn-sm"
                            >
                                Detail
                            </a>

                            {{-- @if($ticket->status=='ASSIGNED')

                                <form
                                    action="{{ route('itsupport.tickets.progress', $ticket) }}"
                                    method="POST"
                                    class="d-inline"
                                >
                                <input type="hidden" name="status" value="IN_PROGRESS">

                                    @csrf

                                    @method('PUT')

                                    <button
                                        class="btn btn-success btn-sm"
                                    >
                                        Start
                                    </button>

                                </form>

                            @endif --}}

                            @if(in_array($ticket->status, ['ASSIGNED', 'IN_PROGRESS', 'PENDING']))

                            {{-- IN PROGRESS --}}
                            <form action="{{ route('itsupport.tickets.progress', $ticket) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="status" value="IN_PROGRESS">

                                <button type="submit"
                                        class="btn btn-warning btn-sm">
                                    In Progress
                                </button>
                            </form>

                            {{-- PENDING --}}
                            <form action="{{ route('itsupport.tickets.progress', $ticket) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="status" value="PENDING">

                                <button type="submit"
                                        class="btn btn-secondary btn-sm">
                                    Pending
                                </button>
                            </form>

                            {{-- RESOLVED --}}
                            <form action="{{ route('itsupport.tickets.progress', $ticket) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="status" value="RESOLVED">

                                <button type="submit"
                                        class="btn btn-success btn-sm">
                                    Resolved
                                </button>
                            </form>

                        @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center">

                            Tidak ada ticket.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

            {{ $tickets->links() }}

        </div>

    </div>

</div>

@endsection