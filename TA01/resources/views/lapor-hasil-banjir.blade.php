@extends('layouts.app')
@section('title', 'Konfirmasi Laporan')
@section('style')
<style>
    .result-container {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        max-width: 650px;
        margin: 30px auto;
    }

    .result-container h2 {
        color: #2c4baf;
        text-align: center;
        margin-bottom: 20px;
    }

    .data-box {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-top: 20px;
        border-left: 5px solid #2c4baf;
    }

    .data-box p {
        margin: 10px 0;
    }

    .btn-back {
        display: block;
        width: fit-content;
        margin: 25px auto 0;
        padding: 10px 20px;
        background-color: #2c4baf;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
    }

    .btn-back:hover {
        background-color: #1f3990;
    }
</style>
@endsection

@section('content')
<div class="result-container">
    <h2>Konfirmasi Laporan</h2>
    <x-alert>
        Laporan berhasil dikirim dan telah diterima oleh sistem sementara BPBD Kabupaten Bandung.
    </x-alert>

    <div class="data-box">
        <p>
            <strong>Nama Pelapor:</strong>
            {{ $nama_pelapor }}
        </p>
        <p>
            <strong>Lokasi Kejadian:</strong>
            {{ $lokasi_kejadian }}
        </p>
        <p>
            <strong>Tinggi Genangan:</strong>
            {{ $tinggi_genangan }} cm
        </p>
    </div>
    <a href="{{ route('lapor.form') }}" class="btn-back">
        Kembali ke Form
    </a>
</div>
@endsection