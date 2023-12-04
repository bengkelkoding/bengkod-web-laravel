<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Log;
use App\Models\User;
use App\Models\Kursus;
use Illuminate\Http\Request;
use App\Models\ContactAssistant;
use App\Http\Requests\LogRequest;
use Illuminate\Support\Facades\Log as LaravelLog;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search ?? '';
        $data = Log::where('id_student', auth()->user()->id);

        $logs = $data->where('message', 'like', "%$search%")
            ->paginate(10);

        if ($logs->isEmpty()) {
            $allow_insert = true;
        } else {
            $allow_insert = $data->latest()->first()->created_at->diffInDays(now()) > 0 ? true : false;
        }

        $user = auth()->user();
        $asistant = ContactAssistant::where('id_student', $user->id)->get();

        return view('student.log.index', compact('logs', 'allow_insert', 'asistant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Log::where('id_student', auth()->user()->id);
        $data = $data->latest()->first();
        $allow_access = false;
        $now = Carbon::parse(now()->format('Y-m-d'));
        if ($data === null) {
            $allow_access = true;
        } else {
            $date = Carbon::parse($data->created_at->format('Y-m-d'));
            if ($date->diffInDays($now) > 0) {
                $allow_access = true;
            } else {
                $allow_access = false;
            }
        }

        return view('student.log.create', compact('allow_access'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogRequest $request)
    {
        try {
            $user = auth()->user();
            // dd($request->message);

            Log::create([
                'id_student' => $user->id,
                'message' => $request->message,
                'status' => 0
            ]);

            return redirect()->route('logs.index')->with('success', 'Log berhasil ditambahkan');
        } catch (Exception $e) {
            LaravelLog::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        $allow_access = true;
        $date = Carbon::parse($log->created_at->format('Y-m-d'));
        $now = Carbon::parse(now()->format('Y-m-d'));
        if ($date->diffInDays($now) >= 1) {
            $allow_access = false;
        }

        return view('student.log.edit', compact('log', 'allow_access'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(LogRequest $request, Log $log)
    {
        try {
            $log->update([
                'message' => $request->message,
            ]);

            return redirect()->route('logs.index')->with('success', 'Log berhasil diubah');
        } catch (Exception $e) {
            LaravelLog::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }
}
