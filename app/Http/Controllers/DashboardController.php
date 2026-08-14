<?php

namespace App\Http\Controllers;

use App\Models\Knight;
use App\Models\Squire;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the Squire Management dashboard.
     */
    public function index(): View
    {
        $totalKnights = Knight::count();

        $totalSquires = Squire::count();

        $beginnerSquires = Squire::where(
            'training_level',
            'beginner'
        )->count();

        $intermediateSquires = Squire::where(
            'training_level',
            'intermediate'
        )->count();

        $advancedSquires = Squire::where(
            'training_level',
            'advanced'
        )->count();

        $averageSquiresPerKnight = $totalKnights > 0
            ? round($totalSquires / $totalKnights, 2)
            : 0;

        $topKnights = Knight::withCount('squires')
            ->orderByDesc('squires_count')
            ->orderBy('name')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalKnights',
            'totalSquires',
            'beginnerSquires',
            'intermediateSquires',
            'advancedSquires',
            'averageSquiresPerKnight',
            'topKnights'
        ));
    }
}