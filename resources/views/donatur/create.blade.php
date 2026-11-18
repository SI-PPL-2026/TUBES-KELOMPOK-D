@extends('layouts.app')

@section('title', 'Form Titip Donasi - SIDAPUR')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen" x-data="{
    selectedNominal: '25000',
    customNominal: '',
    selectedMethodId: '{{ $paymentMethods->first()->id ?? '' }}',
    paymentMethods: @json($paymentMethods),
    get activeMethod() {
        return this.paymentMethods.find(m => m.id == this.selectedMethodId) || null;
    },
    get finalAmount() {
        return this.selectedNominal === 'custom' ? this.customNominal : this.selectedNominal;
    }
}">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/90 shadow-xl shadow-slate-200/50">
            <div class="border-b border-slate-100 pb-6 mb-8 text-center sm:text-left">
                <span class="inline-block px-3 py-1 rounded-full bg-brand-100 text-brand-800 text-xs font-bold uppercase tracking-wider mb-2">Form Titip Donasi (Mockup SIDAPUR)</span>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Menitipkan Donasi Makanan</h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-1">
                    Setiap Rp 15.000 - Rp 20.000 menjadi seporsi makan darurat sehat bagi mahasiswa perantau yang membutuhkan.
                </p>
            </div>

            <form action="{{ route('donatur.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- 1. Pilihan Nominal (Quick Select Buttons) -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Pilih Nominal Donasi *</label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-3">
                        <button type="button" @click="selectedNominal = '10000'"
                                :class="selectedNominal === '10000' ? 'bg-brand-500 text-white border-brand-500 font-bold shadow-md shadow-brand-500/20' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                                class="py-3 rounded-2xl border text-sm transition-all">
                            Rp 10.000
                        </button>
                        <button type="button" @click="selectedNominal = '25000'"
                                :class="selectedNominal === '25000' ? 'bg-brand-500 text-white border-brand-500 font-bold shadow-md shadow-brand-500/20' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                                class="py-3 rounded-2xl border text-sm transition-all">
                            Rp 25.000
                        </button>
                        <button type="button" @click="selectedNominal = '50000'"
                                :class="selectedNominal === '50000' ? 'bg-brand-500 text-white border-brand-500 font-bold shadow-md shadow-brand-500/20' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                                class="py-3 rounded-2xl border text-sm transition-all">
                            Rp 50.000
                        </button>
                        <button type="button" @click="selectedNominal = 'custom'"
                                :class="selectedNominal === 'custom' ? 'bg-brand-500 text-white border-brand-500 font-bold shadow-md shadow-brand-500/20' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                                class="py-3 rounded-2xl border text-sm transition-all">
                            Lainnya...
                        </button>
                    </div>

                    <!-- Input Custom Nominal -->
                    <div x-show="selectedNominal === 'custom'" x-cloak class="mt-3">
                        <input type="number" x-model="customNominal" min="10000" step="5000" placeholder="Masukkan nominal lain (min. Rp 10.000)"
                               class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>

                    <!-- Hidden input to submit actual amount -->
                    <input type="hidden" name="amount" :value="finalAmount">
                </div>

                <!-- 2. Pilihan Metode Pembayaran (US-06) -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Metode Pembayaran *</label>
                    <div class="space-y-2">
                        @foreach($paymentMethods as $method)
                            <label class="flex items-center justify-between p-4 rounded-2xl border cursor-pointer transition-all"
                                   :class="selectedMethodId == {{ $method->id }} ? 'bg-brand-50/70 border-brand-400 ring-1 ring-brand-400' : 'bg-slate-50 border-slate-200 hover:bg-slate-100/70'">
                                <div class="flex items-center space-x-3">
                                    <input type="radio" name="payment_method_id" value="{{ $method->id }}" x-model="selectedMethodId" class="text-brand-600 focus:ring-brand-500">
                                    <div>
                                        <div class="font-bold text-sm text-slate-900">{{ $method->name }}</div>
                                        <div class="text-xs text-slate-500">{{ $method->account_name }} • {{ $method->account_number }}</div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-brand-600">Pilih</span>
                            </label>
                        @endforeach
                    </div>

                    <!-- Box Instruksi Transfer / QRIS -->
                    <template x-if="activeMethod">
                        <div class="mt-4 p-5 rounded-2xl bg-amber-50 border border-amber-200 text-xs text-amber-900 space-y-2">
                            <div class="font-bold text-sm text-amber-950 flex items-center">
                                <i class="fa-solid fa-circle-info mr-2 text-amber-600"></i> Rekening Tujuan Transfer:
                            </div>
                            <div class="text-sm">
                                <span class="font-semibold" x-text="activeMethod.name"></span>: <span class="font-mono font-bold text-base text-slate-900" x-text="activeMethod.account_number"></span> (<span x-text="activeMethod.account_name"></span>)
                            </div>
                            <p class="text-[11px] text-amber-800">
                                Silakan lakukan transfer sejumlah nominal donasi ke rekening/QRIS di atas, lalu lampirkan bukti tangkapan layar di bawah ini.
                            </p>
                        </div>
                    </template>
                </div>

                <!-- 3. Pesan Doa / Harapan -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Pesan Doa / Semangat (Opsional)</label>
                    <textarea name="message" rows="2" placeholder="Tuliskan doa atau pesan penyemangat untuk mahasiswa penerima bantuan..."
                              class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('message') }}</textarea>
                </div>

                <!-- 4. Bukti Transfer -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Unggah Bukti Transfer / Struk *</label>
                    <input type="file" name="transfer_proof" required accept="image/*"
                           class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 cursor-pointer border border-slate-200 rounded-xl p-1 bg-slate-50">
                    <span class="text-[11px] text-slate-400 mt-1 block">Format JPG/PNG, maks 3MB.</span>
                </div>

                <div class="pt-4 flex items-center justify-between border-t border-slate-100">
                    <a href="{{ route('donatur.dashboard') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
                        &larr; Batal
                    </a>
                    <button type="submit" class="px-8 py-3.5 bg-brand-500 hover:bg-brand-600 text-white font-bold text-sm rounded-xl shadow-lg shadow-brand-500/30 transition-all flex items-center space-x-2">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>Kirim Donasi Saya</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
