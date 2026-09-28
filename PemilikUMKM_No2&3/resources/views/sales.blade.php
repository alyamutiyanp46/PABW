@extends('layouts.app')
@section('title', 'Laporan Keuangan')
@section('hide_header', true)


@section('content')
<div class="lap-bg" style="background-color: #F9FAFB; min-height: 100vh; position: relative; padding-bottom: 100px;">
    <!-- Header -->
    <div class="lap-header">
        <div>
            <div class="lap-title">Laporan Keuangan</div>
            <div class="lap-subtitle">Periode: Mingguan</div>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <button class="lap-btn-blue" onclick="alert('Statis')"><i data-lucide="plus" width="20" height="20"></i></button>
        </div>
    </div>

    <!-- Segment tabs -->
    <div class="lap-segment-wrapper">
        <button class="lap-segment-btn">Harian</button>
        <button class="lap-segment-btn active">Mingguan</button>
        <button class="lap-segment-btn">Bulanan</button>
    </div>

    <!-- Summary cards -->
    <div class="lap-summary-wrapper">
        <div class="lap-summary-card">
            <div class="lap-sum-title">Pendapatan</div>
            <div class="lap-sum-amount" style="color: #10B981;">Rp 3.250.000</div>
            <div class="lap-sum-trend green"><i data-lucide="arrow-up" width="12" height="12"></i> 12%</div>
        </div>
        <div class="lap-summary-card">
            <div class="lap-sum-title">Pengeluaran</div>
            <div class="lap-sum-amount" style="color: #EF4444;">Rp 1.100.000</div>
            <div class="lap-sum-trend red"><i data-lucide="arrow-up" width="12" height="12"></i> 5%</div>
        </div>
        <div class="lap-summary-card">
            <div class="lap-sum-title">Laba Bersih</div>
            <div class="lap-sum-amount" style="color: #2563EB;">Rp 2.150.000</div>
            <div class="lap-sum-trend green"><i data-lucide="arrow-up" width="12" height="12"></i> 18%</div>
        </div>
    </div>

    <!-- Chart card -->
    <div class="lap-card">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
            <div>
                <div class="lap-card-title">Tren Keuangan</div>
                <div class="lap-card-sub">Pendapatan vs Pengeluaran</div>
            </div>
            <div class="lap-pill">Mingguan</div>
        </div>

        <div style="position: relative; margin: 20px 0 30px; overflow: visible;">
            <svg viewBox="0 0 300 120" style="width: 100%; height: 160px; overflow: visible; display: block;" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="salesBlueFill" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="rgba(37,99,235,0.25)" />
                        <stop offset="100%" stop-color="rgba(37,99,235,0)" />
                    </linearGradient>
                    <linearGradient id="salesRedFill" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="rgba(239,68,68,0.2)" />
                        <stop offset="100%" stop-color="rgba(239,68,68,0)" />
                    </linearGradient>
                </defs>
                <line x1="0" y1="30" x2="300" y2="30" stroke="#F3F4F6" stroke-width="1" />
                <line x1="0" y1="60" x2="300" y2="60" stroke="#F3F4F6" stroke-width="1" />
                <line x1="0" y1="90" x2="300" y2="90" stroke="#F3F4F6" stroke-width="1" />
                <line x1="0" y1="120" x2="300" y2="120" stroke="#F3F4F6" stroke-width="1" />
                <path d="M0.0,109.0 L50.0,100.0 L100.0,105.0 L150.0,95.0 L200.0,90.0 L250.0,85.0 L300.0,80.0 L300,120 L0,120 Z" fill="url(#salesRedFill)" />
                <path d="M0.0,109.0 L50.0,100.0 L100.0,105.0 L150.0,95.0 L200.0,90.0 L250.0,85.0 L300.0,80.0" fill="none" stroke="#EF4444" stroke-width="2" stroke-dasharray="5,3" />
                <path d="M0.0,80.0 L50.0,60.0 L100.0,70.0 L150.0,40.0 L200.0,50.0 L250.0,30.0 L300.0,21.0 L300,120 L0,120 Z" fill="url(#salesBlueFill)" />
                <path d="M0.0,80.0 L50.0,60.0 L100.0,70.0 L150.0,40.0 L200.0,50.0 L250.0,30.0 L300.0,21.0" fill="none" stroke="#2563EB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                <circle cx="0.0" cy="80.0" r="3" fill="white" stroke="#2563EB" stroke-width="2" />
                <circle cx="50.0" cy="60.0" r="3" fill="white" stroke="#2563EB" stroke-width="2" />
                <circle cx="100.0" cy="70.0" r="3" fill="white" stroke="#2563EB" stroke-width="2" />
                <circle cx="150.0" cy="40.0" r="3" fill="white" stroke="#2563EB" stroke-width="2" />
                <circle cx="200.0" cy="50.0" r="3" fill="white" stroke="#2563EB" stroke-width="2" />
                <circle cx="250.0" cy="30.0" r="3" fill="white" stroke="#2563EB" stroke-width="2" />
                <circle cx="300.0" cy="21.0" r="5" fill="#2563EB" stroke="#2563EB" stroke-width="2" />
            </svg>
            <div style="display: flex; justify-content: space-between; margin-top: 12px; font-size: 10px; color: #9CA3AF;">
                <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span style="color: #2563EB; font-weight: 700;">Min</span>
            </div>
            <div style="display: flex; gap: 16px; margin-top: 16px;">
                <div style="display: flex; align-items: center; gap: 6px; font-size: 11px; color: #6B7280;">
                    <div style="width: 12px; height: 3px; background: #2563EB; border-radius: 2px;"></div> Pendapatan
                </div>
                <div style="display: flex; align-items: center; gap: 6px; font-size: 11px; color: #6B7280;">
                    <div style="width: 12px; height: 3px; background: #EF4444; border-radius: 2px;"></div> Pengeluaran
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction list -->
    <div class="lap-card" style="margin-bottom: 100px;">
        <div style="display: flex; justify-content: space-between; margin-bottom: 12px;">
            <div class="lap-card-title">Transaksi Manual</div>
            <div style="font-size: 12px; color: #9CA3AF;">2 entri</div>
        </div>

        <div>
            <div class="lap-tx-item">
                <div style="display: flex; gap: 12px; align-items: center; flex: 1;">
                    <div class="lap-tx-icon green">
                        <i data-lucide="trending-up" width="20" height="20"></i>
                    </div>
                    <div style="flex: 1; min-width: 0;">
                        <div class="lap-tx-name">Penjualan 12 Pcs Roti</div>
                        <div class="lap-tx-sub">Penjualan · 2026-09-28 <span style="margin-left: 6px; font-size: 10px; color: #9CA3AF; background: #F3F4F6; border-radius: 4px; padding: 1px 5px;">contoh</span></div>
                    </div>
                </div>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <div class="lap-tx-amount green">+Rp 150.000</div>
                </div>
            </div>

            <div class="lap-tx-item">
                <div style="display: flex; gap: 12px; align-items: center; flex: 1;">
                    <div class="lap-tx-icon red">
                        <i data-lucide="trending-down" width="20" height="20"></i>
                    </div>
                    <div style="flex: 1; min-width: 0;">
                        <div class="lap-tx-name">Beli Terigu 5kg</div>
                        <div class="lap-tx-sub">Bahan Baku · 2026-09-27 <span style="margin-left: 6px; font-size: 10px; color: #9CA3AF; background: #F3F4F6; border-radius: 4px; padding: 1px 5px;">contoh</span></div>
                    </div>
                </div>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <div class="lap-tx-amount red">-Rp 60.000</div>
                </div>
            </div>
        </div>

        <div style="margin-top: 24px;">
            <button class="lap-btn-add" onclick="alert('Statis')">
                <i data-lucide="plus" width="18" height="18"></i> Tambah Transaksi Manual
            </button>
        </div>
    </div>
    
    
</div>
@endsection

