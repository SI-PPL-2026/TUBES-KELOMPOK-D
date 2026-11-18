<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/beranda', function () {
    return view('beranda-sidapur');
})->name('beranda-sidapur');

Route::get('/ajukan', function () {
    return view('ajukan-bantuan');
})->name('ajukan-bantuan');

Route::get('/bantu', function () {
    return view('bantu-donasi');
})->name('bantu-donasi');

Route::get('/transparansi', function () {
    return view('transparansi');
})->name('transparansi');

route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

route::get('/hubungi', function () {
    return view('hubungi');
})->name('hubungi');