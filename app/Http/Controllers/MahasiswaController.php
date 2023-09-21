<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\ContactAssistant;
use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $kursus_member = Kursus::where('id', $user->id)->with('users')->get();
        $tugasMahasiswa = $user->nilaiTugas->whereNotNull('nilai_akhir');
        $tugas = $user->tugas;
        $kursuses = Kursus::where('id', $user->id_kursus)->withCount('users')->get();
        $member_count = $kursuses->sum('users_count');
        // $contactAssistants = User::with('assistant')->find(auth()->user()->id)->assistant;
        
        $asistant = ContactAssistant::where('id_mahasiswa', $user->id)->get();

        return view('mahasiswa.dashboard', compact('user', 'member_count', 'tugas', 'tugasMahasiswa','asistant'));
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

    function showMateriDipelajari()
    {
        return view('mahasiswa.materiDipelajari');
    }

    function showMateriDiselesaikan()
    {
        return view('mahasiswa.materiDiselesaikan');
    }

    function showKumpulkanTugas()
    {
        return view('mahasiswa.kumpulkanTugas');
    }

    function showDaftarNilai()
    {
        return view('mahasiswa.daftarNilai');
    }

    function showKontakAsisten()
    {
        return view('mahasiswa.kontakAsisten');
    }

    public function updateKursus(Request $request)
    {
        // Mendapatkan user yang terautentikasi
        $user = auth()->user();

        // Validasi data yang dikirimkan
        $request->validate([
            'kursus_id' => 'required|numeric', // Anda dapat menambahkan validasi sesuai kebutuhan
        ]);

        User::updateOrCreate(
            ['id' => auth()->id()], // Kriteria pencarian, misalnya berdasarkan ID pengguna yang terautentikasi
            ['id_kursus' => $request->kursus_id]
        );

        return redirect()->back()->with('success', 'Anda sudah terdaftar pada kursus ini.');
    }

}
