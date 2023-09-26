<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;
use App\Http\Requests\TugasRequest;
use Exception;
use Illuminate\Support\Facades\Validator;

class TugasController extends Controller
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
    public function store(TugasRequest $request)
    {
        try {
            // Rename tugas file to be unique
            // dd(auth()->user()->id);
            $existing_doc = Tugas::where('id_mahasiswa', auth()->user()->id)->first();
            // dd($existing_doc->file_tugas);
            if (isset($existing_doc->file_tugas)) {
                unlink(public_path('storage/tugas/' . $existing_doc->file_tugas));
            }

            $tugas = $request->file('file_tugas');
            $tugasName = time() . '_' . $tugas->getClientOriginalName();
            $tugas->move(public_path('storage/tugas'), $tugasName);
            $id_mhs = auth()->user();
            Tugas::updateOrCreate([
                'id_mahasiswa' => $id_mhs->id,
                'id_kursus' => $id_mhs->id_kursus,
                'id_assignment' => $request->id_assignment,
            ], [
                'file_tugas' => $tugasName,
            ]);

            return redirect()->back()->with('success', 'Tugas berhasil diupload');
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

    public function submitTugas(Request $request)
    {
        try {
            $tugas = Tugas::where('id_mahasiswa', auth()->user()->id)->firstOrFail();
            $validator = Validator::make($request->all(), [
                'check_value' => 'required|in:1|numeric',
            ]);
            $validator->validate();

            $result = $tugas->update([
                'status' => $request->check_value,
            ]);

            return redirect()->back()->with('success', 'Tugas berhasil dikumpulkan');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }
}
