@extends('layouts.app')

@section('title', 'Dashboard Saya - SIDAPUR')

@section('content')
<section class="w-full bg-[#EAEFE8] py-10 border-b border-[#DEE4DC]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <span class="text-xs font-black tracking-widest text-[#2A6046] uppercase">PORTAL PENGGUNA SIDAPUR</span>
            <h1 class="text-2xl sm:text-3xl font-black text-[#1F3B2E] mt-1">Halo, {{ $user->name }}</h1>
            <p class="text-sm text-[#5F6A64] mt-1">Satu akun untuk berbagi donasi dan memantau pengajuan bantuan Anda.</p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('donation.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-sm font-bold rounded-xl shadow-sm transition">
                <i data-lucide="heart" class="w-4 h-4"></i>
                <span>Bantu Donasi</span>
            </a>
            <a href="{{ route('aid.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white hover:bg-gray-50 text-[#2A6046] border border-[#2A6046] text-sm font-bold rounded-xl shadow-sm transition">
                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                <span>Ajukan Bantuan</span>
            </a>
        </div>
    </div>
</section>

<section class="w-full bg-white py-12">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <!-- Ringkasan -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div class="p-6 rounded-2xl bg-[#F4F7F3] border border-[#DEE4DC]">
                <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Total Donasi Terverifikasi</p>
                <p class="text-2xl sm:text-3xl font-black text-[#2A6046] mt-2">Rp {{ number_format($totalDonated, 0, ',', '.') }}</p>
                <p class="text-xs text-[#5F6A64] mt-1">{{ $verifiedDonationsCount }} transaksi terverifikasi</p>
            </div>
            <div class="p-6 rounded-2xl bg-[#F4F7F3] border border-[#DEE4DC]">
                <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Total Pengajuan Bantuan</p>
                <p class="text-2xl sm:text-3xl font-black text-[#1F3B2E] mt-2">{{ $aidRequests->count() }} Kali</p>
                <p class="text-xs text-[#5F6A64] mt-1">{{ $approvedAidCount }} pengajuan disetujui/selesai</p>
            </div>
            <div class="p-6 rounded-2xl bg-[#F4F7F3] border border-[#DEE4DC]">
                <p class="text-xs font-bold uppercase tracking-wider text-[#5F6A64]">Peran Akun</p>
                <p class="text-xl sm:text-2xl font-black text-[#1F3B2E] mt-2">Pengguna SIDAPUR</p>
                <p class="text-xs text-[#5F6A64] mt-1">Bisa berdonasi & mengajukan bantuan</p>
            </div>
        </div>

        <!-- Tabs: Riwayat Donasi & Pengajuan Bantuan -->
        <div>
            <div class="flex items-center gap-2 border-b border-[#DEE4DC] mb-6">
                <a href="{{ route('dashboard', ['tab' => 'donations']) }}"
                   class="px-5 py-3 text-sm font-bold border-b-2 transition {{ $activeTab === 'donations' ? 'border-[#2A6046] text-[#2A6046]' : 'border-transparent text-[#5F6A64] hover:text-[#1F3B2E]' }}">
                    Riwayat Donasi Saya ({{ $donations->count() }})
                </a>
                <a href="{{ route('dashboard', ['tab' => 'aid']) }}"
                   class="px-5 py-3 text-sm font-bold border-b-2 transition {{ $activeTab === 'aid' ? 'border-[#2A6046] text-[#2A6046]' : 'border-transparent text-[#5F6A64] hover:text-[#1F3B2E]' }}">
                    Pengajuan Bantuan Saya ({{ $aidRequests->count() }})
                </a>
            </div>

            @if($activeTab === 'donations')
                <!-- Tab Riwayat Donasi -->
                <div class="bg-white rounded-2xl border border-[#DEE4DC] overflow-hidden">
                    @if($donations->isEmpty())
                        <div class="p-10 text-center space-y-3">
                            <p class="text-sm text-[#5F6A64]">Anda belum memiliki catatan donasi.</p>
                            <a href="{{ route('donation.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#2A6046] text-white text-xs font-bold rounded-lg">
                                Mulai Berdonasi
                            </a>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b border-[#DEE4DC] text-[11px] font-bold uppercase tracking-wider text-[#5F6A64] bg-[#F4F7F3]">
                                        <th class="px-6 py-3.5">Tanggal</th>
                                        <th class="px-6 py-3.5">Nama Tercatat</th>
                                        <th class="px-6 py-3.5">Nominal</th>
                                        <th class="px-6 py-3.5">Pesan / Doa</th>
                                        <th class="px-6 py-3.5">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#DEE4DC] text-sm">
                                    @foreach($donations as $donation)
                                    <tr class="hover:bg-[#F4F7F3]/50">
                                        <td class="px-6 py-4 text-xs text-[#5F6A64]">{{ $donation->created_at->format('d M Y, H:i') }}</td>
                                        <td class="px-6 py-4 font-bold text-[#1F3B2E]">{{ $donation->donor_name }}</td>
                                        <td class="px-6 py-4 font-black text-[#2A6046]">Rp {{ number_format($donation->amount, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 text-xs text-[#5F6A64] max-w-xs truncate">{{ $donation->message ?: '-' }}</td>
                                        <td class="px-6 py-4">
                                            @if($donation->status === 'verified')
                                                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-[#EAEFE8] text-[#2A6046]">Terverifikasi</span>
                                            @elseif($donation->status === 'rejected')
                                                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">Ditolak</span>
                                            @else
                                                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-700">Menunggu Verifikasi</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            @else
                <!-- Tab Pengajuan Bantuan -->
                <div class="bg-white rounded-2xl border border-[#DEE4DC] overflow-hidden">
                    @if($aidRequests->isEmpty())
                        <div class="p-10 text-center space-y-3">
                            <p class="text-sm text-[#5F6A64]">Anda belum pernah mengajukan bantuan.</p>
                            <a href="{{ route('aid.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#2A6046] text-white text-xs font-bold rounded-lg">
                                Ajukan Bantuan Sekarang
                            </a>
                        </div>
                    @else
                        <div class="divide-y divide-[#DEE4DC]">
                            @foreach($aidRequests as $aid)
                            <div class="p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-[#F4F7F3]/50">
                                <div class="space-y-1.5">
                                    <div class="flex items-center gap-2.5 flex-wrap">
                                        <span class="text-xs text-[#5F6A64]">{{ $aid->created_at->format('d M Y, H:i') }}</span>
                                        <span class="text-[#DEE4DC]">•</span>
                                        <span class="text-xs font-bold text-[#1F3B2E]">{{ $aid->university }} ({{ $aid->nim }})</span>
                                    </div>
                                    <p class="text-sm font-semibold text-[#1F3B2E]">{{ $aid->reason }}</p>
                                    @if($aid->admin_notes)
                                        <p class="text-xs text-[#2A6046] bg-[#EAEFE8] px-3 py-2 rounded-lg inline-block mt-1">
                                            <strong>Catatan Pengurus:</strong> {{ $aid->admin_notes }}
                                        </p>
                                    @endif
                                </div>
                                <div class="flex-shrink-0">
                                    @if($aid->status === 'completed')
                                        <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-[#EAEFE8] text-[#2A6046]">Selesai Disalurkan</span>
                                    @elseif($aid->status === 'approved')
                                        <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-blue-100 text-blue-700">Disetujui</span>
                                    @elseif($aid->status === 'rejected')
                                        <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-red-100 text-red-700">Ditolak</span>
                                    @else
                                        <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-amber-100 text-amber-700">Menunggu Verifikasi</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
