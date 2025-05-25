<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/ekbis-jambi', [FrontendController::class, 'ekbisJambi'])->name('frontend.bisnisjambi');
Route::get('/peluang-usaha', [FrontendController::class, 'peluangUsaha'])->name('frontend.peluangusaha');
Route::get('/perbankan', [FrontendController::class, 'perbankan'])->name('frontend.perbankan');
Route::get('/properti', [FrontendController::class, 'properti'])->name('frontend.properti');
Route::get('/nasional', [FrontendController::class, 'nasional'])->name('frontend.nasional');
Route::get('/internasional', [FrontendController::class, 'internasional'])->name('frontend.internasional');
Route::get('/kuliner', [FrontendController::class, 'kuliner'])->name('frontend.kuliner');
Route::get('/otobiz', [FrontendController::class, 'otobiz'])->name('frontend.otobiz');
Route::get('/berita/{slug}', [FrontendController::class, 'beritaDetail'])->name('frontend.beritaDetail');
Route::get('/search', [FrontendController::class, 'search'])->name('frontend.search');
Route::get('/about-us', [FrontendController::class, 'aboutus'])->name('frontend.aboutus');
Route::get('/redaksi', [FrontendController::class, 'redaksi'])->name('frontend.redaksi');
