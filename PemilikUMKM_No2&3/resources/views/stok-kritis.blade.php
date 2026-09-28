@extends('layouts.app')
@section('title', 'Stok Kritis')
@section('hide_header', true)
@section('hide_bottom_nav', true)

@section('content')
<div class="sk-bg" style="min-height: 100vh;">
    <div class="sk-header">
        <button class="sk-header-btn" onclick="window.location.href='{{ route('dashboard') }}'">
            <i data-lucide="arrow-left" width="20" height="20" color="#4B5563"></i>
        </button>
        <div>
            <div class="sk-title">Stok Kritis</div>
            <div class="sk-sub">2 produk perlu restock</div>
        </div>
    </div>

    <div class="sk-alert">
        <div class="sk-alert-circle"></div>
        <div style="display: flex; gap: 12px; align-items: flex-start; position: relative;">
            <i data-lucide="alert-triangle" width="24" height="24" color="white"></i>
            <div>
                <div class="sk-alert-title">Perhatian!</div>
                <div class="sk-alert-desc">
                    Beberapa produk hampir habis. Segera restock untuk hindari kehilangan penjualan.
                </div>
            </div>
        </div>
    </div>

    <div class="sk-card">
        <div class="sk-card-top">
            <div class="sk-card-icon">🍚</div>
            <div>
                <div class="sk-card-name">Beras Premium 5kg</div>
                <div class="sk-card-time">Digunakan Hari ini</div>
                <div class="sk-card-stats">
                    <span>Sisa: 2</span>
                    <span>Rekomendasi: +20</span>
                </div>
            </div>
        </div>
        <button class="sk-btn-orange" onclick="alert('Statis')">
            <i data-lucide="package" width="18" height="18"></i> Restock Sekarang
        </button>
    </div>

    <div class="sk-card">
        <div class="sk-card-top">
            <div class="sk-card-icon">🛢️</div>
            <div>
                <div class="sk-card-name">Minyak Goreng 1L</div>
                <div class="sk-card-time">Digunakan Hari ini</div>
                <div class="sk-card-stats">
                    <span>Sisa: 3</span>
                    <span>Rekomendasi: +20</span>
                </div>
            </div>
        </div>
        <button class="sk-btn-orange" onclick="alert('Statis')">
            <i data-lucide="package" width="18" height="18"></i> Restock Sekarang
        </button>
    </div>

    <div style="padding: 16px 24px 32px;">
        <button 
            class="sk-btn-orange-outline" 
            style="width: 100%; display: flex; justify-content: center; gap: 8px;"
            onclick="window.location.href='{{ route('stok') }}'"
        >
            <i data-lucide="plus" width="20" height="20"></i> Tambah Stok Barang
        </button>
    </div>
</div>
@endsection
