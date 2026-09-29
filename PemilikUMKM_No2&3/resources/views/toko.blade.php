@extends('layouts.app')

@section('title', 'Profil Toko')
@section('header_title', 'Profil Toko')
@section('header_subtitle', 'Pengaturan dan informasi toko')
@section('show_logout', true)

@section('content')
<form onsubmit="event.preventDefault(); alert('Ini hanya tampilan statis')">
    <div class="field-group">
        <div>
            <label class="field-label">Nama Toko</label>
            <input
                id="toko-name"
                class="field-input"
                placeholder="cth: Warung Bu Sari"
                value="Warung Bu Sari"
            />
        </div>
        <div>
            <label class="field-label">Alamat Toko</label>
            <input
                id="toko-address"
                class="field-input"
                placeholder="Jl. Merdeka No. 12, Jakarta"
                value="Jl. Merdeka No. 12, Jakarta"
            />
        </div>
        <div>
            <label class="field-label">Nomor Telepon</label>
            <div class="wa-input-wrapper">
                <span class="wa-prefix">+62</span>
                <input
                    id="toko-wa"
                    class="field-input"
                    type="tel"
                    placeholder="812 3456 7890"
                    value="812 3456 7890"
                />
            </div>
        </div>
        <div>
            <label class="field-label">Kategori Usaha</label>
            <div class="custom-select-wrapper">
                <select id="toko-category" class="custom-select">
                    <option value="">Pilih kategori...</option>
                    <option value="1" selected>Kuliner & Makan</option>
                    <option value="2">Fashion & Pakaian</option>
                    <option value="3">Sembako & Kebutuhan</option>
                    <option value="4">Elektronik</option>
                    <option value="5">Lainnya</option>
                </select>
                <i data-lucide="chevron-down" width="18" height="18" class="custom-select-icon"></i>
            </div>
        </div>
    </div>

    <button
        id="toko-save-btn"
        class="btn-primary-full"
        type="submit"
    >
        Simpan Perubahan
    </button>
</form>

<!-- Logout -->
<div class="card" style="margin-top: 8px;">
    <button
        id="logout-btn"
        type="button"
        onclick="window.location.href='{{ route('dashboard') }}'"
        style="width: 100%; display: flex; align-items: center; gap: 12px; padding: 12px 0; border: none; background: none; cursor: pointer; color: #EF4444; font-size: 15px; font-weight: 700; font-family: inherit;"
    >
        <i data-lucide="log-out" width="18" height="18"></i> Keluar dari Akun
    </button>
</div>
@endsection
