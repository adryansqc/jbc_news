@php
    $kategories = App\Models\Categorie::all();
    $beritaPopuler = App\Models\Berita::with(['kategori:id,name', 'user'])->where('status', true)->orderBy('view', 'desc')->take(3)->get();
@endphp

<!-- Footer Start -->
<footer class="modern-footer">
    <div class="container-fluid footer-content">
        <div class="row py-4 py-md-5">
            <!-- Contact Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="footer-widget">
                    <div class="widget-header">
                        <div class="">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h5>Hubungi Kami</h5>
                    </div>
                    
                    <div class="contact-list">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h6>Alamat</h6>
                                <p>Jl. Kapt. A. Bakaruddin, Kelurahan Selamat, Kecamatan Danau Sipin, Kota Jambi, 36124</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <h6>Email</h6>
                                <a href="mailto:media@jambisnis.com">media@jambisnis.com</a>
                                <a href="mailto:pimred@jambisnis.com">pimred@jambisnis.com</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Media -->
                    <div class="social-section">
                        <h6><i class="fas fa-share-alt"></i> Ikuti Kami</h6>
                        <div class="social-links">
                            <a href="https://www.tiktok.com/@jambisnisnews" class="social-btn" target="_blank">
                                <i class="fab fa-tiktok"></i>
                            </a>
                            <a href="https://www.instagram.com/jambisniscom/" class="social-btn" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://www.facebook.com/jambisnisdotcom" class="social-btn" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.youtube.com/@Jambisnis" class="social-btn" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popular News -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="footer-widget">
                    <div class="widget-header">
                        <div class="">
                            <i class="fas fa-fire"></i>
                        </div>
                        <h5>Berita Trending</h5>
                    </div>
                    
                    <div class="news-list">
                        @foreach ($beritaPopuler as $item)
                        <article class="news-card">
                            <div class="news-meta">
                                <a class="badge-tag" href="{{ route('frontend.' . strtolower(str_replace(' ', '', $item->kategori->first()->name))) }}">
                                    {{ $item->kategori->first()->name }}
                                </a>
                                <time>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('D MMM Y') }}</time>
                            </div>
                            <a href="{{ route('frontend.beritaDetail', $item->slug) }}" class="news-title">
                                {{ Str::limit($item->judul, 70) }}
                            </a>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Categories & Links -->
            <div class="col-lg-4 col-md-12">
                <div class="footer-widget">
                    <!-- Categories -->
                    <div class="widget-header">
                        <div class="">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h5>Kategori</h5>
                    </div>
                    
                    <div class="category-tags mb-4">
                        @foreach ($kategories->take(6) as $item)
                        <a href="#" class="tag-pill">{{ $item->name }}</a>
                        @endforeach
                    </div>
                    
                    <!-- Links -->
                    <div class="company-links">
                        <h6><i class="fas fa-info-circle"></i> Info Perusahaan</h6>
                        <a href="{{ route('frontend.aboutus') }}" class="link-item">
                            <i class="fas fa-building"></i>
                            <span>Tentang Kami</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                        <a href="{{ route('frontend.redaksi') }}" class="link-item">
                            <i class="fas fa-users"></i>
                            <span>Tim Redaksi</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container-fluid">
            <div class="row align-items-center py-3">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; {{ date('Y') }} <strong>Copyright Jambisnis.com</strong></p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="badges"></div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
/* CSS Variables */
:root {
    --primary: #2563eb;
    --secondary: #475569;
    --text-light: #64748b;
    --text-dark: #334155;
    --border-light: #e2e8f0;
    --bg-gray: #f8fafc;
    --white: #ffffff;
    --dark: #1e293b;
    --accent: #dc2626;
}

/* Main Footer */
.modern-footer {
    margin-top: 3rem;
    background-color: var(--dark);
    color: var(--white);
}

.footer-content {
    border-bottom: 1px solid #334155;
}

/* Widget Styles */
.footer-widget {
    margin-bottom: 2rem;
}

.widget-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid #334155;
}

.widget-header h5 {
    color: var(--white);
    font-weight: 600;
    font-size: 1.1rem;
    margin: 0;
}

/* Contact Styles */
.contact-list {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
    margin-bottom: 2rem;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
}

.contact-item i {
    color: var(--primary);
    font-size: 1rem;
    margin-top: 0.25rem;
    min-width: 18px;
}

.contact-item h6 {
    color: var(--white);
    font-weight: 600;
    margin-bottom: 0.25rem;
    font-size: 0.875rem;
}

.contact-item p,
.contact-item a {
    color: var(--text-light);
    margin: 0;
    line-height: 1.5;
    font-size: 0.875rem;
    text-decoration: none;
    transition: color 0.2s ease;
}

.contact-item a {
    color: #93c5fd;
    display: block;
}

.contact-item a:hover {
    color: var(--primary);
    text-decoration: none;
}

/* Social Media */
.social-section h6 {
    color: var(--white);
    font-weight: 600;
    margin-bottom: 1rem;
    font-size: 0.875rem;
}

.social-links {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.social-btn {
    width: 40px;
    height: 40px;
    background-color: #334155;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 1.1rem;
    text-decoration: none;
    transition: all 0.2s ease;
    border: 1px solid #475569;
}

.social-btn:hover {
    background-color: var(--primary);
    transform: translateY(-2px);
    color: var(--white);
    text-decoration: none;
}

/* News Cards */
.news-list {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}

.news-card {
    padding-bottom: 1.25rem;
    border-bottom: 1px solid #334155;
}

.news-card:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.news-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 0.75rem;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.badge-tag {
    background-color: var(--primary);
    color: var(--white);
    padding: 0.25rem 0.75rem;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 500;
    text-decoration: none;
    transition: background-color 0.2s ease;
    flex-shrink: 0;
}

.badge-tag:hover {
    background-color: #1d4ed8;
    color: var(--white);
    text-decoration: none;
}

.news-meta time {
    color: var(--text-light);
    font-size: 0.75rem;
}

.news-title {
    color: var(--white);
    text-decoration: none;
    font-weight: 500;
    font-size: 0.875rem;
    line-height: 1.5;
    transition: color 0.2s ease;
    display: block;
}

.news-title:hover {
    color: var(--primary);
    text-decoration: none;
}

/* Category Tags */
.category-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 2rem;
}

.tag-pill {
    background-color: #334155;
    color: #e2e8f0;
    padding: 0.375rem 0.75rem;
    border-radius: 6px;
    text-decoration: none;
    font-size: 0.75rem;
    font-weight: 500;
    border: 1px solid #475569;
    transition: all 0.2s ease;
}

.tag-pill:hover {
    background-color: var(--primary);
    color: var(--white);
    text-decoration: none;
    border-color: var(--primary);
}

/* Company Links */
.company-links h6 {
    color: var(--white);
    font-weight: 600;
    margin-bottom: 1rem;
    font-size: 0.875rem;
}

.link-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: #e2e8f0;
    text-decoration: none;
    padding: 0.75rem 0;
    border-bottom: 1px solid #334155;
    transition: color 0.2s ease;
}

.link-item:hover {
    color: var(--primary);
    text-decoration: none;
}

.link-item:last-child {
    border-bottom: none;
}

.link-item i:first-child {
    color: var(--primary);
    width: 18px;
}

.link-item i:last-child {
    margin-left: auto;
    color: var(--text-light);
    font-size: 0.875rem;
}

/* Footer Bottom */
.footer-bottom {
    background-color: #0f172a;
    border-top: 1px solid #334155;
}

.footer-bottom p {
    color: var(--text-light);
    font-size: 0.875rem;
}

.badges {
    display: flex;
    gap: 1rem;
    justify-content: end;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .footer-content {
        padding: 2rem 1rem;
    }
    
    .widget-header {
        margin-bottom: 1.25rem;
        padding-bottom: 0.5rem;
    }
    
    .widget-header h5 {
        font-size: 1rem;
    }
    
    .icon-box {
        width: 32px;
        height: 32px;
        font-size: 0.875rem;
    }
    
    .social-btn {
        width: 36px;
        height: 36px;
        font-size: 1rem;
    }
    
    .social-links {
        justify-content: flex-start;
    }
    
    .category-tags {
        justify-content: flex-start;
    }
    
    .badges {
        justify-content: center !important;
        margin-top: 1rem;
    }
    
    .news-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .contact-item {
        gap: 0.5rem;
    }
    
    .contact-list {
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    
    .news-title {
        font-size: 0.875rem;
    }
    
    .badge-tag {
        font-size: 0.7rem;
        padding: 0.2rem 0.6rem;
    }
    
    .footer-bottom .row > div {
        text-align: center !important;
    }
}

@media (max-width: 576px) {
    .container-fluid {
        padding-left: 1rem !important;
        padding-right: 1rem !important;
    }
    
    .footer-content {
        padding: 1.5rem 0;
    }
    
    .footer-widget {
        margin-bottom: 1.5rem;
    }
    
    .widget-header {
        gap: 0.5rem;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
    }
    
    .social-links,
    .category-tags {
        justify-content: center;
    }
    
    .contact-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .contact-item i {
        margin-top: 0;
    }
    
    .news-card {
        padding-bottom: 1rem;
    }
    
    .link-item {
        padding: 0.5rem 0;
    }
}

@media (max-width: 480px) {
    .news-meta {
        gap: 0.375rem;
    }
    
    .badge-tag {
        font-size: 0.65rem;
        padding: 0.175rem 0.5rem;
    }
    
    .news-title {
        font-size: 0.8rem;
        line-height: 1.4;
    }
    
    .social-btn {
        width: 34px;
        height: 34px;
        font-size: 0.9rem;
    }
    
    .tag-pill {
        font-size: 0.7rem;
        padding: 0.3rem 0.6rem;
    }
}
</style>
<!-- Footer End -->