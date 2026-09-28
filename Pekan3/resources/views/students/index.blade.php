@extends('layouts.main')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <h2>Daftar Mahasiswa</h2>

    {{-- Komponen Alert --}}
    <x-alert type="success" message="Data mahasiswa berhasil dimuat."/>

    {{-- Looping dengan include --}}
    @foreach ($students as $student)
        @include('partials.student-card', ['student' => $student])
    @endforeach
    
    @foreach($students as $student)
        <div class="card">
            <h3>{{ $student['name'] }}</h3>
            <p><strong>Jurusan: </strong>{{ $student['major'] }}</p>
            <p><strong>Umur: </strong>{{ $student['age'] }} tahun</p>

            @if($student['age'] >= 22)
                <p>Status: <span style="color:green;">Senior</span></p>
            @else
                <p>Status: <span style="color:blue;">Junior</span></p>
            @endif

            <h4>Mata Kuliah:</h4>
            @forelse($student['courses'] as $course)
                <span class="course">{{ $course }}</span>
            @empty
                <p>Tidak ada mata kuliah terdaftar.</p>
            @endforelse
        </div>
    @endforeach
@endsection
