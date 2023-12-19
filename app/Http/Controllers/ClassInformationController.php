<?php

namespace App\Http\Controllers;

use App\Models\ClassInformation;
use App\Models\Classroom;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idClassroom, Request $request)
    {
        $userRole = Auth::user()->roles()->pluck('name')->first();
        $search = $request->search ?? "";
        $per_page = $request->per_page ?? 10;

        $class_informations = ClassInformation::whereHas('classroom', function ($query) use ($idClassroom) {
                $query->where('id', $idClassroom);
            })->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%");
            })
            ->paginate($per_page);

        $classroom = Classroom::find($idClassroom);

        return view($userRole . '.classInformation.index', compact('class_informations', 'classroom'));
    }

    // public function showClassInformationAdmin($idClassroom, Request $request): View
    // {
    //     $search = $request->search ?? "";
    //     $per_page = $request->per_page ?? 10;

    //     $class_informations = ClassInformation::whereHas('classroom', function ($query) use ($idClassroom) {
    //             $query->where('id', $idClassroom);
    //         })->where(function ($query) use ($search) {
    //             $query->where('title', 'LIKE', "%{$search}%");
    //         })
    //         ->paginate($per_page);

    //     $classroom = Classroom::find($idClassroom)->first();

    //     return view('admin.classroom.classInformation', compact('class_informations', 'classroom'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idClassroom)
    {
        $userRole = Auth::user()->roles()->pluck('name')->first();
        $classroom = Classroom::find($idClassroom);
        return view($userRole . '.classInformation.create', compact('classroom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userRole = Auth::user()->roles()->pluck('name')->first();
        try {
            ClassInformation::create($request->all());
            return redirect($userRole . '/classroom/' . $request->id_classroom . '/class-information');
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
        $userRole = Auth::user()->roles()->pluck('name')->first();
        $class_information = ClassInformation::where('id', $id);
        return view($userRole . '.classInformation.detail', compact('class_information'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idClassroom, $idClassInformation)
    {
        $userRole = Auth::user()->roles()->pluck('name')->first();
        $classroom = Classroom::find($idClassroom);
        $class_information = ClassInformation::find($idClassInformation);
        return view($userRole . '.classInformation.edit', compact('classroom','class_information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idClassroom, $idClassInformation)
    {
        $userRole = Auth::user()->roles()->pluck('name')->first();
        try {
            ClassInformation::updateOrCreate(
                ['id' => $idClassInformation],
                $request->all(),
            );
            return response()->redirectToRoute($userRole . '.class-information.index', $idClassroom);
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
    public function destroy($idClassroom, $idClassInformation)
    {
        try {
            $classInformation = ClassInformation::findOrFail($idClassInformation);
            $classInformation->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus informasi kelas');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }
}
