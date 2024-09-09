<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [SiswaController::class, 'guestIndex'])->name('welcome');

// Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
// Route::post('/login', [AuthenticatedSessionController::class, 'store']);
// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('/siswas');
    })->name('dashboard');

    // rute siswa
    Route::get('/siswas', [SiswaController::class, 'index'])->name('siswas.index');
    Route::get('/siswas/create', [SiswaController::class, 'create'])->name('siswas.create');
    Route::post('/siswas', [SiswaController::class, 'store'])->name('siswas.store');
    Route::get('/siswas/{siswa}', [SiswaController::class, 'show'])->name('siswas.show');
    Route::get('/siswas/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswas.edit');
    Route::put('/siswas/{siswa}', [SiswaController::class, 'update'])->name('siswas.update');
    Route::delete('/siswas/{siswa}', [SiswaController::class, 'destroy'])->name('siswas.destroy');

    // rute kelas
    // Route::get('/kelas', [SchoolClassController::class, 'index'])->name('kelas.index');
    // Route::get('/kelas/{id}', [SchoolClassController::class, 'show'])->name('kelas.show');
    Route::resource('classes', SchoolClassController::class);
    Route::get('/classes/create', [SchoolClassController::class, 'create'])->name('classes.create');
    Route::post('/classes', [SchoolClassController::class, 'store'])->name('classes.store');
    Route::get('/classes/{class}', [SchoolClassController::class, 'show'])->name('classes.show');
    Route::get('/classes/{class}/edit', [SchoolClassController::class, 'edit'])->name('classes.edit');
    Route::put('/classes/{class}', [SchoolClassController::class, 'update'])->name('classes.update');
    Route::delete('/classes/{class}', [SchoolClassController::class, 'destroy'])->name('classes.destroy');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

require __DIR__ . '/auth.php';
