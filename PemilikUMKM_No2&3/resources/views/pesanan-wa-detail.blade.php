@extends('layouts.app')
@section('title', 'Detail Pesanan')
@section('hide_header', true)
@section('hide_bottom_nav', true)

@section('content')
@php
    $id = request()->route('id') ?? 1001;
    $pesananMock = [
        1001 => [
            'id' => 1001,
            'status' => 'Baru',
            'customer_name' => 'Andi Pratama',
            'phone' => '+62 812-3456-7890',
            'address' => 'Jl. Merdeka No. 5, Jakarta',
            'time' => '5 menit lalu',
            'total' => 57000,
            'avatarColor' => 'cyan',
            'initial' => 'AP',
            'items' => [
                ['name' => 'Nasi Goreng Spesial', 'qty' => 2, 'price' => 25000],
                ['name' => 'Es Teh Manis', 'qty' => 1, 'price' => 7000]
            ],
            'delivery' => [
                'courier' => 'Pengiriman Toko',
                'fee' => 8000,
                'est' => '30 menit',
            ]
        ],
        1003 => [
            'id' => 1003,
            'status' => 'Selesai',
            'customer_name' => 'Budi Santoso',
            'phone' => '+62 813-9988-7766',
            'address' => 'Jl. Sudirman Blok B, Bogor',
            'time' => '1 jam lalu',
            'total' => 56000,
            'avatarColor' => 'cyan',
            'initial' => 'BS',
            'items' => [
                ['name' => 'Mie Goreng Jawa', 'qty' => 1, 'price' => 20000],
                ['name' => 'Kopi Susu Gula Aren', 'qty' => 2, 'price' => 18000]
            ],
            'rating' => 5.0
        ],
        1005 => [
            'id' => 1005,
            'status' => 'Ditolak',
            'customer_name' => 'Rudi Hartono',
            'phone' => '+62 877-9876-5432',
            'address' => 'Jl. Kebayoran Baru No. 8',
            'time' => '3 jam lalu',
            'total' => 47000,
            'avatarColor' => 'cyan',
            'initial' => 'RH',
            'items' => [
                ['name' => 'Nasi Goreng Spesial', 'qty' => 1, 'price' => 25000],
                ['name' => 'Ayam Geprek', 'qty' => 1, 'price' => 22000]
            ],
            'reason' => 'Stok produk habis'
        ]
    ];
    $data = $pesananMock[$id] ?? $pesananMock[1001];
    $hasBottomBar = in_array($data['status'], ['Baru', 'Diproses', 'Selesai']);
@endphp

<div style="background-color: #F9FAFB; min-height: 100vh; position: relative;">
    <div class="wa-header">
        <div class="wa-header-left">
            <button class="pos-back-btn" onclick="window.location.href='{{ route('pesanan-wa') }}'">
                <i data-lucide="arrow-left" width="20" height="20"></i>
            </button>
            <div>
                <div class="wa-header-title">Pesanan #{{ $data['id'] }}</div>
                <div class="wa-header-sub">{{ $data['time'] }}</div>
            </div>
        </div>
        <div class="wa-badge {{ strtolower($data['status']) }}">{{ $data['status'] }}</div>
    </div>

    <div class="wa-detail-body" style="padding-bottom: {{ $hasBottomBar ? '120px' : '24px' }};">
        <div class="wa-dcard">
            <div class="wa-dcard-title">DATA PELANGGAN</div>
            <div class="wa-customer">
                <div class="wa-avatar {{ $data['avatarColor'] }}">{{ $data['initial'] }}</div>
                <div>
                    <div class="wa-cust-name">{{ $data['customer_name'] }}</div>
                    <div class="wa-cust-phone">{{ $data['phone'] }}</div>
                </div>
            </div>
            <div class="wa-address-row">
                <i data-lucide="map-pin" width="16" height="16" color="#9CA3AF"></i>
                {{ $data['address'] }}
            </div>
        </div>

        <div class="wa-dcard">
            <div class="wa-dcard-title">ITEM PESANAN</div>
            @foreach($data['items'] as $item)
            <div class="wa-item-row">
                <div class="wa-item-left">
                    <div class="wa-item-icon"><i data-lucide="package" width="20" height="20"></i></div>
                    <div>
                        <div class="wa-item-name">{{ $item['name'] }}</div>
                        <div class="wa-item-qty">x{{ $item['qty'] }} × Rp {{ number_format($item['price'], 0, ',', '.') }}</div>
                    </div>
                </div>
                <div class="wa-item-price">Rp {{ number_format($item['qty'] * $item['price'], 0, ',', '.') }}</div>
            </div>
            @endforeach
            <div class="wa-total-row">
                <div class="wa-total-label">Total</div>
                <div class="wa-total-val">Rp {{ number_format($data['total'], 0, ',', '.') }}</div>
            </div>
        </div>

        @if($data['status'] === 'Diproses' && isset($data['delivery']))
        <div class="wa-dcard">
            <div style="display: flex; justify-content: space-between; margin-bottom: 16px;">
                <div class="wa-dcard-title" style="margin: 0;">INFO PENGIRIMAN</div>
                <div style="font-size: 10px; background: #F3F4F6; color: #6B7280; padding: 2px 8px; border-radius: 12px; font-weight: bold;">NAV-1001</div>
            </div>

            <div class="wa-timeline">
                <div class="wa-tl-line"></div>
                <div class="wa-tl-step">
                    <div class="wa-tl-dot green">
                        <i data-lucide="check" width="14" height="14"></i>
                    </div>
                    <div class="wa-tl-label">Disiapkan</div>
                </div>
                <div class="wa-tl-step">
                    <div class="wa-tl-dot green">
                        <i data-lucide="package" width="14" height="14"></i>
                    </div>
                    <div class="wa-tl-label">Dalam Pengiriman</div>
                </div>
                <div class="wa-tl-step">
                    <div class="wa-tl-dot"></div>
                    <div class="wa-tl-label">Terkirim</div>
                </div>
            </div>

            <div style="margin-top: 24px; display: flex; flex-direction: column; gap: 12px;">
                <div class="wa-address-row" style="margin-top: 0; justify-content: space-between;">
                    <div style="display: flex; gap: 8px; color: #111827; font-weight: 500;"><i data-lucide="truck" width="16" height="16" color="#10B981"></i> {{ $data['delivery']['courier'] }}</div>
                    <div>Ongkir: Rp {{ number_format($data['delivery']['fee'], 0, ',', '.') }}</div>
                </div>
                <div class="wa-address-row" style="margin-top: 0; color: #4B5563;">
                    <i data-lucide="map-pin" width="16" height="16" color="#2563EB"></i> {{ $data['address'] }}
                </div>
                <div class="wa-address-row" style="margin-top: 0; color: #4B5563;">
                    <div style="display: flex; gap: 8px;"><i data-lucide="arrow-left" width="16" height="16" color="#3B82F6" style="transform: rotate(180deg); opacity: 0;"></i> Estimasi: <span style="font-weight: 600; color: #111827;">{{ $data['delivery']['est'] }}</span></div>
                </div>
            </div>
        </div>
        @endif

        <div class="wa-dcard">
            <div class="wa-dcard-title">STATUS PESANAN</div>
            <div class="wa-timeline">
                <div class="wa-tl-line"></div>
                @php
                    $steps = ['Pesanan Masuk', 'Dikonfirmasi', 'Diproses', 'Selesai'];
                    $currentIndex = 0;
                    if ($data['status'] === 'Dikonfirmasi') $currentIndex = 1;
                    if ($data['status'] === 'Diproses') $currentIndex = 2;
                    if ($data['status'] === 'Selesai') $currentIndex = 3;
                @endphp
                @foreach($steps as $index => $label)
                <div class="wa-tl-step">
                    <div class="wa-tl-dot {{ $index <= $currentIndex ? 'active' : '' }}">
                        @if($index < $currentIndex || ($index === $currentIndex && $data['status'] === 'Selesai'))
                            <i data-lucide="check" width="14" height="14"></i>
                        @elseif($index === $currentIndex && $data['status'] !== 'Selesai')
                            <div style="width: 8px; height: 8px; background: white; border-radius: 50%;"></div>
                        @endif
                    </div>
                    <div class="wa-tl-label">{{ $label }}</div>
                </div>
                @endforeach
            </div>
        </div>

        @if($data['status'] === 'Selesai')
        <div class="wa-rating-card">
            <div class="wa-rc-title">Rating Pelanggan</div>
            <div class="wa-rc-stars">
                <i data-lucide="star" width="16" height="16" fill="#F59E0B" stroke="#F59E0B"></i>
                <i data-lucide="star" width="16" height="16" fill="#F59E0B" stroke="#F59E0B"></i>
                <i data-lucide="star" width="16" height="16" fill="#F59E0B" stroke="#F59E0B"></i>
                <i data-lucide="star" width="16" height="16" fill="#F59E0B" stroke="#F59E0B"></i>
                <i data-lucide="star" width="16" height="16" fill="#F59E0B" stroke="#F59E0B"></i>
            </div>
            <div class="wa-rc-score">5.0 / 5.0 — Pelanggan puas dengan pesanan</div>
        </div>
        @endif

        @if($data['status'] === 'Ditolak')
        <div class="wa-rejected-card">
            <div class="wa-rej-title"><i data-lucide="x" width="16" height="16"></i> Pesanan Ditolak</div>
            <div class="wa-rej-reason">Alasan: {{ $data['reason'] ?? 'Stok produk habis' }}</div>
            <button class="wa-btn-wa-green">
                <i data-lucide="phone" width="16" height="16"></i> Hubungi via Telepon
            </button>
        </div>
        @endif

    </div>

    @if($hasBottomBar)
    <div class="wa-bottom-actions">
        @if($data['status'] === 'Baru')
            <button class="wa-btn-outline-red" onclick="alert('Statis')">
                <i data-lucide="x" width="18" height="18"></i> Tolak
            </button>
            <button class="wa-btn-solid-blue" onclick="alert('Statis')">
                <i data-lucide="check" width="18" height="18"></i> Konfirmasi Pesanan
            </button>
        @endif
        @if($data['status'] === 'Diproses')
            <button class="wa-btn-outline-orange">
                Chat Dengan Pelanggan
            </button>
            <button class="wa-btn-solid-blue" onclick="alert('Statis')">
                <i data-lucide="truck" width="18" height="18"></i> Kirim Sekarang
            </button>
        @endif
        @if($data['status'] === 'Selesai')
            <button class="wa-btn-solid-blue" style="width: 100%;" onclick="window.location.href='{{ route('pesanan-wa') }}'">
                Kembali ke Daftar
            </button>
        @endif
    </div>
    @endif
</div>
@endsection
