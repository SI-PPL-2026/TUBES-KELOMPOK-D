@extends('layouts.app')

@section('title', 'Ubah Pengajuan Bantuan - SIDAPUR')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/90 shadow-xl shadow-slate-200/50">
            <div class="border-b border-slate-100 pb-6 mb-8">
                <span class="inline-block px-3 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold uppercase tracking-wider mb-2">Edit Pengajuan (US-10)</span>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Perbarui Rincian Permohonan Bantuan</h1>
                <p class="text-slate-500 text-xs mt-1">Anda dapat mengubah rincian permohonan selama belum diverifikasi oleh pengelola.</p>
            </div>

            <form action="{{ route('penerima.update', $aidRequest) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Jenis Bantuan *</label>
                        <select name="assistance_type" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <option value="Makanan Siap Santap" {{ $aidRequest->assistance_type === 'Makanan Siap Santap' ? 'selected' : '' }}>Makanan Siap Santap (Nasi Bungkus)</option>
                            <option value="Obat-obatan Darurat" {{ $aidRequest->assistance_type === 'Obat-obatan Darurat' ? 'selected' : '' }}>Obat-obatan Darurat / Anak Kos Sakit</option>
                            <option value="Token Listrik Kos" {{ $aidRequest->assistance_type === 'Token Listrik Kos' ? 'selected' : '' }}>Token Listrik Kos Mendesak</option>
                            <option value="Kebutuhan Darurat Lain" {{ $aidRequest->assistance_type === 'Kebutuhan Darurat Lain' ? 'selected' : '' }}>Kebutuhan Darurat Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nama Warung Makan / Toko Terdekat *</label>
                        <input type="text" name="stall_name" value="{{ old('stall_name', $aidRequest->stall_name) }}" required
                               class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nominal Bantuan (Rp) *</label>
                        <input type="number" name="nominal" value="{{ old('nominal', (int)$aidRequest->nominal) }}" required min="5000" max="50000" step="1000"
                               class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Alasan Permohonan *</label>
                        <textarea name="reason" rows="3" required
                                  class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ old('reason', $aidRequest->reason) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Ganti Foto KTM (Opsional)</label>
                        <input type="file" name="ktm_photo" accept="image/*"
                               class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer border border-slate-200 rounded-xl p-1 bg-slate-50">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Ganti Foto QRIS Warung (Opsional)</label>
                        <input type="file" name="qris_proof" accept="image/*"
                               class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer border border-slate-200 rounded-xl p-1 bg-slate-50">
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-between border-t border-slate-100">
                    <a href="{{ route('penerima.show', $aidRequest) }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
                        Batal & Kembali
                    </a>
                    <button type="submit" class="px-8 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl shadow-md transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
