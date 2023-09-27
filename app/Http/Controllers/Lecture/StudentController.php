<?php

namespace App\Http\Controllers\Lecture;

use App\Models\User;
use App\Models\Tugas;
use Illuminate\Http\Request;
use App\Http\Requests\NilaiRequest;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;

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
        $students = User::role('mahasiswa')
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('kode', 'LIKE', "%{$search}%");
            })
            ->where('id_kursus', $user->id_kursus)
            ->with('course', 'tugas')
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
    public function update(NilaiRequest $request, $id)
    {
        try {
            // dd($request->nilai);
            $tugas = Tugas::find($id);
            // dd($tugas);
            $tugas->update([
                'nilai_akhir' => $request->nilai
            ]);

            return response()->redirectToRoute('lecture.assignment.show', $tugas->id_assignment)->with('success', 'Nilai berhasil diupdate');
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
            $id_mhs = auth()->user();
            Tugas::create([
                'id_mahasiswa' => $id_mhs->id,
                'id_kursus' => $id_mhs->id_kursus,
                'id_assignment' => $id,
                'file_tugas' => '-',
                'nilai_akhir'=> '0',
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
