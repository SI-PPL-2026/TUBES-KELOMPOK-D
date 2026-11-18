@extends('layouts.public')

@section('title', 'Bantu Donasi - SIDAPUR')

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
    .cakupan-box{display:flex;align-items:flex-start;gap:14px;padding:20px;background:#fff;border-radius:16px;min-width:280px;white-space:nowrap;}
    .cakupan-ikon{font-size:24px;}
    .cakupan-title{font-size:16px;font-weight:700;color:#233b30;}
    .cakupan-sub{font-size:15px;color:#5e6e64;margin-top:4px;}

    /* Formulir */
    .donasi-wrap{max-width:1280px;margin:0 auto;padding:48px 48px 72px;}
    .formulir-box{padding:32px;border:1px solid #dee4dc;border-radius:16px;background:#fff;max-width:800px;}
    .form-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;}
    .form-title{font-size:24px;font-weight:700;color:#233b30;}
    .form-required{font-size:13px;color:#5e6e64;}
    .form-required .req{color:#276447;}
    .form-divider{height:1px;background:#dee4dc;margin-bottom:24px;}
    .form-section{display:flex;flex-direction:column;gap:22px;}
    .section-head{display:flex;align-items:flex-start;gap:14px;margin-bottom:4px;}
    .nomor-bulat{width:36px;height:36px;background:#eaf0e7;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#276447;flex-shrink:0;}
    .section-title{font-size:23px;font-weight:700;color:#233b30;}
    .section-desc{font-size:14px;color:#5e6e64;line-height:1.5;margin-top:4px;}
    .form-row{display:flex;gap:20px;flex-wrap:wrap;}
    .form-group{display:flex;flex:1;flex-direction:column;gap:6px;min-width:200px;}
    .form-group label{font-size:14px;font-weight:700;color:#233b30;}
    .form-group label .req{color:#276447;}
    .form-group input,.form-group select,.form-group textarea{
        font-family:'Lato',sans-serif;font-size:15px;color:#233b30;
        padding:12px 14px;border:1px solid #dee4dc;border-radius:8px;outline:none;
        width:100%;transition:border-color .15s;
    }
    .form-group input:focus,.form-group select:focus,.form-group textarea:focus{border-color:#276447;}

    /* Nominal cepat */
    .nominal-cepat{display:flex;gap:10px;flex-wrap:wrap;margin-top:6px;}
    .nominal-btn{padding:8px 18px;border:1px solid #dee4dc;border-radius:8px;background:#fff;font-size:14px;font-weight:700;color:#233b30;cursor:pointer;transition:all .15s;}
    .nominal-btn:hover,.nominal-btn.active{background:#276447;color:#fff;border-color:#276447;}

    /* QRIS info box */
    .qris-box{display:flex;flex-wrap:wrap;align-items:center;gap:24px;padding:24px;background:#f6f8f5;border:1px solid #e2e6e1;border-radius:12px;}
    .qris-placeholder{width:160px;height:160px;border:1px dashed #9fb3a6;border-radius:12px;background:#fff;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:#5f6a64;text-align:center;flex-shrink:0;}
    .qris-info{display:flex;flex-direction:column;gap:12px;flex:1;min-width:200px;}
    .qris-label{font-size:12px;font-weight:700;color:#2a6046;letter-spacing:.48px;}
    .qris-nama-label{font-size:13px;color:#5f6a64;}
    .qris-nama{font-size:18px;font-weight:700;color:#1f3b2e;}
    .qris-rek{font-size:24px;font-weight:900;color:#1f3b2e;letter-spacing:.96px;}

    /* Upload */
    .upload-label{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;padding:28px 20px;border:1.5px dashed #276447;border-radius:8px;background:#f7faf8;cursor:pointer;text-align:center;transition:background .15s;}
    .upload-label:hover{background:#edf5f0;}
    .upload-ikon{width:40px;height:40px;background:#eaf4ef;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:20px;}
    .upload-title{font-size:15px;font-weight:700;color:#233b30;}
    .upload-hint{font-size:13px;color:#8a958d;line-height:1.45;}

    /* Actions */
    .form-actions{display:flex;align-items:center;justify-content:space-between;margin-top:8px;}
    .btn-back{font-size:14px;font-weight:700;color:#276447;}
    .btn-back:hover{text-decoration:underline;}
    .btn-submit{padding:14px 32px;background:#276447;color:#fff;border:0;border-radius:8px;font-size:15px;font-weight:700;cursor:pointer;transition:background .15s;}
    .btn-submit:hover{background:#1e4f35;}

    /* Alert */
    .alert{padding:14px 20px;border-radius:10px;margin-bottom:16px;font-size:15px;}
    .alert-success{background:#e8f5ec;border:1px solid #bfd2c5;color:#1f3b2e;}
    .alert-error{background:#fdf0ee;border:1px solid #f5c6be;color:#7c2d1b;}

    @media(max-width:900px){
        .hero-inner,.donasi-wrap{padding-left:24px;padding-right:24px;}
        .hero-content{flex-direction:column;}
    }
    @media(max-width:600px){
        .page-h1{font-size:32px;}
        .formulir-box{padding:20px;}
        .form-row{flex-direction:column;}
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
            <span class="cur">Bantu Donasi</span>
        </div>
        <div class="hero-content">
            <div>
                <p class="eyebrow">NASI DARURAT • BANTU DONASI</p>
                <h1 class="page-h1">Titip kebaikan,<br>kenyangkan harapan.</h1>
                <p class="page-sub">Bantu mahasiswa &amp; anak kos melewati hari tanpa kelaparan.<br>Donasimu akan disalurkan menjadi seporsi nasi untuk mereka yang membutuhkan.</p>
            </div>
            <div class="cakupan-box">
                <div class="cakupan-ikon">🎓</div>
                <div>
                    <div class="cakupan-title">Untuk mahasiswa</div>
                    <div class="cakupan-sub">Area Purbalingga &amp; Purwokerto</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Formulir --}}
<div class="donasi-wrap">

    @if(session('success'))
        <div class="alert alert-success">✅ {{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-error">⚠️ Periksa kembali isian formulir.</div>
    @endif

    <div class="formulir-box">
        <div class="form-header">
            <div class="form-title">Formulir Bantu Donasi</div>
            <div class="form-required"><span class="req">*</span> Wajib diisi</div>
        </div>
        <div class="form-divider"></div>

        <form action="{{ route('donatur.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-section">

                {{-- Section 01: Pilihan Donasi --}}
                <div>
                    <div class="section-head">
                        <div class="nomor-bulat">01</div>
                        <div>
                            <div class="section-title">Pilihan donasi</div>
                            <div class="section-desc">Masukkan nominal donasi dan data kontak aktif yang dapat dihubungi untuk konfirmasi.</div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top:16px;">
                        <label for="nominal">Nominal Donasi <span class="req">*</span></label>
                        <div class="nominal-cepat">
                            <button type="button" class="nominal-btn" onclick="setNominal(25000)">Rp 25.000</button>
                            <button type="button" class="nominal-btn" onclick="setNominal(50000)">Rp 50.000</button>
                            <button type="button" class="nominal-btn" onclick="setNominal(100000)">Rp 100.000</button>
                            <button type="button" class="nominal-btn" onclick="setNominal(250000)">Rp 250.000</button>
                            <button type="button" class="nominal-btn" onclick="setNominal(500000)">Rp 500.000</button>
                        </div>
                        <input type="number" id="nominal" name="nominal" min="1000" placeholder="Atau ketik nominal lain..." value="{{ old('nominal') }}" required>
                        @error('nominal') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-row" style="margin-top:16px;">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap <span class="req">*</span></label>
                            <input type="text" id="nama" name="nama" placeholder="Nama sesuai identitas" value="{{ old('nama', auth()->user()->name ?? '') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Nomor WhatsApp <span class="req">*</span></label>
                            <input type="tel" id="phone" name="phone" placeholder="Contoh: 0812 3456 7890" value="{{ old('phone', auth()->user()->phone ?? '') }}" required>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top:16px;">
                        <label for="payment_method_id">Metode Pembayaran <span class="req">*</span></label>
                        <select id="payment_method_id" name="payment_method_id" required>
                            <option value="">-- Pilih metode --</option>
                            @if(isset($paymentMethods))
                                @foreach($paymentMethods as $pm)
                                    <option value="{{ $pm->id }}" {{ old('payment_method_id') == $pm->id ? 'selected' : '' }}>
                                        {{ $pm->name }} @if($pm->account_number)({{ $pm->account_number }})@endif
                                    </option>
                                @endforeach
                            @else
                                <option value="1">BRI - 1234567890</option>
                                <option value="2">BCA - 0987654321</option>
                                <option value="3">QRIS Nasi Darurat</option>
                            @endif
                        </select>
                        @error('payment_method_id') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- QRIS Info --}}
                <div class="qris-box">
                    <div class="qris-placeholder">QRIS<br>CODE</div>
                    <div class="qris-info">
                        <div class="qris-label">INFO REKENING / QRIS TUJUAN</div>
                        <div>
                            <div class="qris-nama-label">Atas nama</div>
                            <div class="qris-nama">Nasi Darurat Purbalingga</div>
                        </div>
                        <div>
                            <div class="qris-nama-label">No. rekening (BNI)</div>
                            <div class="qris-rek">1234-5678-90</div>
                        </div>
                    </div>
                </div>

                {{-- Upload bukti --}}
                <div class="form-group">
                    <label>Upload Bukti Transfer <span class="req">*</span></label>
                    <label class="upload-label" for="bukti_transfer">
                        <div class="upload-ikon">📎</div>
                        <div class="upload-title">Unggah bukti transfer</div>
                        <div class="upload-hint">Format: JPG, PNG, atau PDF. Maksimal 10 MB.</div>
                        <input id="bukti_transfer" name="bukti_transfer" type="file" accept=".jpg,.jpeg,.png,.pdf" required style="font-size:13px;max-width:100%;">
                    </label>
                    @error('bukti_transfer') <span style="color:#c0392b;font-size:13px;">{{ $message }}</span> @enderror
                </div>

                {{-- Note --}}
                <div class="form-group">
                    <label for="note">Pesan / Catatan (opsional)</label>
                    <textarea id="note" name="note" placeholder="Pesan atau doa yang ingin kamu titipkan..." rows="3">{{ old('note') }}</textarea>
                </div>

                {{-- Actions --}}
                <div class="form-actions">
                    <a href="{{ route('beranda-sidapur') }}" class="btn-back">← Kembali ke Beranda</a>
                    <button type="submit" class="btn-submit">Bantu Donasi →</button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
function setNominal(val) {
    document.getElementById('nominal').value = val;
    document.querySelectorAll('.nominal-btn').forEach(b => b.classList.remove('active'));
    event.target.classList.add('active');
}
</script>
@endsection
