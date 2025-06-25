@extends('fe.layouts.app')

@section('title')
    Internasional
@endsection

@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 font-weight-bold">Kategori: Internasional</h4>
                            </div>
                        </div>
                        @forelse($internasional as $berita)
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="{{ asset('storage/' . $berita->image) }}" style="object-fit: cover; height: 300px;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        @if($berita->kategori->isNotEmpty())
                                            <a class="badge badge-primary font-weight-semi-bold p-2 mr-2"
                                                href="">{{ $berita->kategori->first()->name }}</a>
                                        @endif
                                        <a class="text-body" href=""><small>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary font-weight-bold" href="{{ route('frontend.beritaDetail', $berita->slug) }}">{{ Str::limit($berita->judul, 50) }}</a>
                                    <p class="m-0">{{ Str::limit($berita->isi, 100) }}</p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        {{-- <img class="rounded-circle mr-2" src="{{ asset('storage/' . $berita->user->image) }}" width="25" height="25" alt=""> --}}
                                        <small>{{ $berita->user->name }}</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $berita->view }}</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>0</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="alert alert-info">
                                Belum ada berita untuk kategori ini.
                            </div>
                        </div>
                        @endforelse
                        <div class="col-12">
                            {{ $internasional->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    {{-- @include('fe.components.followus') --}}

                    <!-- Ads Start -->
                    {{--  <div class="mb-3">
                        @include('fe.components.advertisement')
                    </div>  --}}
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 font-weight-bold">Trending News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            @forelse($beritaPopuler as $berita)
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('storage/' . $berita->image) }}" style="object-fit: cover; width: 110px; height: 110px;" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        @if($berita->kategori->isNotEmpty())
                                            <a class="badge badge-primary font-weight-semi-bold p-2 mr-2"
                                                href="">{{ $berita->kategori->first()->name }}</a>
                                        @endif
                                        <a class="text-body" href=""><small>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary font-weight-bold" href="{{ route('frontend.beritaDetail', $berita->slug) }}">{{ Str::limit($berita->judul, 50) }}</a>
                                </div>
                            </div>
                            @empty
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('news') }}/img/news-110x110-1.jpg" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    <!-- Popular News End -->
                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 font-weight-bold">Kategori</h4>
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
/* ===== INTERNASIONAL - STYLING SELARAS DENGAN HOME ===== */

/* Base Improvements - sama seperti home */
img { object-fit: cover; transition: transform 0.3s ease; }
.container-fluid { padding: 0 8px; }
.container { padding: 0 8px; }

/* Badge Fixes - sama seperti home */
.badge { 
    font-size: 10px; font-weight: 600; padding: 4px 8px; 
    border-radius: 12px; white-space: nowrap; 
    background: linear-gradient(45deg, #007bff, #0056b3) !important;
}

/* Section Titles - sama seperti home */
.section-title h4 { 
    font-size: 1.1rem; font-weight: 700; color: #2c3e50; 
    padding-bottom: 6px; border-bottom: 2px solid #007bff; display: inline-block;
}

/* Card News Styling - selaras dengan home */
.position-relative.mb-3 {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.position-relative.mb-3:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.position-relative.mb-3 img {
    border-radius: 8px 8px 0 0;
}

.position-relative.mb-3 .bg-white {
    border-radius: 0 0 8px 8px;
}

/* Trending News - sama seperti home */
.d-flex.align-items-center.bg-white { 
    border-radius: 8px !important; 
    box-shadow: 0 2px 8px rgba(0,0,0,0.08) !important; 
    margin-bottom: 10px !important;
    transition: all 0.3s ease;
}

.d-flex.align-items-center.bg-white:hover { 
    transform: translateY(-2px); 
    box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important; 
}

.d-flex.align-items-center.bg-white img { 
    border-radius: 8px 0 0 8px; 
}

/* Sidebar Mobile - sama seperti home */
@media (max-width: 992px) {
    .col-lg-4 { margin-top: 25px !important; }
    .col-lg-4 .section-title { 
        background: linear-gradient(135deg, #007bff, #0056b3); 
        color: white; padding: 10px 15px; margin: 0; border-radius: 8px 8px 0 0;
    }
    .col-lg-4 .section-title h4 { 
        color: white !important; margin: 0; padding: 0; border: none; font-size: 0.95rem;
    }
    .col-lg-4 .bg-white { border-radius: 0 0 8px 8px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); }
}

/* Tags - sama seperti home */
.btn-outline-secondary { 
    font-size: 0.75rem !important; padding: 4px 10px !important; 
    border-radius: 15px !important; margin: 2px !important; 
    border-color: #007bff !important; color: #007bff !important;
    transition: all 0.3s ease !important;
}
.btn-outline-secondary:hover { 
    background-color: #007bff !important; color: white !important; 
    transform: translateY(-1px) !important; 
}

/* Mobile Responsive - sama seperti home */
@media (max-width: 768px) {
    .container-fluid, .container { padding: 0 6px; }
    
    .position-relative.mb-3 {
        margin-bottom: 15px !important;
    }
    
    .position-relative.mb-3 img {
        height: 200px !important;
    }
    
    .position-relative.mb-3 .p-4 {
        padding: 12px !important;
    }
    
    .position-relative.mb-3 .h4 {
        font-size: 1rem !important;
        line-height: 1.3;
    }
    
    .d-flex.align-items-center.bg-white { 
        height: 85px !important; 
        margin-bottom: 8px !important;
    }
    
    .d-flex.align-items-center.bg-white img { 
        width: 85px !important; height: 85px !important; 
    }
    
    .d-flex.align-items-center.bg-white .px-3 { 
        padding: 8px 10px !important; 
    }
    
    .d-flex.align-items-center.bg-white .h6 { 
        font-size: 0.8rem !important; 
        line-height: 1.2; 
    }
    
    .badge { 
        font-size: 8px !important; 
        padding: 2px 5px !important; 
    }
}

/* Extra Small Devices - sama seperti home */
@media (max-width: 576px) {
    .position-relative.mb-3 img {
        height: 180px !important;
    }
    
    .position-relative.mb-3 .h4 {
        font-size: 0.9rem !important;
    }
    
    .d-flex.align-items-center.bg-white { 
        height: 75px !important; 
    }
    
    .d-flex.align-items-center.bg-white img { 
        width: 75px !important; height: 75px !important; 
    }
    
    .badge { 
        font-size: 7px !important; 
        padding: 2px 4px !important; 
    }
}

/* Hover Effects - sama seperti home */
@media (min-width: 769px) {
    .position-relative:hover img { 
        transform: scale(1.05); 
    }
}

/* Loading Animation - sama seperti home */
.img-fluid { opacity: 0; animation: fadeIn 0.5s ease forwards; }
@keyframes fadeIn { to { opacity: 1; } }

/* Alert styling */
.alert-info {
    border-left: 4px solid #17a2b8;
    border-radius: 8px;
}
    </style>
@endsection