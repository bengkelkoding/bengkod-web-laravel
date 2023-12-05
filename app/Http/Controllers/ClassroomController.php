<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClassroomController extends Controller
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

    public function indexAdmin()
    {
        $classroom = Classroom::with('course')->with('lecture')->get();
        return view('admin.classroom.index', compact('classroom'));
    }

    public function create()
    {
        return view('admin.classroom.create', ['courses' => Course::all(), 'lectures' => User::role('lecture')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassroomRequest $request)
    {
        try {
            Classroom::create($request->all());
            return response()->redirectToRoute('admin.admin-classroom');

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
    public function show($id): View
    {
        $classroom = Classroom::withCount('users')->find($id);
        return view('classroom.detail', compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $classroom = Classroom::find($id);
        return view('admin.classroom.edit', compact('classroom'),
            ['courses' => Course::all(), 'lectures' => User::role('lecture')->get()]);
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
            Classroom::updateOrCreate(
                ['id' => $id],
                $request->all(),
            );
            return response()->redirectToRoute('admin.admin-classroom');
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
            Classroom::find($id)->delete();
            return response()->redirectToRoute('admin.admin-classroom');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }
}
