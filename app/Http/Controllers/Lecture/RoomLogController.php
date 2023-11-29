<?php

namespace App\Http\Controllers\lecture;

use App\Http\Controllers\Controller;
use App\Models\RoomLog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $search = $request->search ?? "";
        $per_page = $request->per_page ?? 10;
        $roomLogs = RoomLog::with('student')
            ->where(function ($query) use ($search) {
                $query->where('nim', 'LIKE', "%{$search}%")
                    ->orWhere('access_status', 'LIKE', "%{$search}%")
                    ->orWhereHas('student', function ($subQuery) use ($search) {
                        $subQuery->where('name', 'LIKE', "%{$search}%");
                    });
            })
            ->paginate($per_page);

        return view('admin.room_log.index', compact('roomLogs'));
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
}
