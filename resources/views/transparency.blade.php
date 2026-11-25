@extends('layouts.app')

@section('title', 'Transparansi Anggaran & Penyaluran - SIDAPUR')

@section('content')

<!-- Header & Breadcrumb -->
<section class="w-full bg-[#EAEFE8] pt-10 pb-16 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs sm:text-sm text-[#5F6A64]">
            <a href="{{ route('home') }}" class="hover:text-[#2A6046] transition">Beranda</a>
            <span>›</span>
            <span class="font-bold text-[#2A6046]">Transparansi</span>
        </nav>

        <div class="space-y-3 max-w-3xl">
            <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                AKUNTABILITAS & KETERBUKAAN
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#1F3B2E] tracking-tight leading-tight">
                Transparansi Anggaran & Penyaluran
            </h1>
            <p class="text-base sm:text-lg text-[#5F6A64] leading-relaxed">
                Laporan dana masuk dan dana keluar yang diperbarui secara berkala demi menjaga amanah serta kepercayaan para donatur.
            </p>
        </div>

        <!-- 3 Kartu Ringkasan Kas Utama -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">
            
            <div class="bg-white p-7 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-2">
                <p class="text-xs font-bold text-[#5F6A64] uppercase tracking-wider">Total Donasi Terkumpul</p>
                <p class="text-3xl sm:text-4xl font-black text-[#1F3B2E]">
                    Rp {{ number_format($inflow ?? 48000000, 0, ',', '.') }}
                </p>
                <p class="text-xs text-[#2A6046] font-semibold flex items-center gap-1.5 pt-1">
                    <i data-lucide="arrow-down-left" class="w-4 h-4 text-[#2A6046]"></i>
                    <span>Akumulasi dari donatur terdaftar & umum</span>
                </p>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-2">
                <p class="text-xs font-bold text-[#5F6A64] uppercase tracking-wider">Total Dana Tersalurkan</p>
                <p class="text-3xl sm:text-4xl font-black text-[#1F3B2E]">
                    Rp {{ number_format($outflow ?? 39600000, 0, ',', '.') }}
                </p>
                <p class="text-xs text-[#5F6A64] font-semibold flex items-center gap-1.5 pt-1">
                    <i data-lucide="utensils" class="w-4 h-4 text-[#2A6046]"></i>
                    <span>Tersalurkan dalam bentuk 12.480+ porsi</span>
                </p>
            </div>

            <div class="bg-white p-7 rounded-2xl border-2 border-[#2A6046] shadow-sm space-y-2">
                <p class="text-xs font-bold text-[#2A6046] uppercase tracking-wider">Saldo Kas Operasional Saat Ini</p>
                <p class="text-3xl sm:text-4xl font-black text-[#2A6046]">
                    Rp {{ number_format($balance ?? 8400000, 0, ',', '.') }}
                </p>
                <p class="text-xs text-[#5F6A64] font-semibold flex items-center gap-1.5 pt-1">
                    <i data-lucide="shield-check" class="w-4 h-4 text-[#2A6046]"></i>
                    <span>Saldo siap digunakan untuk alokasi baru</span>
                </p>
            </div>

        </div>

    </div>
</section>

<!-- Section: Penyaluran per Kampus (Figma 1:1) -->
<section class="w-full bg-white py-16 sm:py-20 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <div>
            <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                DISTRIBUSI PERGURUAN TINGGI
            </span>
            <h2 class="text-2xl sm:text-3xl font-black text-[#1F3B2E] tracking-tight mt-1">
                Penyaluran Bantuan per Kampus
            </h2>
            <p class="text-sm text-[#5F6A64] mt-1 max-w-xl">
                Alokasi dana bantuan makanan darurat yang telah terealisasi di masing-masing kampus Barlingmascakeb.
            </p>
        </div>

        <div class="bg-[#F4F7F3] p-8 rounded-2xl border border-[#DEE4DC] space-y-5">
            @foreach($campusDistribution as $campus)
            <div class="space-y-1.5">
                <div class="flex items-center justify-between text-xs sm:text-sm font-bold">
                    <span class="text-[#1F3B2E]">{{ $campus['name'] }}</span>
                    <span class="text-[#2A6046]">
                        Rp {{ number_format($campus['amount'], 0, ',', '.') }} 
                        <span class="text-[#5F6A64] font-normal">({{ $campus['percent'] }}%)</span>
                    </span>
                </div>
                <div class="w-full h-3 bg-white border border-[#DEE4DC] rounded-full overflow-hidden">
                    <div class="h-full bg-[#2A6046] rounded-full transition-all duration-500" style="width: {{ $campus['percent'] }}%"></div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Section: Rincian Catatan Transaksi -->
<section class="w-full bg-[#EAEFE8] py-16 sm:py-20 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">
                    BUKU KAS HARIAN
                </span>
                <h2 class="text-2xl sm:text-3xl font-black text-[#1F3B2E] tracking-tight mt-1">
                    Riwayat Transaksi Terbaru
                </h2>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-xs font-bold text-[#5F6A64]">Status:</span>
                <span class="px-3 py-1 bg-white border border-[#DEE4DC] text-[#2A6046] text-xs font-bold rounded-full flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-[#2A6046] animate-pulse"></span> Terverifikasi Terbuka
                </span>
            </div>
        </div>

        <!-- Tabel Transaksi -->
        <div class="bg-white rounded-2xl border border-[#DEE4DC] shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-[#1F3B2E]">
                    <thead class="bg-[#F4F7F3] border-b border-[#DEE4DC] text-xs uppercase font-bold text-[#5F6A64]">
                        <tr>
                            <th scope="col" class="px-6 py-4">Tanggal</th>
                            <th scope="col" class="px-6 py-4">Keterangan Transaksi</th>
                            <th scope="col" class="px-6 py-4">Kategori</th>
                            <th scope="col" class="px-6 py-4 text-right">Nominal</th>
                            <th scope="col" class="px-6 py-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#DEE4DC]">
                        @forelse($transactions as $t)
                        <tr class="hover:bg-[#F4F7F3]/60 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-xs font-medium text-[#5F6A64]">
                                {{ $t['date'] }}
                            </td>
                            <td class="px-6 py-4 font-bold text-[#1F3B2E]">
                                {{ $t['title'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($t['type'] === 'inflow')
                                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-800 text-xs font-bold rounded-md border border-emerald-200">
                                        Pemasukan (Donasi)
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 bg-amber-50 text-amber-800 text-xs font-bold rounded-md border border-amber-200">
                                        Penyaluran Makanan
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right font-black {{ $t['type'] === 'inflow' ? 'text-emerald-700' : 'text-[#1F3B2E]' }}">
                                {{ $t['type'] === 'inflow' ? '+' : '-' }} Rp {{ number_format($t['amount'], 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="inline-flex items-center gap-1 text-xs font-bold text-[#2A6046]">
                                    <i data-lucide="check-circle" class="w-4 h-4"></i> {{ $t['status'] }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-[#5F6A64]">Belum ada data transaksi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

@endsection
