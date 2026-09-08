<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Indikator Utama Operasional Harian
        $data = [
            'unassignedTicket'=> Ticket::whereNull('assigned_to')->whereNotIn('status', ['CLOSED', 'CANCELLED'])->count(),
            'activeTicket'    => Ticket::whereIn('status', ['NEW', 'OPEN', 'ASSIGNED', 'IN_PROGRESS', 'PENDING'])->count(),
            'resolvedToday'   => Ticket::where('status', 'RESOLVED')->whereDate('updated_at', now()->toDateString())->count(),
            'overdueCritical' => Ticket::whereIn('status', ['NEW', 'OPEN', 'ASSIGNED', 'IN_PROGRESS'])
                                    ->whereHas('priority', function($query) {
                                        $query->where('name', 'Critical');
                                    })->count(),
        ];

        // 2. Data Grafik Donat: Distribusi Tiket Aktif Berdasarkan Prioritas
        $priorityStats = Ticket::select('priorities.name as priority_name', DB::raw('count(*) as total'))
            ->join('priorities', 'tickets.priority_id', '=', 'priorities.id')
            ->whereNotIn('tickets.status', ['RESOLVED', 'CLOSED', 'CANCELLED'])
            ->groupBy('priorities.name', 'tickets.priority_id')
            ->get();

        $data['priorityLabels'] = $priorityStats->pluck('priority_name')->toArray();
        $data['priorityTotals'] = $priorityStats->pluck('total')->toArray();

        // 3. Data Grafik Batang: Status Semua Tiket Aktif Saat Ini
        $statusStats = Ticket::select('status', DB::raw('count(*) as total'))
            ->whereNotIn('status', ['CLOSED', 'CANCELLED'])
            ->groupBy('status')
            ->get();

        $data['statusLabels'] = $statusStats->pluck('status')->toArray();
        $data['statusTotals'] = $statusStats->pluck('total')->toArray();

        // 4. Tabel Pantauan 1: Antrean Tiket Baru / Unassigned (Butuh Segera Di-assign oleh Supervisor)
        $unassignedList = Ticket::with(['requester', 'priority'])
            ->whereNull('assigned_to')
            ->whereNotIn('status', ['CLOSED', 'CANCELLED'])
            ->orderBy('created_at', 'asc') // Tiket terlama di atas agar tidak berlumut
            ->take(5)
            ->get();

        // 5. Tabel Pantauan 2: Aktivitas Tim (Staf IT Support & jumlah tiket yang sedang mereka kerjakan)
        $teamActivity = User::role('IT Support')
            ->withCount(['tickets as progress_count' => function($query) {
                $query->where('status', 'IN_PROGRESS');
            }])
            ->withCount(['tickets as pending_count' => function($query) {
                $query->where('status', 'PENDING');
            }])
            ->orderBy('progress_count', 'desc')
            ->take(5)
            ->get();

        return view('supervisor.dashboard', compact('data', 'unassignedList', 'teamActivity'));
    }
}
