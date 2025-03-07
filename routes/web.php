<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\User\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\DosenController;
use App\Http\Controllers\User\MahasiswaController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/fail404', function () {
    return Inertia::render('404', [
        'title' => '404',
    ]);
})->name('fail404');


Route::prefix('/')->middleware(['auth', 'role:2', 'verified'])->group(function () {
    Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::get('/matkul', [MahasiswaController::class, 'matkul'])->name('mahasiswa.matkul');
});

Route::prefix('/dosen')->middleware(['auth', 'role:3', 'verified'])->group(function () {
    Route::get('/', [DosenController::class, 'index'])->name('dosen');
    Route::get('/matkul-diajar', [DosenController::class, 'matkul_diajar'])->name('dosen.matkul.diajar');
});

Route::prefix('admin')->middleware(['auth', 'role:1', 'verified'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    // dosen
    Route::get('/dosen', [AdminController::class, 'dosen'])->name('admin.dosen');
    Route::post('/dosen', [DosenController::class, 'store'])->name('admin.dosen.store');
    Route::patch('/dosen/{id}', [DosenController::class, 'update'])->name('admin.dosen.update');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('admin.dosen.destroy');

    // mahasiswa
    Route::get('/mahasiswa', [AdminController::class, 'mahasiswa'])->name('admin.mahasiswa');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('admin.mahasiswa.store');
    Route::patch('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('admin.mahasiswa.update');
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('admin.mahasiswa.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // absensi
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('dosen.absensi.store');
    Route::post('/api/absensi', [AbsensiController::class, 'store_qr'])->name('mahasiswa.absensi.store');
    Route::post('/buka_absen', [AbsensiController::class, 'buka_absen'])->name('dosen.buka_absen');
    Route::post('/tutup_absen', [AbsensiController::class, 'tutup_absen'])->name('dosen.tutup_absen');
 
});

require __DIR__ . '/auth.php';
