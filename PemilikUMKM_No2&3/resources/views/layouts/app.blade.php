<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', 'Pemilik UMKM')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/onboarding.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard-new.css') }}">
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* Polyfill for react-router active link css */
        .bottom-nav-link.active {
            color: var(--blue);
        }
        .bottom-nav-link.active .lucide {
            stroke-width: 2.5;
        }
        .lucide {
            width: 24px;
            height: 24px;
            stroke-width: 2;
        }
        .bottom-nav-link .lucide {
            width: 22px;
            height: 22px;
            stroke-width: 1.8;
        }
    </style>
</head>
<body>
    <div class="phone-shell" @hasSection('shell_style') style="@yield('shell_style')" @endif>
        
        @unless(View::hasSection('hide_header'))
        <header class="app-header">
            <div class="header-left">
                @if(View::hasSection('show_back'))
                    <button class="header-icon-btn" onclick="window.history.back()" aria-label="Kembali">
                        <i data-lucide="arrow-left" width="20" height="20"></i>
                    </button>
                @else
                    <div class="header-logo-icon">
                        <i data-lucide="store" width="20" height="20"></i>
                    </div>
                @endif
                <div>
                    <div class="header-title">@yield('header_title')</div>
                    @if(View::hasSection('header_subtitle'))
                        <div class="header-subtitle">@yield('header_subtitle')</div>
                    @endif
                </div>
            </div>
            
            @if(View::hasSection('show_logout'))
                <button class="header-icon-btn" aria-label="Keluar">
                    <i data-lucide="log-out" width="18" height="18"></i>
                </button>
            @endif
        </header>
        @endunless

        @if(View::hasSection('hide_header'))
            @yield('content')
        @else
            <section class="screen-content">
                @yield('content')
            </section>
        @endif

        @unless(View::hasSection('hide_bottom_nav'))
        <nav class="bottom-nav" role="navigation" aria-label="Menu utama" style="grid-template-columns: repeat(5, 1fr);">
            <a href="{{ route('dashboard') }}" id="nav-home" class="bottom-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i data-lucide="home"></i>
                <span>Home</span>
            </a>
            <a href="{{ route('kasir') }}" id="nav-sales" class="bottom-nav-link {{ request()->routeIs('kasir') ? 'active' : '' }}">
                <i data-lucide="shopping-bag"></i>
                <span>Sales</span>
            </a>
            <a href="{{ route('stok') }}" id="nav-stok" class="bottom-nav-link {{ request()->routeIs('stok') ? 'active' : '' }}">
                <i data-lucide="package"></i>
                <span>Stok</span>
            </a>
            <a href="{{ route('sales') }}" id="nav-laporan" class="bottom-nav-link {{ request()->routeIs('sales') ? 'active' : '' }}">
                <i data-lucide="bar-chart-2"></i>
                <span>Laporan</span>
            </a>
            <a href="{{ route('pengaturan') }}" id="nav-akun" class="bottom-nav-link {{ request()->routeIs('pengaturan') ? 'active' : '' }}">
                <i data-lucide="settings"></i>
                <span>Akun</span>
            </a>
        </nav>
        @endunless
    </div>

    <script>
        lucide.createIcons();
    </script>
    @yield('scripts')
</body>
</html>
