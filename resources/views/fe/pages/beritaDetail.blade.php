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
    </style>
@endpush

@section('content')
    <!-- Breaking News Start -->
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="section-title border-right-0 mb-0" style="width: 180px;">
                            <h4 class="m-0 text-uppercase font-weight-bold">Berita Terkait</h4>
                        </div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"
                            style="width: calc(100% - 180px); padding-right: 100px;">
                            @foreach($beritaTerkait as $terkait)
                            <div class="text-truncate">
                                <a class="text-secondary text-uppercase font-weight-semi-bold"
                                   href="{{ route('frontend.beritaDetail', $terkait->slug) }}">
                                    {{ $terkait->judul }}
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->

    <!-- Social Share Start -->
    <div class="container-fluid mb-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex">
                        <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . url()->current()) }}"
                           target="_blank"
                           class="btn btn-success mr-2">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                           target="_blank"
                           class="btn btn-primary mr-2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(url()->current()) }}"
                           target="_blank"
                           class="btn btn-info mr-2">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($berita->judul) }}"
                           target="_blank"
                           class="btn btn-primary mr-2">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($berita->judul) }}"
                           target="_blank"
                           class="btn btn-info">
                            <i class="fab fa-telegram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Social Share End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="{{ route('frontend.' . strtolower(str_replace(' ', '',  $berita->kategori->first()->name ))) }}">
                                    {{ $berita->kategori->first()->name }}
                                </a>
                                <a class="text-body" href="">{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</a>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $berita->judul }}</h1>
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $berita->image) }}" style="object-fit: cover; height: 500px;" alt="{{ $berita->ket_image }}">
                            <p class="text-muted small mb-4" style="font-size: 0.85rem;"><i class="far fa-image mr-2"></i>{{ $berita->ket_image }}</p>
                            <div class="d-flex align-items-center mb-3">
                                <div class="mr-4">
                                    <small class="text-muted">Reporter:</small>
                                    <p class="text-primary mb-0" style="font-size: 0.9rem;">{{ $berita->reporter->nama }}</p>
                                </div>
                                <div>
                                    <small class="text-muted">Editor:</small>
                                    <p class="text-primary mb-0" style="font-size: 0.9rem;">{{ $berita->editor->nama }}</p>
                                </div>
                            </div>
                            <div class="content-berita">
                                {!! $berita->content !!}
                            </div>
                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                            <div class="d-flex align-items-center">
                                <span>{{ $berita->user->name }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="ml-3"><i class="far fa-eye mr-2"></i>{{ $berita->view }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->
                </div>

                <div class="col-lg-4">
                    <!-- Social Follow Start -->
                    {{-- @include('fe.components.followus') --}}
                    <!-- Social Follow End -->

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            @forelse($beritaPopuler as $popular)
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('storage/' . $popular->image) }}" style="object-fit: cover; width: 110px; height: 110px;" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                            href="">{{ $popular->kategori->first()->name }}</a>
                                        <a class="text-body" href=""><small>{{ \Carbon\Carbon::parse($popular->tanggal)->format('d M Y') }}</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                       href="{{ route('frontend.beritaDetail', $popular->slug) }}">
                                        {{ Str::limit($popular->judul, 50) }}
                                    </a>
                                </div>
                            </div>
                            @empty
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('news') }}/img/news-110x110-1.jpg" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    <!-- Popular News End -->
                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
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
@endsection