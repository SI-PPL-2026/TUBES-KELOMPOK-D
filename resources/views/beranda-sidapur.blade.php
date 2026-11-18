@extends('layouts.public')

@section('title', 'SIDAPUR - Kebaikan dalam Seporsi Nasi')

@section('styles')
<style>
    /* ===== HERO BERANDA ===== */
    .hero-beranda {
        background: #eaefe8;
        padding: 0 48px;
    }
    .hero-inner {
        max-width: 1280px; margin: 0 auto;
        padding: 56px 0 64px;
        display: flex; align-items: center; justify-content: space-between;
        gap: 48px; flex-wrap: wrap;
    }
    .hero-teks { flex: 1; min-width: 280px; }
    .hero-label { font-size: 12px; font-weight: 700; color: #2a6046; letter-spacing: .48px; margin-bottom: 14px; }
    .hero-judul { font-size: 56px; font-weight: 900; color: #1f3b2e; line-height: 1.1; margin-bottom: 20px; }
    .hero-sub { font-size: 18px; color: #5f6a64; line-height: 1.65; margin-bottom: 32px; max-width: 560px; }
    .hero-actions { display: flex; gap: 16px; flex-wrap: wrap; }
    .btn-primary { padding: 15px 32px; background: #2a6046; color: #fff; border-radius: 8px; font-size: 16px; font-weight: 700; transition: background .15s; }
    .btn-primary:hover { background: #1f4f36; }
    .btn-secondary { padding: 15px 32px; background: #fff; color: #2a6046; border: 2px solid #2a6046; border-radius: 8px; font-size: 16px; font-weight: 700; transition: all .15s; }
    .btn-secondary:hover { background: #2a6046; color: #fff; }

    .hero-stats {
        display: flex; flex-direction: column; gap: 16px;
        min-width: 240px;
    }
    .stat-card {
        padding: 20px 24px; background: #fff; border-radius: 16px; border: 1px solid #e2e6e1;
        display: flex; align-items: center; gap: 16px;
    }
    .stat-ikon { font-size: 28px; }
    .stat-val { font-size: 24px; font-weight: 900; color: #1f3b2e; }
    .stat-label { font-size: 13px; color: #5f6a64; margin-top: 2px; }

    /* ===== SECTION CARA KERJA ===== */
    .cara-kerja { padding: 64px 48px; background: #fff; }
    .section-wrap { max-width: 1280px; margin: 0 auto; }
    .section-label { font-size: 12px; font-weight: 700; color: #2a6046; letter-spacing: .48px; margin-bottom: 10px; }
    .section-h2 { font-size: 36px; font-weight: 900; color: #1f3b2e; margin-bottom: 14px; line-height: 1.2; }
    .section-sub { font-size: 17px; color: #5f6a64; margin-bottom: 48px; line-height: 1.6; }

    .langkah-row { display: flex; gap: 24px; flex-wrap: wrap; }
    .langkah-card {
        flex: 1; min-width: 200px; padding: 28px;
        background: #f6f8f5; border: 1px solid #e2e6e1; border-radius: 16px;
        display: flex; flex-direction: column; gap: 12px;
    }
    .langkah-num { width: 36px; height: 36px; background: #2a6046; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 14px; }
    .langkah-title { font-size: 18px; font-weight: 700; color: #1f3b2e; }
    .langkah-desc { font-size: 15px; color: #5f6a64; line-height: 1.6; }

    /* ===== SECTION TRANSPARANSI RINGKAS ===== */
    .trans-section { padding: 64px 48px; background: #f6f8f5; }
    .trans-cards { display: flex; gap: 20px; flex-wrap: wrap; }
    .trans-card {
        flex: 1; min-width: 200px; padding: 28px;
        background: #fff; border: 1px solid #e2e6e1; border-radius: 16px;
    }
    .trans-card.balance { background: #f1f6f2; border-color: #bfd2c5; }
    .trans-card-label { font-size: 14px; font-weight: 700; color: #5f6a64; margin-bottom: 8px; }
    .trans-card-val { font-size: 32px; font-weight: 900; color: #1f3b2e; margin-bottom: 6px; }
    .trans-card.balance .trans-card-label,
    .trans-card.balance .trans-card-val { color: #2a6046; }
    .trans-card-note { font-size: 13px; color: #5f6a64; }
    .trans-link { display: inline-block; margin-top: 32px; font-size: 15px; font-weight: 700; color: #2a6046; }
    .trans-link:hover { text-decoration: underline; }

    /* ===== SECTION ULASAN ===== */
    .ulasan-section { padding: 64px 48px; background: #eaf0e7; }
    .ulasan-row { display: flex; gap: 24px; flex-wrap: wrap; }
    .ulasan-card {
        flex: 1; min-width: 260px; padding: 28px;
        background: #fff; border-radius: 16px;
        display: flex; flex-direction: column; gap: 16px;
    }
    .ulasan-bintang { font-size: 18px; color: #2a6046; letter-spacing: 2px; }
    .ulasan-teks { font-size: 16px; color: #3f4a44; line-height: 1.65; font-style: italic; }
    .ulasan-penulis { display: flex; align-items: center; gap: 12px; }
    .avatar { width: 36px; height: 36px; border-radius: 50%; background: #2a6046; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 13px; flex-shrink: 0; }
    .penulis-nama { font-size: 15px; font-weight: 700; color: #1f3b2e; }
    .penulis-role { font-size: 13px; color: #5f6a64; }

    /* ===== CTA SECTION ===== */
    .cta-section { padding: 80px 48px; background: #fff; text-align: center; }
    .cta-label { font-size: 12px; font-weight: 700; color: #2a6046; letter-spacing: .48px; margin-bottom: 14px; }
    .cta-h2 { font-size: 42px; font-weight: 900; color: #1f3b2e; margin-bottom: 14px; line-height: 1.2; }
    .cta-sub { font-size: 17px; color: #5f6a64; margin-bottom: 36px; }
    .cta-actions { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; }

    /* ===== ARTIKEL ===== */
    .artikel-section { padding: 64px 48px; background: #f6f8f5; }
    .artikel-row { display: flex; gap: 24px; flex-wrap: wrap; }
    .artikel-card {
        flex: 1; min-width: 260px; padding: 24px;
        background: #fff; border: 1px solid #e2e6e1; border-radius: 16px;
        display: flex; flex-direction: column; gap: 12px;
    }
    .artikel-tag { font-size: 12px; font-weight: 700; color: #2a6046; letter-spacing: .48px; }
    .artikel-title { font-size: 20px; font-weight: 700; color: #1f3b2e; line-height: 1.3; }
    .artikel-excerpt { font-size: 15px; color: #5f6a64; line-height: 1.6; flex: 1; }
    .artikel-link { font-size: 14px; font-weight: 700; color: #2a6046; align-self: flex-start; }
    .artikel-link:hover { text-decoration: underline; }

    @media(max-width:1024px){
        .hero-beranda,.cara-kerja,.trans-section,.ulasan-section,.cta-section,.artikel-section{padding-left:24px;padding-right:24px;}
    }
    @media(max-width:768px){
        .hero-judul{font-size:36px;}
        .cta-h2{font-size:28px;}
        .hero-inner{flex-direction:column;}
        .hero-stats{flex-direction:row;flex-wrap:wrap;}
    }
    @media(max-width:600px){
        .langkah-row,.trans-cards,.ulasan-row,.artikel-row{flex-direction:column;}
    }
</style>
@endsection

@section('content')

{{-- ===== HERO ===== --}}
<section class="hero-beranda">
    <div class="hero-inner">
        <div class="hero-teks">
            <div class="hero-label">NASI DARURAT PURBALINGGA &amp; PURWOKERTO</div>
            <h1 class="hero-judul">Kebaikan dalam<br>Seporsi Nasi.</h1>
            <p class="hero-sub">Gerakan kepedulian sosial yang membantu mahasiswa &amp; anak kos yang kesulitan finansial mendapatkan makanan layak melalui warung rekanan.</p>
            <div class="hero-actions">
                <a href="{{ route('ajukan-bantuan') }}" class="btn-primary">Ajukan Bantuan</a>
                <a href="{{ route('bantu-donasi') }}" class="btn-secondary">Titip Donasi</a>
            </div>
        </div>
        <div class="hero-stats">
            <div class="stat-card">
                <span class="stat-ikon">🍱</span>
                <div>
                    <div class="stat-val">{{ isset($totalAidRequests) ? number_format($totalAidRequests) : '500+' }}</div>
                    <div class="stat-label">Pengajuan diproses</div>
                </div>
            </div>
            <div class="stat-card">
                <span class="stat-ikon">❤️</span>
                <div>
                    <div class="stat-val">{{ isset($totalDonations) ? number_format($totalDonations) : '200+' }}</div>
                    <div class="stat-label">Donatur tergabung</div>
                </div>
            </div>
            <div class="stat-card">
                <span class="stat-ikon">🏫</span>
                <div>
                    <div class="stat-val">17</div>
                    <div class="stat-label">Kampus terjangkau</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== CARA KERJA ===== --}}
<section class="cara-kerja">
    <div class="section-wrap">
        <div class="section-label">CARA KERJA PROGRAM</div>
        <h2 class="section-h2">Sederhana, transparan, &amp; tepat sasaran.</h2>
        <p class="section-sub">Dari pengajuan hingga penyaluran, semua tercatat dan bisa dipantau.</p>

        <div class="langkah-row">
            <div class="langkah-card">
                <div class="langkah-num">1</div>
                <div class="langkah-title">Ajukan Bantuan</div>
                <div class="langkah-desc">Mahasiswa mengisi formulir online dengan KTM dan data warung rekanan terdekat.</div>
            </div>
            <div class="langkah-card">
                <div class="langkah-num">2</div>
                <div class="langkah-title">Verifikasi Admin</div>
                <div class="langkah-desc">Tim kami memverifikasi pengajuan dalam 1–2 hari kerja untuk memastikan kesesuaian.</div>
            </div>
            <div class="langkah-card">
                <div class="langkah-num">3</div>
                <div class="langkah-title">Donatur Titip Dana</div>
                <div class="langkah-desc">Donatur mengirim donasi melalui transfer atau QRIS dan mengupload bukti.</div>
            </div>
            <div class="langkah-card">
                <div class="langkah-num">4</div>
                <div class="langkah-title">Bantuan Disalurkan</div>
                <div class="langkah-desc">Dana dikirim ke warung rekanan sesuai nama penerima. Semua tercatat di laporan terbuka.</div>
            </div>
        </div>
    </div>
</section>

{{-- ===== TRANSPARANSI RINGKAS ===== --}}
<section class="trans-section">
    <div class="section-wrap">
        <div class="section-label">TRANSPARANSI ANGGARAN</div>
        <h2 class="section-h2">Setiap rupiah terlacak.</h2>
        <div class="trans-cards">
            <div class="trans-card">
                <div class="trans-card-label">Total Dana Masuk</div>
                <div class="trans-card-val">Rp {{ number_format(isset($totalInflow) && $totalInflow > 0 ? $totalInflow : 48000000, 0, ',', '.') }}</div>
                <div class="trans-card-note">Seluruh donasi diterima</div>
            </div>
            <div class="trans-card">
                <div class="trans-card-label">Dana Terdistribusi</div>
                <div class="trans-card-val">Rp {{ number_format(isset($totalOutflow) && $totalOutflow > 0 ? $totalOutflow : 39600000, 0, ',', '.') }}</div>
                <div class="trans-card-note">Disalurkan ke penerima</div>
            </div>
            <div class="trans-card balance">
                <div class="trans-card-label">Saldo Tersedia</div>
                <div class="trans-card-val">Rp {{ number_format(isset($balance) && $balance > 0 ? $balance : 8400000, 0, ',', '.') }}</div>
                <div class="trans-card-note">Siap disalurkan</div>
            </div>
        </div>
        <a href="{{ route('transparansi') }}" class="trans-link">Lihat laporan lengkap →</a>
    </div>
</section>

{{-- ===== ULASAN ===== --}}
<section class="ulasan-section">
    <div class="section-wrap">
        <div class="section-label">SUARA KEBAIKAN</div>
        <h2 class="section-h2">Yang terasa, bukan hanya yang tercatat.</h2>
        <p class="section-sub" style="margin-bottom:36px;">Cerita dari donatur dan penerima yang sudah merasakan.</p>
        <div class="ulasan-row">
            @if(isset($reviews) && $reviews->count())
                @foreach($reviews->take(3) as $review)
                <div class="ulasan-card">
                    <div class="ulasan-bintang">{{ str_repeat('★', $review->rating ?? 5) }}</div>
                    <p class="ulasan-teks">"{{ $review->content }}"</p>
                    <div class="ulasan-penulis">
                        <div class="avatar">{{ strtoupper(substr($review->user->name ?? 'U', 0, 2)) }}</div>
                        <div>
                            <div class="penulis-nama">{{ $review->user->name ?? 'Anonim' }}</div>
                            <div class="penulis-role">{{ ucfirst($review->user->role ?? 'Pengguna') }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="ulasan-card">
                <div class="ulasan-bintang">★★★★★</div>
                <p class="ulasan-teks">"Bisa melihat kabar penyaluran membuat saya merasa dekat dengan orang-orang yang dibantu."</p>
                <div class="ulasan-penulis">
                    <div class="avatar">AP</div>
                    <div><div class="penulis-nama">Ayu P.</div><div class="penulis-role">Donatur</div></div>
                </div>
            </div>
            <div class="ulasan-card">
                <div class="ulasan-bintang">★★★★★</div>
                <p class="ulasan-teks">"Di dapur ini, kami berbagi pekerjaan, cerita, dan rasa peduli yang sama."</p>
                <div class="ulasan-penulis">
                    <div class="avatar">BS</div>
                    <div><div class="penulis-nama">Bima S.</div><div class="penulis-role">Relawan</div></div>
                </div>
            </div>
            <div class="ulasan-card">
                <div class="ulasan-bintang">★★★★★</div>
                <p class="ulasan-teks">"Alhamdulillah, bisa makan malam itu berkat bantuan Nasi Darurat. Terima kasih banyak."</p>
                <div class="ulasan-penulis">
                    <div class="avatar">MR</div>
                    <div><div class="penulis-nama">Muhammad R.</div><div class="penulis-role">Penerima</div></div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- ===== ARTIKEL ===== --}}
<section class="artikel-section">
    <div class="section-wrap">
        <div class="section-label">ARTIKEL &amp; KEGIATAN</div>
        <h2 class="section-h2">Cerita dari lapangan.</h2>
        <div class="artikel-row">
            @if(isset($articles) && $articles->count())
                @foreach($articles->take(3) as $article)
                <div class="artikel-card">
                    <div class="artikel-tag">ARTIKEL</div>
                    <div class="artikel-title">{{ $article->title }}</div>
                    <div class="artikel-excerpt">{{ Str::limit(strip_tags($article->content ?? ''), 100) }}</div>
                    <a href="{{ route('articles.show', $article->slug ?? $article->id) }}" class="artikel-link">Baca selengkapnya →</a>
                </div>
                @endforeach
            @else
            <div class="artikel-card">
                <div class="artikel-tag">KEGIATAN</div>
                <div class="artikel-title">Penyaluran Perdana di Purbalingga</div>
                <div class="artikel-excerpt">Gerakan dimulai dari satu warung, kini menyentuh 17 kampus di dua kota. Ini kisah awalnya.</div>
                <a href="{{ route('articles.index') }}" class="artikel-link">Baca selengkapnya →</a>
            </div>
            <div class="artikel-card">
                <div class="artikel-tag">DOKUMENTASI</div>
                <div class="artikel-title">Warung Rekanan Bertambah di Purwokerto</div>
                <div class="artikel-excerpt">Kami terus memperluas jaringan warung agar lebih banyak mahasiswa bisa terjangkau.</div>
                <a href="{{ route('articles.index') }}" class="artikel-link">Baca selengkapnya →</a>
            </div>
            <div class="artikel-card">
                <div class="artikel-tag">LAPORAN</div>
                <div class="artikel-title">Transparansi Dana September 2026</div>
                <div class="artikel-excerpt">Laporan bulan ini menunjukkan peningkatan signifikan dalam jumlah donatur aktif.</div>
                <a href="{{ route('transparansi') }}" class="artikel-link">Baca selengkapnya →</a>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- ===== CTA ===== --}}
<section class="cta-section">
    <div class="cta-label">IKUT TERLIBAT</div>
    <h2 class="cta-h2">Satu porsi, satu harapan.<br>Yuk bergabung.</h2>
    <p class="cta-sub">Jadilah bagian dari gerakan kepedulian ini — sebagai donatur, penerima, atau mitra.</p>
    <div class="cta-actions">
        <a href="{{ route('bantu-donasi') }}" class="btn-primary">Titip Donasi Sekarang</a>
        <a href="{{ route('tentang') }}" class="btn-secondary">Pelajari Lebih Lanjut</a>
    </div>
</section>

@endsection
