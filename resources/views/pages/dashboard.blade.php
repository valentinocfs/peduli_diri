@extends('layouts.master')
@section('title', 'Dashboard')
   
@section('content')

@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertCreatePerjalanan">
        <div>
            {{-- <i data-feather="check-circle" width="20">Success</i> --}}
            <strong> {{ Session::get('message') }}</strong>
        </div>
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card">
    @if (isset($data))    
        <div class="card-body">
            @if (!empty($msgSearching))
                <p>{{ $msgSearching }}</p>
            @endif
            @include('layouts.tablePerjalanan')
            @if (request()->is('cari') || request()->is('urutkan'))   
                <div class="mt-4">
                  <p>Kembali ke <a href="/dashboard">Dashboard</a></p>
                </div> 
            @endif
        </div>

        <div class="d-flex justify-content-center">
            {{ $data->appends($_GET)->links('vendor.pagination.bootstrap-4') }}
        </div>

    @elseif (!isset($data))
        <div class="py-4 px-3">
            <p>Data tidak temukan. <a href="/dashboard">Kembali</a></p>
        </div>
    @endif
</div>

@endsection