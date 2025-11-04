<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\AssetMain;
use App\Models\Repair;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Get statistics with error handling
            $totalAssets = AssetMain::count() ?? 0;
            $totalRepairs = Repair::count() ?? 0;
            $totalUsers = User::count() ?? 0;

            // Repair statistics by status
            $pendingRepairs = Repair::where('status', 'pending')->count() ?? 0;
            $inProgressRepairs = Repair::where('status', 'in_progress')->count() ?? 0;
            $completedRepairs = Repair::where('status', 'completed')->count() ?? 0;

            // Recent repairs
            $recentRepairs = Repair::orderBy('created_at', 'desc')->take(5)->get();

            // Recent assets
            $recentAssets = AssetMain::orderBy('created_at', 'desc')->take(5)->get();

            // Monthly repair trends (last 6 months)
            $repairTrends = Repair::select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('count(*) as count')
            )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

            // Asset value statistics
            $totalAssetValue = AssetMain::sum('asset_price') ?? 0;
            $averageAssetValue = AssetMain::avg('asset_price') ?? 0;

        } catch (\Exception $e) {
            // If tables don't exist or there's an error, use default values
            $totalAssets = 0;
            $totalRepairs = 0;
            $totalUsers = User::count() ?? 0;
            $pendingRepairs = 0;
            $inProgressRepairs = 0;
            $completedRepairs = 0;
            $recentRepairs = collect();
            $recentAssets = collect();
            $repairTrends = collect();
            $totalAssetValue = 0;
            $averageAssetValue = 0;
        }

        return view('dashboard', compact(
            'totalAssets',
            'totalRepairs',
            'totalUsers',
            'pendingRepairs',
            'inProgressRepairs',
            'completedRepairs',
            'recentRepairs',
            'recentAssets',
            'repairTrends',
            'totalAssetValue',
            'averageAssetValue'
        ));
    }
}
