<?php

namespace App\Http\Controllers;

use App\Models\RoomLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RoomLogController extends Controller
{
    public function index(): View
    {
        $roomLogs = RoomLog::where('nim', auth()->user()->code)
            ->orderBy('accessed', 'desc')
            ->get();
        return view('student.history', compact('roomLogs'));
    }

    public function logByClass($idClassroom, $idStudent)
    {
        $userRole = Auth::user()->roles()->pluck('name')->first();
        $student = User::find($idStudent);
        $roomLogs = RoomLog::where('nim', $student->code)
            ->orderBy('accessed', 'desc')
            ->get();
        return view($userRole . '.classroom.student.log', compact('roomLogs'));
    }

    public function logAll(Request $request)
    {
        $userRole = Auth::user()->roles()->pluck('name')->first();

        $search = $request->search ?? "";
        $per_page = $request->per_page ?? 10;

        $roomLogs = RoomLog::orderBy('accessed', 'desc')->where(function ($query) use ($search) {
                $query->where('nim', 'LIKE', "%{$search}%");
            })
            ->paginate($per_page);
        
        return view($userRole . '.classroom.log', compact('roomLogs'));
    }
}
