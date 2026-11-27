@extends('layouts.app')

@section('title', 'Status Bantuan Saya - SIDAPUR')

@section('content')
<section class="w-full bg-[#EAEFE8] py-10 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">PORTAL PENERIMA MANFAAT</span>
            <h1 class="text-2xl sm:text-3xl font-black text-[#1F3B2E] mt-1">Halo, {{ $user->name }}</h1>
            <p class="text-sm text-[#5F6A64] mt-1">Pantau status pengajuan bantuan nasi darurat dan catatan dari tim pengurus.</p>
        </div>
        <a href="{{ route('aid.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-sm font-bold rounded-xl shadow-sm transition">
            <i data-lucide="plus-circle" class="w-4 h-4"></i>
            <span>Ajukan Bantuan Baru</span>
        </a>
    </div>
</section>

<section class="w-full bg-white py-12">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <!-- Ringkasan Pengajuan -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div class="p-6 rounded-2xl bg-[#F4F7F3] border border-[#DEE4DC]">
                <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Total Pengajuan</p>
                <p class="text-2xl sm:text-3xl font-black text-[#1F3B2E] mt-2">{{ $aidRequests->count() }} Kali</p>
            </div>
            <div class="p-6 rounded-2xl bg-[#F4F7F3] border border-[#DEE4DC]">
                <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Disetujui / Tersalurkan</p>
                <p class="text-2xl sm:text-3xl font-black text-[#2A6046] mt-2">{{ $approvedCount }} Pengajuan</p>
            </div>
            <div class="p-6 rounded-2xl bg-[#F4F7F3] border border-[#DEE4DC]">
                <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Sedang Diproses</p>
                <p class="text-2xl sm:text-3xl font-black text-amber-600 mt-2">{{ $pendingCount }} Pengajuan</p>
            </div>
        </div>

        <!-- Daftar Pengajuan -->
        <div class="bg-white rounded-2xl border border-[#DEE4DC] overflow-hidden">
            <div class="px-6 py-4 border-b border-[#DEE4DC] bg-[#F4F7F3] flex items-center justify-between">
                <h2 class="text-base font-black text-[#1F3B2E]">Riwayat Pengajuan Bantuan Anda</h2>
                <span class="text-xs font-semibold text-[#5F6A64]">{{ $aidRequests->count() }} total catatan</span>
            </div>

            @if($aidRequests->isEmpty())
                <div class="p-10 text-center space-y-3">
                    <p class="text-sm text-[#5F6A64]">Anda belum pernah mengajukan bantuan.</p>
                    <a href="{{ route('aid.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#2A6046] text-white text-xs font-bold rounded-lg">
                        Ajukan Bantuan Sekarang
                    </a>
                </div>
            @else
                <div class="divide-y divide-[#DEE4DC]">
                    @foreach($aidRequests as $aid)
                    <div class="p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-[#F4F7F3]/50">
                        <div class="space-y-1.5">
                            <div class="flex items-center gap-2.5 flex-wrap">
                                <span class="text-xs text-[#5F6A64]">{{ $aid->created_at->format('d M Y, H:i') }}</span>
                                <span class="text-[#DEE4DC]">•</span>
                                <span class="text-xs font-bold text-[#1F3B2E]">{{ $aid->university }} ({{ $aid->nim }})</span>
                            </div>
                            <p class="text-sm font-semibold text-[#1F3B2E]">{{ $aid->reason }}</p>
                            @if($aid->admin_notes)
                                <p class="text-xs text-[#2A6046] bg-[#EAEFE8] px-3 py-2 rounded-lg inline-block mt-1">
                                    <strong>Catatan Pengurus:</strong> {{ $aid->admin_notes }}
                                </p>
                            @endif
                        </div>
                        <div class="flex-shrink-0">
                            @if($aid->status === 'completed')
                                <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-[#EAEFE8] text-[#2A6046]">Selesai Disalurkan</span>
                            @elseif($aid->status === 'approved')
                                <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-blue-100 text-blue-700">Disetujui</span>
                            @elseif($aid->status === 'rejected')
                                <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-red-100 text-red-700">Ditolak</span>
                            @else
                                <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-amber-100 text-amber-700">Menunggu Verifikasi</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
