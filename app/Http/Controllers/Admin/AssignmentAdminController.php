<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use ZipArchive;
use App\Models\User;
use App\Models\Tugas;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\AssignmentRequest;

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
                $query->where('judul', 'LIKE', "%{$search}%")
                    ->orWhere('deskripsi', 'LIKE', "%{$search}%")
                    ->orWhere('waktu_mulai', 'LIKE', "%{$search}%")
                    ->orWhere('deadline', 'LIKE', "%{$search}%");
            })
            ->with('kursus')
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
            if ($request->hasFile('file_soal')) {
                $file = $request->file('file_soal');
                $file_name = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/soal'), $file_name);
            } else {
                $file_name = null;
            }

            $formatted_deskripsi = nl2br($request->deskripsi);

            $assignment = Assignment::create([
                'id_kursus' => auth()->user()->id_kursus,
                'judul' => $request->judul,
                'deskripsi' => $formatted_deskripsi,
                'file_soal' => $file_name,
                'waktu_mulai' => $request->waktu_mulai,
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
        $mahasiswa = User::role('mahasiswa')->where('id_kursus', auth()->user()->id_kursus)
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('kode', 'LIKE', "%{$search}%");
            })
            ->with(['tugas' => function ($q) use ($assignment) {
                $q->where('id_assignment', $assignment->id);
            }])
            ->paginate($per_page);

        return view('admin.assignment.detail', compact('assignment', 'mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        $waktu_mulai = date('d/m/Y, g:i A', strtotime($assignment->waktu_mulai));
        $deadline = date('d/m/Y, g:i A', strtotime($assignment->deadline));

        return view('admin.assignment.edit', compact('assignment', 'waktu_mulai', 'deadline'));
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
            if ($request->hasFile('file_soal')) {
                if (isset($assignment->file_soal)) {
                    unlink(public_path('storage/soal/' . $assignment->file_soal));
                }
                $file = $request->file('file_soal');
                $file_name = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/soal'), $file_name);
            } else {
                $file_name = $assignment->file_soal;
            }

            $assignment->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'file_soal' => $file_name,
                'waktu_mulai' => $request->waktu_mulai,
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
            if ($assignment->file_soal) {
                unlink(public_path('storage/soal/' . $assignment->file_soal));
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
            $tugas = Tugas::findorfail($id);
            $tugas->update($request->all());
            return redirect()->back()->with('success', 'Force Submit Succesfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function downloadTugas($id)
    {
        try {
            $tugas = Tugas::where('id_assignment', $id)->whereNot('file_tugas', '-')->get();
            $files = [];

            foreach($tugas as $t) {
                $files[$t->id] = public_path('storage/tugas/' . $t->file_tugas);
            }

            $zip = new ZipArchive();
            $assignment = Assignment::where('id', $id)->with('kursus')->first();
            $zipFileName = 'Penugasan_'. $assignment->judul. '_' .$assignment->kursus->judul .'.zip';
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
