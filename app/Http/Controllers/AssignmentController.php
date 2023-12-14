<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\View\View;
use ZipArchive;
use App\Models\User;
use App\Models\task;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\AssignmentRequest;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $idClassroom)
    {
        $search = $request->search ?? '';
        $per_page = $request->per_page ?? 10;
        $assignments = Assignment::where('id_classroom', $idClassroom)
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('start_time', 'LIKE', "%{$search}%")
                    ->orWhere('deadline', 'LIKE', "%{$search}%");
            })
            ->with('course')
            ->paginate($per_page);

        return view('lecture.assignment.index', compact('assignments', 'idClassroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecture.assignment.create');
    }

    public function create2($idClassroom): View
    {
        return view('lecture.assignment.create', compact('idClassroom'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function store(AssignmentRequest $request)
    {
        try {
            if ($request->hasFile('question_file')) {
                $file = $request->file('question_file');
                $question_file = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/question'), $question_file);
            } else {
                $question_file = null;
            }

            $formatted_description = nl2br($request->description);

            $assignment = Assignment::create([
                'id_course' => auth()->user()->id_course,
                'id_classroom' => $request->id_classroom,
                'title' => $request->title,
                'description' => $formatted_description,
                'task_file' => $question_file,
                'start_time' => $request->start_time,
                'deadline' => $request->deadline,
            ]);

            return redirect('lecture/classroom/' . $request->id_classroom . '/assignment');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment, Request $request)
    {
        $search = $request->search ?? '';
        $per_page = $request->per_page ?? 10;
        $student = User::role('student')->where('id_course', auth()->user()->id_course)
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('code', 'LIKE', "%{$search}%");
            })
            ->with(['task' => function ($q) use ($assignment) {
                $q->where('id_assignment', $assignment->id);
            }])
            ->paginate($per_page);

        return view('lecture.assignment.detail', compact('assignment', 'student'));
    }

    public function show2($idClassroom , $idAssignment, Request $request)
    {
        $search = $request->search ?? '';
        $per_page = $request->per_page ?? 10;

        $student = User::role('student')
            ->whereHas('classManagements.classroom', function ($query) use ($idClassroom) {
                $query->where('id', $idClassroom);
            })
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('code', 'LIKE', "%{$search}%");
            })
            ->with(['task' => function ($q) use ($idAssignment) {
                $q->where('id_assignment', $idAssignment);
            }])
            ->paginate($per_page);


        $assignment = Assignment::where('id', $idAssignment)->first();

        return view('lecture.assignment.detail', compact('assignment', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        $start_time = date('d/m/Y, g:i A', strtotime($assignment->start_time));
        $deadline = date('d/m/Y, g:i A', strtotime($assignment->deadline));

        return view('lecture.assignment.edit', compact('assignment', 'start_time', 'deadline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(AssignmentRequest $request, Assignment $assignment)
    {
        try {
            if ($request->hasFile('question_file')) {
                if (isset($assignment->question_file)) {
                    unlink(public_path('storage/question/' . $assignment->question_file));
                }
                $file = $request->file('question_file');
                $question_file = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/question'), $question_file);
            } else {
                $question_file = $assignment->question_file;
            }

            $assignment->update([
                'title' => $request->title,
                'description' => $request->description,
                'task_file' => $question_file,
                'start_time' => $request->start_time,
                'deadline' => $request->deadline,
            ]);

            return redirect('lecture/classroom/' . $assignment->id_classroom . '/assignment')->with('success', 'Berhasil mengubah task');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        try {
            if ($assignment->question_file) {
                unlink(public_path('storage/question/' . $assignment->question_file));
            }

            $assignment->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus task');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function forceSubmit(Request $request, $id)
    {
        try {
            $task = Task::findorfail($id);
            $task->update($request->all());
            return redirect()->back()->with('success', 'Force Submit Succesfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function downloadtask($id)
    {
        try {
            $task = Task::where('id_assignment', $id)->whereNot('task_file', '-')->get();
            $files = [];

            foreach($task as $t) {
                $files[$t->id] = public_path('storage/task/' . $t->task_file);
            }

            $zip = new ZipArchive();
            $assignment = Assignment::where('id', $id)->with('course')->first();
            $zipFileName = 'Penugasan_'. $assignment->title. '_' .$assignment->course->title .'.zip';
            $zipFile = public_path('storage/file_zip_task/'. $zipFileName);

            // dd($zip->open($zipFile, ZipArchive::CREATE));
            if ($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
                // dd($zip);
                foreach ($files as $key => $value) {
                    // dd($value);
                    $relativeName = basename($value);
                    $zip->addFile($value, $relativeName);
                }
                $zip->close();
            }

            return response()->download(public_path('storage/file_zip_task/'. $zipFileName));
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
