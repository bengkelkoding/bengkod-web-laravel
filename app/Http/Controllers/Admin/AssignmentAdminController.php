<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use ZipArchive;
use App\Models\User;
use App\Models\tugas;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\AssignmentRequest;
use App\Models\Task;

class AssignmentAdminController extends Controller
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
        $assignments = Assignment::where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('start_time', 'LIKE', "%{$search}%")
                    ->orWhere('deadline', 'LIKE', "%{$search}%");
            })
            ->with('course')
            ->paginate($per_page);

        return view('admin.assignment.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.assignment.create');
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
            if ($request->hasFile('task_file')) {
                $file = $request->file('task_file');
                $task_file = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/soal'), $task_file);
            } else {
                $task_file = null;
            }

            $formatted_description = nl2br($request->description);

            $assignment = Assignment::create([
                'id_course' => auth()->user()->id_course,
                'title' => $request->title,
                'description' => $formatted_description,
                'task_file' => $task_file,
                'start_time' => $request->start_time,
                'deadline' => $request->deadline,
            ]);

            return redirect()->route('admin.assignment.index')->with('success', 'Berhasil menambahkan tugas');
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
        $student = User::role('student')->where('id_course', $assignment->id_course)
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('code', 'LIKE', "%{$search}%");
            })
            ->with(['tugas' => function ($q) use ($assignment) {
                $q->where('id_assignment', $assignment->id);
            }])
            ->paginate($per_page);

        return view('admin.assignment.detail', compact('assignment', 'student'));
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

        return view('admin.assignment.edit', compact('assignment', 'start_time', 'deadline'));
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
            if ($request->hasFile('task_file')) {
                if (isset($assignment->task_file)) {
                    unlink(public_path('storage/soal/' . $assignment->task_file));
                }
                $file = $request->file('task_file');
                $task_file = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/soal'), $task_file);
            } else {
                $task_file = $assignment->task_file;
            }

            $assignment->update([
                'title' => $request->title,
                'description' => $request->description,
                'task_file' => $task_file,
                'start_time' => $request->start_time,
                'deadline' => $request->deadline,
            ]);

            return redirect()->route('admin.assignment.index')->with('success', 'Berhasil mengubah tugas');
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
            if ($assignment->task_file) {
                unlink(public_path('storage/question/' . $assignment->task_file));
            }

            $assignment->delete();
            return redirect()->route('admin.assignment.index')->with('success', 'Berhasil menghapus tugas');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function forceSubmit(Request $request, $id)
    {
        try {
            $tugas = Task::findorfail($id);
            $tugas->update($request->all());
            return redirect()->back()->with('success', 'Force Submit Succesfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function downloadtugas($id)
    {
        try {
            $tugas = Task::where('id_assignment', $id)->whereNot('task_file', '-')->get();
            $files = [];

            foreach($tugas as $t) {
                $files[$t->id] = public_path('storage/task/' . $t->file_tugas);
            }

            $zip = new ZipArchive();
            $assignment = Assignment::where('id', $id)->with('course')->first();
            $zipFileName = 'Penugasan_'. $assignment->title. '_' .$assignment->course->title .'.zip';
            $zipFile = public_path('storage/file_zip_tugas/'. $zipFileName);

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

            return response()->download(public_path('storage/file_zip_tugas/'. $zipFileName));
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
