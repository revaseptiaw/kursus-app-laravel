<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Livewire\InstrukturIndex;
use App\Livewire\Instruktur\Create as InstrukturCreate;
use App\Livewire\Instruktur\Edit as InstrukturEdit;
use App\Livewire\KursusIndex;
use App\Livewire\PendaftaranIndex;
use App\Livewire\LaporanPeserta;
use App\Livewire\Materi\Index as MateriIndex;
use App\Livewire\Materi\Form as MateriForm;
use App\Livewire\Materi\PerKursus;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD
    Route::get('/instruktur', InstrukturIndex::class)->name('instruktur.index');
    Route::get('/kursus', KursusIndex::class)->name('kursus.index');
    Route::get('/pendaftaran', PendaftaranIndex::class)->name('pendaftaran.index');

    // Laporan 
    Route::get('/laporan-peserta', LaporanPeserta::class)->name('laporan.peserta');

    // Materi
    Route::prefix('materi')->name('materi.')->group(function () {
        Route::get('/', MateriIndex::class)->name('index'); // semua materi
        Route::get('/create', MateriForm::class)->name('create'); // form tambah umum
        Route::get('/{materi}/edit', MateriForm::class)->name('edit'); // edit
        Route::delete('/{id}', [MateriController::class, 'destroy'])->name('destroy');

    });

    // Upload dari halaman kursus
    Route::get('/kursus/{kursus}/materi', PerKursus::class)->name('kursus.materi');
});

require __DIR__.'/auth.php';
