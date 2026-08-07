{{-- @extends('template.main')

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
@endsection --}}

@extends('template.main')

@section('title','Ticket Detail')

@section('content')

<div class="container-fluid">

    <div class="row">

        {{-- LEFT --}}
        <div class="col-lg-8">

            {{-- Ticket Information --}}
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Ticket Information</strong>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th width="220">Ticket Number</th>
                            <td>{{ $ticket->ticket_number }}</td>
                        </tr>

                        <tr>
                            <th>Subject</th>
                            <td>{{ $ticket->subject }}</td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td>{!! nl2br(e($ticket->description)) !!}</td>
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

                                @php

                                    $badge = match($ticket->status){

                                        'NEW' => 'secondary',

                                        'ASSIGNED' => 'primary',

                                        'IN_PROGRESS' => 'warning',

                                        'PENDING' => 'dark',

                                        'RESOLVED' => 'success',

                                        'CLOSED' => 'info',

                                        'CANCELLED' => 'danger',

                                        default => 'secondary'

                                    };

                                @endphp

                                <span class="badge bg-{{ $badge }}">

                                    {{ $ticket->status }}

                                </span>

                            </td>
                        </tr>

                    </table>

                </div>
            </div>

            {{-- Assignment --}}
            <div class="card mb-3">

                <div class="card-header">
                    <strong>Assignment Information</strong>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th width="220">Assigned To</th>
                            <td>{{ $ticket->assignee?->name ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Assigned At</th>
                            <td>{{ optional($ticket->assigned_at)->format('d M Y H:i') ?? '-' }}</td>
                        </tr>

                    </table>

                </div>

            </div>

            {{-- Attachment --}}
            <div class="card">

                <div class="card-header">
                    <strong>Attachment</strong>
                </div>

                <div class="card-body">

                    @forelse($ticket->attachments as $attachment)

                        <div class="d-flex justify-content-between border rounded p-2 mb-2">

                            <div>
                                <strong>{{ $attachment->original_name }}</strong><br>
                                <small>{{ number_format($attachment->file_size/1024,2) }} KB</small>
                            </div>

                            <a
                                href="{{ route('itsupport.attachments.download',[$ticket,$attachment]) }}"
                                class="btn btn-success btn-sm">

                                Download

                            </a>

                        </div>

                    @empty

                        <div class="alert alert-light">

                            Tidak ada attachment.

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

        {{-- RIGHT --}}
        <div class="col-lg-4">

            {{-- Timeline --}}
            <div class="card mb-3">

                <div class="card-header">
                    <strong>Ticket Timeline</strong>
                </div>

                <div class="card-body">

                    @foreach($ticket->histories as $history)

                        <div class="border-start border-3 border-primary ps-3 mb-3">

                            <strong>{{ $history->action }}</strong>

                            <div>{{ $history->description }}</div>

                            <small class="text-muted">
                                {{ $history->user?->name }}
                                •
                                {{ $history->created_at->format('d M Y H:i') }}
                            </small>

                        </div>

                    @endforeach

                </div>

            </div>

            {{-- Discussion --}}
            <div class="card mb-3">

                <div class="card-header">
                    <strong>Discussion</strong>
                </div>

                <div class="card-body">

                    @forelse($ticket->comments as $comment)

                        <div class="border rounded p-2 mb-2">

                            <strong>{{ $comment->user->name }}</strong>

                            @if($comment->is_internal)
                                <span class="badge bg-warning text-dark">
                                    Internal
                                </span>
                            @endif

                            <div class="mt-2">
                                {{ $comment->comment }}
                            </div>

                            <small class="text-muted">
                                {{ $comment->created_at->format('d M Y H:i') }}
                            </small>

                        </div>

                    @empty

                        <p class="text-muted">
                            Belum ada komentar.
                        </p>

                    @endforelse

                </div>

            </div>

            {{-- Add Comment --}}
            <div class="card mb-3">

                <div class="card-header">
                    <strong>Add Comment</strong>
                </div>

                <div class="card-body">

                    <form
                        action="{{ route('itsupport.comments.store',$ticket) }}"
                        method="POST">

                        @csrf

                        <textarea
                            name="comment"
                            rows="4"
                            class="form-control mb-3"></textarea>

                        <div class="form-check mb-3">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                value="1"
                                name="is_internal"
                                id="internal">

                            <label
                                class="form-check-label"
                                for="internal">

                                Internal Comment

                            </label>

                        </div>

                        <button class="btn btn-primary w-100">

                            Kirim Komentar

                        </button>

                    </form>

                </div>

            </div>

            {{-- Action
            <div class="card">

                <div class="card-header">

                    <strong>Ticket Action</strong>

                </div>

                <div class="card-body d-grid gap-2">

                    @if($ticket->status != 'RESOLVED')

                        <a
                            href="{{ route('itsupport.tickets.resolve',$ticket) }}"
                            class="btn btn-success">

                            Resolve Ticket

                        </a>

                    @endif

                    <a
                        href="{{ route('itsupport.tickets.edit',$ticket) }}"
                        class="btn btn-warning">

                        Update Status

                    </a>

                </div>

            </div> --}}

        </div>

    </div>

</div>

@endsection