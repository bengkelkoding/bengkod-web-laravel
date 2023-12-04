<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class UserImportController extends Controller
{
    public function showForm()
    {
        return view('admin.dashboard');
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
            $user->assignRole('mahasiswa');
        }

        return redirect('/import')->with('success', 'Data from CSV file has been imported successfully.');
    }
}
