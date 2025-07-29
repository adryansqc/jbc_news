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
            ->take(3)
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

        $lamanBerita = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $kategori = Categorie::all();

        return view('fe.pages.home', compact(
            'sliderBerita',
            'beritaTerbaru',
            'breakingNews',
            'beritaPopuler',
            'beritaUtama',
            // 'lamanBeritaAtas',
            // 'lamanBeritaBawah',
            'lamanBerita',
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

        $beritaPopuler = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
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

        $beritaPopuler = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
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

        $beritaPopuler = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
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

        $beritaPopuler = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
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

        $beritaPopuler = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
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

        $beritaPopuler = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
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

        $beritaPopuler = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
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

        $beritaPopuler = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $kategori = Categorie::all();
        return view('fe.pages.otobiz', compact('otobiz', 'beritaPopuler', 'kategori'));
    }
    public function regional()
    {
        $regional = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Regional');
        }, 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Regional');
            })
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $beritaPopuler = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $kategori = Categorie::all();
        return view('fe.pages.regional', compact('regional', 'beritaPopuler', 'kategori'));
    }
    public function olahraga()
    {
        $olahraga = Berita::with(['kategori' => function ($query) {
            $query->where('name', 'Olahraga');
        }, 'user'])
            ->whereHas('kategori', function ($query) {
                $query->where('name', 'Olahraga');
            })
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $beritaPopuler = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $kategori = Categorie::all();
        return view('fe.pages.olahraga', compact('olahraga', 'beritaPopuler', 'kategori'));
    }

    public function beritaDetail($slug)
    {
        $berita = Berita::with(['kategori', 'user'])
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $beritaTerbaru = Berita::with(['kategori', 'user'])
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Increment view count
        $berita->increment('view');

        // Get related news from same category
        $beritaTerkait = Berita::with(['kategori', 'user'])
            ->where('status', true)
            ->where('beritas.id', '!=', $berita->id)
            ->whereHas('kategori', function ($query) use ($berita) {
                $query->whereIn('categories.id', $berita->kategori->pluck('id'));
            })
            ->take(5)
            ->get();

        $beritaPopuler = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();


        $kategori = Categorie::all();

        $content = strip_tags($berita->content, '<br><p><a><img><span><strong><em><ul><ol><li>');
        $content = str_replace(["\r\n", "\r"], "\n", $content);
        $lines = preg_split('/\n+|<br\s*\/?>/', $content);

        $perPage = 6;
        $page = max(1, (int) request('page', 1));
        $chunks = array_chunk(array_filter($lines), $perPage);
        $page = min($page, count($chunks) ?: 1);
        $currentContent = implode('<br>', $chunks[$page - 1] ?? []);

        return view('fe.pages.beritaDetail', [
            'berita'         => $berita,
            'beritaTerkait'  => $beritaTerkait,
            'beritaPopuler'  => $beritaPopuler,
            'kategori'       => $kategori,
            'beritaTerbaru'  => $beritaTerbaru,
            'chunks'         => $chunks,
            'currentContent' => $currentContent,
            'currentPage'    => $page,
        ]);
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
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $beritaPopuler = Berita::with(['kategori:id,name', 'user'])
            ->where('status', true)
            ->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();

        $kategori = Categorie::all();

        return view('fe.pages.search', [
            'hasilPencarian' => $berita,
            'query' => $query,
            'beritaPopuler' => $beritaPopuler,
            'kategori' => $kategori,
        ]);
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
