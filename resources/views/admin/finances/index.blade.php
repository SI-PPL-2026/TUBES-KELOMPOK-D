@extends('layouts.admin')

@section('title', 'Buku Kas & Keuangan - SIDAPUR')
@section('page_title', 'Pencatatan Keuangan & Rekap Kas (US-15)')

@section('content')
<div class="space-y-6">

    <!-- 3 Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-xs">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Total Pemasukan (Inflow)</span>
            <div class="text-2xl font-black text-emerald-600">
                Rp {{ number_format($totalInflow, 0, ',', '.') }}
            </div>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-xs">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Total Pengeluaran (Outflow)</span>
            <div class="text-2xl font-black text-rose-600">
                Rp {{ number_format($totalOutflow, 0, ',', '.') }}
            </div>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-xs">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Sisa Saldo Kas Aktif</span>
            <div class="text-2xl font-black text-sky-800">
                Rp {{ number_format($balance, 0, ',', '.') }}
            </div>
        </div>
    </div>

    <!-- Form Tambah Catatan Kas Manual (Modal/Card) -->
    <div x-data="{ showForm: false }" class="bg-white rounded-3xl p-6 border border-slate-200/90 shadow-xs">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-base font-bold text-slate-900">Catatan Buku Kas</h3>
                <p class="text-xs text-slate-400">Pemasukan dari donasi dan pengeluaran bantuan dicatat otomatis. Tambahkan mutasi operasional lainnya jika ada.</p>
            </div>
            <button @click="showForm = !showForm" class="px-4 py-2 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl shadow-xs transition-colors flex items-center space-x-1.5">
                <i :class="showForm ? 'fa-solid fa-minus' : 'fa-solid fa-plus'"></i>
                <span x-text="showForm ? 'Tutup Form' : 'Catat Transaksi Manual'"></span>
            </button>
        </div>

        <div x-show="showForm" x-cloak class="mt-6 pt-6 border-t border-slate-100">
            <form action="{{ route('admin.finances.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Jenis Arus Kas *</label>
                    <select name="type" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:ring-2 focus:ring-brand-500">
                        <option value="inflow">Pemasukan (Donasi / Titipan Tunai / Kas Mandiri)</option>
                        <option value="outflow">Pengeluaran (Bantuan Warung / Operasional Darurat)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nominal (Rp) *</label>
                    <input type="number" name="amount" min="1000" step="500" required placeholder="Contoh: 50000"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Keterangan Transaksi *</label>
                    <input type="text" name="description" required placeholder="Contoh: Pembelian beras dapur darurat atau donasi offline..."
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Unggah Bukti Struk / Struk QRIS (Opsional)</label>
                    <input type="file" name="proof" accept="image/*"
                           class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 cursor-pointer border border-slate-200 rounded-xl p-1 bg-slate-50">
                </div>

                <div class="sm:col-span-2 flex justify-end pt-2">
                    <button type="submit" class="px-6 py-2.5 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl shadow-md transition-colors">
                        Simpan Transaksi Kas
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Mutasi Keuangan Table -->
    <div class="bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-sm font-bold text-slate-900">Rincian Seluruh Mutasi Keuangan</h3>
            <div class="flex space-x-2 text-xs">
                <a href="{{ route('admin.finances.index') }}" class="px-3 py-1.5 rounded-lg border {{ empty($type) ? 'bg-slate-900 text-white' : 'bg-slate-50 text-slate-600' }}">Semua</a>
                <a href="{{ route('admin.finances.index', ['type' => 'inflow']) }}" class="px-3 py-1.5 rounded-lg border {{ $type === 'inflow' ? 'bg-emerald-600 text-white' : 'bg-slate-50 text-slate-600' }}">Pemasukan</a>
                <a href="{{ route('admin.finances.index', ['type' => 'outflow']) }}" class="px-3 py-1.5 rounded-lg border {{ $type === 'outflow' ? 'bg-rose-600 text-white' : 'bg-slate-50 text-slate-600' }}">Pengeluaran</a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-bold tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="py-4 px-6">Tanggal</th>
                        <th class="py-4 px-6">Tipe Arus</th>
                        <th class="py-4 px-6">Keterangan</th>
                        <th class="py-4 px-6">Nominal</th>
                        <th class="py-4 px-6">Dicatat Oleh</th>
                        <th class="py-4 px-6 text-right">Bukti</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($finances as $fin)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-4 px-6 whitespace-nowrap text-slate-400">
                                {{ $fin->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                @if($fin->type === 'inflow')
                                    <span class="px-2.5 py-0.5 rounded-full font-bold text-[11px] bg-emerald-100 text-emerald-800">
                                        <i class="fa-solid fa-arrow-down mr-1"></i> Inflow
                                    </span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full font-bold text-[11px] bg-rose-100 text-rose-800">
                                        <i class="fa-solid fa-arrow-up mr-1"></i> Outflow
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 font-medium text-slate-800">
                                {{ $fin->description }}
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap font-bold {{ $fin->type === 'inflow' ? 'text-emerald-600' : 'text-rose-600' }}">
                                {{ $fin->type === 'inflow' ? '+' : '-' }} Rp {{ number_format($fin->amount, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-6 text-slate-400 whitespace-nowrap">
                                {{ $fin->user->name ?? 'Admin' }}
                            </td>
                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                @if($fin->proof && file_exists(public_path('storage/' . $fin->proof)))
                                    <a href="{{ asset('storage/' . $fin->proof) }}" target="_blank" class="text-brand-600 hover:underline font-bold">
                                        <i class="fa-solid fa-image mr-1"></i> Lihat
                                    </a>
                                @else
                                    <span class="text-slate-300">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                Belum ada riwayat transaksi kas tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-slate-100">
            {{ $finances->links() }}
        </div>
    </div>

</div>
@endsection
