<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Public routes - Figma screens
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/beranda', [HomeController::class, 'index'])->name('home.alias');

Route::get('/tentang', [HomeController::class, 'about'])->name('about');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about.alias');

Route::get('/transparansi', [HomeController::class, 'transparency'])->name('transparency');

Route::get('/hubungi', [HomeController::class, 'contact'])->name('contact');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact.alias');
Route::post('/hubungi', [HomeController::class, 'contactStore'])->name('contact.store');

// Aid Request (Ajukan Bantuan)
Route::get('/ajukan', [HomeController::class, 'aidCreate'])->name('aid.create');
Route::get('/ajukan-bantuan', [HomeController::class, 'aidCreate'])->name('aid.create.alias');
Route::post('/ajukan', [HomeController::class, 'aidStore'])->name('aid.store');

// Donation (Bantu Donasi)
Route::get('/bantu', [HomeController::class, 'donationCreate'])->name('donation.create');
Route::get('/donasi', [HomeController::class, 'donationCreate'])->name('donation.create.alias');
Route::post('/bantu', [HomeController::class, 'donationStore'])->name('donation.store');

// Authentication pages matching SIDAPUR design
Route::get('/masuk', [HomeController::class, 'login'])->name('login');
Route::get('/login', [HomeController::class, 'login'])->name('login.alias');

Route::get('/daftar', [HomeController::class, 'register'])->name('register');
Route::get('/register', [HomeController::class, 'register'])->name('register.alias');

Route::get('/dashboard', function () {
    return redirect()->route('home')->with('info', 'Selamat datang di SIDAPUR.');
})->name('dashboard');
