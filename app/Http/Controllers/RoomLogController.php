<?php

namespace App\Http\Controllers;

use App\Models\RoomLog;
use App\Models\User;
use Illuminate\Http\Request;
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
        $user = User::find($idStudent);
        $roomLogs = RoomLog::where('nim', $user->code)
            ->orderBy('accessed', 'desc')
            ->get();
        return view('lecture.classroom.log', compact('roomLogs'));
    }
}
