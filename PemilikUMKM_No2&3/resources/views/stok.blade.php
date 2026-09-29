@extends('layouts.app')
@section('title', 'Produk & Stok')
@section('hide_header', true)

@section('content')
@php
    function getEmojiStok($name) {
        $n = strtolower($name);
        if (str_contains($n, 'nasi') || str_contains($n, 'mie')) return '🍛';
        if (str_contains($n, 'ayam')) return '🍗';
        if (str_contains($n, 'teh') || str_contains($n, 'kopi') || str_contains($n, 'minum')) return '🥤';
        if (str_contains($n, 'snack') || str_contains($n, 'keripik')) return '🍟';
        if (str_contains($n, 'beras')) return '🍚';
        if (str_contains($n, 'minyak')) return '🛢️';
        return '📦';
    }

    function getStatusColor($status) {
        if ($status === 'Aman') return 'green';
        if ($status === 'Menipis') return 'yellow';
        return 'red';
    }
    
    $totalProducts = count($products);
    $needsRestock = count(array_filter($products, function($p) { return $p['status'] !== 'Aman'; }));
@endphp

<div style="background-color: #F9FAFB; min-height: 100vh; padding-bottom: 80px; position: relative;">
    <div class="stok-header">
        <div>
            <div class="stok-header-title">Produk & Stok</div>
            <div class="stok-header-sub">{{ $totalProducts }} produk · {{ $needsRestock }} perlu restock</div>
        </div>
        <div class="stok-alert-icon">
            <i data-lucide="alert-triangle" width="24" height="24"></i>
            <div class="stok-alert-badge">{{ $needsRestock }}</div>
        </div>
    </div>

    <div class="stok-search-box">
        <div class="stok-search-input-wrapper">
            <i data-lucide="search" width="20" height="20" class="stok-search-icon"></i>
            <input type="text" class="stok-search-input" placeholder="Cari produk..." />
        </div>
    </div>

    <div style="display: flex; gap: 8px; padding: 0 24px 16px; overflow-x: auto; scrollbar-width: none;">
        <button class="stok-category-pill active">Semua ({{ $totalProducts }})</button>
        <button class="stok-category-pill" style="color: #4B5563; border-color: #E5E7EB;">Aman</button>
        <button class="stok-category-pill" style="color: #4B5563; border-color: #E5E7EB;">Menipis</button>
        <button class="stok-category-pill" style="color: #4B5563; border-color: #E5E7EB;">Kritis</button>
    </div>

    <div style="padding: 0 24px;">
        @foreach($products as $item)
        <div class="stok-card" onclick="openEdit({{ json_encode($item) }})" style="cursor: pointer;">
            <div class="stok-card-left">
                <div class="stok-icon-box" @if(!empty($item['image_path'])) style="background-image: url('{{ $item['image_path'] }}'); background-size: cover; background-position: center; font-size: 0;" @endif>
                    @if(empty($item['image_path']))
                        {{ getEmojiStok($item['product_name']) }}
                    @endif
                </div>
                <div>
                    <div class="stok-item-name">{{ $item['product_name'] }}</div>
                    <div class="stok-item-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</div>
                    <div class="stok-status-row">
                        <div class="stok-dot {{ getStatusColor($item['status']) }}"></div>
                        Stok: {{ $item['stock'] }}
                    </div>
                </div>
            </div>
            <div class="stok-badge {{ strtolower($item['status']) }}">{{ $item['status'] }}</div>
        </div>
        @endforeach
    </div>

    <div style="position: fixed; bottom: 0; width: 100%; max-width: 390px; left: 50%; transform: translateX(-50%); z-index: 40; pointer-events: none; height: 100vh;">
        <button class="stok-fab" onclick="openAdd()" style="pointer-events: auto; position: absolute; bottom: 84px; right: 24px; cursor: pointer;">
            <i data-lucide="plus" width="24" height="24"></i> Produk Baru
        </button>
    </div>
</div>

<div id="product-modal" class="modal-overlay" onclick="closeModal(event)" style="display: none;">
    <div class="modal-sheet" onclick="event.stopPropagation()">
        <div class="modal-handle"></div>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 id="modal-title-text" class="modal-title" style="margin: 0;">Tambah Produk</h2>
            <button type="button" class="header-icon-btn" onclick="closeModal()" aria-label="Tutup" style="background: none; border: none; cursor: pointer; padding: 4px;">
                <i data-lucide="x" width="18" height="18"></i>
            </button>
        </div>
        <form id="product-form" action="{{ route('stok.store') }}" method="POST">
            @csrf
            <input type="hidden" id="form-method" name="_method" value="POST">
            
            <div class="field-group">
                <div>
                    <label class="field-label">Nama Produk</label>
                    <input
                        id="product-name"
                        name="product_name"
                        class="field-input"
                        placeholder="cth: Nasi Goreng Spesial"
                        required
                    />
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                    <div>
                        <label class="field-label">Harga</label>
                        <input
                            id="product-price"
                            name="price"
                            class="field-input"
                            type="number"
                            placeholder="25000"
                            required
                        />
                    </div>
                    <div>
                        <label class="field-label">Stok</label>
                        <input
                            id="product-stock"
                            name="stock"
                            class="field-input"
                            type="number"
                            placeholder="50"
                            required
                        />
                    </div>
                </div>
                <div>
                    <label class="field-label">URL Foto Produk <span style="color: #9CA3AF; font-weight: 400;">(opsional)</span></label>
                    <input
                        id="product-image"
                        name="image_path"
                        class="field-input"
                        placeholder="https://..."
                    />
                </div>
            </div>

            <button id="save-product-btn" class="btn-primary-full" type="submit">
                Simpan
            </button>
        </form>
        
        <form id="delete-form" method="POST" style="display: none; margin-top: 12px;">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn-primary-full" type="submit" style="background: #FEF2F2; color: #EF4444; border: none; cursor: pointer;">
                Hapus Produk
            </button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const modal = document.getElementById('product-modal');
    const form = document.getElementById('product-form');
    const formMethod = document.getElementById('form-method');
    const titleText = document.getElementById('modal-title-text');
    const saveBtn = document.getElementById('save-product-btn');
    const deleteForm = document.getElementById('delete-form');
    
    function closeModal(e) {
        if (e && e.target !== modal && e.currentTarget !== modal) return;
        modal.style.display = 'none';
    }

    function openAdd() {
        form.action = "{{ route('stok.store') }}";
        formMethod.value = "POST";
        titleText.textContent = "Tambah Produk";
        saveBtn.textContent = "Tambah Produk";
        deleteForm.style.display = "none";
        
        document.getElementById('product-name').value = "";
        document.getElementById('product-price').value = "";
        document.getElementById('product-stock').value = "";
        document.getElementById('product-image').value = "";
        
        modal.style.display = 'flex';
    }

    function openEdit(product) {
        form.action = "/stok/" + product.id;
        formMethod.value = "PUT";
        titleText.textContent = "Edit Produk";
        saveBtn.textContent = "Simpan Perubahan";
        
        deleteForm.action = "/stok/" + product.id;
        deleteForm.style.display = "block";
        
        document.getElementById('product-name').value = product.product_name;
        document.getElementById('product-price').value = product.price;
        document.getElementById('product-stock').value = product.stock;
        document.getElementById('product-image').value = product.image_path;
        
        modal.style.display = 'flex';
    }
</script>
@endsection
