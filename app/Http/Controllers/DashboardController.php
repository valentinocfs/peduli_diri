<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()) {


            $data = DB::table('perjalanan')
                ->join('users', 'users.id', '=', 'perjalanan.id_user')
                ->select('users.name', 'perjalanan.id', 'perjalanan.tanggal', 'perjalanan.lokasi', 'perjalanan.suhu', 'perjalanan.jam')
                ->where('users.id', '=', auth()->user()->id)
                ->latest('perjalanan.created_at')
                ->paginate(5);

            return view('pages.dashboard', ['data' => $data]);
        }

        return view('pages.dashboard');
    }

    public function cariPerjalanan(Request $request)
    {
        $input = '';
        $keyword = '';

        if ($request->input("jam")) {
            $input = 'jam';
            $keyword = $request->jam;
        } elseif ($request->input("lokasi")) {
            $input = 'lokasi';
            $keyword = $request->lokasi;
        } elseif ($request->input("tanggal")) {
            $input = 'tanggal';
            $keyword = $request->tanggal;
        } elseif ($request->input("suhu")) {
            $input = 'suhu';
            $keyword = $request->suhu;
        } else {
            $input = '';
            $keyword = '';
        }

        if ($input && $keyword) {
            $data = User::join('perjalanan', 'perjalanan.id_user', '=', 'users.id')
                ->where(
                    function ($query) use ($keyword, $input) {
                        $query->where('users.name', auth()->user()->name)
                            ->where('perjalanan.' . $input, 'LIKE', '%' . $keyword . '%');
                    }
                )->select('users.name', 'perjalanan.*')
                ->paginate(5);

            return view('pages.dashboard', [
                'data' => $data,
                'msgSearching' => 'Pencarian berdasarkan ' . $input
            ]);
        } else {
            return view('pages.dashboard');
        }
    }

    public function urutkanPerjalanan(Request $request)
    {
        $kategori = $request->kategori;
        $orderBy = $request->orderBy;
        $perPage = $request->perPage;

        if (auth()->user()) {
            if ($kategori && $orderBy) {
                $data = DB::table('perjalanan')
                    ->join('users', 'users.id', '=', 'perjalanan.id_user')
                    ->select('perjalanan.id', 'perjalanan.tanggal', 'perjalanan.lokasi', 'perjalanan.suhu', 'perjalanan.jam')
                    ->where('users.id', '=', auth()->user()->id)
                    ->orderBy('perjalanan.' . $kategori, $orderBy)
                    ->paginate($perPage);

                if ($kategori == 'lokasi') {
                    if ($orderBy == 'asc') {
                        $orderBy = 'A - Z';
                    } else {
                        $orderBy = "Z - A";
                    }
                } else if ($kategori == 'suhu') {
                    if ($orderBy == 'asc') {
                        $orderBy = 'terkecil';
                    } else {
                        $orderBy = "terbesar";
                    }
                } else if ($kategori == 'tanggal') {
                    if ($orderBy == 'asc') {
                        $orderBy = 'terbaru';
                    } else {
                        $orderBy = "terlama";
                    }
                }

                $msgSearching = 'Pencarian berdasarkan urutan ' . $kategori . ' ' . $orderBy;
            } else {
                $data = DB::table('perjalanan')
                    ->join('users', 'users.id', '=', 'perjalanan.id_user')
                    ->select('perjalanan.id', 'perjalanan.tanggal', 'perjalanan.lokasi', 'perjalanan.suhu', 'perjalanan.jam')
                    ->where('users.id', '=', auth()->user()->id)
                    ->paginate($perPage);

                $msgSearching = '';
            }

            return view(
                'pages.dashboard',
                [
                    'data' => $data,
                    'msgSearching' => $msgSearching
                ]
            );
        }

        return view('pages.dashboard');
    }
}
