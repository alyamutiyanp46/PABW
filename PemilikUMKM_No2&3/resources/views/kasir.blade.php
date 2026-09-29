@extends('layouts.app')
@section('title', 'Catat Penjualan')
@section('hide_header', true)
@section('hide_bottom_nav', true)

@section('content')
@php
    function getEmojiKasir($name) {
        $n = strtolower($name);
        if (str_contains($n, 'nasi') || str_contains($n, 'mie')) return '🍛';
        if (str_contains($n, 'ayam')) return '🍗';
        if (str_contains($n, 'teh') || str_contains($n, 'kopi') || str_contains($n, 'minum')) return '🥤';
        if (str_contains($n, 'snack') || str_contains($n, 'keripik')) return '🍟';
        if (str_contains($n, 'beras')) return '🍚';
        if (str_contains($n, 'minyak')) return '🛢️';
        return '📦';
    }
@endphp

<div style="background-color: #F9FAFB; min-height: 100vh; position: relative; padding-bottom: 100px;">
    <!-- Header -->
    <div class="pos-header">
        <button class="pos-back-btn" onclick="window.location.href='{{ route('dashboard') }}'">
            <i data-lucide="arrow-left" width="20" height="20"></i>
        </button>
        <div>
            <div class="pos-title">Catat Penjualan</div>
            <div class="pos-subtitle">Pilih produk yang dibeli</div>
        </div>
    </div>

    <!-- Search -->
    <div class="pos-search-wrapper">
        <i data-lucide="search" width="18" height="18" class="pos-search-icon"></i>
        <input type="text" class="pos-search-input" placeholder="Cari produk..." />
    </div>

    <!-- Categories -->
    <div class="pos-categories" style="overflow-x: auto; white-space: nowrap; padding-bottom: 8px; margin-bottom: -8px;">
        <button class="pos-cat-pill active">Semua</button>
        <button class="pos-cat-pill">Makanan</button>
        <button class="pos-cat-pill">Minuman</button>
        <button class="pos-cat-pill">Snack</button>
        <button class="pos-cat-pill">Lainnya</button>
    </div>

    <!-- Product Grid -->
    <div class="pos-product-grid">
        @foreach($products as $p)
        <div class="pos-card" style="display: flex; flex-direction: column; height: 100%;">
            <div class="pos-card-img" @if(!empty($p['image_path'])) style="background-image: url('{{ $p['image_path'] }}'); background-size: cover; background-position: center; font-size: 0;" @endif>
                @if(empty($p['image_path']))
                    {{ getEmojiKasir($p['product_name']) }}
                @endif
            </div>
            <div style="flex: 1; margin-bottom: 8px;">
                <div class="pos-card-name">{{ $p['product_name'] }}</div>
                <div class="pos-card-price" style="color: #2563EB;">Rp {{ number_format($p['price'], 0, ',', '.') }}</div>
            </div>
            <div id="btn-container-{{ $p['id'] }}">
                <button class="pos-btn-add" onclick="addToCart({{ $p['id'] }})" style="background: #EFF6FF; color: #2563EB; width: 100%; border: none;">
                    <i data-lucide="plus" width="14" height="14"></i> Tambah
                </button>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Bottom Bar -->
    <div class="pos-bottom-bar" style="position: fixed; bottom: 0; width: min(100vw, 390px); left: 50%; transform: translateX(-50%); box-shadow: 0 -4px 20px rgba(0,0,0,0.05);">
        <div class="pos-bot-left">
            <div class="pos-bot-items" id="cart-item-count" style="color: #9CA3AF; font-size: 12px;">0 item · Tunai</div>
            <div class="pos-bot-total" id="cart-total-price" style="font-size: 20px; font-weight: 800; color: #111827;">Rp 0</div>
        </div>
        
        <form action="{{ route('kasir.checkout') }}" method="POST" id="checkout-form" style="margin: 0;">
            @csrf
            <input type="hidden" name="cart_data" id="cart-data-input" value="[]">
            <button class="pos-btn-simpan" id="btn-checkout" type="submit" disabled style="background: #93C5FD; color: white; border: none; padding: 12px 24px; border-radius: 12px; font-weight: 600; display: flex; align-items: center; gap: 8px;">
                <i data-lucide="check" width="18" height="18"></i> Simpan
            </button>
        </form>
    </div>
</div>

<!-- Success Modal -->
@if(session('success_total'))
<div id="success-modal" class="modal-overlay">
    <div class="modal-sheet" style="padding-top: 32px; text-align: center;">
        <div class="modal-handle"></div>
        
        <div style="position: relative; width: 80px; height: 80px; margin: 0 auto 16px;">
            <div style="position: absolute; inset: 0; border: 2px dashed #10B981; border-radius: 50%; opacity: 0.5;"></div>
            <div style="position: absolute; inset: 10px; background: #10B981; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <i data-lucide="check" color="white" width="32" height="32"></i>
            </div>
        </div>
        
        <h2 style="font-size: 20px; font-weight: 800; margin-bottom: 8px;">Transaksi Berhasil!</h2>
        <p style="color: #6B7280; font-size: 14px; margin-bottom: 24px;">Pendapatan telah masuk ke laporan hari ini</p>
        
        <div style="background: #F9FAFB; border-radius: 12px; padding: 16px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <span style="color: #6B7280; font-size: 14px;">Total transaksi</span>
            <span style="color: #2563EB; font-size: 20px; font-weight: 800;">Rp {{ number_format(session('success_total'), 0, ',', '.') }}</span>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
            <button onclick="window.location.href='{{ route('kasir') }}'" style="border: 1px solid #E5E7EB; background: white; border-radius: 12px; font-weight: 600; padding: 12px; cursor: pointer;">Selesai</button>
            <button onclick="alert('Cetak Struk...')" style="background: #2563EB; color: white; border-radius: 12px; font-weight: 600; border: none; padding: 12px; cursor: pointer;">Cetak Struk</button>
        </div>
    </div>
</div>
@endif

@endsection

@section('scripts')
<script>
    const productsData = @json($products);
    let cart = {};

    function addToCart(productId) {
        const product = productsData.find(p => p.id === productId);
        if (!product) return;
        
        if (product.stock <= 0) {
            alert('Stok habis!');
            return;
        }
        
        if (!cart[productId]) {
            cart[productId] = {
                id: product.id,
                name: product.product_name,
                price: product.price,
                qty: 1
            };
        } else {
            if (cart[productId].qty < product.stock) {
                cart[productId].qty += 1;
            } else {
                alert('Maksimal stok tercapai!');
                return;
            }
        }

        updateCartUI();
    }
    
    function minCart(productId) {
        if (cart[productId]) {
            if (cart[productId].qty > 1) {
                cart[productId].qty -= 1;
            } else {
                delete cart[productId];
            }
            updateCartUI();
        }
    }

    function updateCartUI() {
        let totalItems = 0;
        let totalPrice = 0;
        let cartArray = [];

        for (const id in cart) {
            totalItems += cart[id].qty;
            totalPrice += cart[id].qty * cart[id].price;
            cartArray.push(cart[id]);
        }
        
        // Update product buttons
        productsData.forEach(p => {
            const container = document.getElementById('btn-container-' + p.id);
            if (!container) return;
            
            if (cart[p.id]) {
                container.innerHTML = `
                    <div class="pos-qty-control" style="background: #2563EB;">
                        <button class="pos-qty-btn" onclick="minCart(${p.id})">
                            <i data-lucide="minus" width="14" height="14"></i>
                        </button>
                        <span class="pos-qty-num">${cart[p.id].qty}</span>
                        <button class="pos-qty-btn" onclick="addToCart(${p.id})">
                            <i data-lucide="plus" width="14" height="14"></i>
                        </button>
                    </div>
                `;
            } else {
                container.innerHTML = `
                    <button class="pos-btn-add" onclick="addToCart(${p.id})" style="background: #EFF6FF; color: #2563EB; width: 100%; border: none;">
                        <i data-lucide="plus" width="14" height="14"></i> Tambah
                    </button>
                `;
            }
        });
        
        // Re-init lucide icons for newly added HTML
        if (window.lucide) {
            window.lucide.createIcons();
        }

        document.getElementById('cart-item-count').textContent = totalItems + ' item · Tunai';
        document.getElementById('cart-total-price').textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');
        
        document.getElementById('cart-data-input').value = JSON.stringify(cartArray);

        const btnCheckout = document.getElementById('btn-checkout');
        if (totalItems > 0) {
            btnCheckout.disabled = false;
            btnCheckout.style.cursor = 'pointer';
            btnCheckout.style.background = '#2563EB'; // Solid blue
            btnCheckout.style.opacity = '1';
        } else {
            btnCheckout.disabled = true;
            btnCheckout.style.cursor = 'not-allowed';
            btnCheckout.style.background = '#93C5FD'; // Lighter blue
            btnCheckout.style.opacity = '0.7';
        }
    }
    
    // Init state on load
    updateCartUI();
</script>
@endsection
