@extends('layouts.app')

@section('title', 'Masuk ke Akun - SIDAPUR')

@section('content')
<section class="w-full bg-[#EAEFE8] py-16 sm:py-24 flex items-center justify-center">
    <div class="max-w-md w-full mx-auto px-4">
        
        <div class="bg-white p-8 sm:p-10 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-6">
            
            <div class="text-center space-y-2">
                <div class="w-12 h-12 rounded-xl bg-[#2A6046] text-white flex items-center justify-center mx-auto shadow-sm">
                    <!-- Bag + Heart Logo -->
                    <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.5 7.5 C7.5 5.5 6.5 2.5 8.5 2 C10 1.7 10.8 4.5 12 6.5 C13.2 4.5 14 1.7 15.5 2 C17.5 2.5 16.5 5.5 15.5 7.5 C18.5 8 21 10.5 21 14 C21 18.5 17 22 12 22 C7 22 3 18.5 3 14 C3 10.5 5.5 8 8.5 7.5 Z" stroke="white" stroke-width="1.5" stroke-linejoin="round"/>
                        <path d="M12 18.5 C12 18.5 7.5 15 7.5 11.5 C7.5 9.5 9 8.5 10.5 8.5 C11.3 8.5 12 9.3 12 9.3 C12 9.3 12.7 8.5 13.5 8.5 C15 8.5 16.5 9.5 16.5 11.5 C16.5 15 12 18.5 12 18.5 Z" stroke="#86efac" stroke-width="1.5" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-black text-[#1F3B2E] tracking-tight">Masuk ke SIDAPUR</h1>
                <p class="text-xs sm:text-sm text-[#5F6A64]">
                    Masuk untuk memantau status pengajuan atau riwayat donasi Anda.
                </p>
            </div>

            {{-- Tampilkan error validasi jika ada --}}
            @if ($errors->any())
                <div class="p-3.5 bg-red-50 border border-red-200 rounded-xl text-xs text-red-700 font-semibold flex items-start gap-2">
                    <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="/login" method="POST" class="space-y-4">
                @csrf
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="nama@email.com"
                        class="w-full px-4 py-3 bg-[#F4F7F3] border {{ $errors->has('email') ? 'border-red-400' : 'border-[#DEE4DC]' }} rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                </div>

                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">Kata Sandi</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs text-[#2A6046] font-semibold hover:underline">Lupa sandi?</a>
                        @endif
                    </div>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="••••••••"
                        class="w-full px-4 py-3 bg-[#F4F7F3] border {{ $errors->has('password') ? 'border-red-400' : 'border-[#DEE4DC]' }} rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                </div>

                <div class="flex items-center gap-2">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-[#DEE4DC] text-[#2A6046] focus:ring-[#2A6046]">
                    <label for="remember_me" class="text-xs text-[#5F6A64] font-semibold cursor-pointer">Ingat saya</label>
                </div>

                <button type="submit" class="w-full py-3.5 bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-[15px] font-bold rounded-xl shadow-sm transition">
                    Masuk Sekarang
                </button>
            </form>

            <div class="pt-4 border-t border-[#DEE4DC] text-center text-xs text-[#5F6A64]">
                Belum memiliki akun? 
                <a href="{{ route('register') }}" class="font-bold text-[#2A6046] hover:underline">Daftar sekarang</a>
            </div>

        </div>

    </div>
</section>
@endsection
