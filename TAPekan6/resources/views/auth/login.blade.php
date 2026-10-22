@extends('layouts.app')
@section('title', 'Login - LaporBanjir')

@section('content')
<div class="form-card">
    <h2>Login Akun</h2>
    <p class="form-subtitle">Masuk untuk mengelola laporan</p>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</div>
@endsection