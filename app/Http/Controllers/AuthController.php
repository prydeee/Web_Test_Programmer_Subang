<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(auth()->attempt($credentials)) {
            return redirect('/dashboard');
        }

        return redirect()->back()->with('error', 'Username atau Password salah');
    }

    public function doLogout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
