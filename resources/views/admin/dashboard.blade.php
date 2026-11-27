@extends('layouts.admin')

@section('title', 'Ringkasan Admin - SIDAPUR')
@section('page_title', 'Ringkasan Operasional SIDAPUR')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
    <div class="bg-white p-5 rounded-2xl border border-[#DEE4DC]">
        <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Pengajuan Pending</p>
        <p class="text-3xl font-black text-amber-600 mt-2">{{ $pendingAidCount }}</p>
        <a href="{{ route('admin.aid-requests', ['status' => 'pending']) }}" class="text-xs font-bold text-[#2A6046] hover:underline mt-2 inline-block">Lihat antrian →</a>
    </div>

    <div class="bg-white p-5 rounded-2xl border border-[#DEE4DC]">
        <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Donasi Perlu Verifikasi</p>
        <p class="text-3xl font-black text-amber-600 mt-2">{{ $pendingDonationCount }}</p>
        <a href="{{ route('admin.donations', ['status' => 'pending']) }}" class="text-xs font-bold text-[#2A6046] hover:underline mt-2 inline-block">Verifikasi sekarang →</a>
    </div>

    <div class="bg-white p-5 rounded-2xl border border-[#DEE4DC]">
        <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Saldo Kas Tercatat</p>
        <p class="text-2xl sm:text-3xl font-black text-[#2A6046] mt-2">Rp {{ number_format($balance, 0, ',', '.') }}</p>
        <p class="text-xs text-[#5F6A64] mt-1">Masuk: Rp {{ number_format($totalInflow, 0, ',', '.') }}</p>
    </div>

    <div class="bg-white p-5 rounded-2xl border border-[#DEE4DC]">
        <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Pengguna Terdaftar</p>
        <p class="text-3xl font-black text-[#1F3B2E] mt-2">{{ $totalRegularUsers + $totalAdmins }}</p>
        <p class="text-xs text-[#5F6A64] mt-1">{{ $totalRegularUsers }} User • {{ $totalAdmins }} Admin</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Pengajuan Bantuan Terbaru -->
    <div class="bg-white rounded-2xl border border-[#DEE4DC] overflow-hidden">
        <div class="px-5 py-4 border-b border-[#DEE4DC] flex items-center justify-between bg-[#F4F7F3]">
            <h2 class="text-sm font-black text-[#1F3B2E]">Pengajuan Bantuan Terbaru</h2>
            <a href="{{ route('admin.aid-requests') }}" class="text-xs font-bold text-[#2A6046] hover:underline">Semua</a>
        </div>
        <div class="divide-y divide-[#DEE4DC]">
            @forelse($recentAidRequests as $aid)
                <div class="p-4 flex items-center justify-between gap-3">
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-[#1F3B2E] truncate">{{ $aid->applicant_name }}</p>
                        <p class="text-xs text-[#5F6A64] truncate">{{ $aid->university }} • {{ $aid->nim }}</p>
                    </div>
                    <span class="px-2.5 py-1 rounded-full text-[11px] font-bold flex-shrink-0
                        {{ $aid->status === 'completed' ? 'bg-[#EAEFE8] text-[#2A6046]' : ($aid->status === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-amber-100 text-amber-700') }}">
                        {{ ucfirst($aid->status) }}
                    </span>
                </div>
            @empty
                <p class="p-6 text-sm text-[#5F6A64] text-center">Belum ada pengajuan bantuan.</p>
            @endforelse
        </div>
    </div>

    <!-- Donasi Terbaru -->
    <div class="bg-white rounded-2xl border border-[#DEE4DC] overflow-hidden">
        <div class="px-5 py-4 border-b border-[#DEE4DC] flex items-center justify-between bg-[#F4F7F3]">
            <h2 class="text-sm font-black text-[#1F3B2E]">Donasi Masuk Terbaru</h2>
            <a href="{{ route('admin.donations') }}" class="text-xs font-bold text-[#2A6046] hover:underline">Semua</a>
        </div>
        <div class="divide-y divide-[#DEE4DC]">
            @forelse($recentDonations as $donation)
                <div class="p-4 flex items-center justify-between gap-3">
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-[#1F3B2E] truncate">{{ $donation->donor_name }}</p>
                        <p class="text-xs font-bold text-[#2A6046]">Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
                    </div>
                    <span class="px-2.5 py-1 rounded-full text-[11px] font-bold flex-shrink-0
                        {{ $donation->status === 'verified' ? 'bg-[#EAEFE8] text-[#2A6046]' : ($donation->status === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-amber-100 text-amber-700') }}">
                        {{ ucfirst($donation->status) }}
                    </span>
                </div>
            @empty
                <p class="p-6 text-sm text-[#5F6A64] text-center">Belum ada donasi masuk.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
