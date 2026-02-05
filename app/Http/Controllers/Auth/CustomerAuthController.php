<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.customer-login');
    }

    public function showRegister()
    {
        return view('auth.customer-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6|confirmed',
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('customer.login')
            ->with('success', 'Registrasi berhasil, silakan login');
    }

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);


    if (Auth::guard('customer')->attempt($credentials)) {
        
        $request->session()->regenerate();
        session()->regenerate();
        return redirect()->route('customer.dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah',
    ]);
}


    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
