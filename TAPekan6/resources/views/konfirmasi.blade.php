@extends('layouts.app')

@section('title', 'Konfirmasi Laporan')

@section('content')
<x-alert type="success">
    Data laporan banjir berhasil disimpan!
</x-alert>

<a href="{{ route('lapor.form') }}" class="btn btn-primary">
    Kembali ke Form
</a>
@endsection