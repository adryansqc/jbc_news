@extends('fe.layouts.app')

@section('title')
    {{ $berita->judul }}
@endsection

@push('style')
    <style>
        .content-berita img {
            max-width: 100%;
            height: auto;
            margin: 1rem 0;
        }

        .content-berita p {
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .content-berita h1, h2, h3, h4, h5, h6 {
            margin: 1.5rem 0 1rem;
        }

        /* ===== OPTIMIZED VARIABLES ===== */
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --secondary: #64748b;
            --text: #1e293b;
            --text-muted: #64748b;
            --text-light: #94a3b8;
            --border: #e2e8f0;
            --bg-light: #f8fafc;
            --bg-card: #ffffff;
            --shadow: 0 2px 8px rgba(0,0,0,0.1);
            --radius: 8px;
            --gap: 1rem;
            --gap-sm: 0.75rem;
            --gap-lg: 1.5rem;
        }

        /* ===== CONTAINER & LAYOUT ===== */
        .container-fluid { padding: 0; margin-top: 10px;}

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--gap);
        }

        .main-content {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: var(--gap-lg);
            margin: var(--gap) 0;
        }

        /* ===== RELATED NEWS ===== */
        .related-news {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: var(--gap);
            margin-bottom: var(--gap);
            box-shadow: var(--shadow);
        }

        .related-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: var(--gap-sm);
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary);
            display: inline-block;
        }

        .related-slider {
            display: flex;
            gap: var(--gap-sm);
            overflow-x: auto;
            padding: 0.5rem 0;
        }

        .related-item {
            flex: 0 0 240px;
            background: var(--bg-light);
            border-radius: var(--radius);
            padding: var(--gap-sm);
            transition: all 0.3s ease;
        }

        .related-item:hover {
            background: var(--bg-card);
            box-shadow: var(--shadow);
            transform: translateY(-2px);
        }

        .related-item a {
            color: var(--text);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .related-item a:hover { color: var(--primary); }

        /* ===== SOCIAL SHARE ===== */
        .social-share {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: var(--gap);
            margin-bottom: var(--gap);
            box-shadow: var(--shadow);
        }

        .social-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: var(--gap-sm);
        }

        .social-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
            color: white;
        }

        .social-btn.whatsapp { background: #25d366; }
        .social-btn.facebook { background: #1877f2; }
        .social-btn.twitter { background: #1da1f2; }
        .social-btn.linkedin { background: #0a66c2; }
        .social-btn.telegram { background: #0088cc; }

        /* ===== ARTICLE ===== */
        .article {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .article-header {
            padding: var(--gap-lg);
            border-bottom: 1px solid var(--border);
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: var(--gap-sm);
            margin-bottom: var(--gap-sm);
            flex-wrap: wrap;
        }

        .category-badge {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 4px 12px;
            border-radius: 16px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
        }

        .article-date {
            color: var(--text-muted);
            font-size: 0.85rem;
            font-weight: 500;
        }

        .article-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text);
            line-height: 1.3;
            margin: 0;
        }

        .article-image {
            width: 100%;
            height: 350px;
            object-fit: cover;
        }

        .image-caption {
            padding: var(--gap-sm) var(--gap-lg);
            background: var(--bg-light);
            color: var(--text-muted);
            font-size: 0.8rem;
            font-style: italic;
            border-bottom: 1px solid var(--border);
        }

        .article-body {
            padding: var(--gap-lg);
        }

        .article-credits {
            display: flex;
            gap: var(--gap-lg);
            background: var(--bg-light);
            padding: var(--gap-sm);
            border-radius: var(--radius);
            margin-bottom: var(--gap);
        }

        .credit-item { flex: 1; }

        .credit-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            font-weight: 600;
            margin-bottom: 2px;
        }

        .credit-name {
            font-size: 0.9rem;
            color: var(--primary);
            font-weight: 600;
            margin: 0;
        }

        .article-content {
            font-size: 1rem;
            line-height: 1.6;
            color: var(--text);
        }

        .article-content p {
            margin-bottom: var(--gap-sm);
            text-align: justify;
        }

        .article-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--gap-sm) var(--gap-lg);
            background: var(--bg-light);
            border-top: 1px solid var(--border);
        }

        .article-author {
            font-size: 0.9rem;
            color: var(--text);
            font-weight: 500;
        }

        .article-views {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            display: flex;
            flex-direction: column;
            gap: var(--gap);
        }

        .sidebar-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .sidebar-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: var(--gap-sm) var(--gap);
            font-size: 1rem;
            font-weight: 600;
        }

        .sidebar-content {
            padding: var(--gap);
        }

        /* ===== POPULAR NEWS ===== */
        .popular-item {
            display: flex;
            gap: var(--gap-sm);
            padding: var(--gap-sm);
            border-radius: var(--radius);
            transition: all 0.3s ease;
            margin-bottom: var(--gap-sm);
            border: 1px solid transparent;
        }

        .popular-item:hover {
            background: var(--bg-light);
            border-color: var(--border);
            transform: translateY(-1px);
        }

        .popular-item:last-child { margin-bottom: 0; }

        .popular-image {
            flex: 0 0 70px;
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: var(--radius);
        }

        .popular-content {
            flex: 1;
            min-width: 0;
        }

        .popular-meta {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.25rem;
            flex-wrap: wrap;
        }

        .popular-category {
            background: var(--primary);
            color: white;
            padding: 1px 6px;
            border-radius: 8px;
            font-size: 0.65rem;
            font-weight: 600;
        }

        .popular-date {
            color: var(--text-light);
            font-size: 0.7rem;
        }

        .popular-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text);
            line-height: 1.3;
            margin: 0;
            text-decoration: none;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .popular-title:hover { color: var(--primary); }

        /* ===== TAGS ===== */
        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .tag-item {
            background: var(--bg-light);
            color: var(--text);
            border: 1px solid var(--border);
            padding: 6px 12px;
            border-radius: 16px;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .tag-item:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
            transform: translateY(-1px);
        }

        /* ===== MOBILE RESPONSIVE ===== */
        @media (max-width: 768px) {
            .container {
                padding: 0;
                margin: 0;
                max-width: 100%;
            }

            .main-content {
                grid-template-columns: 1fr;
                gap: var(--gap);
                margin: 0;
            }

            .related-news,
            .social-share {
                margin: 0 var(--gap-sm) var(--gap) var(--gap-sm);
                border-radius: var(--radius);
            }

            .article {
                margin: 0;
                border-radius: 0;
                border-left: none;
                border-right: none;
            }

            .related-item { min-width: 200px; }

            .article-header {
                padding: var(--gap);
            }

            .article-title {
                font-size: 1.4rem;
            }

            .article-image {
                height: 220px;
            }

            .article-body {
                padding: var(--gap);
            }

            .article-credits {
                flex-direction: column;
                gap: var(--gap-sm);
            }

            .article-footer {
                padding: var(--gap-sm) var(--gap);
                flex-direction: column;
                gap: var(--gap-sm);
                align-items: flex-start;
            }

            .sidebar {
                margin: 0 var(--gap-sm);
            }

            .sidebar-card {
                border-radius: var(--radius);
            }

            .popular-item {
                flex-direction: column;
                text-align: center;
            }

            .popular-image {
                flex: none;
                width: 100%;
                height: 100px;
            }

            .sidebar-content {
                padding: var(--gap-sm);
            }
        }

        @media (max-width: 480px) {
            .article-title {
                font-size: 1.2rem;
            }

            .article-content {
                font-size: 0.95rem;
            }

            .social-btn {
                width: 32px;
                height: 32px;
                font-size: 0.9rem;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Related News -->
    <div class="container-fluid">
        <div class="container">
            <div class="related-news">
                <h2 class="related-title">Berita terkait</h2>
                <div class="related-slider">
                    @foreach($beritaTerkait as $terkait)
                    <div class="related-item">
                        <a href="{{ route('frontend.beritaDetail', $terkait->slug) }}">
                            {{ $terkait->judul }}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Social Share -->
    <div class="container-fluid">
        <div class="container">
            <div class="social-share">
                <div class="social-title">Bagikan artikel</div>
                <div class="social-buttons">
                    <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . url()->current()) }}"
                       target="_blank" class="social-btn whatsapp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                       target="_blank" class="social-btn facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(url()->current()) }}"
                       target="_blank" class="social-btn twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($berita->judul) }}"
                       target="_blank" class="social-btn linkedin">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($berita->judul) }}"
                       target="_blank" class="social-btn telegram">
                        <i class="fab fa-telegram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="container">
            <div class="main-content">
                <!-- Article -->
                <article class="article">
                    <header class="article-header">
                        <div class="article-meta">
                            <a href="{{ route('frontend.' . strtolower(str_replace(' ', '',  $berita->kategori->first()->name ))) }}"
                               class="category-badge">
                                {{ $berita->kategori->first()->name }}
                            </a>
                            <span class="article-date">{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</span>
                        </div>
                        <h1 class="article-title">{{ $berita->judul }}</h1>
                    </header>

                    <img class="article-image"
                         src="{{ asset('storage/' . $berita->image) }}"
                         alt="{{ $berita->ket_image }}">

                    @if($berita->ket_image)
                    <div class="image-caption">
                        <i class="far fa-image mr-2"></i>{{ $berita->ket_image }}
                    </div>
                    @endif

                    <div class="article-body">
                        <div class="article-credits">
                            <div class="credit-item">
                                <div class="credit-label">Reporter</div>
                                <p class="credit-name">{{ $berita->reporter->nama }}</p>
                            </div>
                            <div class="credit-item">
                                <div class="credit-label">Editor</div>
                                <p class="credit-name">{{ $berita->editor->nama }}</p>
                            </div>
                        </div>

                        <div class="article-content content-berita">
                            {!! $berita->content !!}
                        </div>
                    </div>

                    <footer class="article-footer">
                        <div class="article-author">{{ $berita->user->name }}</div>
                        <div class="article-views">
                            <i class="far fa-eye"></i>
                            <span>{{ number_format($berita->view) }}</span>
                        </div>
                    </footer>
                </article>

                <!-- Sidebar -->
                <aside class="sidebar">
                    <!-- Popular News -->
                    <div class="sidebar-card">
                        <div class="sidebar-header">Berita trending</div>
                        <div class="sidebar-content">
                            @forelse($beritaPopuler as $popular)
                            <article class="popular-item">
                                <img class="popular-image"
                                     src="{{ asset('storage/' . $popular->image) }}"
                                     alt="{{ $popular->judul }}">
                                <div class="popular-content">
                                    <div class="popular-meta">
                                        <span class="popular-category">{{ $popular->kategori->first()->name }}</span>
                                        <span class="popular-date">{{ \Carbon\Carbon::parse($popular->tanggal)->format('d M Y') }}</span>
                                    </div>
                                    <a href="{{ route('frontend.beritaDetail', $popular->slug) }}"
                                       class="popular-title">
                                        {{ Str::limit($popular->judul, 80) }}
                                    </a>
                                </div>
                            </article>
                            @empty
                            <div class="text-center text-muted">
                                <p>Belum ada berita trending</p>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="sidebar-card">
                        <div class="sidebar-header">Kategori</div>
                        <div class="sidebar-content">
                            <div class="tags-container">
                                @foreach ($kategori as $item)
                                <a href="{{ route('frontend.' . strtolower(str_replace(' ', '', $item->name))) }}"
                                   class="tag-item">{{ $item->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection