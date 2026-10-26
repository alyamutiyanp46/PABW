@extends('layouts.main')
@section('content')
    <h1>
        Form Monitoring
    </h1>
    <form action="{{ route('monitoring.proses') }}" method="POST">
        @csrf
        <label>Lokasi Lahan</label>
        <select name="lokasi" required>
            <option value="Garut Kota">Garut Kota</option>
            <option value="Tarogong Kaler">Tarogong Kaler</option>
            <option value="Samarang">Samarang</option>
        </select>

        <label>Nama Tanaman</label>
        <input type="text" name="nama_tanaman" required>

        <label>Kelembapan Tanah</label>
        <input type="number" name="kelembapan_tanah" min="20" max="90" required>

        <label>Suhu udara</label>
        <input type="number" name="suhu_udara" min="20" max="40" required>

        <label>Kelembapan udara</label>
        <input type="number" name="kelembapan_udara" min="40" max="95" required>

        <button type="submit">Proses Monitoring</button>
    </form>
@endsection