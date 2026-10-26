@extends
@section('content')
    <h1>Hasil Monitoring</h1>
    <p>Lokasi: {{ $data['lokasi'] }}</p>
    <p>Lokasi: {{ $data['nama_tanaman'] }}</p>
    <p>Lokasi: {{ $data['kelembapan_tanah'] }}</p>
    <p>Lokasi: {{ $data['suhu_udara'] }}</p>
    <p>Lokasi: {{ $data['kelembapan_udara'] }}</p>
    <p>Lokasi: {{ $data['status_lahan'] }}</p>

    <a href="{{ route('monitoring.form') }}">Kembali ke Form</a>
@endsection
