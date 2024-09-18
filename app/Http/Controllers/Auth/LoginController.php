<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Autentikasi untuk Admin
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/index');
        }

        // Autentikasi untuk Employee
        if (Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/employee');
        }

        // Jika gagal
        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        Auth::guard('employee')->logout();

        return redirect('/form-login');
    }
}
