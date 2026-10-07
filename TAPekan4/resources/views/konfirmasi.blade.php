@extends('layouts.app')
@section('title', 'Konfirmasi Laporan')
@section('content')

<div class="container">
    <x-alert type="success">
        Data laporan banjir berhasil disimpan!
    </x-alert>
    <a href="{{ route('lapor.form') }}">
        Kembali ke Form
    </a>
    <a href="{{ route('lapor.daftar') }}">
        Lihat Daftar Laporan
    </a>
</div>
@endsection