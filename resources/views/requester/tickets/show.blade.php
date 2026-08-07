@extends('template.main')

@section('title','Ticket Detail')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-8">

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

            <div class="card mb-3">

                <div class="card-header">

                    <strong>Assignment Information</strong>

                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>

                            <th width="220">

                                Assigned To

                            </th>

                            <td>

                                {{ $ticket->assignee?->name ?? '-' }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Assigned Date

                            </th>

                            <td>

                                {{ optional($ticket->assigned_at)->format('d M Y H:i') ?? '-' }}

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

            <div class="card mb-3">

                <div class="card-header">

                    <strong>Attachment</strong>

                </div>

                <div class="card-body">

                    @forelse($ticket->attachments as $attachment)

                        <div class="d-flex justify-content-between border rounded p-2 mb-2">

                            <div>

                                <strong>

                                    {{ $attachment->original_name }}

                                </strong>

                                <br>

                                <small>

                                    {{ number_format($attachment->file_size/1024,2) }} KB

                                </small>

                            </div>

                            <div>

                                <a
                                    href="{{ route('requester.attachments.download',[$ticket,$attachment]) }}"
                                    class="btn btn-success btn-sm">

                                    Download

                                </a>

                            </div>

                        </div>

                    @empty

                        <div class="alert alert-light">

                            Tidak ada attachment.

                        </div>

                    @endforelse

                </div>

            </div>

            







        </div>

        <div class="col-lg-4">

            <div class="card mb-3">

                <div class="card-header">

                    Ticket Timeline

                </div>

                <div class="card-body">

                    @forelse($ticket->histories as $history)

                        <div class="border-bottom mb-3 pb-2">

                            <strong>

                                {{ $history->action }}

                            </strong>

                            <br>

                            <small>

                                {{ $history->description }}

                            </small>

                            <br>

                            <small class="text-muted">

                                {{ $history->user?->name }}

                                •

                                {{ $history->created_at->format('d M Y H:i') }}

                            </small>

                        </div>

                    @empty

                        <p class="text-muted">

                            Belum ada history.

                        </p>

                    @endforelse

                </div>

            </div>

            <div class="card mb-3">

                <div class="card-header">

                    Comment

                </div>

                <div class="card-body">
                   
                    
                    @forelse($ticket->comments as $comment)
                        {{-- Lewati/sembunyikan jika komentar bersifat internal --}}
                        @if($comment->is_internal)
                            @continue
                        @endif

                        <div class="border rounded p-2 mb-2">

                            
                            <!-- Header komentar: nama user di kiri, tombol hapus di kanan -->
            <div class="d-flex justify-content-between align-items-start">
                <strong>
                    {{ $comment->user->name }}
                </strong>

                @if(auth()->id() == $comment->user_id)
                    <form action="{{ route('requester.comments.destroy', [$ticket, $comment]) }}" 
                          method="POST" 
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger border-0 p-1 lh-1" 
                                title="Hapus komentar"
                                onclick="return confirm('Hapus komentar ini?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                @endif
            </div>

                            {{ $comment->comment }}
                            

                            <br>

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

            @if($ticket->status=='RESOLVED')

                <div class="card">

                    <div class="card-body text-center">

                        <form
                            action="{{ route('requester.tickets.close',$ticket) }}"
                            method="POST">

                            @csrf

                            @method('PUT')

                            <button
                                class="btn btn-success w-100"
                                onclick="return confirm('Tutup ticket ini?')">

                                Close Ticket

                            </button>

                        </form>

                    </div>

                </div>

            @endif

            <div class="card mt-3">

                <div class="card-header">

                    <h5 class="mb-0">

                        <i class="bi bi-chat-dots"></i>

                        Ticket Discussion

                    </h5>

                </div>

                <div class="card-body">
                    <form
                action="{{ route('requester.comments.store',$ticket) }}"
                method="POST">

                @csrf

                <div class="mb-3">

                    <textarea
                        name="comment"
                        rows="4"
                        class="form-control"
                        placeholder="Tulis komentar..."></textarea>

                </div>

                <div class="form-check mb-3">

                    {{-- <input
                        class="form-check-input"
                        type="checkbox"
                        name="is_internal"
                        value="1"
                        id="internal">

                    <label
                        class="form-check-label"
                        for="internal">

                        Internal Comment

                    </label> --}}

                </div>

                <button class="btn btn-primary">

                    <i class="bi bi-send"></i>

                    Kirim

                </button>

            </form>
            </div>

        </div>


    </div>

</div>

@endsection