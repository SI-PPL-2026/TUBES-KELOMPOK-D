<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bantu Donasi - Nasi Darurat</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lato:wght@400;700;800;900&display=swap");
        * { box-sizing: border-box; -webkit-font-smoothing: antialiased; }
        html, body { margin: 0; min-height: 100%; }
        body { font-family: "Lato", Helvetica, sans-serif; color: #233b30; background: #fff; }
        a { color: inherit; text-decoration: none; }
        .bantu-donasi-nasi { display:flex; flex-direction:column; width:100%; background:#fff; }
        .navigasi-utama { display:flex; min-height:88px; align-items:center; justify-content:space-between; gap:24px; padding:16px 6%; border-bottom:1px solid #dee4dc; }
        .identitas-nasi { display:inline-flex; align-items:center; gap:12px; flex-shrink:0; }
        .lambang-program { display:flex; width:40px; height:40px; align-items:center; justify-content:center; background:#276447; border-radius:50%; overflow:hidden; }
        .img-wrapper { position:relative; width:24px; height:24px; }
        .lambang { width:100%; height:100%; object-fit:contain; }
        .nama-program { display:flex; flex-direction:column; }
        .nama { font-weight:800; color:#233b30; font-size:21px; white-space:nowrap; }
        .semboyan { color:#728078; font-size:10px; letter-spacing:.12px; white-space:nowrap; }
        .navbar { display:flex; align-items:center; gap:30px; }
        .tautan-navigasi { color:#233b30; font-size:15px; }
        .akses-akun { display:flex; align-items:center; gap:20px; }
        .text-wrapper { color:#276447; font-weight:700; font-size:15px; }
        .tombol-tindakan { display:inline-flex; min-height:48px; align-items:center; justify-content:center; gap:10px; padding:0 22px; background:#276447; border-radius:8px; color:#fff; }
        .label-tindakan { color:#fff; font-size:15px; font-weight:700; white-space:nowrap; }
        .pengantar-pengajuan { display:flex; flex-direction:column; gap:30px; padding:28px 6% 40px; background:#eaf0e7; }
        .jejak-halaman { display:flex; align-items:center; gap:10px; color:#5e6e64; font-size:14px; }
        .halaman-aktif { color:#276447; font-weight:700; }
        .chevron-right { width:14px; height:14px; }
        .vector { width:100%; height:100%; object-fit:contain; }
        .judul-dan-cakupan { display:flex; align-items:center; gap:64px; }
        .pesan-pengajuan { display:flex; flex:1; flex-direction:column; align-items:flex-start; gap:14px; }
        .kategori { color:#276447; font-size:12px; font-weight:700; letter-spacing:.18px; }
        .judul { font-size:clamp(32px, 4vw, 48px); line-height:1.15; font-weight:700; letter-spacing:-.34px; }
        .pengantar { max-width:780px; color:#5e6e64; font-size:17px; line-height:1.5; }
        .cakupan-program { display:flex; width:330px; align-items:flex-start; gap:14px; padding:20px; background:#fff; border-radius:16px; }
        .cakupan-program .img-wrapper { flex-shrink:0; }
        .cakupan-program .img { width:24px; height:24px; object-fit:contain; }
        .div { display:flex; flex:1; flex-direction:column; gap:6px; }
        .penerima-program { font-size:16px; font-weight:700; }
        .wilayah-program { color:#5e6e64; font-size:15px; line-height:1.5; }
        .formulir-dan-panduan { display:flex; align-items:flex-start; gap:40px; padding:48px 6% 72px; }
        .formulir-pengajuan { display:flex; flex:1; flex-direction:column; align-items:stretch; gap:28px; padding:32px; border:1px solid #dee4dc; border-radius:16px; }
        .div-2 { display:flex; align-items:center; justify-content:space-between; gap:16px; width:100%; }
        .judul-formulir { font-size:24px; font-weight:700; }
        .penanda-wajib { color:#5e6e64; font-size:13px; }
        .span { color:#276447; }
        .text-wrapper-2 { color:#5e6e64; }
        .div-3 { height:1px; width:100%; background:#dee4dc; }
        .identitas-dan-kontak { display:flex; flex-direction:column; align-items:stretch; gap:22px; width:100%; }
        .pengantar-bagian { display:flex; align-items:flex-start; gap:14px; }
        .nomor-bagian { display:flex; flex:0 0 36px; width:36px; height:36px; align-items:center; justify-content:center; background:#eaf0e7; border-radius:50%; }
        .nomor { color:#276447; font-size:13px; font-weight:700; }
        .judul-bagian { font-size:23px; font-weight:700; }
        .keterangan-bagian { color:#5e6e64; font-size:14px; line-height:1.5; }
        .isian-identitas { display:flex; align-items:flex-start; gap:20px; width:100%; }
        .isian-formulir { display:flex; flex:1; flex-direction:column; align-items:stretch; gap:8px; min-width:0; }
        .label-isian { color:#233b30; font-size:14px; font-weight:700; }
        .area-isian { display:flex; min-height:48px; align-items:center; padding:0 14px; border:1px solid #dee4dc; border-radius:8px; background:#fff; }
        .petunjuk-isian { color:#8a958d; font-size:15px; }
        .p { font-size:14px; font-weight:700; }
        .text-wrapper-3 { color:#233b30; }
        .div-wrapper { display:flex; flex-direction:column; align-items:stretch; gap:20px; width:100%; }
        .background-border { display:flex; flex-wrap:wrap; align-items:center; gap:28px; width:100%; padding:25px; background:#f6f8f5; border:1px solid #e2e6e1; border-radius:12px; }
        .img-tempat-kode-QRIS { display:flex; flex:0 1 280px; width:280px; max-width:100%; aspect-ratio:1; align-items:center; justify-content:center; padding:12px; border:1px dashed #9fb3a6; border-radius:12px; background:#fff url("{{ asset('img/img-tempat-kode-QRIS.svg') }}") center/cover no-repeat; }
        .text-wrapper-4 { color:#5f6a64; font-size:12px; font-weight:700; text-align:center; }
        .container { display:flex; flex:1; flex-direction:column; gap:14px; min-width:220px; }
        .container-2, .container-3 { display:flex; flex-direction:column; width:100%; }
        .text-wrapper-5 { color:#2a6046; font-size:12px; font-weight:700; letter-spacing:.48px; }
        .text-wrapper-6 { color:#5f6a64; font-size:13px; }
        .text-wrapper-7 { color:#1f3b2e; font-size:18px; font-weight:700; }
        .text-wrapper-8 { color:#1f3b2e; font-size:24px; font-weight:900; letter-spacing:.96px; }
        .isian-formulir-2 { display:flex; flex-direction:column; align-items:stretch; gap:8px; width:100%; }
        .area-unggah { display:flex; min-height:160px; flex-direction:column; align-items:center; justify-content:center; gap:12px; padding:20px; border:1px dashed #276447; border-radius:8px; background:#f7faf8; cursor:pointer; }
        .ikon-unggah { display:flex; width:40px; height:40px; align-items:center; justify-content:center; background:#eaf4ef; border-radius:50%; }
        .vector-wrapper { position:relative; width:20px; height:20px; }
        .vector-2, .vector-3 { width:100%; height:100%; object-fit:contain; }
        .teks-unggah { display:flex; flex-direction:column; align-items:center; gap:4px; text-align:center; }
        .text-wrapper-9 { color:#233b30; font-size:15px; font-weight:700; }
        .text-wrapper-10 { color:#8a958d; font-size:13px; line-height:1.45; }
        .text-wrapper-11 { color:#276447; font-size:14px; font-weight:700; }
        .informasi-dan-tautan { display:flex; flex-direction:column; gap:40px; padding:56px 6% 28px; background:#faf8f2; }
        .tautan-situs { display:flex; align-items:flex-start; gap:60px; width:100%; }
        .identitas-dan-sosial { display:flex; flex:1.5; flex-direction:column; align-items:flex-start; gap:20px; min-width:220px; }
        .tentang-program { color:#728078; font-size:15px; line-height:1.5; }
        .tautan-instagram { display:inline-flex; align-items:center; gap:8px; color:#276447; }
        .tautan-instagram img { width:20px; height:20px; object-fit:contain; }
        .kelompok-tautan { display:flex; flex:1; flex-direction:column; align-items:flex-start; gap:13px; }
        .kategori-tautan { color:#233b30; font-size:16px; font-weight:700; }
        .tautan { color:#728078; font-size:14px; }
        .catatan-situs { display:flex; align-items:flex-start; justify-content:space-between; gap:16px; padding-top:20px; border-top:1px solid #dee4dc; }
        .text-wrapper-12 { color:#728078; font-size:12px; line-height:1.5; }
        @media (max-width: 900px) {
            .navigasi-utama { flex-wrap:wrap; padding:16px 5%; }
            .navbar { order:3; width:100%; justify-content:center; flex-wrap:wrap; gap:16px; }
            .pengantar-pengajuan, .formulir-dan-panduan, .informasi-dan-tautan { padding-left:5%; padding-right:5%; }
            .judul-dan-cakupan { flex-direction:column; align-items:stretch; gap:24px; }
            .cakupan-program { width:100%; }
            .formulir-dan-panduan { flex-direction:column; }
            .tautan-situs { flex-wrap:wrap; gap:32px; }
            .identitas-dan-sosial { flex-basis:100%; }
        }
        @media (max-width: 600px) {
            .navigasi-utama { gap:14px; }
            .navbar { justify-content:flex-start; overflow-x:auto; flex-wrap:nowrap; }
            .akses-akun { margin-left:auto; }
            .isian-identitas { flex-direction:column; }
            .isian-formulir { width:100%; }
            .formulir-pengajuan { padding:22px 18px; }
            .judul-formulir { font-size:21px; }
            .judul-bagian { font-size:19px; }
            .background-border { padding:16px; }
            .img-tempat-kode-QRIS { flex-basis:100%; width:100%; }
            .catatan-situs { flex-direction:column; }
            .kelompok-tautan { min-width:42%; }
        }
    </style>
</head>
<body>
<div class="bantu-donasi-nasi">
    <div class="navigasi-utama">
        <div class="identitas-nasi">
            <div class="lambang-program"><div class="img-wrapper"><img class="lambang" src="{{ asset('img/lambang.svg') }}" alt="Lambang Nasi Darurat"></div></div>
            <div class="nama-program"><div class="nama">SIDAPUR</div><div class="semboyan">KEBAIKAN DALAM SEPORSI NASI</div></div>
        </div>
        <div class="navbar">
            <a class="tautan-navigasi" href="#">Beranda</a>
            <a class="tautan-navigasi" href="#">Tentang kami</a>
            <a class="tautan-navigasi" href="#">Transparansi</a>
            <a class="tautan-navigasi" href="#">Hubungi kami</a>
        </div>
        <div class="akses-akun"><a class="text-wrapper" href="#">Masuk</a><a class="tombol-tindakan" href="#"><span class="label-tindakan">Daftar</span></a></div>
    </div>

    <div class="pengantar-pengajuan">
        <div class="jejak-halaman"><a class="tautan-beranda" href="#">Beranda</a><div class="chevron-right"><img class="vector" src="{{ asset('img/vector-2.svg') }}" alt=""></div><div class="halaman-aktif">Bantu Donasi</div></div>
        <div class="judul-dan-cakupan">
            <div class="pesan-pengajuan">
                <p class="kategori">NASI DARURAT • BANTU DONASI</p>
                <div class="judul">Titip kebaikan, kenyangkan harapan.</div>
                <p class="pengantar">Bantu mahasiswa &amp; anak kos melewati hari tanpa kelaparan. Donasimu akan disalurkan menjadi seporsi nasi untuk mereka yang membutuhkan.</p>
            </div>
            <div class="cakupan-program">
                <div class="img-wrapper"><img class="img" src="{{ asset('img/vector.svg') }}" alt=""></div>
                <div class="div"><div class="penerima-program">Untuk mahasiswa</div><div class="wilayah-program">Area Purbalingga &amp; Purwokerto</div></div>
            </div>
        </div>
    </div>

    <div class="formulir-dan-panduan">
        <form class="formulir-pengajuan" action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="div-2"><div class="judul-formulir">Formulir Bantu Donasi</div><p class="penanda-wajib"><span class="span">*</span><span class="text-wrapper-2"> Wajib diisi</span></p></div>
            <div class="div-3"></div>
            <div class="identitas-dan-kontak">
                <div class="pengantar-bagian">
                    <div class="nomor-bagian"><div class="nomor">01</div></div>
                    <div class="div"><div class="judul-bagian">Pilihan donasi</div><p class="keterangan-bagian">Masukkan nominal donasi dan data kontak aktif yang dapat dihubungi untuk konfirmasi.</p></div>
                </div>
                <div class="isian-identitas">
                    <div class="isian-formulir">
                        <label class="label-isian" for="nominal">Masukkan Nominal Donasi <span class="span">*</span></label>
                        <div class="area-isian"><input id="nominal" name="nominal" type="number" min="1000" placeholder="Contoh: 50000" required style="width:100%;border:0;outline:0;font:inherit;background:transparent;"></div>
                    </div>
                </div>
                <div class="isian-identitas">
                    <div class="isian-formulir"><label class="label-isian" for="nama">Nama Lengkap <span class="span">*</span></label><div class="area-isian"><input id="nama" name="nama" type="text" placeholder="Nama sesuai identitas" required style="width:100%;border:0;outline:0;font:inherit;background:transparent;"></div></div>
                    <div class="isian-formulir"><label class="label-isian" for="whatsapp">Nomor WhatsApp <span class="span">*</span></label><div class="area-isian"><input id="whatsapp" name="whatsapp" type="tel" placeholder="Contoh: 0812 3456 7890" required style="width:100%;border:0;outline:0;font:inherit;background:transparent;"></div></div>
                </div>
                <div class="div-wrapper">
                    <div class="background-border">
                        <div class="img-tempat-kode-QRIS"><div class="text-wrapper-4">QRIS CODE IMAGE</div></div>
                        <div class="container">
                            <div class="container-2"><div class="text-wrapper-5">INFO REKENING / QRIS TUJUAN</div></div>
                            <div class="container-3"><div class="container-2"><div class="text-wrapper-6">Atas nama</div></div><div class="container-2"><div class="text-wrapper-7">Nasi Darurat Purbalingga</div></div></div>
                            <div class="container-3"><div class="container-2"><div class="text-wrapper-6">No. rekening (BNI)</div></div><div class="container-2"><div class="text-wrapper-8">1234-5678-90</div></div></div>
                        </div>
                    </div>
                </div>
                <div class="div-wrapper">
                    <div class="isian-formulir-2">
                        <label class="label-isian" for="bukti">Upload Bukti Transfer <span class="span">*</span></label>
                        <label class="area-unggah" for="bukti">
                            <div class="ikon-unggah"><div class="vector-wrapper"><img class="vector-2" src="{{ asset('img/vector-3.svg') }}" alt=""></div></div>
                            <div class="teks-unggah"><div class="text-wrapper-9">Unggah bukti transfer</div><p class="text-wrapper-10">Format: JPG, PNG, atau PDF. Maksimal 10 MB.</p></div>
                            <input id="bukti" name="bukti_transfer" type="file" accept=".jpg,.jpeg,.png,.pdf" required style="max-width:100%;font-size:13px;">
                        </label>
                    </div>
                </div>
            </div>
            <div class="div-wrapper">
                <div class="div-2"><a class="text-wrapper-11" href="#">Kembali ke beranda</a><button class="tombol-tindakan" type="submit" style="border:0;cursor:pointer;"><span class="label-tindakan">Bantu Donasi</span><span class="vector-wrapper"><img class="vector-3" src="{{ asset('img/image.svg') }}" alt=""></span></button></div>
            </div>
        </form>
    </div>

    <div class="informasi-dan-tautan">
        <div class="tautan-situs">
            <div class="identitas-dan-sosial">
                <div class="identitas-nasi">
                    <div class="lambang-program"><div class="img-wrapper"><img class="lambang" src="{{ asset('img/lambang-2.svg') }}" alt="Lambang Nasi Darurat"></div></div>
                    <div class="nama-program"><div class="nama">nasi darurat</div><div class="semboyan">KEBAIKAN DALAM SEPORSI NASI</div></div>
                </div>
                <p class="tentang-program">Seporsi makanan, sebuah kepedulian. Ruang bersama untuk menghadirkan harapan melalui makanan layak.</p>
                <a class="tautan-instagram" href="#"><img src="{{ asset('img/instagram.svg') }}" alt=""><span class="text-wrapper">Instagram Nasi Darurat ↗</span></a>
            </div>
            <div class="kelompok-tautan"><div class="kategori-tautan">Jelajahi</div><a class="tautan" href="#">Program &amp; penerima</a><a class="tautan" href="#">Tentang Nasi Darurat</a><a class="tautan" href="#">Transparansi anggaran</a><a class="tautan" href="#">Artikel &amp; dokumentasi</a></div>
            <div class="kelompok-tautan"><div class="kategori-tautan">Terlibat</div><a class="tautan" href="#">Jadi donatur</a><a class="tautan" href="#">Kolaborasi</a><a class="tautan" href="#">Ulasan komunitas</a><a class="tautan" href="#">Hubungi kami</a></div>
            <div class="kelompok-tautan"><div class="kategori-tautan">Informasi</div><a class="tautan" href="#">Syarat dan ketentuan</a><a class="tautan" href="#">Kebijakan privasi</a><a class="tautan" href="#">Pusat bantuan</a><a class="tautan" href="#">Bahasa Indonesia ⌄</a></div>
        </div>
        <div class="div-3"></div>
        <div class="catatan-situs"><p class="text-wrapper-12">© 2026 Nasi Darurat. Kebaikan dalam seporsi nasi.</p><p class="text-wrapper-12">Mockup visual • angka, penerima, dan konten merupakan ilustrasi.</p></div>
    </div>
</div>
</body>
</html>
