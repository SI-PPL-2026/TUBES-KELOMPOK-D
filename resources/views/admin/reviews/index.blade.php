@extends('layouts.admin')

@section('title', 'Moderasi Ulasan - SIDAPUR')
@section('page_title', 'Moderasi Ulasan Komunitas (US-34)')

@section('content')
<div class="space-y-6">

    <div class="bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-100">
            <h3 class="text-base font-bold text-slate-900">Ulasan & Masukan Pengguna</h3>
            <p class="text-xs text-slate-400">Moderasi ulasan yang layak untuk ditampilkan di halaman beranda dan halaman publik.</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-bold tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="py-4 px-6">Pengguna</th>
                        <th class="py-4 px-6">Rating</th>
                        <th class="py-4 px-6">Isi Ulasan</th>
                        <th class="py-4 px-6">Visibilitas</th>
                        <th class="py-4 px-6 text-right">Aksi Moderasi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($reviews as $rev)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900">{{ $rev->user->name ?? 'User' }}</div>
                                <div class="text-[11px] text-slate-400 capitalize">Role: {{ $rev->user->role ?? '-' }} • {{ $rev->created_at->format('d/m/Y') }}</div>
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap text-amber-500 font-bold">
                                ⭐ {{ $rev->rating ?? 5 }}/5
                            </td>
                            <td class="py-4 px-6 max-w-md">
                                <p class="text-slate-700 italic">"{{ $rev->comment }}"</p>
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                @if($rev->is_visible)
                                    <span class="px-2.5 py-1 rounded-full font-bold text-[10px] bg-emerald-100 text-emerald-800">Tampil di Publik</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full font-bold text-[10px] bg-slate-200 text-slate-600">Disembunyikan</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end space-x-2">
                                    <form action="{{ route('admin.reviews.toggle', $rev) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-3 py-1.5 rounded-lg text-[11px] font-bold border transition-colors {{ $rev->is_visible ? 'bg-slate-100 hover:bg-slate-200 text-slate-700' : 'bg-emerald-600 hover:bg-emerald-700 text-white' }}">
                                            {{ $rev->is_visible ? 'Sembunyikan' : 'Tampilkan' }}
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.reviews.destroy', $rev) }}" method="POST" onsubmit="return confirm('Hapus ulasan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-rose-500 hover:text-rose-700 rounded-lg" title="Hapus Ulasan">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-400">
                                Belum ada ulasan yang masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-slate-100">
            {{ $reviews->links() }}
        </div>
    </div>

</div>
@endsection
