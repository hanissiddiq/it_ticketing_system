<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

    // 1. Ambil data 7 hari terakhir untuk grafik batang
        $resolvedDays = [];
        $resolvedCounts = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            
            // Nama hari (contoh: 'Senin', 'Selasa' atau dalam bahasa Inggris 'Mon', 'Tue')
            // 'D' menghasilkan format 3 huruf (Mon, Tue, Wed, dst)
            $resolvedDays[] = $date->isoFormat('dddd'); 

            // Hitung tiket resolved pada tanggal tersebut
            $resolvedCounts[] = Ticket::where('status', 'RESOLVED')
                ->whereDate('updated_at', $date->toDateString()) // Menggunakan updated_at karena tanggal selesainya tiket
                ->count();
        }

        // 2. BARU: Ambil data tren bulanan di tahun berjalan untuk grafik garis
        $monthlyLabels = [];
        $monthlyResolved = [];
        $monthlyClosed = [];
        
        $currentMonth = Carbon::now()->month; // Bulan saat ini (angka 1-12)
        $currentYear = Carbon::now()->year;

        for ($m = 1; $m <= $currentMonth; $m++) {
            // Membuat objek Carbon untuk bulan terkait
            $monthDate = Carbon::createFromDate($currentYear, $m, 1);
            
            // Nama bulan (Januari, Februari, dll)
            $monthlyLabels[] = $monthDate->isoFormat('MMMM');

            // Hitung Tiket Resolved di bulan & tahun ini
            $monthlyResolved[] = Ticket::where('status', 'RESOLVED')
                ->whereYear('updated_at', $currentYear)
                ->whereMonth('updated_at', $m)
                ->count();

            // Hitung Tiket Closed di bulan & tahun ini
            $monthlyClosed[] = Ticket::where('status', 'CLOSED')
                ->whereYear('updated_at', $currentYear)
                ->whereMonth('updated_at', $m)
                ->count();
            }

        $data = [

            'totalTicket' => Ticket::count(),

            'newTicket' => Ticket::where('status', 'NEW')->count(),

            'openTicket' => Ticket::where('status', 'OPEN')->count(),

            'assignedTicket' => Ticket::where('status', 'ASSIGNED')->count(),

            'progressTicket' => Ticket::where('status', 'IN_PROGRESS')->count(),

            'pendingTicket' => Ticket::where('status', 'PENDING')->count(),

            'resolvedTicket' => Ticket::where('status', 'RESOLVED')->count(),

            'closedTicket' => Ticket::where('status', 'CLOSED')->count(),
            'cancelledTicket' => Ticket::where('status','CANCELLED')->count(),

            // 2. Hitungan User Keseluruhan
            'totalUser'      => User::count(),

            // 3. Hitungan User berdasarkan Role Spesifik (Menggunakan Spatie Permission)
            'itSupportCount' => User::role('IT Support')->count(),
            'helpdeskCount'  => User::role('Helpdesk')->count(),
            'supervisorCount'=> User::role('Supervisor')->count(),
            'managerItCount' => User::role('Manager IT')->count(),
            'userCount' => User::role('User')->count(),

            // 4. Masukkan data grafik batang ke dalam array data
            'resolvedDays'   => $resolvedDays,
            'resolvedCounts' => $resolvedCounts,

             // 5. Masukkan data grafik garis resolved perbulan ke array data
            'monthlyLabels'   => $monthlyLabels,
            'monthlyResolved' => $monthlyResolved,
            'monthlyClosed'   => $monthlyClosed,
            'currentYear'     => $currentYear

        ];

        $latestTickets = Ticket::with([
                'requester',
                'priority'
            ])
            ->latest()
            ->take(10)
            ->get();

        return view(
            'superadmin.dashboard',
            compact('data','latestTickets')
        );
    }
}