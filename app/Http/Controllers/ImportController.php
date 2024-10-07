<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Imports\ImportApplicant;
use App\Imports\OfficialsImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importElected(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new OfficialsImport, $file);

        return redirect()->route('barangay-officials.index')
                ->with('success', 'Official information imported successfully!');
    }

    public function importAppointed(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new OfficialsImport, $file);

        return redirect()->route('appointed-officials.index')
                ->with('success', 'Official information imported successfully!');
    }

    public function importApplicant(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new ImportApplicant, $file);

        return redirect()->route('tupad-applicant.index')
                ->with('success', 'Official information imported successfully!');
    }
}
