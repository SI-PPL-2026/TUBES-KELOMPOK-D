@extends('layouts.app')

@section('title', 'Masuk Akun - SIDAPUR')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md mx-4">
        
        <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xl shadow-slate-200/50">
            <div class="text-center mb-8">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-brand-500 to-amber-400 text-white flex items-center justify-center text-2xl mx-auto mb-3 shadow-md">
                    <i class="fa-solid fa-bowl-rice"></i>
                </div>
                <h1 class="text-2xl font-black text-slate-900">Masuk ke SIDAPUR</h1>
                <p class="text-slate-500 text-xs mt-1">Sistem Pengelolaan Bantuan Nasi Darurat</p>
            </div>

            <!-- Quick Demo Accounts (Sangat membantu dosen / tim saat penilaian Tubes) -->
            <div class="mb-6 p-3.5 rounded-2xl bg-brand-50 border border-brand-200 text-xs">
                <div class="font-bold text-brand-900 mb-1.5 flex items-center">
                    <i class="fa-solid fa-key mr-1.5 text-brand-600"></i> Akun Uji Coba Cepat (Tubes Demo):
                </div>
                <div class="grid grid-cols-3 gap-1.5 text-center">
                    <button type="button" onclick="fillLogin('admin@sidapur.org', 'password')" class="px-2 py-1 bg-white hover:bg-brand-100 rounded-lg border border-brand-200 text-[11px] font-bold text-slate-700 transition-colors">
                        Admin
                    </button>
                    <button type="button" onclick="fillLogin('donatur@sidapur.org', 'password')" class="px-2 py-1 bg-white hover:bg-brand-100 rounded-lg border border-brand-200 text-[11px] font-bold text-slate-700 transition-colors">
                        Donatur
                    </button>
                    <button type="button" onclick="fillLogin('rian@mhs.unsoed.ac.id', 'password')" class="px-2 py-1 bg-white hover:bg-brand-100 rounded-lg border border-brand-200 text-[11px] font-bold text-slate-700 transition-colors">
                        Penerima
                    </button>
                </div>
            </div>

            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Alamat Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                               class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Kata Sandi</label>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password" required
                               class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center text-slate-600">
                        <input type="checkbox" name="remember" class="rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                        <span class="ml-2">Ingat saya</span>
                    </label>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3 bg-brand-500 hover:bg-brand-600 text-white font-bold text-sm rounded-xl shadow-lg shadow-brand-500/25 transition-all">
                        Masuk ke Akun
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center text-xs text-slate-500">
                Belum memiliki akun? 
                <a href="{{ route('register') }}" class="font-bold text-brand-600 hover:underline">Daftar sekarang</a>
            </div>

        </div>

    </div>
</div>

<script>
    function fillLogin(email, pass) {
        document.getElementById('email').value = email;
        document.getElementById('password').value = pass;
    }
</script>
@endsection
