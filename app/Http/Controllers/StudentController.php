<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\ContactAssistant;
use App\Models\Course;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $studentTask = $user->taskScore->whereNotNull('final_score');
        $task = $user->task;

        # to display student course
        $coursees = Course::where('id', $user->id_course)->withCount('users')->get();
        $member_count = $coursees->sum('users_count');

        # to display student assignment by course
        $assignments = Assignment::where('id_course', $user->id_course)->with(['course.users.task' => function ($q) {
            $q->where('id_student', auth()->user()->id);
        }])->get();

        # for student contact assistant
        $assistant = User::with('assistant')
            ->where('id', $user->id)->get();

        $var_names = [
            'user', 'member_count', 'task', 'studentTask', 'assistant', 'assignments'
        ];
        return view('student.dashboard', compact($var_names));
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
        return view('admin.student.create', ['courses' => Course::all(), 'assistants' => ContactAssistant::all()]);
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
                'id_course' => $request->course,
                'id_asisten' => $request->assistant,
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
        $courses = Course::all();
        $assistants = ContactAssistant::all();

        return view('admin.student.edit', compact('student', 'courses', 'assistants'));
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
                $request->all(),
            );
            return response()->redirectToRoute('admin.admin-student-index');
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
            return response()->redirectToRoute('admin.admin-student-index');
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

    public function updatecourse(Request $request)
    {
        // Mendapatkan user yang terautentikasi
        $user = auth()->user();

        // Validasi data yang dikirimkan
        $request->validate([
            'course_id' => 'required|numeric', // Anda dapat menambahkan validasi sesuai kebutuhan
        ]);

        User::updateOrCreate(
            ['id' => auth()->id()], // Kriteria pencarian, misalnya berdasarkan ID pengguna yang terautentikasi
            ['id_course' => $request->course_id]
        );

        return redirect()->back()->with('success', 'Anda sudah terdaftar pada course ini.');
    }

}
