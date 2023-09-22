<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search ? $request->search : "";
        $lectures = User::role('dosen')->with('course')
        ->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('kode', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
        })->get();
        return view('admin.lecture.index', compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lecture.create', ['courses' => Kursus::all()]);
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
            if ($request->course == "Pilih Kursus") {
                $request->course = null;
            }

            $data = [
                'id_kursus' => $request->course,
                'kode' => $request->kode,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('password'),
            ];
            $user = User::create($data);
            $user->assignRole('dosen');
            return response()->redirectToRoute('admin.lecture.index');

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
        $lecture = User::find($id);
        $courses = Kursus::all();
        // dd($lecture->id);
        return view('admin.lecture.edit', compact('lecture', 'courses'));
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
            return response()->redirectToRoute('admin.lecture.index');
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
            return response()->redirectToRoute('admin.lecture.index');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }
}
