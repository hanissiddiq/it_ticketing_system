@extends('template.main')

@section('title', 'Laporan Kinerja IT Support')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="mb-1 fw-bold">
                Laporan Kinerja Agen / IT Support
            </h4>

            <div class="text-primary">
                Periode:
                {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }}
                -
                {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}
            </div>
        </div>

        <button
            onclick="window.print()"
            class="btn btn-dark">

            <span class="material-icons-outlined align-middle">
                print
            </span>

            Cetak Laporan

        </button>

    </div>


    {{-- FILTER --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <form method="GET">

                <div class="row g-3 align-items-end">

                    <div class="col-md-3">

                        <label class="form-label fw-semibold">
                            Dari Tanggal
                        </label>

                        <input
                            type="date"
                            name="start_date"
                            value="{{ $startDate }}"
                            class="form-control">

                    </div>


                    <div class="col-md-3">

                        <label class="form-label fw-semibold">
                            Sampai Tanggal
                        </label>

                        <input
                            type="date"
                            name="end_date"
                            value="{{ $endDate }}"
                            class="form-control">

                    </div>


                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            IT Support / Agent
                        </label>

                        <select
                            name="agent_id"
                            class="form-select">

                            <option value="">
                                Semua IT Support
                            </option>

                            @foreach($agents as $agent)

                                <option
                                    value="{{ $agent->id }}"
                                    @selected($agentId == $agent->id)
                                >

                                    {{ $agent->name }}

                                    @if($agent->employee_id)
                                        - {{ $agent->employee_id }}
                                    @endif

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="col-md-2">

                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            Tampilkan

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- KPI --}}
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-3 mb-4">

        <div class="col">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="text-primary small">
                        TOTAL TIKET
                    </div>

                    <h2 class="fw-bold mb-0">
                        {{ $totalTicket }}
                    </h2>

                </div>

            </div>

        </div>


        <div class="col">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="text-primary small">
                        TIKET SELESAI
                    </div>

                    <h2 class="fw-bold text-success mb-0">

                        {{ $resolved + $closed }}

                    </h2>

                    <small class="text-primary">
                        Resolved {{ $resolved }} |
                        Closed {{ $closed }}
                    </small>

                </div>

            </div>

        </div>


        <div class="col">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="text-primary small">
                        COMPLETION RATE
                    </div>

                    <h2 class="fw-bold text-primary mb-0">

                        {{ $completionRate }}%

                    </h2>

                </div>

            </div>

        </div>


        <div class="col">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="text-primary small">
                        RATA-RATA PENYELESAIAN
                    </div>

                    <h5 class="fw-bold text-info mb-0">

                        {{ $averageResolution }}

                    </h5>

                </div>

            </div>

        </div>

    </div>


    {{-- KPI 2 --}}
    <div class="row g-3 mb-4">

        <div class="col-md-3">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <span class="text-primary small">
                        IN PROGRESS
                    </span>

                    <h4 class="fw-bold text-warning">
                        {{ $inProgress }}
                    </h4>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <span class="text-primary small">
                        PENDING
                    </span>

                    <h4 class="fw-bold text-warning">
                        {{ $pending }}
                    </h4>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <span class="text-primary small">
                        OVERDUE
                    </span>

                    <h4 class="fw-bold text-danger">
                        {{ $overdue }}
                    </h4>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <span class="text-primary small">
                        ASSIGNED
                    </span>

                    <h4 class="fw-bold">
                        {{ $assignedTicket }}
                    </h4>

                </div>

            </div>

        </div>

    </div>


    {{-- PERFORMANCE AGENT --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-header bg-white py-3">

            <h5 class="mb-0 text-primary fw-bold">
                Kinerja Per IT Support
            </h5>

        </div>


        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>No</th>

                        <th>IT Support</th>

                        <th class="text-center">
                            Assigned
                        </th>

                        <th class="text-center">
                            In Progress
                        </th>

                        <th class="text-center">
                            Pending
                        </th>

                        <th class="text-center">
                            Resolved
                        </th>

                        <th class="text-center">
                            Closed
                        </th>

                        <th class="text-center">
                            Overdue
                        </th>

                        <th class="text-center">
                            Completion
                        </th>

                        <th>
                            Avg. Resolution
                        </th>

                    </tr>

                </thead>


                <tbody>

                @forelse($performance as $agent)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>

                            <div class="fw-semibold">
                                {{ $agent['name'] }}
                            </div>

                            @if($agent['employee_id'])

                                <small class="text-muted">
                                    {{ $agent['employee_id'] }}
                                </small>

                            @endif

                        </td>


                        <td class="text-center">
                            {{ $agent['assigned'] }}
                        </td>


                        <td class="text-center">

                            @if($agent['in_progress'] > 0)

                                <span class="badge bg-warning text-dark">
                                    {{ $agent['in_progress'] }}
                                </span>

                            @else

                                0

                            @endif

                        </td>


                        <td class="text-center">

                            @if($agent['pending'] > 0)

                                <span class="badge bg-secondary">
                                    {{ $agent['pending'] }}
                                </span>

                            @else

                                0

                            @endif

                        </td>


                        <td class="text-center">

                            <span class="badge bg-success">
                                {{ $agent['resolved'] }}
                            </span>

                        </td>


                        <td class="text-center">
                            {{ $agent['closed'] }}
                        </td>


                        <td class="text-center">

                            @if($agent['overdue'] > 0)

                                <span class="badge bg-danger">
                                    {{ $agent['overdue'] }}
                                </span>

                            @else

                                0

                            @endif

                        </td>


                        <td class="text-center">

                            {{ $agent['completion_rate'] }}%

                        </td>


                        <td>

                            {{ $agent['average_resolution'] }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="10"
                            class="text-center text-muted py-4">

                            Tidak ada data IT Support.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- DETAIL TICKET --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white py-3">

            <h5 class="mb-0 text-primary fw-bold">
                Detail Tiket
            </h5>

        </div>


        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>No</th>

                        <th>Ticket</th>

                        <th>Subject</th>

                        <th>Requester</th>

                        <th>IT Support</th>

                        <th>Priority</th>

                        <th>Status</th>

                        <th>Tanggal Masuk</th>

                        <th>Due Date</th>

                        <th>Resolved</th>

                    </tr>

                </thead>


                <tbody>

                @forelse($tickets as $ticket)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td class="fw-semibold">
                            {{ $ticket->ticket_number }}
                        </td>

                        <td>
                            {{ $ticket->subject }}
                        </td>

                        <td>
                            {{ $ticket->requester->name ?? '-' }}
                        </td>

                        <td>
                            {{ $ticket->assignee->name ?? 'Belum ditugaskan' }}
                        </td>

                        <td>

                            {{ $ticket->priority->name ?? '-' }}

                        </td>

                        <td>

                            @php

                                $badge = match($ticket->status) {

                                    'NEW' => 'secondary',
                                    'OPEN' => 'info',
                                    'ASSIGNED' => 'primary',
                                    'IN_PROGRESS' => 'warning',
                                    'PENDING' => 'dark',
                                    'ESCALATED' => 'danger',
                                    'RESOLVED' => 'success',
                                    'CLOSED' => 'success',
                                    'CANCELLED' => 'secondary',

                                    default => 'secondary'

                                };

                            @endphp

                            <span class="badge bg-{{ $badge }}">

                                {{ $ticket->status }}

                            </span>

                        </td>


                        <td>

                            {{ $ticket->created_at?->format('d/m/Y H:i') }}

                        </td>


                        <td>

                            {{ $ticket->due_at?->format('d/m/Y H:i') ?? '-' }}

                        </td>


                        <td>

                            {{ $ticket->resolved_at?->format('d/m/Y H:i') ?? '-' }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="10"
                            class="text-center text-muted py-4">

                            Tidak ada tiket pada periode ini.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection


@push('styles')

<style>

@media print {

    @page {
        size: landscape;
        margin: 10mm;
    }

    body {
        background: white !important;
    }

    .sidebar,
    .navbar,
    .header,
    .btn,
    form {
        display: none !important;
    }

    .card {
        box-shadow: none !important;
        border: 1px solid #ddd !important;
    }

    .container-fluid {
        width: 100% !important;
    }

}

</style>

@endpush