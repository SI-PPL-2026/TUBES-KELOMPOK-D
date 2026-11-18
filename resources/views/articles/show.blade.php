@extends('layouts.app')

@section('title', $article->title . ' - SIDAPUR')

@section('content')
<div class="py-12 bg-white min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Back Link -->
        <a href="{{ route('articles.index') }}" class="inline-flex items-center text-xs font-bold text-slate-500 hover:text-brand-600 mb-6 transition-colors">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Semua Artikel
        </a>

        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center space-x-3 text-xs text-slate-500 mb-3">
                <span class="px-3 py-1 rounded-full bg-brand-100 text-brand-700 font-bold uppercase tracking-wider">Kabar Nasi Darurat</span>
                <span>•</span>
                <span><i class="fa-regular fa-calendar mr-1"></i> {{ $article->created_at->format('d F Y') }}</span>
                <span>•</span>
                <span><i class="fa-regular fa-user mr-1"></i> {{ $article->author->name ?? 'Admin' }}</span>
            </div>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
                {{ $article->title }}
            </h1>
        </div>

        <!-- Thumbnail Image -->
        @if($article->thumbnail && file_exists(public_path('storage/' . $article->thumbnail)))
            <div class="mb-10 rounded-3xl overflow-hidden shadow-lg border border-slate-100">
                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-full max-h-[460px] object-cover">
            </div>
        @endif

        <!-- Article Content -->
        <div class="prose prose-lg prose-slate max-w-none text-slate-700 leading-relaxed space-y-6">
            {!! nl2br(e($article->content)) !!}
        </div>

        <!-- Share & Support Box -->
        <div class="mt-12 p-8 rounded-3xl bg-brand-50 border border-brand-200 flex flex-col sm:flex-row items-center justify-between">
            <div class="mb-4 sm:mb-0">
                <h4 class="font-bold text-slate-900 text-base">Dukung Gerakan Pangan Bebas Lapar</h4>
                <p class="text-xs text-slate-600 mt-1">Setiap donasi Anda disalurkan langsung menjadi sepiring nasi bagi mahasiswa perantau.</p>
            </div>
            <a href="{{ route('donatur.create') }}" class="px-6 py-3 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl shadow-md shrink-0">
                Titip Donasi Sekarang
            </a>
        </div>

        <!-- Recent Articles -->
        @if($recentArticles->count() > 0)
            <div class="mt-16 pt-10 border-t border-slate-200">
                <h3 class="text-xl font-bold text-slate-900 mb-6">Artikel Lainnya</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach($recentArticles as $recent)
                        <a href="{{ route('articles.show', $recent->slug) }}" class="p-5 rounded-2xl bg-slate-50 border border-slate-200 hover:border-brand-300 transition-all flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-xl bg-brand-100 text-brand-600 flex items-center justify-center text-lg shrink-0">
                                <i class="fa-solid fa-file-lines"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-slate-800 hover:text-brand-600 line-clamp-2">{{ $recent->title }}</h4>
                                <span class="text-[11px] text-slate-400 mt-1 block">{{ $recent->created_at->format('d M Y') }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
