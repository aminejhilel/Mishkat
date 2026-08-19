<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdhkarController extends Controller
{
    public function index()
    {
        $categories = \App\Models\AdhkarCategory::with('dhikrs')->get();
        return view('adhkar.index', compact('categories'));
    }
}
