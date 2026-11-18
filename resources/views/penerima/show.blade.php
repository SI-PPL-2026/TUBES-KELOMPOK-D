@extends('layouts.app')

@section('title', 'Status Pengajuan Bantuan - SIDAPUR')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-6">
            <a href="{{ route('penerima.dashboard') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800 flex items-center">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Dashboard
            </a>

            @if($aidRequest->status === 'pending')
                <div class="flex space-x-2">
                    <a href="{{ route('penerima.edit', $aidRequest) }}" class="px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-800 text-xs font-bold rounded-xl transition-colors">
                        <i class="fa-solid fa-pen mr-1"></i> Ubah Pengajuan (US-10)
                    </a>
                    <form action="{{ route('penerima.cancel', $aidRequest) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pengajuan bantuan ini?')">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded-xl transition-colors">
                            <i class="fa-solid fa-xmark mr-1"></i> Batalkan (US-11)
                        </button>
                    </form>
                </div>
            @endif
        </div>

        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-xl shadow-slate-200/40 mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-100 pb-6 mb-6">
                <div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tiket Pengajuan #{{ str_pad($aidRequest->id, 5, '0', STR_PAD_LEFT) }}</span>
                    <h1 class="text-2xl font-black text-slate-900 mt-1">{{ $aidRequest->assistance_type }}</h1>
                    <div class="text-xs text-slate-500 mt-1">Diajukan pada {{ $aidRequest->created_at->format('d F Y, H:i') }} WIB</div>
                </div>
                <div class="mt-4 sm:mt-0 text-left sm:text-right">
                    <div class="text-xs text-slate-400 font-bold uppercase tracking-wider">Status Terkini</div>
                    <div class="mt-1">{!! $aidRequest->status_badge !!}</div>
                </div>
            </div>

            <!-- Detail Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8 text-sm">
                <div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Warung Makan / Tempat</span>
                    <span class="font-bold text-slate-800">{{ $aidRequest->stall_name }}</span>
                </div>
                <div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Nominal Bantuan</span>
                    <span class="text-xl font-black text-emerald-600">Rp {{ number_format($aidRequest->nominal, 0, ',', '.') }}</span>
                </div>
                <div class="sm:col-span-2">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Alasan Permohonan</span>
                    <p class="text-slate-700 bg-slate-50 p-4 rounded-2xl border border-slate-100">{{ $aidRequest->reason }}</p>
                </div>

                @if($aidRequest->admin_notes)
                    <div class="sm:col-span-2">
                        <span class="text-xs font-bold text-amber-700 uppercase tracking-wider block mb-1">Catatan Verifikasi Admin</span>
                        <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 text-xs sm:text-sm font-medium">
                            <i class="fa-solid fa-comment-dots mr-2 text-amber-600"></i> {{ $aidRequest->admin_notes }}
                        </div>
                    </div>
                @endif
            </div>

            <!-- Uploaded Files Preview -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-6 border-t border-slate-100">
                <div>
                    <span class="text-xs font-bold text-slate-700 uppercase tracking-wider block mb-2">Foto Kartu Tanda Mahasiswa (KTM)</span>
                    <div class="h-48 rounded-2xl bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center">
                        @if($aidRequest->ktm_photo && file_exists(public_path('storage/' . $aidRequest->ktm_photo)))
                            <a href="{{ asset('storage/' . $aidRequest->ktm_photo) }}" target="_blank" class="w-full h-full">
                                <img src="{{ asset('storage/' . $aidRequest->ktm_photo) }}" alt="Foto KTM" class="w-full h-full object-cover hover:scale-105 transition-transform">
                            </a>
                        @else
                            <span class="text-xs text-slate-400"><i class="fa-solid fa-id-card text-2xl block mb-1"></i> [Berkas KTM Terunggah]</span>
                        @endif
                    </div>
                </div>

                <div>
                    <span class="text-xs font-bold text-slate-700 uppercase tracking-wider block mb-2">Foto QRIS Warung Makan</span>
                    <div class="h-48 rounded-2xl bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center">
                        @if($aidRequest->qris_proof && file_exists(public_path('storage/' . $aidRequest->qris_proof)))
                            <a href="{{ asset('storage/' . $aidRequest->qris_proof) }}" target="_blank" class="w-full h-full">
                                <img src="{{ asset('storage/' . $aidRequest->qris_proof) }}" alt="QRIS Warung" class="w-full h-full object-cover hover:scale-105 transition-transform">
                            </a>
                        @else
                            <span class="text-xs text-slate-400"><i class="fa-solid fa-qrcode text-2xl block mb-1"></i> [Berkas QRIS Terunggah]</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Riwayat Log Status (Status Logs) -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-xs">
            <h3 class="text-base font-bold text-slate-900 mb-6 flex items-center">
                <i class="fa-solid fa-timeline text-brand-500 mr-2"></i> Log Perkembangan Status Pengajuan
            </h3>

            <div class="relative border-l-2 border-slate-200 ml-4 space-y-6">
                @forelse($statusLogs as $log)
                    <div class="relative pl-6">
                        <span class="absolute -left-2 top-1 w-4 h-4 rounded-full bg-brand-500 ring-4 ring-white"></span>
                        <div class="flex items-center justify-between text-xs text-slate-400 mb-1">
                            <span class="font-bold text-slate-700">Status: {{ ucfirst($log->new_status) }}</span>
                            <span>{{ $log->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        <p class="text-xs text-slate-600 bg-slate-50 p-3 rounded-xl border border-slate-100">
                            {{ $log->notes }}
                        </p>
                        <span class="text-[10px] text-slate-400 mt-1 block">Oleh: {{ $log->changedBy->name ?? 'Sistem' }}</span>
                    </div>
                @empty
                    <div class="pl-6 text-xs text-slate-400">Belum ada catatan status lanjutan.</div>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection
