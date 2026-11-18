@extends('layouts.app')

@section('title', 'Tentang Program - SIDAPUR')

@section('content')
<div class="py-12 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block px-3 py-1 rounded-full bg-brand-100 text-brand-800 text-xs font-bold uppercase tracking-wider mb-3">Profil Gerakan</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Mengenal Nasi Darurat Purbalingga & Purwokerto (SIDAPUR)</h1>
            <p class="text-slate-600 text-base mt-3 leading-relaxed">
                Inisiatif kepedulian sosial untuk memastikan hak pangan dasar mahasiswa perantau dan anak kos tetap terpenuhi di masa-masa sulit.
            </p>
        </div>

        <!-- Sejarah & Latar Belakang (US-01) -->
        <div class="prose prose-slate max-w-none space-y-8 text-slate-700 leading-relaxed">
            <div class="bg-gradient-to-r from-brand-50 to-amber-50 p-8 rounded-3xl border border-brand-100">
                <h2 class="text-2xl font-bold text-slate-900 mb-4 flex items-center">
                    <i class="fa-solid fa-seedling text-brand-500 mr-3"></i> Latar Belakang & Cerita Pendirian
                </h2>
                <p>
                    Persoalan pangan tidak hanya menimpa daerah tertinggal. Di kota pelajar seperti <strong>Purwokerto</strong> dan sekitarnya (termasuk <strong>Purbalingga</strong>), mahasiswa perantau kerap mengalami situasi darurat ketika kiriman uang dari kampung halaman terlambat datang, uang saku habis sebelum waktunya, atau terpaksa digunakan untuk biaya mendesak seperti obat-obatan dan keperluan kuliah.
                </p>
                <p class="mt-3">
                    Berdasarkan kajian ilmiah pada civitas akademika, mahasiswa termasuk salah satu kelompok yang paling rentan mengalami kerawanan pangan. Berangkat dari pengalaman nyata pendirinya yang pernah merantau di Purwokerto dan mengalami masa-masa sulit kehabisan ongkos serta harus berhemat sangat ketat bahkan untuk makan sehari-hari, gerakan <strong>Nasi Darurat Purbalingga</strong> dirintis secara sukarela sejak <strong>Februari 2024</strong>.
                </p>
            </div>

            <!-- SDGs 2 Connection -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center pt-4">
                <div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 flex items-center">
                        <i class="fa-solid fa-bullseye text-emerald-600 mr-2.5"></i> Komitmen Terhadap SDGs 2 (Zero Hunger)
                    </h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Gerakan ini terhubung erat dengan <em>Sustainable Development Goals (SDGs)</em> Tujuan ke-2, yaitu Mengakhiri Kelaparan (Zero Hunger), mencapai ketahanan pangan, dan meningkatkan gizi. Kami percaya bahwa tidak boleh ada mahasiswa yang gagal fokus belajar atau tertidur dengan perut kosong hanya karena krisis keuangan sementara.
                    </p>
                </div>
                <div class="bg-emerald-50 border border-emerald-200 rounded-3xl p-6 text-emerald-950">
                    <div class="text-xs uppercase font-extrabold tracking-wider text-emerald-700 mb-1">Prinsip Pelayanan</div>
                    <ul class="text-sm space-y-2 mt-2">
                        <li class="flex items-start"><i class="fa-solid fa-check text-emerald-600 mr-2 mt-1"></i> Prioritas mahasiswa perantau di Purwokerto & Purbalingga.</li>
                        <li class="flex items-start"><i class="fa-solid fa-check text-emerald-600 mr-2 mt-1"></i> Verifikasi identitas berbasis Kartu Tanda Mahasiswa (KTM).</li>
                        <li class="flex items-start"><i class="fa-solid fa-check text-emerald-600 mr-2 mt-1"></i> Penyaluran non-tunai langsung ke warung makan melalui QRIS.</li>
                        <li class="flex items-start"><i class="fa-solid fa-check text-emerald-600 mr-2 mt-1"></i> Pencatatan transparansi kas terbuka untuk donatur dan publik.</li>
                    </ul>
                </div>
            </div>

            <!-- Mengapa Dibutuhkan Website SIDAPUR? -->
            <div class="pt-6">
                <h3 class="text-xl font-bold text-slate-900 mb-4">Mengapa Hadir Sistem Informasi SIDAPUR?</h3>
                <p class="text-sm text-slate-600 leading-relaxed mb-4">
                    Sebelumnya, seluruh proses berjalan secara manual via WhatsApp oleh satu orang pendiri: mewawancarai pemohon, mencocokkan KTM, mencari warung, mentransfer lewat QRIS, hingga mengunggah tangkapan layar bukti percakapan ke media sosial satu per satu. Sistem informasi ini hadir untuk:
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200">
                        <i class="fa-solid fa-list-check text-brand-500 text-xl mb-2"></i>
                        <h4 class="font-bold text-sm text-slate-900 mb-1">Merapikan Antrean</h4>
                        <p class="text-xs text-slate-500">Mencegah pesan permohonan bantuan tercecer di antara ratusan obrolan chat.</p>
                    </div>
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200">
                        <i class="fa-solid fa-lock text-brand-500 text-xl mb-2"></i>
                        <h4 class="font-bold text-sm text-slate-900 mb-1">Perlindungan Data</h4>
                        <p class="text-xs text-slate-500">Foto KTM dan nomor pribadi mahasiswa terlindungi aman dan tidak disebarluaskan.</p>
                    </div>
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200">
                        <i class="fa-solid fa-chart-line text-brand-500 text-xl mb-2"></i>
                        <h4 class="font-bold text-sm text-slate-900 mb-1">Transparansi Real-Time</h4>
                        <p class="text-xs text-slate-500">Donatur dan masyarakat dapat melihat rekap donasi masuk dan keluar secara terbuka.</p>
                    </div>
                </div>
            </div>

            <!-- Tautan Akun Resmi (US-04) -->
            <div class="mt-12 p-8 rounded-3xl bg-slate-900 text-white text-center">
                <h3 class="text-2xl font-bold mb-2">Keaslian & Akun Media Sosial Resmi</h3>
                <p class="text-slate-400 text-sm max-w-xl mx-auto mb-6">
                    Pastikan Anda selalu berinteraksi dengan kanal resmi Nasi Darurat Purbalingga-Purwokerto untuk menghindari segala bentuk penipuan yang mengatasnamakan gerakan ini.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="https://instagram.com" target="_blank" class="px-6 py-3 rounded-2xl bg-slate-800 hover:bg-brand-500 text-white font-bold text-sm transition-colors flex items-center space-x-2">
                        <i class="fa-brands fa-instagram text-lg"></i>
                        <span>Instagram Resmi</span>
                    </a>
                    <a href="https://tiktok.com" target="_blank" class="px-6 py-3 rounded-2xl bg-slate-800 hover:bg-brand-500 text-white font-bold text-sm transition-colors flex items-center space-x-2">
                        <i class="fa-brands fa-tiktok text-lg"></i>
                        <span>TikTok Resmi</span>
                    </a>
                    <a href="https://wa.me" target="_blank" class="px-6 py-3 rounded-2xl bg-slate-800 hover:bg-brand-500 text-white font-bold text-sm transition-colors flex items-center space-x-2">
                        <i class="fa-brands fa-whatsapp text-lg text-emerald-400"></i>
                        <span>WhatsApp Pengelola</span>
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
