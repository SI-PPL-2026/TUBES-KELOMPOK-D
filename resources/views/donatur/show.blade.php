@extends('layouts.app')

@section('title', 'Tanda Terima Donasi - SIDAPUR')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-xl mx-auto px-4 sm:px-6">
        
        <a href="{{ route('donatur.dashboard') }}" class="inline-flex items-center text-xs font-bold text-slate-500 hover:text-slate-800 mb-6">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Dashboard Donatur
        </a>

        <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xl shadow-slate-200/50">
            <!-- Header Tanda Terima -->
            <div class="text-center pb-6 border-b border-slate-100">
                <div class="w-12 h-12 rounded-2xl bg-brand-500 text-white flex items-center justify-center text-xl mx-auto mb-3 shadow-md">
                    <i class="fa-solid fa-receipt"></i>
                </div>
                <span class="text-[11px] uppercase font-bold tracking-widest text-brand-600 block mb-1">Bukti Tanda Terima Donasi</span>
                <h1 class="text-xl font-black text-slate-900">SIDAPUR Purbalingga-Purwokerto</h1>
                <div class="text-xs text-slate-400 mt-1">ID Transaksi: #DON-{{ str_pad($donation->id, 5, '0', STR_PAD_LEFT) }}</div>
            </div>

            <!-- Status Box -->
            <div class="py-6 border-b border-slate-100 text-center">
                <div class="text-xs font-semibold text-slate-400 mb-1">Status Verifikasi</div>
                <div>{!! $donation->status_badge !!}</div>
                <div class="text-3xl font-black text-emerald-600 mt-3">
                    Rp {{ number_format($donation->amount, 0, ',', '.') }}
                </div>
            </div>

            <!-- Detail List -->
            <div class="py-6 space-y-3.5 text-xs sm:text-sm border-b border-slate-100">
                <div class="flex justify-between">
                    <span class="text-slate-400 font-medium">Nama Donatur</span>
                    <span class="font-bold text-slate-800">{{ $donation->user->name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-400 font-medium">Waktu Transaksi</span>
                    <span class="font-bold text-slate-800">{{ $donation->created_at->format('d F Y, H:i') }} WIB</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-400 font-medium">Metode Pembayaran</span>
                    <span class="font-bold text-slate-800">{{ $donation->paymentMethod->name ?? 'Metode Pembayaran' }}</span>
                </div>
                @if($donation->message)
                    <div class="pt-2">
                        <span class="text-slate-400 font-medium block mb-1">Pesan Doa</span>
                        <p class="text-slate-700 bg-slate-50 p-3 rounded-xl border border-slate-100 italic">
                            "{{ $donation->message }}"
                        </p>
                    </div>
                @endif
            </div>

            <!-- Bukti Transfer Preview -->
            @if($donation->transfer_proof && file_exists(public_path('storage/' . $donation->transfer_proof)))
                <div class="py-6 border-b border-slate-100">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-2">Lampiran Bukti Transfer</span>
                    <div class="h-44 rounded-2xl bg-slate-100 overflow-hidden border border-slate-200">
                        <a href="{{ asset('storage/' . $donation->transfer_proof) }}" target="_blank">
                            <img src="{{ asset('storage/' . $donation->transfer_proof) }}" alt="Bukti Transfer" class="w-full h-full object-cover">
                        </a>
                    </div>
                </div>
            @endif

            <!-- Print Button -->
            <div class="pt-6 flex justify-center">
                <button type="button" onclick="window.print()" class="px-6 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-colors flex items-center space-x-2">
                    <i class="fa-solid fa-print"></i>
                    <span>Cetak Tanda Terima</span>
                </button>
            </div>
        </div>

    </div>
</div>
@endsection
