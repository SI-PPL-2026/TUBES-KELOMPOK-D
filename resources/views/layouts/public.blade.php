<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIDAPUR - Kebaikan dalam Seporsi Nasi')</title>

    {{-- Google Fonts: Lato semua weight --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <style>
        /* ===== RESET & BASE ===== */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { min-height: 100%; }
        body { font-family: 'Lato', Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased; background: #fff; color: #1f3b2e; }
        a { text-decoration: none; color: inherit; }
        img { max-width: 100%; display: block; }

        /* ===== NAVBAR ===== */
        .sidapur-nav {
            width: 100%;
            background: #fff;
            border-bottom: 1px solid #e2e6e1;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .nav-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 48px;
            height: 88px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }
        /* Brand / Logo */
        .nav-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }
        .nav-logo {
            width: 40px;
            height: 40px;
            background: #2a6046;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .nav-logo svg { width: 22px; height: 22px; }
        .nav-brand-text { display: flex; flex-direction: column; }
        .nav-brand-name {
            font-size: 22px;
            font-weight: 900;
            color: #1f3b2e;
            line-height: 1.1;
        }
        .nav-tagline {
            font-size: 9px;
            font-weight: 400;
            color: #5f6a64;
            letter-spacing: 0.36px;
        }
        /* Nav links */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 32px;
        }
        .nav-links a {
            font-size: 15px;
            font-weight: 400;
            color: #2b3a33;
            white-space: nowrap;
            padding-bottom: 4px;
            border-bottom: 2px solid transparent;
            transition: color 0.15s, border-color 0.15s;
        }
        .nav-links a:hover,
        .nav-links a.active {
            color: #2a6046;
            font-weight: 700;
            border-bottom-color: #2a6046;
        }
        /* Auth buttons */
        .nav-auth {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-shrink: 0;
        }
        .nav-auth .btn-masuk {
            font-size: 15px;
            font-weight: 700;
            color: #2a6046;
        }
        .nav-auth .btn-masuk:hover { text-decoration: underline; }
        .nav-auth .btn-daftar {
            font-size: 15px;
            font-weight: 700;
            color: #fff;
            background: #2a6046;
            border-radius: 8px;
            padding: 12px 22px;
            transition: background 0.15s;
        }
        .nav-auth .btn-daftar:hover { background: #1f4f36; }
        .nav-auth .btn-dashboard {
            font-size: 15px;
            font-weight: 700;
            color: #2a6046;
        }

        /* ===== FOOTER ===== */
        .sidapur-footer {
            width: 100%;
            background: #f8f6f1;
            margin-top: auto;
        }
        .footer-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 56px 48px 0;
        }
        .footer-columns {
            display: grid;
            grid-template-columns: minmax(260px, 1.6fr) repeat(3, minmax(140px, 1fr));
            gap: 48px;
        }
        .footer-brand { display: flex; align-items: center; gap: 12px; margin-bottom: 14px; }
        .footer-logo {
            width: 40px; height: 40px;
            background: #2a6046; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
        }
        .footer-brand-name { font-size: 20px; font-weight: 900; color: #1f3b2e; }
        .footer-tagline { font-size: 9px; color: #5f6a64; letter-spacing: 0.36px; }
        .footer-desc { color: #5f6a64; font-size: 15px; line-height: 24px; margin-bottom: 14px; }
        .footer-instagram { color: #2a6046; font-weight: 700; font-size: 15px; }
        .footer-instagram:hover { text-decoration: underline; }
        .footer-col h3 { font-size: 16px; font-weight: 700; color: #1f3b2e; margin-bottom: 14px; }
        .footer-col a { display: block; font-size: 14px; color: #5f6a64; margin-bottom: 10px; }
        .footer-col a:hover { color: #2a6046; }
        .footer-bottom {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
            padding: 28px 0 32px;
            margin-top: 48px;
            border-top: 1px solid #e2e6e1;
            font-size: 12px;
            color: #5f6a64;
        }

        /* ===== PAGE WRAPPER ===== */
        .page-wrap { display: flex; flex-direction: column; min-height: 100vh; }
        .page-content { flex: 1; }

        /* ===== HERO / BREADCRUMB SHARED ===== */
        .hero-section {
            width: 100%;
            background: #eaefe8;
        }
        .hero-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 28px 48px 48px;
        }
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #5f6a64;
            margin-bottom: 24px;
        }
        .breadcrumb a { color: #5f6a64; }
        .breadcrumb a:hover { color: #2a6046; }
        .breadcrumb .sep { color: #9aa39d; }
        .breadcrumb .current { color: #2a6046; font-weight: 700; }
        .eyebrow {
            font-size: 12px;
            font-weight: 700;
            color: #2a6046;
            letter-spacing: 0.48px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        .page-title {
            font-size: 48px;
            font-weight: 900;
            color: #1f3b2e;
            line-height: 1.1;
            margin-bottom: 12px;
        }
        .page-subtitle {
            font-size: 17px;
            color: #5f6a64;
            line-height: 1.6;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .nav-inner { padding: 0 24px; }
            .hero-inner { padding: 24px 24px 40px; }
            .footer-inner { padding: 48px 24px 0; }
            .footer-columns { grid-template-columns: 1fr 1fr; gap: 32px; }
        }
        @media (max-width: 768px) {
            .nav-links { gap: 20px; display: none; }
            .nav-links a { font-size: 13px; }
            .footer-columns { grid-template-columns: 1fr; }
            .page-title { font-size: 32px; }
        }
    </style>

    @yield('styles')
</head>
<body>
<div class="page-wrap">

    {{-- ===== NAVBAR ===== --}}
    <nav class="sidapur-nav">
        <div class="nav-inner">
            {{-- Brand --}}
            <a href="{{ route('beranda-sidapur') }}" class="nav-brand">
                <div class="nav-logo">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 3C9 3 5 5 5 9c0 2.5 1.5 4.5 3.5 5.5H7v2h10v-2h-.5C18.5 13.5 20 11.5 20 9c0-4-4-6-8-6z" fill="white" opacity="0.9"/>
                        <rect x="8" y="17" width="8" height="2" rx="1" fill="white"/>
                        <rect x="9" y="20" width="6" height="1.5" rx="0.75" fill="white"/>
                    </svg>
                </div>
                <div class="nav-brand-text">
                    <span class="nav-brand-name">SIDAPUR</span>
                    <span class="nav-tagline">KEBAIKAN DALAM SEPORSI NASI</span>
                </div>
            </a>

            {{-- Nav Links --}}
            <div class="nav-links">
                <a href="{{ route('beranda-sidapur') }}" class="{{ request()->routeIs('beranda-sidapur') || request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">Tentang kami</a>
                <a href="{{ route('transparansi') }}" class="{{ request()->routeIs('transparansi') ? 'active' : '' }}">Transparansi</a>
                <a href="{{ route('hubungi') }}" class="{{ request()->routeIs('hubungi') ? 'active' : '' }}">Hubungi kami</a>
            </div>

            {{-- Auth --}}
            <div class="nav-auth">
                @auth
                    <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : (Auth::user()->role === 'donatur' ? route('donatur.dashboard') : route('penerima.dashboard')) }}"
                       class="btn-dashboard">
                        Dashboard ↗
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn-masuk">Masuk</a>
                    <a href="{{ route('register') }}" class="btn-daftar">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- ===== PAGE CONTENT ===== --}}
    <main class="page-content">
        @yield('content')
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="sidapur-footer">
        <div class="footer-inner">
            <div class="footer-columns">
                {{-- Brand col --}}
                <div>
                    <div class="footer-brand">
                        <div class="footer-logo">
                            <svg viewBox="0 0 24 24" fill="none" width="22" height="22">
                                <path d="M12 3C9 3 5 5 5 9c0 2.5 1.5 4.5 3.5 5.5H7v2h10v-2h-.5C18.5 13.5 20 11.5 20 9c0-4-4-6-8-6z" fill="white" opacity="0.9"/>
                                <rect x="8" y="17" width="8" height="2" rx="1" fill="white"/>
                            </svg>
                        </div>
                        <div class="nav-brand-text">
                            <span class="footer-brand-name">nasi darurat</span>
                            <span class="footer-tagline">KEBAIKAN DALAM SEPORSI NASI</span>
                        </div>
                    </div>
                    <p class="footer-desc">Seporsi makanan, sebuah kepedulian. Ruang bersama untuk menghadirkan harapan melalui makanan layak.</p>
                    <a class="footer-instagram" href="https://instagram.com" target="_blank">Instagram Nasi Darurat ↗</a>
                </div>

                {{-- Jelajahi --}}
                <div class="footer-col">
                    <h3>Jelajahi</h3>
                    <a href="{{ route('beranda-sidapur') }}">Program &amp; penerima</a>
                    <a href="{{ route('tentang') }}">Tentang Nasi Darurat</a>
                    <a href="{{ route('transparansi') }}">Transparansi anggaran</a>
                    <a href="{{ route('articles.index') }}">Artikel &amp; dokumentasi</a>
                </div>

                {{-- Terlibat --}}
                <div class="footer-col">
                    <h3>Terlibat</h3>
                    <a href="{{ route('register') }}">Jadi donatur</a>
                    <a href="{{ route('hubungi') }}">Kolaborasi</a>
                    <a href="{{ route('reviews.index') }}">Ulasan komunitas</a>
                    <a href="{{ route('hubungi') }}">Hubungi kami</a>
                </div>

                {{-- Informasi --}}
                <div class="footer-col">
                    <h3>Informasi</h3>
                    <a href="{{ route('terms') }}">Syarat dan ketentuan</a>
                    <a href="{{ route('privacy') }}">Kebijakan privasi</a>
                    <a href="{{ route('hubungi') }}">Pusat bantuan</a>
                </div>
            </div>

            <div class="footer-bottom">
                <span>© {{ date('Y') }} Nasi Darurat. Kebaikan dalam seporsi nasi.</span>
                <span>Dibuat dengan ❤ untuk Purbalingga &amp; Purwokerto</span>
            </div>
        </div>
    </footer>

</div>

@yield('scripts')
</body>
</html>
