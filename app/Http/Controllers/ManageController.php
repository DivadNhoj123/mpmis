<?php

namespace App\Http\Controllers;

use App\Models\Tupad;
use App\Models\Official;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageController extends Controller
{
    public function index()
    {
        $electedOfficials = Official::whereIn('position', [1, 2])->count();
        $appointedOfficials = Official::whereNotIn('position', [1, 2])->count();
        $Tupad = Tupad::all()->count();

        return view('admin-tupad.manage')->with([
            'elected' => $electedOfficials,
            'appointed' => $appointedOfficials,
            'tupad' => $Tupad,

        ]);
    }

    public function emptyTupad()
    {
        DB::table('tupads')->truncate();

        return response()->json([
            'success' => true,
            'message' => 'All records have been deleted!'
        ]);
    }
    public function emptyElected()
    {
        DB::table('officials')->whereIn('position', [1, 2])->delete();

        return response()->json([
            'success' => true,
            'message' => 'All elected Officials have been deleted!'
        ]);
    }

    public function emptyAppointed()
    {
        DB::table('officials')->whereNotIn('position', [1, 2])->delete();

        return response()->json([
            'success' => true,
            'message' => 'All appointed Officials have been deleted!'
        ]);
    }

    public function myAccount(){
        return view('admin-tupad.my-account');
    }

    public function changePassword(){
        return view('admin-tupad.change-password');
    }
}
