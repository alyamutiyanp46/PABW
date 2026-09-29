@extends('layouts.app')
@section('title', 'Edit Produk')
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
<div style="background-color: #E2E8F0; min-height: 100vh; position: relative;">
    <div style="padding: 24px; display: flex; justify-content: space-between; align-items: center; background: white;">
        <button class="pd-header-btn" onclick="window.location.href='{{ route('product.detail', $id) }}'" style="background: #F1F5F9;">
            <i data-lucide="arrow-left" width="20" height="20" color="#4B5563"></i>
        </button>
        <div style="text-align: center;">
            <div style="font-size: 16px; font-weight: 700; color: #111827;">Edit Produk</div>
            <div style="font-size: 11px; color: #6B7280;">Perubahan disimpan ke daftar produk</div>
        </div>
        <button class="pd-header-btn" style="background: #EFF6FF;">
            <i data-lucide="edit-3" width="18" height="18" color="#2563EB"></i>
        </button>
    </div>

    <div style="padding: 24px 24px 120px;">
        <label class="stok-form-label">Foto Produk (opsional)</label>
        <input 
            type="file" 
            accept="image/*"
            class="stok-input" 
            style="background: white; color: #111827; padding: 10px;"
        />

        <label class="stok-form-label">Nama Produk <span>*</span></label>
        <input 
            type="text" 
            class="stok-input" 
            style="background: white; font-weight: 600; color: #111827;"
            value="{{ $data['name'] }}"
        />

        <div class="stok-form-label">Kategori</div>
        <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 20px;">
            @php $categories = ['Makanan', 'Minuman', 'Sembako', 'Snack', 'Bumbu', 'Kebutuhan Rumah', 'Lainnya']; @endphp
            @foreach($categories as $cat)
            <div class="stok-category-pill {{ $data['category'] === $cat ? 'active' : '' }}">{{ $cat }}</div>
            @endforeach
        </div>

        <div class="stok-input-row">
            <div>
                <label class="stok-form-label">Harga Jual <span>*</span></label>
                <div class="stok-search-input-wrapper" style="margin-bottom: 20px;">
                    <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #9CA3AF; font-size: 14px;">Rp</span>
                    <input type="number" class="stok-input" style="padding-left: 44px; background: white; font-weight: 500; margin-bottom: 0;" value="{{ $data['price'] }}" />
                </div>
            </div>
            <div>
                <label class="stok-form-label">Harga Modal</label>
                <div class="stok-search-input-wrapper" style="margin-bottom: 20px;">
                    <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #9CA3AF; font-size: 14px;">Rp</span>
                    <input type="number" class="stok-input" style="padding-left: 44px; background: white; font-weight: 500; margin-bottom: 0;" value="{{ $data['cost'] }}" />
                </div>
            </div>
        </div>

        <div class="pd-margin-card">
            <div>
                <div class="pd-margin-label">Margin per produk</div>
                <div class="pd-margin-val">Rp {{ number_format($marginVal, 0, ',', '.') }}</div>
            </div>
            <div style="text-align: right;">
                <div class="pd-margin-label">Persentase</div>
                <div class="pd-margin-pct">{{ $marginPct }}%</div>
            </div>
        </div>

        <div class="stok-input-row">
            <div>
                <label class="stok-form-label">Stok Saat Ini</label>
                <input type="number" class="stok-input" style="background: white; font-weight: 500;" value="{{ $data['stock'] }}" />
            </div>
            <div>
                <label class="stok-form-label">Kode SKU</label>
                <input type="text" class="stok-input" style="background: white; font-weight: 500;" value="{{ $data['sku'] }}" disabled />
            </div>
        </div>

        <label class="stok-form-label">Deskripsi Produk</label>
        <textarea 
            class="stok-input" 
            style="background: white; height: 100px; padding-top: 12px; resize: none;"
        >{{ $data['desc'] }}</textarea>
    </div>

    <div style="position: fixed; bottom: 0; left: max(0px, calc(50vw - 195px)); width: min(100vw, 390px); background: white; padding: 16px 24px; border-top: 1px solid #E5E7EB; z-index: 50; display: flex; gap: 16px;">
        <button class="wa-btn-outline" style="flex: 1;" onclick="window.location.href='{{ route('product.detail', $id) }}'">Batal</button>
        <button class="wa-btn-solid-blue" style="flex: 2;" onclick="window.location.href='{{ route('product.detail', $id) }}'">Simpan Perubahan</button>
    </div>
</div>
@endsection
