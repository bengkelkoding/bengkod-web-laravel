<?php

use App\Http\Controllers\Admin\AssignmentAdminController;
use App\Http\Controllers\AssignmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserImportController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ContactAssistantController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\Auth\RegisteredLectureController;
use App\Http\Controllers\ClassInformationController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\RoomLogController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaskController;
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
        Route::resource('student', StudentController::class);
        Route::get('student', [StudentController::class, 'indexAdmin'])->name('admin-student-index');
        Route::resource('lecture', LectureController::class);
        Route::get('lecture', [LectureController::class, 'indexAdmin'])->name('admin-lecture-index');
        Route::get('course', [CourseController::class, 'admin']);
        Route::resource('assignment', AssignmentAdminController::class);
        Route::get('download-tugas/{id}', [AssignmentController::class, 'downloadTugas'])->name('download-tugas');
        Route::resource('classroom', ClassroomController::class);
        Route::get('classroom', [ClassroomController::class, 'indexAdmin'])->name('admin-classroom');
        Route::resource('assistant', AssistantController::class);
        Route::get('assistant', [AssistantController::class, 'indexAdmin'])->name('admin-assistant-index');
        Route::get('classroom/{idClassroom}/student', [ClassroomController::class, 'showStudentAdmin']);
        Route::get('classroom/{idClassroom}/student/{idStudent}/log', [RoomLogController::class, 'logByClass']);
        Route::resource('classroom/{idClassroom}/class-information', ClassInformationController::class);
        Route::get('log', [RoomLogController::class, 'logAll']);
    });
});
// End Admin Space Routing

// Lecture Space Routing
Route::group(['middleware' => ['role:lecture', 'auth']], function () {
    Route::get('daftar-kelola', [LectureController::class, 'showDaftarDanKelolastudent']);
    Route::get('daftar-materi', [LectureController::class, 'showDaftarMateri']);
    Route::get('log-aktivitas', [LectureController::class, 'showLogAktivitas']);
    Route::get('kontak-asisten', [LectureController::class, 'showKontakAsisten']);
    Route::name('lecture.')->prefix('lecture')->group(function () {
        Route::get('/', [LectureController::class, 'index'])->name('index');
        Route::resource('student', StudentController::class);
        Route::get('lecture', [StudentController::class, 'indexLecture'])->name('lecture-student-index');
        Route::post('auto-zero/{id}', [StudentController::class, 'autoZero'])->name('autoZero');

        // Route::resource('assign', AssignController::class);
        // Route::resource('assignincomplete', AssignInCompleteController::class);
        // Route::resource('assigncomplete', AssignCompleteController::class);

        Route::resource('assignment', \App\Http\Controllers\AssignmentController::class);
        Route::put('force-submit/{id}', [AssignmentController::class, 'forceSubmit'])->name('force-submit');
        Route::get('download-tugas/{id}', [AssignmentController::class, 'downloadtask'])->name('download-tugas');
        Route::get('classroom', [ClassroomController::class, 'indexLecture'])->name('lecture-classroom');
        Route::get('classroom/{idClassroom}/student', [ClassroomController::class, 'showStudent']);
        Route::get('classroom/{idClassroom}/student/{idStudent}/log', [RoomLogController::class, 'logByClass']);
        Route::get('classroom/{idClassroom}/assignment', [AssignmentController::class, 'index']);
        Route::get('classroom/{idClassroom}/assignment/store', [AssignmentController::class, 'create2']);
        Route::get('classroom/{idClassroom}/assignment/{idAssignment}', [AssignmentController::class, 'show2'])->name('assignment-list');
        Route::get('log', [RoomLogController::class, 'logAll']);
        Route::resource('task', TaskController::class);
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
    Route::post('simpan-tugas/{id}', [TaskController::class, 'store'])->name('simpan-tugas');
    Route::post('submit-tugas/{id}', [TaskController::class, 'submitTask'])->name('submit-tugas');
    Route::get('task-detail/{id}', [StudentController::class, 'showTaskDetail'])->name('task-detail');
    Route::post('/update-course', [StudentController::class, 'updateCourse'])->name('update.kursus');
    Route::post('/update-classroom', [StudentController::class, 'updateClassroom'])->name('update.classroom');
    Route::get('student/class/{id}', [StudentController::class, 'detailClass'])->name('student.detail-class');
});
// End Student Space Routing

// Assistant Space Routing
Route::group(['middleware' => ['role:assistant', 'auth']], function () {
    Route::get('assistant', [AssistantController::class, 'index'])->name('assistant.index');
});
// End assistant Space Routing

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
