<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\UserImportController;
use App\Http\Controllers\Lecture\AssignController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ContactAssistantController;
use App\Http\Controllers\Admin\AssignmentAdminController;
use App\Http\Controllers\Admin\LectureController;
use App\Http\Controllers\Lecture\AssignCompleteController;
use App\Http\Controllers\Lecture\AssignInCompleteController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Models\Course;

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

//  Profile Authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Space Routing
Route::group(['middleware' => ['role:admin', 'auth']], function () {
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('admin.dashboard');

    Route::get('/register-dosen', [RegisteredLectureController::class, 'create'])->name('register-dosen');;
    Route::post('/register-dosen', [RegisteredLectureController::class, 'store']);

    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::get('/', [LectureController::class, 'index']);
        Route::resource('contact-assistant', ContactAssistantController::class);
        Route::resource('student', App\Http\Controllers\Admin\StudentControllerntroller::class);
        Route::resource('lecture', App\Http\Controllers\Admin\LectureController::class);
        Route::resource('log', \App\Http\Controllers\Admin\LogController::class);
        Route::get('course', [CourseController::class, 'admin']);
        Route::resource('assignment', AssignmentAdminController::class);
        Route::get('download-tugas/{id}', [AssignmentController::class, 'downloadTugas'])->name('download-tugas');
    });
});
// End Admin Space Routing

// Lecture Space Routing
Route::group(['middleware' => ['role:dosen', 'auth']], function () {
    Route::get('daftar-kelola', [LectureController::class, 'showDaftarDanKelolastudent']);
    Route::get('daftar-materi', [LectureController::class, 'showDaftarMateri']);
    Route::get('log-aktivitas', [LectureController::class, 'showLogAktivitas']);
    Route::get('kontak-asisten', [LectureController::class, 'showKontakAsisten']);
    Route::name('lecture.')->prefix('lecture')->group(function () {
        Route::get('/', [LectureController::class, 'index'])->name('index');
        Route::resource('student', StudentControllerntroller::class);
        Route::post('auto-zero/{id}', [StudentControllerntroller::class, 'autoZero'])->name('autoZero');
        Route::resource('assign', AssignController::class);
        Route::resource('assignincomplete', AssignInCompleteController::class);
        Route::resource('assigncomplete', AssignCompleteController::class);
        Route::resource('assignment', AssignmentController::class);
        Route::put('force-submit/{id}', [AssignmentController::class, 'forceSubmit'])->name('force-submit');
        Route::get('download-tugas/{id}', [AssignmentController::class, 'downloadTugas'])->name('download-tugas');
        Route::resource('log', \App\Http\Controllers\Lecture\LogController::class);
    });
});
// End Lecture Space Routing

// Student Space Routing
Route::group(['middleware' => ['role:student', 'auth']], function () {
    Route::resource('student', StudentController::class);
    Route::resource('logs', LogController::class);
    Route::get('/history', [\App\Http\Controllers\RoomLogController::class, 'index']);
    Route::get('dipelajari', [StudentController::class, 'showMateriDipelajari']);
    Route::get('diselesaikan', [StudentController::class, 'showMateriDiselesaikan']);
    Route::get('kumpulkan', [StudentController::class, 'showKumpulkanTugas']);
    Route::get('daftar-nilai', [StudentController::class, 'showDaftarNilai']);
    Route::get('kontak', [StudentController::class, 'showKontakAsisten']);
    Route::post('simpan-tugas/{id}', [taskController::class, 'store'])->name('simpan-tugas');
    Route::post('submit-tugas/{id}', [taskController::class, 'submitTugas'])->name('submit-tugas');
    Route::get('detail-tugas/{id}', [StudentController::class, 'showDetailTugas'])->name('detail-tugas');
    Route::post('/update-kursus', [StudentController::class, 'updateKursus'])->name('update.kursus');
});
// End Student Space Routing

// Public Routing
// View Root (Home Page)
Route::get('/', function () {
    $courses = Course::withCount('users')->get();
    return view('home', compact('courses'));
});
// Get Detail Course
Route::get('/course/{id}', [CourseController::class, 'show'])->name('course-detail');
// View Log History
Route::get('/view/history', function () {
    return view('/student/history');
});
// import csv
Route::get('/import', [UserImportController::class, 'showForm']);
Route::post('/import', [UserImportController::class, 'import']);

require __DIR__ . '/auth.php';

// Route::get('/learning', function () {
//     return view('learning');
// })->name('learning');

// Route::get('/activate-token', function () {
//     return view('activate-token');
// })->name('activate-token');

// // Route for kursus / module learning in admin?
// Route::resource('kursus', CourseController::class)->except('edit');
// Route::resource('section', SectionController::class);
// Route::resource('artikel', ArtikelController::class);

// // debuging data kursus
// Route::get('/modul', [ModulController::class, 'index']);
// Route::get('/modul/{kursusId}/section/{sectionId}', [ModulController::class, 'showSection']);
// Route::get('/modul/{kursusId}/section/{sectionId}/artikel/{artikelId}', [ModulController::class, 'showArtikel'])->name('modul.artikel');

// Route::group(['middleware' => ['permission:edit modul|delete modul']], function () {
//     Route::get('/permission', function(){
//         return 'ini halaman ian via permission';
//     });
// });