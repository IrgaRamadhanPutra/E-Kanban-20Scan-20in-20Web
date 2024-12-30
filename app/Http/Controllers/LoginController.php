<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Ekanban_Usertbl as User;
use PHPUnit\Framework\Constraint\IsEmpty;

// use App\Models\User;

// use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        // dd($request);

        //object kolom
        $user = $request->user;
        $pass = md5($request->pass);
        // $check data
        $check = User::where('user', $user)
            ->where('pass', $pass)
            ->first();
        // dd($check);
        //jika kondisi cek $check data ada
        if ($check) {
            Auth::login($check);
            return redirect('/');
            //jika tidak di kembalikan ke auth
        } else {
            // Session::flash('message', 'My message');
            Session::flash('message', 'User atau Password salah ');
            Session::flash('error', 'Silahkan login kembali ');
            return redirect('/auth');
        }
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/auth');
    }
}
