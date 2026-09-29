@extends('layouts.app')
@section('title', 'Pesanan')
@section('hide_header', true)
@section('hide_bottom_nav', true)

@section('content')
@php
    $pesananMock = [
        [
            'id' => 1001,
            'status' => 'Baru',
            'customer_name' => 'Andi Pratama',
            'phone' => '+62 812-3456-7890',
            'items' => 'Nasi Goreng Spesial x2, Es Teh Manis x1',
            'time' => '5 menit lalu',
            'total' => 57000,
            'avatarColor' => 'teal',
            'initial' => 'AP'
        ],
        [
            'id' => 1002,
            'status' => 'Diproses',
            'customer_name' => 'Siti Aminah',
            'phone' => '+62 821-1122-3344',
            'items' => 'Ayam Geprek x3',
            'time' => '12 menit lalu',
            'total' => 66000,
            'avatarColor' => 'teal',
            'initial' => 'SA'
        ],
        [
            'id' => 1003,
            'status' => 'Selesai',
            'customer_name' => 'Budi Santoso',
            'phone' => '+62 813-9988-7766',
            'items' => 'Mie Goreng Jawa x1, Kopi Susu Gula Aren x2',
            'time' => '1 jam lalu',
            'total' => 56000,
            'rating' => 5.0,
            'avatarColor' => 'teal',
            'initial' => 'BS'
        ],
        [
            'id' => 1004,
            'status' => 'Baru',
            'customer_name' => 'Dewi Lestari',
            'phone' => '+62 856-5544-3322',
            'items' => 'Roti Bakar Coklat x4',
            'time' => '2 jam lalu',
            'total' => 60000,
            'avatarColor' => 'teal',
            'initial' => 'DL'
        ],
        [
            'id' => 1005,
            'status' => 'Ditolak',
            'customer_name' => 'Rudi Hartono',
            'phone' => '+62 877-9876-5432',
            'items' => 'Nasi Goreng Spesial x1, Ayam Geprek x1',
            'time' => '3 jam lalu',
            'total' => 47000,
            'reason' => 'Ditolak: Stok produk habis',
            'avatarColor' => 'teal',
            'initial' => 'RH'
        ]
    ];
@endphp
<div style="background-color: #F9FAFB; min-height: 100vh; padding-bottom: 24px;">
    <div class="wa-header">
        <div class="wa-header-left">
            <button class="pos-back-btn" onclick="window.location.href='{{ route('dashboard') }}'">
                <i data-lucide="arrow-left" width="20" height="20"></i>
            </button>
            <div>
                <div class="wa-header-title">Pesanan</div>
                <div class="wa-header-sub">2 pesanan baru masuk</div>
            </div>
        </div>
        <button class="wa-icon-btn">
            <i data-lucide="message-circle" width="20" height="20"></i>
        </button>
    </div>

    <div class="wa-summary-row">
        <div class="wa-sum-item">
            <div class="wa-sum-val orange">2</div>
            <div class="wa-sum-label">Baru</div>
        </div>
        <div class="wa-sum-item">
            <div class="wa-sum-val blue">1</div>
            <div class="wa-sum-label">Diproses</div>
        </div>
        <div class="wa-sum-item">
            <div class="wa-sum-val green">1</div>
            <div class="wa-sum-label">Selesai</div>
        </div>
        <div class="wa-sum-item">
            <div class="wa-sum-val red">1</div>
            <div class="wa-sum-label">Ditolak</div>
        </div>
    </div>

    <div class="wa-filter-scroll">
        <button class="wa-filter-pill active">Semua</button>
        <button class="wa-filter-pill">Baru</button>
        <button class="wa-filter-pill">Diproses</button>
        <button class="wa-filter-pill">Selesai</button>
        <button class="wa-filter-pill">Ditolak</button>
    </div>

    <div class="wa-list-container">
        @foreach($pesananMock as $p)
        <div class="wa-card" onclick="window.location.href='{{ route('pesanan-wa.detail', $p['id']) }}'" style="cursor: pointer;">
            <div class="wa-card-top">
                <div class="wa-customer">
                    <div class="wa-avatar {{ $p['avatarColor'] }}">{{ $p['initial'] }}</div>
                    <div>
                        <div class="wa-cust-name">{{ $p['customer_name'] }}</div>
                        <div class="wa-cust-phone">{{ $p['phone'] }}</div>
                    </div>
                </div>
                <div class="wa-badge {{ strtolower($p['status']) }}">{{ $p['status'] }}</div>
            </div>

            <div class="wa-card-body">
                <div class="wa-items">{{ $p['items'] }}</div>
                <div class="wa-body-bottom">
                    <div class="wa-time">{{ $p['time'] }}</div>
                    <div class="wa-total">Rp {{ number_format($p['total'], 0, ',', '.') }}</div>
                </div>
            </div>

            @if(isset($p['rating']))
            <div class="wa-rating">
                <i data-lucide="star" width="12" height="12" fill="#F59E0B" stroke="#F59E0B"></i>
                <i data-lucide="star" width="12" height="12" fill="#F59E0B" stroke="#F59E0B"></i>
                <i data-lucide="star" width="12" height="12" fill="#F59E0B" stroke="#F59E0B"></i>
                <i data-lucide="star" width="12" height="12" fill="#F59E0B" stroke="#F59E0B"></i>
                <i data-lucide="star" width="12" height="12" fill="#F59E0B" stroke="#F59E0B"></i>
                <span style="margin-left: 4px;">{{ number_format($p['rating'], 1) }}</span>
            </div>
            @endif

            @if(isset($p['reason']))
            <div class="wa-reason">{{ $p['reason'] }}</div>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection
