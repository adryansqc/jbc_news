<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Categorie;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliderBerita = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('tanggal', 'desc')->take(3)->get();
        $beritaTerbaru = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('tanggal', 'desc')->take(4)->get();
        $beritaUtama = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('tanggal', 'desc')->take(1)->get();
        $beritaPopuler = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('view', 'desc')->take(5)->get();
        $lamanBerita = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('tanggal', 'desc')->take(20)->get();
        $kategori = Categorie::all();
        return view('fe.pages.home', compact('sliderBerita', 'beritaTerbaru', 'beritaPopuler', 'beritaUtama', 'lamanBerita', 'kategori'));
    }

    public function ekbisJambi()
    {
        $ekbisJambi = Berita::with(['kategori', 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Ekbis Jambi');
            })
            ->where('status', true)
            ->orderBy('tanggal', 'desc')
            ->take(10)
            ->paginate(10);
        $beritaPopuler = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('view', 'desc')->take(5)->get();
        $kategori = Categorie::all();
        return view('fe.pages.ekbisJambi', compact('ekbisJambi', 'beritaPopuler', 'kategori'));
    }
    public function peluangUsaha()
    {
        $peluangUsaha = Berita::with(['kategori', 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Peluang Usaha');
            })
            ->where('status', true)
            ->orderBy('tanggal', 'desc')
            ->take(10)
            ->paginate(10);
        $beritaPopuler = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('view', 'desc')->take(5)->get();
        $kategori = Categorie::all();
        return view('fe.pages.peluangUsaha', compact('peluangUsaha', 'beritaPopuler', 'kategori'));
    }
    public function perbankan()
    {
        $perbankan = Berita::with(['kategori', 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Perbankan');
            })
            ->where('status', true)
            ->orderBy('tanggal', 'desc')
            ->take(10)
            ->paginate(10);
        $beritaPopuler = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('view', 'desc')->take(5)->get();
        $kategori = Categorie::all();
        return view('fe.pages.perbankan', compact('perbankan', 'beritaPopuler', 'kategori'));
    }
    public function properti()
    {
        $properti = Berita::with(['kategori', 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Properti');
            })
            ->where('status', true)
            ->orderBy('tanggal', 'desc')
            ->take(10)
            ->paginate(10);
        $beritaPopuler = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('view', 'desc')->take(5)->get();
        $kategori = Categorie::all();
        return view('fe.pages.properti', compact('properti', 'beritaPopuler', 'kategori'));
    }
    public function nasional()
    {
        $nasional = Berita::with(['kategori', 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Nasional');
            })
            ->where('status', true)
            ->orderBy('tanggal', 'desc')
            ->take(10)
            ->paginate(10);
        $beritaPopuler = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('view', 'desc')->take(5)->get();
        $kategori = Categorie::all();
        return view('fe.pages.nasional', compact('nasional', 'beritaPopuler', 'kategori'));
    }
    public function internasional()
    {
        $internasional = Berita::with(['kategori', 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Internasional');
            })
            ->where('status', true)
            ->orderBy('tanggal', 'desc')
            ->take(10)
            ->paginate(10);
        $beritaPopuler = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('view', 'desc')->take(5)->get();
        $kategori = Categorie::all();
        return view('fe.pages.internasional', compact('internasional', 'beritaPopuler', 'kategori'));
    }
    public function kuliner()
    {
        $kuliner = Berita::with(['kategori', 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Kuliner');
            })
            ->where('status', true)
            ->orderBy('tanggal', 'desc')
            ->take(10)
            ->paginate(10);
        $beritaPopuler = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('view', 'desc')->take(5)->get();
        $kategori = Categorie::all();
        return view('fe.pages.kuliner', compact('kuliner', 'beritaPopuler', 'kategori'));
    }
    public function Otobiz()
    {
        $otobiz = Berita::with(['kategori', 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Otobiz');
            })
            ->where('status', true)
            ->orderBy('tanggal', 'desc')
            ->take(10)
            ->paginate(10);
        $beritaPopuler = Berita::with(['kategori', 'user'])->where('status', true)->orderBy('view', 'desc')->take(5)->get();
        $kategori = Categorie::all();
        return view('fe.pages.otobiz', compact('otobiz', 'beritaPopuler', 'kategori'));
    }

    public function beritaDetail($slug)
    {
        $berita = Berita::with(['kategori', 'user'])
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        // Increment view count
        $berita->increment('view');

        // Get related news from same category
        $beritaTerkait = Berita::with(['kategori', 'user'])
            ->where('status', true)
            ->where('id', '!=', $berita->id)
            ->whereHas('kategori', function ($query) use ($berita) {
                $query->where('id', $berita->kategori_id);
            })
            ->take(3)
            ->get();

        $beritaPopuler = Berita::with(['kategori', 'user'])
            ->where('status', true)
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $kategori = Categorie::all();

        return view('fe.pages.beritaDetail', compact('berita', 'beritaTerkait', 'beritaPopuler', 'kategori'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $berita = Berita::with(['kategori', 'user'])
            ->where(function ($q) use ($query) {
                $q->where('judul', 'LIKE', "%{$query}%")
                    ->orWhere('content', 'LIKE', "%{$query}%");
            })
            ->where('status', true)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        $beritaPopuler = Berita::with(['kategori', 'user'])
            ->where('status', true)
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $kategori = Categorie::all();

        return view('fe.pages.search', compact('berita', 'query', 'beritaPopuler', 'kategori'));
    }

    public function aboutus()
    {
        return view('fe.pages.aboutus');
    }

    public function redaksi()
    {
        return view('fe.pages.redaksi');
    }
}
