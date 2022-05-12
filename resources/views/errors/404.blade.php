@extends('errors::minimal')

@section('title', __('Not Found - Peduli Diri'))
@section('code', '404')
@section('message', __('Halaman yang anda cari tidak dapat ditemukan'))

@section('content')
    <a href="/dashboard" class='btn btn-primary'>Back to Dashboard</a>
@endsection
