@extends('template.main')

@section('title', 'Dashboard IT Support')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">

        <div class="col-md-3">

            <div class="card border-primary">

                <div class="card-body text-center">

                    <h6>Total Ticket</h6>

                    <h2 class="text-primary">
                        {{ $data['myTicket'] }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card border-warning">

                <div class="card-body text-center">

                    <h6>In Progress</h6>

                    <h2 class="text-warning">
                        {{ $data['progress'] }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card border-dark">

                <div class="card-body text-center">

                    <h6>Pending</h6>

                    <h2 class="text-dark">
                        {{ $data['pending'] }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card border-success">

                <div class="card-body text-center">

                    <h6>Resolved</h6>

                    <h2 class="text-success">
                        {{ $data['resolved'] }}
                    </h2>

                </div>

            </div>

        </div>

    </div>


    <div class="card">

        <div class="card-header">

            <div class="d-flex justify-content-between align-items-center">

                <h5 class="mb-0">
                    My Assigned Ticket
                </h5>

                <a href="{{ route('itsupport.tickets.index') }}"
                    class="btn btn-primary btn-sm">

                    View All Ticket

                </a>

            </div>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">

                <tr>

                    <th width="50">No</th>

                    <th>Ticket Number</th>

                    <th>Subject</th>

                    <th>Priority</th>

                    <th>Status</th>

                    <th width="180">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($tickets as $ticket)

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

                            @switch($ticket->priority->name)

                                @case('LOW')

                                    <span class="badge bg-success">

                                        LOW

                                    </span>

                                @break

                                @case('MEDIUM')

                                    <span class="badge bg-primary">

                                        MEDIUM

                                    </span>

                                @break

                                @case('HIGH')

                                    <span class="badge bg-warning text-dark">

                                        HIGH

                                    </span>

                                @break

                                @case('CRITICAL')

                                    <span class="badge bg-danger">

                                        CRITICAL

                                    </span>

                                @break

                                @default

                                    {{ $ticket->priority->name }}

                            @endswitch

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

                            <a href="{{ route('itsupport.tickets.show',$ticket) }}"
                                class="btn btn-info btn-sm">

                                Detail

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            Tidak ada ticket yang ditugaskan.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection