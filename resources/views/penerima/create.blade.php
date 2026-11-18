@extends('layouts.app')

@section('title', 'Form Pengajuan Bantuan Darurat - SIDAPUR')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/90 shadow-xl shadow-slate-200/50">
            <div class="border-b border-slate-100 pb-6 mb-8 text-center sm:text-left">
                <span class="inline-block px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold uppercase tracking-wider mb-2">Formulir Cepat (< 3 Menit)</span>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Ajukan Bantuan Nasi Darurat</h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-1">
                    Silakan isi data dengan jujur. Bantuan disalurkan langsung secara non-tunai melalui QRIS warung makan.
                </p>
            </div>

            <form action="{{ route('penerima.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Section 1: Data Diri Mahasiswa (US-08) -->
                <div>
                    <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4 flex items-center">
                        <i class="fa-solid fa-id-card text-emerald-600 mr-2"></i> 1. Identitas Mahasiswa
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Asal Universitas / Kampus *</label>
                            <input type="text" name="university" value="{{ old('university', $user->university) }}" required placeholder="Contoh: UNSOED / UMP / ITTP"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nomor Mahasiswa (NIM) *</label>
                            <input type="text" name="student_id" value="{{ old('student_id', $user->student_id) }}" required placeholder="Contoh: H1D022045"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nomor WhatsApp Aktif *</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" required placeholder="08xxxxxxxxxx"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Alamat Tempat Tinggal / Kos *</label>
                            <input type="text" name="address" value="{{ old('address', $user->address) }}" required placeholder="Kos Melati, Grendeng, Purwokerto"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Unggah Foto Kartu Tanda Mahasiswa (KTM) *</label>
                        <input type="file" name="ktm_photo" required accept="image/*"
                               class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer border border-slate-200 rounded-xl p-1 bg-slate-50">
                        <span class="text-[11px] text-slate-400 mt-1 block">Format JPG/PNG, maks 3MB. Dijamin aman & dirahasiakan oleh pengelola.</span>
                    </div>
                </div>

                <!-- Section 2: Detail Bantuan & Warung Makan (US-09) -->
                <div class="pt-6 border-t border-slate-100">
                    <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4 flex items-center">
                        <i class="fa-solid fa-utensils text-emerald-600 mr-2"></i> 2. Rincian Bantuan & Warung Makan
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Jenis Bantuan *</label>
                            <select name="assistance_type" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                <option value="Makanan Siap Santap">Makanan Siap Santap (Nasi Bungkus)</option>
                                <option value="Obat-obatan Darurat">Obat-obatan Darurat / Anak Kos Sakit</option>
                                <option value="Token Listrik Kos">Token Listrik Kos Mendesak</option>
                                <option value="Kebutuhan Darurat Lain">Kebutuhan Darurat Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nama Warung Makan / Toko Terdekat *</label>
                            <input type="text" name="stall_name" value="{{ old('stall_name') }}" required placeholder="Contoh: Warteg Berkah Grendeng"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nominal Bantuan yang Dibutuhkan (Rp) *</label>
                            <input type="number" name="nominal" value="{{ old('nominal', 20000) }}" required min="5000" max="50000" step="1000"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <span class="text-[11px] text-slate-400 mt-1 block">Standar bantuan porsi makan darurat: Rp 15.000 - Rp 25.000.</span>
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Alasan Pengajuan / Kondisi Darurat Anda *</label>
                            <textarea name="reason" rows="3" required placeholder="Ceritakan secara singkat alasan permohonan bantuan (misal: kiriman ortu telat 3 hari, uang saku habis karena mendadak beli obat, dsb)..."
                                      class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ old('reason') }}</textarea>
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Unggah Foto Kode QRIS Warung / Toko Makan *</label>
                            <input type="file" name="qris_proof" required accept="image/*"
                                   class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer border border-slate-200 rounded-xl p-1 bg-slate-50">
                            <span class="text-[11px] text-slate-400 mt-1 block">Foto barcode QRIS yang ada di meja atau kasir warung makan yang Anda datangi. Admin akan mentransfer pembayaran langsung ke QRIS tersebut.</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-between border-t border-slate-100">
                    <a href="{{ route('penerima.dashboard') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
                        &larr; Kembali ke Dashboard
                    </a>
                    <button type="submit" class="px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm rounded-xl shadow-lg shadow-emerald-600/30 transition-all flex items-center space-x-2">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>Kirim Permohonan Bantuan</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
