@extends('layouts.app')

@section('title', 'Galeri Dokumentasi Penyaluran - SIDAPUR')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="inline-block px-3 py-1 rounded-full bg-brand-100 text-brand-800 text-xs font-bold uppercase tracking-wider mb-2">Bukti Lapangan</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Dokumentasi Penyaluran Bantuan</h1>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Foto-foto penyerahan bantuan makanan dan aktivitas kerelawanan Nasi Darurat di Purwokerto dan Purbalingga.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($documentations as $doc)
                <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/90 shadow-xs hover:shadow-xl transition-all group">
                    <div class="h-56 bg-slate-100 overflow-hidden relative">
                        @if($doc->image_path && file_exists(public_path('storage/' . $doc->image_path)))
                            <img src="{{ asset('storage/' . $doc->image_path) }}" alt="{{ $doc->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full bg-gradient-to-tr from-brand-100 to-amber-100 flex flex-col items-center justify-center text-brand-600">
                                <i class="fa-solid fa-camera text-4xl mb-2"></i>
                                <span class="text-xs font-bold text-slate-500">Foto Kegiatan</span>
                            </div>
                        @endif
                        <div class="absolute top-3 right-3 bg-slate-900/80 text-white text-[11px] font-semibold px-2.5 py-1 rounded-full backdrop-blur-xs">
                            {{ $doc->created_at->format('d M Y') }}
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-slate-900 group-hover:text-brand-600 transition-colors mb-2">{{ $doc->title }}</h3>
                        <p class="text-slate-600 text-xs leading-relaxed">{{ $doc->description ?? 'Penyaluran bantuan makanan darurat.' }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-16 bg-white rounded-3xl border border-slate-200 text-slate-400">
                    <i class="fa-regular fa-images text-5xl mb-3"></i>
                    <p class="text-sm">Belum ada foto dokumentasi yang diunggah.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $documentations->links() }}
        </div>

    </div>
</div>
@endsection
