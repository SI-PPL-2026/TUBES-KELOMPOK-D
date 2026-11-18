@extends('layouts.admin')

@section('title', 'Manajemen Pengguna - SIDAPUR')
@section('page_title', 'Kelola Akun & Hak Akses Pengguna (US-12)')

@section('content')
<div class="space-y-6">

    <!-- Role Filter Tabs -->
    <div class="flex flex-wrap gap-2 pb-2">
        <a href="{{ route('admin.users.index') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ empty($role) ? 'bg-slate-900 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Semua Pengguna
        </a>
        <a href="{{ route('admin.users.index', ['role' => 'admin']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $role === 'admin' ? 'bg-slate-900 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Administrator
        </a>
        <a href="{{ route('admin.users.index', ['role' => 'donatur']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $role === 'donatur' ? 'bg-brand-500 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Donatur
        </a>
        <a href="{{ route('admin.users.index', ['role' => 'penerima']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $role === 'penerima' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Mahasiswa (Penerima)
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-bold tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="py-4 px-6">Pengguna</th>
                        <th class="py-4 px-6">Kontak / WA</th>
                        <th class="py-4 px-6">Peran (Role)</th>
                        <th class="py-4 px-6">Status Akun</th>
                        <th class="py-4 px-6">Terdaftar Sejak</th>
                        <th class="py-4 px-6 text-right">Ubah Status / Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($users as $u)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900">{{ $u->name }}</div>
                                <div class="text-slate-400">{{ $u->email }}</div>
                                @if($u->university)
                                    <div class="text-[11px] text-slate-500">{{ $u->university }} • {{ $u->student_id }}</div>
                                @endif
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                {{ $u->phone ?? '-' }}
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="capitalize px-2.5 py-1 rounded-full text-xs font-bold {{ $u->role === 'admin' ? 'bg-slate-900 text-white' : ($u->role === 'donatur' ? 'bg-brand-100 text-brand-800' : 'bg-emerald-100 text-emerald-800') }}">
                                    {{ $u->role }}
                                </span>
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="capitalize px-2.5 py-1 rounded-full text-xs font-bold {{ $u->status === 'active' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                    {{ $u->status }}
                                </span>
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap text-slate-400">
                                {{ $u->created_at->format('d/m/Y') }}
                            </td>
                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end space-x-2">
                                    <!-- Form Edit Role & Status Modal Simple -->
                                    <form action="{{ route('admin.users.update', $u) }}" method="POST" class="inline-flex items-center space-x-1">
                                        @csrf
                                        @method('PUT')
                                        <select name="role" class="text-[11px] font-semibold bg-slate-50 border border-slate-200 rounded-lg px-2 py-1">
                                            <option value="admin" {{ $u->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="donatur" {{ $u->role === 'donatur' ? 'selected' : '' }}>Donatur</option>
                                            <option value="penerima" {{ $u->role === 'penerima' ? 'selected' : '' }}>Penerima</option>
                                        </select>
                                        <select name="status" class="text-[11px] font-semibold bg-slate-50 border border-slate-200 rounded-lg px-2 py-1">
                                            <option value="active" {{ $u->status === 'active' ? 'selected' : '' }}>Aktif</option>
                                            <option value="inactive" {{ $u->status === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                                            <option value="suspended" {{ $u->status === 'suspended' ? 'selected' : '' }}>Suspend</option>
                                        </select>
                                        <button type="submit" class="px-2 py-1 bg-slate-800 hover:bg-slate-700 text-white rounded-lg text-[10px] font-bold" title="Simpan Perubahan">
                                            Simpan
                                        </button>
                                    </form>

                                    @if($u->id !== Auth::id())
                                        <form action="{{ route('admin.users.destroy', $u) }}" method="POST" onsubmit="return confirm('Hapus akun pengguna ini beserta seluruh datanya?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 text-rose-500 hover:text-rose-700 rounded-lg" title="Hapus Akun">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                Tidak ada data pengguna pada kriteria ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-slate-100">
            {{ $users->links() }}
        </div>
    </div>

</div>
@endsection
