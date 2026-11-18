<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ajukan Bantuan - Nasi Darurat</title>
  <style>
@import url("https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css");
* { -webkit-font-smoothing: antialiased; box-sizing: border-box; }
html, body { margin: 0; min-height: 100%; }
button:focus-visible { outline: 2px solid #4a90e2 !important; outline: -webkit-focus-ring-color auto 5px !important; }
a { text-decoration: none; }
@font-face { font-family: "Lato-ExtraBold"; src: local("Lato-ExtraBold"); }
@font-face { font-family: "Lato-Regular"; src: local("Lato-Regular"); }
@font-face { font-family: "Lato-Bold"; src: local("Lato-Bold"); }
.ajukan-bantuan-nasi {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  position: relative;
  background-color: #ffffff;
}

.ajukan-bantuan-nasi .navigasi-utama {
  display: flex;
  height: 88px;
  align-items: center;
  justify-content: space-between;
  padding: 0px 80px;
  position: relative;
  align-self: stretch;
  width: 100%;
  background-color: #ffffff;
  border-bottom-width: 1px;
  border-bottom-style: solid;
  border-color: #dee4dc;
}

.ajukan-bantuan-nasi .identitas-nasi {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  position: relative;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .lambang-program {
  display: flex;
  width: 40px;
  height: 40px;
  align-items: center;
  justify-content: center;
  position: relative;
  background-color: #276447;
  border-radius: 100px;
  overflow: hidden;
}

.ajukan-bantuan-nasi .img-wrapper {
  position: relative;
  width: 24px;
  height: 24px;
}

.ajukan-bantuan-nasi .lambang {
  position: absolute;
  width: 91.04%;
  height: 91.04%;
  top: 8.96%;
  left: 8.96%;
}

.ajukan-bantuan-nasi .nama-program {
  display: inline-flex;
  flex-direction: column;
  align-items: flex-start;
  position: relative;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .nama {
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-ExtraBold", Helvetica;
  font-weight: 800;
  color: #233b30;
  font-size: 21px;
  letter-spacing: 0;
  line-height: normal;
  white-space: nowrap;
}

.ajukan-bantuan-nasi .semboyan {
  position: relative;
  width: fit-content;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #728078;
  font-size: 10px;
  letter-spacing: 0.12px;
  line-height: normal;
  white-space: nowrap;
}

.ajukan-bantuan-nasi .navbar {
  display: inline-flex;
  align-items: center;
  gap: 30px;
  position: relative;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .tautan-navigasi {
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #233b30;
  font-size: 15px;
  letter-spacing: 0;
  line-height: normal;
  white-space: nowrap;
}

.ajukan-bantuan-nasi .akses-akun {
  display: inline-flex;
  align-items: center;
  gap: 20px;
  position: relative;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .text-wrapper {
  position: relative;
  width: fit-content;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #276447;
  font-size: 15px;
  letter-spacing: 0;
  line-height: normal;
  white-space: nowrap;
}

.ajukan-bantuan-nasi .tombol-tindakan {
  display: inline-flex;
  height: 48px;
  align-items: center;
  justify-content: center;
  gap: 10px;
  padding: 0px 22px;
  position: relative;
  flex: 0 0 auto;
  background-color: #276447;
  border-radius: 8px;
  overflow: hidden;
  border: 1px solid;
}

.ajukan-bantuan-nasi .label-tindakan {
  width: fit-content;
  color: #ffffff;
  font-size: 15px;
  white-space: nowrap;
  position: relative;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  letter-spacing: 0;
  line-height: normal;
}

.ajukan-bantuan-nasi .pengantar-pengajuan {
  flex-direction: column;
  gap: 30px;
  padding: 28px 80px 40px;
  background-color: #eaf0e7;
  display: flex;
  align-items: flex-start;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .jejak-halaman {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  position: relative;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .tautan-beranda {
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #5e6e64;
  font-size: 14px;
  letter-spacing: 0;
  line-height: normal;
}

.ajukan-bantuan-nasi .chevron-right {
  position: relative;
  width: 14px;
  height: 14px;
}

.ajukan-bantuan-nasi .vector {
  position: absolute;
  width: 68.57%;
  height: 81.07%;
  top: 18.93%;
  left: 31.43%;
}

.ajukan-bantuan-nasi .halaman-aktif {
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #276447;
  font-size: 14px;
  letter-spacing: 0;
  line-height: normal;
}

.ajukan-bantuan-nasi .judul-dan-cakupan {
  display: flex;
  align-items: center;
  gap: 64px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .pesan-pengajuan {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 14px;
  position: relative;
  flex: 1;
  flex-grow: 1;
}

.ajukan-bantuan-nasi .kategori {
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #276447;
  font-size: 12px;
  letter-spacing: 0.18px;
  line-height: normal;
  white-space: nowrap;
}

.ajukan-bantuan-nasi .judul {
  position: relative;
  align-self: stretch;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #233b30;
  font-size: 48px;
  letter-spacing: -0.34px;
  line-height: 55.2px;
}

.ajukan-bantuan-nasi .pengantar {
  position: relative;
  width: 780px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #5e6e64;
  font-size: 17px;
  letter-spacing: 0;
  line-height: 25.5px;
}

.ajukan-bantuan-nasi .cakupan-program {
  display: flex;
  width: 330px;
  align-items: flex-start;
  gap: 14px;
  padding: 20px;
  position: relative;
  background-color: #ffffff;
  border-radius: 16px;
  overflow: hidden;
}

.ajukan-bantuan-nasi .img {
  position: absolute;
  width: 86.87%;
  height: 95.21%;
  top: 4.79%;
  left: 13.13%;
}

.ajukan-bantuan-nasi .div {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 6px;
  position: relative;
  flex: 1;
  flex-grow: 1;
}

.ajukan-bantuan-nasi .penerima-program {
  position: relative;
  align-self: stretch;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #233b30;
  font-size: 16px;
  letter-spacing: 0;
  line-height: normal;
}

.ajukan-bantuan-nasi .wilayah-program {
  position: relative;
  align-self: stretch;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #5e6e64;
  font-size: 15px;
  letter-spacing: 0;
  line-height: 22.5px;
}

.ajukan-bantuan-nasi .formulir-dan-panduan {
  display: flex;
  align-items: flex-start;
  gap: 40px;
  padding: 48px 80px 72px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .formulir-pengajuan {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 28px;
  padding: 32px;
  position: relative;
  flex: 1;
  flex-grow: 1;
  background-color: #ffffff;
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid;
  border-color: #dee4dc;
}

.ajukan-bantuan-nasi .div-2 {
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .judul-formulir {
  width: fit-content;
  font-size: 24px;
  position: relative;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #233b30;
  letter-spacing: 0;
  line-height: normal;
}

.ajukan-bantuan-nasi .penanda-wajib {
  position: relative;
  width: fit-content;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: transparent;
  font-size: 13px;
  letter-spacing: 0;
  line-height: normal;
}

.ajukan-bantuan-nasi .span {
  color: #276447;
}

.ajukan-bantuan-nasi .text-wrapper-2 {
  color: #5e6e64;
}

.ajukan-bantuan-nasi .div-3 {
  position: relative;
  align-self: stretch;
  width: 100%;
  height: 1px;
  background-color: #dee4dc;
}

.ajukan-bantuan-nasi .identitas-dan-kontak {
  gap: 22px;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  position: relative;
}

.ajukan-bantuan-nasi .pengantar-bagian {
  gap: 14px;
  display: flex;
  align-items: flex-start;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .nomor-bagian {
  display: flex;
  width: 36px;
  height: 36px;
  align-items: center;
  justify-content: center;
  position: relative;
  background-color: #eaf0e7;
  border-radius: 100px;
  overflow: hidden;
}

.ajukan-bantuan-nasi .text-wrapper-3 {
  position: relative;
  width: fit-content;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #276447;
  font-size: 13px;
  letter-spacing: 0;
  line-height: normal;
}

.ajukan-bantuan-nasi .judul-bagian {
  align-self: stretch;
  font-size: 23px;
  position: relative;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #233b30;
  letter-spacing: 0;
  line-height: normal;
}

.ajukan-bantuan-nasi .keterangan-bagian {
  position: relative;
  align-self: stretch;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #5e6e64;
  font-size: 14px;
  letter-spacing: 0;
  line-height: 21px;
}

.ajukan-bantuan-nasi .isian-identitas {
  gap: 20px;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  display: flex;
  align-items: flex-start;
  position: relative;
}

.ajukan-bantuan-nasi .isian-formulir {
  flex-direction: column;
  gap: 8px;
  flex: 1;
  flex-grow: 1;
  display: flex;
  align-items: flex-start;
  position: relative;
}

.ajukan-bantuan-nasi .label-isian {
  align-self: stretch;
  margin-top: -1px;
  color: transparent;
  font-size: 14px;
  position: relative;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  letter-spacing: 0;
  line-height: normal;
}

.ajukan-bantuan-nasi .text-wrapper-4 {
  color: #233b30;
}

.ajukan-bantuan-nasi .area-isian {
  height: 48px;
  gap: 10px;
  padding: 0px 14px;
  background-color: #ffffff;
  border: 1px solid;
  border-color: #dee4dc;
  display: flex;
  align-items: center;
  position: relative;
  align-self: stretch;
  width: 100%;
  border-radius: 8px;
  overflow: hidden;
}

.ajukan-bantuan-nasi .text-wrapper-5 {
  position: relative;
  flex: 1;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #8a958d;
  font-size: 15px;
  letter-spacing: 0;
  line-height: 21.8px;
}

.ajukan-bantuan-nasi .div-wrapper {
  flex-direction: column;
  gap: 20px;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  display: flex;
  align-items: flex-start;
  position: relative;
}

.ajukan-bantuan-nasi .div-4 {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 8px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .field-dropdown {
  display: flex;
  height: 48px;
  align-items: center;
  justify-content: space-between;
  padding: 0px 14px;
  position: relative;
  align-self: stretch;
  width: 100%;
  background-color: #ffffff;
  border-radius: 8px;
  overflow: hidden;
  border: 1px solid;
  border-color: #dee4dc;
}

.ajukan-bantuan-nasi .vector-wrapper {
  position: relative;
  width: 20px;
  height: 20px;
}

.ajukan-bantuan-nasi .vector-2 {
  position: absolute;
  width: 80.00%;
  height: 67.50%;
  top: 32.50%;
  left: 20.00%;
}

.ajukan-bantuan-nasi .daftar-opsi {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  background-color: #ffffff;
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid;
  border-color: #dee4dc;
}

.ajukan-bantuan-nasi .opsi {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 14px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  background-color: #ffffff;
  border-bottom-width: 1px;
  border-bottom-style: solid;
  border-color: #dee4dc;
}

.ajukan-bantuan-nasi .text-wrapper-6 {
  position: relative;
  flex: 1;
  margin-top: -1px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #233b30;
  font-size: 15px;
  letter-spacing: 0;
  line-height: 21.8px;
}

.ajukan-bantuan-nasi .kelompok-PBG {
  gap: 8px;
  padding: 12px 14px;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  background-color: #f8faf8;
  border-top-width: 1px;
  border-top-style: solid;
  border-color: #dee4dc;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  position: relative;
}

.ajukan-bantuan-nasi .kampus-di {
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #276447;
  font-size: 12px;
  letter-spacing: 0.48px;
  line-height: normal;
  white-space: nowrap;
}

.ajukan-bantuan-nasi .opsi-2 {
  border-bottom-width: 1px;
  border-bottom-style: solid;
  border-color: #dee4dc;
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 10px 0px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  background-color: #ffffff;
}

.ajukan-bantuan-nasi .opsi-3 {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 10px 0px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  background-color: #ffffff;
}

.ajukan-bantuan-nasi .area-unggah {
  flex-direction: column;
  height: 160px;
  justify-content: center;
  gap: 12px;
  padding: 20px;
  background-color: #f7faf8;
  border: 1px dashed;
  border-color: #276447;
  display: flex;
  align-items: center;
  position: relative;
  align-self: stretch;
  width: 100%;
  border-radius: 8px;
  overflow: hidden;
}

.ajukan-bantuan-nasi .ikon-unggah {
  display: flex;
  flex-direction: column;
  width: 40px;
  height: 40px;
  align-items: center;
  justify-content: center;
  position: relative;
  background-color: #eaf4ef;
  border-radius: 20px;
}

.ajukan-bantuan-nasi .vector-3 {
  position: absolute;
  width: 92.50%;
  height: 94.57%;
  top: 5.43%;
  left: 7.50%;
}

.ajukan-bantuan-nasi .teks-unggah {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 4px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .text-wrapper-7 {
  position: relative;
  align-self: stretch;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #233b30;
  font-size: 15px;
  text-align: center;
  letter-spacing: 0;
  line-height: normal;
}

.ajukan-bantuan-nasi .p {
  position: relative;
  align-self: stretch;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #8a958d;
  font-size: 13px;
  text-align: center;
  letter-spacing: 0;
  line-height: 18.9px;
}

.ajukan-bantuan-nasi .text-wrapper-8 {
  position: relative;
  width: fit-content;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #276447;
  font-size: 14px;
  letter-spacing: 0;
  line-height: normal;
}

.ajukan-bantuan-nasi .vector-4 {
  position: absolute;
  width: 83.42%;
  height: 83.42%;
  top: 16.58%;
  left: 16.58%;
}

.ajukan-bantuan-nasi .informasi-dan-tautan {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 40px;
  padding: 56px 80px 28px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  background-color: #faf8f2;
}

.ajukan-bantuan-nasi .tautan-situs {
  display: flex;
  align-items: flex-start;
  gap: 80px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .identitas-dan-sosial {
  width: 400px;
  gap: 20px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  position: relative;
}

.ajukan-bantuan-nasi .tentang-program {
  position: relative;
  align-self: stretch;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #728078;
  font-size: 15px;
  letter-spacing: 0;
  line-height: 22.5px;
}

.ajukan-bantuan-nasi .tautan-instagram {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  position: relative;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .kelompok-tautan {
  gap: 13px;
  flex: 1;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  position: relative;
}

.ajukan-bantuan-nasi .kategori-tautan {
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #233b30;
  font-size: 16px;
  letter-spacing: 0;
  line-height: normal;
  white-space: nowrap;
}

.ajukan-bantuan-nasi .tautan {
  position: relative;
  width: fit-content;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #728078;
  font-size: 14px;
  letter-spacing: 0;
  line-height: normal;
}

.ajukan-bantuan-nasi .catatan-situs {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.ajukan-bantuan-nasi .text-wrapper-9 {
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #728078;
  font-size: 12px;
  letter-spacing: 0;
  line-height: 18px;
  white-space: nowrap;
}

    .field-dropdown { font: inherit; color: #5e6e64; }
    .area-unggah { cursor: pointer; }
    .tombol-tindakan { cursor: pointer; }
    @media (max-width: 900px) {
      .ajukan-bantuan-nasi .navigasi-utama { padding: 16px 24px; height: auto; flex-wrap: wrap; gap: 18px; }
      .ajukan-bantuan-nasi .navbar { order: 3; width: 100%; flex-wrap: wrap; gap: 16px; }
      .ajukan-bantuan-nasi .pengantar-pengajuan, .ajukan-bantuan-nasi .formulir-dan-panduan, .ajukan-bantuan-nasi .informasi-dan-tautan { padding-left: 24px; padding-right: 24px; }
      .ajukan-bantuan-nasi .judul-dan-cakupan, .ajukan-bantuan-nasi .tautan-situs { flex-wrap: wrap; gap: 24px; }
      .ajukan-bantuan-nasi .pengantar { width: 100%; }
      .ajukan-bantuan-nasi .cakupan-program { width: 100%; }
      .ajukan-bantuan-nasi .identitas-dan-sosial { width: 100%; }
    }
    @media (max-width: 600px) {
      .ajukan-bantuan-nasi .judul { font-size: 34px; line-height: 1.2; }
      .ajukan-bantuan-nasi .formulir-pengajuan { padding: 20px; }
      .ajukan-bantuan-nasi .isian-identitas { flex-direction: column; }
      .ajukan-bantuan-nasi .isian-formulir { width: 100%; }
      .ajukan-bantuan-nasi .catatan-situs { flex-direction: column; gap: 10px; }
    }
  </style>
</head>
<body>
<div class="ajukan-bantuan-nasi">
  <div class="navigasi-utama">
    <div class="identitas-nasi">
      <div class="lambang-program"><div class="img-wrapper"><img class="lambang" src="{{ asset('img/lambang-2.svg') }}" alt="Lambang Nasi Darurat"></div></div>
      <div class="nama-program"><div class="nama">SIDAPUR</div><div class="semboyan">KEBAIKAN DALAM SEPORSI NASI</div></div>
    </div>
    <div class="navbar"><div class="tautan-navigasi">Beranda</div><div class="tautan-navigasi">Tentang kami</div><div class="tautan-navigasi">Transparansi</div><div class="tautan-navigasi">Hubungi kami</div></div>
    <div class="akses-akun"><div class="text-wrapper">Masuk</div><div class="tombol-tindakan"><div class="label-tindakan">Daftar</div></div></div>
  </div>

  <div class="pengantar-pengajuan">
    <div class="jejak-halaman"><div class="tautan-beranda">Beranda</div><div class="chevron-right"><img class="vector" src="{{ asset('img/vector.svg') }}" alt=""></div><div class="halaman-aktif">Ajukan Bantuan</div></div>
    <div class="judul-dan-cakupan">
      <div class="pesan-pengajuan"><p class="kategori">NASI DARURAT • PENGAJUAN BANTUAN</p><div class="judul">Butuh makan? Mari ceritakan.</div><p class="pengantar">Isi formulir berikut agar kami dapat memahami kebutuhanmu dan meninjau kemungkinan bantuan makanan dari Nasi Darurat.</p></div>
      <div class="cakupan-program"><div class="img-wrapper"><img class="img" src="{{ asset('img/vector-4.svg') }}" alt=""></div><div class="div"><div class="penerima-program">Khusus mahasiswa</div><div class="wilayah-program">Area Purbalingga &amp; Purwokerto</div></div></div>
    </div>
  </div>

  <div class="formulir-dan-panduan">
    <div class="formulir-pengajuan">
      <div class="div-2"><div class="judul-formulir">Formulir pengajuan</div><p class="penanda-wajib"><span class="span">*</span><span class="text-wrapper-2"> Wajib diisi</span></p></div>
      <div class="div-3"></div>
      <div class="identitas-dan-kontak">
        <div class="pengantar-bagian"><div class="nomor-bagian"><div class="text-wrapper-3">01</div></div><div class="div"><div class="judul-bagian">Identitas &amp; kontak pemohon</div><p class="keterangan-bagian">Gunakan kontak aktif yang dapat dihubungi untuk konfirmasi.</p></div></div>
        <div class="isian-identitas">
          <div class="isian-formulir"><p class="label-isian"><span class="text-wrapper-4">Nama lengkap</span><span class="span"> *</span></p><div class="area-isian"><div class="text-wrapper-5">Nama sesuai identitas</div></div></div>
          <div class="isian-formulir"><p class="label-isian"><span class="text-wrapper-4">Nomor WhatsApp</span><span class="span"> *</span></p><div class="area-isian"><div class="text-wrapper-5">Contoh: 0812 3456 7890</div></div></div>
        </div>
        <div class="div-wrapper"><div class="div-4"><p class="label-isian"><span class="text-wrapper-4">Nama perguruan tinggi</span><span class="span"> *</span></p>
          <select class="field-dropdown" name="perguruan_tinggi" required>
            <option value="">Pilih perguruan tinggi</option>
            <option>Universitas Jenderal Soedirman (Unsoed)</option><option>Universitas Islam Negeri Profesor Kiai Haji Saifuddin Zuhri (UIN Saizu)</option><option>Universitas Muhammadiyah Purwokerto (UMP)</option><option>Telkom University Purwokerto</option><option>Universitas Amikom Purwokerto</option><option>Universitas Wijayakusuma (Unwiku)</option><option>Universitas Harapan Bangsa (UHB)</option><option>Universitas Bina Sarana Informatika (UBSI) Kampus Purwokerto</option><option>Universitas Nahdlatul Ulama (UNU) Purwokerto</option><option>Universitas Terbuka (UT) Purwokerto</option><option>Poltekkes Kemenkes Semarang (Kampus Purwokerto)</option>
            <optgroup label="KAMPUS DI PURBALINGGA (PBG)"><option>Fakultas Teknik Unsoed (Kampus Blater)</option><option>UIN Saizu Kampus 2 Purbalingga</option><option>Universitas Perwira Purbalingga (UNPERBA)</option><option>STIE YPPI Purbalingga</option><option>STKIP Purbalingga</option><option>Politeknik Purbalingga</option></optgroup>
          </select>
        </div></div>
        <div class="div-wrapper"><div class="div-4"><p class="label-isian"><span class="text-wrapper-4">Upload KTM (Kartu Tanda Mahasiswa)</span><span class="span"> *</span></p><label class="area-unggah" for="ktm"><div class="ikon-unggah"><div class="vector-wrapper"><img class="vector-3" src="{{ asset('img/image.svg') }}" alt=""></div></div><div class="teks-unggah"><div class="text-wrapper-7">Unggah KTM</div><p class="p">Format: JPG, PNG, atau PDF. Maksimal 10 MB.</p></div><input id="ktm" type="file" accept=".jpg,.jpeg,.png,.pdf" required hidden></label></div></div>
      </div>
      <div class="div-wrapper"><div class="div-2"><div class="text-wrapper-8">Kembali ke beranda</div><button type="button" class="tombol-tindakan"><span class="label-tindakan">Kirim pengajuan</span><span class="vector-wrapper"><img class="vector-4" src="{{ asset('img/vector-3.svg') }}" alt=""></span></button></div></div>
    </div>
  </div>

  <div class="informasi-dan-tautan">
    <div class="tautan-situs">
      <div class="identitas-dan-sosial"><div class="identitas-nasi"><div class="lambang-program"><div class="img-wrapper"><img class="lambang" src="{{ asset('img/lambang.svg') }}" alt="Lambang Nasi Darurat"></div></div><div class="nama-program"><div class="nama">nasi darurat</div><div class="semboyan">KEBAIKAN DALAM SEPORSI NASI</div></div></div><p class="tentang-program">Seporsi makanan, sebuah kepedulian. Ruang bersama untuk menghadirkan harapan melalui makanan layak.</p><div class="tautan-instagram"><img class="vector-wrapper" src="{{ asset('img/instagram.svg') }}" alt=""><div class="text-wrapper">Instagram Nasi Darurat ↗</div></div></div>
      <div class="kelompok-tautan"><div class="kategori-tautan">Jelajahi</div><div class="tautan">Program &amp; penerima</div><div class="tautan">Tentang Nasi Darurat</div><div class="tautan">Transparansi anggaran</div><div class="tautan">Artikel &amp; dokumentasi</div></div>
      <div class="kelompok-tautan"><div class="kategori-tautan">Terlibat</div><div class="tautan">Jadi donatur</div><div class="tautan">Kolaborasi</div><div class="tautan">Ulasan komunitas</div><div class="tautan">Hubungi kami</div></div>
      <div class="kelompok-tautan"><div class="kategori-tautan">Informasi</div><div class="tautan">Syarat dan ketentuan</div><div class="tautan">Kebijakan privasi</div><div class="tautan">Pusat bantuan</div><div class="tautan">Bahasa Indonesia ⌄</div></div>
    </div>
    <div class="div-3"></div><div class="catatan-situs"><p class="text-wrapper-9">© 2026 Nasi Darurat. Kebaikan dalam seporsi nasi.</p><p class="text-wrapper-9">Mockup visual • angka, penerima, dan konten merupakan ilustrasi.</p></div>
  </div>
</div>
</body>
</html>
