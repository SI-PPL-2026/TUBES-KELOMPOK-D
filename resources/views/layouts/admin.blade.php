<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Pengurus - SIDAPUR')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Lato', sans-serif; color: #1F3B2E; background-color: #F4F7F3; }
    </style>
</head>
<body class="min-h-screen flex flex-col md:flex-row antialiased">

    <!-- Sidebar Admin (POV 2: Pengurus Nasi Darurat) -->
    <aside class="w-full md:w-64 bg-[#1F3B2E] text-white flex-shrink-0 flex flex-col justify-between">
        <div>
            <div class="px-6 py-5 border-b border-white/10 flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg bg-white flex items-center justify-center overflow-hidden flex-shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="SIDAPUR" class="w-8 h-8 object-contain">
                </div>
                <div>
                    <p class="text-base font-black tracking-tight leading-none">SIDAPUR</p>
                    <p class="text-[10px] text-emerald-200 uppercase tracking-wider mt-1">Panel Pengurus</p>
                </div>
            </div>

            <nav class="p-4 space-y-1.5 text-sm font-semibold">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#2A6046] text-white' : 'text-white/80 hover:bg-white/10' }}">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Ringkasan</span>
                </a>
                <a href="{{ route('admin.aid-requests') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition {{ request()->routeIs('admin.aid-requests*') ? 'bg-[#2A6046] text-white' : 'text-white/80 hover:bg-white/10' }}">
                    <i data-lucide="clipboard-check" class="w-4 h-4"></i>
                    <span>Pengajuan Bantuan</span>
                </a>
                <a href="{{ route('admin.donations') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition {{ request()->routeIs('admin.donations*') ? 'bg-[#2A6046] text-white' : 'text-white/80 hover:bg-white/10' }}">
                    <i data-lucide="heart-handshake" class="w-4 h-4"></i>
                    <span>Verifikasi Donasi</span>
                </a>
                <a href="{{ route('admin.finances') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition {{ request()->routeIs('admin.finances*') ? 'bg-[#2A6046] text-white' : 'text-white/80 hover:bg-white/10' }}">
                    <i data-lucide="wallet" class="w-4 h-4"></i>
                    <span>Kas & Transparansi</span>
                </a>
                <a href="{{ route('admin.users') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition {{ request()->routeIs('admin.users*') ? 'bg-[#2A6046] text-white' : 'text-white/80 hover:bg-white/10' }}">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    <span>Kelola Pengguna</span>
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-white/10 space-y-2 text-sm">
            <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl text-white/80 hover:bg-white/10 transition font-semibold">
                <i data-lucide="globe" class="w-4 h-4"></i>
                <span>Lihat Web Publik</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 rounded-xl text-red-300 hover:bg-red-500/20 transition font-semibold">
                    <i data-lucide="log-out" class="w-4 h-4"></i>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Admin Content -->
    <div class="flex-1 flex flex-col min-w-0">
        <header class="bg-white border-b border-[#DEE4DC] px-6 py-4 flex items-center justify-between">
            <h1 class="text-lg font-black text-[#1F3B2E]">@yield('page_title', 'Dashboard Pengurus')</h1>
            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-xs font-bold text-[#1F3B2E]">{{ Auth::user()->name }}</p>
                    <p class="text-[11px] text-[#5F6A64]">Admin Pengurus Nasi Darurat</p>
                </div>
                <div class="w-9 h-9 rounded-full bg-[#2A6046] text-white font-black text-sm flex items-center justify-center">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>
        </header>

        <main class="flex-1 p-6 space-y-6">
            @if(session('success'))
                <div class="p-4 bg-[#EAEFE8] border border-[#2A6046]/40 rounded-xl flex items-center gap-3 text-[#1F3B2E]">
                    <i data-lucide="check-circle" class="w-5 h-5 text-[#2A6046] flex-shrink-0"></i>
                    <span class="text-sm font-semibold">{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="p-4 bg-red-50 border border-red-200 rounded-xl flex items-center gap-3 text-red-800">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-red-600 flex-shrink-0"></i>
                    <span class="text-sm font-semibold">{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>lucide.createIcons();</script>
</body>
</html>
