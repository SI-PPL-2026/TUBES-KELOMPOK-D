@extends('layouts.admin')

@section('title', 'Kelola Dokumentasi Penyaluran - SIDAPUR')
@section('page_title', 'Kelola Galeri Dokumentasi Penyaluran (US-26)')

@section('content')
<div class="space-y-6">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Form Tambah Dokumentasi (5 Cols) -->
        <div class="lg:col-span-5 bg-white rounded-3xl p-6 border border-slate-200/90 shadow-xs h-fit">
            <h3 class="text-base font-bold text-slate-900 mb-2">Unggah Foto Dokumentasi Baru</h3>
            <p class="text-xs text-slate-400 mb-6">Dokumentasi foto penyaluran bantuan makanan darurat ke mahasiswa di lapangan.</p>

            <form action="{{ route('admin.documentations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Judul Kegiatan / Penyerahan *</label>
                    <input type="text" name="title" required placeholder="Contoh: Penyaluran Nasi di Kampus UNSOED..."
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Berkas Foto Dokumentasi *</label>
                    <input type="file" name="image" required accept="image/*"
                           class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 cursor-pointer border border-slate-200 rounded-xl p-1 bg-slate-50">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Keterangan Singkat</label>
                    <textarea name="description" rows="3" placeholder="Keterangan singkat lokasi dan kegiatan..."
                              class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-brand-500"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl shadow-md transition-all">
                        Unggah Dokumentasi
                    </button>
                </div>
            </form>
        </div>

        <!-- Daftar Dokumentasi (7 Cols) -->
        <div class="lg:col-span-7 bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-100">
                <h3 class="text-base font-bold text-slate-900">Galeri Foto yang Ditampilkan</h3>
            </div>

            <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                @forelse($documentations as $doc)
                    <div class="rounded-2xl border border-slate-200 overflow-hidden bg-slate-50 flex flex-col justify-between">
                        <div class="h-36 bg-slate-200 overflow-hidden">
                            @if($doc->image_path && file_exists(public_path('storage/' . $doc->image_path)))
                                <img src="{{ asset('storage/' . $doc->image_path) }}" alt="{{ $doc->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400 text-xs">
                                    <i class="fa-regular fa-image text-2xl mr-1"></i> Foto
                                </div>
                            @endif
                        </div>
                        <div class="p-3.5 flex items-start justify-between">
                            <div>
                                <h4 class="font-bold text-xs text-slate-900 line-clamp-1">{{ $doc->title }}</h4>
                                <span class="text-[10px] text-slate-400">{{ $doc->created_at->format('d/m/Y') }}</span>
                            </div>
                            <form action="{{ route('admin.documentations.destroy', $doc) }}" method="POST" onsubmit="return confirm('Hapus dokumentasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1 text-rose-500 hover:text-rose-700" title="Hapus">
                                    <i class="fa-regular fa-trash-can text-xs"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center py-10 text-slate-400 text-xs">
                        Belum ada dokumentasi yang diunggah.
                    </div>
                @endforelse
            </div>

            <div class="p-6 border-t border-slate-100">
                {{ $documentations->links() }}
            </div>
        </div>

    </div>

</div>
@endsection
