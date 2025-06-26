<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Categorie;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliderBerita = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->where('heading', true)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $beritaTerbaru = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $breakingNews = Berita::where('breaking_news', true)
            ->where('status', true)
            ->get();

        $beritaUtama = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->take(1)
            ->get();

        $beritaPopuler = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $lamanBeritaAtas = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $lamanBeritaBawah = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->skip(5)
            ->take(15)
            ->get();

        $kategori = Categorie::all();

        return view('fe.pages.home', compact(
            'sliderBerita',
            'beritaTerbaru',
            'breakingNews',
            'beritaPopuler',
            'beritaUtama',
            'lamanBeritaAtas',
            'lamanBeritaBawah',
            'kategori'
        ));
    }

    public function ekbisJambi()
    {
        $ekbisJambi = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Bisnis Jambi');
        }, 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Bisnis Jambi');
            })
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $beritaPopuler = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Bisnis Jambi');
        }, 'user'])
            ->where('status', true)
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $kategori = Categorie::all();
        return view('fe.pages.ekbisJambi', compact('ekbisJambi', 'beritaPopuler', 'kategori'));
    }
    public function peluangUsaha()
    {
        $peluangUsaha = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Peluang Usaha');
        }, 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Peluang Usaha');
            })
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $beritaPopuler = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Peluang Usaha');
        }, 'user'])
            ->where('status', true)
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $kategori = Categorie::all();
        return view('fe.pages.peluangUsaha', compact('peluangUsaha', 'beritaPopuler', 'kategori'));
    }
    public function perbankan()
    {
        $perbankan = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Perbankan');
        }, 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Perbankan');
            })
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $beritaPopuler = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Perbankan');
        }, 'user'])
            ->where('status', true)
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $kategori = Categorie::all();
        return view('fe.pages.perbankan', compact('perbankan', 'beritaPopuler', 'kategori'));
    }
    public function properti()
    {
        $properti = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Properti');
        }, 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Properti');
            })
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $beritaPopuler = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Properti');
        }, 'user'])
            ->where('status', true)
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $kategori = Categorie::all();
        return view('fe.pages.properti', compact('properti', 'beritaPopuler', 'kategori'));
    }
    public function nasional()
    {
        $nasional = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Nasional');
        }, 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Nasional');
            })
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $beritaPopuler = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Nasional');
        }, 'user'])
            ->where('status', true)
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $kategori = Categorie::all();
        return view('fe.pages.nasional', compact('nasional', 'beritaPopuler', 'kategori'));
    }
    public function internasional()
    {
        $internasional = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Internasional');
        }, 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Internasional');
            })
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $beritaPopuler = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Internasional');
        }, 'user'])
            ->where('status', true)
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $kategori = Categorie::all();
        return view('fe.pages.internasional', compact('internasional', 'beritaPopuler', 'kategori'));
    }
    public function kuliner()
    {
        $kuliner = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Kuliner');
        }, 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Kuliner');
            })
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $beritaPopuler = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Kuliner');
        }, 'user'])
            ->where('status', true)
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $kategori = Categorie::all();
        return view('fe.pages.kuliner', compact('kuliner', 'beritaPopuler', 'kategori'));
    }
    public function Otobiz()
    {
        $otobiz = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Otobiz');
        }, 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Otobiz');
            })
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $beritaPopuler = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Otobiz');
        }, 'user'])
            ->where('status', true)
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

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
            ->where('beritas.id', '!=', $berita->id)  // Tambahkan nama tabel
            ->whereHas('kategori', function ($query) use ($berita) {
                $query->where('categories.id', $berita->kategori_id);  // Tambahkan nama tabel
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
        $hasilPencarian = Berita::with(['kategori', 'user'])
            ->where(function ($q) use ($query) {
                $q->where('judul', 'LIKE', "%{$query}%")
                    ->orWhere('content', 'LIKE', "%{$query}%");
            })
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $beritaPopuler = Berita::with(['kategori', 'user'])
            ->where('status', true)
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $kategori = Categorie::all();

        return view('fe.pages.search', compact('hasilPencarian', 'query', 'beritaPopuler', 'kategori'));
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
