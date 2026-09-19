<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ITSupportPerformanceController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Periode
        |--------------------------------------------------------------------------
        */

        $startDate = $request->input(
            'start_date',
            now()->startOfMonth()->format('Y-m-d')
        );

        $endDate = $request->input(
            'end_date',
            now()->format('Y-m-d')
        );

        $agentId = $request->input('agent_id');

        $start = Carbon::parse($startDate)->startOfDay();
        $end = Carbon::parse($endDate)->endOfDay();

        /*
        |--------------------------------------------------------------------------
        | Daftar IT Support
        |--------------------------------------------------------------------------
        */

        $agents = User::role('IT Support')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Base Query
        |--------------------------------------------------------------------------
        |
        | Tiket yang masuk pada periode laporan.
        |
        */

        $baseQuery = Ticket::query()
            ->whereBetween('created_at', [$start, $end]);

        if ($agentId) {
            $baseQuery->where('assigned_to', $agentId);
        }

        /*
        |--------------------------------------------------------------------------
        | KPI
        |--------------------------------------------------------------------------
        */

        $totalTicket = (clone $baseQuery)->count();

        $assignedTicket = (clone $baseQuery)
            ->whereNotNull('assigned_to')
            ->count();

        $inProgress = (clone $baseQuery)
            ->where('status', 'IN_PROGRESS')
            ->count();

        $pending = (clone $baseQuery)
            ->where('status', 'PENDING')
            ->count();

        $resolved = (clone $baseQuery)
            ->where('status', 'RESOLVED')
            ->count();

        $closed = (clone $baseQuery)
            ->where('status', 'CLOSED')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Overdue
        |--------------------------------------------------------------------------
        */

        $overdue = (clone $baseQuery)
            ->whereNotNull('due_at')
            ->whereColumn('due_at', '<', 'updated_at')
            ->whereNotIn('status', [
                'RESOLVED',
                'CLOSED',
                'CANCELLED'
            ])
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Completion Rate
        |--------------------------------------------------------------------------
        */

        $completed = $resolved + $closed;

        $completionRate = $assignedTicket > 0
            ? round(($completed / $assignedTicket) * 100, 1)
            : 0;

        /*
        |--------------------------------------------------------------------------
        | Average Resolution Time
        |--------------------------------------------------------------------------
        */

        $resolvedTickets = (clone $baseQuery)
            ->whereIn('status', ['RESOLVED', 'CLOSED'])
            ->whereNotNull('resolved_at')
            ->get([
                'created_at',
                'resolved_at'
            ]);

        $averageResolutionMinutes = 0;

        if ($resolvedTickets->count() > 0) {

            $totalMinutes = 0;

            foreach ($resolvedTickets as $ticket) {

                $totalMinutes += $ticket->created_at
                    ->diffInMinutes($ticket->resolved_at);
            }

            $averageResolutionMinutes = round(
                $totalMinutes / $resolvedTickets->count()
            );
        }

        $averageResolution = $this->formatDuration(
            $averageResolutionMinutes
        );

        /*
        |--------------------------------------------------------------------------
        | Performance Per Agent
        |--------------------------------------------------------------------------
        */

        $performance = $agents->map(function ($agent) use (
            $start,
            $end
        ) {

            $query = Ticket::query()
                ->where('assigned_to', $agent->id)
                ->whereBetween('created_at', [$start, $end]);

            $assigned = (clone $query)->count();

            $inProgress = (clone $query)
                ->where('status', 'IN_PROGRESS')
                ->count();

            $pending = (clone $query)
                ->where('status', 'PENDING')
                ->count();

            $resolved = (clone $query)
                ->where('status', 'RESOLVED')
                ->count();

            $closed = (clone $query)
                ->where('status', 'CLOSED')
                ->count();

            $completed = $resolved + $closed;

            $overdue = (clone $query)
                ->whereNotNull('due_at')
                ->where('due_at', '<', now())
                ->whereNotIn('status', [
                    'RESOLVED',
                    'CLOSED',
                    'CANCELLED'
                ])
                ->count();

            $resolvedData = (clone $query)
                ->whereIn('status', [
                    'RESOLVED',
                    'CLOSED'
                ])
                ->whereNotNull('resolved_at')
                ->get([
                    'created_at',
                    'resolved_at'
                ]);

            $totalMinutes = 0;

            foreach ($resolvedData as $ticket) {

                $totalMinutes += $ticket->created_at
                    ->diffInMinutes($ticket->resolved_at);
            }

            $avgMinutes = $resolvedData->count() > 0
                ? round($totalMinutes / $resolvedData->count())
                : 0;

            $completionRate = $assigned > 0
                ? round(($completed / $assigned) * 100, 1)
                : 0;

            return [
                'id' => $agent->id,
                'name' => $agent->name,
                'employee_id' => $agent->employee_id,

                'assigned' => $assigned,
                'in_progress' => $inProgress,
                'pending' => $pending,
                'resolved' => $resolved,
                'closed' => $closed,
                'completed' => $completed,

                'overdue' => $overdue,

                'completion_rate' => $completionRate,

                'average_resolution' =>
                    $this->formatDuration($avgMinutes),
            ];
        });

        /*
        |--------------------------------------------------------------------------
        | Detail Ticket
        |--------------------------------------------------------------------------
        */

        $tickets = (clone $baseQuery)
            ->with([
                'requester',
                'assignee',
                'priority',
                'category'
            ])
            ->when(
                $agentId,
                fn ($query) =>
                    $query->where('assigned_to', $agentId)
            )
            ->latest('created_at')
            ->get();

        return view(
            'reports.it-support-performance',
            compact(
                'agents',
                'performance',
                'tickets',
                'startDate',
                'endDate',
                'agentId',

                'totalTicket',
                'assignedTicket',
                'inProgress',
                'pending',
                'resolved',
                'closed',
                'overdue',

                'completionRate',
                'averageResolution'
            )
        );
    }

    private function formatDuration(int $minutes): string
    {
        if ($minutes <= 0) {
            return '-';
        }

        $days = intdiv($minutes, 1440);
        $hours = intdiv($minutes % 1440, 60);
        $mins = $minutes % 60;

        $result = [];

        if ($days > 0) {
            $result[] = $days . ' hari';
        }

        if ($hours > 0) {
            $result[] = $hours . ' jam';
        }

        if ($mins > 0) {
            $result[] = $mins . ' menit';
        }

        return implode(' ', $result);
    }
}