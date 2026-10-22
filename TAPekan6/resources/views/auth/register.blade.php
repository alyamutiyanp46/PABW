@extends('layouts.app')
@section('title', 'Daftar - LaporBanjir')

@section('content')
<div class="form-card">
    <h2>Daftar Akun Baru</h2>
    <p class="form-subtitle">Buat akun untuk BPBD Kabupaten Bandung</p>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Lengkap:</label>
            <input type="text" id="name" name="name" required autofocus>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit">Daftar</button>
    </form>
</div>
@endsection