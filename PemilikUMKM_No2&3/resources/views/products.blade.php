@extends('layouts.app')

@section('title', 'Produk')
@section('header_title', 'Produk')
@section('header_subtitle', 'Kelola stok dan harga')

@section('content')
    @php
        function getEmoji($name) {
            if (!$name) return '📦';
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

    <!-- Add button -->
    <button id="add-product-btn" class="add-product-btn" type="button" onclick="openAdd()">
        <i data-lucide="plus" width="18" height="18"></i> Tambah Produk
    </button>

    <!-- Product list -->
    @if(empty($products))
        <div class="empty-state">Belum ada produk. Tambahkan produk pertama Anda!</div>
    @endif

    @foreach($products as $p)
        <div class="product-card">
            <div class="product-thumb" @if(!empty($p['image_path'])) style="background-image: url('{{ $p['image_path'] }}'); background-size: cover; background-position: center; font-size: 0;" @endif>
                @if(empty($p['image_path']))
                    <span style="font-size: 24px;">{{ getEmoji($p['product_name']) }}</span>
                @endif
            </div>
            <div class="product-info">
                <div class="product-name">{{ $p['product_name'] }}</div>
                <div class="product-price">
                    Rp {{ number_format($p['price'], 0, ',', '.') }}
                </div>
                <div class="product-stock">Stok: {{ $p['stock'] }}</div>
            </div>
            <div class="product-actions">
                <button
                    id="edit-product-{{ $p['id'] }}"
                    class="icon-btn-sm"
                    onclick="openEdit({{ json_encode($p) }})"
                    aria-label="Edit"
                >
                    <i data-lucide="pencil" width="15" height="15"></i>
                </button>
                <form action="{{ route('products.destroy', $p['id']) }}" method="POST" style="display: contents;" onsubmit="return confirm('Nonaktifkan produk ini?')">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        id="delete-product-{{ $p['id'] }}"
                        class="icon-btn-sm danger"
                        aria-label="Hapus"
                    >
                        <i data-lucide="trash-2" width="15" height="15"></i>
                    </button>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Modal -->
    <div id="product-modal" class="modal-overlay" style="display: none;" onclick="closeModal(event)">
        <div class="modal-sheet" onclick="event.stopPropagation()">
            <div class="modal-handle"></div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 class="modal-title" id="modal-title-text" style="margin: 0;">Tambah Produk</h2>
                <button class="header-icon-btn" type="button" onclick="closeModal()" aria-label="Tutup">
                    <i data-lucide="x" width="18" height="18"></i>
                </button>
            </div>

            <form id="product-form" method="POST" action="{{ route('products.store') }}">
                @csrf
                <input type="hidden" name="_method" id="form-method" value="POST">
                
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
                            <label class="field-label">Harga (Rp)</label>
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
    
    function closeModal(e) {
        if (e && e.target !== modal && e.currentTarget !== modal) return;
        modal.style.display = 'none';
    }

    function openAdd() {
        form.action = "{{ route('products.store') }}";
        formMethod.value = "POST";
        titleText.textContent = "Tambah Produk";
        saveBtn.textContent = "Tambah Produk";
        
        document.getElementById('product-name').value = "";
        document.getElementById('product-price').value = "";
        document.getElementById('product-stock').value = "";
        document.getElementById('product-image').value = "";
        
        modal.style.display = 'flex';
    }

    function openEdit(product) {
        form.action = "/products/" + product.id;
        formMethod.value = "PUT";
        titleText.textContent = "Edit Produk";
        saveBtn.textContent = "Simpan Perubahan";
        
        document.getElementById('product-name').value = product.product_name;
        document.getElementById('product-price').value = product.price;
        document.getElementById('product-stock').value = product.stock;
        document.getElementById('product-image').value = product.image_path || "";
        
        modal.style.display = 'flex';
    }
</script>
@endsection
