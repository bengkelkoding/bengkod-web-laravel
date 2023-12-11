<?php

namespace App\Http\Controllers;

use App\Models\RoomLog;
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
}
