@extends('layouts.app')

@section('title', $title)
@section('header_title', $title)

@section('content')
    <div class="empty-state">
        <i data-lucide="file" style="width: 48px; height: 48px; margin-bottom: 16px; color: var(--text-secondary);"></i>
        <h3>{{ $title }}</h3>
        <p>Halaman ini merupakan route placeholder sesuai instruksi Tugas Akhir.</p>
    </div>
@endsection
