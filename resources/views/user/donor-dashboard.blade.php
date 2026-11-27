@extends('layouts.app')

@section('title', 'Riwayat Donasi Saya - SIDAPUR')

@section('content')
<section class="w-full bg-[#EAEFE8] py-10 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">PORTAL PEMBERI DONASI</span>
            <h1 class="text-2xl sm:text-3xl font-black text-[#1F3B2E] mt-1">Halo, {{ $user->name }}</h1>
            <p class="text-sm text-[#5F6A64] mt-1">Pantau status verifikasi dan riwayat donasi kebaikan Anda di SIDAPUR.</p>
        </div>
        <a href="{{ route('donation.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-sm font-bold rounded-xl shadow-sm transition">
            <i data-lucide="heart" class="w-4 h-4"></i>
            <span>Bantu Donasi Lagi</span>
        </a>
    </div>
</section>

<section class="w-full bg-white py-12">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <!-- Ringkasan Donasi -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div class="p-6 rounded-2xl bg-[#F4F7F3] border border-[#DEE4DC]">
                <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Total Donasi Terverifikasi</p>
                <p class="text-2xl sm:text-3xl font-black text-[#2A6046] mt-2">Rp {{ number_format($totalDonated, 0, ',', '.') }}</p>
            </div>
            <div class="p-6 rounded-2xl bg-[#F4F7F3] border border-[#DEE4DC]">
                <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Donasi Terverifikasi</p>
                <p class="text-2xl sm:text-3xl font-black text-[#1F3B2E] mt-2">{{ $verifiedCount }} Kali</p>
            </div>
            <div class="p-6 rounded-2xl bg-[#F4F7F3] border border-[#DEE4DC]">
                <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Menunggu Verifikasi</p>
                <p class="text-2xl sm:text-3xl font-black text-amber-600 mt-2">{{ $pendingCount }} Transaksi</p>
            </div>
        </div>

        <!-- Daftar Riwayat Donasi -->
        <div class="bg-white rounded-2xl border border-[#DEE4DC] overflow-hidden">
            <div class="px-6 py-4 border-b border-[#DEE4DC] bg-[#F4F7F3] flex items-center justify-between">
                <h2 class="text-base font-black text-[#1F3B2E]">Riwayat Donasi Anda</h2>
                <span class="text-xs font-semibold text-[#5F6A64]">{{ $donations->count() }} total catatan</span>
            </div>

            @if($donations->isEmpty())
                <div class="p-10 text-center space-y-3">
                    <p class="text-sm text-[#5F6A64]">Anda belum memiliki catatan donasi.</p>
                    <a href="{{ route('donation.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#2A6046] text-white text-xs font-bold rounded-lg">
                        Mulai Berdonasi
                    </a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-[#DEE4DC] text-[11px] font-bold uppercase tracking-wider text-[#5F6A64] bg-gray-50">
                                <th class="px-6 py-3.5">Tanggal</th>
                                <th class="px-6 py-3.5">Nama Tercatat</th>
                                <th class="px-6 py-3.5">Nominal</th>
                                <th class="px-6 py-3.5">Pesan / Doa</th>
                                <th class="px-6 py-3.5">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#DEE4DC] text-sm">
                            @foreach($donations as $donation)
                            <tr class="hover:bg-[#F4F7F3]/50">
                                <td class="px-6 py-4 text-xs text-[#5F6A64]">{{ $donation->created_at->format('d M Y, H:i') }}</td>
                                <td class="px-6 py-4 font-bold text-[#1F3B2E]">{{ $donation->donor_name }}</td>
                                <td class="px-6 py-4 font-black text-[#2A6046]">Rp {{ number_format($donation->amount, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-xs text-[#5F6A64] max-w-xs truncate">{{ $donation->message ?: '-' }}</td>
                                <td class="px-6 py-4">
                                    @if($donation->status === 'verified')
                                        <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-[#EAEFE8] text-[#2A6046]">Terverifikasi</span>
                                    @elseif($donation->status === 'rejected')
                                        <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">Ditolak</span>
                                    @else
                                        <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-700">Menunggu Verifikasi</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
