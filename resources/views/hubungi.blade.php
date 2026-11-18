@extends('layouts.public')

@section('title', 'Hubungi Kami - SIDAPUR')

@section('styles')
<style>
    /* Hero */
    .hero-section { background: #eaefe8; }
    .hero-inner { max-width: 1280px; margin: 0 auto; padding: 32px 48px 48px; }
    .breadcrumb { display:flex; align-items:center; gap:8px; font-size:14px; color:#5f6a64; margin-bottom:24px; }
    .breadcrumb a { color:#5f6a64; }
    .breadcrumb a:hover { color:#2a6046; }
    .breadcrumb .sep { color:#9aa39d; }
    .breadcrumb .cur { color:#2a6046; font-weight:700; }
    .eyebrow { font-size:12px; font-weight:700; color:#2a6046; letter-spacing:.48px; margin-bottom:10px; }
    .page-h1 { font-size:48px; font-weight:900; color:#1f3b2e; line-height:1.1; margin-bottom:12px; }
    .page-sub { font-size:17px; color:#5f6a64; line-height:1.6; }

    /* Konten */
    .kontak-wrap { max-width:1280px; margin:0 auto; padding:48px 48px 72px; display:flex; gap:48px; flex-wrap:wrap; }

    /* Kanal */
    .kanal-box { flex:1; min-width:280px; }
    .kanal-box h2 { font-size:22px; font-weight:700; color:#1f3b2e; margin-bottom:20px; }
    .kanal-item {
        display:flex; align-items:center; gap:16px;
        padding:20px 24px; background:#fff;
        border:1px solid #e2e6e1; border-radius:16px;
        margin-bottom:14px;
        transition: box-shadow 0.15s;
    }
    .kanal-item:hover { box-shadow:0 4px 16px rgba(42,96,70,.1); }
    .kanal-ikon {
        width:44px; height:44px; background:#e3ebe4; border-radius:12px;
        display:flex; align-items:center; justify-content:center; flex-shrink:0;
        font-size:20px;
    }
    .kanal-label { font-size:13px; color:#5f6a64; margin-bottom:2px; }
    .kanal-nilai { font-size:16px; font-weight:700; color:#1f3b2e; }

    /* Form */
    .form-box {
        flex:1.2; min-width:320px;
        padding:32px; border:1px solid #e2e6e1; border-radius:16px; background:#fff;
        display:flex; flex-direction:column; gap:20px;
    }
    .form-box h2 { font-size:22px; font-weight:700; color:#1f3b2e; }
    .form-divider { height:1px; background:#e2e6e1; }
    .form-group { display:flex; flex-direction:column; gap:6px; }
    .form-group label { font-size:14px; font-weight:700; color:#1f3b2e; }
    .form-group label .req { color:#2a6046; }
    .form-group input,
    .form-group select,
    .form-group textarea {
        font-family:'Lato',sans-serif;
        font-size:15px; color:#1f3b2e;
        padding:12px 14px; border:1px solid #dee4dc;
        border-radius:8px; outline:none;
        transition:border-color .15s;
    }
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus { border-color:#2a6046; }
    .form-group textarea { resize:vertical; min-height:120px; }
    .form-row { display:flex; gap:16px; }
    .form-row .form-group { flex:1; }
    .form-actions { display:flex; justify-content:flex-end; gap:16px; align-items:center; }
    .btn-kembali { font-size:14px; font-weight:700; color:#2a6046; }
    .btn-kembali:hover { text-decoration:underline; }
    .btn-kirim {
        font-size:15px; font-weight:700; color:#fff;
        background:#2a6046; border:0; border-radius:8px;
        padding:14px 32px; cursor:pointer; transition:background .15s;
    }
    .btn-kirim:hover { background:#1f4f36; }

    /* Alert */
    .alert-sukses {
        padding:14px 20px; border-radius:10px;
        background:#e8f5ec; border:1px solid #bfd2c5;
        color:#1f3b2e; font-size:15px;
    }

    @media(max-width:900px){
        .hero-inner,.kontak-wrap{padding-left:24px;padding-right:24px;}
        .kontak-wrap{flex-direction:column;}
    }
    @media(max-width:600px){
        .page-h1{font-size:32px;}
        .form-row{flex-direction:column;}
        .form-box{padding:20px;}
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
            <span class="cur">Hubungi kami</span>
        </div>
        <p class="eyebrow">NASI DARURAT • HUBUNGI KAMI</p>
        <h1 class="page-h1">Ada yang ingin ditanyakan?<br>Mari berbincang.</h1>
        <p class="page-sub">Pertanyaan soal bantuan, donasi, atau kolaborasi?<br>Kirim pesan atau hubungi kami lewat kanal di bawah ini.</p>
    </div>
</section>

{{-- Konten --}}
<div class="kontak-wrap">

    {{-- Kanal Kontak --}}
    <div class="kanal-box">
        <h2>Kanal kontak</h2>

        <a href="https://wa.me/6281234567890" target="_blank" class="kanal-item">
            <div class="kanal-ikon">💬</div>
            <div>
                <div class="kanal-label">WhatsApp</div>
                <div class="kanal-nilai">0812 3456 7890</div>
            </div>
        </a>

        <a href="https://instagram.com/nasidarurat" target="_blank" class="kanal-item">
            <div class="kanal-ikon">📸</div>
            <div>
                <div class="kanal-label">Instagram</div>
                <div class="kanal-nilai">@nasidarurat</div>
            </div>
        </a>

        <a href="mailto:nasidarurat@email.com" class="kanal-item">
            <div class="kanal-ikon">✉️</div>
            <div>
                <div class="kanal-label">Email</div>
                <div class="kanal-nilai">nasidarurat@email.com</div>
            </div>
        </a>

        <div class="kanal-item">
            <div class="kanal-ikon">📍</div>
            <div>
                <div class="kanal-label">Wilayah layanan</div>
                <div class="kanal-nilai">Purbalingga &amp; Purwokerto</div>
            </div>
        </div>
    </div>

    {{-- Form Kolaborasi / Pesan --}}
    <div class="form-box">
        <h2>Kirim pesan atau ajukan kolaborasi</h2>
        <div class="form-divider"></div>

        @if(session('success'))
            <div class="alert-sukses">✅ {{ session('success') }}</div>
        @endif

        <form action="{{ route('collaboration.submit') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label for="org_name">Nama / Organisasi <span class="req">*</span></label>
                    <input type="text" id="org_name" name="org_name" value="{{ old('org_name') }}"
                           placeholder="Nama atau nama lembaga" required>
                    @error('org_name') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="contact">Kontak (WA/Email) <span class="req">*</span></label>
                    <input type="text" id="contact" name="contact" value="{{ old('contact') }}"
                           placeholder="0812... atau email@..." required>
                    @error('contact') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="collaboration_type">Tipe pesan <span class="req">*</span></label>
                <select id="collaboration_type" name="collaboration_type" required>
                    <option value="">-- Pilih tipe --</option>
                    <option value="Kolaborasi" {{ old('collaboration_type')=='Kolaborasi' ? 'selected':'' }}>Kolaborasi / Mitra</option>
                    <option value="Pertanyaan Donasi" {{ old('collaboration_type')=='Pertanyaan Donasi' ? 'selected':'' }}>Pertanyaan Donasi</option>
                    <option value="Pertanyaan Bantuan" {{ old('collaboration_type')=='Pertanyaan Bantuan' ? 'selected':'' }}>Pertanyaan Bantuan</option>
                    <option value="Lainnya" {{ old('collaboration_type')=='Lainnya' ? 'selected':'' }}>Lainnya</option>
                </select>
            </div>

            <div class="form-group">
                <label for="message">Pesan <span class="req">*</span></label>
                <textarea id="message" name="message" placeholder="Tulis pesan, pertanyaan, atau proposal kolaborasimu di sini..." required>{{ old('message') }}</textarea>
                @error('message') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('beranda-sidapur') }}" class="btn-kembali">Kembali ke Beranda</a>
                <button type="submit" class="btn-kirim">Kirim Pesan →</button>
            </div>
        </form>
    </div>

</div>

@endsection
