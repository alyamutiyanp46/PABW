@extends('layouts.app')

@section('title', 'Dashboard')
@section('hide_header', true)

@section('content')
<style>
    /* Inline overrides if necessary */
</style>
<div style="padding-bottom: 100px; background-color: #F9FAFB; min-height: 100vh; position: relative;">
    <!-- Header Area -->
    <div class="dash-header-new">
        <div class="dash-top-bar">
            <div class="dash-user-info">
                <div class="dash-avatar">BS</div>
                <div>
                    <div class="dash-greeting">Hari ini</div>
                    <div class="dash-name">Selamat datang, Bu Sari 👋</div>
                    <div class="dash-premium-badge">⭐ Premium</div>
                </div>
            </div>
            <div class="dash-top-icons">
                <button class="dash-icon-btn" onclick="window.location.href='{{ route('forum') }}'">
                    <i data-lucide="message-square" width="20" height="20"></i>
                </button>
                <button class="dash-icon-btn"><i data-lucide="search" width="20" height="20"></i></button>
            </div>
        </div>

        <div onclick="window.location.href='{{ route('sales') }}'" style="cursor: pointer; background: rgba(255,255,255,0.05); border-radius: 16px; padding: 12px; margin: 16px -12px 12px; border: 1px solid rgba(255,255,255,0.1);">
            <div class="dash-revenue-label" style="display: flex; justify-content: space-between; align-items: center;">
                <span>PENDAPATAN HARI INI</span>
                <i data-lucide="bar-chart-2" width="16" height="16" color="rgba(255,255,255,0.7)"></i>
            </div>
            <div class="dash-revenue-amount">
                Rp 3.250.000
                <div class="dash-trend-pill">📈 +12%</div>
            </div>
            <div class="dash-revenue-sub">vs kemarin (Ketuk untuk detail laporan)</div>
        </div>

        <div class="dash-progress-container">
            <div class="dash-progress-bar">
                <div class="dash-progress-fill" style="width: 68%;"></div>
            </div>
            <div class="dash-progress-text">68% target</div>
        </div>

        <div class="dash-header-stats">
            <div class="dash-hstat-card active">
                <div class="dash-hstat-val"><i data-lucide="message-circle" width="14" height="14" color="#34D399"></i> 37</div>
                <div class="dash-hstat-label">Pesanan WA</div>
            </div>
            <div class="dash-hstat-card">
                <div class="dash-hstat-val">Rp 820k</div>
                <div class="dash-hstat-label">Laba Bersih</div>
            </div>
            <div class="dash-hstat-card">
                <div class="dash-hstat-val">+8</div>
                <div class="dash-hstat-label">Pelanggan</div>
            </div>
        </div>
    </div>

    <!-- Main Stat Cards -->
    <div class="dash-stats-grid">
        <div class="dash-white-card">
            <div class="dash-wc-icon blue"><i data-lucide="shopping-cart" width="20" height="20"></i></div>
            <div class="dash-wc-label">Total Pesanan</div>
            <div class="dash-wc-value">37</div>
        </div>
        <div class="dash-white-card">
            <div class="dash-wc-icon orange"><i data-lucide="alert-triangle" width="20" height="20"></i></div>
            <div class="dash-wc-label">Stok Hampir Habis</div>
            <div class="dash-wc-value">5 produk</div>
        </div>
        <div class="dash-white-card">
            <div class="dash-wc-icon green"><i data-lucide="receipt-text" width="20" height="20"></i></div>
            <div class="dash-wc-label">Laba Bersih</div>
            <div class="dash-wc-value">Rp 820.000</div>
        </div>
        <div class="dash-white-card">
            <div class="dash-wc-icon purple"><i data-lucide="users" width="20" height="20"></i></div>
            <div class="dash-wc-label">Pelanggan Baru</div>
            <div class="dash-wc-value">+8 hari ini</div>
        </div>
    </div>

    <!-- Aksi Cepat -->
    <div class="dash-section" style="padding-bottom: 0;">
        <div class="dash-white-card" style="padding: 20px 16px;">
            <div class="dash-section-title" style="margin-top: 0; margin-bottom: 16px;">Aksi Cepat</div>
            <div class="quick-actions-scroll">
                <div class="quick-action-item" onclick="window.location.href='{{ route('kasir') }}'">
                    <div class="qa-icon-wrapper primary"><i data-lucide="plus" width="28" height="28"></i></div>
                    <div class="qa-label">Catat<br />Penjualan</div>
                </div>
                <div class="quick-action-item" onclick="window.location.href='{{ route('pesanan-wa') }}'">
                    <div class="qa-icon-wrapper wa">
                        <i data-lucide="message-circle" width="28" height="28"></i>
                        <div class="qa-badge">2</div>
                    </div>
                    <div class="qa-label">Pesanan</div>
                </div>
                <div class="quick-action-item" onclick="window.location.href='{{ route('stok') }}'">
                    <div class="qa-icon-wrapper blue-light"><i data-lucide="package" width="28" height="28"></i></div>
                    <div class="qa-label">Tambah<br />Produk</div>
                </div>
                <div class="quick-action-item" onclick="window.location.href='{{ route('stok-kritis') }}'">
                    <div class="qa-icon-wrapper orange-light"><i data-lucide="refresh-cw" width="28" height="28"></i></div>
                    <div class="qa-label">Update<br />Stok</div>
                </div>
                <div class="quick-action-item" onclick="window.location.href='{{ route('sales') }}'">
                    <div class="qa-icon-wrapper purple-light"><i data-lucide="bar-chart-2" width="28" height="28"></i></div>
                    <div class="qa-label">Laporan<br />Keuangan</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tren Pendapatan (Static View) -->
    <div class="dash-section" onclick="window.location.href='{{ route('sales') }}'" style="cursor: pointer;">
        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <div class="chart-title">Tren Pendapatan</div>
                    <div class="chart-subtitle">7 hari terakhir</div>
                </div>
                <div class="chart-pill" style="display: flex; align-items: center; gap: 4px;">
                    Mingguan <i data-lucide="bar-chart-2" width="12" height="12" style="margin-left: 2px;"></i>
                </div>
            </div>

            <div style="height: 140px; position: relative; margin: 8px 0 4px;">
                <svg viewBox="0 0 300 110" style="width: 100%; height: 100%; overflow: visible;" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="dashBlueFill" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="rgba(37,99,235,0.25)" />
                            <stop offset="100%" stop-color="rgba(37,99,235,0)" />
                        </linearGradient>
                        <linearGradient id="dashRedFill" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="rgba(239,68,68,0.15)" />
                            <stop offset="100%" stop-color="rgba(239,68,68,0)" />
                        </linearGradient>
                    </defs>
                    <line x1="0" y1="27.5" x2="300" y2="27.5" stroke="#F3F4F6" stroke-width="1" />
                    <line x1="0" y1="55" x2="300" y2="55" stroke="#F3F4F6" stroke-width="1" />
                    <line x1="0" y1="82.5" x2="300" y2="82.5" stroke="#F3F4F6" stroke-width="1" />
                    <line x1="0" y1="110" x2="300" y2="110" stroke="#F3F4F6" stroke-width="1" />
                    
                    <path d="M0.0,99.0 L50.0,90.0 L100.0,95.0 L150.0,85.0 L200.0,80.0 L250.0,75.0 L300.0,70.0 L300,110 L0,110 Z" fill="url(#dashRedFill)" />
                    <path d="M0.0,99.0 L50.0,90.0 L100.0,95.0 L150.0,85.0 L200.0,80.0 L250.0,75.0 L300.0,70.0" fill="none" stroke="#EF4444" stroke-width="2" stroke-dasharray="5,3" />
                    <path d="M0.0,70.0 L50.0,50.0 L100.0,60.0 L150.0,30.0 L200.0,40.0 L250.0,20.0 L300.0,11.0 L300,110 L0,110 Z" fill="url(#dashBlueFill)" />
                    <path d="M0.0,70.0 L50.0,50.0 L100.0,60.0 L150.0,30.0 L200.0,40.0 L250.0,20.0 L300.0,11.0" fill="none" stroke="#2563EB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    
                    <circle cx="0.0" cy="70.0" r="3" fill="white" stroke="#2563EB" stroke-width="2" />
                    <circle cx="50.0" cy="50.0" r="3" fill="white" stroke="#2563EB" stroke-width="2" />
                    <circle cx="100.0" cy="60.0" r="3" fill="white" stroke="#2563EB" stroke-width="2" />
                    <circle cx="150.0" cy="30.0" r="3" fill="white" stroke="#2563EB" stroke-width="2" />
                    <circle cx="200.0" cy="40.0" r="3" fill="white" stroke="#2563EB" stroke-width="2" />
                    <circle cx="250.0" cy="20.0" r="3" fill="white" stroke="#2563EB" stroke-width="2" />
                    <circle cx="300.0" cy="11.0" r="5" fill="#2563EB" stroke="#2563EB" stroke-width="2" />
                </svg>
            </div>

            <div style="display: flex; justify-content: space-between; font-size: 10px; color: #9CA3AF; padding: 0 2px; margin-bottom: 12px;">
                <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span style="color:#2563EB; font-weight:700;">Min</span>
            </div>

            <div style="display: flex; gap: 16px; border-top: 1px solid #F3F4F6; padding-top: 10px;">
                <div style="display: flex; align-items: center; gap: 6px; font-size: 11px; color: #6B7280;">
                    <div style="width: 16px; height: 3px; background: #2563EB; border-radius: 2px;"></div> Pendapatan
                </div>
                <div style="display: flex; align-items: center; gap: 6px; font-size: 11px; color: #6B7280;">
                    <div style="width: 16px; height: 3px; background: #EF4444; border-radius: 2px;"></div> Pengeluaran
                </div>
                <div style="flex: 1; text-align: right; font-size: 11px; color: #2563EB; font-weight: 600;">Lihat detail →</div>
            </div>
        </div>
    </div>

    <!-- Pesanan Terbaru -->
    <div class="dash-section" style="padding-top: 0;">
        <div class="dash-section-title">
            Pesanan Terbaru
            <a href="{{ route('pesanan-wa') }}" class="dash-section-link">Lihat semua</a>
        </div>
        <div class="order-list">
            <div class="order-card">
                <div class="order-avatar">AP</div>
                <div class="order-info">
                    <div class="order-name">Andi Pratama</div>
                    <div class="order-desc">Nasi Goreng x2 · 5 menit lalu</div>
                </div>
                <div class="order-right">
                    <div class="order-price">Rp 50.000</div>
                    <div class="order-badge baru">Baru</div>
                </div>
            </div>
            <div class="order-card">
                <div class="order-avatar" style="background: #F5F3FF; color: #8B5CF6;">SA</div>
                <div class="order-info">
                    <div class="order-name">Siti Aminah</div>
                    <div class="order-desc">Es Teh Manis x3 · 12 menit lalu</div>
                </div>
                <div class="order-right">
                    <div class="order-price">Rp 21.000</div>
                    <div class="order-badge diproses">Diproses</div>
                </div>
            </div>
            <div class="order-card">
                <div class="order-avatar" style="background: #EFF6FF; color: #2563EB;">BS</div>
                <div class="order-info">
                    <div class="order-name">Budi Santoso</div>
                    <div class="order-desc">Ayam Geprek x1 · 1 jam lalu</div>
                </div>
                <div class="order-right">
                    <div class="order-price">Rp 22.000</div>
                    <div class="order-badge selesai">Selesai</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stok Kritis -->
    <div class="dash-section" style="padding-top: 0;">
        <div class="dash-section-title" style="color: #D97706;">
            <div style="display: flex; align-items: center; gap: 8px;">
                <i data-lucide="alert-triangle" width="18" height="18"></i> Stok Kritis
            </div>
            <a href="{{ route('stok-kritis') }}" class="dash-section-link" style="color: #D97706;">Lihat semua</a>
        </div>
        <div class="stock-card">
            <div class="stock-left">
                <div class="stock-icon-box"><i data-lucide="package" width="20" height="20"></i></div>
                <div>
                    <div class="stock-name">Beras Premium 5kg</div>
                    <div class="stock-desc">Tersisa 2 pcs</div>
                </div>
            </div>
            <button class="btn-restock">Restock</button>
        </div>
        <div class="stock-card">
            <div class="stock-left">
                <div class="stock-icon-box"><i data-lucide="package" width="20" height="20"></i></div>
                <div>
                    <div class="stock-name">Minyak Goreng 1L</div>
                    <div class="stock-desc">Tersisa 3 pcs</div>
                </div>
            </div>
            <button class="btn-restock">Restock</button>
        </div>
    </div>
</div>
@endsection
