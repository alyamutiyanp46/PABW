@extends('layouts.app')
@section('title', 'Detail Produk')
@section('hide_header', true)
@section('hide_bottom_nav', true)

@section('content')
@php
    $id = request()->route('id') ?? 1;
    // Mocking data for visual testing since we are not using database
    $data = [
        'id' => $id,
        'name' => 'Nasi Goreng Spesial',
        'price' => 25000,
        'cost' => 15000,
        'stock' => 50,
        'category' => 'Makanan',
        'status' => 'Aman',
        'icon' => '🍛',
        'image_path' => null,
        'sold' => 120,
        'revenue' => '3.000.000',
        'rating' => 4.8,
        'reviews' => 45,
        'desc' => 'Nasi goreng spesial dengan telur mata sapi, ayam suwir, dan kerupuk.',
        'sku' => 'NGS-001'
    ];
    $marginVal = $data['price'] - $data['cost'];
    $marginPct = $data['cost'] > 0 ? round(($marginVal / $data['cost']) * 100) : 100;
@endphp
<div style="background-color: #F9FAFB; min-height: 100vh; position: relative;">
    <div style="padding: 16px 24px; display: flex; justify-content: space-between; align-items: center; background: white; position: sticky; top: 0; z-index: 100; border-bottom: 1px solid #E5E7EB;">
        <button class="pd-header-btn" onclick="window.location.href='{{ route('stok') }}'" style="background: #F9FAFB; box-shadow: none;">
            <i data-lucide="arrow-left" width="20" height="20" color="#4B5563"></i>
        </button>
        <div style="font-size: 16px; font-weight: 700; color: #111827;">Detail Produk</div>
        <button class="pd-header-btn" onclick="window.location.href='{{ route('product.edit', $id) }}'" style="background: #F9FAFB; box-shadow: none;">
            <i data-lucide="edit-2" width="18" height="18" color="#4B5563"></i>
        </button>
    </div>

    <div class="pd-hero" style="height: 220px; border-radius: 0 0 32px 32px; overflow: hidden; padding: 0;">
        @if($data['image_path'])
            <img src="{{ $data['image_path'] }}" alt="{{ $data['name'] }}" style="width: 100%; height: 100%; object-fit: cover;" />
        @else
            <div class="pd-hero-img" style="height: 100%; display: flex; align-items: center; justify-content: center;">{{ $data['icon'] }}</div>
        @endif
    </div>

    <div style="padding: 0 24px 120px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-top: 24px;">
            <div>
                <div class="stok-badge aman" style="display: inline-block; margin-bottom: 12px;">{{ $data['category'] }}</div>
                <div class="pd-title">{{ $data['name'] }}</div>
                <div class="pd-price">Rp {{ number_format($data['price'], 0, ',', '.') }}</div>
            </div>
            <div style="text-align: right;">
                <div class="stok-badge aman" style="margin-bottom: 12px;">Stok {{ $data['status'] }}</div>
                <div style="font-size: 24px; font-weight: 800; color: #111827;">{{ $data['stock'] }}</div>
                <div style="font-size: 12px; color: #6B7280;">tersisa</div>
            </div>
        </div>

        <div class="pd-stats-grid">
            <div class="pd-stat-card">
                <div class="pd-stat-label">Terjual</div>
                <div class="pd-stat-val">{{ $data['sold'] }}</div>
                <div class="pd-stat-sub">bulan ini</div>
            </div>
            <div class="pd-stat-card">
                <div class="pd-stat-label">Pendapatan</div>
                <div class="pd-stat-val">Rp {{ $data['revenue'] }}</div>
                <div class="pd-stat-sub">bulan ini</div>
            </div>
            <div class="pd-stat-card">
                <div class="pd-stat-label">Rating</div>
                <div class="pd-stat-val">{{ $data['rating'] }}</div>
                <div class="pd-stat-sub">{{ $data['reviews'] }} ulasan</div>
            </div>
        </div>

        <div class="pd-card">
            <div class="pd-card-title">Info Harga</div>
            <div class="pd-info-grid">
                <div class="pd-info-item">
                    <div class="pd-info-item-label">Harga Jual</div>
                    <div class="pd-info-item-val">Rp {{ number_format($data['price'], 0, ',', '.') }}</div>
                </div>
                <div class="pd-info-item">
                    <div class="pd-info-item-label">Modal</div>
                    <div class="pd-info-item-val">Rp {{ number_format($data['cost'], 0, ',', '.') }}</div>
                </div>
                <div class="pd-info-item" style="text-align: right;">
                    <div class="pd-info-item-label">Margin</div>
                    <div class="pd-info-item-val green">{{ $marginPct }}%</div>
                </div>
            </div>
            <div class="pd-progress-bg">
                <div class="pd-progress-fill" style="width: {{ $marginPct }}%;"></div>
            </div>
        </div>

        <div class="pd-card">
            <div class="pd-card-title">Deskripsi</div>
            <div class="pd-desc-text">{{ $data['desc'] }}</div>
            <div class="pd-meta-row">
                <div>SKU: <span>{{ $data['sku'] }}</span></div>
                <div>Modal: <span>Rp {{ number_format($data['cost'], 0, ',', '.') }}</span></div>
            </div>
        </div>
    </div>

    <div class="pd-bottom-actions" style="position: fixed; bottom: 0; left: max(0px, calc(50vw - 195px)); width: min(100vw, 390px); border-top: 1px solid #E5E7EB; z-index: 50; display: flex; gap: 12px; padding: 16px 24px; background: white;">
        <button class="wa-btn-solid-blue" style="flex: 1.5;" onclick="window.location.href='{{ route('product.edit', $id) }}'">
            <i data-lucide="package" width="18" height="18"></i> Restock
        </button>
        <button class="wa-btn-outline" style="flex: 1;" onclick="window.location.href='{{ route('product.edit', $id) }}'">
            <i data-lucide="edit-2" width="18" height="18"></i> Edit
        </button>
        <button class="wa-btn-solid-red" style="flex: 1;" onclick="alert('Statis')">
            <i data-lucide="trash-2" width="18" height="18"></i> Hapus
        </button>
    </div>
</div>
@endsection
