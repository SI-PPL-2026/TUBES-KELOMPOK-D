@extends('layouts.app')

@section('title', 'Kabar & Artikel Kegiatan - SIDAPUR')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="inline-block px-3 py-1 rounded-full bg-brand-100 text-brand-800 text-xs font-bold uppercase tracking-wider mb-2">Publikasi & Kabar</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Artikel & Berita Kegiatan</h1>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Informasi terbaru mengenai penyaluran bantuan makanan, kisah relawan, dan agenda gerakan Nasi Darurat Purbalingga-Purwokerto.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($articles as $article)
                <article class="bg-white rounded-3xl border border-slate-200 overflow-hidden hover:shadow-xl transition-all flex flex-col justify-between">
                    <div>
                        <div class="h-48 bg-slate-100 relative">
                            @if($article->thumbnail && file_exists(public_path('storage/' . $article->thumbnail)))
                                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-tr from-amber-50 to-brand-100 flex items-center justify-center text-brand-500">
                                    <i class="fa-solid fa-newspaper text-4xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="text-[11px] font-bold text-brand-600 uppercase tracking-wider mb-2 flex items-center space-x-2">
                                <span>Kabar Gerakan</span>
                                <span>•</span>
                                <span class="text-slate-400 font-normal">{{ $article->created_at->format('d M Y') }}</span>
                            </div>
                            <h2 class="text-lg font-bold text-slate-900 hover:text-brand-600 transition-colors line-clamp-2 mb-3">
                                <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                            </h2>
                            <p class="text-slate-600 text-xs line-clamp-3 leading-relaxed">
                                {{ Str::limit(strip_tags($article->content), 140) }}
                            </p>
                        </div>
                    </div>
                    <div class="px-6 pb-6 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                        <span class="text-slate-400">Oleh {{ $article->author->name ?? 'Admin' }}</span>
                        <a href="{{ route('articles.show', $article->slug) }}" class="font-bold text-brand-600 hover:underline">
                            Baca Rinci &rarr;
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-16 bg-white rounded-3xl border border-slate-200 text-slate-400">
                    <i class="fa-regular fa-newspaper text-5xl mb-3"></i>
                    <p class="text-sm">Belum ada artikel yang dipublikasikan saat ini.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $articles->links() }}
        </div>

    </div>
</div>
@endsection
