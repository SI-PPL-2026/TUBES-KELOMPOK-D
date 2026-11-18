@extends('layouts.app')

@section('title', 'Profil Donatur - SIDAPUR')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-xl mx-auto px-4 sm:px-6">
        
        <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/90 shadow-xl shadow-slate-200/50">
            <div class="border-b border-slate-100 pb-6 mb-8 text-center sm:text-left">
                <span class="inline-block px-3 py-1 rounded-full bg-brand-100 text-brand-800 text-xs font-bold uppercase tracking-wider mb-2">Profil Donatur (US-21)</span>
                <h1 class="text-2xl font-extrabold text-slate-900">Kelola Profil Donatur</h1>
                <p class="text-slate-500 text-xs mt-1">Perbarui informasi profil dan kontak Anda.</p>
            </div>

            <form action="{{ route('donatur.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nama Donatur / Panggilan *</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Alamat Email (Tetap)</label>
                    <input type="email" value="{{ $user->email }}" disabled
                           class="w-full px-4 py-2.5 bg-slate-100 border border-slate-200 rounded-xl text-sm text-slate-500 cursor-not-allowed">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nomor WhatsApp Aktif *</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" required
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Alamat Domisili (Opsional)</label>
                    <textarea name="address" rows="2"
                              class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('address', $user->address) }}</textarea>
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="submit" class="px-6 py-2.5 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl shadow-md transition-all">
                        Perbarui Profil
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
