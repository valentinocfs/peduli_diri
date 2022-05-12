<?php

namespace App\Http\Controllers;

use App\Models\Perjalanan;
use Carbon\Carbon;
use Illuminate\Foundation\Console\UpCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerjalananController extends Controller
{
    public function index()
    {
        return view("pages.formPerjalanan");
    }

    public function simpanPerjalanan(Request $request)
    {
        $data = [
            'id_user' => auth()->user()->id,
            'lokasi' => $request->lokasi,
            'suhu' => $request->suhu,
            'jam' => $request->jam,
            'tanggal' => $request->tanggal,
        ];

        $createData = Perjalanan::create($data);
        if ($createData) {
            return redirect('/dashboard')->with('message', 'Berhasil menyimpan data perjalanan');
        }

        return redirect('/formPerjalanan')->withFail('message', 'Gagal menyimpan data perjalanan');
    }

    public function detail($id)
    {
        $data = Perjalanan::find($id);

        if (!$data) {
            return abort(404);
        }

        if (auth()->user()->id == $data->id_user) {
            return view('pages.perjalanan.index', ['data' => $data]);
        }

        return abort(404);
    }

    public function delete($id)
    {
        $data = Perjalanan::find($id);

        if (!$data) {
            return abort(404);
        }

        if (auth()->user()->id == $data->id_user) {
            $data->delete($data);

            if ($data) {
                return redirect('/dashboard')->with('message', 'Berhasil menghapus data perjalanan');
            }

            return redirect('/dashboard')->withFail('message', 'Gagal menghapus data perjalanan');
        }

        return abort(404);
    }

    public function update(Request $request, $id)
    {
        $updatedData = Perjalanan::find($id);

        if (!$updatedData) {
            return abort(404);
        }

        if (auth()->user()->id == $updatedData->id_user) {
            $data = $request->all();
            $data['updated_at'] = now('Asia/Jakarta');
            $data['id_user'] = auth()->user()->id;

            $updatedData->update($data);

            // $data->updated_at->format('d/m/Y');

            if ($updatedData) {
                return redirect()->back()->with('message', 'Berhasil mengubah data perjalanan');
            }

            return redirect()->back()->withFail('message', 'Gagal mengubah data perjalanan');
        }

        return abort(404);
    }
}
