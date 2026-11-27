<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/beranda', [HomeController::class, 'index'])->name('home.alias');

Route::get('/tentang', [HomeController::class, 'about'])->name('about');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about.alias');

Route::get('/transparansi', [HomeController::class, 'transparency'])->name('transparency');

Route::get('/hubungi', [HomeController::class, 'contact'])->name('contact');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact.alias');
Route::post('/hubungi', [HomeController::class, 'contactStore'])->name('contact.store');

// Aid Request (Ajukan Bantuan - Penerima)
Route::get('/ajukan', [HomeController::class, 'aidCreate'])->name('aid.create');
Route::get('/ajukan-bantuan', [HomeController::class, 'aidCreate'])->name('aid.create.alias');
Route::post('/ajukan', [HomeController::class, 'aidStore'])->name('aid.store');

// Donation (Bantu Donasi - Pemberi Donasi)
Route::get('/bantu', [HomeController::class, 'donationCreate'])->name('donation.create');
Route::get('/donasi', [HomeController::class, 'donationCreate'])->name('donation.create.alias');
Route::post('/bantu', [HomeController::class, 'donationStore'])->name('donation.store');

// Alias tambahan agar URL /masuk dan /daftar tetap bisa diakses
Route::get('/masuk', function () {
    return redirect()->route('login');
})->name('login.alias');

Route::get('/daftar', function () {
    return redirect()->route('register');
})->name('register.alias');

// POV 1: User Dashboard & Riwayat (Satu role user: bisa donasi & ajukan bantuan)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/riwayat-donasi', [UserDashboardController::class, 'donorDonations'])
        ->name('user.donations');
    Route::get('/riwayat-bantuan', [UserDashboardController::class, 'recipientAidRequests'])
        ->name('user.aid-requests');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// POV 2: Admin Pengurus Nasi Darurat
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('/pengajuan-bantuan', [AdminController::class, 'aidRequests'])->name('aid-requests');
        Route::patch('/pengajuan-bantuan/{aidRequest}', [AdminController::class, 'updateAidStatus'])->name('aid-requests.update');

        Route::get('/donasi', [AdminController::class, 'donations'])->name('donations');
        Route::patch('/donasi/{donation}', [AdminController::class, 'updateDonationStatus'])->name('donations.update');

        Route::get('/keuangan', [AdminController::class, 'finances'])->name('finances');
        Route::post('/keuangan', [AdminController::class, 'storeFinance'])->name('finances.store');

        Route::get('/pengguna', [AdminController::class, 'users'])->name('users');
        Route::patch('/pengguna/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    });
