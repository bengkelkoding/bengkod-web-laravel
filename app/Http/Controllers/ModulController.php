<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kursus = Kursus::with('sections.artikels')->get();

        return view('modul.index', compact('kursus'));
    }

    public function showSection($kursusId, $sectionId)
    {
        $kursus = Kursus::with('sections.artikels')->find($kursusId);
        $section = Section::with('artikels')->find($sectionId);

        return view('modul.show', compact('kursus', 'section'));
    }

    public function showArtikel($kursusId, $sectionId, $artikelId)
    {
        $kursus = Kursus::with('sections.artikels')->find($kursusId);
        $section = Section::with('artikels')->find($sectionId);
        $artikel = Artikel::find($artikelId);

        return view('modul.artikel', compact('kursus', 'section', 'artikel'));
    }
}
