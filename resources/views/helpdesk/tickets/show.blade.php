@extends('template.main')
@section('content')
{{--
    === Header Ticket ===
--}}
<div class="d-flex justify-content-between align-items-center mb-3">

    <div>

        <h4 class="mb-0">

            {{ $ticket->ticket_number }}

        </h4>

        <small class="text-muted">

            Detail Ticket Helpdesk

        </small>

    </div>

    <div>

        <a
            href="{{ route('tickets.index') }}"
            class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Kembali

        </a>

        @can('ticket-edit')

        <a
            href="{{ route('tickets.edit',$ticket) }}"
            class="btn btn-warning">

            Edit

        </a>

        @endcan

    </div>

</div>
{{--
    === End Header Ticket ===
--}}


{{--
    ===  Ticket Information ===
--}}
<div class="card h-100">

    <div class="card-header">

        <strong>

            Ticket Information

        </strong>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-sm">

            <tr>
                <th width="180">Ticket Number</th>
                <td>{{ $ticket->ticket_number }}</td>
            </tr>

            <tr>
                <th>Subject</th>
                <td>{{ $ticket->subject }}</td>
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
                <td>{{ $ticket->priority->name }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>

                    {{-- Badge Status --}}
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

            </tr>

            <tr>
                <th>Created</th>
                <td>{{ $ticket->created_at->format('d M Y H:i') }}</td>
            </tr>

            <tr>
                <th>Updated</th>
                <td>{{ $ticket->updated_at->format('d M Y H:i') }}</td>
            </tr>

        </table>

    </div>

</div>
{{--
    ===  end Ticket Information ===
--}}



{{--
    ===  Requester Information ===
--}}

<div class="card h-100">

    <div class="card-header">

        <strong>

            Requester Information

        </strong>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-sm">

            <tr>

                <th width="180">

                    Name

                </th>

                <td>

                    {{ $ticket->requester->name }}

                </td>

            </tr>

            <tr>

                <th>

                    Department

                </th>

                <td>

                    {{ $ticket->department->name }}

                </td>

            </tr>

            <tr>

                <th>

                    Email

                </th>

                <td>

                    {{ $ticket->requester->email }}

                </td>

            </tr>

            <tr>

                <th>

                    Assigned To

                </th>

                <td>

                    {{ optional($ticket->assignee)->name ?? '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Updated By

                </th>

                <td>

                    {{ optional($ticket->updatedBy)->name ?? '-' }}

                </td>

            </tr>

        </table>

    </div>

</div>
{{--
    ===  end Requester Information ===
--}}


{{--
    ===  Description ===
--}}
<div class="card mt-3">

    <div class="card-header">

        <strong>

            Description

        </strong>

    </div>

    <div class="card-body">

        {!! nl2br(e($ticket->description)) !!}

    </div>

</div>
{{--
    ===  end Description ===
--}}

{{--
    ===  Assigment Information ===
--}}
<div class="card mt-3">

    <div class="card-header d-flex justify-content-between align-items-center">

        <strong>
            Assignment Information
        </strong>

        @can('ticket-assignment')

            <a href="{{ route('tickets.assignment.create', $ticket) }}"
                class="btn btn-primary btn-sm">

                <i class="bi bi-person-plus-fill"></i>

                Assign Ticket

            </a>

        @endcan

    </div>

    <div class="card-body">

        @if($ticket->assignments->count())

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-light">

                        <tr>

                            <th width="50">No</th>

                            <th>Assigned By</th>

                            <th>Assigned To</th>

                            <th>Assigned At</th>

                            <th>Notes</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($ticket->assignments as $assignment)

                            <tr>

                                <td>

                                    {{ $loop->iteration }}

                                </td>

                                <td>

                                    {{ optional($assignment->assigner)->name }}

                                </td>

                                <td>

                                    {{ optional($assignment->assignee)->name }}

                                </td>

                                <td>

                                    {{ optional($assignment->assigned_at)->format('d M Y H:i') }}

                                </td>

                                <td>

                                    {{ $assignment->notes ?: '-' }}

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="alert alert-warning mb-0">

                Ticket ini belum pernah di-assign.

            </div>

        @endif

    </div>

</div>
{{--
    ===  end Assigment Information ===
--}}

{{--
    ===  Activity History ===
--}}
<div class="card mt-3">

    <div class="card-header">

        <strong>

            Activity History

        </strong>

    </div>

    <div class="card-body">

        @if($ticket->histories->count())

            <div class="table-responsive">

                <table class="table table-striped table-bordered">

                    <thead class="table-light">

                        <tr>

                            <th width="50">No</th>

                            <th width="170">Date</th>

                            <th>User</th>

                            <th>Action</th>

                            <th>Field</th>

                            <th>Old Value</th>

                            <th>New Value</th>

                            <th>Description</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($ticket->histories as $history)

                            <tr>

                                <td>

                                    {{ $loop->iteration }}

                                </td>

                                <td>

                                    {{ $history->created_at->format('d M Y H:i') }}

                                </td>

                                <td>

                                    {{ optional($history->user)->name }}

                                </td>

                                <td>

                                    <span class="badge bg-info">

                                        {{ $history->action }}

                                    </span>

                                </td>

                                <td>

                                    {{ $history->field ?: '-' }}

                                </td>

                                <td>

                                    {{ $history->old_value ?: '-' }}

                                </td>

                                <td>

                                    {{ $history->new_value ?: '-' }}

                                </td>

                                <td>

                                    {{ $history->description }}

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="alert alert-info mb-0">

                Belum ada riwayat aktivitas ticket.

            </div>

        @endif

    </div>

</div>
{{--
    ===  end Activity History ===
--}}


{{--
    ===  Attachment Lampiran ===
--}}
<div class="card mt-3">

    <div class="card-header d-flex justify-content-between align-items-center">

        <strong>
            Attachment
        </strong>

        @can('ticket-edit')

            <button
                class="btn btn-primary btn-sm"
                disabled>

                <i class="bi bi-paperclip"></i>

                Upload Attachment

            </button>

        @endcan

    </div>

    <div class="card-body">

        @if(isset($ticket->attachments) && $ticket->attachments->count())

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-light">

                        <tr>

                            <th width="50">No</th>

                            <th>File Name</th>

                            <th>Uploaded By</th>

                            <th>Uploaded At</th>

                            <th width="120">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($ticket->attachments as $attachment)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $attachment->original_name }}</td>

                                <td>{{ optional($attachment->user)->name }}</td>

                                <td>{{ $attachment->created_at->format('d M Y H:i') }}</td>

                                <td>

                                    <a
                                        href="{{ asset('storage/'.$attachment->file_path) }}"
                                        target="_blank"
                                        class="btn btn-success btn-sm">

                                        Download

                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="alert alert-secondary mb-0">

                Belum ada attachment.

            </div>

        @endif

    </div>

</div>
{{--
    ===  end Attachment Lampiran ===
--}}

{{--
    ===  Action Button ===
--}}
<div class="card mt-3">

    <div class="card-header">

        <strong>

            Action

        </strong>

    </div>

    <div class="card-body">

        <div class="d-flex flex-wrap gap-2">

            @can('ticket-edit')

                <a
                    href="{{ route('tickets.edit',$ticket) }}"
                    class="btn btn-warning">

                    Edit Ticket

                </a>

            @endcan


            @can('ticket-assignment')

                @if(!$ticket->assigned_to)

                    <a
                        href="{{ route('tickets.assignment.create',$ticket) }}"
                        class="btn btn-primary">

                        Assign IT Support

                    </a>

                @else

                    <a
                        href="{{ route('tickets.assignment.create',$ticket) }}"
                        class="btn btn-outline-primary">

                        Reassign Ticket

                    </a>

                @endif

            @endcan


            @can('ticket-delete')

                <form
                    action="{{ route('tickets.destroy',$ticket) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus ticket ini?')">

                    @csrf

                    @method('DELETE')

                    <button
                        class="btn btn-danger">

                        Delete

                    </button>

                </form>

            @endcan


            @if($ticket->status=='RESOLVED')

                <button
                    class="btn btn-success"
                    disabled>

                    Ticket Resolved

                </button>

            @endif


            @if($ticket->status=='CLOSED')

                <button
                    class="btn btn-secondary"
                    disabled>

                    Ticket Closed

                </button>

            @endif


            <a
                href="{{ route('helpdesk.dashboard') }}"
                class="btn btn-outline-secondary">

                Back

            </a>

        </div>

    </div>

</div>
{{--
    ===  end Action Button ===
--}}

@endsection