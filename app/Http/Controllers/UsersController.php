<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Sentinel;
use Session;

class UsersController extends Controller
{
    public function signup()
    {
        return view('auth.signup');
    }

    public function signup_store(Request $request)
    {
        $credentials = [
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
            'email'      => $request->input('email'),
            'password'   => $request->input('password'),
        ];
        
        $user = Sentinel::registerAndActivate($credentials);
        Session::flash('notice', 'Akun berhasil dibuat');
        return redirect()->route('login');
    }
}
