@extends('layouts.master')
@section('title', 'Detail Perjalanan')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertCreatePerjalanan">
        <div>
            <strong> {{ Session::get('message') }}</strong>
        </div>
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="row">
    <div class="col-12 col-md-8">
        <div class="card">
            <div
                class="card-header border-bottom d-flex justify-content-between align-items-center">
                <h4 class="card-title d-flex">
                    <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Data Perjalanan
                </h4>

            </div>
            <div class="card-body px-0 py-1">
                <form action="/perjalanan/{{ $data->id }}/update" method="POST">
                @csrf
                <table class='table table-borderless'>
                    <tr>
                        <td class='col-3'>Lokasi</td>
                        <td class='col-8'>
                            <input type="text" class="form-control" name="lokasi" value="{{ $data->lokasi }}" onchange="checkUpdatedData(this)">
                        </td>
                    </tr>
                    <tr>
                        <td class='col-3'>Suhu</td>
                        <td class='col-8'>
                            <input type="text" class="form-control" name="suhu" value="{{ $data->suhu }}" onchange="checkUpdatedData(this)">
                        </td>
                    </tr>
                    <tr>
                        <td class='col-3'>Tanggal</td>
                        <td class='col-8'>
                            <input type="date" class="form-control" name="tanggal" value="{{ $data->tanggal }}" onchange="checkUpdatedData(this)">
                        </td>
                    </tr>
                    <tr>
                        <td class='col-3'>Jam</td>
                        <td class='col-8'>
                            <input type="time" class="form-control" name="jam" value="{{ $data->jam }}" onchange="checkUpdatedData(this)">
                        </td>
                    </tr>
                </table>
                <div class="col-sm-12 d-flex justify-content-end px-4 py-2">
                    <button type="submit" class="btn btn-primary me-1 mb-1" id="btnUpdateData">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div
                class="card-header border-bottom d-flex justify-content-between align-items-center">
                <h4 class="card-title d-flex">
                    <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Info Detail Perjalanan
                </h4>
            </div>
            <div class="card-body px-0 py-1">
                <table class='table table-borderless'>
                    <tr>
                        <td class='col-5'>Nama</td>
                        <td class='col-7'>
                            <p>{{ auth()->user()->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class='col-5'>Terakhir diubah</td>
                        <td class='col-7'>
                            <p>{{ $data->updated_at }}</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="col-12 d-flex px-2 py-2">
                <button type="submit" class="btn btn-outline-danger" style="width: 100%;" id="btnUpdateData">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    function checkUpdatedData(that) {
        const btnUpdateData = document.getElementById('btnUpdateData');

        // btnUpdateData.disabled = false;
    }
</script>
@endsection

