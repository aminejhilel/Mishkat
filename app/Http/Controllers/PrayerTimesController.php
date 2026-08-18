<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrayerTimesController extends Controller
{
    public function index()
    {
        return view('prayer-times.index');
    }
}
