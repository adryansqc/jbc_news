<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliderBerita = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('tanggal', 'desc')->take(3)->get();
        $beritaTerbaru = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('tanggal', 'desc')->take(4)->get();
        $beritaPopuler = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('view', 'desc')->take(5)->get();
        return view('fe.pages.home', compact('sliderBerita', 'beritaTerbaru', 'beritaPopuler'));
    }
}
