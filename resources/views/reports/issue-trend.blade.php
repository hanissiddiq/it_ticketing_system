@extends('template.main')

@section('title', 'IT Issue Trend Analysis')

@section('content')

<div class="container-fluid">

    {{-- =========================================================
        HEADER
    ========================================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">
                IT Issue Trend Analysis
            </h4>

            <p class="text-primary mb-0">
                Ringkasan Tren Masalah & Kategori
            </p>

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


    {{-- =========================================================
        FILTER
    ========================================================== --}}

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <form method="GET">

                <div class="row g-3 align-items-end">

                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Dari Tanggal
                        </label>

                        <input
                            type="date"
                            name="start_date"
                            value="{{ $startDate }}"
                            class="form-control">

                    </div>


                    <div class="col-md-4">

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

                        <button
                            type="submit"
                            class="btn btn-primary">

                            <span class="material-icons-outlined align-middle">
                                filter_alt
                            </span>

                            Tampilkan Analisis

                        </button>

                        <!-- <a
                            href="{{ route('managerit.reports.issue-trend') }}"
                            class="btn btn-light">

                            Reset

                        </a> -->
                        @if(auth()->user()->hasRole('Super Admin'))
                            <a href="{{ route('superadmin.reports.issue-trend') }}" class="btn btn-light">Reset</a>
                        @elseif(auth()->user()->hasRole('Supervisor'))
                            <a href="{{ route('supervisor.reports.issue-trend') }}" class="btn btn-light">Reset</a>
                        @else
                            <a href="{{ route('managerit.reports.issue-trend') }}" class="btn btn-light">Reset</a>
                        @endif

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- =========================================================
        KPI
    ========================================================== --}}

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-3 mb-4">

        {{-- TOTAL TICKET --}}

        <div class="col">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <div class="text-primary small fw-bold">
                                TOTAL TICKET
                            </div>

                            <h3 class="fw-bold mb-0">
                                {{ $totalTicket }}
                            </h3>

                        </div>

                        <div class="wh-48 d-flex
                                    bg-primary bg-opacity-10
                                    text-primary
                                    align-items-center
                                    justify-content-center
                                    rounded-circle">

                            <span class="material-icons-outlined">
                                confirmation_number
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- CATEGORY --}}

        <div class="col">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <div class="text-primary small fw-bold">
                                KATEGORI TERPAKAI
                            </div>

                            <h3 class="fw-bold mb-0">
                                {{ $totalCategory }}
                            </h3>

                            <small class="text-primary">
                                {{ $totalSubCategory }} sub kategori
                            </small>

                        </div>

                        <div class="wh-48 d-flex
                                    bg-info bg-opacity-10
                                    text-info
                                    align-items-center
                                    justify-content-center
                                    rounded-circle">

                            <span class="material-icons-outlined">
                                category
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- TOP CATEGORY --}}

        <div class="col">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="text-primary small fw-bold">
                        KATEGORI TERBANYAK
                    </div>

                    <h5 class="fw-bold mb-1">
                        {{ $topCategoryName }}
                    </h5>

                    <small class="text-primary">
                        {{ $topCategoryTotal }} ticket
                    </small>

                </div>

            </div>

        </div>


        {{-- PEAK MONTH --}}

        <div class="col">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="text-primary small fw-bold">
                        BULAN TERPADAT
                    </div>

                    <h5 class="fw-bold mb-1">
                        {{ $peakMonthLabel }}
                    </h5>

                    <small class="text-primary">
                        {{ $peakMonthTotal }} ticket
                    </small>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
        TREND BULANAN
    ========================================================== --}}

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-header bg-transparent py-3">

            <h6 class="fw-bold mb-0">
                Tren Jumlah Tiket Bulanan
            </h6>

        </div>

        <div class="card-body">

            <div id="monthlyTrendChart"
                 style="min-height: 350px;">
            </div>

        </div>

    </div>


    {{-- =========================================================
        CATEGORY + STATUS
    ========================================================== --}}

    <div class="row g-4 mb-4">


        {{-- CATEGORY --}}

        <div class="col-lg-7">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-transparent py-3">

                    <h6 class="fw-bold mb-0">
                        Distribusi Kategori Masalah
                    </h6>

                </div>

                <div class="card-body">

                    <div id="categoryChart"
                         style="min-height: 350px;">
                    </div>

                </div>

            </div>

        </div>


        {{-- STATUS --}}

        <div class="col-lg-5">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-transparent py-3">

                    <h6 class="fw-bold mb-0">
                        Distribusi Status Ticket
                    </h6>

                </div>

                <div class="card-body">

                    <div id="statusChart"
                         style="min-height: 350px;">
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
        SUB CATEGORY
    ========================================================== --}}

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-header bg-transparent py-3">

            <h6 class="fw-bold mb-0">
                Top 10 Sub Kategori Masalah
            </h6>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th width="60">
                            No
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th>
                            Sub Kategori
                        </th>

                        <th class="text-center">
                            Jumlah Ticket
                        </th>

                        <th width="30%">
                            Proporsi
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($subCategoryData as $item)

                    @php

                        $percentage = $totalTicket > 0
                            ? round(
                                ($item->total / $totalTicket) * 100,
                                1
                            )
                            : 0;

                    @endphp

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>

                            {{ $item->subCategory?->category?->name ?? '-' }}

                        </td>

                        <td class="fw-semibold">

                            {{ $item->subCategory?->name ?? 'Tanpa Sub Kategori' }}

                        </td>

                        <td class="text-center">

                            <span class="badge bg-primary">
                                {{ $item->total }}
                            </span>

                        </td>

                        <td>

                            <div class="progress"
                                 style="height: 8px;">

                                <div
                                    class="progress-bar"
                                    style="width: {{ $percentage }}%">
                                </div>

                            </div>

                            <small class="text-primary">
                                {{ $percentage }}%
                            </small>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="text-center text-primary py-4">

                            Belum ada data sub kategori.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- =========================================================
        PRIORITY + DEPARTMENT
    ========================================================== --}}

    <div class="row g-4 mb-4">


        {{-- PRIORITY --}}

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-transparent py-3">

                    <h6 class="fw-bold mb-0">
                        Distribusi Prioritas
                    </h6>

                </div>

                <div class="card-body">

                    <div id="priorityChart"
                         style="min-height: 320px;">
                    </div>

                </div>

            </div>

        </div>


        {{-- DEPARTMENT --}}

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-transparent py-3">

                    <h6 class="fw-bold mb-0">
                        Departemen dengan Ticket Terbanyak
                    </h6>

                </div>

                <div class="card-body table-responsive">

                    <table class="table table-hover align-middle">

                        <thead>

                            <tr>

                                <th>
                                    No
                                </th>

                                <th>
                                    Departemen
                                </th>

                                <th class="text-end">
                                    Ticket
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                        @forelse($departmentData as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td class="fw-semibold">

                                    {{ $item->department?->name ?? 'Tanpa Departemen' }}

                                </td>

                                <td class="text-end">

                                    <span class="badge bg-primary">

                                        {{ $item->total }}

                                    </span>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="3"
                                    class="text-center text-primary">

                                    Belum ada data.

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
        CATEGORY SUMMARY
    ========================================================== --}}

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-header bg-transparent py-3">

            <h6 class="fw-bold mb-0">
                Ringkasan Masalah Per Kategori
            </h6>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>
                            No
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th class="text-center">
                            Jumlah Ticket
                        </th>

                        <th class="text-center">
                            Persentase
                        </th>

                        <th>
                            Indikasi
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($categorySummary as $item)

                    @php

                        $percentage = $totalTicket > 0
                            ? round(
                                ($item->total / $totalTicket) * 100,
                                1
                            )
                            : 0;

                    @endphp

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td class="fw-semibold">

                            {{ $item->category?->name ?? 'Tanpa Kategori' }}

                        </td>

                        <td class="text-center">

                            {{ $item->total }}

                        </td>

                        <td class="text-center">

                            {{ $percentage }}%

                        </td>

                        <td>

                            @if($percentage >= 30)

                                <span class="badge bg-danger">
                                    Dominan
                                </span>

                            @elseif($percentage >= 15)

                                <span class="badge bg-warning text-dark">
                                    Signifikan
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    Normal
                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="text-center text-primary py-4">

                            Tidak ada data kategori.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- =========================================================
        ANALYTICAL SUMMARY
    ========================================================== --}}

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-transparent py-3">

            <h6 class="fw-bold mb-0">
                Ringkasan Analisis
            </h6>

        </div>

        <div class="card-body">

            <div class="row g-3">

                <div class="col-md-4">

                    <div class="p-3 bg-light rounded-3">

                        <div class="text-primary small">
                            Rata-rata Ticket / Bulan
                        </div>

                        <h4 class="fw-bold mb-0">

                            {{ $averagePerMonth }}

                        </h4>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="p-3 bg-light rounded-3">

                        <div class="text-primary small">
                            Kategori Paling Sering Muncul
                        </div>

                        <h5 class="fw-bold mb-0">

                            {{ $topCategoryName }}

                        </h5>

                        <small class="text-primary">

                            {{ $topCategoryTotal }} ticket

                        </small>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="p-3 bg-light rounded-3">

                        <div class="text-primary small">
                            Periode Paling Padat
                        </div>

                        <h5 class="fw-bold mb-0">

                            {{ $peakMonthLabel }}

                        </h5>

                        <small class="text-primary">

                            {{ $peakMonthTotal }} ticket

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection


@push('scripts')

<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        /*
        |--------------------------------------------------------------------------
        | MONTHLY TREND
        |--------------------------------------------------------------------------
        */

        const monthlyTrendElement =
            document.querySelector('#monthlyTrendChart');

        if (monthlyTrendElement) {

            const monthlyTrendOptions = {

                chart: {
                    type: 'area',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },

                series: [{

                    name: 'Jumlah Ticket',

                    data:
                        {!! json_encode($trendTotals) !!}

                }],

                xaxis: {

                    categories:
                        {!! json_encode($trendLabels) !!}

                },

                stroke: {

                    curve: 'smooth',

                    width: 3

                },

                dataLabels: {

                    enabled: false

                },

                tooltip: {

                    y: {

                        formatter: function (value) {

                            return value + ' ticket';

                        }

                    }

                }

            };


            const chart =
                new ApexCharts(
                    monthlyTrendElement,
                    monthlyTrendOptions
                );

            chart.render();

        }


        /*
        |--------------------------------------------------------------------------
        | CATEGORY
        |--------------------------------------------------------------------------
        */

        const categoryElement =
            document.querySelector('#categoryChart');

        if (categoryElement) {

            const categoryOptions = {

                chart: {

                    type: 'bar',

                    height: 350,

                    toolbar: {
                        show: false
                    }

                },

                plotOptions: {

                    bar: {

                        horizontal: true,

                        borderRadius: 5

                    }

                },

                series: [{

                    name: 'Ticket',

                    data:
                        {!! json_encode($categoryTotals) !!}

                }],

                xaxis: {

                    categories:
                        {!! json_encode($categoryLabels) !!}

                },

                tooltip: {

                    y: {

                        formatter: function (value) {

                            return value + ' ticket';

                        }

                    }

                }

            };


            const chart =
                new ApexCharts(
                    categoryElement,
                    categoryOptions
                );

            chart.render();

        }


        /*
        |--------------------------------------------------------------------------
        | STATUS
        |--------------------------------------------------------------------------
        */

        const statusElement =
            document.querySelector('#statusChart');

        if (statusElement) {

            const statusOptions = {

                chart: {

                    type: 'donut',

                    height: 350

                },

                series:
                    {!! json_encode($statusTotals) !!},

                labels:
                    {!! json_encode($statusLabels) !!},

                legend: {

                    position: 'bottom'

                }

            };


            const chart =
                new ApexCharts(
                    statusElement,
                    statusOptions
                );

            chart.render();

        }


        /*
        |--------------------------------------------------------------------------
        | PRIORITY
        |--------------------------------------------------------------------------
        */

        const priorityElement =
            document.querySelector('#priorityChart');

        if (priorityElement) {

            const priorityOptions = {

                chart: {

                    type: 'donut',

                    height: 320

                },

                series:
                    {!! json_encode($priorityTotals) !!},

                labels:
                    {!! json_encode($priorityLabels) !!},

                legend: {

                    position: 'bottom'

                }

            };


            const chart =
                new ApexCharts(
                    priorityElement,
                    priorityOptions
                );

            chart.render();

        }

    });

</script>


<style>

@media print {

    @page {

        size: landscape;

        margin: 10mm;

    }


    body {

        background: #fff !important;

    }


    .sidebar-wrapper,
    .header-wrapper,
    .btn,
    form {

        display: none !important;

    }


    .main-wrapper {

        margin-left: 0 !important;

    }


    .card {

        box-shadow: none !important;

        border: 1px solid #ddd !important;

    }

}

</style>

@endpush

