@extends('layouts.app')
@section('title', 'Diskusi Forum')
@section('hide_header', true)
@section('hide_bottom_nav', true)

@section('content')
@php
    $post = [
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
    ];
@endphp
<div class="forum-bg" style="position: relative; padding-bottom: 100px; min-height: 100vh;">
    <div class="forum-header" style="border-bottom: 1px solid #E5E7EB;">
        <button class="forum-header-btn" onclick="window.location.href='{{ route('forum') }}'">
            <i data-lucide="arrow-left" width="20" height="20" color="#4B5563"></i>
        </button>
        <div class="forum-title">Diskusi</div>
    </div>

    <div style="padding: 0 24px;">
        <div class="forum-post" style="padding: 24px 0; border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.02); margin: 16px 0; border-radius: 16px;">
            <div class="forum-post-header" style="padding: 0 16px;">
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
                            <span style="background: #DBEAFE; color: #2563EB; padding: 2px 6px; border-radius: 10px; font-size: 10px;">💡 {{ $post['category'] }}</span>
                            <span>{{ $post['time'] }}</span>
                        </div>
                    </div>
                </div>
                <div style="cursor: pointer;">
                    <i data-lucide="bookmark" width="18" height="18" color="#9CA3AF"></i>
                </div>
            </div>
            
            <div class="forum-post-content" style="padding: 0 16px; margin-bottom: 12px;">{{ $post['content'] }}</div>
            
            <div class="forum-post-tags" style="padding: 0 16px;">
                @foreach($post['tags'] as $tag)
                    <span>{{ $tag }}</span>
                @endforeach
            </div>
            
            <div class="forum-post-actions" style="padding: 0 16px;">
                <div class="forum-action-btn">
                    <i data-lucide="heart" width="18" height="18"></i> {{ $post['likes'] }}
                </div>
                <div class="forum-action-btn">
                    <i data-lucide="message-square" width="18" height="18"></i> {{ $post['comments'] }}
                </div>
                <div class="forum-action-btn"><i data-lucide="share-2" width="18" height="18"></i> {{ $post['shares'] }}</div>
            </div>
        </div>

        <div style="margin-top: 24px;">
            <div style="font-size: 16px; font-weight: 700; color: #111827; margin-bottom: 24px;">0 Komentar</div>
            
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; color: #9CA3AF; padding: 40px 0;">
                <i data-lucide="message-circle" width="32" height="32" color="#D1D5DB" style="margin-bottom: 12px;"></i>
                <div style="font-size: 14px;">Belum ada komentar. Jadilah yang pertama!</div>
            </div>
        </div>
    </div>

    <div style="position: fixed; bottom: 0; left: max(0px, calc(50vw - 195px)); width: min(100vw, 390px); background: white; padding: 16px 24px; border-top: 1px solid #F3F4F6; display: flex; gap: 12px; align-items: flex-end; z-index: 10;">
        <div class="forum-avatar" style="background: #3B82F6; width: 36px; height: 36px; font-size: 13px; flex-shrink: 0; margin-bottom: 4px;">
            BS
        </div>
        <div style="flex: 1; position: relative;">
            <textarea 
                placeholder="Tulis komentar..." 
                style="width: 100%; border: 1px solid #E5E7EB; border-radius: 20px; padding: 12px 44px 12px 16px; font-size: 14px; outline: none; resize: none; overflow: hidden; min-height: 44px; max-height: 120px; font-family: inherit; display: block; line-height: 1.4;"
                rows="1"
            ></textarea>
            <div style="position: absolute; right: 14px; bottom: 12px; cursor: pointer; display: flex;" onclick="alert('Komentar tidak tersedia di statis')">
                <i data-lucide="send" width="20" height="20" color="#9CA3AF"></i>
            </div>
        </div>
    </div>
</div>
@endsection
