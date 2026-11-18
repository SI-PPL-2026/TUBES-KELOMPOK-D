@extends('layouts.admin')

@section('title', 'Kelola Mitra & Kolaborasi - SIDAPUR')
@section('page_title', 'Kelola Mitra Warung & Kolaborasi (US-35)')

@section('content')
<div class="space-y-6">

    <div class="bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-100">
            <h3 class="text-base font-bold text-slate-900">Daftar Pengajuan Kemitraan & Warung Makan</h3>
            <p class="text-xs text-slate-400">Tinjau permohonan kerjasama dari warung makan dan komunitas kampus.</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-bold tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="py-4 px-6">Nama Mitra / Warung</th>
                        <th class="py-4 px-6">Kontak (Email / WA)</th>
                        <th class="py-4 px-6">Rincian Penawaran Kerjasama</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($partners as $partner)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900">{{ $partner->name }}</div>
                                <div class="text-[11px] text-slate-400">Diajukan: {{ $partner->created_at->format('d/m/Y') }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-slate-800">{{ $partner->phone }}</div>
                                <div class="text-slate-400">{{ $partner->email }}</div>
                            </td>
                            <td class="py-4 px-6 max-w-sm">
                                <p class="text-slate-700 leading-relaxed">{{ $partner->proposal_details }}</p>
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="capitalize px-2.5 py-1 rounded-full font-bold text-[11px] {{ $partner->status === 'approved' ? 'bg-emerald-100 text-emerald-800' : ($partner->status === 'pending' ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800') }}">
                                    {{ $partner->status }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end space-x-2">
                                    <form action="{{ route('admin.partners.status', $partner) }}" method="POST" class="inline">
                                        @csrf
                                        @if($partner->status !== 'approved')
                                            <button type="submit" name="status" value="approved" class="px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-[11px] font-bold">
                                                Setujui
                                            </button>
                                        @else
                                            <button type="submit" name="status" value="rejected" class="px-3 py-1.5 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-lg text-[11px] font-bold">
                                                Nonaktifkan
                                            </button>
                                        @endif
                                    </form>

                                    <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" onsubmit="return confirm('Hapus data mitra ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-rose-500 hover:text-rose-700 rounded-lg" title="Hapus">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-400">
                                Belum ada pengajuan kemitraan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-slate-100">
            {{ $partners->links() }}
        </div>
    </div>

</div>
@endsection
