<?php

namespace App\Http\Controllers;

use App\Models\ActivateToken;
use App\Models\Assignment;
use App\Models\ClassManagement;
use App\Models\Classroom;
use App\Models\ContactAssistant;
use App\Models\Course;
use App\Models\Task;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        // Retrieve all class management records for the user with associated classrooms
        $classManagements = ClassManagement::where('id_student', $user->id)->with('classroom')->get();

        // Extract the associated classrooms from the collection
        $classrooms = $classManagements->pluck('classroom');

        $var_names = [
            'user', 'classrooms'
        ];
        return view('student.dashboard', compact($var_names));
    }

    public function detailClass($id)
    {
        $user = auth()->user();

        $studentTask = $user->taskScore->whereNotNull('final_score');
        $task = $user->task;

        // # to display student course
        // $coursees = Course::where('id', $user->id_course)->withCount('users')->get();
        // $member_count = $coursees->sum('users_count');

        # to display student assignment by classroom
        $assignments = Assignment::where('id_classroom', $id)->with(['course.users.task' => function ($q) {
            $q->where('id_student', auth()->user()->id);
        }])->get();


        $classroom = Classroom::where('id', $id)->first();

        $course = $classroom->course;

        $var_names = [
            'task', 'studentTask', 'assignments', 'classroom', 'course'
        ];

        return view('student.classDetail', compact($var_names));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin(Request $request)
    {
        $search = $request->search ?? "";
        $per_page = $request->per_page ?? 10;
        $students = User::role('student')->with('assistant')
        ->with(['taskScore' => function ($q) {
            $q->whereNotNull('final_score');
        }])
        ->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('code', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
        })
        ->paginate($per_page);

        return view('admin.student.index', compact('students'));
    }

    public function indexLecture(Request $request)
    {
        $search = $request->search ?? "";
        $per_page = $request->per_page ?? 10;
        $students = User::role('student')->with('assistant')
        ->with(['taskScore' => function ($q) {
            $q->whereNotNull('final_score');
        }])
        ->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('code', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
        })
        ->paginate($per_page);

        return view('lecture.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = [
                // 'id_course' => $request->course,
                // 'id_asisten' => $request->assistant,
                'code' => $request->nim,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('password'),
            ];

            $user = User::create($data);
            $user->assignRole('student');

            return response()->redirectToRoute('admin.admin-student-index');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = User::find($id);
        // $courses = Course::all();
        // $assistants = ContactAssistant::all();

        return view('admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            User::updateOrCreate(
                ['id' => $id],
                $request->all()
            );
            return redirect()->back()->with('success', 'Berhasil Update Data Mahasiswa');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            return redirect()->back()->with('success', 'Berhasil Hapus Data Mahasiswa');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }

    function showMateriDipelajari()
    {
        return view('student.materiDipelajari');
    }

    function showMateriDiselesaikan()
    {
        return view('student.materiDiselesaikan');
    }

    function showKumpulkantask()
    {
        return view('student.kumpulkantask');
    }

    function showDaftarNilai()
    {
        return view('student.daftarNilai');
    }

    function showKontakAsisten()
    {
        return view('student.kontakAsisten');
    }

    function showTaskDetail($id) {
        $assignment = Assignment::find($id);
        $description = str_replace('<br />', "\n", $assignment->description);
        // $description = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $description);
        // dd($description);
        $task = null;
        if (auth()->user()->task !== null) {
            $task = auth()->user()->task->where('id_student', auth()->user()->id)->where('id_assignment', $id)->first();
        }
        return view('student.taskDetail', compact('assignment', 'task', 'description'));
    }

    // public function updateCourse(Request $request)
    // {
    //     // Mendapatkan user yang terautentikasi
    //     $user = auth()->user();

    //     // Validasi data yang dikirimkan
    //     $request->validate([
    //         'id_course' => 'required|numeric', // Anda dapat menambahkan validasi sesuai kebutuhan
    //     ]);

    //     User::updateOrCreate(
    //         ['id' => auth()->id()], // Kriteria pencarian, misalnya berdasarkan ID pengguna yang terautentikasi
    //         ['id_course' => $request->id_course]
    //     );

    //     return redirect()->back()->with('success', 'Anda sudah terdaftar pada kursus ini.');
    // }

    public function updateClassroom(Request $request)
    {
        // Validasi data yang dikirimkan
        $validator = Validator::make($request->all(), [
            'id_course' => 'required|numeric',
            'id_classroom' => 'required|numeric',
            'token' => 'required',
        ]);
        $validator->validate();

         // validate token
        if(empty(ActivateToken::where('token', $request->token)->first())) {
            return redirect()->back();
        }

        // Update or create the user record
        ClassManagement::create(
            [
                'id_classroom' => $request->id_classroom,
                'id_student' => auth()->id(),
            ]
        );

        // Update or create the classroom record and decrement the quota
        Classroom::updateOrCreate(
            ['id' => $request->id_classroom],
            ['quota' => DB::raw('quota - 1')]
        );

        // delete existing token
        DB::table('activate_tokens')
            ->where('token', $request->token)
            ->delete();
            
        return redirect()->back()->with('success', 'Anda sudah terdaftar pada kelas ini!');
    }

    public function autoZero(Request $request, $id) {
        try {
            $student = User::find($request->id_student);

            $validator = Validator::make($request->all(), [
                'id_student' => 'required',
                'id_course' => 'required',
            ]);
            $validator->validate();

            Task::updateOrCreate([
                'id_student' => $request->id_student,
                'id_course' => $request->id_course,
                'id_assignment' => $id,
            ], [
                'task_file' => '-',
                'final_score'=> '0',
                'status' => '1',
            ]);

            return redirect()->back()->with('success', 'Berhasil Melakukan Aksi');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }
}
