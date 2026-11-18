@extends('layouts.public')

@section('title', 'Tentang Kami - SIDAPUR')

@section('styles')
<style>
    /* Hero */
    .hero-section { background:#eaefe8; }
    .hero-inner { max-width:1280px; margin:0 auto; padding:32px 48px 48px; }
    .breadcrumb{display:flex;align-items:center;gap:8px;font-size:14px;color:#5f6a64;margin-bottom:24px;}
    .breadcrumb a{color:#5f6a64;}.breadcrumb a:hover{color:#2a6046;}
    .breadcrumb .sep{color:#9aa39d;}.breadcrumb .cur{color:#2a6046;font-weight:700;}
    .eyebrow{font-size:12px;font-weight:700;color:#2a6046;letter-spacing:.48px;margin-bottom:10px;}
    .page-h1{font-size:48px;font-weight:900;color:#1f3b2e;line-height:1.1;margin-bottom:12px;}
    .page-sub{font-size:17px;color:#5f6a64;line-height:1.6;}

    /* Section wrapper */
    .tentang-wrap{max-width:1280px;margin:0 auto;padding:48px 48px 72px;display:flex;flex-direction:column;gap:56px;}

    /* Foto placeholder */
    .foto-kegiatan{
        width:100%;height:380px;border-radius:20px;
        background:linear-gradient(163deg,#dce8df 0%,#eaefe8 55%,#fce8d2 100%);
        border:1px solid #e2e6e1;
        display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;
    }
    .foto-kegiatan .ikon{font-size:48px;}
    .foto-kegiatan p{font-size:16px;font-weight:700;color:#1f3b2e;}
    .foto-kegiatan small{font-size:13px;color:#5f6a64;}

    /* Kisah + Stats */
    .dua-kolom{display:flex;gap:48px;align-items:flex-start;flex-wrap:wrap;}
    .kolom-kisah{flex:1;min-width:280px;}
    .kolom-kisah .label{font-size:12px;font-weight:700;color:#2a6046;letter-spacing:.48px;margin-bottom:14px;}
    .kolom-kisah h2{font-size:28px;font-weight:900;color:#1f3b2e;line-height:1.2;margin-bottom:16px;}
    .kolom-kisah p{font-size:17px;color:#3f4a44;line-height:1.75;}
    .kolom-stats{min-width:280px;padding:24px;background:#f6f8f5;border:1px solid #e2e6e1;border-radius:16px;display:flex;flex-direction:column;gap:20px;}
    .kolom-stats .label{font-size:12px;font-weight:700;color:#2a6046;letter-spacing:.52px;margin-bottom:4px;}
    .stat-item h3{font-size:28px;font-weight:900;color:#1f3b2e;margin-bottom:2px;}
    .stat-item p{font-size:14px;color:#5f6a64;}

    /* Cards perkembangan */
    .cards-row{display:flex;gap:20px;flex-wrap:wrap;}
    .card{flex:1;min-width:220px;padding:24px;background:#fff;border:1px solid #e2e6e1;border-radius:16px;}
    .card .tag{font-size:13px;font-weight:700;margin-bottom:10px;}
    .card .tag.orange{color:#8a3a05;}
    .card .tag.green{color:#2a6046;}
    .card p{font-size:16px;color:#3f4a44;line-height:1.6;}
    .card-beige{background:#f8f6f1;border-color:#e2e6e1;}

    /* Fitur layanan */
    .fitur-row{display:flex;gap:20px;flex-wrap:wrap;}
    .fitur-card{flex:1;min-width:200px;padding:24px;background:#fff;border:1px solid #e2e6e1;border-radius:16px;display:flex;gap:14px;align-items:flex-start;}
    .nomor-bulat{width:36px;height:36px;background:#e3ebe4;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:700;color:#2a6046;flex-shrink:0;}
    .fitur-card p{font-size:17px;font-weight:700;color:#1f3b2e;line-height:1.4;}

    /* Section label */
    .section-label{font-size:12px;font-weight:700;color:#2a6046;letter-spacing:.48px;margin-bottom:10px;}
    .section-h2{font-size:28px;font-weight:900;color:#1f3b2e;line-height:1.2;margin-bottom:14px;}
    .section-p{font-size:17px;color:#3f4a44;line-height:1.75;}

    /* Visi masa depan */
    .visi-box{padding:40px;background:#f8f6f1;border-radius:20px;}
    .visi-box .section-label{margin-bottom:8px;}

    @media(max-width:900px){
        .hero-inner,.tentang-wrap{padding-left:24px;padding-right:24px;}
        .dua-kolom{flex-direction:column;}
    }
    @media(max-width:600px){
        .page-h1{font-size:32px;}
        .cards-row,.fitur-row{flex-direction:column;}
    }
</style>
@endsection

@section('content')

{{-- Hero --}}
<section class="hero-section">
    <div class="hero-inner">
        <div class="breadcrumb">
            <a href="{{ route('beranda-sidapur') }}">Beranda</a>
            <span class="sep">›</span>
            <span class="cur">Tentang kami</span>
        </div>
        <p class="eyebrow">NASI DARURAT • TENTANG KAMI</p>
        <h1 class="page-h1">Tentang Nasi Darurat<br>Purbalingga &amp; Purwokerto</h1>
        <p class="page-sub">Gerakan kepedulian sosial berbasis pangan &amp; kemanusiaan.</p>
    </div>
</section>

{{-- Konten --}}
<div class="tentang-wrap">

    {{-- Foto Kegiatan --}}
    <div class="foto-kegiatan">
        <div class="ikon">🍱</div>
        <p>Foto / ilustrasi kegiatan berbagi &amp; warung</p>
        <small>Ganti dengan dokumentasi kegiatan Nasi Darurat</small>
    </div>

    {{-- Kisah & Stats --}}
    <div class="dua-kolom">
        <div class="kolom-kisah">
            <div class="label">KISAH &amp; LATAR BELAKANG PENDIRIAN</div>
            <h2>Dari pengalaman kos yang kekurangan, lahir tekad agar tak ada yang lapar.</h2>
            <p>Gerakan Nasi Darurat Purbalingga dirintis sejak Februari 2024. Pemilik terinspirasi oleh gerakan Nasi Darurat di Kota Yogyakarta. Berawal dari pengalaman pribadi pemilik yang pernah indekos di Purwokerto, mengalami kesulitan finansial hingga harus berhemat sangat ketat untuk makan, ia bertekad agar tidak ada lagi mahasiswa atau anak kos di Purwokerto dan Purbalingga yang harus melewati hari dalam kondisi kelaparan.</p>
        </div>
        <div class="kolom-stats">
            <div class="label">SEKILAS</div>
            <div class="stat-item">
                <h3>Feb 2024</h3>
                <p>Gerakan dirintis</p>
            </div>
            <div class="stat-item">
                <h3>Rp25.000</h3>
                <p>Bantuan per pengajuan saat ini</p>
            </div>
            <div class="stat-item">
                <h3>2 kota</h3>
                <p>Purbalingga &amp; Purwokerto</p>
            </div>
        </div>
    </div>

    {{-- Perkembangan Bantuan --}}
    <div>
        <div class="section-label">PERKEMBANGAN BANTUAN</div>
        <h2 class="section-h2">Bantuan yang tumbuh seiring dukungan donatur.</h2>
        <div class="cards-row">
            <div class="card">
                <div class="tag orange">AWAL BERDIRI</div>
                <p>Batasan bantuan berkisar antara Rp10.000 – Rp15.000 per permintaan karena keterbatasan dana. Seiring waktu, nominal ditingkatkan menjadi Rp25.000 per pengajuan.</p>
            </div>
            <div class="card">
                <div class="tag green">BANTUAN LAIN</div>
                <p>Selain makanan gratis, program ini juga sesekali membantu kebutuhan darurat lain seperti token listrik, obat, hingga bantuan tiket kereta.</p>
            </div>
            <div class="card">
                <div class="tag green">KOMITMEN PEMILIK</div>
                <p>Apabila dana donasi umum telah habis terpakai dan masih ada yang membutuhkan bantuan, pemilik berkomitmen menggunakan dana pribadinya untuk membayarkan bantuan.</p>
            </div>
        </div>
    </div>

    {{-- Evolusi Transparansi --}}
    <div>
        <div class="section-label">EVOLUSI TRANSPARANSI &amp; SISTEM</div>
        <h2 class="section-h2">Dari tangkapan layar menjadi laporan yang terpusat.</h2>
        <div class="cards-row">
            <div class="card card-beige">
                <div class="tag orange">SEBELUM SIDAPUR</div>
                <p>Seluruh alur dilakukan manual via WhatsApp dan GetContact. Laporan keuangan hanya berupa tangkapan layar (screenshot) bukti QRIS di media sosial.</p>
            </div>
            <div class="card" style="background:#f1f6f2;border-color:#bfd2c5;">
                <div class="tag green">DENGAN SIDAPUR</div>
                <p>Sistem hadir untuk mendigitalkan seluruh alur pengajuan dan menyajikan laporan keuangan yang otomatis serta terpusat.</p>
            </div>
        </div>
    </div>

    {{-- Visi Masa Depan --}}
    <div class="visi-box">
        <div class="section-label">RENCANA MASA DEPAN (OFFLINE &amp; DAPUR SENDIRI)</div>
        <h2 class="section-h2">Membantu langsung, lebih dekat dengan kampus.</h2>
        <p class="section-p">Karena pengelolaan via media sosial dirasa kurang maksimal, pemilik bercita-cita membantu secara offline dengan mendirikan dapur sendiri di sekitar kampus, serta mempekerjakan pengemudi (driver) khusus untuk mengantar bantuan di area Purbalingga dan Purwokerto.</p>
    </div>

    {{-- Fitur Layanan --}}
    <div>
        <div class="section-label">FITUR LAYANAN WEBSITE</div>
        <h2 class="section-h2">Daftar fitur layanan.</h2>
        <div class="fitur-row">
            <div class="fitur-card">
                <div class="nomor-bulat">1</div>
                <p>Pengelolaan Penerima &amp; Donatur</p>
            </div>
            <div class="fitur-card">
                <div class="nomor-bulat">2</div>
                <p>Dashboard Transparansi Anggaran (Dana Masuk/Keluar)</p>
            </div>
            <div class="fitur-card">
                <div class="nomor-bulat">3</div>
                <p>Ulasan Pengguna, Artikel Event &amp; Galeri Dokumentasi</p>
            </div>
            <div class="fitur-card">
                <div class="nomor-bulat">4</div>
                <p>Manajemen Kelola Akun, Metode Pembayaran &amp; Kolaborasi</p>
            </div>
        </div>
    </div>

    {{-- CTA --}}
    <div style="text-align:center;padding:40px 24px;background:#f1f6f2;border-radius:20px;border:1px solid #bfd2c5;">
        <p style="font-size:12px;font-weight:700;color:#2a6046;letter-spacing:.48px;margin-bottom:10px;">IKUT TERLIBAT</p>
        <h2 style="font-size:28px;font-weight:900;color:#1f3b2e;margin-bottom:14px;">Bergabung bersama gerakan kebaikan ini.</h2>
        <div style="display:flex;justify-content:center;gap:16px;flex-wrap:wrap;margin-top:8px;">
            <a href="{{ route('register') }}" style="padding:14px 28px;background:#2a6046;color:#fff;border-radius:8px;font-weight:700;font-size:15px;">Jadi Donatur</a>
            <a href="{{ route('hubungi') }}" style="padding:14px 28px;background:#fff;color:#2a6046;border:2px solid #2a6046;border-radius:8px;font-weight:700;font-size:15px;">Hubungi Kami</a>
        </div>
    </div>

</div>

@endsection
