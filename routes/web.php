<?php

use App\Http\Controllers\AssignmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserImportController;
use App\Http\Controllers\Auth\RegisteredUserController;
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
    // Admin Dashboard
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('admin.dashboard');

    // Lecture Register
    Route::get('/register-dosen', [RegisteredLectureController::class, 'create'])->name('register-dosen');;
    Route::post('/register-dosen', [RegisteredLectureController::class, 'store']);

    // Student Register
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::name('admin.')->prefix('admin')->group(function () {
        // Manage Student
        Route::resource('student', StudentController::class);

        // Manage Lecture
        Route::resource('lecture', LectureController::class);

        // Manage Assistant
        Route::resource('assistant', AssistantController::class);

        // Manage Course
        Route::resource('course', CourseController::class);

        // Manage Classroom
        Route::resource('classroom', ClassroomController::class);

        // Show Student on Classroom
        Route::get('classroom/{idClassroom}/student', [ClassroomController::class, 'showStudentAdmin']);

        // Manage Assignemnt by on Classroom
        Route::resource('classroom/{idClassroom}/assignment', AssignmentController::class);
        Route::put('force-submit/{id}', [AssignmentController::class, 'forceSubmit'])->name('force-submit');
        Route::get('download-tugas/{id}', [AssignmentController::class, 'downloadtask'])->name('download-tugas');

        // Show Log by Student on Classroom
        Route::get('classroom/{idClassroom}/student/{idStudent}/log', [RoomLogController::class, 'logByClass']);

        // Manage Class Information
        Route::resource('classroom/{idClassroom}/class-information', ClassInformationController::class);

        // Assignment
        Route::get('download-tugas/{id}', [AssignmentController::class, 'downloadTugas'])->name('download-tugas');

        // Show All Log
        Route::get('log', [RoomLogController::class, 'logAll']);
    });
});
// End Admin Space Routing

// Lecture Space Routing
Route::group(['middleware' => ['role:lecture', 'auth']], function () {
    Route::name('lecture.')->prefix('lecture')->group(function () {
        // Dashboard Lecture
        Route::get('/', [LectureController::class, 'dashboard'])->name('dashboard');

        // Manage Student
        Route::resource('student', StudentController::class);
 
        // Manage Task
        Route::resource('task', TaskController::class);
        Route::get('lecture', [StudentController::class, 'indexLecture'])->name('lecture-student-index');
        Route::post('auto-zero/{id}', [StudentController::class, 'autoZero'])->name('autoZero');

        // Manage Classroom
        Route::get('classroom', [ClassroomController::class, 'index'])->name('index');

        // Show Student on Classroom
        Route::get('classroom/{idClassroom}/student', [ClassroomController::class, 'showStudent']);
        
        // Show Log by Student on Classroom
        Route::get('classroom/{idClassroom}/student/{idStudent}/log', [RoomLogController::class, 'logByClass']);

        // Manage Class Information
        Route::resource('classroom/{idClassroom}/class-information', ClassInformationController::class);

        // Manage Assignemnt by on Classroom
        Route::resource('classroom/{idClassroom}/assignment', AssignmentController::class);
        Route::put('force-submit/{id}', [AssignmentController::class, 'forceSubmit'])->name('force-submit');
        Route::get('download-tugas/{id}', [AssignmentController::class, 'downloadtask'])->name('download-tugas');

        // Show All Log
        Route::get('log', [RoomLogController::class, 'logAll']);
    });
});
// End Lecture Space Routing

// Student Space Routing
Route::group(['middleware' => ['role:student', 'auth']], function () {
    // Student Dashboard
    Route::get('student', [StudentController::class, 'dashboard'])->name('student.dashboard');

    Route::get('/history', [RoomLogController::class, 'index']);
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
    route::name('assistant.')->prefix('assistant')->group(function () {
        // Dashboard Assistant
        Route::get('/', [AssistantController::class, 'dashboard'])->name('dashboard');
    });
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
