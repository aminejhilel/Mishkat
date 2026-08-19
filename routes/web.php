<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Models\Surah;

use App\Http\Controllers\QuranController;

Route::get('/', function () {
    $surahs = Surah::take(6)->get(); // Get a few surahs for the homepage
    return view('welcome', compact('surahs'));
});

use App\Http\Controllers\PrayerTimesController;
use App\Http\Controllers\AdhkarController;
use App\Http\Controllers\HadithController;

Route::get('/quran', [QuranController::class, 'index'])->name('quran.index');
Route::get('/quran/{surah}', [QuranController::class, 'show'])->name('quran.show');
Route::get('/prayer-times', [PrayerTimesController::class, 'index'])->name('prayer-times.index');
Route::get('/adhkar', [AdhkarController::class, 'index'])->name('adhkar.index');
Route::get('/hadith', [HadithController::class, 'index'])->name('hadith.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
