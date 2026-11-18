@extends('layouts.app')

@section('title', 'Tentang Kami - SIDAPUR')

@section('content')

<!-- Header & Breadcrumb -->
<section class="w-full bg-[#EAEFE8] pt-10 pb-16 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs sm:text-sm text-[#5F6A64]">
            <a href="{{ route('home') }}" class="hover:text-[#2A6046] transition">Beranda</a>
            <span>›</span>
            <span class="font-bold text-[#2A6046]">Tentang kami</span>
        </nav>

        <div class="space-y-3 max-w-3xl">
            <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                GERAKAN GOTONG ROYONG PANGAN
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#1F3B2E] tracking-tight leading-tight">
                Tentang Nasi Darurat Purbalingga & Purwokerto
            </h1>
            <p class="text-base sm:text-lg text-[#5F6A64] leading-relaxed">
                Inisiatif kepedulian bersama untuk menjamin ketersediaan pangan darurat bagi rekan-rekan mahasiswa dan pelajar perantau di Barlingmascakeb.
            </p>
        </div>

        <!-- 3 Milestone Box dari Figma -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4">
            <div class="bg-white p-6 rounded-xl border border-[#DEE4DC] shadow-sm space-y-1">
                <span class="text-xs font-bold text-[#5F6A64] uppercase tracking-wider">Awal Bergerak</span>
                <p class="text-3xl font-black text-[#1F3B2E]">Feb 2024</p>
                <p class="text-xs text-[#5F6A64]">Mulai melayani permintaan pertama</p>
            </div>

            <div class="bg-white p-6 rounded-xl border border-[#DEE4DC] shadow-sm space-y-1">
                <span class="text-xs font-bold text-[#5F6A64] uppercase tracking-wider">Modal Awal Patungan</span>
                <p class="text-3xl font-black text-[#1F3B2E]">Rp25.000</p>
                <p class="text-xs text-[#5F6A64]">Gotong royong pertama para relawan</p>
            </div>

            <div class="bg-white p-6 rounded-xl border border-[#DEE4DC] shadow-sm space-y-1">
                <span class="text-xs font-bold text-[#5F6A64] uppercase tracking-wider">Cakupan Wilayah</span>
                <p class="text-3xl font-black text-[#1F3B2E]">2 Kota</p>
                <p class="text-xs text-[#5F6A64]">Purbalingga & Purwokerto</p>
            </div>
        </div>

    </div>
</section>

<!-- Narasi Cerita & Latar Belakang (Figma 1:1) -->
<section class="w-full bg-white py-16 sm:py-20 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- Baris 1: Dari Pengalaman Kos -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-7 space-y-5">
                <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                    LATAR BELAKANG
                </span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#1F3B2E] leading-tight">
                    Dari pengalaman kos yang kekurangan, lahir tekad agar tak ada yang lapar.
                </h2>
                <div class="space-y-4 text-sm sm:text-base text-[#5F6A64] leading-relaxed">
                    <p>
                        Nasi Darurat Purbalingga adalah program bantuan makanan darurat yang dirintis sejak Februari 2024. Inisiatif ini bermula dari pengalaman pribadi sang pendiri yang pernah merasakan sulitnya indekos di Purwokerto—ketika kiriman dari orang tua terlambat, ongkos habis, dan harus mengencangkan ikat pinggang hingga melewatkan waktu makan.
                    </p>
                    <p>
                        Dari keprihatinan tersebut, muncul tekad sederhana: <em>jangan sampai ada lagi mahasiswa atau pelajar di Purbalingga dan Purwokerto yang harus menahan lapar demi bertahan hidup di tanah rantau</em>.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="p-8 rounded-2xl bg-[#EAEFE8] border border-[#DEE4DC] space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-[#2A6046] text-white flex items-center justify-center">
                        <i data-lucide="heart" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-black text-[#1F3B2E]">Nilai Utama Kami</h3>
                    <p class="text-sm text-[#5F6A64] leading-relaxed">
                        Kami percaya bahwa makan layak adalah hak dasar manusia, bukan kemewahan. Pendidikan tidak boleh terputus atau terganggu hanya karena perut yang kosong.
                    </p>
                </div>
            </div>
        </div>

        <!-- Baris 2: Tumbuh Bersama Donatur -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-5 order-2 lg:order-1">
                <div class="p-8 rounded-2xl bg-[#F4F7F3] border border-[#DEE4DC] space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-[#2A6046] text-white flex items-center justify-center">
                        <i data-lucide="repeat" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-black text-[#1F3B2E]">Dari WhatsApp ke SIDAPUR</h3>
                    <p class="text-sm text-[#5F6A64] leading-relaxed">
                        Dahulu seluruh permintaan dilayani manual satu demi satu via WhatsApp. Dengan hadirnya sistem informasi SIDAPUR, antrean tersusun rapi, identitas terverifikasi, dan laporan kas tercatat secara otomatis.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-7 order-1 lg:order-2 space-y-5">
                <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                    TRANSFORMASI SISTEM
                </span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#1F3B2E] leading-tight">
                    Bantuan yang tumbuh seiring dukungan para donatur.
                </h2>
                <div class="space-y-4 text-sm sm:text-base text-[#5F6A64] leading-relaxed">
                    <p>
                        Awalnya bantuan hanya mampu melayani segelintir rekan terdekat. Namun berkat kebaikan ratusan donatur dari berbagai kota, jangkauan program ini terus meluas ke lebih dari 10 perguruan tinggi dan akademi di Purbalingga dan Purwokerto.
                    </p>
                    <p>
                        Kami bekerja sama langsung dengan warung-warung makan di sekitar area kampus, sehingga mahasiswa penerima manfaat dapat mengambil makanan hangat yang sehat dan bernutrisi secara bermartabat.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Section: 4 Fitur Layanan Program (Figma 1:1) -->
<section class="w-full bg-[#EAEFE8] py-16 sm:py-20 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <div class="text-center max-w-2xl mx-auto space-y-3">
            <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                STANDAR LAYANAN
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#1F3B2E] tracking-tight">
                Daftar Fitur Layanan SIDAPUR
            </h2>
            <p class="text-sm sm:text-base text-[#5F6A64]">
                Komitmen kami dalam mengelola amanah donatur dan melayani mahasiswa secara cepat dan terhormat.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="bg-white p-7 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-lg bg-[#EAEFE8] text-[#2A6046] flex items-center justify-center">
                    <i data-lucide="lock" class="w-5 h-5"></i>
                </div>
                <h3 class="text-lg font-black text-[#1F3B2E]">Privasi Terjaga</h3>
                <p class="text-xs sm:text-sm text-[#5F6A64] leading-relaxed">
                    Nama dan identitas pemohon bantuan tidak pernah dipublikasikan secara umum. Kami menjaga harga diri rekan mahasiswa.
                </p>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-lg bg-[#EAEFE8] text-[#2A6046] flex items-center justify-center">
                    <i data-lucide="badge-check" class="w-5 h-5"></i>
                </div>
                <h3 class="text-lg font-black text-[#1F3B2E]">Verifikasi KTM</h3>
                <p class="text-xs sm:text-sm text-[#5F6A64] leading-relaxed">
                    Validasi kartu tanda mahasiswa untuk memastikan bantuan diterima oleh pihak yang benar-benar aktif dan membutuhkan.
                </p>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-lg bg-[#EAEFE8] text-[#2A6046] flex items-center justify-center">
                    <i data-lucide="store" class="w-5 h-5"></i>
                </div>
                <h3 class="text-lg font-black text-[#1F3B2E]">Mitra Warung Lokal</h3>
                <p class="text-xs sm:text-sm text-[#5F6A64] leading-relaxed">
                    Memberdayakan warung makan di sekitar kampus sehingga roda ekonomi UMKM setempat ikut bergerak bersama kebaikan ini.
                </p>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-lg bg-[#EAEFE8] text-[#2A6046] flex items-center justify-center">
                    <i data-lucide="file-text" class="w-5 h-5"></i>
                </div>
                <h3 class="text-lg font-black text-[#1F3B2E]">Transparansi Kas</h3>
                <p class="text-xs sm:text-sm text-[#5F6A64] leading-relaxed">
                    Setiap rupiah donasi yang masuk dan keluar dicatat secara terpusat dan dapat diaudit secara terbuka oleh publik.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- Call to action -->
<section class="w-full bg-white py-14">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[#2A6046] rounded-2xl p-8 sm:p-12 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-sm">
            <div class="space-y-2 text-center sm:text-left">
                <h3 class="text-2xl sm:text-3xl font-black">Butuh Bantuan atau Mau Berdonasi?</h3>
                <p class="text-sm text-white/80 max-w-lg">Pintu kebaikan selalu terbuka. Mari ambil peran demi generasi muda yang lebih kuat.</p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('aid.create') }}" class="px-6 py-3 bg-white text-[#2A6046] font-bold text-sm rounded-lg hover:bg-gray-100 transition">
                    Ajukan Bantuan
                </a>
                <a href="{{ route('donation.create') }}" class="px-6 py-3 bg-[#1F3B2E] text-white font-bold text-sm rounded-lg hover:bg-black transition">
                    Bantu Donasi
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
