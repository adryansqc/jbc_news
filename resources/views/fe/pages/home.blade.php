@extends('fe.layouts.app')

@section('title')
    Informasi Akurat Bisnis Melesat
@endsection

@section('content')
    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    @forelse($sliderBerita as $berita)
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="{{ asset('storage/' . $berita->image) }}">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary font-weight-semi-bold p-2 mr-2"
                                    href="">{{ $berita->kategori->first()->name }}</a>
                                <a class="text-white" href="">{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</a>
                            </div>
                            <a class="h2 m-0 text-white font-weight-bold"
                               href="{{ route('frontend.beritaDetail', $berita->slug) }}">{{ $berita->judul }}</a>
                        </div>
                    </div>
                    @empty
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="{{ asset('news') }}/img/news-800x500-1.jpg">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary font-weight-semi-bold p-2 mr-2"
                                    href="">Business</a>
                                <a class="text-white" href="">Jan 01, 2045</a>
                            </div>
                            <a class="h2 m-0 text-white font-weight-bold" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="col-lg-5 px-0 mobile-hide">
                <div class="row mx-0 mobile-news-grid">
                    @forelse($beritaTerbaru as $berita)
                    <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset('storage/' . $berita->image) }}">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary font-weight-semi-bold p-2 mr-2"
                                        href="">{{ $berita->kategori->first()->name }}</a>
                                    <a class="text-white" href=""><small>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</small></a>
                                </div>
                                <a class="h6 m-0 text-white font-weight-semi-bold"
                               href="{{ route('frontend.beritaDetail', $berita->slug) }}">{{ Str::limit($berita->judul, 50) }}</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hiddenm style="height: 250px;"ain-news">
                            <img class="img-fluid w-100 h-100" src="{{ asset('news') }}/img/news-700x435-1.jpg">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary font-weight-semi-bold p-2 mr-2"
                                        href="">Business</a>
                                    <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-white font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->

    <!-- Breaking News Start -->
    <!--<div class="container-fluid bg-dark py-3 mb-3">-->
    <!--    <div class="container">-->
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Breaking News</div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px;">
                            @forelse($breakingNews as $berita)
                            <div class="text-truncate">
                                <a class="text-white font-weight-semi-bold"
                                   href="{{ route('frontend.beritaDetail', $berita->slug) }}">{{ $berita->judul }}</a>
                            </div>
                            @empty
                            <div class="text-truncate"><a class="text-white font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->

    <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 font-weight-bold">Berita Populer</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                @forelse($beritaPopuler as $berita)
                <div class="position-relative overflow-hidden" style=3height: 200px;">
                    <img class="img-fluid h-100" src="{{ asset('storage/' . $berita->image) }}">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary font-weight-semi-bold p-2 mr-2"
                                href="">{{ $berita->kategori->first()->name }}</a>
                            <a class="text-white" href=""><small>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</small></a>
                        </div>
                        <a class="h6 m-0 text-white font-weight-semi-bold"
                               href="{{ route('frontend.beritaDetail', $berita->slug) }}">{{ Str::limit($berita->judul, 50) }}</a>
                    </div>
                </div>
                @empty
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="{{ asset('news') }}/img/news-700x435-1.jpg">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary font-weight-semi-bold p-2 mr-2"
                                href="">Business</a>
                            <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                        </div>
                        <a class="h6 m-0 text-white font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 font-weight-bold">Berita Terbaru</h4>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row news-lg mx-0 mb-3">
                                @forelse($beritaUtama as $berita)
                                <div class="col-md-6 h-100 px-0">
                                    <img class="img-fluid h-100" src="{{ asset('storage/' . $berita->image) }}" style="object-fit: cover; width: 700px; height: 435px;">
                                </div>
                                <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                                    <div class="mt-auto p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary font-weight-semi-bold p-2 mr-2"
                                                href="">{{ $berita->kategori->first()->name }}</a>
                                            <a class="text-body" href=""><small>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary font-weight-bold"
                               href="{{ route('frontend.beritaDetail', $berita->slug) }}">{{ $berita->judul }}</a>
                                        <p class="m-0">{{ Str::limit($berita->isi, 100) }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                        <div class="d-flex align-items-center">
                                            <small>{{ $berita->user->name }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $berita->view }}</small>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-md-6 h-100 px-0">
                                    <img class="img-fluid h-100" src="{{ asset('news') }}/img/news-700x435-5.jpg">
                                </div>
                                <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                                    <div class="mt-auto p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary font-weight-semi-bold p-2 mr-2"
                                                href="">Business</a>
                                            <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                            rebum clita rebum dolor stet amet justo</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="{{ asset('news') }}/img/user.jpg" width="25" height="25" alt="">
                                            <small>John Doe</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @php
                                $currentPage = $lamanBerita->currentPage();
                                $perPage = $lamanBerita->perPage();
                                $beritaAtas = $lamanBerita->slice(0, 5); 
                                $beritaBawah = $lamanBerita->slice(5); 
                            @endphp

                            
                            @foreach($beritaAtas as $berita)
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ $berita->image ? asset('storage/' . $berita->image) : asset('news') . '/img/news-800x500-1.jpg' }}" style="object-fit: cover; width: 110px; height: 110px;" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary font-weight-semi-bold p-1 mr-2"
                                           href="">{{ $berita->kategori->first()->name }}</a>
                                        <a class="text-body" href=""><small>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary font-weight-bold"
                                       href="{{ route('frontend.beritaDetail', $berita->slug) }}">{{ Str::limit($berita->judul, 50) }}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        
                        @include('fe.components.corausel')

                        <div class="col-lg-12">
                            
                            @foreach($beritaBawah as $berita)
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ $berita->image ? asset('storage/' . $berita->image) : asset('news') . '/img/news-800x500-1.jpg' }}" style="object-fit: cover; width: 110px; height: 110px;" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary font-weight-semi-bold p-1 mr-2"
                                           href="">{{ $berita->kategori->first()->name }}</a>
                                        <a class="text-body" href=""><small>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary font-weight-bold"
                                       href="{{ route('frontend.beritaDetail', $berita->slug) }}">{{ Str::limit($berita->judul, 50) }}</a>
                                </div>
                            </div>
                            @endforeach

                            
                            <div class="d-flex justify-content-center mt-4">
                                {{ $lamanBerita->links() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Trending News Section -->
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

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 font-weight-bold">Tags</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">
                                @foreach ($kategori as $item)
                                <a href="{{ route('frontend.' . strtolower(str_replace(' ', '', $item->name))) }}"
                                   class="btn btn-sm btn-outline-secondary m-1">{{ $item->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

    <style>
/* CSS Variables */
:root {
    --primary: #007bff;
    --primary-dark: #0056b3;
    --text: #333;
    --text-muted: #6c757d;
    --bg-light: #f8f9fa;
    --shadow: 0 2px 8px rgba(0,0,0,0.1);
    --radius: 8px;
}

/* Base Styles */
img { object-fit: cover; transition: transform 0.3s ease; }
.container-fluid, .container { padding: 0 8px; }

/* Badge */
.badge {
    font-size: 10px; font-weight: 600; padding: 4px 8px;
    border-radius: 12px; white-space: nowrap;
    background: linear-gradient(45deg, var(--primary), var(--primary-dark)) !important;
}

/* Mobile Hide for 4 small news */
@media (max-width: 768px) {
    .mobile-hide { display: none !important; }

    /* Adjust main slider to full width on mobile */
    .col-lg-7 {
        width: 100% !important;
        flex: 0 0 100% !important;
        max-width: 100% !important;
    }

    /* Main slider mobile optimization */
    .main-slider-item {
        height: 280px !important;
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        margin: 0 4px;
    }

    .main-slider-item img {
        height: 100%;
        width: 100%;
    }

    .main-slider-item .overlay {
        background: linear-gradient(transparent 40%, rgba(0,0,0,0.7));
        padding: 16px !important;
    }

    .main-slider-item .h2 {
        font-size: 1.1rem !important;
        line-height: 1.4 !important;
        font-weight: 700 !important;
        display: -webkit-box !important;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .main-slider-item .badge {
        font-size: 0.7rem !important;
        padding: 4px 8px !important;
    }
}

/* Breaking News Mobile */
/* Owl Carousel Navigation Arrows - Make them even smaller */
.owl-carousel .owl-nav button.owl-next,
.owl-carousel .owl-nav button.owl-prev {
    width: 25px !important;        /* Dikecilkan dari 35px */
    height: 25px !important;       /* Dikecilkan dari 35px */
    font-size: 12px !important;    /* Dikecilkan dari 14px */
    line-height: 25px !important;  /* Sesuaikan dengan height */
    border-radius: 50% !important;
    background: rgba(0, 0, 0, 0.6) !important;
    color: white !important;
    border: none !important;
    position: absolute !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    z-index: 10 !important;
    transition: all 0.3s ease !important;
}

.owl-carousel .owl-nav button.owl-prev {
    left: 8px !important;          /* Sesuaikan jarak dari tepi */
}

.owl-carousel .owl-nav button.owl-next {
    right: 8px !important;         /* Sesuaikan jarak dari tepi */
}

/* Mobile specific - even smaller */
@media (max-width: 768px) {
    .owl-carousel .owl-nav button.owl-next,
    .owl-carousel .owl-nav button.owl-prev {
        width: 20px !important;        /* Dikecilkan dari 28px */
        height: 20px !important;       /* Dikecilkan dari 28px */
        font-size: 10px !important;    /* Dikecilkan dari 12px */
        line-height: 20px !important;  /* Sesuaikan dengan height */
    }

    .owl-carousel .owl-nav button.owl-prev {
        left: 5px !important;          /* Sesuaikan jarak dari tepi */
    }

    .owl-carousel .owl-nav button.owl-next {
        right: 5px !important;         /* Sesuaikan jarak dari tepi */
    }
}

/* Hover effect */
.owl-carousel .owl-nav button:hover {
    background: rgba(0, 123, 255, 0.8) !important;
    transform: translateY(-50%) scale(1.1) !important;
}

/* Hide navigation on very small screens if needed */
@media (max-width: 480px) {
    .owl-carousel .owl-nav {
        display: none !important;
    }
}

/* For breaking news carousel specifically - make even smaller */
.tranding-carousel .owl-nav button.owl-next,
.tranding-carousel .owl-nav button.owl-prev {
    width: 18px !important;        /* Dikecilkan dari 25px */
    height: 18px !important;       /* Dikecilkan dari 25px */
    font-size: 8px !important;     /* Dikecilkan dari 10px */
    line-height: 18px !important;  /* Sesuaikan dengan height */
}

/* For main carousel - keep slightly larger but still smaller than original */
.main-carousel .owl-nav button.owl-next,
.main-carousel .owl-nav button.owl-prev {
    width: 30px !important;        /* Dikecilkan dari 40px */
    height: 30px !important;       /* Dikecilkan dari 40px */
    font-size: 14px !important;    /* Dikecilkan dari 16px */
    line-height: 30px !important;  /* Sesuaikan dengan height */
}

@media (max-width: 768px) {
    .main-carousel .owl-nav button.owl-next,
    .main-carousel .owl-nav button.owl-prev {
        width: 24px !important;        /* Dikecilkan dari 32px */
        height: 24px !important;       /* Dikecilkan dari 32px */
        font-size: 12px !important;    /* Dikecilkan dari 14px */
        line-height: 24px !important;  /* Sesuaikan dengan height */
    }
}
/* Enhanced Floating Badge Style - Dark Theme */
@media (max-width: 768px) {
    .container-fluid.bg-dark {
        background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%) !important;
        position: relative;
        padding: 25px 0 15px !important;
        border-radius: 0 0 20px 20px;
    }

    .container-fluid.bg-dark .d-flex {
        flex-direction: column !important;
        gap: 0;
        position: relative;
    }

    /* Enhanced Floating Badge */
    .bg-primary.text-dark {
        width: fit-content !important;
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%) !important;
        color: white !important;
        border-radius: 0 20px 20px 0 !important;
        font-size: 0.8rem !important;
        font-weight: 600 !important;
        padding: 10px 20px !important;
        position: absolute;
        top: -15px;
        left: 0;
        z-index: 10;
        box-shadow:
            0 4px 15px rgba(0, 123, 255, 0.3),
            0 2px 8px rgba(0, 0, 0, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: 2px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    /* Badge hover effect */
    .bg-primary.text-dark:hover {
        transform: translateY(-2px);
        box-shadow:
            0 6px 20px rgba(0, 123, 255, 0.4),
            0 4px 12px rgba(0, 0, 0, 0.4);
    }

    /* Dark News Container */
    .tranding-carousel {
        width: 100% !important;
        margin-left: 0 !important;
        padding: 20px 18px 18px !important;
        background: rgba(0, 0, 0, 0.3) !important;
        border-radius: 18px !important;
        box-shadow:
            0 8px 32px rgba(0, 0, 0, 0.2),
            0 2px 16px rgba(0, 0, 0, 0.15) !important;
        margin-top: 8px !important;
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        position: relative;
        overflow: hidden;
    }

    /* Subtle top border accent */
    .tranding-carousel::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #007bff 0%, #0056b3 100%);
        border-radius: 18px 18px 0 0;
    }

    /* White News Text Styling */
    .tranding-carousel a {
        font-size: 0.88rem !important;
        color: #ffffff !important;
        font-weight: 500 !important;
        line-height: 1.5 !important;
        text-decoration: none !important;
        transition: all 0.3s ease !important;
        display: block !important;
        padding: 2px 0 !important;
    }

    .tranding-carousel a:hover {
        color: #007bff !important;
        transform: translateX(4px) !important;
    }

    /* Subtle animation for carousel items */
    .tranding-carousel .text-truncate {
        transition: all 0.3s ease;
        padding: 4px 0;
        border-radius: 8px;
    }

    .tranding-carousel .text-truncate:hover {
        background: rgba(0, 123, 255, 0.1);
        padding-left: 8px;
    }

    /* Add subtle glow effect for dark theme */
    .container-fluid.bg-dark::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 20% 30%, rgba(0, 123, 255, 0.05) 0%, transparent 50%);
        pointer-events: none;
        border-radius: 0 0 20px 20px;
    }
}

/* Smooth entrance animation */
@keyframes slideInFromLeft {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes fadeInUp {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@media (max-width: 768px) {
    .bg-primary.text-dark {
        animation: slideInFromLeft 0.6s ease-out;
    }

    .tranding-carousel {
        animation: fadeInUp 0.8s ease-out 0.2s both;
    }
}

/* Featured News Mobile */
@media (max-width: 768px) {
    .news-carousel .position-relative {
        height: 160px !important;
        border-radius: var(--radius) !important;
        margin: 0 3px !important;
        box-shadow: var(--shadow);
    }

    .news-carousel .overlay {
        padding: 10px !important;
    }

    .news-carousel .h6 {
        font-size: 0.8rem !important;
        line-height: 1.3;
    }

    .news-carousel .badge {
        font-size: 0.6rem !important;
        padding: 2px 6px;
    }
}

/* Main Article Mobile */
@media (max-width: 768px) {
    .news-image {
        height: 200px !important;
        border-radius: var(--radius) var(--radius) 0 0;
    }

    .col-md-6.d-flex.flex-column {
        border-radius: 0 0 var(--radius) var(--radius);
        box-shadow: var(--shadow);
    }

    .col-md-6.d-flex.flex-column .p-4 {
        padding: 15px !important;
    }

    .col-md-6.d-flex.flex-column .h4 {
        font-size: 1.1rem !important;
        line-height: 1.4;
    }
}

/* News List Items Mobile */
@media (max-width: 768px) {
    .d-flex.align-items-center.bg-white {
        height: 90px !important;
        border-radius: var(--radius) !important;
        box-shadow: var(--shadow) !important;
        margin-bottom: 12px !important;
    }

    .d-flex.align-items-center.bg-white img {
        width: 90px !important;
        height: 90px !important;
        border-radius: var(--radius) 0 0 var(--radius);
    }

    .d-flex.align-items-center.bg-white .px-3 {
        padding: 10px 12px !important;
    }

    .d-flex.align-items-center.bg-white .h6 {
        font-size: 0.85rem !important;
        line-height: 1.3;
    }

    .d-flex.align-items-center.bg-white .badge {
        font-size: 0.6rem !important;
        padding: 2px 6px;
    }
}

/* Trending News Section */
.sidebar-widget {
    background: white;
    border-radius: 12px;
    box-shadow: var(--shadow);
    margin-bottom: 24px;
    overflow: hidden;
}

.widget-title {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    font-size: 1.1rem;
    font-weight: 600;
    padding: 16px;
    margin: 0;
}

.trending-list {
    padding: 16px;
}

.trending-item {
    display: flex;
    gap: 12px;
    padding: 12px;
    border-radius: var(--radius);
    transition: background-color 0.3s ease;
    margin-bottom: 12px;
}

.trending-item:hover { background: var(--bg-light); }

.trending-image img {
    width: 80px;
    height: 80px;
    border-radius: 6px;
}

.trending-content { flex: 1; }

.article-meta {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 6px;
}

.category-badge {
    background: var(--primary);
    color: white;
    font-size: 0.7rem;
    font-weight: 600;
    padding: 2px 8px;
    border-radius: 10px;
    text-decoration: none;
}

.article-meta time {
    color: var(--text-muted);
    font-size: 0.75rem;
}

.trending-title {
    font-size: 0.9rem;
    font-weight: 600;
    line-height: 1.3;
    margin: 0;
}

.trending-title a {
    color: var(--text);
    text-decoration: none;
    transition: color 0.3s ease;
}

.trending-title a:hover { color: var(--primary); }

.empty-trending {
    text-align: center;
    padding: 24px;
    color: var(--text-muted);
}

.empty-trending i {
    font-size: 2rem;
    margin-bottom: 8px;
}

/* Section Titles */
.section-title h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #2c3e50;
    padding-bottom: 6px;
    border-bottom: 2px solid var(--primary);
    display: inline-block;
}

/* Sidebar Mobile */
@media (max-width: 992px) {
    .col-lg-4 { margin-top: 25px !important; }

    .col-lg-4 .section-title {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 12px 15px;
        margin: 0;
        border-radius: var(--radius) var(--radius) 0 0;
    }

    .col-lg-4 .section-title h4 {
        color: white !important;
        margin: 0;
        padding: 0;
        border: none;
        font-size: 0.95rem;
    }

    .col-lg-4 .bg-white {
        border-radius: 0 0 var(--radius) var(--radius);
        box-shadow: var(--shadow);
    }
}

/* Tags */
.btn-outline-secondary {
    font-size: 0.75rem !important;
    padding: 6px 12px !important;
    border-radius: 15px !important;
    margin: 3px !important;
    border-color: var(--primary) !important;
    color: var(--primary) !important;
    transition: all 0.3s ease !important;
}

.btn-outline-secondary:hover {
    background-color: var(--primary) !important;
    color: white !important;
    transform: translateY(-1px) !important;
}

/* Responsive Trending */
@media (max-width: 576px) {
    .trending-item {
        flex-direction: column;
        text-align: center;
    }

    .trending-image img {
        width: 100%;
        height: 150px;
    }

    .article-meta {
        justify-content: center;
    }

    .main-slider-item {
        height: 240px !important;
    }
}

/* Hover Effects (Desktop) */
@media (min-width: 769px) {
    .main-news:hover img,
    .position-relative:hover img {
        transform: scale(1.05);
    }

    .d-flex.align-items-center.bg-white:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.15) !important;
    }
}

/* Loading Animation */
.img-fluid {
    opacity: 0;
    animation: fadeIn 0.5s ease forwards;
}

@keyframes fadeIn {
    to { opacity: 1; }
}
    </style>
@endsection