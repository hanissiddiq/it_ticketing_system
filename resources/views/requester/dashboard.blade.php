@extends('template.main')

@section('title','Dashboard Requester')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">

        <div class="col-md-3">

            <div class="card border-primary">

                <div class="card-body text-center">

                    <h6>Total Ticket</h6>

                    <h2>{{ $data['totalTicket'] }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card border-secondary">

                <div class="card-body text-center">

                    <h6>New</h6>

                    <h2>{{ $data['newTicket'] }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card border-info">

                <div class="card-body text-center">

                    <h6>Assigned</h6>

                    <h2>{{ $data['assignedTicket'] }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card border-warning">

                <div class="card-body text-center">

                    <h6>In Progress</h6>

                    <h2>{{ $data['progressTicket'] }}</h2>

                </div>

            </div>

        </div>

    </div>

    <div class="row mb-4">

        <div class="col-md-4">

            <div class="card border-dark">

                <div class="card-body text-center">

                    <h6>Pending</h6>

                    <h2>{{ $data['pendingTicket'] }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-success">

                <div class="card-body text-center">

                    <h6>Resolved</h6>

                    <h2>{{ $data['resolvedTicket'] }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-primary">

                <div class="card-body text-center">

                    <h6>Closed</h6>

                    <h2>{{ $data['closedTicket'] }}</h2>

                </div>

            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <strong>My Latest Tickets</strong>

            <a
                href="{{ route('requester.tickets.index') }}"
                class="btn btn-primary btn-sm">

                View All

            </a>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th width="50">No</th>

                        <th>Ticket Number</th>

                        <th>Subject</th>

                        <th>Category</th>

                        <th>Priority</th>

                        <th>Status</th>

                        <th width="120">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($tickets as $ticket)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $ticket->ticket_number }}</td>

                            <td>{{ $ticket->subject }}</td>

                            <td>{{ $ticket->category->name }}</td>

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

                                    @default

                                        <span class="badge bg-secondary">

                                            {{ $ticket->status }}

                                        </span>

                                @endswitch

                            </td>

                            <td>

                                <a
                                    href="{{ route('requester.tickets.show',$ticket) }}"
                                    class="btn btn-info btn-sm">

                                    Detail

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center">

                                Belum ada ticket.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection