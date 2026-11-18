@extends('layouts.admin')

@section('title', 'Verifikasi Donasi Masuk - SIDAPUR')
@section('page_title', 'Verifikasi Donasi & Data Donatur (US-14)')

@section('content')
<div class="space-y-6">

    <!-- Filter Tabs -->
    <div class="flex flex-wrap gap-2 pb-2">
        <a href="{{ route('admin.donations.index') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ empty($status) ? 'bg-slate-900 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Semua Donasi ({{ $counts['all'] }})
        </a>
        <a href="{{ route('admin.donations.index', ['status' => 'pending']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $status === 'pending' ? 'bg-amber-500 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Menunggu Verifikasi ({{ $counts['pending'] }})
        </a>
        <a href="{{ route('admin.donations.index', ['status' => 'verified']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $status === 'verified' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Terverifikasi ({{ $counts['verified'] }})
        </a>
        <a href="{{ route('admin.donations.index', ['status' => 'rejected']) }}" 
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
                        <th class="py-4 px-6">ID & Tanggal</th>
                        <th class="py-4 px-6">Donatur</th>
                        <th class="py-4 px-6">Metode</th>
                        <th class="py-4 px-6">Pesan / Doa</th>
                        <th class="py-4 px-6">Nominal</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($donations as $don)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-4 px-6 whitespace-nowrap text-xs">
                                <span class="font-bold text-slate-900 block">#DON-{{ str_pad($don->id, 5, '0', STR_PAD_LEFT) }}</span>
                                <span class="text-slate-400">{{ $don->created_at->format('d/m/Y H:i') }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900">{{ $don->user->name ?? 'Donatur' }}</div>
                                <div class="text-xs text-slate-400">{{ $don->user->email ?? '-' }}</div>
                            </td>
                            <td class="py-4 px-6 text-xs text-slate-700 font-medium">
                                {{ $don->paymentMethod->name ?? 'Metode Pembayaran' }}
                            </td>
                            <td class="py-4 px-6 text-xs text-slate-500 italic max-w-xs truncate">
                                {{ $don->message ?? '-' }}
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap font-bold text-emerald-600">
                                Rp {{ number_format($don->amount, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                {!! $don->status_badge !!}
                            </td>
                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                <a href="{{ route('admin.donations.show', $don) }}" 
                                   class="px-4 py-2 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl shadow-xs transition-colors">
                                    Cek Bukti &rarr;
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-slate-400">
                                Tidak ada data donasi pada status ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-slate-100">
            {{ $donations->links() }}
        </div>
    </div>

</div>
@endsection
