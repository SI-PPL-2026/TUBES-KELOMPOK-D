@extends('layouts.app')

@section('title', 'Laporan Transparansi Keuangan - SIDAPUR')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-10 text-center sm:text-left">
            <span class="inline-block px-3 py-1 rounded-full bg-brand-100 text-brand-800 text-xs font-bold uppercase tracking-wider mb-2">Akuntabilitas Publik</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Transparansi Pengelolaan Dana</h1>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Seluruh arus donasi masuk dan penyaluran bantuan makanan darurat dicatat secara terbuka untuk menjaga integritas dan kepercayaan publik.
            </p>
        </div>

        <!-- 4 Summary Cards (US-02) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Dana Masuk -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Donasi Masuk</span>
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-arrow-down-long"></i>
                    </div>
                </div>
                <div class="text-2xl font-black text-emerald-600">
                    Rp {{ number_format($totalInflow, 0, ',', '.') }}
                </div>
                <div class="text-xs text-slate-500 mt-2 flex items-center">
                    <i class="fa-solid fa-circle-check text-emerald-500 mr-1.5"></i> Donasi terverifikasi
                </div>
            </div>

            <!-- Dana Keluar -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Disalurkan</span>
                    <div class="w-10 h-10 rounded-xl bg-rose-100 text-rose-600 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-arrow-up-long"></i>
                    </div>
                </div>
                <div class="text-2xl font-black text-rose-600">
                    Rp {{ number_format($totalOutflow, 0, ',', '.') }}
                </div>
                <div class="text-xs text-slate-500 mt-2 flex items-center">
                    <i class="fa-solid fa-receipt text-rose-500 mr-1.5"></i> Pembayaran QRIS warung
                </div>
            </div>

            <!-- Sisa Saldo Kas -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Saldo Kas Aktif</span>
                    <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                </div>
                <div class="text-2xl font-black text-sky-800">
                    Rp {{ number_format($currentBalance, 0, ',', '.') }}
                </div>
                <div class="text-xs text-slate-500 mt-2 flex items-center">
                    <i class="fa-solid fa-vault text-sky-500 mr-1.5"></i> Siap disalurkan
                </div>
            </div>

            <!-- Porsi Tersalurkan -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Porsi Terbagi</span>
                    <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-bowl-food"></i>
                    </div>
                </div>
                <div class="text-2xl font-black text-amber-800">
                    {{ $completedAidCount }} Porsi
                </div>
                <div class="text-xs text-slate-500 mt-2 flex items-center">
                    <i class="fa-solid fa-users text-amber-500 mr-1.5"></i> Mahasiswa terbantu
                </div>
            </div>
        </div>

        <!-- Monthly Chart (US-03) -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs mb-10">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Grafik Penyaluran & Donasi Bulanan</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Perbandingan arus kas pemasukan dan pengeluaran tahun {{ date('Y') }}.</p>
                </div>
                <div class="flex items-center space-x-4 mt-3 sm:mt-0 text-xs font-semibold">
                    <span class="inline-flex items-center text-emerald-600">
                        <span class="w-3 h-3 rounded-full bg-emerald-500 mr-1.5"></span> Donasi Masuk
                    </span>
                    <span class="inline-flex items-center text-rose-600">
                        <span class="w-3 h-3 rounded-full bg-rose-500 mr-1.5"></span> Penyaluran Bantuan
                    </span>
                </div>
            </div>

            <div class="h-72 w-full">
                <canvas id="transparencyChart"></canvas>
            </div>
        </div>

        <!-- Tabel Catatan Mutasi Kas Publik (US-15) -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Catatan Mutasi Transaksi Kas</h3>
                    <p class="text-xs text-slate-500">Daftar rekapitulasi real-time transaksi keuangan yang dapat dipantau publik.</p>
                </div>
                <div class="mt-3 sm:mt-0 text-xs font-semibold px-3 py-1.5 rounded-lg bg-slate-100 text-slate-600">
                    <i class="fa-solid fa-user-shield text-brand-500 mr-1"></i> Identitas penerima dirahasiakan sesuai kode etik
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-bold tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="py-4 px-6">Tanggal</th>
                            <th class="py-4 px-6">Jenis Arus Kas</th>
                            <th class="py-4 px-6">Keterangan Transaksi</th>
                            <th class="py-4 px-6 text-right">Nominal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($finances as $item)
                            <tr class="hover:bg-slate-50/70 transition-colors">
                                <td class="py-4 px-6 whitespace-nowrap text-xs font-medium text-slate-500">
                                    {{ $item->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    @if($item->type === 'inflow')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-700">
                                            <i class="fa-solid fa-arrow-down mr-1"></i> Donasi Masuk
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-rose-100 text-rose-700">
                                            <i class="fa-solid fa-arrow-up mr-1"></i> Penyaluran Bantuan
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 font-medium text-slate-800">
                                    {{ $item->description }}
                                </td>
                                <td class="py-4 px-6 text-right whitespace-nowrap font-bold {{ $item->type === 'inflow' ? 'text-emerald-600' : 'text-rose-600' }}">
                                    {{ $item->type === 'inflow' ? '+' : '-' }} Rp {{ number_format($item->amount, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-12 text-center text-slate-400">
                                    Belum ada transaksi keuangan yang tercatat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="p-6 border-t border-slate-100">
                {{ $finances->links() }}
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('transparencyChart');
        if (!ctx) return;

        const monthlyData = @json($monthlyData);
        const labels = monthlyData.map(d => d.month);
        const inflows = monthlyData.map(d => d.inflow);
        const outflows = monthlyData.map(d => d.outflow);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Donasi Masuk (Rp)',
                        data: inflows,
                        backgroundColor: 'rgba(16, 185, 129, 0.85)',
                        borderRadius: 8,
                    },
                    {
                        label: 'Penyaluran Keluar (Rp)',
                        data: outflows,
                        backgroundColor: 'rgba(244, 63, 94, 0.85)',
                        borderRadius: 8,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': Rp ' + context.raw.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + (value / 1000) + 'k';
                            }
                        },
                        grid: { color: 'rgba(226, 232, 240, 0.6)' }
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
