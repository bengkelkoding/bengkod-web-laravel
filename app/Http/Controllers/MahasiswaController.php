<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return Auth:user()->getRoleNames();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
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
}
