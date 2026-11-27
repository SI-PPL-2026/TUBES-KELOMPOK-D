@extends('layouts.admin')

@section('title', 'Verifikasi Donasi - SIDAPUR')
@section('page_title', 'Verifikasi Donasi Masuk')

@section('content')
<div class="flex flex-wrap items-center gap-2">
    <a href="{{ route('admin.donations') }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold {{ !$status ? 'bg-[#2A6046] text-white' : 'bg-white border border-[#DEE4DC] text-[#5F6A64]' }}">Semua</a>
    <a href="{{ route('admin.donations', ['status' => 'pending']) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold {{ $status === 'pending' ? 'bg-[#2A6046] text-white' : 'bg-white border border-[#DEE4DC] text-[#5F6A64]' }}">Menunggu Verifikasi</a>
    <a href="{{ route('admin.donations', ['status' => 'verified']) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold {{ $status === 'verified' ? 'bg-[#2A6046] text-white' : 'bg-white border border-[#DEE4DC] text-[#5F6A64]' }}">Terverifikasi</a>
    <a href="{{ route('admin.donations', ['status' => 'rejected']) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold {{ $status === 'rejected' ? 'bg-[#2A6046] text-white' : 'bg-white border border-[#DEE4DC] text-[#5F6A64]' }}">Ditolak</a>
</div>

<div class="bg-white rounded-2xl border border-[#DEE4DC] overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-[#DEE4DC] text-[11px] font-bold uppercase tracking-wider text-[#5F6A64] bg-[#F4F7F3]">
                    <th class="px-5 py-3.5">Tanggal</th>
                    <th class="px-5 py-3.5">Donatur</th>
                    <th class="px-5 py-3.5">Nominal</th>
                    <th class="px-5 py-3.5">Bukti</th>
                    <th class="px-5 py-3.5">Status</th>
                    <th class="px-5 py-3.5">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#DEE4DC] text-sm">
                @forelse($donations as $donation)
                <tr class="hover:bg-[#F4F7F3]/50">
                    <td class="px-5 py-4 text-xs text-[#5F6A64]">{{ $donation->created_at->format('d M Y, H:i') }}</td>
                    <td class="px-5 py-4">
                        <p class="font-bold text-[#1F3B2E]">{{ $donation->donor_name }}</p>
                        <p class="text-xs text-[#5F6A64]">WA: {{ $donation->whatsapp }}</p>
                    </td>
                    <td class="px-5 py-4 font-black text-[#2A6046]">Rp {{ number_format($donation->amount, 0, ',', '.') }}</td>
                    <td class="px-5 py-4 text-xs">
                        @if($donation->transfer_proof)
                            <a href="{{ asset('storage/' . $donation->transfer_proof) }}" target="_blank" class="font-bold text-[#2A6046] hover:underline">Lihat Bukti</a>
                        @else
                            <span class="text-[#5F6A64]">-</span>
                        @endif
                    </td>
                    <td class="px-5 py-4">
                        <span class="px-2.5 py-1 rounded-full text-xs font-bold
                            {{ $donation->status === 'verified' ? 'bg-[#EAEFE8] text-[#2A6046]' : ($donation->status === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-amber-100 text-amber-700') }}">
                            {{ ucfirst($donation->status) }}
                        </span>
                    </td>
                    <td class="px-5 py-4">
                        <form method="POST" action="{{ route('admin.donations.update', $donation) }}" class="flex items-center gap-2">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="px-2.5 py-1.5 bg-[#F4F7F3] border border-[#DEE4DC] rounded-lg text-xs font-bold">
                                <option value="pending" {{ $donation->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="verified" {{ $donation->status === 'verified' ? 'selected' : '' }}>Verifikasi (Masuk Kas)</option>
                                <option value="rejected" {{ $donation->status === 'rejected' ? 'selected' : '' }}>Tolak</option>
                            </select>
                            <button type="submit" class="px-3 py-1.5 bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-xs font-bold rounded-lg transition">
                                Simpan
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-8 text-center text-sm text-[#5F6A64]">Belum ada data donasi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
