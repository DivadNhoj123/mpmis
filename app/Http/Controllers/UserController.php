<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereIn('role', [1, 2])->get();
        return view('admin.account.account')->with('users', $users);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);


        if ($validated) {
            User::create([
                'image' => '1.png',
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => bcrypt($request->password),
                // 'image' => $imagePath // Save the image path
            ]);

            return redirect()->route('accounts.index')->with('success', 'Applicant successfully added.');
        }
    }
}
