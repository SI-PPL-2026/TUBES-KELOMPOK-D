@extends('layouts.app')

@section('title', 'Dashboard Penerima - SIDAPUR')

@section('content')
<div class="py-10 bg-slate-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Welcome Card -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-xs mb-8 flex flex-col md:flex-row md:items-center justify-between">
            <div class="flex items-center space-x-4 mb-4 md:mb-0">
                <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-2xl font-black">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <h1 class="text-xl sm:text-2xl font-black text-slate-900">Halo, {{ $user->name }}!</h1>
                    <p class="text-xs sm:text-sm text-slate-500">
                        {{ $user->university ?? 'Mahasiswa' }} • NIM: {{ $user->student_id ?? '-' }}
                    </p>
                </div>
            </div>

            <div>
                <a href="{{ route('penerima.create') }}" class="inline-flex items-center space-x-2 px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm rounded-2xl shadow-lg shadow-emerald-600/25 transition-all">
                    <i class="fa-solid fa-plus-circle"></i>
                    <span>Ajukan Bantuan Darurat</span>
                </a>
            </div>
        </div>

        <!-- Active Aid Request Banner (US-24) -->
        @if($activeRequest)
            <div class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white rounded-3xl p-6 sm:p-8 shadow-xl mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-emerald-400/50 pb-4 mb-6">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-emerald-100">Permohonan Aktif Sedang Berjalan</span>
                        <h2 class="text-2xl font-black mt-1">{{ $activeRequest->assistance_type }}</h2>
                        <div class="text-xs text-emerald-100 mt-1">
                            Diajukan pada {{ $activeRequest->created_at->format('d M Y H:i') }} • Di: {{ $activeRequest->stall_name }}
                        </div>
                    </div>
                    <div class="mt-4 sm:mt-0 text-left sm:text-right">
                        <div class="text-xs text-emerald-100">Nominal Bantuan</div>
                        <div class="text-2xl font-black">Rp {{ number_format($activeRequest->nominal, 0, ',', '.') }}</div>
                    </div>
                </div>

                <!-- Status Progress Timeline -->
                <div class="mb-6">
                    <div class="text-xs font-bold uppercase tracking-wider text-emerald-100 mb-4">Tahapan Pemrosesan:</div>
                    <div class="grid grid-cols-4 gap-2 text-center text-xs">
                        <!-- Step 1: Pending -->
                        <div class="p-3 rounded-xl bg-white/20 backdrop-blur-xs font-bold border {{ $activeRequest->status === 'pending' ? 'border-amber-300 bg-white/30 ring-2 ring-amber-300' : 'border-white/20' }}">
                            <i class="fa-solid fa-clock block text-base mb-1"></i>
                            <span>1. Menunggu Verifikasi</span>
                        </div>

                        <!-- Step 2: Verified -->
                        <div class="p-3 rounded-xl bg-white/20 backdrop-blur-xs font-bold border {{ in_array($activeRequest->status, ['verified', 'approved', 'completed']) ? 'border-white/80 bg-white/30' : 'border-white/10 opacity-50' }}">
                            <i class="fa-solid fa-user-check block text-base mb-1"></i>
                            <span>2. KTM Valid</span>
                        </div>

                        <!-- Step 3: Approved -->
                        <div class="p-3 rounded-xl bg-white/20 backdrop-blur-xs font-bold border {{ in_array($activeRequest->status, ['approved', 'completed']) ? 'border-white/80 bg-white/30' : 'border-white/10 opacity-50' }}">
                            <i class="fa-solid fa-circle-check block text-base mb-1"></i>
                            <span>3. Disetujui</span>
                        </div>

                        <!-- Step 4: Completed -->
                        <div class="p-3 rounded-xl bg-white/20 backdrop-blur-xs font-bold border {{ $activeRequest->status === 'completed' ? 'border-amber-300 bg-white/30 ring-2 ring-amber-300' : 'border-white/10 opacity-50' }}">
                            <i class="fa-solid fa-check-double block text-base mb-1"></i>
                            <span>4. Selesai Dibayar</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-2">
                    <a href="{{ route('penerima.show', $activeRequest) }}" class="px-5 py-2.5 bg-white text-emerald-800 font-bold text-xs rounded-xl shadow-md hover:bg-emerald-50 transition-colors">
                        Lihat Rincian Status & Catatan Admin &rarr;
                    </a>

                    @if($activeRequest->status === 'pending')
                        <div class="flex space-x-2">
                            <a href="{{ route('penerima.edit', $activeRequest) }}" class="px-4 py-2 bg-emerald-700/60 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl transition-colors">
                                <i class="fa-solid fa-pen mr-1"></i> Edit
                            </a>
                            <form action="{{ route('penerima.cancel', $activeRequest) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pengajuan ini?')">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-rose-600/80 hover:bg-rose-600 text-white text-xs font-semibold rounded-xl transition-colors">
                                    Batalkan
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        <!-- Riwayat Bantuan Table (US-24) -->
        <div class="bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden mb-8">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Riwayat Pengajuan Bantuan</h3>
                    <p class="text-xs text-slate-500">Daftar semua permohonan bantuan darurat yang pernah Anda ajukan.</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-bold tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="py-4 px-6">Tanggal</th>
                            <th class="py-4 px-6">Jenis Bantuan</th>
                            <th class="py-4 px-6">Warung / Tempat</th>
                            <th class="py-4 px-6">Nominal</th>
                            <th class="py-4 px-6">Status</th>
                            <th class="py-4 px-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($aidRequests as $req)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-4 px-6 text-xs whitespace-nowrap">{{ $req->created_at->format('d/m/Y H:i') }}</td>
                                <td class="py-4 px-6 font-semibold text-slate-800">{{ $req->assistance_type }}</td>
                                <td class="py-4 px-6 text-xs">{{ $req->stall_name }}</td>
                                <td class="py-4 px-6 font-bold text-slate-900 whitespace-nowrap">Rp {{ number_format($req->nominal, 0, ',', '.') }}</td>
                                <td class="py-4 px-6 whitespace-nowrap">{!! $req->status_badge !!}</td>
                                <td class="py-4 px-6 text-right whitespace-nowrap">
                                    <a href="{{ route('penerima.show', $req) }}" class="text-xs font-bold text-brand-600 hover:underline">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-slate-400">
                                    Anda belum pernah mengajukan permohonan bantuan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Notifikasi (US-25) -->
        @if($notifications->count() > 0)
            <div class="bg-white rounded-3xl p-6 border border-slate-200/90 shadow-xs">
                <h3 class="text-base font-bold text-slate-900 mb-4 flex items-center">
                    <i class="fa-solid fa-bell text-brand-500 mr-2"></i> Pemberitahuan Terbaru
                </h3>
                <div class="space-y-3">
                    @foreach($notifications as $notif)
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex items-start space-x-3">
                            <div class="w-8 h-8 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center text-xs shrink-0 mt-0.5">
                                <i class="fa-solid fa-info"></i>
                            </div>
                            <div class="flex-1">
                                <div class="text-xs font-bold text-slate-900">{{ $notif->title }}</div>
                                <div class="text-xs text-slate-600 mt-0.5">{{ $notif->message }}</div>
                                <div class="text-[10px] text-slate-400 mt-1">{{ $notif->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
