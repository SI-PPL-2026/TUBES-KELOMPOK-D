@extends('layouts.admin')

@section('title', 'Kas & Transparansi - SIDAPUR')
@section('page_title', 'Manajemen Kas & Transparansi')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
    <div class="bg-white p-5 rounded-2xl border border-[#DEE4DC]">
        <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Total Pemasukan</p>
        <p class="text-2xl font-black text-[#2A6046] mt-2">Rp {{ number_format($totalInflow, 0, ',', '.') }}</p>
    </div>
    <div class="bg-white p-5 rounded-2xl border border-[#DEE4DC]">
        <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Total Pengeluaran</p>
        <p class="text-2xl font-black text-rose-600 mt-2">Rp {{ number_format($totalOutflow, 0, ',', '.') }}</p>
    </div>
    <div class="bg-white p-5 rounded-2xl border-2 border-[#2A6046]">
        <p class="text-xs font-bold uppercase tracking-wider text-[#2A6046]">Saldo Kas Bersih</p>
        <p class="text-2xl font-black text-[#1F3B2E] mt-2">Rp {{ number_format($balance, 0, ',', '.') }}</p>
    </div>
</div>

<!-- Form Tambah Catatan Kas Manual -->
<div class="bg-white p-6 rounded-2xl border border-[#DEE4DC]">
    <h2 class="text-base font-black text-[#1F3B2E] mb-4">Catat Transaksi Kas Operasional</h2>
    <form method="POST" action="{{ route('admin.finances.store') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
        @csrf
        <div>
            <label class="block text-xs font-bold uppercase text-[#5F6A64] mb-1">Jenis</label>
            <select name="type" required class="w-full px-3.5 py-2.5 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm font-bold">
                <option value="outflow">Pengeluaran (Outflow)</option>
                <option value="inflow">Pemasukan (Inflow)</option>
            </select>
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-[#5F6A64] mb-1">Nominal (Rp)</label>
            <input type="number" name="amount" min="1000" step="1000" required placeholder="150000" class="w-full px-3.5 py-2.5 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm font-bold">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-[#5F6A64] mb-1">Keterangan</label>
            <input type="text" name="description" required placeholder="Contoh: Belanja bahan dapur / warung mitra" class="w-full px-3.5 py-2.5 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm">
        </div>
        <button type="submit" class="py-2.5 px-5 bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-sm font-bold rounded-xl transition">
            + Tambah Catatan
        </button>
    </form>
</div>

<!-- Tabel Riwayat Kas -->
<div class="bg-white rounded-2xl border border-[#DEE4DC] overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-[#DEE4DC] text-[11px] font-bold uppercase tracking-wider text-[#5F6A64] bg-[#F4F7F3]">
                    <th class="px-5 py-3.5">Tanggal</th>
                    <th class="px-5 py-3.5">Keterangan</th>
                    <th class="px-5 py-3.5">Jenis</th>
                    <th class="px-5 py-3.5">Nominal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#DEE4DC] text-sm">
                @forelse($finances as $finance)
                <tr>
                    <td class="px-5 py-3.5 text-xs text-[#5F6A64]">{{ $finance->created_at->format('d M Y, H:i') }}</td>
                    <td class="px-5 py-3.5 font-semibold text-[#1F3B2E]">{{ $finance->description }}</td>
                    <td class="px-5 py-3.5">
                        @if($finance->type === 'inflow')
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-[#EAEFE8] text-[#2A6046]">Masuk</span>
                        @else
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-rose-100 text-rose-700">Keluar</span>
                        @endif
                    </td>
                    <td class="px-5 py-3.5 font-black {{ $finance->type === 'inflow' ? 'text-[#2A6046]' : 'text-rose-600' }}">
                        {{ $finance->type === 'inflow' ? '+' : '-' }} Rp {{ number_format($finance->amount, 0, ',', '.') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-5 py-8 text-center text-sm text-[#5F6A64]">Belum ada transaksi kas tercatat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
