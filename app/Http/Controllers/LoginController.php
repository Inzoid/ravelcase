<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel,Session;

class LoginController extends Controller
{
    public function login()
    {
        if($user = Sentinel::check())
        {
            Session::flash('notice', ' Kamu sudah login sebagai ' . $user->email );
            return redirect('/admin');
        }else {
            return view('auth.login');
        }
    }

    public function login_store(Request $request)
    {
        if($user = Sentinel::authenticate($request->all())) {
            Session::flash('notice', 'Welcome ' . $user->email );
            return redirect('/admin');
        } else {
            Session::flash('error', 'Login Gagal');
            return redirect('/login');
        }
    }

    public function logout()
    {
        Sentinel::logout();
        Session::flash('notice', 'Logout berhasil');
        return redirect('/login');
    }
}
