@extends('template.main')

@section('title','My Ticket')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5 class="mb-0">

                My Ticket

            </h5>

            <a
                href="{{ route('requester.tickets.create') }}"
                class="btn btn-primary">

                <i class="bi bi-plus-circle"></i>

                Create Ticket

            </a>

        </div>

        <div class="card-body">

            <form
                method="GET"
                action="{{ route('requester.tickets.index') }}">

                <div class="row mb-3">

                    <div class="col-md-4">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Search Ticket..."
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-md-3">

                        <select
                            name="status"
                            class="form-select">

                            <option value="">

                                All Status

                            </option>

                            @foreach([
                                'NEW',
                                'ASSIGNED',
                                'IN_PROGRESS',
                                'PENDING',
                                'RESOLVED',
                                'CLOSED',
                                'CANCELLED'
                            ] as $status)

                                <option
                                    value="{{ $status }}"
                                    @selected(request('status') == $status)>

                                    {{ $status }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-2">

                        <button
                            class="btn btn-primary w-100">

                            Search

                        </button>

                    </div>

                    <div class="col-md-2">

                        <a
                            href="{{ route('requester.tickets.index') }}"
                            class="btn btn-secondary w-100">

                            Reset

                        </a>

                    </div>

                </div>

            </form>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="60">

                                No

                            </th>

                            <th>

                                Ticket Number

                            </th>

                            <th>

                                Subject

                            </th>

                            <th>

                                Category

                            </th>

                            <th>

                                Priority

                            </th>

                            <th>

                                Assigned To

                            </th>

                            <th>

                                Status

                            </th>

                            <th>

                                Created At

                            </th>

                            <th width="120">

                                Action

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($tickets as $ticket)

                            <tr>

                                <td>

                                    {{ $tickets->firstItem() + $loop->index }}

                                </td>

                                <td>

                                    {{ $ticket->ticket_number }}

                                </td>

                                <td>

                                    {{ $ticket->subject }}

                                </td>

                                <td>

                                    {{ $ticket->category?->name }}

                                </td>

                                <td>

                                    {{ $ticket->priority?->name }}

                                </td>

                                <td>

                                    {{ $ticket->assignee?->name ?? '-' }}

                                </td>

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

                                <td>

                                    {{ $ticket->created_at->format('d M Y H:i') }}

                                </td>

                                <td>

                                    <a
                                        href="{{ route('requester.tickets.show',$ticket) }}"
                                        class="btn btn-sm btn-info">

                                        Detail

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="9"
                                    class="text-center">

                                    No ticket found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $tickets->withQueryString()->links() }}

            </div>

        </div>

    </div>

</div>

@endsection