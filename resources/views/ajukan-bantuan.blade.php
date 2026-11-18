@extends('layouts.public')

@section('title', 'Ajukan Bantuan - SIDAPUR')

@section('styles')
<style>
    /* Hero */
    .hero-section{background:#eaf0e7;}
    .hero-inner{max-width:1280px;margin:0 auto;padding:32px 48px 48px;}
    .breadcrumb{display:flex;align-items:center;gap:8px;font-size:14px;color:#5f6a64;margin-bottom:24px;}
    .breadcrumb a{color:#5f6a64;}.breadcrumb a:hover{color:#2a6046;}
    .breadcrumb .sep{color:#9aa39d;}.breadcrumb .cur{color:#2a6046;font-weight:700;}
    .hero-content{display:flex;align-items:flex-start;gap:48px;flex-wrap:wrap;}
    .eyebrow{font-size:12px;font-weight:700;color:#276447;letter-spacing:.18px;margin-bottom:12px;}
    .page-h1{font-size:48px;font-weight:700;color:#233b30;line-height:1.15;letter-spacing:-.34px;margin-bottom:12px;}
    .page-sub{font-size:17px;color:#5e6e64;line-height:1.5;}
    .info-box{display:flex;align-items:flex-start;gap:14px;padding:20px;background:#fff;border-radius:16px;min-width:280px;}
    .info-box .ikon{font-size:24px;flex-shrink:0;}
    .info-box .info-title{font-size:16px;font-weight:700;color:#233b30;}
    .info-box .info-sub{font-size:14px;color:#5e6e64;margin-top:4px;line-height:1.5;}

    /* Formulir wrap */
    .ajukan-wrap{max-width:1280px;margin:0 auto;padding:48px 48px 72px;display:flex;gap:40px;align-items:flex-start;flex-wrap:wrap;}
    .formulir-box{flex:1;min-width:320px;padding:32px;border:1px solid #dee4dc;border-radius:16px;background:#fff;}
    .panduan-box{width:280px;flex-shrink:0;display:flex;flex-direction:column;gap:16px;}

    /* Form */
    .form-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;}
    .form-title{font-size:24px;font-weight:700;color:#233b30;}
    .form-required{font-size:13px;color:#5e6e64;}.form-required .req{color:#276447;}
    .form-divider{height:1px;background:#dee4dc;margin-bottom:28px;}

    .form-section-head{display:flex;align-items:flex-start;gap:14px;margin-bottom:16px;}
    .nomor-bulat{width:36px;height:36px;background:#eaf0e7;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#276447;flex-shrink:0;}
    .section-title{font-size:20px;font-weight:700;color:#233b30;}
    .section-desc{font-size:14px;color:#5e6e64;line-height:1.5;margin-top:4px;}

    .form-block{margin-bottom:24px;}
    .form-row{display:flex;gap:16px;flex-wrap:wrap;}
    .form-group{display:flex;flex:1;flex-direction:column;gap:6px;min-width:200px;margin-bottom:16px;}
    .form-group label{font-size:14px;font-weight:700;color:#233b30;}
    .form-group label .req{color:#276447;}
    .form-group input,.form-group select,.form-group textarea{
        font-family:'Lato',sans-serif;font-size:15px;color:#233b30;
        padding:12px 14px;border:1px solid #dee4dc;border-radius:8px;
        outline:none;width:100%;transition:border-color .15s;
    }
    .form-group input:focus,.form-group select:focus,.form-group textarea:focus{border-color:#276447;}
    .form-group textarea{resize:vertical;min-height:100px;}
    .form-hint{font-size:12px;color:#8a958d;margin-top:4px;}

    /* Upload area */
    .upload-label{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:10px;padding:24px 20px;border:1.5px dashed #276447;border-radius:8px;background:#f7faf8;cursor:pointer;text-align:center;transition:background .15s;}
    .upload-label:hover{background:#edf5f0;}
    .upload-ikon{font-size:28px;}
    .upload-title{font-size:15px;font-weight:700;color:#233b30;}
    .upload-hint{font-size:13px;color:#8a958d;line-height:1.45;}

    /* Section separator */
    .section-sep{height:1px;background:#dee4dc;margin:24px 0;}

    /* Actions */
    .form-actions{display:flex;align-items:center;justify-content:space-between;margin-top:8px;}
    .btn-back{font-size:14px;font-weight:700;color:#276447;}.btn-back:hover{text-decoration:underline;}
    .btn-submit{padding:14px 32px;background:#276447;color:#fff;border:0;border-radius:8px;font-size:15px;font-weight:700;cursor:pointer;transition:background .15s;}
    .btn-submit:hover{background:#1e4f35;}

    /* Alert */
    .alert{padding:14px 20px;border-radius:10px;margin-bottom:16px;font-size:15px;}
    .alert-success{background:#e8f5ec;border:1px solid #bfd2c5;color:#1f3b2e;}
    .alert-error{background:#fdf0ee;border:1px solid #f5c6be;color:#7c2d1b;}

    /* Panduan */
    .panduan-card{padding:20px;background:#f6f8f5;border:1px solid #e2e6e1;border-radius:16px;}
    .panduan-card h3{font-size:16px;font-weight:700;color:#1f3b2e;margin-bottom:14px;}
    .panduan-item{display:flex;gap:10px;margin-bottom:12px;font-size:14px;color:#3f4a44;line-height:1.5;}
    .panduan-ikon{font-size:16px;flex-shrink:0;}
    .syarat-card{padding:20px;background:#fff3e0;border:1px solid #fcd399;border-radius:16px;}
    .syarat-card h3{font-size:14px;font-weight:700;color:#8a3a05;margin-bottom:10px;}
    .syarat-card ul{padding-left:16px;font-size:14px;color:#5e3a00;line-height:1.6;}

    @media(max-width:1024px){.hero-inner,.ajukan-wrap{padding-left:24px;padding-right:24px;}}
    @media(max-width:900px){.ajukan-wrap{flex-direction:column;}.panduan-box{width:100%;}}
    @media(max-width:600px){.page-h1{font-size:32px;}.formulir-box{padding:20px;}.form-row{flex-direction:column;}}
</style>
@endsection

@section('content')

{{-- Hero --}}
<section class="hero-section">
    <div class="hero-inner">
        <div class="breadcrumb">
            <a href="{{ route('beranda-sidapur') }}">Beranda</a>
            <span class="sep">›</span>
            <span class="cur">Ajukan Bantuan</span>
        </div>
        <div class="hero-content">
            <div>
                <p class="eyebrow">NASI DARURAT • PENGAJUAN BANTUAN</p>
                <h1 class="page-h1">Butuh makan?<br>Mari ceritakan.</h1>
                <p class="page-sub">Isi formulir berikut agar kami dapat memahami kebutuhanmu<br>dan meninjau kemungkinan bantuan makanan dari Nasi Darurat.</p>
            </div>
            <div class="info-box">
                <div class="ikon">🍱</div>
                <div>
                    <div class="info-title">Bantuan makanan gratis</div>
                    <div class="info-sub">Maks. Rp25.000 per pengajuan<br>Area Purbalingga &amp; Purwokerto<br>Khusus mahasiswa aktif</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Formulir + Panduan --}}
<div class="ajukan-wrap">

    {{-- Formulir --}}
    <div class="formulir-box">
        <div class="form-header">
            <div class="form-title">Formulir pengajuan</div>
            <div class="form-required"><span class="req">*</span> Wajib diisi</div>
        </div>
        <div class="form-divider"></div>

        @if(session('success'))
            <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-error">⚠️ Periksa kembali isian formulir. Pastikan semua field wajib terisi.</div>
        @endif

        <form action="{{ route('penerima.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Section 01: Identitas --}}
            <div class="form-section-head">
                <div class="nomor-bulat">01</div>
                <div>
                    <div class="section-title">Identitas &amp; kontak</div>
                    <div class="section-desc">Data diri yang akan digunakan untuk verifikasi dan menghubungimu.</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="student_name">Nama lengkap <span class="req">*</span></label>
                    <input type="text" id="student_name" name="student_name" placeholder="Nama sesuai KTM"
                           value="{{ old('student_name', auth()->user()->name ?? '') }}" required>
                    @error('student_name') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Nomor WhatsApp <span class="req">*</span></label>
                    <input type="tel" id="phone" name="phone" placeholder="Contoh: 0812 3456 7890"
                           value="{{ old('phone', auth()->user()->phone ?? '') }}" required>
                    @error('phone') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="student_id">NIM (Nomor Induk Mahasiswa) <span class="req">*</span></label>
                    <input type="text" id="student_id" name="student_id" placeholder="Contoh: H1A021001"
                           value="{{ old('student_id') }}" required>
                    @error('student_id') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="university">Perguruan Tinggi <span class="req">*</span></label>
                    <select id="university" name="university" required>
                        <option value="">-- Pilih kampus --</option>
                        @php
                        $kampus = [
                            'Universitas Jenderal Soedirman (Unsoed)',
                            'Universitas Islam Negeri Prof. K.H. Saifuddin Zuhri (UIN Saizu)',
                            'Universitas Muhammadiyah Purwokerto (UMP)',
                            'Telkom University Purwokerto',
                            'Universitas Amikom Purwokerto',
                            'Universitas Wijayakusuma (Unwiku)',
                            'Universitas Harapan Bangsa (UHB)',
                            'Universitas Bina Sarana Informatika (UBSI) Purwokerto',
                            'Universitas Nahdlatul Ulama (UNU) Purwokerto',
                            'Poltekkes Kemenkes Semarang Kampus Purwokerto',
                            'Universitas Terbuka (UT) Purwokerto',
                            'Fakultas Teknik Unsoed (Kampus Blater) - Purbalingga',
                            'UIN Saizu Kampus 2 Purbalingga',
                            'Universitas Perwira Purbalingga (UNPERBA)',
                            'STIE YPPI Purbalingga',
                            'STKIP Purbalingga',
                            'Politeknik Purbalingga',
                        ];
                        @endphp
                        @foreach($kampus as $k)
                            <option value="{{ $k }}" {{ old('university') == $k ? 'selected' : '' }}>{{ $k }}</option>
                        @endforeach
                    </select>
                    @error('university') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="address">Alamat kos / domisili <span class="req">*</span></label>
                <input type="text" id="address" name="address" placeholder="Jl. Contoh No. 1, Purwokerto"
                       value="{{ old('address') }}" required>
                @error('address') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
            </div>

            <div class="section-sep"></div>

            {{-- Section 02: Jenis & Alasan --}}
            <div class="form-section-head">
                <div class="nomor-bulat">02</div>
                <div>
                    <div class="section-title">Jenis bantuan &amp; alasan</div>
                    <div class="section-desc">Ceritakan kebutuhanmu agar kami bisa memproses dengan tepat.</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="assistance_type">Jenis bantuan <span class="req">*</span></label>
                    <select id="assistance_type" name="assistance_type" required>
                        <option value="">-- Pilih jenis --</option>
                        <option value="Makanan" {{ old('assistance_type')=='Makanan' ? 'selected':'' }}>Makanan (nasi darurat)</option>
                        <option value="Paket Makanan" {{ old('assistance_type')=='Paket Makanan' ? 'selected':'' }}>Paket makanan</option>
                        <option value="Darurat Lainnya" {{ old('assistance_type')=='Darurat Lainnya' ? 'selected':'' }}>Darurat lainnya (token listrik, obat, dsb.)</option>
                    </select>
                    @error('assistance_type') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="nominal">Nominal yang dibutuhkan (Rp) <span class="req">*</span></label>
                    <input type="number" id="nominal" name="nominal" min="1000" max="25000"
                           placeholder="Maks. Rp25.000" value="{{ old('nominal', 25000) }}" required>
                    <span class="form-hint">Maksimal Rp25.000 per pengajuan</span>
                    @error('nominal') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="reason">Alasan pengajuan <span class="req">*</span></label>
                <textarea id="reason" name="reason" placeholder="Ceritakan kondisi keuanganmu saat ini dan mengapa kamu membutuhkan bantuan..." required>{{ old('reason') }}</textarea>
                @error('reason') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
            </div>

            <div class="section-sep"></div>

            {{-- Section 03: Warung & Upload --}}
            <div class="form-section-head">
                <div class="nomor-bulat">03</div>
                <div>
                    <div class="section-title">Warung &amp; dokumen</div>
                    <div class="section-desc">Pilih warung rekanan terdekat dan unggah KTM sebagai verifikasi.</div>
                </div>
            </div>

            <div class="form-group">
                <label for="stall_name">Nama warung rekanan <span class="req">*</span></label>
                <input type="text" id="stall_name" name="stall_name"
                       placeholder="Contoh: Warung Bu Siti, Jl. Kampus No. 5"
                       value="{{ old('stall_name') }}" required>
                @error('stall_name') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Upload KTM (Kartu Tanda Mahasiswa) <span class="req">*</span></label>
                    <label class="upload-label" for="ktm_photo">
                        <div class="upload-ikon">🪪</div>
                        <div class="upload-title">Unggah KTM</div>
                        <div class="upload-hint">Format: JPG, PNG, atau PDF. Maks. 10 MB.</div>
                        <input id="ktm_photo" name="ktm_photo" type="file" accept=".jpg,.jpeg,.png,.pdf" required style="font-size:13px;max-width:100%;">
                    </label>
                    @error('ktm_photo') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Upload QRIS Warung (bukti warung rekanan)</label>
                    <label class="upload-label" for="qris_proof">
                        <div class="upload-ikon">📱</div>
                        <div class="upload-title">Unggah QRIS Warung</div>
                        <div class="upload-hint">Format: JPG, PNG. Maks. 10 MB. (Opsional)</div>
                        <input id="qris_proof" name="qris_proof" type="file" accept=".jpg,.jpeg,.png" style="font-size:13px;max-width:100%;">
                    </label>
                    @error('qris_proof') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Actions --}}
            <div class="section-sep"></div>
            <div class="form-actions">
                <a href="{{ route('beranda-sidapur') }}" class="btn-back">← Kembali ke Beranda</a>
                <button type="submit" class="btn-submit">Ajukan Bantuan →</button>
            </div>

        </form>
    </div>

    {{-- Panduan --}}
    <div class="panduan-box">
        <div class="panduan-card">
            <h3>📋 Panduan Pengajuan</h3>
            <div class="panduan-item"><span class="panduan-ikon">1️⃣</span>Isi formulir dengan data yang benar dan lengkap.</div>
            <div class="panduan-item"><span class="panduan-ikon">2️⃣</span>Upload KTM (foto jelas, tidak buram).</div>
            <div class="panduan-item"><span class="panduan-ikon">3️⃣</span>Sebutkan nama warung rekanan terdekat.</div>
            <div class="panduan-item"><span class="panduan-ikon">4️⃣</span>Tunggu verifikasi admin (1–2 hari kerja).</div>
            <div class="panduan-item"><span class="panduan-ikon">5️⃣</span>Jika disetujui, dana dikirimkan ke warung.</div>
        </div>

        <div class="syarat-card">
            <h3>⚠️ Syarat penerima</h3>
            <ul>
                <li>Mahasiswa aktif di area Purbalingga / Purwokerto</li>
                <li>Mengalami kesulitan finansial sementara</li>
                <li>Belum pernah mendapat bantuan di bulan yang sama</li>
                <li>Menyertakan KTM yang masih berlaku</li>
            </ul>
        </div>

        <div style="padding:16px;background:#e8f5ec;border:1px solid #bfd2c5;border-radius:12px;font-size:14px;color:#1f3b2e;line-height:1.5;">
            💬 Ada pertanyaan? <a href="{{ route('hubungi') }}" style="color:#2a6046;font-weight:700;">Hubungi kami</a>
        </div>
    </div>

</div>

@endsection
