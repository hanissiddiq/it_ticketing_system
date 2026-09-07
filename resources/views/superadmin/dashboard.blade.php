@extends('template.main')

@section('title','Dashboard Superadmin')

@section('content')    <!-- User Stats Section -->
    <div class="row mt-4">
        <!-- Kolom Kiri: Cards Detail User -->
        <div class="col-12 col-lg-7">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-header bg-transparent py-3">
                    <h6 class="mb-0 fw-bold">Statistik Pengguna</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <!-- Total User -->
                        <div class="col-12">
                            <div class="p-3 bg-light rounded-4 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="wh-40 d-flex bg-primary text-primary bg-opacity-10 align-items-center justify-content-center rounded-circle">
                                        <span class="material-icons-outlined">people</span>
                                    </div>
                                    <div>
                                        <p class="mb-0 text-secondary small">Total User Keseluruhan</p>
                                        <h5 class="mb-0 fw-bold">{{ $data['totalUser'] }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- IT Support -->
                        <div class="col-6">
                            <div class="p-3 border rounded-4">
                                <p class="mb-1 text-secondary small">IT Support</p>
                                <h5 class="mb-0 fw-bold">{{ $data['itSupportCount'] }}</h5>
                            </div>
                        </div>
                        <!-- Helpdesk -->
                        <div class="col-6">
                            <div class="p-3 border rounded-4">
                                <p class="mb-1 text-secondary small">Helpdesk</p>
                                <h5 class="mb-0 fw-bold">{{ $data['helpdeskCount'] }}</h5>
                            </div>
                        </div>
                        <!-- Supervisor -->
                        <div class="col-6">
                            <div class="p-3 border rounded-4">
                                <p class="mb-1 text-secondary small">Supervisor</p>
                                <h5 class="mb-0 fw-bold">{{ $data['supervisorCount'] }}</h5>
                            </div>
                        </div>
                        <!-- Manager IT -->
                        <div class="col-6">
                            <div class="p-3 border rounded-4">
                                <p class="mb-1 text-secondary small">Manager IT</p>
                                <h5 class="mb-0 fw-bold">{{ $data['managerItCount'] }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Visualisasi Grafik -->
        <div class="col-12 col-lg-5">
            <div class="card rounded-4 border-0 shadow-sm h-100">
                <div class="card-header bg-transparent py-3">
                    <h6 class="mb-0 fw-bold">Proporsi Role User</h6>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <div id="userRoleChart" style="width: 100%; max-width: 360px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End User Stats Section -->

    <!-- BARU: Ticket Resolved Per Hari Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card rounded-4 border-0 shadow-sm">
                <div class="card-header bg-transparent py-3">
                    <h6 class="mb-0 fw-bold">Tren Tiket Selesai (Resolved) - 7 Hari Terakhir</h6>
                </div>
                <div class="card-body">
                    <!-- Wadah untuk grafik batang -->
                    <div id="ticketResolvedChart" style="width: 100%; height: 350px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Ticket Resolved Section -->

    <!-- BARU: Tren Bulanan Resolved vs Closed Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card rounded-4 border-0 shadow-sm">
                <div class="card-header bg-transparent py-3">
                    <h6 class="mb-0 fw-bold">Perbandingan Tiket Berkala (Resolved vs Closed) - Tahun {{ $data['currentYear'] }}</h6>
                </div>
                <div class="card-body">
                    <!-- Wadah untuk grafik garis -->
                    <div id="ticketMonthlyLineChart" style="width: 100%; height: 350px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Tren Bulanan Resolved vs Closed Section -->

@endsection
@push('scripts')
<!-- Pastikan CDN dimuat dengan benar -->
<!-- <script src="https://jsdelivr.net"></script> -->
 <script src="{{asset('assets/plugins/apexchart/apexcharts.min.js')}}"></script>

<script>
    window.addEventListener("load", function () {
        
        // ==========================================
        // 1. SCRIPT GRAFIK LINGKARAN (USER ROLE)
        // ==========================================
        var donutElement = document.querySelector("#userRoleChart");
        if (donutElement) {
            var donutOptions = {
                chart: { height: 320, type: 'donut' },
                dataLabels: { enabled: false },
                series: [
                    {{ (int) $data['itSupportCount'] }}, 
                    {{ (int) $data['helpdeskCount'] }}, 
                    {{ (int) $data['supervisorCount'] }}, 
                    {{ (int) $data['managerItCount'] }},
                    {{ (int) $data['userCount'] }}
                ],
                labels: ['IT Support', 'Helpdesk', 'Supervisor', 'Manager IT','User'],
                colors: ['#0d6efd', '#6c757d', '#17a2b8', '#ffc107','#34ffaa'],
                legend: { position: 'bottom', horizontalAlign: 'center' }
            };
            var donutChart = new ApexCharts(donutElement, donutOptions);
            donutChart.render();
        }

        // ==========================================
        // 2. BARU: SCRIPT GRAFIK BATANG (TICKET RESOLVED)
        // ==========================================
        var barElement = document.querySelector("#ticketResolvedChart");
        if (barElement) {
            var barOptions = {
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: { show: false } // Menyembunyikan menu download bawaan jika tidak diperlukan
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '45%',
                        borderRadius: 6, // Membuat sudut batang sedikit melengkung halus
                        dataLabels: { position: 'top' }
                    },
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val) { return val; },
                    offsetY: -20,
                    style: { fontSize: '12px', colors: ["#304758"] }
                },
                // Mengambil data counts array dari Controller
                series: [{
                    name: 'Tiket Selesai',
                    data: {!! json_encode($data['resolvedCounts']) !!}
                }],
                // Mengambil nama-nama hari dari Controller
                xaxis: {
                    categories: {!! json_encode($data['resolvedDays']) !!},
                    position: 'bottom',
                    labels: { style: { fontSize: '12px' } }
                },
                yaxis: {
                    title: { text: 'Jumlah Tiket' },
                    labels: {
                        formatter: function (val) { return Math.round(val); } // Memastikan angka bulat (bukan desimal)
                    }
                },
                colors: ['#198754'], // Menggunakan warna hijau sukses (Success Bootstrap)
                grid: {
                    borderColor: '#f1f1f1',
                },
                tooltip: {
                    y: {
                        formatter: function (val) { return val + " Tiket"; }
                    }
                }
            };

            var barChart = new ApexCharts(barElement, barOptions);
            barChart.render();
        } else {
            console.error("Elemen #ticketResolvedChart tidak ditemukan!");
        }

        // ==========================================
        // 3. BARU: SCRIPT GRAFIK GARIS (MONTHLY LINE CHART)
        // ==========================================
        var lineElement = document.querySelector("#ticketMonthlyLineChart");
        if (lineElement) {
            var lineOptions = {
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: { enabled: false },
                    toolbar: { show: true } // Menampilkan opsi download gambar grafik
                },
                stroke: {
                    width:3, // Ketebalan garis masing-masing data
                    curve: 'smooth' // Membuat garis melengkung lembut halus (bukan patah-patah)
                },
                series: [
                    {
                        name: 'Resolved',
                        data: {!! json_encode($data['monthlyResolved']) !!}
                    },
                    {
                        name: 'Closed',
                        data: {!! json_encode($data['monthlyClosed']) !!}
                    }
                ],
                xaxis: {
                    categories: {!! json_encode($data['monthlyLabels']) !!},
                    labels: { style: { fontSize: '12px' } }
                },
                yaxis: {
                    title: { text: 'Jumlah Tiket' },
                    labels: {
                        formatter: function (val) { return Math.round(val); }
                    }
                },
                // Warna garis: Hijau untuk Resolved, Biru Utama untuk Closed
                colors: ['#198754', '#0d6efd'], 
                markers: {
                    size: 4, // Memberikan titik bulatan kecil pada setiap koordinat bulan
                    hover: { size: 6 }
                },
                grid: {
                    borderColor: '#f1f1f1',
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right'
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function (val) { return val + " Tiket"; }
                    }
                }
            };

            var lineChart = new ApexCharts(lineElement, lineOptions);
            lineChart.render();
        } else {
            console.error("Elemen #ticketMonthlyLineChart tidak ditemukan!");
        }

    });
</script>
@endpush

