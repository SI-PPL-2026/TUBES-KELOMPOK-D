@extends('layouts.app')

@section('title', 'Dashboard Donatur - SIDAPUR')

@section('content')
<div class="py-10 bg-slate-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Welcome Card -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-xs mb-8 flex flex-col md:flex-row md:items-center justify-between">
            <div class="flex items-center space-x-4 mb-4 md:mb-0">
                <div class="w-14 h-14 rounded-2xl bg-brand-100 text-brand-600 flex items-center justify-center text-2xl font-black">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div>
                    <h1 class="text-xl sm:text-2xl font-black text-slate-900">Halo, {{ $user->name }}!</h1>
                    <p class="text-xs sm:text-sm text-slate-500">Terima kasih telah menjadi bagian dari gerakan peduli pangan mahasiswa perantau.</p>
                </div>
            </div>

            <div>
                <a href="{{ route('donatur.create') }}" class="inline-flex items-center space-x-2 px-6 py-3 bg-brand-500 hover:bg-brand-600 text-white font-bold text-sm rounded-2xl shadow-lg shadow-brand-500/25 transition-all">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    <span>Titip Donasi Baru</span>
                </a>
            </div>
        </div>

        <!-- 3 Stat Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-xs">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Total Donasi Anda</span>
                <div class="text-2xl font-black text-brand-600">
                    Rp {{ number_format($totalDonation, 0, ',', '.') }}
                </div>
                <div class="text-[11px] text-slate-400 mt-1">Telah disalurkan ke kas program</div>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-xs">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Donasi Terverifikasi</span>
                <div class="text-2xl font-black text-emerald-600">
                    {{ $verifiedCount }} Transaksi
                </div>
                <div class="text-[11px] text-slate-400 mt-1">Dikonfirmasi oleh admin</div>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-xs">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Menunggu Verifikasi</span>
                <div class="text-2xl font-black text-amber-500">
                    {{ $pendingCount }} Transaksi
                </div>
                <div class="text-[11px] text-slate-400 mt-1">Sedang dicek oleh admin</div>
            </div>
        </div>

        <!-- Riwayat Donasi (US-22) -->
        <div class="bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden mb-8">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Riwayat Donasi Saya</h3>
                    <p class="text-xs text-slate-500">Daftar rekaman donasi yang pernah Anda titipkan melalui platform.</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-bold tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="py-4 px-6">Tanggal</th>
                            <th class="py-4 px-6">Metode Pembayaran</th>
                            <th class="py-4 px-6">Pesan / Doa</th>
                            <th class="py-4 px-6">Nominal</th>
                            <th class="py-4 px-6">Status</th>
                            <th class="py-4 px-6 text-right">Tanda Terima</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($donations as $don)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-4 px-6 text-xs whitespace-nowrap">{{ $don->created_at->format('d/m/Y H:i') }}</td>
                                <td class="py-4 px-6 font-semibold text-slate-800 whitespace-nowrap">{{ $don->paymentMethod->name ?? 'Metode Pembayaran' }}</td>
                                <td class="py-4 px-6 text-xs text-slate-500 italic max-w-xs truncate">{{ $don->message ?? '-' }}</td>
                                <td class="py-4 px-6 font-bold text-emerald-600 whitespace-nowrap">Rp {{ number_format($don->amount, 0, ',', '.') }}</td>
                                <td class="py-4 px-6 whitespace-nowrap">{!! $don->status_badge !!}</td>
                                <td class="py-4 px-6 text-right whitespace-nowrap">
                                    <a href="{{ route('donatur.show', $don) }}" class="text-xs font-bold text-brand-600 hover:underline">
                                        <i class="fa-solid fa-receipt mr-1"></i> Lihat
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-slate-400">
                                    Anda belum memiliki riwayat donasi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Notifikasi (US-23) -->
        @if($notifications->count() > 0)
            <div class="bg-white rounded-3xl p-6 border border-slate-200/90 shadow-xs">
                <h3 class="text-base font-bold text-slate-900 mb-4 flex items-center">
                    <i class="fa-solid fa-bell text-brand-500 mr-2"></i> Notifikasi Penyaluran Donasi
                </h3>
                <div class="space-y-3">
                    @foreach($notifications as $notif)
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex items-start space-x-3">
                            <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs shrink-0 mt-0.5">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div class="flex-1">
                                <div class="text-xs font-bold text-slate-900">{{ $notif->title }}</div>
                                <div class="text-xs text-slate-600 mt-0.5">{{ $notif->message }}</div>
                                <div class="text-[10px] text-slate-400 mt-1">{{ $notif->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
