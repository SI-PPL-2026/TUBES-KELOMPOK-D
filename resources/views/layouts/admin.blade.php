<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel - SIDAPUR')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-100 text-slate-800 antialiased" x-data="{ sidebarOpen: false }">

    <div class="min-h-screen flex">
        
        <!-- Sidebar Navigation -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
               class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-300 transition-transform duration-300 ease-in-out flex flex-col justify-between shadow-xl">
            
            <div>
                <!-- Brand / Logo -->
                <div class="h-20 flex items-center px-6 border-b border-slate-800">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-500 to-amber-400 flex items-center justify-center text-white text-lg shadow-md">
                            <i class="fa-solid fa-bowl-rice"></i>
                        </div>
                        <div>
                            <span class="text-lg font-black text-white tracking-tight">SIDAPUR</span>
                            <span class="block text-[10px] uppercase font-bold tracking-wider text-brand-400">Panel Pengelola</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Menu -->
                <nav class="px-4 py-6 space-y-1 text-sm font-medium">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-brand-500 text-white font-bold shadow-md shadow-brand-500/20' : 'hover:bg-slate-800 hover:text-white' }}">
                        <i class="fa-solid fa-chart-pie w-5 mr-3 text-center"></i>
                        <span>Transparansi & Kas</span>
                    </a>

                    <a href="{{ route('admin.aid_requests.index') }}" 
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.aid_requests.*') ? 'bg-brand-500 text-white font-bold shadow-md shadow-brand-500/20' : 'hover:bg-slate-800 hover:text-white' }}">
                        <div class="flex items-center">
                            <i class="fa-solid fa-hand-holding-heart w-5 mr-3 text-center"></i>
                            <span>Verifikasi Bantuan</span>
                        </div>
                        @php $pendingReq = \App\Models\AidRequest::where('status', 'pending')->count(); @endphp
                        @if($pendingReq > 0)
                            <span class="px-2 py-0.5 text-xs font-bold bg-amber-400 text-slate-950 rounded-full">{{ $pendingReq }}</span>
                        @endif
                    </a>

                    <a href="{{ route('admin.donations.index') }}" 
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.donations.*') ? 'bg-brand-500 text-white font-bold shadow-md shadow-brand-500/20' : 'hover:bg-slate-800 hover:text-white' }}">
                        <div class="flex items-center">
                            <i class="fa-solid fa-money-bill-transfer w-5 mr-3 text-center"></i>
                            <span>Verifikasi Donasi</span>
                        </div>
                        @php $pendingDon = \App\Models\Donation::where('status', 'pending')->count(); @endphp
                        @if($pendingDon > 0)
                            <span class="px-2 py-0.5 text-xs font-bold bg-amber-400 text-slate-950 rounded-full">{{ $pendingDon }}</span>
                        @endif
                    </a>

                    <a href="{{ route('admin.finances.index') }}" 
                       class="flex items-center px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.finances.*') ? 'bg-brand-500 text-white font-bold shadow-md shadow-brand-500/20' : 'hover:bg-slate-800 hover:text-white' }}">
                        <i class="fa-solid fa-book-bookmark w-5 mr-3 text-center"></i>
                        <span>Buku Kas & Laporan</span>
                    </a>

                    <a href="{{ route('admin.payment_methods.index') }}" 
                       class="flex items-center px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.payment_methods.*') ? 'bg-brand-500 text-white font-bold shadow-md shadow-brand-500/20' : 'hover:bg-slate-800 hover:text-white' }}">
                        <i class="fa-solid fa-qrcode w-5 mr-3 text-center"></i>
                        <span>Metode & QRIS</span>
                    </a>

                    <a href="{{ route('admin.documentations.index') }}" 
                       class="flex items-center px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.documentations.*') ? 'bg-brand-500 text-white font-bold shadow-md shadow-brand-500/20' : 'hover:bg-slate-800 hover:text-white' }}">
                        <i class="fa-solid fa-images w-5 mr-3 text-center"></i>
                        <span>Dokumentasi</span>
                    </a>

                    <a href="{{ route('admin.articles.index') }}" 
                       class="flex items-center px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.articles.*') ? 'bg-brand-500 text-white font-bold shadow-md shadow-brand-500/20' : 'hover:bg-slate-800 hover:text-white' }}">
                        <i class="fa-solid fa-newspaper w-5 mr-3 text-center"></i>
                        <span>Artikel & Event</span>
                    </a>

                    <a href="{{ route('admin.partners.index') }}" 
                       class="flex items-center px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.partners.*') ? 'bg-brand-500 text-white font-bold shadow-md shadow-brand-500/20' : 'hover:bg-slate-800 hover:text-white' }}">
                        <i class="fa-solid fa-handshake w-5 mr-3 text-center"></i>
                        <span>Mitra & Kolaborasi</span>
                    </a>

                    <a href="{{ route('admin.reviews.index') }}" 
                       class="flex items-center px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.reviews.*') ? 'bg-brand-500 text-white font-bold shadow-md shadow-brand-500/20' : 'hover:bg-slate-800 hover:text-white' }}">
                        <i class="fa-solid fa-comments w-5 mr-3 text-center"></i>
                        <span>Moderasi Ulasan</span>
                    </a>

                    <a href="{{ route('admin.users.index') }}" 
                       class="flex items-center px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-brand-500 text-white font-bold shadow-md shadow-brand-500/20' : 'hover:bg-slate-800 hover:text-white' }}">
                        <i class="fa-solid fa-users-gear w-5 mr-3 text-center"></i>
                        <span>Kelola Pengguna</span>
                    </a>
                </nav>
            </div>

            <!-- Bottom User & Exit -->
            <div class="p-4 border-t border-slate-800 space-y-2">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center px-3 py-2 text-xs font-semibold rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300">
                    <i class="fa-solid fa-globe mr-2"></i> Lihat Website Publik
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-3 py-2 text-xs font-semibold rounded-lg text-rose-400 hover:bg-rose-950/40">
                        <i class="fa-solid fa-power-off mr-2"></i> Keluar Sistem
                    </button>
                </form>
            </div>

        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 lg:pl-64 flex flex-col">
            
            <!-- Admin Topbar -->
            <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-6 sticky top-0 z-40">
                <div class="flex items-center space-x-3">
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-slate-600 hover:text-slate-900 p-2">
                        <i class="fa-solid fa-bars text-lg"></i>
                    </button>
                    <h1 class="text-lg font-bold text-slate-800">@yield('page_title', 'Dashboard Pengelola')</h1>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2 text-right">
                        <div>
                            <div class="text-sm font-bold text-slate-800">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-brand-600 font-semibold">Administrator</div>
                        </div>
                        <div class="w-9 h-9 rounded-full bg-brand-500 text-white flex items-center justify-center font-bold">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Alerts -->
            <div class="p-6 pb-0">
                @if(session('success'))
                    <div class="flex items-center p-4 mb-4 text-emerald-800 border-l-4 border-emerald-500 bg-emerald-50 rounded-r-xl shadow-xs">
                        <i class="fa-solid fa-circle-check text-lg mr-3 text-emerald-600"></i>
                        <div class="text-sm font-medium">{{ session('success') }}</div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="flex items-center p-4 mb-4 text-rose-800 border-l-4 border-rose-500 bg-rose-50 rounded-r-xl shadow-xs">
                        <i class="fa-solid fa-circle-exclamation text-lg mr-3 text-rose-600"></i>
                        <div class="text-sm font-medium">{{ session('error') }}</div>
                    </div>
                @endif
            </div>

            <!-- Page Body -->
            <main class="p-6 flex-1">
                @yield('content')
            </main>
        </div>

    </div>

    @stack('scripts')
</body>
</html>
