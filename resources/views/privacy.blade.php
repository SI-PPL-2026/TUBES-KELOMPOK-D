@extends('layouts.app')

@section('title', 'Kebijakan Privasi & Perlindungan Data - SIDAPUR')

@section('content')
<div class="py-12 bg-white min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-slate-900 mb-6">Kebijakan Privasi & Perlindungan Data Mahasiswa (US-20)</h1>
        
        <div class="prose prose-slate max-w-none text-slate-700 space-y-6 text-sm leading-relaxed">
            <p>
                SIDAPUR (Nasi Darurat Purbalingga-Purwokerto) berkomitmen penuh untuk menjaga privasi, kehormatan, dan kerahasiaan data pribadi seluruh pengguna, khususnya para mahasiswa yang mengajukan bantuan.
            </p>

            <div class="p-6 rounded-2xl bg-amber-50 border border-amber-200">
                <h3 class="text-base font-bold text-amber-950 mb-2 flex items-center">
                    <i class="fa-solid fa-shield-halved text-amber-600 mr-2"></i> Jaminan Kerahasiaan Identitas (NFR Keamanan)
                </h3>
                <p class="text-xs text-amber-900 leading-relaxed">
                    Sesuai dokumen spesifikasi kebutuhan sistem SIDAPUR, <strong>foto KTM dan data pribadi penerima hanya dapat dilihat oleh pengelola/admin yang bertugas melakukan verifikasi</strong>. Laporan keuangan terbuka yang disajikan untuk donatur dan publik sama sekali tidak memuat foto KTM, NIM, alamat kos, maupun identitas sensitif penerima.
                </p>
            </div>

            <h3 class="text-lg font-bold text-slate-900 mt-6">1. Data yang Kami Kumpulkan</h3>
            <ul class="list-disc pl-5 space-y-2">
                <li><strong>Untuk Penerima Bantuan:</strong> Nama lengkap, nomor WhatsApp, perguruan tinggi asal, Nomor Induk Mahasiswa (NIM), alamat kos di Purbalingga/Purwokerto, foto KTM, dan foto QRIS warung tujuan.</li>
                <li><strong>Untuk Donatur:</strong> Nama/alias donatur (tersedia opsi anonim/Hamba Allah), alamat email, nomor telepon, dan bukti transfer dana.</li>
            </ul>

            <h3 class="text-lg font-bold text-slate-900 mt-6">2. Penggunaan Data Pribadi</h3>
            <p>
                Data identitas yang diunggah hanya dipergunakan untuk keperluan:
            </p>
            <ul class="list-disc pl-5 space-y-2">
                <li>Memverifikasi kelayakan pemohon bahwa bantuan tepat sasaran kepada mahasiswa yang benar-benar membutuhkan.</li>
                <li>Menghubungi pemohon jika terdapat kendala dalam transaksi QRIS warung makan.</li>
                <li>Pencatatan statistik internal tanpa menampilkan identitas individual ke muka umum.</li>
            </ul>

            <h3 class="text-lg font-bold text-slate-900 mt-6">3. Keamanan Penyimpanan Berkas</h3>
            <p>
                Semua berkas foto KTM dan bukti verifikasi disimpan di lingkungan server yang aman dengan kontrol akses terbatas (Role-Based Access Control). Pengguna berhak meminta penghapusan berkas identitas setelah periode bantuan selesai dengan mengajukan permohonan ke admin.
            </p>
        </div>
    </div>
</div>
@endsection
