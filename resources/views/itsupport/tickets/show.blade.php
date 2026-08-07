@extends('template.main')

@section('content')
<div class="card mb-3">

    <div class="card-header">
        <h5 class="mb-0">Ticket Information</h5>
    </div>

    <div class="card-body">

        <table class="table table-bordered align-middle">

            <tbody>

                <tr>
                    <th width="220">Ticket Number</th>
                    <td>{{ $ticket->ticket_number }}</td>
                </tr>

                <tr>
                    <th>Subject</th>
                    <td>{{ $ticket->subject }}</td>
                </tr>

                <tr>
                    <th>Requester</th>
                    <td>{{ $ticket->requester->name }}</td>
                </tr>

                <tr>
                    <th>Department</th>
                    <td>{{ $ticket->department->name }}</td>
                </tr>

                <tr>
                    <th>Category</th>
                    <td>{{ $ticket->category->name }}</td>
                </tr>

                <tr>
                    <th>Sub Category</th>
                    <td>{{ $ticket->subCategory->name }}</td>
                </tr>

                <tr>
                    <th>Priority</th>
                    <td>

                        @switch($ticket->priority->name)

                            @case('LOW')
                                <span class="badge bg-success">LOW</span>
                                @break

                            @case('MEDIUM')
                                <span class="badge bg-primary">MEDIUM</span>
                                @break

                            @case('HIGH')
                                <span class="badge bg-warning text-dark">HIGH</span>
                                @break

                            @case('CRITICAL')
                                <span class="badge bg-danger">CRITICAL</span>
                                @break

                            @default
                                <span class="badge bg-secondary">
                                    {{ $ticket->priority->name }}
                                </span>

                        @endswitch

                    </td>
                </tr>

                <tr>
                    <th>Status</th>
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
                </tr>

                <tr>
                    <th>Created At</th>
                    <td>
                        {{ $ticket->created_at->format('d M Y H:i') }}
                    </td>
                </tr>

                <tr>
                    <th>Last Updated</th>
                    <td>
                        {{ $ticket->updated_at->format('d M Y H:i') }}
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>
@endsection