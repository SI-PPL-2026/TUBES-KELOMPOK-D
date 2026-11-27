@extends('layouts.app')

@section('title', 'Daftar Akun Baru - SIDAPUR')

@section('content')
<section class="w-full bg-[#EAEFE8] py-16 sm:py-20 flex items-center justify-center">
    <div class="max-w-md w-full mx-auto px-4">
        
        <div class="bg-white p-8 sm:p-10 rounded-2xl border border-[#DEE4DC] shadow-sm space-y-6">
            
            <div class="text-center space-y-2">
                <div class="w-12 h-12 rounded-xl bg-white border border-[#DEE4DC] flex items-center justify-center mx-auto shadow-sm overflow-hidden">
                    <img src="{{ asset('images/logo.png') }}" alt="SIDAPUR Logo" class="w-10 h-10 object-contain">
                </div>
                <h1 class="text-2xl font-black text-[#1F3B2E] tracking-tight">Daftar Akun SIDAPUR</h1>
                <p class="text-xs sm:text-sm text-[#5F6A64]">
                    Satu akun untuk berdonasi maupun mengajukan bantuan Nasi Darurat.
                </p>
            </div>

            @if ($errors->any())
                <div class="p-3.5 bg-red-50 border border-red-200 rounded-xl text-xs text-red-700 font-semibold space-y-1">
                    @foreach ($errors->all() as $error)
                        <p>• {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf

                <div class="space-y-1.5">
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">Nama Lengkap</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Nama sesuai identitas"
                        class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                </div>

                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com"
                        class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                </div>

                <div class="space-y-1.5">
                    <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">Nomor WhatsApp</label>
                    <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" required placeholder="0812 3456 7890"
                        class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                </div>

                <div class="space-y-1.5">
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">Kata Sandi</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter"
                        class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                </div>

                <div class="space-y-1.5">
                    <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-[#1F3B2E]">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi kata sandi"
                        class="w-full px-4 py-3 bg-[#F4F7F3] border border-[#DEE4DC] rounded-xl text-sm focus:outline-none focus:border-[#2A6046] transition">
                </div>

                <button type="submit" class="w-full py-3.5 bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-[15px] font-bold rounded-xl shadow-sm transition">
                    Daftar Sekarang
                </button>
            </form>

            <div class="pt-4 border-t border-[#DEE4DC] text-center text-xs text-[#5F6A64]">
                Sudah memiliki akun? 
                <a href="{{ route('login') }}" class="font-bold text-[#2A6046] hover:underline">Masuk ke sini</a>
            </div>

        </div>

    </div>
</section>
@endsection
