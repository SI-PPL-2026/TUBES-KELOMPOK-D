@extends('layouts.admin')

@section('title', 'Kelola Metode Pembayaran - SIDAPUR')
@section('page_title', 'Kelola Rekening & QRIS Donasi (US-16)')

@section('content')
<div class="space-y-6">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Form Tambah Metode Baru (5 Cols) -->
        <div class="lg:col-span-5 bg-white rounded-3xl p-6 border border-slate-200/90 shadow-xs h-fit">
            <h3 class="text-base font-bold text-slate-900 mb-2">Tambah Rekening / QRIS Baru</h3>
            <p class="text-xs text-slate-400 mb-6">Metode yang aktif akan muncul di form donasi donatur.</p>

            <form action="{{ route('admin.payment_methods.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nama Metode / Bank / E-Wallet *</label>
                    <input type="text" name="name" required placeholder="Contoh: QRIS Nasi Darurat / Bank BRI"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nomor Rekening / No. HP E-Wallet *</label>
                    <input type="text" name="account_number" required placeholder="Contoh: 0123-01-089765-53-4"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Atas Nama Rekening *</label>
                    <input type="text" name="account_name" required placeholder="Contoh: Nasi Darurat Purbalingga"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Unggah Foto QR Code / QRIS (Opsional)</label>
                    <input type="file" name="qr_image" accept="image/*"
                           class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 cursor-pointer border border-slate-200 rounded-xl p-1 bg-slate-50">
                </div>

                <div class="flex items-center pt-1">
                    <label class="flex items-center text-xs text-slate-700 font-bold">
                        <input type="checkbox" name="is_active" value="1" checked class="rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                        <span class="ml-2">Aktifkan untuk Donatur</span>
                    </label>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl shadow-md transition-all">
                        Simpan Metode Pembayaran
                    </button>
                </div>
            </form>
        </div>

        <!-- Daftar Metode Pembayaran (7 Cols) -->
        <div class="lg:col-span-7 bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-100">
                <h3 class="text-base font-bold text-slate-900">Daftar Rekening & QRIS Donasi</h3>
                <p class="text-xs text-slate-400">Kelola informasi rekening pembayaran yang digunakan oleh donatur.</p>
            </div>

            <div class="divide-y divide-slate-100">
                @forelse($paymentMethods as $method)
                    <div class="p-6 hover:bg-slate-50/70 transition-colors flex items-start justify-between">
                        <div class="flex items-start space-x-3.5">
                            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center text-lg shrink-0">
                                <i class="fa-solid fa-credit-card"></i>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2">
                                    <h4 class="font-bold text-sm text-slate-900">{{ $method->name }}</h4>
                                    @if($method->is_active)
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Aktif</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-200 text-slate-600">Nonaktif</span>
                                    @endif
                                </div>
                                <div class="text-xs font-mono font-bold text-slate-700 mt-1">{{ $method->account_number }}</div>
                                <div class="text-xs text-slate-400">a.n. {{ $method->account_name }}</div>
                            </div>
                        </div>

                        <form action="{{ route('admin.payment_methods.destroy', $method) }}" method="POST" onsubmit="return confirm('Hapus metode pembayaran ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-rose-500 hover:text-rose-700 rounded-lg transition-colors" title="Hapus">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                @empty
                    <div class="p-8 text-center text-slate-400 text-xs">
                        Belum ada metode pembayaran yang terdaftar.
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
