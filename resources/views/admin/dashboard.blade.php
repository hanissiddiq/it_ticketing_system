

<!-- =====================================
=====================================
===================================== -->

@extends('template.main')

<!-- @section('title','Dashboard Admin') -->

@section('content')

<div class="container-fluid">

    <!-- Card Stats Row -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3 mb-4">
        
        <!-- Total Ticket -->
        <div class="col">
            <div class="card rounded-4 mb-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="wh-48 d-flex bg-primary text-primary bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">confirmation_number</span>
                        </div>
                        <div class="text-end">
                            <h4 class="mb-0 fw-bold">{{ $data['totalTicket'] }}</h4>
                            <p class="mb-0 text-secondary">Total Ticket</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- New -->
        <div class="col">
            <div class="card rounded-4 mb-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="wh-48 d-flex bg-secondary text-secondary bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">mark_email_unread</span>
                        </div>
                        <div class="text-end">
                            <h4 class="mb-0 fw-bold">{{ $data['newTicket'] }}</h4>
                            <p class="mb-0 text-secondary">New</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
        <!-- Assigned -->
        <div class="col">
            <div class="card rounded-4 mb-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="wh-48 d-flex bg-info text-info bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">assignment_ind</span>
                        </div>
                        <div class="text-end">
                            <h4 class="mb-0 fw-bold">{{ $data['assignedTicket'] }}</h4>
                            <p class="mb-0 text-secondary">Assigned</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- In Progress -->
        <div class="col">
            <div class="card rounded-4 mb-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="wh-48 d-flex bg-warning text-warning bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">pending_actions</span>
                        </div>
                        <div class="text-end">
                            <h4 class="mb-0 fw-bold">{{ $data['progressTicket'] }}</h4>
                            <p class="mb-0 text-secondary">In Progress</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending -->
        <div class="col">
            <div class="card rounded-4 mb-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="wh-48 d-flex bg-warning text-warning bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">hourglass_empty</span>
                        </div>
                        <div class="text-end">
                            <h4 class="mb-0 fw-bold">{{ $data['pendingTicket'] }}</h4>
                            <p class="mb-0 text-secondary">Pending</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resolved -->
        <div class="col">
            <div class="card rounded-4 mb-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="wh-48 d-flex bg-success text-success bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">task_alt</span>
                        </div>
                        <div class="text-end">
                            <h4 class="mb-0 fw-bold">{{ $data['resolvedTicket'] }}</h4>
                            <p class="mb-0 text-secondary">Resolved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Closed -->
        <div class="col">
            <div class="card rounded-4 mb-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="wh-48 d-flex bg-primary text-primary bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">lock</span>
                        </div>
                        <div class="text-end">
                            <h4 class="mb-0 fw-bold">{{ $data['closedTicket'] }}</h4>
                            <p class="mb-0 text-secondary">Closed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cancelled -->
        <div class="col">
            <div class="card rounded-4 mb-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="wh-48 d-flex bg-danger text-danger bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">cancel</span>
                        </div>
                        <div class="text-end">
                            <h4 class="mb-0 fw-bold">{{ $data['cancelledTicket'] }}</h4>
                            <p class="mb-0 text-secondary">Cancelled</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!--end row-->


    

    <!-- Table Section -->
    <div class="card rounded-4 border-0 shadow-sm mt-3">
        <div class="card-header bg-transparent py-3">
            <h6 class="mb-0 fw-bold">10 Ticket Terbaru</h6>
        </div>
        <div class="card-body table-responsive">
            <table class="table align-middle table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Ticket</th>
                        <th>Subject</th>
                        <th>Requester</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th width="120" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestTickets as $ticket)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-bold">{{ $ticket->ticket_number }}</td>
                            <td>{{ $ticket->subject }}</td>
                            <td>{{ $ticket->requester->name }}</td>
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
                                <span class="badge bg-{{ $priorityColor }} bg-opacity-10 text-{{ $priorityColor }} px-2 py-1">
                                    {{ $ticket->priority->name }}
                                </span>
                            </td>
                            <td>
                                @switch($ticket->status)
                                    @case('NEW')
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary px-2 py-1">NEW</span>
                                        @break
                                    @case('OPEN')
                                        <span class="badge bg-info bg-opacity-10 text-info px-2 py-1">OPEN</span>
                                        @break
                                    @case('ASSIGNED')
                                        <span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1">ASSIGNED</span>
                                        @break
                                    @case('IN_PROGRESS')
                                        <span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1">IN PROGRESS</span>
                                        @break
                                    @case('PENDING')
                                        <span class="badge bg-dark bg-opacity-10 text-dark px-2 py-1">PENDING</span>
                                        @break
                                    @case('RESOLVED')
                                        <span class="badge bg-success bg-opacity-10 text-success px-2 py-1">RESOLVED</span>
                                        @break
                                    @case('CLOSED')
                                        <span class="badge bg-success bg-opacity-10 text-success px-2 py-1">CLOSED</span>
                                        @break
                                    @case('CANCELLED')
                                        <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1">CANCELLED</span>
                                        @break
                                    @default
                                        <span class="badge bg-light text-dark px-2 py-1">{{ $ticket->status }}</span>
                                @endswitch
                            </td>
                            <td class="text-center">
                                <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-outline-info btn-sm rounded-3">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
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