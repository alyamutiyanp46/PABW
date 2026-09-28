@extends('layouts.app')
@section('title', 'Akun & Pengaturan')
@section('hide_header', true)


@section('content')
<div class="set-bg" style="min-height: 100vh; padding-bottom: 100px;">
    <div class="set-header">
        <div class="set-title">Akun & Pengaturan</div>
    </div>

    <div class="set-profile-card">
        <div class="set-profile-top">
            <div class="set-avatar">BS</div>
            <div class="set-profile-info">
                <div class="set-profile-name">Bu Sari</div>
                <div class="set-profile-role">Warung Bu Sari · Pemilik</div>
                <div class="set-profile-premium">
                    <span class="premium-badge">⭐ Premium</span>
                    <span class="premium-date">Aktif hingga Des 2026</span>
                </div>
            </div>
            <button class="set-edit-btn">
                <i data-lucide="edit-2" width="16" height="16" color="white"></i>
            </button>
        </div>
        <div class="set-profile-stats">
            <div class="set-stat-item">
                <div class="set-stat-val">1.248</div>
                <div class="set-stat-label">Total Penjualan</div>
            </div>
            <div class="set-stat-item">
                <div class="set-stat-val">156</div>
                <div class="set-stat-label">Produk Aktif</div>
            </div>
            <div class="set-stat-item">
                <div class="set-stat-val">4.9 ★</div>
                <div class="set-stat-label">Rating Toko</div>
            </div>
        </div>
    </div>

    <div class="set-section">
        <div class="set-section-title">TOKO & BISNIS</div>
        <div class="set-list-card">
            <div class="set-list-item">
                <div class="set-list-icon-wrapper bg-blue-light">
                    <i data-lucide="store" width="18" height="18" color="#2563EB"></i>
                </div>
                <div class="set-list-content">
                    <div class="set-list-name">Profil Toko</div>
                    <div class="set-list-sub">Warung Bu Sari</div>
                </div>
                <i data-lucide="chevron-right" width="18" height="18" color="#D1D5DB"></i>
            </div>
            <div class="set-list-item">
                <div class="set-list-icon-wrapper bg-green-light">
                    <i data-lucide="message-circle" width="18" height="18" color="#10B981"></i>
                </div>
                <div class="set-list-content">
                    <div class="set-list-name">Integrasi Nomor Telepon</div>
                    <div class="set-list-sub" style="color: #10B981;">Terhubung ✓</div>
                </div>
                <i data-lucide="chevron-right" width="18" height="18" color="#D1D5DB"></i>
            </div>
            <div class="set-list-item">
                <div class="set-list-icon-wrapper bg-blue-light">
                    <i data-lucide="clock" width="18" height="18" color="#3B82F6"></i>
                </div>
                <div class="set-list-content">
                    <div class="set-list-name">Jam Operasional</div>
                    <div class="set-list-sub">07:00 - 22:00</div>
                </div>
                <i data-lucide="chevron-right" width="18" height="18" color="#D1D5DB"></i>
            </div>
        </div>
    </div>

    <div class="set-section">
        <div class="set-section-title">BANTUAN</div>
        <div class="set-list-card">
            <div class="set-list-item">
                <div class="set-list-icon-wrapper bg-blue-light">
                    <i data-lucide="help-circle" width="18" height="18" color="#3B82F6"></i>
                </div>
                <div class="set-list-content">
                    <div class="set-list-name">Bantuan & FAQ</div>
                </div>
                <i data-lucide="chevron-right" width="18" height="18" color="#D1D5DB"></i>
            </div>
            <div class="set-list-item">
                <div class="set-list-icon-wrapper bg-blue-light">
                    <i data-lucide="message-circle" width="18" height="18" color="#3B82F6"></i>
                </div>
                <div class="set-list-content">
                    <div class="set-list-name">Hubungi Support</div>
                    <div class="set-list-sub">support@navibiz.id</div>
                </div>
                <i data-lucide="chevron-right" width="18" height="18" color="#D1D5DB"></i>
            </div>
            <div class="set-list-item">
                <div class="set-list-icon-wrapper bg-blue-light">
                    <i data-lucide="file-text" width="18" height="18" color="#3B82F6"></i>
                </div>
                <div class="set-list-content">
                    <div class="set-list-name">Syarat & Privasi</div>
                </div>
                <i data-lucide="chevron-right" width="18" height="18" color="#D1D5DB"></i>
            </div>
            <div class="set-list-item">
                <div class="set-list-icon-wrapper bg-gray-light">
                    <i data-lucide="info" width="18" height="18" color="#6B7280"></i>
                </div>
                <div class="set-list-content">
                    <div class="set-list-name">Versi Aplikasi</div>
                    <div class="set-list-sub">v2.4.1 (Build 2026.06)</div>
                </div>
            </div>
        </div>
    </div>

    <div class="set-section">
        <button class="set-logout-btn">
            <i data-lucide="log-out" width="20" height="20" color="#EF4444"></i>
            Kembali ke Dashboard
        </button>
    </div>

    
</div>
@endsection

