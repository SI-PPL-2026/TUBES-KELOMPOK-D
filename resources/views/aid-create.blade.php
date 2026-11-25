@extends('layouts.app')

@section('title', 'Ajukan Bantuan - SIDAPUR')

@section('content')

<!-- Header & Breadcrumb -->
<section class="w-full bg-[#EAEFE8] pt-10 pb-16 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs sm:text-sm text-[#5F6A64]">
            <a href="{{ route('home') }}" class="hover:text-[#2A6046] transition">Beranda</a>
            <span>›</span>
            <span class="font-bold text-[#2A6046]">Ajukan Bantuan</span>
        </nav>

        <div class="space-y-3 max-w-3xl">
            <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                KHUSUS MAHASISWA & PELAJAR AREA PURBALINGGA & PURWOKERTO
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#1F3B2E] tracking-tight leading-tight">
                Ajukan Bantuan Nasi Darurat
            </h1>
            <p class="text-base sm:text-lg text-[#5F6A64] leading-relaxed">
                Kami siap membantu rekan mahasiswa yang sedang mengalami kesulitan makan atau kehabisan uang di akhir bulan. Jangan ragu, kita saling menguatkan.
            </p>
        </div>

    </div>
</section>

<!-- Formulir Pengajuan (Figma 1:1) -->
<section class="w-full bg-white py-16 sm:py-20 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left Info & Ketentuan -->
            <div class="lg:col-span-5 space-y-6">
                
                <!-- Notice Banner Kerahasiaan -->
                <div class="p-6 rounded-2xl bg-[#EAEFE8] border border-[#DEE4DC] space-y-3">
                    <div class="w-10 h-10 rounded-xl bg-[#2A6046] text-white flex items-center justify-center">
                        <i data-lucide="shield-check" class="w-5 h-5"></i>
                    </div>
                    <h3 class="text-lg font-black text-[#1F3B2E]">Privasi Anda 100% Terjaga</h3>
                    <p class="text-xs sm:text-sm text-[#5F6A64] leading-relaxed">
                        Data diri, foto identitas, dan alasan pengajuan hanya dapat diakses oleh tim verifikator internal SIDAPUR dan tidak akan pernah dibagikan kepada publik.
                    </p>
                </div>

                <!-- Cakupan & Syarat Program -->
                <div class="p-6 rounded-2xl bg-[#F4F7F3] border border-[#DEE4DC] space-y-4">
                    <h4 class="text-base font-black text-[#1F3B2E]">Syarat & Ketentuan Pemohon:</h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm text-[#5F6A64]">
                        <li class="flex items-start gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-[#2A6046] flex-shrink-0 mt-0.5"></i>
                            <span>Mahasiswa aktif / anak rantau di wilayah Purbalingga atau Purwokerto.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-[#2A6046] flex-shrink-0 mt-0.5"></i>
                            <span>Memiliki KTM (Kartu Tanda Mahasiswa) aktif sebagai bukti identitas.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-[#2A6046] flex-shrink-0 mt-0.5"></i>
                            <span>Sedang benar-benar berada dalam kondisi darurat pangan / kehabisan bekal.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-[#2A6046] flex-shrink-0 mt-0.5"></i>
                            <span>Bantuan disalurkan dalam bentuk kupon / porsi makan di warung mitra terdekat.</span>
                        </li>
                    </ul>
                </div>

                <!-- Kontak Bantuan Cepat -->
                <div class="p-5 rounded-2xl border border-[#DEE4DC] flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-[#EAEFE8] text-[#2A6046] flex items-center justify-center flex-shrink-0">
                        <i data-lucide="help-circle" class="w-5 h-5"></i>
                    </div>
                    <div class="text-xs sm:text-sm">
                        <span class="text-[#5F6A64] block">Butuh bantuan mendesak hari ini?</span>
                        <a href="https://wa.me/6281234567890" target="_blank" class="font-bold text-[#2A6046] hover:underline">
                            Chat Admin via WhatsApp ↗
                        </a>
                    </div>
                </div>

            </div>

            <!-- Right: Formulir Isian (Figma Form) -->
            <div class="lg:col-span-7">
                <div class="bg-white p-8 sm:p-10 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-6">
                    <div>
                        <h3 class="text-2xl font-black text-[#1F3B2E]">Formulir Pengajuan Bantuan</h3>
                        <p class="text-xs sm:text-sm text-[#5F6A64] mt-1">
                            Mohon isi data dengan jujur dan lengkap agar verifikasi dapat diproses segera.
                        </p>
                    </div>

                    <form action="{{ route('aid.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        
                        <!-- Nama Lengkap -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                Nama Lengkap <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="name" required placeholder="Nama lengkap sesuai identitas mahasiswa"
                                class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                        </div>

                        <!-- Nomor WhatsApp -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                Nomor WhatsApp Aktif <span class="text-rose-500">*</span>
                            </label>
                            <input type="tel" name="whatsapp" required placeholder="Contoh: 0812 3456 7890"
                                class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                            <span class="text-[11px] text-[#5F6A64] block">Admin akan menghubungi nomor ini untuk konfirmasi tiket porsi makan.</span>
                        </div>

                        <!-- Perguruan Tinggi & NIM -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                    Perguruan Tinggi <span class="text-rose-500">*</span>
                                </label>
                                <select name="university" required class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                                    <option value="">-- Pilih Kampus --</option>
                                    @foreach($campuses as $campus)
                                        <option value="{{ $campus }}">{{ $campus }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                    NIM (Nomor Induk) <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" name="nim" required placeholder="Contoh: F1D022001"
                                    class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                            </div>
                        </div>

                        <!-- Upload KTM (Figma upload box) -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                Upload Foto KTM (Kartu Tanda Mahasiswa) <span class="text-rose-500">*</span>
                            </label>
                            <div class="border-2 border-dashed border-[#DEE4DC] hover:border-[#2A6046] rounded-2xl p-6 text-center cursor-pointer bg-[#F4F7F3] transition relative">
                                <input type="file" name="ktm_photo" id="ktm_photo" accept="image/*,.pdf" required class="absolute inset-0 opacity-0 cursor-pointer w-full h-full">
                                <div class="space-y-2 pointer-events-none">
                                    <div class="w-12 h-12 rounded-full bg-[#EAEFE8] text-[#2A6046] flex items-center justify-center mx-auto">
                                        <i data-lucide="upload-cloud" class="w-6 h-6"></i>
                                    </div>
                                    <p class="text-sm font-bold text-[#1F3B2E]">Klik atau geser foto KTM ke sini</p>
                                    <p class="text-xs text-[#5F6A64]">Format yang didukung: JPG, PNG, atau PDF (Maksimal 10 MB)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Alasan Pengajuan Bantuan -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                Alasan & Kondisi Saat Ini <span class="text-rose-500">*</span>
                            </label>
                            <textarea name="reason" rows="4" required placeholder="Ceritakan secara singkat kondisi Anda saat ini (contoh: kiriman bulanan belum tiba, uang saku habis untuk berobat/tugas, dsb)..."
                                class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition"></textarea>
                        </div>

                        <!-- Checkbox Persetujuan -->
                        <div class="flex items-start gap-3 pt-2">
                            <input type="checkbox" id="agreement" required class="mt-1 w-4 h-4 text-[#2A6046] rounded border-[#DEE4DC] focus:ring-[#2A6046]">
                            <label for="agreement" class="text-xs text-[#5F6A64] leading-relaxed">
                                Saya menyatakan bahwa seluruh informasi yang diberikan adalah benar dan saya sedang membutuhkan bantuan pangan darurat.
                            </label>
                        </div>

                        <!-- Action Buttons -->
                        <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-[#DEE4DC]">
                            <a href="{{ route('home') }}" class="text-xs sm:text-sm font-bold text-[#5F6A64] hover:text-[#2A6046] transition order-2 sm:order-1">
                                ← Kembali ke beranda
                            </a>
                            <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-[15px] font-bold rounded-xl shadow-sm transition flex items-center justify-center gap-2 order-1 sm:order-2">
                                <span>Kirim Pengajuan</span>
                                <i data-lucide="send" class="w-4 h-4"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
