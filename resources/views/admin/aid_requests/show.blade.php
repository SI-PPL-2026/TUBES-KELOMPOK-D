@extends('layouts.admin')

@section('title', 'Verifikasi Pengajuan #' . $aidRequest->id . ' - SIDAPUR')
@section('page_title', 'Verifikasi Berkas & Persetujuan Bantuan (US-13)')

@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('admin.aid_requests.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800 flex items-center">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Antrean
        </a>
        <div>
            {!! $aidRequest->status_badge !!}
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left Column: Data & Berkas Verifikasi (8 Cols) -->
        <div class="lg:col-span-8 space-y-6">
            
            <!-- Card 1: Data Diri Mahasiswa & Alasan Permohonan -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-xs">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-6">
                    <h2 class="text-lg font-bold text-slate-900 flex items-center">
                        <i class="fa-solid fa-user-graduate text-brand-500 mr-2.5"></i> Data Pemohon & Kampus
                    </h2>
                    <span class="text-xs text-slate-400">Diajukan: {{ $aidRequest->created_at->format('d F Y, H:i') }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm mb-6">
                    <div>
                        <span class="text-slate-400 font-medium block mb-1">Nama Mahasiswa</span>
                        <span class="font-bold text-slate-900">{{ $aidRequest->user->name }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 font-medium block mb-1">Universitas / Kampus</span>
                        <span class="font-bold text-slate-900">{{ $aidRequest->user->university ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 font-medium block mb-1">Nomor Induk Mahasiswa (NIM)</span>
                        <span class="font-bold text-slate-900">{{ $aidRequest->user->student_id ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 font-medium block mb-1">Nomor Kontak WhatsApp</span>
                        <div class="flex items-center space-x-2">
                            <span class="font-bold text-slate-900">{{ $aidRequest->user->phone ?? '-' }}</span>
                            @if($aidRequest->user->phone)
                                <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $aidRequest->user->phone)) }}" target="_blank"
                                   class="px-2.5 py-1 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-bold text-xs rounded-lg transition-colors flex items-center">
                                    <i class="fa-brands fa-whatsapp mr-1 text-emerald-600"></i> Chat WA
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <span class="text-slate-400 font-medium block mb-1">Alamat Tempat Tinggal / Kos</span>
                        <span class="font-medium text-slate-800">{{ $aidRequest->user->address ?? '-' }}</span>
                    </div>
                </div>

                <!-- Box Alasan Permohonan -->
                <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-200/80">
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-900 block mb-1">Alasan Pengajuan / Kondisi Darurat:</span>
                    <p class="text-slate-800 text-sm leading-relaxed italic">
                        "{{ $aidRequest->reason }}"
                    </p>
                </div>
            </div>

            <!-- Card 2: Bukti KTM & Bukti QRIS Warung -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 mb-6 flex items-center">
                    <i class="fa-solid fa-file-shield text-brand-500 mr-2.5"></i> Pemeriksaan Berkas Fisik (KTM & QRIS Warung)
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Foto KTM -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">Foto Kartu Mahasiswa (KTM)</span>
                            <span class="text-[11px] text-emerald-600 font-semibold"><i class="fa-solid fa-check"></i> Cocokkan Nama & NIM</span>
                        </div>
                        <div class="h-64 rounded-2xl bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center">
                            @if($aidRequest->ktm_photo && file_exists(public_path('storage/' . $aidRequest->ktm_photo)))
                                <a href="{{ asset('storage/' . $aidRequest->ktm_photo) }}" target="_blank" class="w-full h-full">
                                    <img src="{{ asset('storage/' . $aidRequest->ktm_photo) }}" alt="Foto KTM" class="w-full h-full object-contain hover:scale-105 transition-transform">
                                </a>
                            @else
                                <div class="text-center p-4 text-slate-400">
                                    <i class="fa-solid fa-id-card text-4xl mb-2"></i>
                                    <p class="text-xs">Foto KTM Terunggah</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Foto QRIS Warung -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">QRIS Warung Makan</span>
                            <span class="text-[11px] text-brand-600 font-semibold">Tujuan Transfer Bayar</span>
                        </div>
                        <div class="h-64 rounded-2xl bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center">
                            @if($aidRequest->qris_proof && file_exists(public_path('storage/' . $aidRequest->qris_proof)))
                                <a href="{{ asset('storage/' . $aidRequest->qris_proof) }}" target="_blank" class="w-full h-full">
                                    <img src="{{ asset('storage/' . $aidRequest->qris_proof) }}" alt="QRIS Warung" class="w-full h-full object-contain hover:scale-105 transition-transform">
                                </a>
                            @else
                                <div class="text-center p-4 text-slate-400">
                                    <i class="fa-solid fa-qrcode text-4xl mb-2"></i>
                                    <p class="text-xs">Foto QRIS Warung</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                    <span>Warung Tujuan: <strong class="text-slate-800">{{ $aidRequest->stall_name }}</strong></span>
                    <span>Nominal: <strong class="text-emerald-700 text-sm">Rp {{ number_format($aidRequest->nominal, 0, ',', '.') }}</strong></span>
                </div>
            </div>

            <!-- Card 3: Status Log History -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-xs">
                <h3 class="text-base font-bold text-slate-900 mb-4">Riwayat Perubahan Status</h3>
                <div class="space-y-3">
                    @forelse($aidRequest->statusLogs as $log)
                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100 flex items-start justify-between text-xs">
                            <div>
                                <span class="font-bold text-slate-800">Status diubah ke: {{ ucfirst($log->new_status) }}</span>
                                <p class="text-slate-600 mt-0.5">{{ $log->notes }}</p>
                            </div>
                            <span class="text-slate-400 whitespace-nowrap">{{ $log->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                    @empty
                        <div class="text-xs text-slate-400">Belum ada log perlakuan.</div>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- Right Column: Panel Keputusan Admin (4 Cols) -->
        <div class="lg:col-span-4 space-y-6">
            
            <div class="bg-white rounded-3xl p-6 border border-slate-200/90 shadow-xs sticky top-28">
                <h3 class="text-base font-bold text-slate-900 mb-2 flex items-center">
                    <i class="fa-solid fa-gavel text-brand-500 mr-2"></i> Keputusan & Tindakan Admin
                </h3>
                <p class="text-xs text-slate-500 mb-6">Pilih status verifikasi dan catat hasil pengecekan identitas.</p>

                <form action="{{ route('admin.aid_requests.status', $aidRequest) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tindakan / Status Baru *</label>
                        <select name="status" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            <option value="verified" {{ $aidRequest->status === 'verified' ? 'selected' : '' }}>1. KTM Valid & Lolos Wawancara (Verified)</option>
                            <option value="approved" {{ $aidRequest->status === 'approved' ? 'selected' : '' }}>2. Disetujui untuk Pembayaran (Approved)</option>
                            <option value="completed" {{ $aidRequest->status === 'completed' ? 'selected' : '' }}>3. Bayar QRIS Selesai (Completed & Catat Kas Keluar)</option>
                            <option value="rejected" {{ $aidRequest->status === 'rejected' ? 'selected' : '' }}>4. Tolak Pengajuan (Rejected)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Catatan Verifikasi / Alasan *</label>
                        <textarea name="admin_notes" rows="4" required placeholder="Tuliskan catatan hasil verifikasi, misal: KTM valid terdaftar di pddikti, no WA aktif, atau bukti transfer QRIS berhasil..."
                                  class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('admin_notes', $aidRequest->admin_notes) }}</textarea>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 text-[11px] text-slate-600 space-y-1">
                        <div>💡 <strong>Catatan Sistem:</strong></div>
                        <div>Jika Anda memilih status <strong>Completed (Selesai Dibayar)</strong>, sistem secara otomatis akan mencatat pengeluaran kas sebesar <strong>Rp {{ number_format($aidRequest->nominal, 0, ',', '.') }}</strong> di buku kas keuangan (finances).</div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full py-3 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl shadow-md transition-all">
                            Simpan Keputusan & Notifikasi Penerima
                        </button>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>
@endsection
