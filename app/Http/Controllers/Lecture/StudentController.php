<?php

namespace App\Http\Controllers\Lecture;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScoreRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $per_page = $request->per_page ?? 10;
        $search = $request->search ?? "";
        $students = User::role('student')
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('code', 'LIKE', "%{$search}%");
            })
            ->where('id_course', $user->id_course)
            ->with('course', 'task')
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
        return view('lecture.student.create');
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
        return view('lecture.student.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('lecture.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScoreRequest $request, $id)
    {
        try {
            // dd($request->nilai);
            $task = Task::find($id);
            // dd($task);
            $task->update([
                'final_score' => $request->nilai
            ]);

            return response()->redirectToRoute('lecture.assignment.show', $task->id_assignment)->with('success', 'Nilai berhasil diupdate');
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
        //
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
