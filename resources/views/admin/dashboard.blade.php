@extends('layouts.admin')

@section('title', 'Dashboard Transparansi Anggaran - SIDAPUR')
@section('page_title', 'Dashboard Transparansi Anggaran & Kas')

@section('content')
<div class="space-y-6">

    <!-- 4 Stats Cards (Sesuai Mockup Page 15: Dana Masuk, Terpakai, Sisa, Porsi) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Dana Masuk -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-xs">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Dana Masuk</span>
                <span class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-sm font-bold">
                    <i class="fa-solid fa-arrow-down"></i>
                </span>
            </div>
            <div class="text-2xl font-black text-emerald-600">
                Rp {{ number_format($totalInflow, 0, ',', '.') }}
            </div>
            <div class="text-[11px] text-slate-400 mt-1">Akumulasi donasi terverifikasi</div>
        </div>

        <!-- Terpakai -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-xs">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Terpakai</span>
                <span class="w-9 h-9 rounded-xl bg-rose-100 text-rose-600 flex items-center justify-center text-sm font-bold">
                    <i class="fa-solid fa-arrow-up"></i>
                </span>
            </div>
            <div class="text-2xl font-black text-rose-600">
                Rp {{ number_format($totalOutflow, 0, ',', '.') }}
            </div>
            <div class="text-[11px] text-slate-400 mt-1">Penyaluran ke warung makan</div>
        </div>

        <!-- Sisa Saldo -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-xs">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Sisa Saldo Kas</span>
                <span class="w-9 h-9 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-sm font-bold">
                    <i class="fa-solid fa-wallet"></i>
                </span>
            </div>
            <div class="text-2xl font-black text-sky-800">
                Rp {{ number_format($balance, 0, ',', '.') }}
            </div>
            <div class="text-[11px] text-slate-400 mt-1">Saldo aktif siap disalurkan</div>
        </div>

        <!-- Porsi Terbagi -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-xs">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Porsi Disalurkan</span>
                <span class="w-9 h-9 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-sm font-bold">
                    <i class="fa-solid fa-bowl-food"></i>
                </span>
            </div>
            <div class="text-2xl font-black text-slate-900">
                {{ $totalAidCompleted }} Porsi
            </div>
            <div class="text-[11px] text-slate-400 mt-1">Total mahasiswa terbantu</div>
        </div>
    </div>

    <!-- Antrean Perhatian Admin (Badge Alert) -->
    @if($pendingAidCount > 0 || $pendingDonationCount > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @if($pendingAidCount > 0)
                <div class="p-5 rounded-2xl bg-amber-50 border border-amber-200 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-500 text-white flex items-center justify-center text-lg">
                            <i class="fa-solid fa-bell"></i>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-amber-900">Ada {{ $pendingAidCount }} Pengajuan Bantuan Menunggu Verifikasi</div>
                            <div class="text-[11px] text-amber-700">Periksa foto KTM dan keabsahan warung QRIS.</div>
                        </div>
                    </div>
                    <a href="{{ route('admin.aid_requests.index', ['status' => 'pending']) }}" class="px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold rounded-xl transition-colors">
                        Tinjau Sekarang
                    </a>
                </div>
            @endif

            @if($pendingDonationCount > 0)
                <div class="p-5 rounded-2xl bg-emerald-50 border border-emerald-200 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center text-lg">
                            <i class="fa-solid fa-money-bill-wave"></i>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-emerald-900">Ada {{ $pendingDonationCount }} Donasi Masuk Menunggu Konfirmasi</div>
                            <div class="text-[11px] text-emerald-700">Cocokkan mutasi bank dengan bukti transfer donatur.</div>
                        </div>
                    </div>
                    <a href="{{ route('admin.donations.index', ['status' => 'pending']) }}" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl transition-colors">
                        Verifikasi
                    </a>
                </div>
            @endif
        </div>
    @endif

    <!-- Grafik Alokasi Dana (Sesuai Mockup Page 15) -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/90 shadow-xs">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-base font-bold text-slate-900">Grafik Arus Kas Donasi & Pengeluaran (Tahun {{ date('Y') }})</h3>
                <p class="text-xs text-slate-400">Visualisasi rekapitulasi per bulan</p>
            </div>
            <div class="flex items-center space-x-4 text-xs font-semibold">
                <span class="inline-flex items-center text-emerald-600">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 mr-1.5"></span> Donasi Masuk
                </span>
                <span class="inline-flex items-center text-rose-600">
                    <span class="w-2.5 h-2.5 rounded-full bg-rose-500 mr-1.5"></span> Penyaluran Bantuan
                </span>
            </div>
        </div>

        <div class="h-72 w-full">
            <canvas id="adminChart"></canvas>
        </div>
    </div>

    <!-- 2 Kolom Ringkasan Cepat -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Pengajuan Bantuan Terbaru -->
        <div class="bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <h3 class="text-sm font-bold text-slate-900">Antrean Pengajuan Bantuan Terkini</h3>
                <a href="{{ route('admin.aid_requests.index') }}" class="text-xs font-bold text-brand-600 hover:underline">Semua &rarr;</a>
            </div>
            <div class="divide-y divide-slate-100 text-xs">
                @forelse($recentAidRequests as $req)
                    <div class="p-4 hover:bg-slate-50 transition-colors flex items-center justify-between">
                        <div>
                            <div class="font-bold text-slate-800">{{ $req->user->name ?? 'Mahasiswa' }} ({{ $req->user->university ?? '-' }})</div>
                            <div class="text-slate-500 mt-0.5">{{ $req->assistance_type }} • Rp {{ number_format($req->nominal, 0, ',', '.') }} di {{ $req->stall_name }}</div>
                        </div>
                        <div class="text-right">
                            {!! $req->status_badge !!}
                            <a href="{{ route('admin.aid_requests.show', $req) }}" class="block text-[11px] font-bold text-brand-600 hover:underline mt-1">Periksa</a>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center text-slate-400">Belum ada pengajuan bantuan.</div>
                @endforelse
            </div>
        </div>

        <!-- Donasi Terkini -->
        <div class="bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <h3 class="text-sm font-bold text-slate-900">Donasi Masuk Terkini</h3>
                <a href="{{ route('admin.donations.index') }}" class="text-xs font-bold text-brand-600 hover:underline">Semua &rarr;</a>
            </div>
            <div class="divide-y divide-slate-100 text-xs">
                @forelse($recentDonations as $don)
                    <div class="p-4 hover:bg-slate-50 transition-colors flex items-center justify-between">
                        <div>
                            <div class="font-bold text-slate-800">{{ $don->user->name ?? 'Donatur' }}</div>
                            <div class="text-slate-500 mt-0.5">{{ $don->paymentMethod->name ?? 'Metode' }} • {{ $don->created_at->format('d/m H:i') }}</div>
                        </div>
                        <div class="text-right">
                            <span class="font-bold text-emerald-600 block">Rp {{ number_format($don->amount, 0, ',', '.') }}</span>
                            {!! $don->status_badge !!}
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center text-slate-400">Belum ada donasi masuk.</div>
                @endforelse
            </div>
        </div>

    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('adminChart');
        if (!ctx) return;

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($months),
                datasets: [
                    {
                        label: 'Donasi Masuk (Rp)',
                        data: @json($monthlyInflows),
                        backgroundColor: 'rgba(16, 185, 129, 0.85)',
                        borderRadius: 6,
                    },
                    {
                        label: 'Penyaluran Keluar (Rp)',
                        data: @json($monthlyOutflows),
                        backgroundColor: 'rgba(244, 63, 94, 0.85)',
                        borderRadius: 6,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(val) { return 'Rp ' + (val/1000) + 'k'; }
                        },
                        grid: { color: 'rgba(226, 232, 240, 0.7)' }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });
    });
</script>
@endpush
@endsection
