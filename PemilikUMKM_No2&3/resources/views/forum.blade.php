@extends('layouts.app')
@section('title', 'Forum UMKM')
@section('hide_header', true)


@section('content')
@php
    $posts = [
        [
            'id' => 1,
            'author' => 'Bu Sari Dewi',
            'initials' => 'SD',
            'color' => '#F43F5E',
            'verified' => true,
            'category' => 'Tips Bisnis',
            'time' => '2 jam lalu',
            'content' => 'Tips: Jangan lupa foto produk dengan pencahayaan yang baik! Saya meningkatkan penjualan 40% hanya dengan memperbaiki foto produk di WA. Natural light = foto lebih menarik. Coba foto di dekat jendela pagi hari! 📸✨',
            'tags' => ['#PhotographyTips', '#UMKM', '#Marketing'],
            'likes' => 89,
            'comments' => 23,
            'shares' => 45,
            'liked' => false,
            'saved' => false
        ],
        [
            'id' => 2,
            'author' => 'Pak Budi Santoso',
            'initials' => 'BS',
            'color' => '#3B82F6',
            'verified' => false,
            'category' => 'Fashion',
            'time' => '5 jam lalu',
            'content' => 'Alhamdulillah! Bulan ini omzet batik handmade naik 65% berkat kolaborasi dengan desainer lokal. Kunci sukses: kualitas + storytelling yang kuat. Batik bukan cuma kain, tapi karya seni.',
            'tags' => ['#Batik', '#Fashion', '#CollaborationWins'],
            'likes' => 120,
            'comments' => 34,
            'shares' => 67,
            'liked' => false,
            'saved' => false
        ],
        [
            'id' => 3,
            'author' => 'Dewi Rahayu',
            'initials' => 'DR',
            'color' => '#10B981',
            'verified' => false,
            'category' => 'Kuliner',
            'time' => '8 jam lalu',
            'content' => 'PERTANYAAN: Ada yang punya tips cara handle komplain makanan terlambat? Kemarin dapat komplain dari pelanggan karena antar lebih dari 30 menit dari janji.',
            'tags' => ['#Katering', '#CustomerService', '#Help'],
            'likes' => 43,
            'comments' => 67,
            'shares' => 12,
            'liked' => false,
            'saved' => false
        ]
    ];
@endphp
<div class="forum-bg" style="min-height: 100vh; padding-bottom: 80px;">
    <div class="forum-header" style="border-bottom: 1px solid #E5E7EB;">
        <button class="forum-header-btn" onclick="window.location.href='{{ route('dashboard') }}'">
            <i data-lucide="arrow-left" width="20" height="20" color="#4B5563"></i>
        </button>
        <div style="flex: 1;">
            <div class="forum-title">Forum UMKM</div>
            <div class="forum-sub">Komunitas pebisnis Indonesia 🇮🇩</div>
        </div>
        <button class="forum-header-btn" style="background: transparent;">
            <i data-lucide="search" width="20" height="20" color="#4B5563"></i>
        </button>
    </div>

    <div class="forum-search" style="margin-top: 12px; margin-bottom: 12px;">
        <i data-lucide="search" width="18" height="18" color="#9CA3AF"></i>
        <input type="text" placeholder="Cari topik, penulis..." />
    </div>

    <div class="forum-cat-scroll" style="padding-bottom: 12px;">
        <button class="forum-cat-pill active">Semua</button>
        <button class="forum-cat-pill">💡 Tips Bisnis</button>
        <button class="forum-cat-pill">🍽️ Kuliner</button>
        <button class="forum-cat-pill">👗 Fashion</button>
    </div>

    <div class="forum-trending" style="padding: 12px 24px;">
        <div class="forum-trend-title" style="margin-bottom: 8px;">
            <i data-lucide="trending-up" width="16" height="16" color="#3B82F6"></i> Trending Hari Ini
        </div>
        <div class="forum-trend-tags">
            <div class="forum-tag">#RamadanBisnis</div>
            <div class="forum-tag">#TipsUMKM</div>
            <div class="forum-tag">#KulinerLokal</div>
            <div class="forum-tag">#FashionHandmade</div>
            <div class="forum-tag">#DigitalisasiUMKM</div>
        </div>
    </div>

    <div class="forum-stats" style="padding: 8px 24px;">
        <div class="forum-stat-item"><i data-lucide="users" width="14" height="14" color="#3B82F6"></i> <strong style="color: #111827;">2.847</strong> anggota</div>
        <div class="forum-stat-item"><i data-lucide="hash" width="14" height="14" color="#8B5CF6"></i> <strong style="color: #111827;">6</strong> postingan</div>
        <div class="forum-stat-item"><i data-lucide="trending-up" width="14" height="14" color="#10B981"></i> <strong style="color: #111827;">+47</strong> hari ini</div>
    </div>

    <div>
        @foreach($posts as $post)
        <div class="forum-post" onclick="window.location.href='{{ route('forum.detail', $post['id']) }}'" style="cursor: pointer;">
            <div class="forum-post-header">
                <div class="forum-user">
                    <div class="forum-avatar" style="background: {{ $post['color'] }};">{{ $post['initials'] }}</div>
                    <div>
                        <div class="forum-user-name">
                            {{ $post['author'] }} 
                            @if($post['verified'])
                                <i data-lucide="check-circle" width="14" height="14" color="#3B82F6" fill="#EFF6FF"></i>
                            @endif
                        </div>
                        <div class="forum-user-sub">
                            @if($post['category'] === 'Tips Bisnis')
                                <span style="background: #DBEAFE; color: #2563EB; padding: 2px 6px; border-radius: 10px; font-size: 10px;">💡 Tips Bisnis</span>
                            @elseif($post['category'] === 'Fashion')
                                <span style="background: #FCE7F3; color: #DB2777; padding: 2px 6px; border-radius: 10px; font-size: 10px;">👗 Fashion</span>
                            @elseif($post['category'] === 'Kuliner')
                                <span style="background: #D1FAE5; color: #059669; padding: 2px 6px; border-radius: 10px; font-size: 10px;">🍽️ Kuliner</span>
                            @endif
                            <span>{{ $post['time'] }}</span>
                        </div>
                    </div>
                </div>
                <div>
                    <i data-lucide="bookmark" width="18" height="18" color="#9CA3AF" style="flex-shrink: 0;"></i>
                </div>
            </div>
            <div class="forum-post-content">{{ $post['content'] }}</div>
            <div class="forum-post-tags">
                @foreach($post['tags'] as $tag)
                    <span>{{ $tag }}</span>
                @endforeach
            </div>
            <div class="forum-post-actions">
                <div class="forum-action-btn">
                    <i data-lucide="heart" width="18" height="18"></i> {{ $post['likes'] }}
                </div>
                <div class="forum-action-btn"><i data-lucide="message-square" width="18" height="18"></i> {{ $post['comments'] }}</div>
                <div class="forum-action-btn"><i data-lucide="share-2" width="18" height="18"></i> {{ $post['shares'] }}</div>
                <div style="flex: 1; text-align: right; color: #2563EB; font-weight: 600;">Baca selengkapnya</div>
            </div>
        </div>
        @endforeach
    </div>

    <button class="forum-fab" onclick="alert('Statis')">
        <i data-lucide="plus" width="20" height="20"></i> Buat Postingan
    </button>
    
    
</div>
@endsection

