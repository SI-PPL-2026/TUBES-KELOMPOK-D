@extends('layouts.admin')

@section('title', 'Kelola Artikel & Event - SIDAPUR')
@section('page_title', 'Kelola Artikel & Event (US-27)')

@section('content')
<div class="space-y-6">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Form Buat Artikel Baru (5 Cols) -->
        <div class="lg:col-span-5 bg-white rounded-3xl p-6 border border-slate-200/90 shadow-xs h-fit">
            <h3 class="text-base font-bold text-slate-900 mb-2">Tulis Artikel Baru</h3>
            <p class="text-xs text-slate-400 mb-6">Publikasikan kabar terbaru, cerita penyaluran, atau pengumuman gerakan.</p>

            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Judul Artikel *</label>
                    <input type="text" name="title" required placeholder="Judul artikel atau event..."
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Foto Sampul / Thumbnail (Opsional)</label>
                    <input type="file" name="thumbnail" accept="image/*"
                           class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 cursor-pointer border border-slate-200 rounded-xl p-1 bg-slate-50">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Isi Konten Artikel *</label>
                    <textarea name="content" rows="6" required placeholder="Tuliskan isi berita, event, atau laporan..."
                              class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-brand-500"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl shadow-md transition-all">
                        Terbitkan Artikel
                    </button>
                </div>
            </form>
        </div>

        <!-- Daftar Artikel (7 Cols) -->
        <div class="lg:col-span-7 bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-100">
                <h3 class="text-base font-bold text-slate-900">Daftar Artikel yang Diterbitkan</h3>
            </div>

            <div class="divide-y divide-slate-100">
                @forelse($articles as $art)
                    <div class="p-6 hover:bg-slate-50/70 transition-colors flex items-start justify-between">
                        <div>
                            <span class="text-[10px] text-slate-400 block mb-1">{{ $art->created_at->format('d M Y, H:i') }} • Oleh {{ $art->author->name ?? 'Admin' }}</span>
                            <h4 class="font-bold text-sm text-slate-900 mb-1">{{ $art->title }}</h4>
                            <p class="text-xs text-slate-500 line-clamp-2">{{ Str::limit(strip_tags($art->content), 120) }}</p>
                        </div>

                        <form action="{{ route('admin.articles.destroy', $art) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-rose-500 hover:text-rose-700 rounded-lg ml-4" title="Hapus">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                @empty
                    <div class="p-8 text-center text-slate-400 text-xs">
                        Belum ada artikel yang diterbitkan.
                    </div>
                @endforelse
            </div>

            <div class="p-6 border-t border-slate-100">
                {{ $articles->links() }}
            </div>
        </div>

    </div>

</div>
@endsection
