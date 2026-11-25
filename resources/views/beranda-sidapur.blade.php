<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIDAPUR - Kebaikan dalam Seporsi Nasi</title>

    <style>
@import url("https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css");
* {
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}
html,
body {
  margin: 0px;
  min-height: 100%;
}
button:focus-visible {
  outline: 2px solid #4a90e2 !important;
  outline: -webkit-focus-ring-color auto 5px !important;
}
a {
  text-decoration: none;
}
@font-face {
  font-family: "Lato-ExtraBold";
  src: local("Lato-ExtraBold");
}
@font-face {
  font-family: "Lato-Regular";
  src: local("Lato-Regular");
}
@font-face {
  font-family: "Lato-Bold";
  src: local("Lato-Bold");
}

.beranda-nasi {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  position: relative;
  background-color: #ffffff;
}

.beranda-nasi .div {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.beranda-nasi .navigasi-utama {
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

.beranda-nasi .identitas-nasi {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  position: relative;
  flex: 0 0 auto;
}

.beranda-nasi .lambang-program {
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

.beranda-nasi .soup {
  position: relative;
  width: 24px;
  height: 24px;
}

.beranda-nasi .vector {
  position: absolute;
  width: 91.04%;
  height: 91.04%;
  top: 8.96%;
  left: 8.96%;
}

.beranda-nasi .div-2 {
  display: inline-flex;
  flex-direction: column;
  align-items: flex-start;
  position: relative;
  flex: 0 0 auto;
}

.beranda-nasi .nama {
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

.beranda-nasi .semboyan {
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

.beranda-nasi .navbar {
  display: inline-flex;
  align-items: center;
  gap: 30px;
  position: relative;
  flex: 0 0 auto;
}

.beranda-nasi .tautan-navigasi {
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

.beranda-nasi .akses-akun {
  display: inline-flex;
  align-items: center;
  gap: 20px;
  position: relative;
  flex: 0 0 auto;
}

.beranda-nasi .text-wrapper {
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

.beranda-nasi .tombol {
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

.beranda-nasi .label-tindakan {
  position: relative;
  width: fit-content;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #ffffff;
  font-size: 15px;
  letter-spacing: 0;
  line-height: normal;
  white-space: nowrap;
}

.beranda-nasi .ajakan-berbagi {
  display: flex;
  align-items: center;
  gap: 64px;
  padding: 64px 80px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  background-color: #ffffff;
}

.beranda-nasi .div-3 {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 24px;
  position: relative;
  flex: 1;
  flex-grow: 1;
}

.beranda-nasi .penanda {
  display: inline-flex;
  align-items: flex-start;
  padding: 6px 12px;
  position: relative;
  flex: 0 0 auto;
  background-color: #eaf0e7;
  border-radius: 100px;
  overflow: hidden;
}

.beranda-nasi .label-penanda {
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #276447;
  font-size: 12px;
  letter-spacing: 0;
  line-height: normal;
  white-space: nowrap;
}

.beranda-nasi .judul {
  font-size: 64px;
  letter-spacing: -0.45px;
  line-height: 73.6px;
  position: relative;
  align-self: stretch;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #233b30;
}

.beranda-nasi .isi-konten {
  align-self: stretch;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #728078;
  font-size: 19px;
  line-height: 28.5px;
  position: relative;
  letter-spacing: 0;
}

.beranda-nasi .tindakan-utama {
  display: inline-flex;
  align-items: flex-start;
  gap: 12px;
  position: relative;
  flex: 0 0 auto;
}

.beranda-nasi .vector-wrapper {
  position: relative;
  width: 20px;
  height: 20px;
}

.beranda-nasi .img {
  position: absolute;
  width: 83.42%;
  height: 83.42%;
  top: 16.58%;
  left: 16.58%;
}

.beranda-nasi .tombol-2 {
  flex: 0 0 auto;
  display: inline-flex;
  height: 48px;
  align-items: center;
  justify-content: center;
  gap: 10px;
  padding: 0px 22px;
  position: relative;
  background-color: #ffffff;
  border-radius: 8px;
  overflow: hidden;
  border: 1px solid;
  border-color: #dee4dc;
}

.beranda-nasi .kepercayaan-donasi {
  display: flex;
  align-items: center;
  gap: 8px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.beranda-nasi .shield-check {
  position: relative;
  width: 18px;
  height: 18px;
}

.beranda-nasi .vector-2 {
  position: absolute;
  width: 88.05%;
  height: 96.39%;
  top: 3.61%;
  left: 11.95%;
}

.beranda-nasi .p {
  flex: 1;
  margin-top: -1px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #728078;
  font-size: 13px;
  line-height: 19.5px;
  position: relative;
  letter-spacing: 0;
}

.beranda-nasi .momen-berbagi {
  display: flex;
  flex-direction: column;
  width: 592px;
  height: 516px;
  align-items: flex-start;
  position: relative;
}

.beranda-nasi .foto-kegiatan {
  position: relative;
  width: 592px;
  height: 516px;
  object-fit: cover;
}

.beranda-nasi .pesan-foto {
  display: flex;
  width: 350px;
  align-items: center;
  gap: 12px;
  padding: 20px;
  position: absolute;
  left: 24px;
  bottom: 24px;
  background-color: #ffffff;
  border-radius: 16px;
  overflow: hidden;
}

.beranda-nasi .heart-handshake {
  position: relative;
  width: 32px;
  height: 32px;
}

.beranda-nasi .vector-3 {
  position: absolute;
  width: 94.33%;
  height: 85.99%;
  top: 14.01%;
  left: 5.67%;
}

.beranda-nasi .keterangan-momen {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 3px;
  position: relative;
  flex: 1;
  flex-grow: 1;
}

.beranda-nasi .isi-konten-2 {
  align-self: stretch;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #233b30;
  font-size: 17px;
  line-height: 25.5px;
  position: relative;
  letter-spacing: 0;
}

.beranda-nasi .isi-konten-3 {
  position: relative;
  align-self: stretch;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #728078;
  font-size: 12px;
  letter-spacing: 0;
  line-height: 18px;
}

.beranda-nasi .gambaran-dampak {
  display: flex;
  align-items: center;
  gap: 40px;
  padding: 32px 120px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  background-color: #eaf0e7;
}

.beranda-nasi .angka-dampak {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 6px;
  position: relative;
  flex: 1;
  flex-grow: 1;
}

.beranda-nasi .judul-2 {
  position: relative;
  width: 127px;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #233b30;
  font-size: 38px;
  letter-spacing: -0.27px;
  line-height: 43.7px;
}

.beranda-nasi .isi-konten-4 {
  width: 127px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #728078;
  font-size: 14px;
  line-height: 21px;
  position: relative;
  letter-spacing: 0;
}

.beranda-nasi .isi-konten-5 {
  width: 135px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #728078;
  font-size: 14px;
  line-height: 21px;
  position: relative;
  letter-spacing: 0;
}

.beranda-nasi .tentang-program-nasi {
  display: flex;
  align-items: center;
  gap: 72px;
  padding: 72px 80px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  background-color: #ffffff;
}

.beranda-nasi .foto-kegiatan-2 {
  position: relative;
  width: 536px;
  height: 380px;
  object-fit: cover;
}

.beranda-nasi .kategori-cerita {
  color: #276447;
  font-size: 12px;
  letter-spacing: 0.18px;
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  line-height: normal;
  white-space: nowrap;
}

.beranda-nasi .judul-3 {
  font-size: 42px;
  letter-spacing: -0.29px;
  line-height: 48.3px;
  position: relative;
  align-self: stretch;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #233b30;
}

.beranda-nasi .isi-konten-6 {
  align-self: stretch;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #728078;
  font-size: 17px;
  line-height: 25.5px;
  position: relative;
  letter-spacing: 0;
}

.beranda-nasi .tombol-3 {
  display: inline-flex;
  height: 48px;
  align-items: center;
  justify-content: center;
  gap: 10px;
  padding: 0px 22px;
  position: relative;
  background-color: #ffffff;
  border-radius: 8px;
  overflow: hidden;
  border: 1px solid;
  border-color: #dee4dc;
}

.beranda-nasi .vector-4 {
  position: absolute;
  width: 75.08%;
  height: 75.08%;
  top: 24.92%;
  left: 24.92%;
}

.beranda-nasi .alur-berbagi {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 36px;
  padding: 64px 80px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  background-color: #eaf0e7;
}

.beranda-nasi .pengantar-bagian {
  display: flex;
  align-items: flex-end;
  gap: 40px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.beranda-nasi .judul-dan-pengantar {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 12px;
  position: relative;
  flex: 1;
  flex-grow: 1;
}

.beranda-nasi .kategori {
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #276447;
  font-size: 12px;
  letter-spacing: 0.2px;
  line-height: normal;
  white-space: nowrap;
}

.beranda-nasi .judul-4 {
  font-size: 38px;
  letter-spacing: -0.27px;
  line-height: 43.7px;
  position: relative;
  align-self: stretch;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #233b30;
}

.beranda-nasi .langkah-penyaluran {
  gap: 40px;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  display: flex;
  align-items: flex-start;
  position: relative;
}

.beranda-nasi .langkah-berbagi {
  flex-direction: column;
  gap: 14px;
  flex: 1;
  flex-grow: 1;
  display: flex;
  align-items: flex-start;
  position: relative;
}

.beranda-nasi .nomor-langkah {
  display: flex;
  width: 42px;
  height: 42px;
  align-items: center;
  justify-content: center;
  position: relative;
  background-color: #faf8f2;
  border-radius: 100px;
  overflow: hidden;
}

.beranda-nasi .judul-5 {
  font-size: 23px;
  letter-spacing: -0.16px;
  line-height: 26.4px;
  position: relative;
  align-self: stretch;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #233b30;
}

.beranda-nasi .isi-konten-7 {
  align-self: stretch;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #728078;
  font-size: 15px;
  line-height: 22.5px;
  position: relative;
  letter-spacing: 0;
}

.beranda-nasi .transparansi-publik {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 28px;
  padding: 72px 80px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  background-color: #ffffff;
}

.beranda-nasi .ringkasan-dana {
  display: flex;
  align-items: flex-start;
  gap: 20px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.beranda-nasi .ringkasan-angka {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 10px;
  padding: 24px;
  position: relative;
  flex: 1;
  align-self: stretch;
  flex-grow: 1;
  background-color: #ffffff;
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid;
  border-color: #dee4dc;
}

.beranda-nasi .label-ringkasan {
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.beranda-nasi .isi-konten-8 {
  flex: 1;
  margin-top: -1px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #728078;
  font-size: 14px;
  line-height: 21px;
  position: relative;
  letter-spacing: 0;
}

.beranda-nasi .judul-6 {
  font-size: 32px;
  letter-spacing: -0.22px;
  line-height: 36.8px;
  position: relative;
  align-self: stretch;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #233b30;
}

.beranda-nasi .vector-5 {
  position: absolute;
  width: 91.75%;
  height: 91.75%;
  top: 8.25%;
  left: 8.25%;
}

.beranda-nasi .section {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 20px;
  padding: 33px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  border-radius: 20px;
  border: 1px solid;
  border-color: #e2e6e1;
}

.beranda-nasi .container {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 4px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.beranda-nasi .text-wrapper-2 {
  position: relative;
  display: flex;
  align-items: center;
  align-self: stretch;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #1f3b2e;
  font-size: 24px;
  letter-spacing: 0;
  line-height: normal;
}

.beranda-nasi .september-total {
  position: relative;
  display: flex;
  align-items: center;
  align-self: stretch;
  margin-top: -1px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #5f6a64;
  font-size: 14px;
  letter-spacing: 0;
  line-height: normal;
}

.beranda-nasi .img-perbandingan {
  display: flex;
  height: 22px;
  align-items: flex-start;
  gap: 2px;
  position: relative;
  align-self: stretch;
  width: 100%;
  border-radius: 11px;
  overflow: hidden;
}

.beranda-nasi .background {
  position: relative;
  align-self: stretch;
  width: 980.09px;
  background-color: #2a6046;
}

.beranda-nasi .background-2 {
  position: relative;
  align-self: stretch;
  width: 183.91px;
  background-color: #e3a35b;
}

.beranda-nasi .margin {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 8px 0px 0px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.beranda-nasi .container-2 {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 12px 752.06px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.beranda-nasi .container-3 {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  position: relative;
  flex: 0 0 auto;
}

.beranda-nasi .background-3 {
  position: relative;
  width: 12px;
  height: 12px;
  background-color: #2a6046;
  border-radius: 3px;
}

.beranda-nasi .text-wrapper-3 {
  position: relative;
  display: flex;
  align-items: center;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #1f3b2e;
  font-size: 16px;
  letter-spacing: 0;
  line-height: normal;
  white-space: nowrap;
}

.beranda-nasi .text-wrapper-4 {
  position: relative;
  display: flex;
  align-items: center;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #5f6a64;
  font-size: 14px;
  letter-spacing: 0;
  line-height: normal;
}

.beranda-nasi .horizontal-border {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 16px;
  padding: 10px 0px 11px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  border-bottom-width: 1px;
  border-bottom-style: solid;
  border-color: #eef1ee;
}

.beranda-nasi .div-wrapper {
  display: flex;
  flex-direction: column;
  width: 380px;
  align-items: flex-start;
  position: relative;
}

.beranda-nasi .text-wrapper-5 {
  position: relative;
  display: flex;
  align-items: center;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #1f3b2e;
  font-size: 15px;
  letter-spacing: 0;
  line-height: 20.2px;
  white-space: nowrap;
}

.beranda-nasi .background-wrapper {
  display: flex;
  flex-direction: column;
  width: 554px;
  height: 14px;
  align-items: flex-start;
  justify-content: center;
  position: relative;
  background-color: #eaefe8;
  border-radius: 7px;
  overflow: hidden;
}

.beranda-nasi .background-4 {
  position: relative;
  flex: 1;
  align-self: stretch;
  width: 100%;
  flex-grow: 1;
  background-color: #2a6046;
  border-radius: 7px;
}

.beranda-nasi .rp-wrapper {
  display: flex;
  flex-direction: column;
  width: 200px;
  align-items: flex-end;
  position: relative;
}

.beranda-nasi .rp {
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 400;
  color: transparent;
  font-size: 15px;
  text-align: right;
  letter-spacing: 0;
  line-height: normal;
  white-space: nowrap;
}

.beranda-nasi .span {
  font-weight: 700;
  color: #1f3b2e;
}

.beranda-nasi .text-wrapper-6 {
  font-family: "Lato-Regular", Helvetica;
  color: #1f3b2e;
}

.beranda-nasi .text-wrapper-7 {
  font-family: "Lato-Regular", Helvetica;
  color: #5f6a64;
}

.beranda-nasi .text-wrapper-8 {
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #1f3b2e;
  font-size: 15px;
  letter-spacing: 0;
  line-height: 20.2px;
}

.beranda-nasi .background-5 {
  position: relative;
  width: 554px;
  height: 14px;
  background-color: #eaefe8;
  border-radius: 7px;
  overflow: hidden;
}

.beranda-nasi .background-6 {
  width: 58.70%;
  height: 100%;
  background-color: #2a6046;
  border-radius: 7px;
}

.beranda-nasi .background-7 {
  width: 46.70%;
  height: 100%;
  background-color: #2a6046;
  border-radius: 7px;
}

.beranda-nasi .background-8 {
  width: 33.70%;
  height: 100%;
  background-color: #2a6046;
  border-radius: 7px;
}

.beranda-nasi .background-9 {
  width: 27.20%;
  height: 100%;
  background-color: #2a6046;
  border-radius: 7px;
}

.beranda-nasi .background-10 {
  width: 17.40%;
  height: 100%;
  background-color: #2a6046;
  border-radius: 7px;
}

.beranda-nasi .background-11 {
  width: 13.00%;
  height: 100%;
  background-color: #2a6046;
  border-radius: 7px;
}

.beranda-nasi .background-12 {
  width: 9.80%;
  height: 100%;
  background-color: #2a6046;
  border-radius: 7px;
}

.beranda-nasi .background-13 {
  width: 8.70%;
  height: 100%;
  background-color: #2a6046;
  border-radius: 7px;
}

.beranda-nasi .background-14 {
  width: 7.60%;
  height: 100%;
  background-color: #2a6046;
  border-radius: 7px;
}

.beranda-nasi .background-15 {
  width: 6.50%;
  height: 100%;
  background-color: #2a6046;
  border-radius: 7px;
}

.beranda-nasi .container-4 {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 12px 725.05px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.beranda-nasi .background-16 {
  position: relative;
  width: 12px;
  height: 12px;
  background-color: #e3a35b;
  border-radius: 3px;
}

.beranda-nasi .background-17 {
  width: 20.70%;
  height: 100%;
  background-color: #e3a35b;
  border-radius: 7px;
}

.beranda-nasi .background-18 {
  width: 14.10%;
  height: 100%;
  background-color: #e3a35b;
  border-radius: 7px;
}

.beranda-nasi .background-19 {
  width: 10.90%;
  height: 100%;
  background-color: #e3a35b;
  border-radius: 7px;
}

.beranda-nasi .background-20 {
  width: 6.50%;
  height: 100%;
  background-color: #e3a35b;
  border-radius: 7px;
}

.beranda-nasi .background-21 {
  width: 5.40%;
  height: 100%;
  background-color: #e3a35b;
  border-radius: 7px;
}

.beranda-nasi .background-22 {
  width: 4.30%;
  height: 100%;
  background-color: #e3a35b;
  border-radius: 7px;
}

.beranda-nasi .ulasan-komunitas {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 32px;
  padding: 64px 80px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
  background-color: #eaf0e7;
}

.beranda-nasi .kumpulan-ulasan {
  display: flex;
  align-items: flex-start;
  gap: 24px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.beranda-nasi .ulasan {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 22px;
  padding: 32px;
  position: relative;
  flex: 1;
  flex-grow: 1;
  background-color: #ffffff;
  border-radius: 16px;
  overflow: hidden;
}

.beranda-nasi .penilaian {
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #276447;
  font-size: 19px;
  letter-spacing: 0.57px;
  line-height: normal;
}

.beranda-nasi .isi-konten-9 {
  align-self: stretch;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #233b30;
  font-size: 22px;
  line-height: 33px;
  position: relative;
  letter-spacing: 0;
}

.beranda-nasi .penulis-ulasan {
  display: flex;
  align-items: center;
  gap: 12px;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.beranda-nasi .avatar-penulis {
  display: flex;
  width: 42px;
  height: 42px;
  align-items: center;
  justify-content: center;
  position: relative;
  background-color: #eaf0e7;
  border-radius: 100px;
  overflow: hidden;
}

.beranda-nasi .inisial {
  position: relative;
  width: fit-content;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #276447;
  font-size: 14px;
  letter-spacing: 0;
  line-height: normal;
}

.beranda-nasi .identitas-penulis {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 2px;
  position: relative;
  flex: 1;
  flex-grow: 1;
}

.beranda-nasi .isi-konten-10 {
  align-self: stretch;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #233b30;
  font-size: 15px;
  line-height: 22.5px;
  position: relative;
  letter-spacing: 0;
}

.beranda-nasi .informasi-dan-tautan {
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

.beranda-nasi .tautan-situs {
  display: flex;
  align-items: flex-start;
  gap: 80px;
  align-self: stretch;
  width: 100%;
  position: relative;
  flex: 0 0 auto;
}

.beranda-nasi .identitas-dan-sosial {
  display: flex;
  flex-direction: column;
  width: 400px;
  align-items: flex-start;
  gap: 20px;
  position: relative;
}

.beranda-nasi .tautan-instagram {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  position: relative;
  flex: 0 0 auto;
}

.beranda-nasi .vector-6 {
  position: absolute;
  width: 95.92%;
  height: 95.92%;
  top: 4.08%;
  left: 4.08%;
}

.beranda-nasi .isi-konten-11 {
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  color: #276447;
  font-size: 15px;
  line-height: 22.5px;
  white-space: nowrap;
  position: relative;
  letter-spacing: 0;
}

.beranda-nasi .kelompok-tautan {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 13px;
  position: relative;
  flex: 1;
  flex-grow: 1;
}

.beranda-nasi .kategori-tautan {
  color: #233b30;
  font-size: 16px;
  letter-spacing: 0;
  position: relative;
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Bold", Helvetica;
  font-weight: 700;
  line-height: normal;
  white-space: nowrap;
}

.beranda-nasi .tautan {
  position: relative;
  width: fit-content;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #728078;
  font-size: 14px;
  letter-spacing: 0;
  line-height: normal;
}

.beranda-nasi .pemisah {
  position: relative;
  align-self: stretch;
  width: 100%;
  height: 1px;
  background-color: #dee4dc;
}

.beranda-nasi .catatan-situs {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  position: relative;
  align-self: stretch;
  width: 100%;
  flex: 0 0 auto;
}

.beranda-nasi .isi-konten-12 {
  width: fit-content;
  margin-top: -1px;
  font-family: "Lato-Regular", Helvetica;
  font-weight: 400;
  color: #728078;
  font-size: 12px;
  line-height: 18px;
  white-space: nowrap;
  position: relative;
  letter-spacing: 0;
}

    </style>
</head>
<body>
<div class="beranda-nasi" ><div class="div" ><div class="navigasi-utama" ><div class="identitas-nasi" ><div class="lambang-program" ><div class="soup" ><img class="vector" src="{{ asset('img/vector-7.svg') }}" /></div></div>
<div class="div-2" ><div class="nama" >SIDAPUR</div>
<div class="semboyan" >KEBAIKAN DALAM SEPORSI NASI</div></div></div>
<div class="navbar" ><div class="tautan-navigasi" >Beranda</div>
<div class="tautan-navigasi" >Tentang kami</div>
<div class="tautan-navigasi" >Transparansi</div>
<div class="tautan-navigasi" >Hubungi kami</div></div>
<div class="akses-akun" ><div class="text-wrapper" >Masuk</div>
<div class="tombol" ><div class="label-tindakan" >Daftar</div></div></div></div>
<div class="ajakan-berbagi" ><div class="div-3" ><div class="penanda" ><div class="label-penanda" >DARI KITA, UNTUK SESAMA</div></div>
<p class="judul" >Khusus Mahasiswa Area Purbalingga &amp; Purwokerto</p>
<p class="isi-konten" >Bersama Nasi Darurat, hadirkan makanan layak bagi mereka yang membutuhkan. Karena tak seorang pun seharusnya melewati hari dengan lapar.</p>
<div class="tindakan-utama" ><div class="tombol" ><div class="label-tindakan" >Ajukan Bantaun</div>
<div class="vector-wrapper" ><img class="img" src="{{ asset('img/vector-9.svg') }}" /></div></div>
<div class="tombol-2" ><div class="text-wrapper" >Bantu Donasi</div></div></div>
<div class="kepercayaan-donasi" ><div class="shield-check" ><img class="vector-2" src="{{ asset('img/vector-6.svg') }}" /></div>
<p class="p" >Penyaluran terdokumentasi. Penggunaan dana terbuka.</p></div></div>
<div class="momen-berbagi" ><img class="foto-kegiatan" src="{{ asset('img/image.png') }}" />
<div class="pesan-foto" ><div class="heart-handshake" ><img class="vector-3" src="{{ asset('img/vector.svg') }}" /></div>
<div class="keterangan-momen" ><p class="isi-konten-2" >Hangatnya berbagi, dekat di hati.</p>
<div class="isi-konten-3" >Gambaran kegiatan komunitas</div></div></div></div></div>
<div class="gambaran-dampak" ><div class="angka-dampak" ><div class="judul-2" >12.480</div>
<div class="isi-konten-4" >Donasi tersalurkan</div></div>
<div class="angka-dampak" ><div class="judul-2" >840</div>
<div class="isi-konten-5" >Donatur ikut berbagi</div></div></div></div>
<div class="div" ><div class="tentang-program-nasi" ><img class="foto-kegiatan-2" src="{{ asset('img/foto-kegiatan.png') }}" />
<div class="div-3" ><div class="kategori-cerita" >TENTANG SIDAPUR</div>
<p class="judul-3" >Bukan sekadar memberi makan. Kita saling menguatkan.</p>
<p class="isi-konten-6" >Nasi Darurat mempertemukan kepedulian donatur dengan kebutuhan pangan mahasiswa. Bersama relawan dan dapur komunitas, kita menyiapkan, menyalurkan, dan mendokumentasikan setiap langkah kebaikan.</p>
<div class="tombol-3" ><div class="text-wrapper" >Lebih dekat dengan kami</div>
<div class="vector-wrapper" ><img class="vector-4" src="{{ asset('img/vector-5.svg') }}" /></div></div></div></div>
<div class="alur-berbagi" ><div class="pengantar-bagian" ><div class="judul-dan-pengantar" ><div class="kategori" >SEDERHANA, BERMAKNA</div>
<p class="judul-4" >Dari niat baik, sampai ke meja makan.</p></div></div>
<div class="langkah-penyaluran" ><div class="langkah-berbagi" ><div class="nomor-langkah" ><div class="text-wrapper" >01</div></div>
<div class="judul-5" >Pilih &amp; berdonasi</div>
<p class="isi-konten-7" >Temukan program, tentukan nominal, dan pilih metode pembayaran.</p></div>
<div class="langkah-berbagi" ><div class="nomor-langkah" ><div class="text-wrapper" >02</div></div>
<div class="judul-5" >Kami siapkan dana</div>
<p class="isi-konten-7" >admin menyiapkan dana untuk membayar harga makanan</p></div>
<div class="langkah-berbagi" ><div class="nomor-langkah" ><div class="text-wrapper" >03</div></div>
<div class="judul-5" >Ikuti kabar kebaikannya</div>
<p class="isi-konten-7" >Lihat dokumentasi penyaluran dan rincian penggunaan dana.</p></div></div></div>
<div class="transparansi-publik" ><div class="pengantar-bagian" ><div class="judul-dan-pengantar" ><div class="kategori" >TERBUKA UNTUK DIPERCAYA</div>
<div class="judul-4" >Setiap rupiah punya cerita.</div>
<p class="isi-konten-6" >Ringkasan anggaran September 2026 • seluruh angka adalah data ilustrasi.</p></div>
<div class="tombol-2" ><div class="text-wrapper" >Lihat laporan anggaran</div>
<div class="vector-wrapper" ><img class="vector-4" src="{{ asset('img/vector-10.svg') }}" /></div></div></div>
<div class="ringkasan-dana" ><div class="ringkasan-angka" ><div class="label-ringkasan" ><div class="isi-konten-8" >Donasi masuk</div>
<div class="vector-wrapper" ><img class="vector-4" src="{{ asset('img/vector-4.svg') }}" /></div></div>
<div class="judul-6" >Rp48.000.000</div>
<div class="isi-konten-3" >total donasi masuk</div></div>
<div class="ringkasan-angka" ><div class="label-ringkasan" ><div class="isi-konten-8" >Dana tersalurkan</div>
<div class="vector-wrapper" ><img class="vector-4" src="{{ asset('img/vector-3.svg') }}" /></div></div>
<div class="judul-6" >Rp39.600.000</div>
<div class="isi-konten-3" >82,5% dari donasi masuk</div></div>
<div class="ringkasan-angka" ><div class="label-ringkasan" ><div class="isi-konten-8" >Saldo program</div>
<div class="vector-wrapper" ><img class="vector-5" src="{{ asset('img/image.svg') }}" /></div></div>
<div class="judul-6" >Rp8.400.000</div>
<div class="isi-konten-3" >Untuk penyaluran berikutnya</div></div></div>
<div class="section" ><div class="container" ><div class="div" ><div class="text-wrapper-2" >Penyaluran Bantuan per Kampus</div></div>
<div class="div" ><p class="september-total" >September 2026 · total bantuan tersalurkan ke mahasiswa Rp 36.000.000 (makanan, obat &amp; logistik) · 17 kampus · data ilustrasi</p></div></div>
<div class="img-perbandingan" ><div class="background" ></div>
<div class="background-2" ></div></div>
<div class="margin" ><div class="container-2" ><div class="container-3" ><div class="background-3" ></div>
<p class="text-wrapper-3" >Kampus di Purwokerto (11 kampus)</p></div>
<div class="div-2" ><div class="text-wrapper-4" >Rp 30.300.000 · 84,2%</div></div></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><div class="text-wrapper-5" >Universitas Jenderal Soedirman (Unsoed)</div></div>
<div class="background-wrapper" ><div class="background-4" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 9.200.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 25,6%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><p class="text-wrapper-8" >Universitas Islam Negeri Prof. K.H. Saifuddin Zuhri (UIN<br/>Saizu)</p></div>
<div class="background-5" ><div class="background-6" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 5.400.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 15,0%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><div class="text-wrapper-5" >Universitas Muhammadiyah Purwokerto (UMP)</div></div>
<div class="background-5" ><div class="background-7" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 4.300.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 11,9%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><div class="text-wrapper-5" >Telkom University Purwokerto</div></div>
<div class="background-5" ><div class="background-8" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 3.100.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 8,6%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><div class="text-wrapper-5" >Universitas Amikom Purwokerto</div></div>
<div class="background-5" ><div class="background-9" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 2.500.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 6,9%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><div class="text-wrapper-5" >Universitas Wijayakusuma (Unwiku)</div></div>
<div class="background-5" ><div class="background-10" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 1.600.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 4,4%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><div class="text-wrapper-5" >Universitas Harapan Bangsa (UHB)</div></div>
<div class="background-5" ><div class="background-11" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 1.200.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 3,3%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><p class="text-wrapper-8" >Universitas Bina Sarana Informatika (UBSI) Kampus<br/>Purwokerto</p></div>
<div class="background-5" ><div class="background-12" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 900.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 2,5%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><p class="text-wrapper-5" >Universitas Nahdlatul Ulama (UNU) Purwokerto</p></div>
<div class="background-5" ><div class="background-13" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 800.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 2,2%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><p class="text-wrapper-5" >Poltekkes Kemenkes Semarang (Kampus Purwokerto)</p></div>
<div class="background-5" ><div class="background-14" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 700.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 1,9%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><div class="text-wrapper-5" >Universitas Terbuka (UT) Purwokerto</div></div>
<div class="background-5" ><div class="background-15" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 600.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 1,7%</span></p></div></div>
<div class="margin" ><div class="container-4" ><div class="container-3" ><div class="background-16" ></div>
<p class="text-wrapper-3" >Kampus di Purbalingga (PBG) (6 kampus)</p></div>
<div class="div-2" ><div class="text-wrapper-4" >Rp 5.700.000 · 15,8%</div></div></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><p class="text-wrapper-5" >Fakultas Teknik Unsoed (Kampus Blater)</p></div>
<div class="background-5" ><div class="background-17" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 1.900.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 5,3%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><p class="text-wrapper-5" >UIN Saizu Kampus 2 Purbalingga</p></div>
<div class="background-5" ><div class="background-18" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 1.300.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 3,6%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><div class="text-wrapper-5" >Universitas Perwira Purbalingga (UNPERBA)</div></div>
<div class="background-5" ><div class="background-19" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 1.000.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 2,8%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><div class="text-wrapper-5" >STIE YPPI Purbalingga</div></div>
<div class="background-5" ><div class="background-20" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 600.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 1,7%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><div class="text-wrapper-5" >STKIP Purbalingga</div></div>
<div class="background-5" ><div class="background-21" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 500.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 1,4%</span></p></div></div>
<div class="horizontal-border" ><div class="div-wrapper" ><div class="text-wrapper-5" >Politeknik Purbalingga</div></div>
<div class="background-5" ><div class="background-22" ></div></div>
<div class="rp-wrapper" ><p class="rp" ><span class="span" >Rp 400.000</span>
<span class="text-wrapper-6" >&nbsp;</span>
<span class="text-wrapper-7" >· 1,1%</span></p></div></div></div></div></div>
<div class="div" ><div class="ulasan-komunitas" ><div class="pengantar-bagian" ><div class="judul-dan-pengantar" ><div class="kategori" >SUARA KEBAIKAN</div>
<p class="judul-4" >Yang terasa, bukan hanya yang tercatat.</p>
<p class="isi-konten-6" >Contoh ulasan dari sudut pandang donatur dan relawan.</p></div></div>
<div class="kumpulan-ulasan" ><div class="ulasan" ><div class="penilaian" >★★★★★</div>
<p class="isi-konten-9" >“Bisa melihat kabar penyaluran membuat saya merasa dekat dengan orang-orang yang dibantu.”</p>
<div class="penulis-ulasan" ><div class="avatar-penulis" ><div class="inisial" >AP</div></div>
<div class="identitas-penulis" ><div class="isi-konten-10" >Ayu P.</div>
<div class="isi-konten-3" >Donatur • contoh ulasan</div></div></div></div>
<div class="ulasan" ><div class="penilaian" >★★★★★</div>
<p class="isi-konten-9" >“Di dapur ini, kami berbagi pekerjaan, cerita, dan rasa peduli yang sama.”</p>
<div class="penulis-ulasan" ><div class="avatar-penulis" ><div class="inisial" >BS</div></div>
<div class="identitas-penulis" ><div class="isi-konten-10" >Bima S.</div>
<div class="isi-konten-3" >Relawan • contoh ulasan</div></div></div></div></div></div></div>
<div class="div" ><div class="informasi-dan-tautan" ><div class="tautan-situs" ><div class="identitas-dan-sosial" ><div class="identitas-nasi" ><div class="lambang-program" ><div class="soup" ><img class="vector" src="{{ asset('img/vector-2.svg') }}" /></div></div>
<div class="div-2" ><div class="nama" >nasi darurat</div>
<div class="semboyan" >KEBAIKAN DALAM SEPORSI NASI</div></div></div>
<p class="isi-konten-7" >Seporsi makanan, sebuah kepedulian. Ruang bersama untuk menghadirkan harapan melalui makanan layak.</p>
<div class="tautan-instagram" ><div class="vector-wrapper" ><img class="vector-6" src="{{ asset('img/vector-8.svg') }}" /></div>
<div class="isi-konten-11" >Instagram Nasi Darurat ↗</div></div></div>
<div class="kelompok-tautan" ><div class="kategori-tautan" >Jelajahi</div>
<div class="tautan" >Program &amp; penerima</div>
<div class="tautan" >Tentang Nasi Darurat</div>
<div class="tautan" >Transparansi anggaran</div>
<div class="tautan" >Artikel &amp; dokumentasi</div></div>
<div class="kelompok-tautan" ><div class="kategori-tautan" >Terlibat</div>
<div class="tautan" >Jadi donatur</div>
<div class="tautan" >Kolaborasi</div>
<div class="tautan" >Ulasan komunitas</div>
<div class="tautan" >Hubungi kami</div></div>
<div class="kelompok-tautan" ><div class="kategori-tautan" >Informasi</div>
<div class="tautan" >Syarat dan ketentuan</div>
<div class="tautan" >Kebijakan privasi</div>
<div class="tautan" >Pusat bantuan</div>
<div class="tautan" >Bahasa Indonesia ⌄</div></div></div>
<div class="pemisah" ></div>
<div class="catatan-situs" ><p class="isi-konten-12" >© 2026 Nasi Darurat. Kebaikan dalam seporsi nasi.</p>
<p class="isi-konten-12" >Mockup visual • angka, penerima, dan konten merupakan ilustrasi.</p></div></div></div></div>
</body>
</html>
