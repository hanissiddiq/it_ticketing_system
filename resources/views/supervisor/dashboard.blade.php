@extends('template.main')

@section('title', 'Dashboard IT Supervisor')

@section('content')
<div class="container-fluid">

    <!-- Row 1: Quick Alert Cards (Operasional Harian) -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 mb-4">
        <!-- Belum Ditugaskan -->
        <div class="col">
            <div class="card rounded-4 border-0 shadow-sm h-100 bg-danger bg-opacity-10">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-1 text-danger small fw-bold text-uppercase">Belum Ditugaskan</p>
                            <h3 class="mb-0 fw-bold text-danger">{{ $data['unassignedTicket'] }}</h3>
                            <small class="text-secondary">Butuh plotting segera</small>
                        </div>
                        <div class="wh-48 d-flex bg-danger text-danger bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">assignment_late</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Antrean Aktif -->
        <div class="col">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-1 text-secondary small fw-bold text-uppercase">Total Antrean Aktif</p>
                            <h3 class="mb-0 fw-bold text-dark">{{ $data['activeTicket'] }}</h3>
                            <small class="text-secondary">Total beban kerja tim</small>
                        </div>
                        <div class="wh-48 d-flex bg-primary text-primary bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">hourglass_full</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tiket Kritis Berjalan -->
        <div class="col">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-1 text-warning small fw-bold text-uppercase">Tiket Kritis Aktif</p>
                            <h3 class="mb-0 fw-bold text-warning">{{ $data['overdueCritical'] }}</h3>
                            <small class="text-secondary">Prioritas Critical/High</small>
                        </div>
                        <div class="wh-48 d-flex bg-warning text-warning bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">gpp_maybe</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Selesai Hari Ini -->
        <div class="col">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-1 text-success small fw-bold text-uppercase">Resolved Hari Ini</p>
                            <h3 class="mb-0 fw-bold text-success">{{ $data['resolvedToday'] }}</h3>
                            <small class="text-secondary">Diselesaikan hari ini</small>
                        </div>
                        <div class="wh-48 d-flex bg-success text-success bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">done_all</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 2: Visualisasi Grafik Operasional -->
    <div class="row g-4 mb-4">
        <!-- Status Tiket Saat Ini (Bar Chart) -->
        <div class="col-12 col-lg-7">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-header bg-transparent py-3">
                    <h6 class="mb-0 fw-bold">Penyebaran Status Tiket Terbuka</h6>
                </div>
                <div class="card-body">
                    <div id="statusOverviewChart" style="min-height: 300px;"></div>
                </div>
            </div>
        </div>

        <!-- Prioritas Tiket Terbuka (Donut Chart) -->
        <div class="col-12 col-lg-5">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-header bg-transparent py-3">
                    <h6 class="mb-0 fw-bold">Urgensi Tiket Aktif (Prioritas)</h6>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <div id="priorityDistChart" style="width: 100%; max-width: 340px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 3: Live Monitoring Tables (Dua Kolom) -->
    <div class="row g-4">
        <!-- Kolom Kiri: Antrean Tiket Tanpa Agent (Butuh Plotting) -->
        <div class="col-12 col-xl-7">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-header bg-transparent py-3">
                    <h6 class="mb-0 fw-bold text-primary">📌 Tiket Baru Butuh Agent (Unassigned)</h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table align-middle table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Tiket</th>
                                <th>Subject</th>
                                <th>Prioritas</th>
                                <th>Masuk</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($unassignedList as $ticket)
                                <tr>
                                    <td class="fw-bold text-sm">{{ $ticket->ticket_number }}</td>
                                    <td>{{ Str::limit($ticket->subject, 25) }}</td>
                                    <td>
                                        <span class="badge {{ $ticket->priority->name == 'Critical' ? 'bg-danger' : 'bg-warning text-dark' }}">
                                            {{ $ticket->priority->name }}
                                        </span>
                                    </td>
                                    <td class="small">{{ $ticket->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <!-- Tombol langsung mengarah ke halaman assign tiket -->
                                        <a href="{{-- route('supervisor.tickets.assign', $ticket->id) --}}" class="btn btn-sm btn-primary py-1">
                                            Assign
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Semua tiket sudah memiliki penanggung jawab! ✨</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Beban Live Agent Terkini -->
        <div class="col-12 col-xl-5">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-header bg-transparent py-3">
                    <h6 class="mb-0 fw-bold text-dark">👥 Beban Kerja Tim Aktif (Live Agent)</h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table align-middle table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Agent</th>
                                <th class="text-center">In Progress</th>
                                <th class="text-center">Pending</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($teamActivity as $agent)
                                <tr>
                                    <td class="fw-bold">{{ $agent->name }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-primary rounded-pill px-3">{{ $agent->progress_count }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-warning text-dark rounded-pill px-3">{{ $agent->pending_count }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">Belum ada agent IT Support terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script>
    <script>
    window.addEventListener("load", function () {
        
        // =======================================================
        // 1. CHART BATANG: OVERVIEW STATUS TIKET AKTIF
        // =======================================================
        var statusElement = document.querySelector("#statusOverviewChart");
        if (statusElement) {
            var statusOptions = {
                chart: { type: 'bar', height: 320, toolbar: { show: false } },
                plotOptions: {
                    bar: { horizontal: false, columnWidth: '40%', borderRadius: 5 }
                },
                colors: ['#0d6efd'],
                series: [{
                    name: 'Jumlah Tiket',
                    data: {!! json_encode($data['statusTotals'] ?? []) !!}
                }],
                xaxis: {
                    categories: {!! json_encode($data['statusLabels'] ?? []) !!},
                    labels: { style: { fontSize: '11px' } }
                },
                grid: { borderColor: '#f1f1f1' }
            };
            var statusChart = new ApexCharts(statusElement, statusOptions);
            statusChart.render();
        }

        // =======================================================
        // 2. CHART DONUT: DISTRIBUSI PRIORITAS TIKET
        // =======================================================
        var priorityElement = document.querySelector("#priorityDistChart");
        if (priorityElement) {
            var priorityOptions = {
                chart: { height: 320, type: 'donut' },
                dataLabels: { enabled: true },
                series: {!! json_encode($data['priorityTotals'] ?? []) !!},
                labels: {!! json_encode($data['priorityLabels'] ?? []) !!},
                colors: ['#dc3545', '#fd7e14', '#0d6efd', '#6c757d'], // Merah, Jingga, Biru, Abu
                legend: { position: 'bottom', horizontalAlign: 'center' }
            };
            var priorityChart = new ApexCharts(priorityElement, priorityOptions);
            priorityChart.render();
        }

    }); // Penutup window.addEventListener yang benar
</script>

@endpush