@extends('layouts.app')
@section('title', 'Daftar Laporan')
@section('style')
<style>
    .laporan-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .laporan-card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        border-left: 5px solid #2c4baf;
    }

    .laporan-card h3 {
        color: #2c4baf;
        margin-top: 0;
    }

    .laporan-card p {
        margin: 8px 0;
    }

    .status {
        display: inline-block;
        margin-top: 10px;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: bold;
    }

    .waspada {
        background-color: #fff3cd;
        color: #856404;
    }

    .siaga {
        background-color: #ffe0b2;
        color: #e65100;
    }

    .awas {
        background-color: #f8d7da;
        color: #721c24;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h2>Daftar Laporan Banjir</h2>
    <p>
        Berikut merupakan contoh laporan banjir yang tersedia pada sistem.
    </p>
    <div class="laporan-grid">
        @forelse ($laporan as $data)
            @include('partials.laporan-card', [
                'laporan' => $data
            ])
        @empty
            <p>Belum terdapat laporan banjir.</p>
        @endforelse
    </div>
</div>
@endsection