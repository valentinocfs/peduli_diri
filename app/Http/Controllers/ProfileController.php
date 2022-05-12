<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            $data = DB::table('perjalanan')
                ->join('users', 'users.id', '=', 'perjalanan.id_user')
                ->select('users.*', 'perjalanan.*')
                ->where('users.id', '=', auth()->user()->id)
                ->first();

            return view('pages.profile', ['data' => $data]);
        }
    }
}
