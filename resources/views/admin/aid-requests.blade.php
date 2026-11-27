@extends('layouts.admin')

@section('title', 'Kelola Pengajuan Bantuan - SIDAPUR')
@section('page_title', 'Verifikasi Pengajuan Bantuan')

@section('content')
<div class="flex flex-wrap items-center gap-2">
    <a href="{{ route('admin.aid-requests') }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold {{ !$status ? 'bg-[#2A6046] text-white' : 'bg-white border border-[#DEE4DC] text-[#5F6A64]' }}">Semua</a>
    <a href="{{ route('admin.aid-requests', ['status' => 'pending']) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold {{ $status === 'pending' ? 'bg-[#2A6046] text-white' : 'bg-white border border-[#DEE4DC] text-[#5F6A64]' }}">Pending</a>
    <a href="{{ route('admin.aid-requests', ['status' => 'approved']) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold {{ $status === 'approved' ? 'bg-[#2A6046] text-white' : 'bg-white border border-[#DEE4DC] text-[#5F6A64]' }}">Disetujui</a>
    <a href="{{ route('admin.aid-requests', ['status' => 'completed']) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold {{ $status === 'completed' ? 'bg-[#2A6046] text-white' : 'bg-white border border-[#DEE4DC] text-[#5F6A64]' }}">Selesai</a>
    <a href="{{ route('admin.aid-requests', ['status' => 'rejected']) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold {{ $status === 'rejected' ? 'bg-[#2A6046] text-white' : 'bg-white border border-[#DEE4DC] text-[#5F6A64]' }}">Ditolak</a>
</div>

<div class="space-y-4">
    @forelse($aidRequests as $aid)
    <div class="bg-white p-6 rounded-2xl border border-[#DEE4DC] space-y-4">
        <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
            <div class="space-y-1.5">
                <div class="flex items-center gap-2.5 flex-wrap">
                    <h3 class="text-base font-black text-[#1F3B2E]">{{ $aid->applicant_name }}</h3>
                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold
                        {{ $aid->status === 'completed' ? 'bg-[#EAEFE8] text-[#2A6046]' : ($aid->status === 'approved' ? 'bg-blue-100 text-blue-700' : ($aid->status === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-amber-100 text-amber-700')) }}">
                        {{ ucfirst($aid->status) }}
                    </span>
                </div>
                <p class="text-xs text-[#5F6A64]">
                    {{ $aid->university }} • NIM: <strong>{{ $aid->nim }}</strong> • WA: <strong>{{ $aid->whatsapp }}</strong> • {{ $aid->created_at->format('d M Y, H:i') }}
                </p>
                <p class="text-sm text-[#1F3B2E] bg-[#F4F7F3] p-3 rounded-xl border border-[#DEE4DC]">{{ $aid->reason }}</p>
                @if($aid->ktm_photo)
                    <a href="{{ asset('storage/' . $aid->ktm_photo) }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#2A6046] hover:underline">
                        <i data-lucide="image" class="w-4 h-4"></i> Lihat Foto KTM
                    </a>
                @endif
            </div>

            <form method="POST" action="{{ route('admin.aid-requests.update', $aid) }}" class="w-full md:w-80 bg-[#F4F7F3] p-4 rounded-xl border border-[#DEE4DC] space-y-3 flex-shrink-0">
                @csrf
                @method('PATCH')
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#5F6A64] mb-1">Ubah Status</label>
                    <select name="status" class="w-full px-3 py-2 bg-white border border-[#DEE4DC] rounded-lg text-xs font-bold">
                        <option value="pending" {{ $aid->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $aid->status === 'approved' ? 'selected' : '' }}>Disetujui</option>
                        <option value="completed" {{ $aid->status === 'completed' ? 'selected' : '' }}>Selesai Disalurkan (Catat Kas)</option>
                        <option value="rejected" {{ $aid->status === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#5F6A64] mb-1">Nominal Penyaluran (Rp)</label>
                    <input type="number" name="nominal" value="{{ (int) $aid->nominal }}" min="0" step="1000" class="w-full px-3 py-2 bg-white border border-[#DEE4DC] rounded-lg text-xs font-bold">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#5F6A64] mb-1">Catatan Pengurus</label>
                    <input type="text" name="admin_notes" value="{{ $aid->admin_notes }}" placeholder="Info tiket/warung..." class="w-full px-3 py-2 bg-white border border-[#DEE4DC] rounded-lg text-xs">
                </div>
                <button type="submit" class="w-full py-2 bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-xs font-bold rounded-lg transition">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="bg-white p-10 rounded-2xl border border-[#DEE4DC] text-center text-sm text-[#5F6A64]">
        Tidak ada pengajuan bantuan pada filter ini.
    </div>
    @endforelse
</div>
@endsection
