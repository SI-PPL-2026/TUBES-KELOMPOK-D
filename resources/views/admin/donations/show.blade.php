@extends('layouts.admin')

@section('title', 'Verifikasi Donasi #' . $donation->id . ' - SIDAPUR')
@section('page_title', 'Periksa Bukti Bayar Donasi Masuk (US-14)')

@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('admin.donations.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800 flex items-center">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar Donasi
        </a>
        <div>
            {!! $donation->status_badge !!}
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left Column: Bukti Transfer (7 Cols) -->
        <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-xs">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-6">
                <h2 class="text-base font-bold text-slate-900">Lampiran Bukti Transfer / Struk Donatur</h2>
                <span class="text-xs text-slate-400">{{ $donation->created_at->format('d F Y, H:i') }}</span>
            </div>

            <div class="rounded-2xl bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center min-h-[380px]">
                @if($donation->transfer_proof && file_exists(public_path('storage/' . $donation->transfer_proof)))
                    <a href="{{ asset('storage/' . $donation->transfer_proof) }}" target="_blank" class="w-full h-full">
                        <img src="{{ asset('storage/' . $donation->transfer_proof) }}" alt="Bukti Transfer" class="w-full max-h-[500px] object-contain hover:scale-105 transition-transform">
                    </a>
                @else
                    <div class="text-center p-6 text-slate-400">
                        <i class="fa-solid fa-receipt text-5xl mb-2"></i>
                        <p class="text-xs">Foto Bukti Transfer Terunggah</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Right Column: Rincian & Konfirmasi (5 Cols) -->
        <div class="lg:col-span-5 space-y-6">
            
            <div class="bg-white rounded-3xl p-6 border border-slate-200/90 shadow-xs">
                <h3 class="text-base font-bold text-slate-900 mb-4">Rincian Transaksi Donasi</h3>

                <div class="space-y-4 text-xs sm:text-sm border-b border-slate-100 pb-6 mb-6">
                    <div>
                        <span class="text-slate-400 font-medium block mb-1">Nama Donatur</span>
                        <span class="font-bold text-slate-900">{{ $donation->user->name }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 font-medium block mb-1">Email / Kontak</span>
                        <span class="font-bold text-slate-900">{{ $donation->user->email }} • {{ $donation->user->phone ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 font-medium block mb-1">Metode Pembayaran Dituju</span>
                        <span class="font-bold text-slate-900">{{ $donation->paymentMethod->name ?? 'Metode Pembayaran' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 font-medium block mb-1">Nominal Donasi</span>
                        <span class="text-2xl font-black text-emerald-600">Rp {{ number_format($donation->amount, 0, ',', '.') }}</span>
                    </div>
                    @if($donation->message)
                        <div>
                            <span class="text-slate-400 font-medium block mb-1">Pesan Doa Donatur</span>
                            <p class="p-3 rounded-xl bg-slate-50 border border-slate-100 italic text-slate-700">"{{ $donation->message }}"</p>
                        </div>
                    @endif
                </div>

                <!-- Form Verifikasi -->
                <form action="{{ route('admin.donations.verify', $donation) }}" method="POST" class="space-y-3">
                    @csrf
                    <div class="text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tindakan Admin:</div>

                    <div class="grid grid-cols-2 gap-3">
                        <button type="submit" name="status" value="verified"
                                class="py-3 px-4 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl shadow-md transition-colors flex items-center justify-center space-x-1.5">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Verifikasi Valid</span>
                        </button>
                        <button type="submit" name="status" value="rejected"
                                class="py-3 px-4 bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs rounded-xl shadow-md transition-colors flex items-center justify-center space-x-1.5">
                            <i class="fa-solid fa-circle-xmark"></i>
                            <span>Tolak Donasi</span>
                        </button>
                    </div>

                    <p class="text-[11px] text-slate-400 pt-2">
                        💡 Memverifikasi donasi akan otomatis mencatat kas masuk (inflow) di buku kas keuangan SIDAPUR dan mengirimkan notifikasi konfirmasi ke donatur.
                    </p>
                </form>
            </div>

        </div>

    </div>

</div>
@endsection
