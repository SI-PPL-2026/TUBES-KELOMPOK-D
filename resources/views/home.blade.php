@extends('layouts.app')

@section('title', 'SIDAPUR - Nasi Darurat Purbalingga & Purwokerto')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-b from-brand-50/60 to-white pt-12 pb-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Column: Copy & Actions -->
            <div class="lg:col-span-7 space-y-6">
                <div class="inline-flex items-center space-x-2 px-3 py-1.5 rounded-full bg-brand-100 text-brand-800 text-xs font-bold uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-brand-500 animate-ping"></span>
                    <span>Nasi Darurat Purbalingga-Purwokerto</span>
                </div>
                
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-[1.15]">
                    Jangan Sampai Ada Mahasiswa yang <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-amber-600">Tertidur Lapar</span>.
                </h1>

                <p class="text-slate-600 text-base sm:text-lg leading-relaxed">
                    SIDAPUR hadir untuk mendigitalkan penyaluran bantuan makanan darurat bagi mahasiswa dan anak kos di Purwokerto dan Purbalingga yang kirimannya terlambat atau sedang kehabisan uang. Terbuka, tertib, dan transparan melalui pembayaran QRIS langsung ke warung makan.
                </p>

                <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-3 sm:space-y-0 sm:space-x-4 pt-2">
                    @auth
                        @if(Auth::user()->isPenerima())
                            <a href="{{ route('penerima.create') }}" class="px-7 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-2xl shadow-lg shadow-emerald-600/25 transition-all text-center flex items-center justify-center space-x-2">
                                <i class="fa-solid fa-bowl-food"></i>
                                <span>Ajukan Bantuan Darurat</span>
                            </a>
                        @elseif(Auth::user()->isDonatur())
                            <a href="{{ route('donatur.create') }}" class="px-7 py-3.5 bg-brand-500 hover:bg-brand-600 text-white font-bold rounded-2xl shadow-lg shadow-brand-500/25 transition-all text-center flex items-center justify-center space-x-2">
                                <i class="fa-solid fa-hand-holding-dollar"></i>
                                <span>Titip Donasi Sekarang</span>
                            </a>
                        @else
                            <a href="{{ route('admin.dashboard') }}" class="px-7 py-3.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-2xl shadow-lg transition-all text-center">
                                <span>Buka Panel Admin</span>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('register', ['role' => 'donatur']) }}" class="px-7 py-3.5 bg-brand-500 hover:bg-brand-600 text-white font-bold rounded-2xl shadow-lg shadow-brand-500/25 transition-all text-center flex items-center justify-center space-x-2">
                            <i class="fa-solid fa-heart"></i>
                            <span>Titip Donasi</span>
                        </a>
                        <a href="{{ route('register', ['role' => 'penerima']) }}" class="px-7 py-3.5 bg-white hover:bg-slate-50 text-slate-800 border-2 border-slate-200 hover:border-slate-300 font-bold rounded-2xl transition-all text-center flex items-center justify-center space-x-2">
                            <i class="fa-solid fa-utensils text-emerald-600"></i>
                            <span>Butuh Bantuan?</span>
                        </a>
                    @endauth

                    <a href="{{ route('transparency') }}" class="px-5 py-3.5 text-slate-600 hover:text-slate-900 font-semibold text-center flex items-center justify-center space-x-1.5 transition-colors">
                        <i class="fa-solid fa-receipt text-slate-400"></i>
                        <span>Lihat Kas Terbuka</span>
                    </a>
                </div>
            </div>

            <!-- Right Column: Donation Progress Card (Mockup Page 15) -->
            <div class="lg:col-span-5">
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl shadow-slate-200/70 border border-slate-100 relative">
                    <div class="absolute -top-3 right-6 bg-emerald-500 text-white text-[11px] font-extrabold uppercase px-3 py-1 rounded-full shadow-sm tracking-wider">
                        Program Aktif
                    </div>

                    <h3 class="text-xl font-extrabold text-slate-900 mb-2">Progres Donasi Bulan Ini</h3>
                    <p class="text-xs text-slate-500 mb-6">Penyaluran berkala untuk kebutuhan makan harian mahasiswa di Banyumas & Purbalingga.</p>

                    <!-- Stats Row -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="p-4 rounded-2xl bg-brand-50/70 border border-brand-100">
                            <div class="text-xs font-semibold text-brand-700">Terkumpul</div>
                            <div class="text-xl sm:text-2xl font-black text-brand-900 mt-1">
                                Rp {{ number_format($totalInflow, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <div class="text-xs font-semibold text-slate-500">Target</div>
                            <div class="text-xl sm:text-2xl font-black text-slate-800 mt-1">
                                Rp {{ number_format($targetDonation, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="space-y-2 mb-6">
                        <div class="flex justify-between text-xs font-bold text-slate-600">
                            <span>Tercapai: {{ $progressPercent }}%</span>
                            <span>Sisa Saldo: Rp {{ number_format($currentBalance, 0, ',', '.') }}</span>
                        </div>
                        <div class="w-full h-3.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-brand-500 to-amber-500 rounded-full transition-all duration-500" style="width: {{ $progressPercent }}%"></div>
                        </div>
                    </div>

                    <!-- Porsi Tersalurkan Highlight -->
                    <div class="flex items-center space-x-4 p-4 rounded-2xl bg-amber-50 border border-amber-200/60">
                        <div class="w-12 h-12 rounded-xl bg-amber-500 text-white flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-hands-holding-child"></i>
                        </div>
                        <div>
                            <div class="text-2xl font-black text-slate-900">{{ $completedAidCount }} Porsi</div>
                            <div class="text-xs font-medium text-slate-600">Makanan darurat telah disalurkan langsung ke warung makan</div>
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                        <span><i class="fa-solid fa-lock text-brand-500 mr-1"></i> Non-tunai via QRIS</span>
                        <a href="{{ route('transparency') }}" class="font-bold text-brand-600 hover:underline">Detail Transparansi &rarr;</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Cara Kerja Section (Mockup Page 15) -->
<section class="py-16 bg-white border-y border-slate-200/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="text-xs font-extrabold uppercase tracking-widest text-brand-600 mb-2">Alur Bantuan</h2>
            <p class="text-3xl font-extrabold text-slate-900 tracking-tight">Bagaimana Cara Kerja SIDAPUR?</p>
            <p class="text-slate-600 text-sm mt-2">Menghilangkan perantara tunai dengan alur verifikasi KTM dan transfer QRIS warung langsung.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Step 1 -->
            <div class="relative p-8 rounded-3xl bg-slate-50 border border-slate-200 hover:border-brand-300 hover:shadow-lg transition-all group">
                <div class="w-14 h-14 rounded-2xl bg-brand-500 text-white flex items-center justify-center text-2xl font-bold mb-6 shadow-md shadow-brand-500/20 group-hover:scale-110 transition-transform">
                    1
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">1. Ajukan atau Donasi</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Donatur menitipkan donasi melalui Bank/QRIS. Mahasiswa yang butuh bantuan mengisi formulir, mengunggah foto KTM dan foto QRIS warung makan terdekat.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="relative p-8 rounded-3xl bg-slate-50 border border-slate-200 hover:border-emerald-300 hover:shadow-lg transition-all group">
                <div class="w-14 h-14 rounded-2xl bg-emerald-500 text-white flex items-center justify-center text-2xl font-bold mb-6 shadow-md shadow-emerald-500/20 group-hover:scale-110 transition-transform">
                    2
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">2. Verifikasi & Bayar ke Warung</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Pengelola memverifikasi keaslian status mahasiswa lewat KTM. Setelah valid, admin membayarkan langsung makanan ke warung mitra via QRIS.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="relative p-8 rounded-3xl bg-slate-50 border border-slate-200 hover:border-sky-300 hover:shadow-lg transition-all group">
                <div class="w-14 h-14 rounded-2xl bg-sky-500 text-white flex items-center justify-center text-2xl font-bold mb-6 shadow-md shadow-sky-500/20 group-hover:scale-110 transition-transform">
                    3
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">3. Laporan Kas Terbuka</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Setiap rupiah donasi masuk dan pengeluaran dicatat secara otomatis dalam laporan transparansi yang dapat diakses publik setiap saat.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Transparansi Anggaran Ringkas (Mockup Page 15) -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
            <div>
                <h2 class="text-xs font-extrabold uppercase tracking-widest text-brand-600 mb-2">Transparansi Anggaran</h2>
                <h3 class="text-3xl font-extrabold text-slate-900 tracking-tight">Akuntabilitas Kas Nasi Darurat</h3>
            </div>
            <a href="{{ route('transparency') }}" class="mt-4 md:mt-0 inline-flex items-center text-sm font-bold text-brand-600 hover:text-brand-700">
                Buka Halaman Transparansi Lengkap <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <!-- Box 1: Dana Masuk -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-xs">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-lg mb-3">
                    <i class="fa-solid fa-arrow-down-long"></i>
                </div>
                <div class="text-xs font-semibold text-slate-500">Total Donasi Masuk</div>
                <div class="text-2xl font-black text-emerald-700 mt-1">
                    Rp {{ number_format($totalInflow, 0, ',', '.') }}
                </div>
            </div>

            <!-- Box 2: Dana Terpakai -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-xs">
                <div class="w-10 h-10 rounded-xl bg-rose-100 text-rose-600 flex items-center justify-center text-lg mb-3">
                    <i class="fa-solid fa-arrow-up-long"></i>
                </div>
                <div class="text-xs font-semibold text-slate-500">Total Bantuan Keluar</div>
                <div class="text-2xl font-black text-rose-700 mt-1">
                    Rp {{ number_format($totalOutflow, 0, ',', '.') }}
                </div>
            </div>

            <!-- Box 3: Sisa Saldo Kas -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-xs">
                <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-lg mb-3">
                    <i class="fa-solid fa-wallet"></i>
                </div>
                <div class="text-xs font-semibold text-slate-500">Sisa Saldo Kas Aktif</div>
                <div class="text-2xl font-black text-sky-800 mt-1">
                    Rp {{ number_format($currentBalance, 0, ',', '.') }}
                </div>
            </div>
        </div>

        <div class="bg-brand-50 border border-brand-200 rounded-2xl p-4 sm:p-6 flex flex-col sm:flex-row items-center justify-between">
            <div class="flex items-center space-x-3 mb-3 sm:mb-0">
                <i class="fa-solid fa-shield-halved text-brand-600 text-2xl"></i>
                <p class="text-xs sm:text-sm text-brand-900 font-medium">
                    Semua transaksi pengeluaran diverifikasi dengan struk dan QRIS warung. Privasi identitas KTM penerima terlindungi aman.
                </p>
            </div>
            <a href="{{ route('transparency') }}" class="px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-xs font-bold rounded-xl shrink-0 transition-colors">
                Pantau Laporan Kas
            </a>
        </div>
    </div>
</section>

<!-- Dokumentasi Penyaluran (Mockup Page 15) -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
            <div>
                <h2 class="text-xs font-extrabold uppercase tracking-widest text-brand-600 mb-2">Dokumentasi Kegiatan</h2>
                <h3 class="text-3xl font-extrabold text-slate-900 tracking-tight">Bukti Penyaluran Nyata</h3>
                <p class="text-slate-600 text-sm mt-1">Kegiatan berbagi nasi dan bantuan darurat di sekitar Purbalingga dan Purwokerto.</p>
            </div>
            <a href="{{ route('documentations.index') }}" class="mt-4 md:mt-0 inline-flex items-center text-sm font-bold text-brand-600 hover:text-brand-700">
                Lihat Semua Dokumentasi <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($documentations as $doc)
                <div class="group overflow-hidden rounded-3xl bg-slate-50 border border-slate-200 hover:shadow-xl transition-all">
                    <div class="h-48 bg-slate-200 overflow-hidden relative">
                        @if($doc->image_path && file_exists(public_path('storage/' . $doc->image_path)))
                            <img src="{{ asset('storage/' . $doc->image_path) }}" alt="{{ $doc->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-tr from-brand-100 to-amber-100 text-brand-600">
                                <i class="fa-solid fa-camera text-4xl mb-2"></i>
                                <span class="text-xs font-bold text-slate-500">Dokumentasi Penyaluran</span>
                            </div>
                        @endif
                        <div class="absolute bottom-3 left-3 bg-slate-900/80 text-white text-[11px] px-2.5 py-1 rounded-lg backdrop-blur-xs">
                            <i class="fa-regular fa-calendar mr-1"></i> {{ $doc->created_at->format('d M Y') }}
                        </div>
                    </div>
                    <div class="p-5">
                        <h4 class="font-bold text-slate-900 group-hover:text-brand-600 transition-colors line-clamp-1 mb-2">{{ $doc->title }}</h4>
                        <p class="text-slate-600 text-xs line-clamp-2 leading-relaxed">{{ $doc->description ?? 'Penyaluran bantuan makanan darurat mahasiswa oleh tim relawan SIDAPUR.' }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-slate-400">
                    <i class="fa-regular fa-image text-4xl mb-2"></i>
                    <p class="text-sm">Belum ada dokumentasi yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Artikel / Event (Mockup Page 15) -->
<section class="py-16 bg-slate-50 border-t border-slate-200/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
            <div>
                <h2 class="text-xs font-extrabold uppercase tracking-widest text-brand-600 mb-2">Kabar & Informasi</h2>
                <h3 class="text-3xl font-extrabold text-slate-900 tracking-tight">Artikel & Berita Terbaru</h3>
            </div>
            <a href="{{ route('articles.index') }}" class="mt-4 md:mt-0 inline-flex items-center text-sm font-bold text-brand-600 hover:text-brand-700">
                Lihat Semua Artikel <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($articles as $art)
                <article class="bg-white rounded-3xl border border-slate-200 overflow-hidden hover:shadow-lg transition-all flex flex-col justify-between">
                    <div>
                        <div class="h-44 bg-slate-100 relative">
                            @if($art->thumbnail && file_exists(public_path('storage/' . $art->thumbnail)))
                                <img src="{{ asset('storage/' . $art->thumbnail) }}" alt="{{ $art->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-tr from-amber-50 to-brand-100 flex items-center justify-center text-brand-500">
                                    <i class="fa-solid fa-newspaper text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <span class="text-[11px] font-bold text-brand-600 uppercase tracking-wider block mb-2">Kabar Gerakan</span>
                            <h4 class="text-lg font-bold text-slate-900 hover:text-brand-600 transition-colors line-clamp-2 mb-3">
                                <a href="{{ route('articles.show', $art->slug) }}">{{ $art->title }}</a>
                            </h4>
                            <p class="text-slate-600 text-xs line-clamp-3 leading-relaxed">
                                {{ Str::limit(strip_tags($art->content), 120) }}
                            </p>
                        </div>
                    </div>
                    <div class="px-6 pb-6 pt-2 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
                        <span><i class="fa-regular fa-clock mr-1"></i> {{ $art->created_at->format('d M Y') }}</span>
                        <a href="{{ route('articles.show', $art->slug) }}" class="font-bold text-brand-600 hover:underline">Baca Selengkapnya &rarr;</a>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-12 text-slate-400">
                    <p class="text-sm">Belum ada artikel yang diterbitkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Mitra & Kolaborasi (Mockup Page 15) -->
<section class="py-16 bg-white border-t border-slate-200/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-xs font-extrabold uppercase tracking-widest text-brand-600 mb-2">Kolaborasi Komunitas</h2>
            <h3 class="text-3xl font-extrabold text-slate-900 tracking-tight">Mitra Warung Makan & Pendukung</h3>
            <p class="text-slate-600 text-sm mt-2">Bekerjasama dengan warung makan lokal dan komunitas di Purbalingga serta Purwokerto.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-10">
            @forelse($partners as $partner)
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 text-center flex flex-col items-center justify-center hover:bg-brand-50/50 hover:border-brand-200 transition-colors">
                    <div class="w-12 h-12 rounded-full bg-white shadow-xs text-brand-500 flex items-center justify-center text-xl mb-3 border border-slate-100">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <div class="font-bold text-sm text-slate-800">{{ $partner->name }}</div>
                    <div class="text-[11px] text-slate-500 mt-1">Mitra Resmi SIDAPUR</div>
                </div>
            @empty
                <div class="col-span-4 text-center py-6 text-slate-400 text-sm">
                    Belum ada mitra resmi yang terdaftar.
                </div>
            @endforelse
        </div>

        <!-- Ajakan Kolaborasi Card -->
        <div class="bg-gradient-to-r from-slate-900 to-slate-800 text-white rounded-3xl p-8 sm:p-10 flex flex-col md:flex-row items-center justify-between shadow-xl">
            <div class="max-w-xl mb-6 md:mb-0">
                <h4 class="text-2xl font-bold mb-2">Punya Warung Makan atau Ingin Berkolaborasi?</h4>
                <p class="text-slate-300 text-sm leading-relaxed">
                    Kami membuka kesempatan kerjasama bagi pemilik warung makan, komunitas kampus, dan relawan di Purbalingga serta Purwokerto.
                </p>
            </div>
            <a href="{{ route('collaboration') }}" class="px-7 py-3.5 bg-brand-500 hover:bg-brand-600 text-white font-bold rounded-2xl shadow-lg shadow-brand-500/30 transition-all shrink-0">
                Ajukan Kolaborasi
            </a>
        </div>
    </div>
</section>

<!-- Ulasan Donatur & Penerima (Mockup Page 15) -->
<section class="py-16 bg-slate-50 border-t border-slate-200/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
            <div>
                <h2 class="text-xs font-extrabold uppercase tracking-widest text-brand-600 mb-2">Ulasan & Testimoni</h2>
                <h3 class="text-3xl font-extrabold text-slate-900 tracking-tight">Kata Mereka Tentang SIDAPUR</h3>
            </div>
            <div class="mt-4 md:mt-0 flex items-center space-x-3">
                <a href="{{ route('reviews.index') }}" class="px-5 py-2.5 bg-white border border-slate-200 text-slate-700 hover:text-brand-600 text-xs font-bold rounded-xl shadow-xs transition-colors">
                    Lihat Semua Ulasan
                </a>
                <a href="{{ route('reviews.index') }}#tulis-ulasan" class="px-5 py-2.5 bg-brand-500 hover:bg-brand-600 text-white text-xs font-bold rounded-xl shadow-md transition-colors">
                    <i class="fa-solid fa-pen-to-square mr-1"></i> Tulis Ulasan
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($reviews as $review)
                <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-xs flex flex-col justify-between">
                    <div>
                        <!-- Rating Stars -->
                        <div class="flex items-center text-amber-400 text-xs mb-3 space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= ($review->rating ?? 5) ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
                            @endfor
                            <span class="text-slate-400 text-xs font-semibold ml-2">({{ $review->rating ?? 5 }}/5)</span>
                        </div>
                        <p class="text-slate-600 text-sm leading-relaxed italic mb-4">
                            "{{ $review->comment }}"
                        </p>
                    </div>
                    <div class="flex items-center space-x-3 pt-4 border-t border-slate-100">
                        <div class="w-9 h-9 rounded-full bg-brand-100 text-brand-600 font-bold flex items-center justify-center text-xs">
                            {{ strtoupper(substr($review->user->name ?? 'U', 0, 1)) }}
                        </div>
                        <div>
                            <div class="text-xs font-bold text-slate-800">{{ $review->user->name ?? 'Anonim' }}</div>
                            <div class="text-[10px] text-slate-400 capitalize">{{ $review->user->role ?? 'User' }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-slate-400">
                    <p class="text-sm">Belum ada ulasan yang ditampilkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
