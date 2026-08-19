<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HadithController extends Controller
{
    public function index()
    {
        $categories = \App\Models\HadithCategory::with('hadiths')->get();
        return view('hadith.index', compact('categories'));
    }
}
