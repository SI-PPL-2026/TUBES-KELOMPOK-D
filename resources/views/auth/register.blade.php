@extends('layouts.app')

@section('title', 'Daftar Akun Baru - SIDAPUR')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-lg mx-4" x-data="{ role: '{{ old('role', $selectedRole) }}' }">
        
        <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xl shadow-slate-200/50">
            <div class="text-center mb-6">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-brand-500 to-amber-400 text-white flex items-center justify-center text-2xl mx-auto mb-3 shadow-md">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <h1 class="text-2xl font-black text-slate-900">Pendaftaran Akun SIDAPUR</h1>
                <p class="text-slate-500 text-xs mt-1">Pilih peran akun yang sesuai dengan kebutuhan Anda</p>
            </div>

            <!-- Role Selector Tabs -->
            <div class="grid grid-cols-2 gap-3 p-1.5 bg-slate-100 rounded-2xl mb-6">
                <button type="button" @click="role = 'donatur'"
                        :class="role === 'donatur' ? 'bg-white text-brand-600 shadow-sm font-bold' : 'text-slate-600 font-medium'"
                        class="py-2.5 rounded-xl text-xs transition-all flex items-center justify-center space-x-2">
                    <i class="fa-solid fa-heart"></i>
                    <span>Sebagai Donatur</span>
                </button>
                <button type="button" @click="role = 'penerima'"
                        :class="role === 'penerima' ? 'bg-white text-emerald-600 shadow-sm font-bold' : 'text-slate-600 font-medium'"
                        class="py-2.5 rounded-xl text-xs transition-all flex items-center justify-center space-x-2">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span>Mahasiswa (Penerima)</span>
                </button>
            </div>

            <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="role" :value="role">

                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        <span x-text="role === 'donatur' ? 'Nama Donatur / Panggilan' : 'Nama Lengkap Mahasiswa'">Nama</span> *
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Budi Santoso"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <!-- Email & No WA -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Alamat Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="email@domain.com"
                               class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">No. WhatsApp *</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="08xxxxxxxxxx"
                               class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <!-- Khusus Penerima: Kampus & NIM -->
                <div x-show="role === 'penerima'" x-cloak class="space-y-4 pt-2 border-t border-slate-100">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Asal Kampus / Universitas *</label>
                            <input type="text" name="university" value="{{ old('university') }}" placeholder="Contoh: UNSOED / UMP / ITTP"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nomor Mahasiswa (NIM) *</label>
                            <input type="text" name="student_id" value="{{ old('student_id') }}" placeholder="Contoh: H1D022045"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Alamat Tempat Tinggal / Kos *</label>
                        <textarea name="address" rows="2" placeholder="Alamat kos di Purwokerto atau Purbalingga..."
                                  class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('address') }}</textarea>
                    </div>
                </div>

                <!-- Password -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Kata Sandi *</label>
                        <input type="password" name="password" required placeholder="Minimal 6 karakter"
                               class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Konfirmasi Sandi *</label>
                        <input type="password" name="password_confirmation" required placeholder="Ulangi sandi"
                               class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                            :class="role === 'donatur' ? 'bg-brand-500 hover:bg-brand-600 shadow-brand-500/25' : 'bg-emerald-600 hover:bg-emerald-700 shadow-emerald-600/25'"
                            class="w-full py-3 text-white font-bold text-sm rounded-xl shadow-lg transition-all">
                        <span x-text="role === 'donatur' ? 'Daftar Sebagai Donatur' : 'Daftar Sebagai Mahasiswa (Penerima)'">Daftar</span>
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center text-xs text-slate-500">
                Sudah memiliki akun? 
                <a href="{{ route('login') }}" class="font-bold text-brand-600 hover:underline">Masuk disini</a>
            </div>

        </div>

    </div>
</div>
@endsection
