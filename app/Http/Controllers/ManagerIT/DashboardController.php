<?php

namespace App\Http\Controllers\ManagerIT;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung Rata-rata Kepuasan Pengguna (CSAT) dari skala 1-5
        // Diasumsikan Anda memiliki kolom 'rating' (integer null jika belum dinilai) di tabel tickets
        // $averageCsat = Ticket::whereNotNull('rating')->avg('rating') ?? 0;
        // $csatPercentage = ($averageCsat / 5) * 100; // Konversi ke persentase jika dibutuhkan

        // 2. Data Beban Kerja Tim (Top 5 Staf IT Support dengan tiket aktif: ASSIGNED atau IN_PROGRESS)
        // Diasumsikan relasi ke staff IT di model Ticket bernama 'assignedTo'
        $teamWorkload = User::role('IT Support')
            ->withCount(['tickets' => function($query) {
                $query->whereIn('status', ['ASSIGNED', 'IN_PROGRESS']);
            }])
            ->orderBy('tickets_count', 'desc')
            ->take(5)
            ->get();

        $staffNames = $teamWorkload->pluck('name')->toArray();
        $staffTicketCounts = $teamWorkload->pluck('tickets_count')->toArray();

        // 3. Top 5 Kategori Masalah Terbanyak (Root Cause)
        $topCategories = Ticket::with('category')
            ->select('category_id', DB::raw('count(*) as total'))
            ->whereNotNull('category_id')
            ->groupBy('category_id')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        // $categoryLabels = $topCategories->pluck('category')->toArray();
       $categoryLabels = $topCategories->map(function($ticket) {
            return $ticket->category ? (string) $ticket->category->name : 'Tanpa Kategori';
        })->values()->toArray(); // Tambahkan values() untuk mereset index array
        $categoryTotals = $topCategories->pluck('total')->toArray();

        // 4. Ringkasan Status Tiket untuk Manager
        $data = [
            'totalTicket'      => Ticket::count(),
            'activeTicket'     => Ticket::whereIn('status', ['NEW', 'OPEN', 'ASSIGNED', 'IN_PROGRESS', 'PENDING'])->count(),
            'completedTicket'  => Ticket::whereIn('status', ['RESOLVED', 'CLOSED'])->count(),
            // 'averageCsat'      => round($averageCsat, 1),
            // 'csatPercentage'   => round($csatPercentage, 0),
            
            // Masukkan data grafik ke array
            'staffNames'       => $staffNames,
            'staffTicketCounts'=> $staffTicketCounts,
            'categoryLabels'   => $categoryLabels,
            'categoryTotals'   => $categoryTotals
        ];

        // 5. Ambil 5 Tiket Berstatus 'CRITICAL' atau 'HIGH' yang butuh perhatian Manager
        // Diasumsikan Anda memiliki relasi priority di model Ticket
        $criticalTickets = Ticket::with(['requester', 'priority', 'assignee'])
            ->whereHas('priority', function($query) {
                $query->whereIn('name', ['Critical', 'High']);
            })
            ->whereNotIn('status', ['RESOLVED', 'CLOSED', 'CANCELLED'])
            ->latest()
            ->take(5)
            ->get();

        return view('managerit.dashboard', compact('data', 'criticalTickets'));
    }
}
