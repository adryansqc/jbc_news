@extends('fe.layouts.app')

@section('title')
    Hasil Pencarian: {{ $query }}
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container search-container">
        <div class="row">
            <!-- Search Results -->
            <div class="col-lg-8">
                <div class="results-section">
                    <div class="section-header">
                        <h2>Hasil Pencarian</h2>
                        <span class="article-count">{{ $hasilPencarian->total() }} artikel</span>
                    </div>

                    @forelse($hasilPencarian as $index => $item)
                        @if($index == 0)
                            <!-- Featured Article -->
                            <article class="featured-article">
                                <div class="featured-image">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->judul }}">
                                    <div class="featured-overlay"></div>
                                </div>
                                <div class="featured-content">
                                    <div class="article-meta">
                                        <span class="category-badge">{{ $item->kategori->first()->name }}</span>
                                        <time class="article-date">
                                            {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('D MMMM Y') }}
                                        </time>
                                    </div>
                                    <h3 class="featured-title">
                                        <a href="{{ route('frontend.beritaDetail', $item->slug) }}">{{ $item->judul }}</a>
                                    </h3>
                                    <p class="featured-excerpt">{{ Str::limit(strip_tags($item->isi ?? $item->content), 180) }}</p>
                                    <div class="article-footer">
                                        <span class="author">{{ $item->user->name }}</span>
                                        <span class="views"><i class="far fa-eye"></i>{{ number_format($item->view) }}</span>
                                    </div>
                                </div>
                            </article>
                        @else
                            @if(($index - 1) % 4 == 0 && $index > 1)</div><div class="articles-grid">@endif
                            
                            @if($index == 1)<div class="articles-grid">@endif
                            
                            <!-- Regular Article Card -->
                            <article class="article-card">
                                <div class="card-image">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->judul }}">
                                    <div class="image-overlay"></div>
                                </div>
                                <div class="card-content">
                                    <div class="article-meta">
                                        <span class="category-badge">{{ $item->kategori->first()->name }}</span>
                                        <time class="article-date">
                                            {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('D MMM Y') }}
                                        </time>
                                    </div>
                                    <h4 class="card-title">
                                        <a href="{{ route('frontend.beritaDetail', $item->slug) }}">
                                            {{ Str::limit($item->judul, 85) }}
                                        </a>
                                    </h4>
                                    <p class="card-excerpt">{{ Str::limit(strip_tags($item->isi ?? $item->content), 130) }}</p>
                                    <div class="article-footer">
                                        <span class="author">{{ $item->user->name }}</span>
                                        <span class="views"><i class="far fa-eye"></i>{{ number_format($item->view) }}</span>
                                    </div>
                                </div>
                            </article>
                        @endif
                        
                        @if($loop->last && $index > 0)</div>@endif
                    @empty
                        <!-- Empty State -->
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <h3>Tidak Ada Hasil Ditemukan</h3>
                            <p>Maaf, tidak ada artikel yang sesuai dengan pencarian "<strong>{{ $query }}</strong>"</p>
                            <div class="search-tips">
                                <h4>Tips Pencarian:</h4>
                                <ul>
                                    <li>Periksa ejaan kata kunci</li>
                                    <li>Gunakan kata kunci yang lebih umum</li>
                                    <li>Coba dengan sinonim kata</li>
                                    <li>Kurangi jumlah kata kunci</li>
                                </ul>
                            </div>
                        </div>
                    @endforelse

                    <!-- Pagination -->
                    @if($hasilPencarian->hasPages())
                        <div class="pagination-wrapper">
                            {{ $hasilPencarian->appends(['q' => $query])->links() }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <aside class="search-sidebar">
                    <!-- Related Searches -->
                    @if($hasilPencarian->count() > 0)
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Pencarian Terkait</h3>
                        <div class="related-tags">
                            @php
                                $relatedSearches = ['berita terbaru', 'informasi terkini', 'update news', 'artikel populer', 'trending topic'];
                            @endphp
                            @foreach($relatedSearches as $related)
                                <a href="{{ route('frontend.search') }}?q={{ $related }}" class="tag-link">{{ $related }}</a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Trending News -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Trending News</h3>
                        <div class="trending-list">
                            @forelse($beritaPopuler ?? [] as $item)
                            <article class="trending-item">
                                <div class="trending-image">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->judul }}">
                                </div>
                                <div class="trending-content">
                                    <div class="article-meta">
                                        <span class="category-badge">{{ $item->kategori->first()->name }}</span>
                                        <time>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('D MMM') }}</time>
                                    </div>
                                    <h4 class="trending-title">
                                        <a href="{{ route('frontend.beritaDetail', $item->slug) }}">
                                            {{ Str::limit($item->judul, 60) }}
                                        </a>
                                    </h4>
                                </div>
                            </article>
                            @empty
                            <div class="empty-trending">
                                <i class="fas fa-newspaper"></i>
                                <p>Belum ada berita populer</p>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Kategori</h3>
                        <div class="category-tags">
                            @foreach ($kategori ?? [] as $item)
                                <a href="{{ route('frontend.' . strtolower(str_replace(' ', '', $item->name))) }}" 
                                   class="category-link">{{ $item->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <style>
/* ===== SEARCH PAGE STYLES ===== */
:root {
    --primary-color: #2563eb;
    --primary-dark: #1d4ed8;
    --secondary-color: #64748b;
    --success-color: #10b981;
    --text-color: #1e293b;
    --text-muted: #64748b;
    --border-color: #e2e8f0;
    --bg-light: #f8fafc;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --radius-sm: 6px;
    --radius-md: 8px;
    --radius-lg: 12px;
    --spacing-xs: 0.5rem;
    --spacing-sm: 1rem;
    --spacing-md: 1.5rem;
    --spacing-lg: 2rem;
    --spacing-xl: 3rem;
}

/* Reset any positioning issues */
* {
    box-sizing: border-box;
}

/* Ensure body doesn't have margins that could push navbar down */
body {
    margin: 0;
    padding: 0;
}

/* Main Container */
.search-container {
    padding: var(--spacing-lg) 0;
    max-width: 1200px;
    margin-top: 0; /* Remove any top margin */
}

/* Section Header */
.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--spacing-lg);
    padding-bottom: var(--spacing-sm);
    border-bottom: 3px solid var(--primary-color);
}

.section-header h2 {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text-color);
    margin: 0;
}

.article-count {
    color: var(--text-muted);
    font-weight: 500;
}

/* Featured Article */
.featured-article {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0;
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    margin-bottom: var(--spacing-xl);
    transition: transform 0.3s ease;
}

.featured-article:hover {
    transform: translateY(-5px);
}

.featured-image {
    position: relative;
    overflow: hidden;
}

.featured-image img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.featured-article:hover .featured-image img {
    transform: scale(1.05);
}

.featured-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(45deg, rgba(37, 99, 235, 0.1), transparent);
}

.featured-content {
    padding: var(--spacing-lg);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.featured-title {
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1.3;
    margin: var(--spacing-sm) 0;
}

.featured-title a {
    color: var(--text-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.featured-title a:hover {
    color: var(--primary-color);
}

.featured-excerpt {
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: var(--spacing-md);
    flex-grow: 1;
}

/* Articles Grid */
.articles-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--spacing-lg);
    margin-bottom: var(--spacing-xl);
}

/* Article Card */
.article-card {
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
    height: fit-content;
}

.article-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
}

.card-image {
    position: relative;
    overflow: hidden;
}

.card-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.article-card:hover .card-image img {
    transform: scale(1.05);
}

.image-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent, rgba(0,0,0,0.1));
}

.card-content {
    padding: var(--spacing-md);
}

.card-title {
    font-size: 1.1rem;
    font-weight: 600;
    line-height: 1.4;
    margin: var(--spacing-xs) 0 var(--spacing-sm);
}

.card-title a {
    color: var(--text-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.card-title a:hover {
    color: var(--primary-color);
}

.card-excerpt {
    color: var(--text-muted);
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: var(--spacing-md);
}

/* Article Meta */
.article-meta {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    margin-bottom: var(--spacing-sm);
}

.category-badge {
    background: linear-gradient(45deg, var(--primary-color), var(--primary-dark));
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-decoration: none;
}

.article-date {
    color: var(--text-muted);
    font-size: 0.8rem;
}

/* Article Footer */
.article-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: var(--spacing-sm);
    border-top: 1px solid var(--border-color);
    margin-top: auto;
}

.author {
    color: var(--text-muted);
    font-size: 0.85rem;
    font-weight: 500;
}

.views {
    color: var(--text-muted);
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    gap: 4px;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: var(--spacing-xl) var(--spacing-lg);
    background: var(--bg-light);
    border-radius: var(--radius-lg);
}

.empty-icon {
    font-size: 4rem;
    color: var(--text-muted);
    margin-bottom: var(--spacing-md);
}

.empty-state h3 {
    color: var(--text-color);
    margin-bottom: var(--spacing-sm);
}

.empty-state p {
    color: var(--text-muted);
    margin-bottom: var(--spacing-lg);
}

.search-tips {
    background: white;
    padding: var(--spacing-md);
    border-radius: var(--radius-md);
    border-left: 4px solid var(--primary-color);
    text-align: left;
    max-width: 400px;
    margin: 0 auto;
}

.search-tips h4 {
    color: var(--text-color);
    margin-bottom: var(--spacing-sm);
}

.search-tips ul {
    list-style: none;
    padding: 0;
}

.search-tips li {
    color: var(--text-muted);
    margin-bottom: var(--spacing-xs);
    position: relative;
    padding-left: 1.5rem;
}

.search-tips li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--success-color);
    font-weight: bold;
}

/* Sidebar */
.search-sidebar {
    position: sticky;
    top: var(--spacing-lg);
}

.sidebar-widget {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    margin-bottom: var(--spacing-lg);
    overflow: hidden;
}

.widget-title {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    font-size: 1.1rem;
    font-weight: 600;
    padding: var(--spacing-md);
    margin: 0;
}

/* Related Tags */
.related-tags, .category-tags {
    padding: var(--spacing-md);
    display: flex;
    flex-wrap: wrap;
    gap: var(--spacing-xs);
}

.tag-link, .category-link {
    background: var(--bg-light);
    color: var(--text-color);
    padding: 6px 12px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 500;
    transition: all 0.3s ease;
    border: 1px solid var(--border-color);
}

.tag-link:hover, .category-link:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
}

/* Trending List */
.trending-list {
    padding: var(--spacing-md);
}

.trending-item {
    display: flex;
    gap: var(--spacing-sm);
    padding: var(--spacing-sm);
    border-radius: var(--radius-md);
    transition: background-color 0.3s ease;
    margin-bottom: var(--spacing-sm);
}

.trending-item:hover {
    background: var(--bg-light);
}

.trending-image img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: var(--radius-sm);
}

.trending-content {
    flex: 1;
}

.trending-title {
    font-size: 0.9rem;
    font-weight: 600;
    line-height: 1.3;
    margin: var(--spacing-xs) 0 0;
}

.trending-title a {
    color: var(--text-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.trending-title a:hover {
    color: var(--primary-color);
}

.empty-trending {
    text-align: center;
    padding: var(--spacing-lg);
    color: var(--text-muted);
}

.empty-trending i {
    font-size: 2rem;
    margin-bottom: var(--spacing-sm);
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: var(--spacing-xl);
}

/* ===== RESPONSIVE DESIGN ===== */

/* Tablet */
@media (max-width: 992px) {
    .search-sidebar {
        position: static;
        margin-top: var(--spacing-xl);
    }
    
    .articles-grid {
        grid-template-columns: 1fr;
    }
}

/* Mobile */
@media (max-width: 768px) {
    .search-container {
        padding: var(--spacing-md) 0;
    }
    
    .featured-article {
        grid-template-columns: 1fr;
    }
    
    .featured-image img {
        height: 250px;
    }
    
    .featured-content {
        padding: var(--spacing-md);
    }
    
    .featured-title {
        font-size: 1.3rem;
    }
    
    .section-header {
        flex-direction: column;
        align-items: flex-start;
        gap: var(--spacing-xs);
    }
    
    .section-header h2 {
        font-size: 1.5rem;
    }
    
    .card-image img {
        height: 180px;
    }
    
    .card-content {
        padding: var(--spacing-sm);
    }
    
    .trending-image img {
        width: 70px;
        height: 70px;
    }
    
    .trending-title {
        font-size: 0.85rem;
    }
}

/* Small Mobile */
@media (max-width: 576px) {
    .search-container {
        padding: var(--spacing-sm) 0;
    }
    
    .featured-image img {
        height: 200px;
    }
    
    .card-image img {
        height: 160px;
    }
    
    .article-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: var(--spacing-xs);
    }
    
    .trending-item {
        flex-direction: column;
        text-align: center;
    }
    
    .trending-image img {
        width: 100%;
        height: 150px;
    }
}

/* Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.article-card, .featured-article, .sidebar-widget {
    animation: fadeInUp 0.6s ease forwards;
}

.article-card:nth-child(even) {
    animation-delay: 0.1s;
}

.sidebar-widget:nth-child(2) {
    animation-delay: 0.2s;
}

.sidebar-widget:nth-child(3) {
    animation-delay: 0.3s;
}
    </style>
@endsection