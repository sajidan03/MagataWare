<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserCon extends Controller
{
    //
    public function index(){
        return view('Admin.login');
    }

    public function member(){
        return view('login');
    }

    public function auth(Request $request){
        $validasi = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($validasi)){
            return redirect()->intended('/administrator');
        }

        return redirect()->back()->with('message', 'Login Gagal');
    }

    public function authmember(Request $request){
        $validasi = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($validasi)){
            return redirect()->intended('/');
        }

        return redirect()->back()->with('message', 'Login Gagal');
    }

    public function logout(){
        Auth::logout();
        return redirect('/member/login');
    }
}
