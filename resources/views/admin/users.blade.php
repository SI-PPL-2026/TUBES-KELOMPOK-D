@extends('layouts.admin')

@section('title', 'Kelola Pengguna - SIDAPUR')
@section('page_title', 'Daftar Pengguna SIDAPUR')

@section('content')
<div class="flex flex-wrap items-center gap-2">
    <a href="{{ route('admin.users') }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold {{ !$role ? 'bg-[#2A6046] text-white' : 'bg-white border border-[#DEE4DC] text-[#5F6A64]' }}">Semua</a>
    <a href="{{ route('admin.users', ['role' => 'user']) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold {{ $role === 'user' ? 'bg-[#2A6046] text-white' : 'bg-white border border-[#DEE4DC] text-[#5F6A64]' }}">User</a>
    <a href="{{ route('admin.users', ['role' => 'admin']) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold {{ $role === 'admin' ? 'bg-[#2A6046] text-white' : 'bg-white border border-[#DEE4DC] text-[#5F6A64]' }}">Admin</a>
</div>

<div class="bg-white rounded-2xl border border-[#DEE4DC] overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-[#DEE4DC] text-[11px] font-bold uppercase tracking-wider text-[#5F6A64] bg-[#F4F7F3]">
                    <th class="px-5 py-3.5">Nama</th>
                    <th class="px-5 py-3.5">Kontak</th>
                    <th class="px-5 py-3.5">Aktivitas</th>
                    <th class="px-5 py-3.5">Role & Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#DEE4DC] text-sm">
                @foreach($users as $user)
                <tr>
                    <td class="px-5 py-4">
                        <p class="font-bold text-[#1F3B2E]">{{ $user->name }}</p>
                        <p class="text-xs text-[#5F6A64]">{{ $user->email }}</p>
                    </td>
                    <td class="px-5 py-4 text-xs text-[#5F6A64]">{{ $user->phone ?: '-' }}</td>
                    <td class="px-5 py-4 text-xs text-[#5F6A64]">
                        {{ $user->donations_count }} Donasi • {{ $user->aid_requests_count }} Pengajuan
                    </td>
                    <td class="px-5 py-4">
                        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="flex items-center gap-2">
                            @csrf
                            @method('PATCH')
                            <select name="role" class="px-2.5 py-1.5 bg-[#F4F7F3] border border-[#DEE4DC] rounded-lg text-xs font-bold">
                                <option value="user" {{ $user->role !== 'admin' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            <select name="status" class="px-2.5 py-1.5 bg-[#F4F7F3] border border-[#DEE4DC] rounded-lg text-xs font-bold">
                                <option value="active" {{ ($user->status ?? 'active') === 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ ($user->status ?? 'active') === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            <button type="submit" class="px-3 py-1.5 bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-xs font-bold rounded-lg transition">
                                Simpan
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
