@extends('layouts.app')

@section('title', 'Bantu Donasi - SIDAPUR')

@section('content')

<!-- Header & Breadcrumb -->
<section class="w-full bg-[#EAEFE8] pt-10 pb-16 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs sm:text-sm text-[#5F6A64]">
            <a href="{{ route('home') }}" class="hover:text-[#2A6046] transition">Beranda</a>
            <span>›</span>
            <span class="font-bold text-[#2A6046]">Bantu Donasi</span>
        </nav>

        <div class="space-y-3 max-w-3xl">
            <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                SALURKAN KEBAIKAN
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#1F3B2E] tracking-tight leading-tight">
                Bantu Donasi - Nasi Darurat
            </h1>
            <p class="text-base sm:text-lg text-[#5F6A64] leading-relaxed">
                Setiap rupiah donasi Anda dikonversikan menjadi makanan hangat bergizi bagi rekan-rekan mahasiswa dan pelajar perantau di Barlingmascakeb.
            </p>
        </div>

    </div>
</section>

<!-- Formulir Donasi & Pembayaran (Figma 1:1) -->
<section class="w-full bg-white py-16 sm:py-20 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left: Instruksi Rekening & QRIS -->
            <div class="lg:col-span-5 space-y-6">
                
                <div class="p-6 rounded-2xl bg-[#EAEFE8] border border-[#DEE4DC] space-y-4">
                    <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                        METODE PEMBAYARAN
                    </span>
                    <h3 class="text-xl font-black text-[#1F3B2E]">Scan QRIS & Transfer Bank</h3>
                    <p class="text-xs sm:text-sm text-[#5F6A64] leading-relaxed">
                        Silakan transfer donasi Anda ke rekening resmi atau scan QRIS di bawah ini, kemudian unggah bukti transfer pada formulir.
                    </p>

                    <!-- QRIS Box Mockup -->
                    <div class="bg-white p-5 rounded-xl border border-[#DEE4DC] text-center space-y-3 shadow-sm">
                        <div class="w-48 h-48 mx-auto bg-gray-50 border-2 border-dashed border-[#DEE4DC] rounded-xl flex flex-col items-center justify-center p-3 relative">
                            <!-- SVG QRIS Visual Representation -->
                            <svg class="w-32 h-32 text-[#1F3B2E]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                                <path d="M7 7h.01"></path>
                                <path d="M17 7h.01"></path>
                                <path d="M7 17h.01"></path>
                                <path d="M17 17h.01"></path>
                            </svg>
                            <span class="text-[10px] font-bold text-[#2A6046] uppercase tracking-wider mt-1">QRIS NASI DARURAT</span>
                        </div>
                        <p class="text-xs text-[#5F6A64]">Mendukung BCA, Mandiri, BRI, BNI, GoPay, OVO, Dana, ShopeePay</p>
                    </div>

                    <!-- Rekening Bank List -->
                    <div class="space-y-2 pt-2">
                        <div class="p-3.5 bg-white rounded-xl border border-[#DEE4DC] flex items-center justify-between">
                            <div>
                                <span class="text-[11px] font-bold text-[#5F6A64] uppercase block">Bank BCA</span>
                                <span class="text-sm font-black text-[#1F3B2E]" id="rekening-bca">0461 2345 67</span>
                                <span class="text-[10px] text-[#5F6A64] block">a.n. Nasi Darurat Purbalingga</span>
                            </div>
                            <button type="button" onclick="navigator.clipboard.writeText('0461234567'); alert('Nomor rekening BCA berhasil disalin!');" class="px-3 py-1.5 bg-[#EAEFE8] text-[#2A6046] text-xs font-bold rounded-lg hover:bg-[#DEE4DC] transition">
                                Salin
                            </button>
                        </div>

                        <div class="p-3.5 bg-white rounded-xl border border-[#DEE4DC] flex items-center justify-between">
                            <div>
                                <span class="text-[11px] font-bold text-[#5F6A64] uppercase block">Bank BRI</span>
                                <span class="text-sm font-black text-[#1F3B2E]" id="rekening-bri">0032 0100 8912 503</span>
                                <span class="text-[10px] text-[#5F6A64] block">a.n. SIDAPUR Berbagi Pangan</span>
                            </div>
                            <button type="button" onclick="navigator.clipboard.writeText('003201008912503'); alert('Nomor rekening BRI berhasil disalin!');" class="px-3 py-1.5 bg-[#EAEFE8] text-[#2A6046] text-xs font-bold rounded-lg hover:bg-[#DEE4DC] transition">
                                Salin
                            </button>
                        </div>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-[#F4F7F3] border border-[#DEE4DC] flex items-center gap-3 text-xs text-[#5F6A64]">
                    <i data-lucide="shield-check" class="w-5 h-5 text-[#2A6046] flex-shrink-0"></i>
                    <span>Seluruh donasi yang masuk diverifikasi dan dicatat pada sistem transparansi publik.</span>
                </div>

            </div>

            <!-- Right: Formulir Input Donasi -->
            <div class="lg:col-span-7">
                <div class="bg-white p-8 sm:p-10 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-6">
                    <div>
                        <h3 class="text-2xl font-black text-[#1F3B2E]">Konfirmasi & Titip Donasi</h3>
                        <p class="text-xs sm:text-sm text-[#5F6A64] mt-1">
                            Pilih nominal dan sertakan bukti transfer untuk pencatatan riwayat donasi.
                        </p>
                    </div>

                    <form action="{{ route('donation.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <!-- Pilihan Nominal Cepat (Pill Buttons dari Figma) -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                Pilih Nominal Donasi <span class="text-rose-500">*</span>
                            </label>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5">
                                <button type="button" onclick="setNominal(15000)" class="nominal-preset p-3 rounded-xl border border-[#DEE4DC] hover:border-[#2A6046] text-center font-black text-sm text-[#1F3B2E] transition focus:bg-[#EAEFE8] focus:border-[#2A6046]">
                                    Rp 15.000
                                    <span class="block text-[10px] font-normal text-[#5F6A64]">1 Porsi</span>
                                </button>
                                <button type="button" onclick="setNominal(30000)" class="nominal-preset p-3 rounded-xl border border-[#DEE4DC] hover:border-[#2A6046] text-center font-black text-sm text-[#1F3B2E] transition focus:bg-[#EAEFE8] focus:border-[#2A6046]">
                                    Rp 30.000
                                    <span class="block text-[10px] font-normal text-[#5F6A64]">2 Porsi</span>
                                </button>
                                <button type="button" onclick="setNominal(50000)" class="nominal-preset p-3 rounded-xl border border-[#DEE4DC] hover:border-[#2A6046] text-center font-black text-sm text-[#1F3B2E] transition focus:bg-[#EAEFE8] focus:border-[#2A6046]">
                                    Rp 50.000
                                    <span class="block text-[10px] font-normal text-[#5F6A64]">Paket Komplit</span>
                                </button>
                                <button type="button" onclick="setNominal(100000)" class="nominal-preset p-3 rounded-xl border border-[#DEE4DC] hover:border-[#2A6046] text-center font-black text-sm text-[#1F3B2E] transition focus:bg-[#EAEFE8] focus:border-[#2A6046]">
                                    Rp 100.000
                                    <span class="block text-[10px] font-normal text-[#5F6A64]">Paket Berbagi</span>
                                </button>
                            </div>
                        </div>

                        <!-- Input Nominal Custom -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                Atau Masukkan Nominal Sendiri (Rp) <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-3.5 text-sm font-bold text-[#5F6A64]">Rp</span>
                                <input type="number" id="nominal-input" name="amount" min="1000" step="1000" required placeholder="Contoh: 50000"
                                    class="w-full pl-12 pr-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-base font-black focus:outline-none focus:border-[#2A6046] transition">
                            </div>
                        </div>

                        <!-- Nama Lengkap / Anonim -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                Nama Donatur <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" id="donor-name" name="name" required placeholder="Nama Anda atau institusi"
                                class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                            <div class="flex items-center gap-2 pt-1">
                                <input type="checkbox" id="anon-check" onchange="toggleAnon(this)" class="w-4 h-4 text-[#2A6046] rounded border-[#DEE4DC] focus:ring-[#2A6046]">
                                <label for="anon-check" class="text-xs text-[#5F6A64] cursor-pointer">Sembunyikan nama saya (Donasi sebagai Hamba Allah)</label>
                            </div>
                        </div>

                        <!-- Nomor WhatsApp -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                Nomor WhatsApp <span class="text-rose-500">*</span>
                            </label>
                            <input type="tel" name="whatsapp" required placeholder="0812 3456 7890"
                                class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                            <span class="text-[11px] text-[#5F6A64] block">Untuk konfirmasi penerimaan dan pengiriman tanda terima resmi.</span>
                        </div>

                        <!-- Doa / Pesan Kebaikan -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                Doa / Pesan Semangat (Opsional)
                            </label>
                            <textarea name="notes" rows="3" placeholder="Tuliskan doa atau pesan penyemangat bagi rekan-rekan mahasiswa penerima..."
                                class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition"></textarea>
                        </div>

                        <!-- Upload Bukti Transfer (Figma Upload Box) -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">
                                Upload Bukti Transfer <span class="text-rose-500">*</span>
                            </label>
                            <div class="border-2 border-dashed border-[#DEE4DC] hover:border-[#2A6046] rounded-2xl p-6 text-center cursor-pointer bg-[#F4F7F3] transition relative">
                                <input type="file" name="proof" id="proof" accept="image/*,.pdf" required class="absolute inset-0 opacity-0 cursor-pointer w-full h-full">
                                <div class="space-y-2 pointer-events-none">
                                    <div class="w-12 h-12 rounded-full bg-[#EAEFE8] text-[#2A6046] flex items-center justify-center mx-auto">
                                        <i data-lucide="receipt" class="w-6 h-6"></i>
                                    </div>
                                    <p class="text-sm font-bold text-[#1F3B2E]">Klik atau geser bukti transfer ke sini</p>
                                    <p class="text-xs text-[#5F6A64]">Format foto transfer atau tangkapan layar e-wallet (JPG, PNG, PDF)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-[#DEE4DC]">
                            <a href="{{ route('home') }}" class="text-xs sm:text-sm font-bold text-[#5F6A64] hover:text-[#2A6046] transition order-2 sm:order-1">
                                ← Kembali ke beranda
                            </a>
                            <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-[15px] font-bold rounded-xl shadow-sm transition flex items-center justify-center gap-2 order-1 sm:order-2">
                                <span>Kirim Konfirmasi Donasi</span>
                                <i data-lucide="heart" class="w-4 h-4"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@push('scripts')
<script>
    function setNominal(val) {
        document.getElementById('nominal-input').value = val;
    }
    function toggleAnon(checkbox) {
        const nameInput = document.getElementById('donor-name');
        if (checkbox.checked) {
            nameInput.value = 'Hamba Allah';
            nameInput.readOnly = true;
        } else {
            nameInput.value = '';
            nameInput.readOnly = false;
        }
    }
</script>
@endpush

@endsection
