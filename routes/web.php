<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OptimasiController;
use App\Http\Controllers\OptimasiTanpaHargaController;
use Illuminate\Support\Facades\Route;
use App\Models\BBuah;
use App\Models\BLaukPauk;
use App\Models\BPokok;
use App\Models\BSayur;

// Route::get('/', function () {
//     $viewData = [
//         'tblBahanPokok' => BPokok::all(),
//         'tblBahanLauk' => BLaukPauk::all(),
//         'tblBahanSayur' => BSayur::all(),
//         'tblBahanBuah' => BBuah::all(),
//     ];
//     return view('welcome', $viewData);
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/impact', [HomeController::class, 'impact'])->name('impact');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/optimasi-gizi', [HomeController::class, 'optimasi'])->name('optimasi-gizi');

Route::post('/optimasi', [OptimasiController::class, 'optimasi'])->name('optimasi');
Route::post('/optimasi-gizi', [OptimasiTanpaHargaController::class, 'optimasi'])->name('optimasi-gizi');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
