@extends('layouts.app')

@section('title', 'Kemitraan & Kolaborasi - SIDAPUR')

@section('content')
<div class="py-12 bg-white min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="inline-block px-3 py-1 rounded-full bg-brand-100 text-brand-800 text-xs font-bold uppercase tracking-wider mb-2">Sinergi Kebaikan</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Kemitraan & Kolaborasi SIDAPUR</h1>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Bersama memperluas jangkauan bantuan makanan bagi mahasiswa di Banyumas dan Purbalingga.
            </p>
        </div>

        <!-- Daftar Mitra Aktif (US-29) -->
        <div class="mb-16">
            <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center">
                <i class="fa-solid fa-handshake-angle text-brand-500 mr-2.5"></i> Mitra Warung Makan & Pendukung Resmi
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($partners as $partner)
                    <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-10 h-10 rounded-xl bg-brand-500 text-white flex items-center justify-center text-lg">
                                <i class="fa-solid fa-store"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 text-sm">{{ $partner->name }}</h3>
                                <span class="text-[11px] text-emerald-600 font-semibold"><i class="fa-solid fa-circle-check"></i> Mitra Terverifikasi</span>
                            </div>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed">{{ $partner->proposal_details }}</p>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-8 text-slate-400 text-sm bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                        Belum ada mitra resmi yang terdaftar.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Form Pengajuan Kolaborasi (US-30) -->
        <div class="bg-gradient-to-tr from-slate-900 to-slate-800 text-white rounded-3xl p-8 sm:p-12 shadow-xl">
            <div class="max-w-2xl mx-auto">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold">Ajukan Kerjasama / Jadi Mitra Warung Makan</h2>
                    <p class="text-slate-400 text-xs sm:text-sm mt-2">
                        Apakah Anda memiliki warung makan di sekitar kampus UNSOED, UMP, ITTP/Telkom, UIN Saizu, atau area Purbalingga? Kami siap bekerja sama untuk memfasilitasi transaksi QRIS non-tunai.
                    </p>
                </div>

                <form action="{{ route('collaboration.submit') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Nama Pemilik / Nama Warung / Instansi *</label>
                        <input type="text" name="name" required placeholder="Contoh: Warteg Barokah Kampus Purwokerto"
                               class="w-full px-4 py-3 bg-slate-800/80 border border-slate-700 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Alamat Email *</label>
                            <input type="email" name="email" required placeholder="email@warung.com"
                                   class="w-full px-4 py-3 bg-slate-800/80 border border-slate-700 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Nomor WhatsApp Aktif *</label>
                            <input type="text" name="phone" required placeholder="08xxxxxxxxxx"
                                   class="w-full px-4 py-3 bg-slate-800/80 border border-slate-700 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Rencana Bentuk Kerjasama / Keterangan Warung *</label>
                        <textarea name="proposal_details" rows="4" required placeholder="Tuliskan lokasi warung makan, menu makanan yang disediakan, serta kisaran harga paket hemat..."
                                  class="w-full px-4 py-3 bg-slate-800/80 border border-slate-700 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500"></textarea>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full py-3.5 bg-brand-500 hover:bg-brand-600 text-white font-bold text-sm rounded-xl shadow-lg shadow-brand-500/30 transition-all">
                            Kirim Formulir Kerjasama
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
