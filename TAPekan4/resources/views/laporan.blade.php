@extends('layouts.app')
@section('title', 'Daftar Laporan Banjir')
@section('content')

<div class="container">
    <h2>Daftar Laporan Banjir</h2>
    <div class="laporan-grid">
    @foreach ($laporan as $item)
        @include('partials.laporan-card', [
            'laporan' => $item
        ])
    @endforeach
    </div>
</div>
@endsection