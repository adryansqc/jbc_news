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

        $berita->increment('view');

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

        $wordsPerPage = 300;
        $plainContent = strip_tags($berita->content);
        $words = preg_split('/\s+/', trim($plainContent));
        $totalWords = count($words);

        $totalPages = ceil($totalWords / $wordsPerPage);

        $page = max(1, (int) request('page', 1));
        $page = min($page, $totalPages);
        $startWord = ($page - 1) * $wordsPerPage;
        $currentWords = array_slice($words, $startWord, $wordsPerPage);
        $currentPlainContent = implode(' ', $currentWords);

        if ($page > 1) {
            $searchWords = array_slice($words, max(0, $startWord - 5), 10);
            $searchText = implode(' ', $searchWords);

            $plainForSearch = strip_tags($berita->content);
            $searchPos = strpos($plainForSearch, trim($currentWords[0]));

            if ($searchPos !== false) {
                $htmlContent = $berita->content;
                $currentPos = 0;
                $plainPos = 0;

                while ($plainPos < $searchPos && $currentPos < strlen($htmlContent)) {
                    if ($htmlContent[$currentPos] === '<') {
                        while ($currentPos < strlen($htmlContent) && $htmlContent[$currentPos] !== '>') {
                            $currentPos++;
                        }
                        $currentPos++;
                    } else {
                        $plainPos++;
                        $currentPos++;
                    }
                }

                $remainingHtml = substr($htmlContent, $currentPos);

                $currentContent = $this->extractContentByWords($remainingHtml, $wordsPerPage);
            } else {
                $currentContent = $currentPlainContent;
            }
        } else {
            $currentContent = $this->extractContentByWords($berita->content, $wordsPerPage);
        }

        return view('fe.pages.beritaDetail', [
            'berita'         => $berita,
            'beritaTerkait'  => $beritaTerkait,
            'beritaPopuler'  => $beritaPopuler,
            'kategori'       => $kategori,
            'beritaTerbaru'  => $beritaTerbaru,
            'totalPages'     => $totalPages,
            'currentContent' => $currentContent,
            'currentPage'    => $page,
        ]);
    }

    /**
     * Extract content by word count while preserving HTML structure
     */
    private function extractContentByWords($htmlContent, $wordLimit)
    {
        libxml_use_internal_errors(true);

        $dom = new \DOMDocument();
        $wrappedContent = '<div>' . $htmlContent . '</div>';

        try {
            $dom->loadHTML('<?xml encoding="utf-8" ?>' . $wrappedContent, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        } catch (\Exception $e) {
            return strip_tags($htmlContent);
        }

        $wordCount = 0;
        $result = '';

        $this->traverseNodes($dom->documentElement, $wordCount, $wordLimit, $result);

        libxml_clear_errors();

        return $result;
    }

    /**
     * Traverse DOM nodes and extract content up to word limit
     */
    private function traverseNodes($node, &$wordCount, $wordLimit, &$result)
    {
        if ($wordCount >= $wordLimit) {
            return false;
        }

        if ($node->nodeType === XML_TEXT_NODE) {
            $text = $node->textContent;
            $words = preg_split('/\s+/', trim($text));
            $words = array_filter($words);

            if (!empty($words)) {
                $remainingWords = $wordLimit - $wordCount;
                if (count($words) <= $remainingWords) {
                    $result .= $text;
                    $wordCount += count($words);
                } else {
                    $neededWords = array_slice($words, 0, $remainingWords);
                    $result .= implode(' ', $neededWords);
                    $wordCount = $wordLimit;
                    return false;
                }
            }
        } else {
            // Handle element nodes
            if ($node->nodeType === XML_ELEMENT_NODE) {
                $tagName = $node->nodeName;
                $attributes = '';

                if ($node->hasAttributes()) {
                    foreach ($node->attributes as $attr) {
                        $attributes .= ' ' . $attr->nodeName . '="' . htmlspecialchars($attr->nodeValue) . '"';
                    }
                }

                $result .= '<' . $tagName . $attributes . '>';

                foreach ($node->childNodes as $child) {
                    if (!$this->traverseNodes($child, $wordCount, $wordLimit, $result)) {
                        break;
                    }
                }

                $result .= '</' . $tagName . '>';
            }
        }

        return true;
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
