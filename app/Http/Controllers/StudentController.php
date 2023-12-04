<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

    function showDetailtask($id) {
        $assignment = Assignment::find($id);
        $deskripsi = str_replace('<br />', "\n", $assignment->deskripsi);
        // $deskripsi = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $deskripsi);
        // dd($deskripsi);
        $task = null;
        if (auth()->user()->task !== null) {
            $task = auth()->user()->task->where('id_student', auth()->user()->id)->where('id_assignment', $id)->first();
        }
        return view('student.detailtask', compact('assignment', 'task', 'deskripsi'));
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
