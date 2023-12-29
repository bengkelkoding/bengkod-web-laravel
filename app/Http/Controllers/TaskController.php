<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(TaskRequest $request, $id)
    {
        try {
            // Rename task file to be unique
            $existing_doc = Task::where('id_student', auth()->user()->id)
                ->where('id_assignment', $id)
                ->first();

            if (isset($existing_doc->task_file)) {
                unlink(public_path('storage/task/' . $existing_doc->task_file));
            }

            $task = $request->file('task_file');
            $taskName = time() . '_' . $task->getClientOriginalName();
            $task->move(public_path('storage/task'), $taskName);
            $id_student = auth()->user();
            Task::updateOrCreate([
                'id_student' => $id_student->id,
                'id_assignment' => $request->id_assignment,
            ], [
                'task_file' => $taskName,
            ]);

            return redirect()->back()->with('success', 'task berhasil diupload');
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
        try {
            Task::updateOrCreate(
                ['id' => $id],
                $request->all()
            );
            return redirect()->back()->with('success', 'Berhasil Update Data');
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

    public function submitTask(Request $request, $id)
    {
        try {
            $task = Task::where('id_student', auth()->user()->id)->where('id_assignment', $id)->firstOrFail();
            $validator = Validator::make($request->all(), [
                'check_value' => 'required|in:1|numeric',
            ]);
            $validator->validate();

            $result = $task->update([
                'status' => $request->check_value,
            ]);

            return redirect()->back()->with('success', 'task berhasil dikumpulkan');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }
}
