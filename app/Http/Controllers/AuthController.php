<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('layouts.auth.login');
    }

    public function postlogin(Request $request) {
        // validate
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // jika berhasil login
        if(Auth::attempt($request->only('email', 'password'))) {
            return redirect ('/dasboard')->with('login', 'Anda berhasil login');
        }

        return redirect('/')->with('gagal', 'Email atau Password salah');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
