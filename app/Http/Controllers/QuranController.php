<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Surah;

class QuranController extends Controller
{
    public function index()
    {
        $surahs = Surah::orderBy('number')->get();
        return view('quran.index', compact('surahs'));
    }

    public function show(Surah $surah)
    {
        // Eager load ayahs once we seed them
        $surah->load('ayahs');
        return view('quran.show', compact('surah'));
    }
}
