@extends('layouts.app')

@section('title', 'Masuk ke Akun - SIDAPUR')

@section('content')
<section class="w-full bg-[#EAEFE8] py-16 sm:py-24 flex items-center justify-center">
    <div class="max-w-md w-full mx-auto px-4">
        
        <div class="bg-white p-8 sm:p-10 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-6">
            
            <div class="text-center space-y-2">
                <div class="w-12 h-12 rounded-xl bg-[#2A6046] text-white flex items-center justify-center mx-auto shadow-sm">
                    <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2v2"></path>
                        <path d="M7 3v2"></path>
                        <path d="M17 3v2"></path>
                        <path d="M2 10h20a10 10 0 0 1-20 0z"></path>
                        <path d="M6 19h12"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-black text-[#1F3B2E] tracking-tight">Masuk ke SIDAPUR</h1>
                <p class="text-xs sm:text-sm text-[#5F6A64]">
                    Masuk untuk memantau status pengajuan atau riwayat donasi Anda.
                </p>
            </div>

            <form action="{{ route('home') }}" method="GET" class="space-y-4">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">Email / WhatsApp</label>
                    <input type="text" required placeholder="nama@email.com atau 0812..."
                        class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                </div>

                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">Kata Sandi</label>
                        <a href="#" class="text-xs text-[#2A6046] font-semibold hover:underline">Lupa sandi?</a>
                    </div>
                    <input type="password" required placeholder="••••••••"
                        class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
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
