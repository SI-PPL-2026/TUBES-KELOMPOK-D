@extends('layouts.app')

@section('title', 'Syarat & Ketentuan - SIDAPUR')

@section('content')
<div class="py-12 bg-white min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-slate-900 mb-6">Syarat dan Ketentuan Layanan (US-19)</h1>
        
        <div class="prose prose-slate max-w-none text-slate-700 space-y-6 text-sm leading-relaxed">
            <p>
                Selamat datang di website SIDAPUR (Sistem Informasi Pengelolaan Bantuan Nasi Darurat Purbalingga dan Purwokerto). Dengan mengakses atau menggunakan platform ini, Anda menyetujui seluruh ketentuan yang tercantum di bawah ini:
            </p>

            <h3 class="text-lg font-bold text-slate-900 mt-6">1. Ketentuan Bagi Pemohon Bantuan (Penerima)</h3>
            <ul class="list-disc pl-5 space-y-2">
                <li>Bantuan diprioritaskan bagi mahasiswa aktif dan anak kos yang berdomisili di wilayah Purwokerto dan Purbalingga yang sedang dalam kondisi darurat pangan (kehabisan bekal/uang makan).</li>
                <li>Pemohon wajib melampirkan foto Kartu Tanda Mahasiswa (KTM) yang masih berlaku untuk proses verifikasi keabsahan data.</li>
                <li>Pemohon wajib mengirimkan foto QRIS warung makan / tempat pembelian kebutuhan pokok terdekat yang sah. Nominal bantuan maksimal per permintaan adalah Rp 20.000 - Rp 25.000 (sesuai kebijakan operasional).</li>
                <li>Segala bentuk pemalsuan KTM atau penyalahgunaan bantuan akan mengakibatkan pemblokiran akun secara permanen.</li>
            </ul>

            <h3 class="text-lg font-bold text-slate-900 mt-6">2. Ketentuan Bagi Donatur</h3>
            <ul class="list-disc pl-5 space-y-2">
                <li>Donasi yang dititipkan melalui SIDAPUR bersifat sukarela dan tanpa paksaan.</li>
                <li>Donatur wajib mengunggah bukti transfer yang sah dan sesuai dengan rekening resmi pengelola SIDAPUR.</li>
                <li>Seluruh donasi yang terverifikasi akan disalurkan 100% untuk peruntukan bantuan makanan mahasiswa darurat dan dicatat dalam laporan transparansi kas publik.</li>
            </ul>

            <h3 class="text-lg font-bold text-slate-900 mt-6">3. Mekanisme Penyaluran</h3>
            <p>
                Pembayaran dilakukan langsung oleh pengelola ke warung makan melalui QRIS atau transfer non-tunai. Bantuan tidak diberikan dalam bentuk uang tunai secara langsung kepada penerima guna mencegah penyalahgunaan dana.
            </p>
        </div>
    </div>
</div>
@endsection
