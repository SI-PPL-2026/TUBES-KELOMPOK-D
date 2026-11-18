<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenerimaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman Utama & Tampilan Figma SIDAPUR
|--------------------------------------------------------------------------
*/
// Beranda dengan data live
Route::get('/', [HomeController::class, 'beranda'])->name('home');
Route::get('/beranda', [HomeController::class, 'beranda'])->name('beranda-sidapur');

// Halaman publik statis
Route::get('/ajukan', function () {
    return view('ajukan-bantuan');
})->name('ajukan-bantuan');

Route::get('/bantu', [HomeController::class, 'bantuDonasi'])->name('bantu-donasi');

Route::get('/transparansi', [HomeController::class, 'transparansiPublik'])->name('transparansi');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/hubungi', function () {
    return view('hubungi');
})->name('hubungi');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Rute Tambahan Fungsional (Dokumentasi, Artikel, Kolaborasi, Ulasan)
|--------------------------------------------------------------------------
*/
Route::get('/artikel', [HomeController::class, 'articles'])->name('articles.index');
Route::get('/artikel/{slug}', [HomeController::class, 'articleDetail'])->name('articles.show');
Route::get('/dokumentasi', [HomeController::class, 'documentations'])->name('documentations.index');
Route::get('/kolaborasi', [HomeController::class, 'collaboration'])->name('collaboration');
Route::post('/kolaborasi', [HomeController::class, 'submitCollaboration'])->name('collaboration.submit');
Route::get('/ulasan', [HomeController::class, 'reviews'])->name('reviews.index');
Route::post('/ulasan', [HomeController::class, 'storeReview'])->name('reviews.store');
Route::get('/syarat-ketentuan', [HomeController::class, 'terms'])->name('terms');
Route::get('/kebijakan-privasi', [HomeController::class, 'privacy'])->name('privacy');

/*
|--------------------------------------------------------------------------
| Authentication Routes (Masuk & Daftar)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/masuk', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/masuk', [AuthController::class, 'login'])->name('login.post');
    Route::get('/daftar', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/daftar', [AuthController::class, 'register'])->name('register.post');
});
Route::post('/keluar', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Penerima Bantuan Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:penerima'])->prefix('penerima')->name('penerima.')->group(function () {
    Route::get('/dashboard', [PenerimaController::class, 'dashboard'])->name('dashboard');
    Route::get('/bantuan/ajukan', [PenerimaController::class, 'create'])->name('create');
    Route::post('/bantuan/ajukan', [PenerimaController::class, 'store'])->name('store');
    Route::get('/bantuan/{aidRequest}', [PenerimaController::class, 'show'])->name('show');
    Route::get('/bantuan/{aidRequest}/edit', [PenerimaController::class, 'edit'])->name('edit');
    Route::put('/bantuan/{aidRequest}', [PenerimaController::class, 'update'])->name('update');
    Route::post('/bantuan/{aidRequest}/batal', [PenerimaController::class, 'cancel'])->name('cancel');
    Route::get('/profil', [PenerimaController::class, 'profile'])->name('profile');
    Route::post('/profil', [PenerimaController::class, 'updateProfile'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Donatur Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:donatur'])->prefix('donatur')->name('donatur.')->group(function () {
    Route::get('/dashboard', [DonaturController::class, 'dashboard'])->name('dashboard');
    Route::get('/donasi/titip', [DonaturController::class, 'create'])->name('create');
    Route::post('/donasi/titip', [DonaturController::class, 'store'])->name('store');
    Route::get('/donasi/{donation}', [DonaturController::class, 'show'])->name('show');
    Route::get('/profil', [DonaturController::class, 'profile'])->name('profile');
    Route::post('/profil', [DonaturController::class, 'updateProfile'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Panel Pengelola)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Pengajuan Bantuan (US-13)
    Route::get('/pengajuan', [AdminController::class, 'aidRequests'])->name('aid_requests.index');
    Route::get('/pengajuan/{aidRequest}', [AdminController::class, 'aidRequestDetail'])->name('aid_requests.show');
    Route::post('/pengajuan/{aidRequest}/status', [AdminController::class, 'updateAidRequestStatus'])->name('aid_requests.status');

    // Donasi Masuk (US-14)
    Route::get('/donasi', [AdminController::class, 'donations'])->name('donations.index');
    Route::get('/donasi/{donation}', [AdminController::class, 'donationDetail'])->name('donations.show');
    Route::post('/donasi/{donation}/verifikasi', [AdminController::class, 'verifyDonation'])->name('donations.verify');

    // Keuangan Kas (US-15)
    Route::get('/keuangan', [AdminController::class, 'finances'])->name('finances.index');
    Route::post('/keuangan', [AdminController::class, 'storeFinance'])->name('finances.store');

    // Metode Pembayaran (US-16)
    Route::get('/metode-pembayaran', [AdminController::class, 'paymentMethods'])->name('payment_methods.index');
    Route::post('/metode-pembayaran', [AdminController::class, 'storePaymentMethod'])->name('payment_methods.store');
    Route::put('/metode-pembayaran/{paymentMethod}', [AdminController::class, 'updatePaymentMethod'])->name('payment_methods.update');
    Route::delete('/metode-pembayaran/{paymentMethod}', [AdminController::class, 'destroyPaymentMethod'])->name('payment_methods.destroy');

    // Manajemen Pengguna (US-12)
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');

    // Artikel Kegiatan (US-27)
    Route::get('/artikel', [AdminController::class, 'articles'])->name('articles.index');
    Route::post('/artikel', [AdminController::class, 'storeArticle'])->name('articles.store');
    Route::delete('/artikel/{article}', [AdminController::class, 'destroyArticle'])->name('articles.destroy');

    // Dokumentasi (US-26)
    Route::get('/dokumentasi', [AdminController::class, 'documentations'])->name('documentations.index');
    Route::post('/dokumentasi', [AdminController::class, 'storeDocumentation'])->name('documentations.store');
    Route::delete('/dokumentasi/{documentation}', [AdminController::class, 'destroyDocumentation'])->name('documentations.destroy');

    // Mitra & Kolaborasi (US-35)
    Route::get('/mitra', [AdminController::class, 'partners'])->name('partners.index');
    Route::post('/mitra/{partner}/status', [AdminController::class, 'updatePartnerStatus'])->name('partners.status');
    Route::delete('/mitra/{partner}', [AdminController::class, 'destroyPartner'])->name('partners.destroy');

    // Moderasi Ulasan (US-34)
    Route::get('/ulasan', [AdminController::class, 'reviews'])->name('reviews.index');
    Route::post('/ulasan/{review}/toggle', [AdminController::class, 'toggleReviewVisibility'])->name('reviews.toggle');
    Route::delete('/ulasan/{review}', [AdminController::class, 'destroyReview'])->name('reviews.destroy');
});
