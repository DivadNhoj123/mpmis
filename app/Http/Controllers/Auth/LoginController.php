<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'role' => 'required|in:0,1,2,3',
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            switch ($request->role) {
                case '1':
                    return redirect()->route('dashboard'); // Redirect to TUPAD dashboard
                case '2':
                    return redirect()->route('dashboard'); // Agriculture dashboard
                case '3':
                    return redirect()->route('dashboard'); // ACAP dashboard
                case '0':
                    return redirect()->route('dashboard'); // Admin dashboard
            }
        }

        return back()->withErrors(['email' => 'These credentials do not match our records.']);
    }
}
