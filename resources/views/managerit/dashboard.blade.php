@extends('template.main')

@section('title', 'Dashboard IT Manager')

@section('content')
<div class="container-fluid">

    <!-- Row 1: KPI Ringkas Utama -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 mb-4">
        <!-- Total Tiket Masuk -->
        <div class="col">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-1 text-secondary small fw-bold text-uppercase">Total Seluruh Tiket</p>
                            <h3 class="mb-0 fw-bold text-primary">{{ $data['totalTicket'] }}</h3>
                        </div>
                        <div class="wh-48 d-flex bg-primary text-primary bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">analytics</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tiket Aktif Berjalan -->
        <div class="col">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-1 text-secondary small fw-bold text-uppercase">Tiket Sedang Aktif</p>
                            <h3 class="mb-0 fw-bold text-warning">{{ $data['activeTicket'] }}</h3>
                        </div>
                        <div class="wh-48 d-flex bg-warning text-warning bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">pending_actions</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tiket Sukses Selesai -->
        <div class="col">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-1 text-secondary small fw-bold text-uppercase">Tiket Selesai</p>
                            <h3 class="mb-0 fw-bold text-success">{{ $data['completedTicket'] }}</h3>
                        </div>
                        <div class="wh-48 d-flex bg-success text-success bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">task_alt</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Indikator Kepuasan Karyawan (CSAT) -->
        <div class="col">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-1 text-secondary small fw-bold text-uppercase">Kepuasan User (CSAT)</p>
                            <h3 class="mb-0 fw-bold text-info">
                                {{-- $data['averageCsat'] --}} <span class="fs-6 text-secondary fw-normal">/ 5.0</span>
                            </h3>
                            <small class="text-muted">{{-- $data['csatPercentage'] --}}% Puas</small>
                        </div>
                        <div class="wh-48 d-flex bg-info text-info bg-opacity-10 align-items-center justify-content-center rounded-circle">
                            <span class="material-icons-outlined">thumb_up</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 2: Visualisasi Analisis Grafik -->
    <div class="row g-4 mb-4">
        <!-- Grafik Kiri: Beban Kerja Tim IT Support -->
        <div class="col-12 col-lg-7">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-header bg-transparent py-3">
                    <h6 class="mb-0 fw-bold">Beban Kerja Tim IT Support (Tiket Aktif)</h6>
                </div>
                <div class="card-body">
                    <div id="staffWorkloadChart" style="min-height: 300px;"></div>
                </div>
            </div>
        </div>

        <!-- Grafik Kanan: Top Kategori Masalah -->
        <div class="col-12 col-lg-5">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-header bg-transparent py-3">
                    <h6 class="mb-0 fw-bold">Kategori Masalah Terbanyak (Akar Masalah)</h6>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <div id="rootCauseChart" style="width: 100%; max-width: 360px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 3: Tiket Prioritas Tinggi Yang Butuh Monitoring Manager -->
    <div class="card rounded-4 border-0 shadow-sm">
        <div class="card-header bg-transparent py-3">
            <h6 class="mb-0 fw-bold text-danger">⚠️ Tiket Prioritas Tinggi Terkini (Butuh Perhatian)</h6>
        </div>
        <div class="card-body table-responsive">
            <table class="table align-middle table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nomor Tiket</th>
                        <th>Subject</th>
                        <th>Requester</th>
                        <th>Ditugaskan Ke</th>
                        <th>Priority</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($criticalTickets as $ticket)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-bold">{{ $ticket->ticket_number }}</td>
                            <td>{{ $ticket->subject }}</td>
                            <td>{{ $ticket->requester->name }}</td>
                            <td>{{ $ticket->assignedTo->name ?? 'Belum Ditunjuk' }}</td>
                            <td>
                                <span class="badge bg-danger">{{ $ticket->priority->name }}</span>
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark">{{ $ticket->status }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Aman. Tidak ada tiket darurat aktif saat ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script>
    window.addEventListener("load", function () {
        
        // =======================================================
        // 1. GRAFIK BATANG HORIZONTAL: BEBAN KERJA STAF IT
        // =======================================================
        var workloadElement = document.querySelector("#staffWorkloadChart");
        if (workloadElement) {
            var workloadOptions = {
                chart: { type: 'bar', height: 320, toolbar: { show: false } },
                plotOptions: {
                    bar: { horizontal: true, barHeight: '50%', borderRadius: 5 }
                },
                colors: ['#0d6efd'],
                series: [{
                    name: 'Jumlah Tiket Aktif',
                    data: {!! json_encode($data['staffTicketCounts']) !!}
                }],
                xaxis: {
                    categories: {!! json_encode($data['staffNames']) !!},
                    labels: { style: { fontSize: '12px' } }
                },
                grid: { borderColor: '#f1f1f1' }
            };
            var workloadChart = new ApexCharts(workloadElement, workloadOptions);
            workloadChart.render();
        }

        // =======================================================
        // 2. GRAFIK DONAT: TOP KATEGORI MASALAH
        // =======================================================
        var rootCauseElement = document.querySelector("#rootCauseChart");
        if (rootCauseElement) {
            var rootCauseOptions = {
                chart: { height: 320, type: 'donut' },
                dataLabels: { enabled: true },
                series: {!! json_encode($data['categoryTotals']) !!},
                labels: {!! json_encode($data['categoryLabels']) !!},
                colors: ['#dc3545', '#fd7e14', '#ffc107', '#198754', '#0d6efd'],
                legend: { position: 'bottom', horizontalAlign: 'center' }
            };
            var rootCauseChart = new ApexCharts(rootCauseElement, rootCauseOptions);
            rootCauseChart.render();
        }
    });
</script>
@endpush
