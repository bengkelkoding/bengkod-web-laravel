<?php

namespace App\Http\Controllers;

use App\Http\Requests\KursusRequest;
use App\Models\Kursus;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr;

class KursusConstroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kursus.index', ['kursuses' => Kursus::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kursus.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KursusRequest $request)
    {
        try {

            Kursus::create($request->all());
            return response()->redirectToRoute('kursus.index');
            
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
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
        $kursus = Kursus::find($id);
        // dd($kursus->id);
        return view('kursus.edit', compact('kursus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KursusRequest $request, string $id)
    {
        try {
            Kursus::updateOrCreate(
                ['id' => $id],
                $request->all(),
            );
            return response()->redirectToRoute('kursus.index');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Kursus::find($id)->delete();
            return response()->redirectToRoute('kursus.index');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }
}
