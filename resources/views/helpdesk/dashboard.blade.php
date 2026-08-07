@extends('template.main')

@section('title','Dashboard Helpdesk')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-md-3 mb-3">

            <div class="card border-primary">

                <div class="card-body text-center">

                    <h6>Total Ticket</h6>

                    <h2>{{ $data['totalTicket'] }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card border-secondary">

                <div class="card-body text-center">

                    <h6>New</h6>

                    <h2>{{ $data['newTicket'] }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card border-info">

                <div class="card-body text-center">

                    <h6>Assigned</h6>

                    <h2>{{ $data['assignedTicket'] }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card border-warning">

                <div class="card-body text-center">

                    <h6>In Progress</h6>

                    <h2>{{ $data['progressTicket'] }}</h2>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-3 mb-3">

            <div class="card border-dark">

                <div class="card-body text-center">

                    <h6>Pending</h6>

                    <h2>{{ $data['pendingTicket'] }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card border-success">

                <div class="card-body text-center">

                    <h6>Resolved</h6>

                    <h2>{{ $data['resolvedTicket'] }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card border-primary">

                <div class="card-body text-center">

                    <h6>Closed</h6>

                    <h2>{{ $data['closedTicket'] }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card border-danger">

                <div class="card-body text-center">

                    <h6>Cancelled</h6>

                    <h2>{{ $data['cancelledTicket'] }}</h2>

                </div>

            </div>

        </div>

    </div>

    <div class="card mt-3">

        <div class="card-header">

            <strong>

                10 Ticket Terbaru

            </strong>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-light">

                    <tr>

                        <th>No</th>

                        <th>Ticket</th>

                        <th>Subject</th>

                        <th>Requester</th>

                        <th>Priority</th>

                        <th>Status</th>

                        <th width="120">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($latestTickets as $ticket)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ $ticket->ticket_number }}

                            </td>

                            <td>

                                {{ $ticket->subject }}

                            </td>

                            <td>

                                {{ $ticket->requester->name }}

                            </td>

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
                                <span class="badge bg-success">
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

                                <a
                                    href="{{ route('helpdesk.tickets.show',$ticket) }}"
                                    class="btn btn-info btn-sm">

                                    Detail

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center">

                                Tidak ada data.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection