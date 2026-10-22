@extends('layouts.app')

@section('title', 'Profil Petugas - LaporBanjir')

@section('content')
<div class="form-card" style="max-width: 600px;">
    <h2>Profil Petugas BPBD</h2>
    <p class="form-subtitle">Informasi akun petugas yang sedang aktif</p>

    <div style="margin-top: 20px;">
        <div class="form-group">
            <label>Nama Lengkap:</label>
            <p style="padding: 10px; background: #f9f9f9; border: 1px solid #ddd; border-radius: 5px;">
                {{ Auth::user()->name }}
            </p>
        </div>

        <div class="form-group">
            <label>Email Resmi:</label>
            <p style="padding: 10px; background: #f9f9f9; border: 1px solid #ddd; border-radius: 5px;">
                {{ Auth::user()->email }}
            </p>
        </div>

        <div class="form-group">
            <label>Waktu Pembuatan Akun:</label>
            <p style="padding: 10px; background: #f9f9f9; border: 1px solid #ddd; border-radius: 5px;">
                {{ Auth::user()->created_at }}
            </p>
        </div>
    </div>
</div>
@endsection