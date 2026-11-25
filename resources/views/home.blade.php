@extends('layouts.app')

@section('title', 'SIDAPUR - Kebaikan dalam Seporsi Nasi')

@section('content')

<!-- Hero Section (Figma 1:1) -->
<section class="w-full bg-[#EAEFE8] pt-12 pb-16 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Hero Left: Copy & Actions -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Penanda / Pill Badge -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-[#DEE4DC] shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-[#2A6046] animate-pulse"></span>
                    <span class="text-xs font-black tracking-wider text-[#2A6046] uppercase">DARI KITA, UNTUK SESAMA</span>
                </div>

                <!-- Judul Utama -->
                <h1 class="text-4xl sm:text-5xl lg:text-[52px] font-black leading-[1.12] tracking-tight text-[#1F3B2E]">
                    Khusus Mahasiswa Area Purbalingga & Purwokerto
                </h1>

                <!-- Deskripsi Pengantar -->
                <p class="text-base sm:text-lg text-[#5F6A64] leading-relaxed max-w-xl">
                    Bersama Nasi Darurat, hadirkan makanan layak bagi mereka yang membutuhkan. Karena tak seorang pun seharusnya melewati hari dengan lapar.
                </p>

                <!-- Tindakan Utama (Tombol CTA) -->
                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="{{ route('aid.create') }}" class="px-7 py-3.5 bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-[15px] font-bold rounded-[8px] shadow-sm transition flex items-center gap-2.5">
                        <span>Ajukan Bantuan</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <a href="{{ route('donation.create') }}" class="px-7 py-3.5 bg-white hover:bg-gray-50 text-[#2A6046] border border-[#DEE4DC] text-[15px] font-bold rounded-[8px] shadow-sm transition flex items-center gap-2">
                        <i data-lucide="heart" class="w-4 h-4 text-[#2A6046]"></i>
                        <span>Bantu Donasi</span>
                    </a>
                </div>

                <!-- Kepercayaan Donasi -->
                <div class="flex items-center gap-2.5 pt-2 text-xs font-semibold text-[#5F6A64]">
                    <i data-lucide="shield-check" class="w-4 h-4 text-[#2A6046]"></i>
                    <span>Penyaluran terdokumentasi. Penggunaan dana terbuka.</span>
                </div>
            </div>

            <!-- Hero Right: Momen Berbagi (Card Visual) -->
            <div class="lg:col-span-5">
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-xl border border-[#DEE4DC] p-3 sm:p-4">
                    <!-- Photo Header Banner -->
                    <div class="w-full h-64 sm:h-72 rounded-xl bg-gradient-to-tr from-[#1F3B2E] via-[#2A6046] to-[#427C5D] flex flex-col justify-end p-6 text-white relative overflow-hidden">
                        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
                        <div class="relative z-10 space-y-2">
                            <span class="inline-block px-2.5 py-1 bg-white/20 backdrop-blur-sm rounded text-[11px] font-bold uppercase tracking-wider text-white">
                                Dapur Komunitas
                            </span>
                            <h3 class="text-2xl font-black leading-snug">Hangatnya berbagi, dekat di hati.</h3>
                            <p class="text-xs text-white/80">Gambaran kegiatan dapur relawan & warung makan mitra di Purwokerto dan Purbalingga.</p>
                        </div>
                    </div>

                    <!-- Highlighted Activity Card Box -->
                    <div class="mt-4 p-4 rounded-xl bg-[#EAEFE8] border border-[#DEE4DC] flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-[#2A6046] text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                            <i data-lucide="hand-heart" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-[#2A6046]">Gotong Royong Bersama</p>
                            <p class="text-sm font-black text-[#1F3B2E]">Membantu Tanpa Menghakimi</p>
                            <p class="text-xs text-[#5F6A64] mt-0.5">Semua mahasiswa yang membutuhkan berhak mendapatkan makanan layak.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Gambaran Dampak (Impact Counters) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-12 pt-8 border-t border-[#DEE4DC]">
            <div class="bg-white p-6 rounded-xl border border-[#DEE4DC] flex items-center justify-between">
                <div>
                    <p class="text-3xl sm:text-4xl font-black text-[#1F3B2E] tracking-tight">
                        {{ number_format($totalRecipients ?? 12480, 0, ',', '.') }}
                    </p>
                    <p class="text-sm font-bold text-[#5F6A64] mt-1">Donasi porsi nasi tersalurkan</p>
                </div>
                <div class="w-12 h-12 rounded-lg bg-[#EAEFE8] text-[#2A6046] flex items-center justify-center">
                    <i data-lucide="utensils" class="w-6 h-6"></i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl border border-[#DEE4DC] flex items-center justify-between">
                <div>
                    <p class="text-3xl sm:text-4xl font-black text-[#1F3B2E] tracking-tight">
                        {{ number_format($totalDonors ?? 840, 0, ',', '.') }}
                    </p>
                    <p class="text-sm font-bold text-[#5F6A64] mt-1">Donatur ikut berbagi kebaikan</p>
                </div>
                <div class="w-12 h-12 rounded-lg bg-[#EAEFE8] text-[#2A6046] flex items-center justify-center">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Section: Tentang Program SIDAPUR (Figma 1:1) -->
<section class="w-full bg-white py-20 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Card Visual -->
            <div class="lg:col-span-5 order-2 lg:order-1">
                <div class="p-6 bg-[#EAEFE8] rounded-2xl border border-[#DEE4DC] space-y-5">
                    <div class="h-56 rounded-xl bg-gradient-to-br from-[#2A6046] to-[#1F3B2E] p-6 text-white flex flex-col justify-between">
                        <span class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                            <i data-lucide="sparkles" class="w-5 h-5 text-white"></i>
                        </span>
                        <div>
                            <span class="text-xs uppercase font-bold text-white/70 tracking-wider">Misi Kemanusiaan</span>
                            <h4 class="text-xl font-black mt-1">Seporsi Makanan, Sebuah Kepedulian</h4>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="p-3.5 bg-white rounded-lg border border-[#DEE4DC] flex items-center gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-[#2A6046] flex-shrink-0"></i>
                            <span class="text-xs sm:text-sm font-bold text-[#1F3B2E]">Verifikasi identitas mahasiswa tepat sasaran</span>
                        </div>
                        <div class="p-3.5 bg-white rounded-lg border border-[#DEE4DC] flex items-center gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-[#2A6046] flex-shrink-0"></i>
                            <span class="text-xs sm:text-sm font-bold text-[#1F3B2E]">Kerahasiaan data pemohon dijaga sepenuhnya</span>
                        </div>
                        <div class="p-3.5 bg-white rounded-lg border border-[#DEE4DC] flex items-center gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-[#2A6046] flex-shrink-0"></i>
                            <span class="text-xs sm:text-sm font-bold text-[#1F3B2E]">Pencatatan kas 100% transparan dan terbuka</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Content -->
            <div class="lg:col-span-7 order-1 lg:order-2 space-y-6">
                <div class="inline-block text-xs font-black tracking-widest text-[#2A6046] uppercase">
                    TENTANG SIDAPUR
                </div>
                <h2 class="text-3xl sm:text-4xl font-black leading-tight text-[#1F3B2E]">
                    Bukan sekadar memberi makan. Kita saling menguatkan.
                </h2>
                <p class="text-base sm:text-lg text-[#5F6A64] leading-relaxed">
                    Nasi Darurat mempertemukan kepedulian donatur dengan kebutuhan pangan mahasiswa. Bersama relawan dan dapur komunitas, kita menyiapkan, menyalurkan, dan mendokumentasikan setiap langkah kebaikan secara nyata.
                </p>
                <p class="text-sm text-[#5F6A64] leading-relaxed">
                    Dirintis di Purbalingga sejak Februari 2024 dan kini meluas ke Purwokerto, SIDAPUR lahir dari pengalaman nyata betapa beratnya berhemat hingga menahan lapar ketika kiriman uang terlambat.
                </p>
                <div class="pt-2">
                    <a href="{{ route('about') }}" class="inline-flex items-center gap-2 text-[15px] font-bold text-[#2A6046] hover:text-[#1F3B2E] transition group">
                        <span>Lebih dekat dengan kami</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Section: Alur Berbagi (3 Langkah - Figma 1:1) -->
<section class="w-full bg-[#EAEFE8] py-20 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Bagian -->
        <div class="text-center max-w-2xl mx-auto space-y-3 mb-14">
            <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                SEDERHANA, BERMAKNA
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#1F3B2E] tracking-tight">
                Dari niat baik, sampai ke meja makan.
            </h2>
            <p class="text-sm sm:text-base text-[#5F6A64]">
                Alur bantuan didesain cepat, mudah, dan akuntabel dari donatur hingga dinikmati mahasiswa.
            </p>
        </div>

        <!-- 3 Kartu Langkah -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Langkah 01 -->
            <div class="bg-white p-8 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-4 hover:border-[#2A6046] transition">
                <div class="w-12 h-12 rounded-xl bg-[#EAEFE8] text-[#2A6046] font-black text-lg flex items-center justify-center">
                    01
                </div>
                <h3 class="text-xl font-black text-[#1F3B2E]">Pilih & berdonasi</h3>
                <p class="text-sm text-[#5F6A64] leading-relaxed">
                    Temukan program, tentukan nominal donasi sesuai keikhlasan, dan pilih metode pembayaran (QRIS atau transfer bank).
                </p>
            </div>

            <!-- Langkah 02 -->
            <div class="bg-white p-8 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-4 hover:border-[#2A6046] transition">
                <div class="w-12 h-12 rounded-xl bg-[#EAEFE8] text-[#2A6046] font-black text-lg flex items-center justify-center">
                    02
                </div>
                <h3 class="text-xl font-black text-[#1F3B2E]">Kami siapkan dana</h3>
                <p class="text-sm text-[#5F6A64] leading-relaxed">
                    Admin SIDAPUR menyiapkan dan menyalurkan dana untuk membayar porsi makanan mahasiswa penerima manfaat secara berkala.
                </p>
            </div>

            <!-- Langkah 03 -->
            <div class="bg-white p-8 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-4 hover:border-[#2A6046] transition">
                <div class="w-12 h-12 rounded-xl bg-[#EAEFE8] text-[#2A6046] font-black text-lg flex items-center justify-center">
                    03
                </div>
                <h3 class="text-xl font-black text-[#1F3B2E]">Ikuti kabar kebaikannya</h3>
                <p class="text-sm text-[#5F6A64] leading-relaxed">
                    Penyaluran terdokumentasi dan seluruh transaksi dicatat dalam halaman transparansi yang dapat dipantau siapa saja.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- Section: Transparansi Publik Ringkas (Figma 1:1) -->
<section class="w-full bg-white py-20 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div class="space-y-3">
                <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                    TERBUKA UNTUK DIPERCAYA
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#1F3B2E] tracking-tight">
                    Setiap rupiah punya cerita.
                </h2>
                <p class="text-sm sm:text-base text-[#5F6A64] max-w-xl">
                    Keterbukaan adalah pondasi amanah. Pantau ringkasan pemasukan, penyaluran makanan, dan saldo kas operasional SIDAPUR.
                </p>
            </div>
            <div>
                <a href="{{ route('transparency') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-[#EAEFE8] hover:bg-[#DEE4DC] text-[#2A6046] text-sm font-bold rounded-lg transition">
                    <span>Laporan Lengkap & Transaksi</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>

        <!-- 3 Kartu Keuangan Figma -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Masuk -->
            <div class="p-6 rounded-2xl bg-[#EAEFE8] border border-[#DEE4DC] space-y-2">
                <p class="text-xs font-bold text-[#5F6A64] uppercase tracking-wider">Total Donasi Terkumpul</p>
                <p class="text-3xl sm:text-4xl font-black text-[#1F3B2E]">
                    Rp {{ number_format($inflow ?? 48000000, 0, ',', '.') }}
                </p>
                <p class="text-xs text-[#2A6046] font-semibold flex items-center gap-1 pt-1">
                    <i data-lucide="arrow-up-right" class="w-4 h-4"></i> Dari donatur perorangan & komunitas
                </p>
            </div>

            <!-- Total Tersalurkan -->
            <div class="p-6 rounded-2xl bg-[#EAEFE8] border border-[#DEE4DC] space-y-2">
                <p class="text-xs font-bold text-[#5F6A64] uppercase tracking-wider">Dana Tersalurkan</p>
                <p class="text-3xl sm:text-4xl font-black text-[#1F3B2E]">
                    Rp {{ number_format($outflow ?? 39600000, 0, ',', '.') }}
                </p>
                <p class="text-xs text-[#5F6A64] font-semibold flex items-center gap-1 pt-1">
                    <i data-lucide="check" class="w-4 h-4 text-[#2A6046]"></i> Dialokasikan untuk porsi makan mahasiswa
                </p>
            </div>

            <!-- Saldo Kas -->
            <div class="p-6 rounded-2xl bg-white border-2 border-[#2A6046] shadow-sm space-y-2">
                <p class="text-xs font-bold text-[#2A6046] uppercase tracking-wider">Saldo Kas Operasional</p>
                <p class="text-3xl sm:text-4xl font-black text-[#2A6046]">
                    Rp {{ number_format($balance ?? 8400000, 0, ',', '.') }}
                </p>
                <p class="text-xs text-[#5F6A64] font-semibold flex items-center gap-1 pt-1">
                    <i data-lucide="shield" class="w-4 h-4 text-[#2A6046]"></i> Siap disalurkan untuk kebutuhan darurat
                </p>
            </div>
        </div>

        <!-- Penyaluran Bantuan per Kampus (Progress Bar Breakdown dari Figma) -->
        <div class="p-8 bg-[#F4F7F3] rounded-2xl border border-[#DEE4DC] space-y-6">
            <div>
                <h3 class="text-xl font-black text-[#1F3B2E]">Distribusi Penyaluran Bantuan per Kampus</h3>
                <p class="text-xs sm:text-sm text-[#5F6A64] mt-1">
                    Sebaran alokasi bantuan makanan darurat bagi rekan mahasiswa di perguruan tinggi Purwokerto & Purbalingga.
                </p>
            </div>

            <div class="space-y-4">
                @foreach($campusDistribution as $campus)
                <div class="space-y-1.5">
                    <div class="flex items-center justify-between text-xs sm:text-sm font-bold">
                        <span class="text-[#1F3B2E] truncate pr-4">{{ $campus['name'] }}</span>
                        <span class="text-[#2A6046] flex-shrink-0">
                            Rp {{ number_format($campus['amount'], 0, ',', '.') }} <span class="text-[#5F6A64] font-normal">({{ $campus['percent'] }}%)</span>
                        </span>
                    </div>
                    <!-- Bar -->
                    <div class="w-full h-3 bg-white border border-[#DEE4DC] rounded-full overflow-hidden">
                        <div class="h-full bg-[#2A6046] rounded-full" style="width: {{ $campus['percent'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

<!-- Section: Suara Kebaikan (Testimoni Komunitas - Figma 1:1) -->
<section class="w-full bg-[#EAEFE8] py-20 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <div class="text-center max-w-2xl mx-auto space-y-3">
            <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                SUARA KEBAIKAN
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#1F3B2E] tracking-tight">
                Yang terasa, bukan hanya yang tercatat.
            </h2>
            <p class="text-sm sm:text-base text-[#5F6A64]">
                Ulasan dan refleksi dari donatur, relawan dapur, dan rekan mahasiswa penerima manfaat.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($reviews as $review)
            <div class="bg-white p-7 rounded-2xl border border-[#DEE4DC] shadow-sm flex flex-col justify-between space-y-6">
                <div class="space-y-3">
                    <div class="text-amber-500 text-sm tracking-wider">
                        ★★★★★
                    </div>
                    <p class="text-sm text-[#2B3A33] leading-relaxed italic">
                        “{{ $review['comment'] }}”
                    </p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-[#DEE4DC]">
                    <div class="w-10 h-10 rounded-full bg-[#2A6046] text-white font-bold text-xs flex items-center justify-center flex-shrink-0">
                        {{ $review['initials'] }}
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#1F3B2E]">{{ $review['name'] }}</p>
                        <p class="text-xs text-[#5F6A64]">{{ $review['role'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Section: Ajakan Kolaborasi & Donasi (Bottom Banner) -->
<section class="w-full bg-[#2A6046] py-16 text-white">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h2 class="text-3xl sm:text-4xl font-black tracking-tight max-w-2xl mx-auto">
            Mari Bersama Hadirkan Kebaikan dalam Seporsi Nasi
        </h2>
        <p class="text-base text-white/80 max-w-xl mx-auto">
            Dukungan sekecil apa pun dari Anda adalah harapan besar bagi rekan mahasiswa yang sedang berjuang di rantau.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
            <a href="{{ route('donation.create') }}" class="px-8 py-3.5 bg-white hover:bg-gray-100 text-[#2A6046] text-sm font-bold rounded-[8px] shadow transition">
                Bantu Donasi Sekarang
            </a>
            <a href="{{ route('contact') }}" class="px-8 py-3.5 bg-transparent hover:bg-white/10 text-white border border-white/50 text-sm font-bold rounded-[8px] transition">
                Hubungi Relawan
            </a>
        </div>
    </div>
</section>

@endsection
