<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredDosenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KursusController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home'); //welcome
});

Route::get('/learning', function () {
    return view('learning');
})->name('learning');

Route::get('/activate-token', function () {
    return view('activate-token');
})->name('activate-token');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['verified'])->name('admin.dashboard');

    Route::get('/register-dosen', [RegisteredDosenController::class, 'create'])->name('dosen.create');
    Route::post('/register-dosen', [RegisteredDosenController::class, 'store'])->name('dosen.store');
    // Route::get('/admin', function(){
    //     return 'ini halaman admin via role';
    // });
});

Route::group(['middleware' => ['role:dosen']], function () {
    Route::resource('dosen', DosenController::class);
    // Route::get('/dosen', function(){
        //     return 'ini halaman dosen';
    // });
});

Route::group(['middleware' => ['role:mahasiswa']], function () {
    Route::resource('mahasiswa', MahasiswaController::class);
    // Route::get('/mahasiswa', function(){
    //     return 'ini halaman mhs via role';
    // });
});

Route::get('/kursus', [KursusController::class, 'index']);
Route::get('/kursus/{kursusId}/section/{sectionId}', [KursusController::class, 'showSection']);
Route::get('/kursus/{kursusId}/section/{sectionId}/artikel/{artikelId}', [KursusController::class, 'showArtikel'])->name('kursus.artikel');



// Route::group(['middleware' => ['permission:edit modul|delete modul']], function () {
//     Route::get('/permission', function(){
//         return 'ini halaman ian via permission';
//     });
// });


require __DIR__.'/auth.php';
