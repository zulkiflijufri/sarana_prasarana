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

        if(Auth::attempt($request->only('email', 'password'))) {
            return redirect ('/dasboard');
        }

        return redirect('/')->with('gagal', 'Email atau Password belum terdaftar');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
