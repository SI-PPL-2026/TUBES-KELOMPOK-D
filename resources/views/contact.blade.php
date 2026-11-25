@extends('layouts.app')

@section('title', 'Hubungi Kami - SIDAPUR')

@section('content')

<!-- Header & Breadcrumb -->
<section class="w-full bg-[#EAEFE8] pt-10 pb-16 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs sm:text-sm text-[#5F6A64]">
            <a href="{{ route('home') }}" class="hover:text-[#2A6046] transition">Beranda</a>
            <span>›</span>
            <span class="font-bold text-[#2A6046]">Hubungi kami</span>
        </nav>

        <div class="space-y-3 max-w-3xl">
            <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                KOMUNIKASI TERBUKA
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#1F3B2E] tracking-tight leading-tight">
                Ada yang ingin ditanyakan? Mari berbincang.
            </h1>
            <p class="text-base sm:text-lg text-[#5F6A64] leading-relaxed">
                Punya pertanyaan mengenai alur bantuan, ingin bergabung menjadi relawan, atau menawarkan kemitraan warung makan? Pintu kami selalu terbuka.
            </p>
        </div>

    </div>
</section>

<!-- Section Kanal Kontak & Form (Figma 1:1) -->
<section class="w-full bg-white py-16 sm:py-20 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Kanal Kontak (Left) -->
            <div class="lg:col-span-5 space-y-6">
                <div>
                    <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                        KANAL RESMI
                    </span>
                    <h2 class="text-2xl font-black text-[#1F3B2E] mt-1">
                        Kanal Kontak Kami
                    </h2>
                    <p class="text-sm text-[#5F6A64] mt-1">
                        Hubungi kami melalui saluran berikut untuk mendapatkan respons cepat dari tim relawan.
                    </p>
                </div>

                <div class="space-y-4">
                    <!-- WhatsApp -->
                    <div class="p-5 rounded-2xl bg-[#EAEFE8] border border-[#DEE4DC] flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-[#2A6046] text-white flex items-center justify-center flex-shrink-0">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase text-[#5F6A64]">WhatsApp Pengelola</p>
                            <p class="text-base font-black text-[#1F3B2E] mt-0.5">+62 812-3456-7890</p>
                            <p class="text-xs text-[#5F6A64] mt-0.5">Senin - Minggu (08.00 - 21.00 WIB)</p>
                        </div>
                    </div>

                    <!-- Instagram -->
                    <div class="p-5 rounded-2xl bg-[#EAEFE8] border border-[#DEE4DC] flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-[#2A6046] text-white flex items-center justify-center flex-shrink-0">
                            <i data-lucide="instagram" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase text-[#5F6A64]">Instagram Resmi</p>
                            <p class="text-base font-black text-[#1F3B2E] mt-0.5">@nasidarurat_pbg</p>
                            <p class="text-xs text-[#5F6A64] mt-0.5">Dokumentasi & kabar kegiatan harian</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="p-5 rounded-2xl bg-[#EAEFE8] border border-[#DEE4DC] flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-[#2A6046] text-white flex items-center justify-center flex-shrink-0">
                            <i data-lucide="mail" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase text-[#5F6A64]">Email Dukungan</p>
                            <p class="text-base font-black text-[#1F3B2E] mt-0.5">kontak@sidapur.id</p>
                            <p class="text-xs text-[#5F6A64] mt-0.5">Pertanyaan resmi & kemitraan institusi</p>
                        </div>
                    </div>

                    <!-- Lokasi Operasional -->
                    <div class="p-5 rounded-2xl bg-[#EAEFE8] border border-[#DEE4DC] flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-[#2A6046] text-white flex items-center justify-center flex-shrink-0">
                            <i data-lucide="map-pin" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase text-[#5F6A64]">Area Jangkauan</p>
                            <p class="text-base font-black text-[#1F3B2E] mt-0.5">Purbalingga & Purwokerto</p>
                            <p class="text-xs text-[#5F6A64] mt-0.5">Dapur relawan & warung makan mitra kampus</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulir Kirim Pesan (Right) -->
            <div class="lg:col-span-7">
                <div class="bg-white p-8 sm:p-10 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-6">
                    <div>
                        <h3 class="text-2xl font-black text-[#1F3B2E]">Kirim Pesan Langsung</h3>
                        <p class="text-xs sm:text-sm text-[#5F6A64] mt-1">
                            Isi formulir di bawah ini dan kami akan membalas pesan Anda sesegera mungkin.
                        </p>
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf
                        
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                Nama Lengkap <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="name" required placeholder="Contoh: Budi Santoso"
                                class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                    Nomor WhatsApp <span class="text-rose-500">*</span>
                                </label>
                                <input type="tel" name="whatsapp" required placeholder="0812 3456 7890"
                                    class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                    Email
                                </label>
                                <input type="email" name="email" placeholder="nama@email.com"
                                    class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                Keperluan / Kategori <span class="text-rose-500">*</span>
                            </label>
                            <select name="category" required class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                                <option value="Pertanyaan Umum">Pertanyaan Umum Seputar SIDAPUR</option>
                                <option value="Kemitraan Warung">Kemitraan Warung Makan Mitra</option>
                                <option value="Relawan">Gabung Menjadi Relawan Dapur</option>
                                <option value="Donasi Khusus">Konfirmasi Donasi Khusus / CSR</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                Pesan <span class="text-rose-500">*</span>
                            </label>
                            <textarea name="message" rows="4" required placeholder="Tuliskan pesan atau pertanyaan Anda di sini..."
                                class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition"></textarea>
                        </div>

                        <button type="submit" class="w-full py-4 bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-[15px] font-bold rounded-xl shadow-sm transition flex items-center justify-center gap-2">
                            <span>Kirim Pesan</span>
                            <i data-lucide="send" class="w-4 h-4"></i>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
