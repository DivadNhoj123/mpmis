<?php

namespace App\Http\Controllers;

use App\Models\Tupad;
use App\Models\Official; // Import the Official model
use Illuminate\Http\Request;
use Carbon\Carbon;

class TupadController extends Controller
{
    public function index()
    {
        $hasNewStatus = Tupad::where('status', 'new')->exists();
        $applicants = Tupad::where('status', 'new')->get();

        return view('admin-tupad.tupad')->with([
            'applicants' => $applicants,
            'hasNewStatus' => $hasNewStatus,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'initial' => 'nullable',
            'surname' => 'required',
            'suffix' => 'nullable',
            'barangay' => 'required',
        ]);

        if ($validated) {
            // Check if the applicant is an official
            $official = Official::where('name', $request->name)
                ->where('middle_name', $request->initial)
                ->where('surname', $request->surname)
                ->where('suffix', $request->suffix)
                ->first();

            if ($official) {
                return redirect()->back()->withInput()->with([
                    'official_position' => $official->position,
                    'official_address' => $official->barangay,
                ]);
            }

            $existingRecord = Tupad::where('name', $request->name)
                ->where('initial', $request->initial)
                ->where('surname', $request->surname)
                ->where('suffix', $request->suffix)
                ->whereYear('created_at', Carbon::now()->year)
                ->first();

            if ($existingRecord) {
                return redirect()->back()->withInput()->with([
                    'already_applied_year' => Carbon::now()->year,
                    'applied_date' => $existingRecord->created_at->format('F d, Y'),
                ]);
            }

            Tupad::create([
                'name' => $request->name,
                'initial' => $request->initial,
                'surname' => $request->surname,
                'suffix' => $request->suffix,
                'barangay' => $request->barangay,
                'status' => 'new',
            ]);

            return redirect()->route('tupad-applicant.index')->with('success', 'Applicant successfully added.');
        }
    }

    public function remove(Request $request)
    {
        Tupad::where('status', 'new')->update(['status' => 'recent']);

        return redirect()->route('tupad-applicant.index')->with('success', 'All records updated to recent.');
    }

    public function print()
    {
        $count = Tupad::where('status', 'new')->count();
        $tupads = Tupad::where('status', 'new')->get();
        return view('admin-tupad.print', compact('tupads', 'count'));
    }
}
