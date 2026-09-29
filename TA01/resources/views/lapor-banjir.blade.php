@extends('layouts.app')
@section('title', 'Lapor Banjir')
@section('style')
<style>
    .form-container {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        max-width: 450px;
        margin: auto;
        border-top: 5px solid #2c4baf;
    }

    h2 {
        color: #2c4baf;
        text-align: center;
    }

    .subtitle {
        text-align: center;
        color: #666;
    }

    label {
        font-weight: bold;
        margin-top: 15px;
        display: block;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #2c4baf;
        color: white;
        border: none;
        border-radius: 5px;
        margin-top: 25px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
    }
</style>
@endsection
@section('content')

<div class="form-container">
    <h2>Lapor Banjir</h2>
    <p class="subtitle">BPBD Kabupaten Bandung</p>
    <form action="{{ route('lapor.proses') }}" method="POST"
          onsubmit="return konfirmasiKirim()">
        @csrf
        <label>Nama Pelapor:</label>
        <input type="text"
               name="nama_pelapor"
               id="nama"
               required
               placeholder="Masukkan nama lengkap">
        <label>Lokasi Kejadian (Kecamatan/Desa):</label>
        <input type="text"
               name="lokasi_kejadian"
               required
               placeholder="Contoh: Bojongsoang">
        <label>Tinggi Genangan Air (cm):</label>
        <input type="number"
               name="tinggi_genangan"
               required
               placeholder="Contoh: 50">
        <button type="submit">
            Kirim Laporan
        </button>
    </form>
</div>
<script>
    function konfirmasiKirim() {
        let nama = document.getElementById('nama').value;
        return confirm(
            "Halo " + nama +
            ", apakah data laporan banjir sudah benar dan siap dikirim?"
        );
    }
</script>
@endsection