<?php

namespace App\Http\Controllers;

use App\Models\Tupad;
use App\Models\Official;
use Illuminate\Http\Request;
use App\Models\BoatRegistration;
use Illuminate\Support\Facades\DB;
use App\Models\NonBoatRegistration;
use Illuminate\Foundation\Auth\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $electedOfficials = Official::whereIn('position', [1, 2])->count();
        $appointedOfficials = Official::whereNotIn('position', [1, 2])->count();
        $newlyApplicant = Tupad::where('status', 'new')->count();
        $recentApplicant = Tupad::where('status', 'recent')->count();

        // Get monthly counts of applicants from the tupad table
        $monthlyCounts = Tupad::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Initialize an array for 12 months starting at index 0
        $data = array_fill(0, 12, 0);

        // Populate the $data array with the counts
        foreach ($monthlyCounts as $monthlyCount) {
            $data[$monthlyCount->month - 1] = $monthlyCount->count;
        }


        $motorized = BoatRegistration::all()->count();
        $non_motorized = NonBoatRegistration::all()->count();
        $tupad = User::where('role', '1')->count();
        $agriculture = User::where('role', '2')->count();
        $acap = User::where('role', '3')->count();
        return view('admin.dashboard')->with([
            'elected' => $electedOfficials,
            'appointed' => $appointedOfficials,
            'new' => $newlyApplicant,
            'recent' => $recentApplicant,
            'monthlyData' => $data,
            'motorized' => $motorized,
            'non_motorized' => $non_motorized,
            'tupad' => $tupad,
            'agriculture' => $agriculture,
            'acap' => $acap

        ]);
    }
}
