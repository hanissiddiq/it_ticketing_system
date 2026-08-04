@extends('template.main')

@section('content')

<div class="container-fluid">

    <div class="row">

        {{-- LEFT COLUMN --}}
        <div class="col-lg-4">

            {{-- Ticket Summary --}}
            <div class="card shadow-sm mb-3">

                <div class="card-body text-center">

                    <h4 class="mb-2">

                        {{ $ticket->ticket_number }}

                    </h4>

                    <span class="badge bg-{{ $ticket->status_badge_class ?? 'secondary' }} fs-6">

                        {{ str_replace('_',' ', $ticket->status) }}

                    </span>

                    <hr>

                    <h5>

                        {{ $ticket->subject }}

                    </h5>

                    <p class="text-muted">

                        {{ $ticket->priority->name }}

                    </p>

                </div>

            </div>

            {{-- Requester --}}
            <div class="card shadow-sm">

                <div class="card-header">

                    <strong>

                        Requester Information

                    </strong>

                </div>

                <div class="card-body">

                    <table class="table table-borderless mb-0">

                        <tr>

                            <th width="120">

                                Name

                            </th>

                            <td>

                                {{ $ticket->requester->name }}

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

                                Department

                            </th>

                            <td>

                                {{ $ticket->department->name }}

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

        </div>

        {{-- RIGHT COLUMN --}}
        <div class="col-lg-8">

            <div class="card shadow-sm">

                <div class="card-header">

                    <strong>

                        Ticket Detail

                    </strong>

                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>

                            <th width="220">

                                Ticket Number

                            </th>

                            <td>

                                {{ $ticket->ticket_number }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Subject

                            </th>

                            <td>

                                {{ $ticket->subject }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Description

                            </th>

                            <td>

                                {!! nl2br(e($ticket->description)) !!}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Category

                            </th>

                            <td>

                                {{ $ticket->category->name }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Sub Category

                            </th>

                            <td>

                                {{ $ticket->subCategory->name }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Priority

                            </th>

                            <td>

                                {{ $ticket->priority->name }}

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

                                Assigned To

                            </th>

                            <td>

                                {{ $ticket->assignee?->name ?? 'Not Assigned' }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Due Date

                            </th>

                            <td>

                                {{ $ticket->due_at?->format('d M Y H:i') ?? '-' }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Created At

                            </th>

                            <td>

                                {{ $ticket->created_at->format('d M Y H:i') }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Updated At

                            </th>

                            <td>

                                {{ $ticket->updated_at->format('d M Y H:i') }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Updated By

                            </th>

                            <td>

                               {{ $ticket->updatedBy?->name ?? 'Not Updated' }}

                            </td>

                        </tr>

                    </table>

                </div>

                <div class="card-footer d-flex justify-content-between">

                    <a
                        href="{{ route('tickets.index') }}"
                        class="btn btn-secondary">

                        Back

                    </a>

                    <div>

                        @can('ticket.update')

                        <a
                            href="{{ route('tickets.edit',$ticket) }}"
                            class="btn btn-warning">

                            Edit Ticket

                        </a>

                        @endcan

                    </div>
                    <div>
                        @can('ticket.assignment')

                            <a
                                href="{{ route('tickets.assignment.create',$ticket) }}"
                                class="btn btn-primary">

                                Assign Ticket

                            </a>

                            @endcan
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection