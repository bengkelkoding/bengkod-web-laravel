<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class UserImportController extends Controller
{

    // pindah ke organize
    public function showForm()
    {
        return view('admin.importCsv.importCsv');
    }

    
    public function dashboardReport() {

        /*
            - TOLONG BANTUAN DIPERIKSA KEMBALI DALAM PERATA-RATA an nya. karena yang digunakan langsung dari table task
        */

        $students = User::role('student')->with('taskScore')->get();
        $totalClass = DB::table('classrooms')->count();
        $studentCount = $students->count();

        // cek kelulusan
        $passed = 0;
       

        // total dari all mhs
        $totalFinalScore = Task::get()->sum('final_score');
        $mhsSubmitTask = Task::count();
        $totalAverage = round($totalFinalScore/ $mhsSubmitTask);

        foreach ($students as $key => $s) {
            // dd($s->taskScore->first()->final_score);
            
            $finalScore = 0;

            $totalScore = 0;
            
            $countScore = 0;
            
            foreach (($s->taskScore->whereNotNull('final_score')) as $key => $score) {
                $totalScore += $score->final_score;
                $countScore++;
            }
            
            $finalScore = ($countScore > 0) ? round($totalScore / $countScore) : 0;
           
           
            if ($finalScore >= 70) {
                $passed++;
            }
        }


        $unPassed = $studentCount - $passed;

        return view('admin.dashboard' , compact('totalClass','studentCount','passed','unPassed','totalAverage'));
    }

    public function import(Request $request)
    {
        // Validasi file CSV
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return redirect('/import')->withErrors($validator);
        }

        // Ambil file CSV
        $file = $request->file('csv_file');

        // Baca isi file CSV
        $csvData = file_get_contents($file);

        // Ubah data CSV menjadi array
        $csvArray = array_map("str_getcsv", explode("\n", $csvData));

        // Loop melalui array CSV dan tambahkan ke database
        foreach ($csvArray as $key => $row) {
            if ($key === 0) continue; // Skip header row
            
            $user = User::create([
                'code' => $row[1],
                'name' => $row[0],
                'email' => $row[2],
                'password' => bcrypt($row[3]),
            ]);
            $user->assignRole('student');
        }

        return redirect('/import')->with('success', 'Data from CSV file has been imported successfully.');
    }
}
    