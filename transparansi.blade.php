<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transparansi Anggaran - SIDAPUR</title>
    <style>
        @import url("https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css");
        @import url("https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap");

        * { box-sizing: border-box; -webkit-font-smoothing: antialiased; }
        html, body { margin: 0; min-height: 100%; font-family: "Lato", Helvetica, sans-serif; }
        a { color: inherit; text-decoration: none; }
        .transparasi { display:flex; flex-direction:column; align-items:center; width:100%; background:#fff; color:#1f3b2e; }
        .header { width:100%; padding:0  max(24px, calc((100% - 1280px)/2)); border-bottom:1px solid #e2e6e1; background:#fff; }
        .header-inner { max-width:1280px; min-height:87px; margin:auto; padding:0 24px; display:flex; align-items:center; justify-content:space-between; gap:24px; }
        .brand { display:flex; align-items:center; gap:12px; flex-shrink:0; }
        .logo { width:40px; height:40px; object-fit:contain; }
        .brand-name { font-weight:900; font-size:22px; line-height:24px; }
        .tagline { color:#5f6a64; font-size:9px; letter-spacing:.36px; }
        .brand-copy { display:flex; flex-direction:column; gap:2px; }
        .nav, .auth { display:flex; align-items:center; gap:30px; }
        .nav a, .auth a { font-size:15px; white-space:nowrap; }
        .nav a { color:#2b3a33; }
        .nav a.active { color:#2a6046; font-weight:700; padding-bottom:6px; border-bottom:2px solid #2a6046; }
        .auth { gap:20px; }
        .auth .login { color:#2a6046; font-weight:700; }
        .auth .register { color:#fff; background:#2a6046; border-radius:8px; padding:14px 22px; font-weight:700; }
        .hero { width:100%; background:#eaefe8; padding:0 max(24px, calc((100% - 1280px)/2)); }
        .hero-inner { max-width:1280px; margin:auto; padding:24px 24px 40px; }
        .breadcrumb { display:flex; align-items:center; gap:10px; color:#5f6a64; font-size:14px; margin-bottom:28px; }
        .breadcrumb strong { color:#2a6046; }
        .hero-content { display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:32px; }
        .eyebrow { color:#2a6046; font-weight:700; font-size:12px; letter-spacing:.24px; margin-bottom:8px; }
        h1 { font-size:48px; line-height:1.1; font-weight:900; margin:0 0 14px; }
        .subtitle { color:#5f6a64; font-size:17px; line-height:1.6; }
        .report-date { display:flex; align-items:center; gap:16px; padding:22px 28px; background:#fff; border-radius:16px; }
        .report-date img { width:24px; height:24px; object-fit:contain; }
        .report-date strong { display:block; font-size:16px; margin-bottom:4px; }
        .report-date span { color:#5f6a64; font-size:15px; }
        main { width:100%; max-width:1280px; padding:48px 24px 72px; display:flex; flex-direction:column; gap:48px; }
        .summary { display:flex; flex-wrap:wrap; gap:20px; }
        .summary-card { flex:1 1 260px; min-width:0; padding:25px 29px; border:1px solid #e2e6e1; border-radius:16px; display:flex; flex-direction:column; gap:8px; background:#fff; }
        .summary-card.balance { background:#f1f6f2; border-color:#bfd2c5; }
        .summary-label { color:#5f6a64; font-size:14px; font-weight:700; }
        .summary-value { font-size:34px; line-height:1.1; font-weight:900; }
        .balance .summary-label, .balance .summary-value { color:#2a6046; }
        .summary-note { color:#5f6a64; font-size:13px; }
        .distribution { padding:33px; border:1px solid #e2e6e1; border-radius:20px; display:flex; flex-direction:column; gap:20px; }
        .distribution h2 { font-size:24px; font-weight:700; margin:0 0 6px; }
        .distribution-intro { color:#5f6a64; font-size:14px; line-height:1.5; }
        .overall-bar { display:flex; height:22px; gap:2px; overflow:hidden; border-radius:11px; }
        .overall-bar .purwokerto { width:84.2%; background:#2a6046; }
        .overall-bar .purbalingga { width:15.8%; background:#e3a35b; }
        .group-heading { display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px; padding-top:8px; font-size:14px; color:#5f6a64; }
        .group-name { display:flex; align-items:center; gap:10px; color:#1f3b2e; font-weight:700; }
        .legend-dot { width:12px; height:12px; border-radius:3px; background:#2a6046; display:inline-block; }
        .legend-dot.orange { background:#e3a35b; }
        .campus-row { display:grid; grid-template-columns:minmax(220px, 380px) minmax(100px, 1fr) 200px; align-items:center; gap:16px; padding:10px 0 11px; border-bottom:1px solid #eef1ee; }
        .campus-name { font-size:15px; line-height:1.4; }
        .bar-track { height:14px; background:#eaefe8; border-radius:7px; overflow:hidden; }
        .bar-fill { height:100%; border-radius:7px; background:#2a6046; }
        .bar-fill.orange { background:#e3a35b; }
        .amount { text-align:right; white-space:nowrap; font-size:15px; color:#5f6a64; }
        .amount strong { color:#1f3b2e; }
        footer { width:100%; padding:0 max(24px, calc((100% - 1280px)/2)); background:#f8f6f1; }
        .footer-inner { max-width:1280px; margin:auto; padding:56px 24px 0; }
        .footer-columns { display:grid; grid-template-columns: minmax(260px, 1.6fr) repeat(3, minmax(140px, 1fr)); gap:40px; }
        .footer-brand { display:flex; align-items:center; gap:12px; margin-bottom:14px; }
        .footer-brand-name { font-size:22px; font-weight:900; }
        .footer-desc { color:#5f6a64; font-size:15px; line-height:24px; margin-bottom:14px; }
        .instagram { color:#2a6046; font-weight:700; font-size:15px; }
        .footer-column { display:flex; flex-direction:column; align-items:flex-start; gap:14px; }
        .footer-column h3 { font-weight:700; font-size:16px; }
        .footer-column a { color:#5f6a64; font-size:14px; }
        .footer-bottom { display:flex; flex-wrap:wrap; justify-content:space-between; gap:12px; padding:29px 0 32px; margin-top:48px; border-top:1px solid #e2e6e1; color:#5f6a64; font-size:12px; }
        @media (max-width: 900px) {
            .header-inner { flex-wrap:wrap; padding:18px 0; }
            .nav { order:3; width:100%; justify-content:center; gap:18px; flex-wrap:wrap; }
            .hero-content { align-items:flex-start; }
            .campus-row { grid-template-columns:minmax(180px, 1fr) minmax(80px, 1fr); }
            .campus-row .amount { grid-column:2; }
            .bar-track { grid-column:1 / -1; grid-row:2; }
            .footer-columns { grid-template-columns:repeat(2, minmax(0,1fr)); }
        }
        @media (max-width: 600px) {
            .header { padding:0 20px; }
            .header-inner { gap:16px; }
            .nav { justify-content:flex-start; overflow-x:auto; flex-wrap:nowrap; padding-bottom:8px; }
            .nav a { font-size:13px; }
            .auth { gap:12px; }
            .auth a { font-size:13px; }
            .auth .register { padding:11px 14px; }
            .hero { padding:0 20px; }
            .hero-inner { padding:22px 0 32px; }
            h1 { font-size:36px; }
            .subtitle { font-size:15px; }
            .report-date { min-width:0; width:100%; padding:18px; }
            main { padding:32px 20px 48px; gap:32px; }
            .distribution { padding:20px 16px; }
            .distribution h2 { font-size:21px; }
            .campus-row { grid-template-columns:1fr; gap:8px; }
            .campus-row .amount { grid-column:auto; text-align:left; }
            .bar-track { grid-column:auto; grid-row:auto; }
            .footer-columns { grid-template-columns:1fr 1fr; gap:30px 18px; }
            .footer-columns > :first-child { grid-column:1 / -1; }
            .footer-inner { padding:40px 0 0; }
            .footer-bottom { margin-top:32px; }
        }
    </style>
</head>
<body>
<div class="transparasi">
    <header class="header">
        <div class="header-inner">
            <a class="brand" href="#">
                <img class="logo" src="{{ asset('img/vector-5.svg') }}" alt="Logo SIDAPUR">
                <span class="brand-copy">
                    <span class="brand-name">SIDAPUR</span>
                    <span class="tagline">KEBAIKAN DALAM SEPORSI NASI</span>
                </span>
            </a>
            <nav class="nav">
                <a href="#">Beranda</a>
                <a href="#">Tentang kami</a>
                <a class="active" href="#">Transparansi</a>
                <a href="#">Hubungi kami</a>
            </nav>
            <div class="auth">
                <a class="login" href="#">Masuk</a>
                <a class="register" href="#">Daftar</a>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-inner">
            <div class="breadcrumb"><span>Beranda</span><span>›</span><strong>Transparansi</strong></div>
            <div class="hero-content">
                <div>
                    <p class="eyebrow">NASI DARURAT • LAPORAN TERBUKA</p>
                    <h1>Transparansi Anggaran &amp;<br>Penyaluran</h1>
                    <p class="subtitle">Setiap rupiah tercatat jelas demi kepercayaan bersama.</p>
                </div>
                <div class="report-date">
                    <img src="{{ asset('img/vector-6.svg') }}" alt="">
                    <div><strong>Diperbarui 24 Okt 2026</strong><span>Laporan periode September 2026</span></div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="summary">
            <article class="summary-card">
                <span class="summary-label">Total Dana Masuk</span>
                <strong class="summary-value">Rp 48.000.000</strong>
                <span class="summary-note">Seluruh donasi yang diterima</span>
            </article>
            <article class="summary-card">
                <span class="summary-label">Dana Terdistribusi</span>
                <strong class="summary-value">Rp 39.600.000</strong>
                <span class="summary-note">Sudah disalurkan ke penerima</span>
            </article>
            <article class="summary-card balance">
                <span class="summary-label">Saldo</span>
                <strong class="summary-value">Rp 8.400.000</strong>
                <span class="summary-note">Siap disalurkan</span>
            </article>
        </section>

        <section class="distribution">
            <div>
                <h2>Penyaluran Bantuan per Kampus</h2>
                <p class="distribution-intro">September 2026 · total bantuan tersalurkan ke mahasiswa Rp 36.000.000 (makanan, obat &amp; logistik) · 17 kampus · data ilustrasi</p>
            </div>
            <div class="overall-bar"><span class="purwokerto"></span><span class="purbalingga"></span></div>

            <div class="group-heading">
                <span class="group-name"><i class="legend-dot"></i>Kampus di Purwokerto (11 kampus)</span>
                <strong>Rp 30.300.000 · 84,2%</strong>
            </div>

            <div class="campus-row"><span class="campus-name">Universitas Jenderal Soedirman (Unsoed)</span><div class="bar-track"><div class="bar-fill" style="width:100%"></div></div><span class="amount"><strong>Rp 9.200.000</strong> · 25,6%</span></div>
            <div class="campus-row"><span class="campus-name">Universitas Islam Negeri Prof. K.H. Saifuddin Zuhri (UIN Saizu)</span><div class="bar-track"><div class="bar-fill" style="width:58.70%"></div></div><span class="amount"><strong>Rp 5.400.000</strong> · 15,0%</span></div>
            <div class="campus-row"><span class="campus-name">Universitas Muhammadiyah Purwokerto (UMP)</span><div class="bar-track"><div class="bar-fill" style="width:46.70%"></div></div><span class="amount"><strong>Rp 4.300.000</strong> · 11,9%</span></div>
            <div class="campus-row"><span class="campus-name">Telkom University Purwokerto</span><div class="bar-track"><div class="bar-fill" style="width:33.70%"></div></div><span class="amount"><strong>Rp 3.100.000</strong> · 8,6%</span></div>
            <div class="campus-row"><span class="campus-name">Universitas Amikom Purwokerto</span><div class="bar-track"><div class="bar-fill" style="width:27.20%"></div></div><span class="amount"><strong>Rp 2.500.000</strong> · 6,9%</span></div>
            <div class="campus-row"><span class="campus-name">Universitas Wijayakusuma (Unwiku)</span><div class="bar-track"><div class="bar-fill" style="width:17.40%"></div></div><span class="amount"><strong>Rp 1.600.000</strong> · 4,4%</span></div>
            <div class="campus-row"><span class="campus-name">Universitas Harapan Bangsa (UHB)</span><div class="bar-track"><div class="bar-fill" style="width:13%"></div></div><span class="amount"><strong>Rp 1.200.000</strong> · 3,3%</span></div>
            <div class="campus-row"><span class="campus-name">Universitas Bina Sarana Informatika (UBSI) Kampus Purwokerto</span><div class="bar-track"><div class="bar-fill" style="width:9.80%"></div></div><span class="amount"><strong>Rp 900.000</strong> · 2,5%</span></div>
            <div class="campus-row"><span class="campus-name">Universitas Nahdlatul Ulama (UNU) Purwokerto</span><div class="bar-track"><div class="bar-fill" style="width:8.70%"></div></div><span class="amount"><strong>Rp 800.000</strong> · 2,2%</span></div>
            <div class="campus-row"><span class="campus-name">Poltekkes Kemenkes Semarang (Kampus Purwokerto)</span><div class="bar-track"><div class="bar-fill" style="width:7.60%"></div></div><span class="amount"><strong>Rp 700.000</strong> · 1,9%</span></div>
            <div class="campus-row"><span class="campus-name">Universitas Terbuka (UT) Purwokerto</span><div class="bar-track"><div class="bar-fill" style="width:6.50%"></div></div><span class="amount"><strong>Rp 600.000</strong> · 1,7%</span></div>

            <div class="group-heading">
                <span class="group-name"><i class="legend-dot orange"></i>Kampus di Purbalingga (PBG) (6 kampus)</span>
                <strong>Rp 5.700.000 · 15,8%</strong>
            </div>

            <div class="campus-row"><span class="campus-name">Fakultas Teknik Unsoed (Kampus Blater)</span><div class="bar-track"><div class="bar-fill orange" style="width:20.70%"></div></div><span class="amount"><strong>Rp 1.900.000</strong> · 5,3%</span></div>
            <div class="campus-row"><span class="campus-name">UIN Saizu Kampus 2 Purbalingga</span><div class="bar-track"><div class="bar-fill orange" style="width:14.10%"></div></div><span class="amount"><strong>Rp 1.300.000</strong> · 3,6%</span></div>
            <div class="campus-row"><span class="campus-name">Universitas Perwira Purbalingga (UNPERBA)</span><div class="bar-track"><div class="bar-fill orange" style="width:10.90%"></div></div><span class="amount"><strong>Rp 1.000.000</strong> · 2,8%</span></div>
            <div class="campus-row"><span class="campus-name">STIE YPPI Purbalingga</span><div class="bar-track"><div class="bar-fill orange" style="width:6.50%"></div></div><span class="amount"><strong>Rp 600.000</strong> · 1,7%</span></div>
            <div class="campus-row"><span class="campus-name">STKIP Purbalingga</span><div class="bar-track"><div class="bar-fill orange" style="width:5.40%"></div></div><span class="amount"><strong>Rp 500.000</strong> · 1,4%</span></div>
            <div class="campus-row"><span class="campus-name">Politeknik Purbalingga</span><div class="bar-track"><div class="bar-fill orange" style="width:4.30%"></div></div><span class="amount"><strong>Rp 400.000</strong> · 1,1%</span></div>
        </section>
    </main>

    <footer>
        <div class="footer-inner">
            <div class="footer-columns">
                <div>
                    <div class="footer-brand">
                        <img class="logo" src="{{ asset('img/vector-4.svg') }}" alt="Logo Nasi Darurat">
                        <span class="brand-copy"><span class="footer-brand-name">nasi darurat</span><span class="tagline">KEBAIKAN DALAM SEPORSI NASI</span></span>
                    </div>
                    <p class="footer-desc">Seporsi makanan, sebuah kepedulian. Ruang bersama untuk menghadirkan harapan melalui makanan layak.</p>
                    <a class="instagram" href="#">Instagram Nasi Darurat ↗</a>
                </div>
                <div class="footer-column"><h3>Jelajahi</h3><a href="#">Program &amp; penerima</a><a href="#">Tentang Nasi Darurat</a><a href="#">Transparansi anggaran</a><a href="#">Artikel &amp; dokumentasi</a></div>
                <div class="footer-column"><h3>Terlibat</h3><a href="#">Jadi donatur</a><a href="#">Kolaborasi</a><a href="#">Ulasan komunitas</a><a href="#">Hubungi kami</a></div>
                <div class="footer-column"><h3>Informasi</h3><a href="#">Syarat dan ketentuan</a><a href="#">Kebijakan privasi</a><a href="#">Pusat bantuan</a><a href="#">Bahasa Indonesia ⌄</a></div>
            </div>
            <div class="footer-bottom">
                <span>© 2026 Nasi Darurat. Kebaikan dalam seporsi nasi.</span>
                <span>Mockup visual • angka, penerima, dan konten merupakan ilustrasi.</span>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
