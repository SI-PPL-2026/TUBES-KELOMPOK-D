@extends('layouts.app')

@section('title', 'Ulasan & Testimoni - SIDAPUR')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="inline-block px-3 py-1 rounded-full bg-brand-100 text-brand-800 text-xs font-bold uppercase tracking-wider mb-2">Suara Komunitas</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Ulasan & Testimoni SIDAPUR</h1>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Pesan, evaluasi, dan kesan dari para donatur dan mahasiswa penerima bantuan Nasi Darurat Purbalingga-Purwokerto.
            </p>
        </div>

        <!-- Form Tulis Ulasan (US-32, US-33) -->
        <div id="tulis-ulasan" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs mb-14">
            <h2 class="text-xl font-bold text-slate-900 mb-2">Bagikan Ulasan / Pengalaman Anda</h2>
            <p class="text-xs text-slate-500 mb-6">Ulasan Anda sangat berarti untuk evaluasi dan keberlanjutan program kerelawanan ini.</p>

            @auth
                <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Penilaian Bintang (Rating) *</label>
                        <select name="rating" required class="w-full sm:w-60 px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-brand-500">
                            <option value="5">⭐⭐⭐⭐⭐ (5/5) Sangat Puas</option>
                            <option value="4">⭐⭐⭐⭐ (4/5) Puas</option>
                            <option value="3">⭐⭐⭐ (3/5) Cukup</option>
                            <option value="2">⭐⭐ (2/5) Kurang</option>
                            <option value="1">⭐ (1/5) Perlu Evaluasi</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Pesan Ulasan / Kesan / Masukan *</label>
                        <textarea name="comment" rows="3" required placeholder="Tuliskan masukan atau pengalaman Anda..."
                                  class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2.5 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl shadow-md transition-colors">
                            Kirim Ulasan Saya
                        </button>
                    </div>
                </form>
            @else
                <div class="p-5 rounded-2xl bg-brand-50 border border-brand-200 flex flex-col sm:flex-row items-center justify-between">
                    <div class="flex items-center space-x-3 mb-3 sm:mb-0">
                        <i class="fa-solid fa-lock text-brand-600 text-xl"></i>
                        <span class="text-xs sm:text-sm text-brand-900 font-medium">Anda harus masuk ke akun donatur atau penerima untuk dapat menulis ulasan.</span>
                    </div>
                    <a href="{{ route('login') }}" class="px-5 py-2 bg-brand-500 hover:bg-brand-600 text-white text-xs font-bold rounded-xl transition-colors shrink-0">
                        Masuk Akun
                    </a>
                </div>
            @endauth
        </div>

        <!-- Daftar Ulasan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($reviews as $item)
                <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center text-amber-400 text-xs space-x-1">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="{{ $i <= ($item->rating ?? 5) ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
                                @endfor
                            </div>
                            <span class="text-[11px] text-slate-400">{{ $item->created_at->format('d M Y') }}</span>
                        </div>
                        <p class="text-slate-700 text-sm leading-relaxed mb-4">
                            "{{ $item->comment }}"
                        </p>
                    </div>

                    <div class="flex items-center space-x-3 pt-4 border-t border-slate-100">
                        <div class="w-9 h-9 rounded-full bg-brand-100 text-brand-700 font-bold flex items-center justify-center text-xs">
                            {{ strtoupper(substr($item->user->name ?? 'A', 0, 1)) }}
                        </div>
                        <div>
                            <div class="text-xs font-bold text-slate-900">{{ $item->user->name ?? 'Anonim' }}</div>
                            <div class="text-[10px] text-slate-400 capitalize">Pengguna ({{ $item->user->role ?? 'User' }})</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center py-12 text-slate-400">
                    Belum ada ulasan yang diterbitkan.
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $reviews->links() }}
        </div>

    </div>
</div>
@endsection
