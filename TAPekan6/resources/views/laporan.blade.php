@extends('layouts.app')

@section('title', 'Daftar Laporan Banjir')

@section('content')
<div class="container">
    <h2>Daftar Laporan Banjir</h2>

    @if ($laporan->isEmpty())
        <div style="background-color: #d1ecf1; color: #0c5460; padding: 15px; border-radius: 5px; border: 1px solid #bee5eb;">
            Belum ada laporan banjir.
        </div>
    @else
        <div class="laporan-grid">
            @foreach ($laporan as $item)
                @include('partials.laporan-card', ['laporan' => $item])
            @endforeach
        </div>
    @endif
</div>
@endsection