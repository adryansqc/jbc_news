@extends('fe.layouts.app')

@section('title')
    Perbankan
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
                                <h4 class="m-0 text-uppercase font-weight-bold">Kategori: Perbankan</h4>
                            </div>
                        </div>
                        @forelse($perbankan as $berita)
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="{{ asset('storage/' . $berita->image) }}" style="object-fit: cover; height: 300px;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">{{ $berita->kategori->name }}</a>
                                        <a class="text-body" href=""><small>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('frontend.beritaDetail', $berita->slug) }}">{{ Str::limit($berita->judul, 50) }}</a>
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
                            {{ $perbankan->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    {{-- @include('fe.components.followus') --}}

                    <!-- Ads Start -->
                    <div class="mb-3">
                        @include('fe.components.advertisement')
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            @forelse($beritaPopuler as $berita)
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('storage/' . $berita->image) }}" style="object-fit: cover; width: 110px; height: 110px;" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                            href="">{{ $berita->kategori->name }}</a>
                                        <a class="text-body" href=""><small>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('frontend.beritaDetail', $berita->slug) }}">{{ Str::limit($berita->judul, 50) }}</a>
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
