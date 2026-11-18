@extends('layouts.admin')

@section('title', 'Verifikasi Pengajuan Bantuan - SIDAPUR')
@section('page_title', 'Verifikasi & Antrean Bantuan (US-13)')

@section('content')
<div class="space-y-6">

    <!-- Filter Tabs -->
    <div class="flex flex-wrap gap-2 pb-2">
        <a href="{{ route('admin.aid_requests.index') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ empty($status) ? 'bg-slate-900 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Semua ({{ $counts['all'] }})
        </a>
        <a href="{{ route('admin.aid_requests.index', ['status' => 'pending']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $status === 'pending' ? 'bg-amber-500 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Menunggu Verifikasi ({{ $counts['pending'] }})
        </a>
        <a href="{{ route('admin.aid_requests.index', ['status' => 'verified']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $status === 'verified' ? 'bg-blue-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            KTM Terverifikasi ({{ $counts['verified'] }})
        </a>
        <a href="{{ route('admin.aid_requests.index', ['status' => 'approved']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $status === 'approved' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Disetujui Bayar ({{ $counts['approved'] }})
        </a>
        <a href="{{ route('admin.aid_requests.index', ['status' => 'completed']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $status === 'completed' ? 'bg-green-700 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Selesai Dibayar ({{ $counts['completed'] }})
        </a>
        <a href="{{ route('admin.aid_requests.index', ['status' => 'rejected']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $status === 'rejected' ? 'bg-rose-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Ditolak ({{ $counts['rejected'] }})
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-bold tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="py-4 px-6">ID & Waktu</th>
                        <th class="py-4 px-6">Mahasiswa (Pemohon)</th>
                        <th class="py-4 px-6">Jenis Bantuan</th>
                        <th class="py-4 px-6">Warung Makan</th>
                        <th class="py-4 px-6">Nominal</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($aidRequests as $req)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-4 px-6 whitespace-nowrap text-xs">
                                <span class="font-bold text-slate-900 block">#{{ str_pad($req->id, 5, '0', STR_PAD_LEFT) }}</span>
                                <span class="text-slate-400">{{ $req->created_at->format('d/m/Y H:i') }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900">{{ $req->user->name ?? 'Mahasiswa' }}</div>
                                <div class="text-xs text-slate-500">{{ $req->user->university ?? '-' }} (NIM: {{ $req->user->student_id ?? '-' }})</div>
                                <div class="text-[11px] text-slate-400">WA: {{ $req->user->phone ?? '-' }}</div>
                            </td>
                            <td class="py-4 px-6 font-semibold text-slate-800 text-xs">
                                {{ $req->assistance_type }}
                            </td>
                            <td class="py-4 px-6 text-xs text-slate-700">
                                {{ $req->stall_name }}
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap font-bold text-slate-900">
                                Rp {{ number_format($req->nominal, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                {!! $req->status_badge !!}
                            </td>
                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                <a href="{{ route('admin.aid_requests.show', $req) }}" 
                                   class="px-4 py-2 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl shadow-xs transition-colors">
                                    Verifikasi &rarr;
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-slate-400">
                                Tidak ada pengajuan bantuan pada status ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-slate-100">
            {{ $aidRequests->links() }}
        </div>
    </div>

</div>
@endsection
