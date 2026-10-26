@extends('layouts.main')
@section('content')
    <h1>Riwayat Monitoring</h1>
    <table border="1">
        <thead>
            <tr>
                <th>
                    Lokasi
                </th>
                <th>
                    Nama Tanaman
                </th>
                <th>
                    Kelembapan tanah
                </th>
                <th>
                    Suhu udara
                </th>
                <th>
                    Kelembapan udara
                </th>
                <th>
                    Status lahan
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($monitoring as $item)
            <tr>
                <td>
                    {{ $item -> lokasi }}
                </td>

                <td>
                    {{ $item -> nama_tanaman }}
                </td>

                <td>
                    {{ $item -> kelembapan_tanah }}
                </td>

                <td>
                    {{ $item -> suhu_udara }}
                </td>

                <td>
                    {{ $item -> kelembapan_udara }}
                </td>

                <td>
                    {{ $item -> status_lahan }}
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection