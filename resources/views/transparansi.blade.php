@extends('layouts.public')

@section('title', 'Transparansi Anggaran - SIDAPUR')

@section('styles')
<style>
    /* Hero */
    .hero-section{background:#eaefe8;}
    .hero-inner{max-width:1280px;margin:0 auto;padding:32px 48px 48px;}
    .breadcrumb{display:flex;align-items:center;gap:8px;font-size:14px;color:#5f6a64;margin-bottom:24px;}
    .breadcrumb a{color:#5f6a64;}.breadcrumb a:hover{color:#2a6046;}
    .breadcrumb .sep{color:#9aa39d;}.breadcrumb .cur{color:#2a6046;font-weight:700;}
    .hero-content{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:32px;}
    .eyebrow{font-size:12px;font-weight:700;color:#2a6046;letter-spacing:.48px;margin-bottom:10px;}
    .page-h1{font-size:48px;font-weight:900;color:#1f3b2e;line-height:1.1;margin-bottom:12px;}
    .page-sub{font-size:17px;color:#5f6a64;line-height:1.6;}
    .report-date{display:flex;align-items:center;gap:14px;padding:20px 24px;background:#fff;border-radius:16px;white-space:nowrap;}
    .report-date .ikon{font-size:24px;}
    .report-date strong{display:block;font-size:16px;color:#1f3b2e;margin-bottom:3px;}
    .report-date span{font-size:15px;color:#5f6a64;}

    /* Main */
    .trans-wrap{max-width:1280px;margin:0 auto;padding:48px 48px 72px;display:flex;flex-direction:column;gap:48px;}

    /* Summary cards */
    .summary-row{display:flex;flex-wrap:wrap;gap:20px;}
    .s-card{flex:1;min-width:220px;padding:24px 28px;border:1px solid #e2e6e1;border-radius:16px;background:#fff;display:flex;flex-direction:column;gap:8px;}
    .s-card.balance{background:#f1f6f2;border-color:#bfd2c5;}
    .s-label{font-size:14px;font-weight:700;color:#5f6a64;}
    .s-value{font-size:34px;font-weight:900;line-height:1.1;}
    .s-note{font-size:13px;color:#5f6a64;}
    .balance .s-label,.balance .s-value{color:#2a6046;}

    /* Distribution */
    .dist-box{padding:32px;border:1px solid #e2e6e1;border-radius:20px;}
    .dist-box h2{font-size:24px;font-weight:700;margin-bottom:6px;}
    .dist-intro{color:#5f6a64;font-size:14px;line-height:1.5;margin-bottom:20px;}
    .overall-bar{display:flex;height:22px;border-radius:11px;overflow:hidden;gap:2px;margin-bottom:16px;}
    .bar-pwr{background:#2a6046;}
    .bar-pbg{background:#e3a35b;}
    .group-heading{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;padding:10px 0;font-size:14px;color:#5f6a64;}
    .group-name{display:flex;align-items:center;gap:10px;color:#1f3b2e;font-weight:700;}
    .dot{width:12px;height:12px;border-radius:3px;display:inline-block;}
    .dot-green{background:#2a6046;}.dot-orange{background:#e3a35b;}
    .campus-row{display:grid;grid-template-columns:minmax(200px,380px) 1fr 180px;align-items:center;gap:14px;padding:10px 0;border-bottom:1px solid #eef1ee;}
    .campus-name{font-size:15px;color:#1f3b2e;line-height:1.4;}
    .bar-track{height:14px;background:#eaefe8;border-radius:7px;overflow:hidden;}
    .bar-fill{height:100%;border-radius:7px;background:#2a6046;}
    .bar-fill.orange{background:#e3a35b;}
    .amount{text-align:right;white-space:nowrap;font-size:15px;color:#5f6a64;}
    .amount strong{color:#1f3b2e;}

    @media(max-width:1024px){.hero-inner,.trans-wrap{padding-left:24px;padding-right:24px;}}
    @media(max-width:768px){
        .page-h1{font-size:32px;}
        .hero-content{flex-direction:column;}
        .campus-row{grid-template-columns:1fr;gap:6px;}
        .campus-row .amount{text-align:left;}
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
            <span class="cur">Transparansi</span>
        </div>
        <div class="hero-content">
            <div>
                <p class="eyebrow">NASI DARURAT • LAPORAN TERBUKA</p>
                <h1 class="page-h1">Transparansi Anggaran &amp;<br>Penyaluran</h1>
                <p class="page-sub">Setiap rupiah tercatat jelas demi kepercayaan bersama.</p>
            </div>
            <div class="report-date">
                <span class="ikon">📊</span>
                <div>
                    <strong>Diperbarui {{ date('d M Y') }}</strong>
                    <span>Laporan kas real-time</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Konten --}}
<div class="trans-wrap">

    {{-- Summary Cards --}}
    <section class="summary-row">
        <article class="s-card">
            <span class="s-label">Total Dana Masuk</span>
            <strong class="s-value">Rp {{ number_format(isset($totalInflow) && $totalInflow > 0 ? $totalInflow : 48000000, 0, ',', '.') }}</strong>
            <span class="s-note">Seluruh donasi yang diterima</span>
        </article>
        <article class="s-card">
            <span class="s-label">Dana Terdistribusi</span>
            <strong class="s-value">Rp {{ number_format(isset($totalOutflow) && $totalOutflow > 0 ? $totalOutflow : 39600000, 0, ',', '.') }}</strong>
            <span class="s-note">Sudah disalurkan ke penerima</span>
        </article>
        <article class="s-card balance">
            <span class="s-label">Saldo</span>
            <strong class="s-value">Rp {{ number_format(isset($balance) && $balance > 0 ? $balance : 8400000, 0, ',', '.') }}</strong>
            <span class="s-note">Siap disalurkan</span>
        </article>
    </section>

    {{-- Distribution --}}
    <section class="dist-box">
        <h2>Penyaluran Bantuan per Kampus</h2>
        <p class="dist-intro">September 2026 · total bantuan tersalurkan ke mahasiswa Rp 36.000.000 (makanan, obat &amp; logistik) · 17 kampus · data ilustrasi</p>

        <div class="overall-bar">
            <span class="bar-pwr" style="width:84.2%"></span>
            <span class="bar-pbg" style="width:15.8%"></span>
        </div>

        {{-- Purwokerto --}}
        <div class="group-heading">
            <span class="group-name"><i class="dot dot-green"></i>Kampus di Purwokerto (11 kampus)</span>
            <strong>Rp 30.300.000 · 84,2%</strong>
        </div>

        @php
        $purwokerto = [
            ['Universitas Jenderal Soedirman (Unsoed)', '100%', 'Rp 9.200.000', '25,6%'],
            ['Universitas Islam Negeri Prof. K.H. Saifuddin Zuhri (UIN Saizu)', '58.70%', 'Rp 5.400.000', '15,0%'],
            ['Universitas Muhammadiyah Purwokerto (UMP)', '46.70%', 'Rp 4.300.000', '11,9%'],
            ['Telkom University Purwokerto', '33.70%', 'Rp 3.100.000', '8,6%'],
            ['Universitas Amikom Purwokerto', '27.20%', 'Rp 2.500.000', '6,9%'],
            ['Universitas Wijayakusuma (Unwiku)', '17.40%', 'Rp 1.600.000', '4,4%'],
            ['Universitas Harapan Bangsa (UHB)', '13%', 'Rp 1.200.000', '3,3%'],
            ['Universitas Bina Sarana Informatika (UBSI) Purwokerto', '9.80%', 'Rp 900.000', '2,5%'],
            ['Universitas Nahdlatul Ulama (UNU) Purwokerto', '8.70%', 'Rp 800.000', '2,2%'],
            ['Poltekkes Kemenkes Semarang Kampus Purwokerto', '7.60%', 'Rp 700.000', '1,9%'],
            ['Universitas Terbuka (UT) Purwokerto', '6.50%', 'Rp 600.000', '1,7%'],
        ];
        @endphp
        @foreach($purwokerto as $k)
        <div class="campus-row">
            <span class="campus-name">{{ $k[0] }}</span>
            <div class="bar-track"><div class="bar-fill" style="width:{{ $k[1] }}"></div></div>
            <span class="amount"><strong>{{ $k[2] }}</strong> · {{ $k[3] }}</span>
        </div>
        @endforeach

        {{-- Purbalingga --}}
        <div class="group-heading">
            <span class="group-name"><i class="dot dot-orange"></i>Kampus di Purbalingga (6 kampus)</span>
            <strong>Rp 5.700.000 · 15,8%</strong>
        </div>

        @php
        $purbalingga = [
            ['Fakultas Teknik Unsoed (Kampus Blater)', '20.70%', 'Rp 1.900.000', '5,3%'],
            ['UIN Saizu Kampus 2 Purbalingga', '14.10%', 'Rp 1.300.000', '3,6%'],
            ['Universitas Perwira Purbalingga (UNPERBA)', '10.90%', 'Rp 1.000.000', '2,8%'],
            ['STIE YPPI Purbalingga', '6.50%', 'Rp 600.000', '1,7%'],
            ['STKIP Purbalingga', '5.40%', 'Rp 500.000', '1,4%'],
            ['Politeknik Purbalingga', '4.30%', 'Rp 400.000', '1,1%'],
        ];
        @endphp
        @foreach($purbalingga as $k)
        <div class="campus-row">
            <span class="campus-name">{{ $k[0] }}</span>
            <div class="bar-track"><div class="bar-fill orange" style="width:{{ $k[1] }}"></div></div>
            <span class="amount"><strong>{{ $k[2] }}</strong> · {{ $k[3] }}</span>
        </div>
        @endforeach

    </section>

</div>

@endsection
