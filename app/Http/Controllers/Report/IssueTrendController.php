<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IssueTrendController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | FILTER PERIODE
        |--------------------------------------------------------------------------
        */

        $startDate = $request->input(
            'start_date',
            now()->startOfYear()->format('Y-m-d')
        );

        $endDate = $request->input(
            'end_date',
            now()->format('Y-m-d')
        );

        $start = Carbon::parse($startDate)->startOfDay();

        $end = Carbon::parse($endDate)->endOfDay();


        /*
        |--------------------------------------------------------------------------
        | BASE QUERY
        |--------------------------------------------------------------------------
        */

        $baseQuery = Ticket::query()
            ->whereBetween('created_at', [$start, $end]);


        /*
        |--------------------------------------------------------------------------
        | KPI
        |--------------------------------------------------------------------------
        */

        $totalTicket = (clone $baseQuery)->count();

        $totalCategory = (clone $baseQuery)
            ->whereNotNull('category_id')
            ->distinct('category_id')
            ->count('category_id');

        $totalSubCategory = (clone $baseQuery)
            ->whereNotNull('sub_category_id')
            ->distinct('sub_category_id')
            ->count('sub_category_id');


        /*
        |--------------------------------------------------------------------------
        | TOP CATEGORY
        |--------------------------------------------------------------------------
        */

        $topCategory = (clone $baseQuery)
            ->select(
                'category_id',
                DB::raw('COUNT(*) as total')
            )
            ->whereNotNull('category_id')
            ->with('category')
            ->groupBy('category_id')
            ->orderByDesc('total')
            ->first();

        $topCategoryName = $topCategory?->category?->name ?? '-';

        $topCategoryTotal = $topCategory?->total ?? 0;


        /*
        |--------------------------------------------------------------------------
        | TREND BULANAN
        |--------------------------------------------------------------------------
        */

        $monthlyTrend = (clone $baseQuery)
            ->select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
                DB::raw("DATE_FORMAT(created_at, '%b %Y') as month_label"),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m')"),
                DB::raw("DATE_FORMAT(created_at, '%b %Y')")
            )
            ->orderBy('month')
            ->get();


        $trendLabels = $monthlyTrend
            ->pluck('month_label')
            ->values()
            ->toArray();

        $trendTotals = $monthlyTrend
            ->pluck('total')
            ->values()
            ->toArray();


        /*
        |--------------------------------------------------------------------------
        | TOP CATEGORY
        |--------------------------------------------------------------------------
        */

        $categoryData = (clone $baseQuery)
            ->select(
                'category_id',
                DB::raw('COUNT(*) as total')
            )
            ->whereNotNull('category_id')
            ->with('category')
            ->groupBy('category_id')
            ->orderByDesc('total')
            ->take(10)
            ->get();


        $categoryLabels = $categoryData
            ->map(function ($item) {

                return $item->category
                    ? $item->category->name
                    : 'Tanpa Kategori';

            })
            ->values()
            ->toArray();


        $categoryTotals = $categoryData
            ->pluck('total')
            ->values()
            ->toArray();


        /*
        |--------------------------------------------------------------------------
        | SUB CATEGORY
        |--------------------------------------------------------------------------
        */

        $subCategoryData = (clone $baseQuery)
            ->select(
                'sub_category_id',
                DB::raw('COUNT(*) as total')
            )
            ->whereNotNull('sub_category_id')
            ->with([
                'subCategory',
                'subCategory.category'
            ])
            ->groupBy('sub_category_id')
            ->orderByDesc('total')
            ->take(10)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | STATUS
        |--------------------------------------------------------------------------
        */

        $statusData = (clone $baseQuery)
            ->select(
                'status',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('status')
            ->orderByDesc('total')
            ->get();


        $statusLabels = $statusData
            ->pluck('status')
            ->values()
            ->toArray();

        $statusTotals = $statusData
            ->pluck('total')
            ->values()
            ->toArray();


        /*
        |--------------------------------------------------------------------------
        | PRIORITY
        |--------------------------------------------------------------------------
        */

        $priorityData = (clone $baseQuery)
            ->select(
                'priority_id',
                DB::raw('COUNT(*) as total')
            )
            ->whereNotNull('priority_id')
            ->with('priority')
            ->groupBy('priority_id')
            ->orderByDesc('total')
            ->get();


        $priorityLabels = $priorityData
            ->map(function ($item) {

                return $item->priority
                    ? $item->priority->name
                    : 'Tanpa Priority';

            })
            ->values()
            ->toArray();


        $priorityTotals = $priorityData
            ->pluck('total')
            ->values()
            ->toArray();


        /*
        |--------------------------------------------------------------------------
        | DEPARTMENT
        |--------------------------------------------------------------------------
        */

        $departmentData = (clone $baseQuery)
            ->select(
                'department_id',
                DB::raw('COUNT(*) as total')
            )
            ->whereNotNull('department_id')
            ->with('department')
            ->groupBy('department_id')
            ->orderByDesc('total')
            ->take(10)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | PEAK MONTH
        |--------------------------------------------------------------------------
        */

        $peakMonth = $monthlyTrend
            ->sortByDesc('total')
            ->first();

        $peakMonthLabel = $peakMonth?->month_label ?? '-';

        $peakMonthTotal = $peakMonth?->total ?? 0;


        /*
        |--------------------------------------------------------------------------
        | AVERAGE TICKET / MONTH
        |--------------------------------------------------------------------------
        */

        $monthCount = $monthlyTrend->count();

        $averagePerMonth = $monthCount > 0
            ? round($totalTicket / $monthCount, 1)
            : 0;


        /*
        |--------------------------------------------------------------------------
        | DETAIL CATEGORY
        |--------------------------------------------------------------------------
        */

        $categorySummary = (clone $baseQuery)
            ->select(
                'category_id',
                DB::raw('COUNT(*) as total')
            )
            ->whereNotNull('category_id')
            ->with('category')
            ->groupBy('category_id')
            ->orderByDesc('total')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'reports.issue-trend',
            compact(

                'startDate',
                'endDate',

                'totalTicket',
                'totalCategory',
                'totalSubCategory',

                'topCategoryName',
                'topCategoryTotal',

                'peakMonthLabel',
                'peakMonthTotal',

                'averagePerMonth',

                'trendLabels',
                'trendTotals',

                'categoryLabels',
                'categoryTotals',

                'categoryData',

                'subCategoryData',

                'statusLabels',
                'statusTotals',

                'priorityLabels',
                'priorityTotals',

                'departmentData',

                'categorySummary'
            )
        );
    }
}
