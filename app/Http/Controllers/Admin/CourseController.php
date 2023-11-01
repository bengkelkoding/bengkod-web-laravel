<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kursus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index() {
        $kursus = Kursus::get();
        return view('admin.kursus.index', compact('kursus'));
    }
}
