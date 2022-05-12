<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('/');
    }

    public function index()
    {
        return view('pages.auth.login');
    }

    public function formLogin(Request $request)
    {
        if (Auth::attempt([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->email
        ])) {
            return redirect("/dashboard");
        }

        return redirect('/')->with('email', 'Login gagal! NIK dan Nama tidak ditemukan')->withFail('NIK atau Nama yang anda masukkan salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
