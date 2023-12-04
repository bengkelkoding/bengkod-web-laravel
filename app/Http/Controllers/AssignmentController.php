<?php

namespace App\Http\Controllers;

use Exception;
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
    public function index(Request $request)
    {
        $search = $request->search ?? '';
        $per_page = $request->per_page ?? 10;
        $assignments = Assignment::where('id_course', auth()->user()->id_course)
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('time_start', 'LIKE', "%{$search}%")
                    ->orWhere('deadline', 'LIKE', "%{$search}%");
            })
            ->with('course')
            ->paginate($per_page);

        return view('lecture.assignment.index', compact('assignments'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
                'title' => $request->title,
                'description' => $formatted_description,
                'question_file' => $question_file,
                'time_start' => $request->time_start,
                'deadline' => $request->deadline,
            ]);

            return redirect()->route('lecture.assignment.index')->with('success', 'Berhasil menambahkan task');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        $time_start = date('d/m/Y, g:i A', strtotime($assignment->time_start));
        $deadline = date('d/m/Y, g:i A', strtotime($assignment->deadline));

        return view('lecture.assignment.edit', compact('assignment', 'time_start', 'deadline'));
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
                    unlink(public_path('storage/soal/' . $assignment->question_file));
                }
                $file = $request->file('question_file');
                $question_file = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/soal'), $question_file);
            } else {
                $question_file = $assignment->question_file;
            }

            $assignment->update([
                'title' => $request->title,
                'description' => $request->description,
                'question_file' => $question_file,
                'time_start' => $request->time_start,
                'deadline' => $request->deadline,
            ]);

            return redirect()->route('lecture.assignment.index')->with('success', 'Berhasil mengubah task');
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
            return redirect()->route('lecture.assignment.index')->with('success', 'Berhasil menghapus task');
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
