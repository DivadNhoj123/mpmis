<?php

namespace App\Http\Controllers;

use App\Models\Tupad;
use App\Models\Official;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    public function myAccount()
    {

        return view('admin-tupad.my-account');
    }

    public function showChangePasswordForm($id)
    {
        return view('admin-tupad.change-password', ['id' => $id]);
    }

    public function changePassword(Request $request, $id)
    {
        // Validate the input fields
        $request->validate([
            'currentPassword' => 'required',
            'newpassword' => 'required|min:8|confirmed', // 'confirmed' checks for newpassword_confirmation match
        ]);

        // Find the user by the provided ID
        $user = User::findOrFail($id);

        // Verify if the provided current password matches the user's actual password
        if (!Hash::check($request->currentPassword, $user->password)) {
            return back()->withErrors(['currentPassword' => 'The current password is incorrect.']);
        }

        // Check if the new password is not the same as the current password
        if ($request->currentPassword === $request->newpassword) {
            return back()->withErrors(['newpassword' => 'The new password cannot be the same as the current password.']);
        }

        // Update the user's password in the database
        $user->update([
            'password' => Hash::make($request->newpassword),
        ]);

        // Redirect with a success message
        Auth::logout();

        // Redirect to login page with a success message
        return redirect()->route('login')->with('success', 'Password successfully changed. Please log in with your new password.');
    }
}
