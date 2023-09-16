<?php

namespace App\Http\Controllers\Lecture;

use App\Models\User;
use App\Models\Tugas;
use Illuminate\Http\Request;
use App\Http\Requests\NilaiRequest;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search ? $request->search : "";
        // dd($search);
        $students = User::role('mahasiswa')->where('name', 'LIKE', "%{$search}%")->with('course', 'tugas')->paginate(10);
        return view('lecture.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecture.kursus.create');
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
        return view('lecture.kursus.detail');
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
    public function update(NilaiRequest $request, $id)
    {
        try {
            // dd($request->nilai);
            $tugas = Tugas::find($id);
            // dd($tugas);
            $tugas->update([
                'nilai_akhir' => $request->nilai
            ]);

            return response()->redirectToRoute('lecture.student.index');
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
}
