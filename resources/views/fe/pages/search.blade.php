@extends('fe.layouts.app')

@section('title')
    Hasil Pencarian: {{ $query }}
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
                                <h4 class="m-0 text-uppercase font-weight-bold">Hasil Pencarian: "{{ $query }}"</h4>
                            </div>
                        </div>
                        @forelse($berita as $item)
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="{{ asset('storage/' . $item->image) }}" style="object-fit: cover; height: 300px;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="{{ route('frontend.' . strtolower(str_replace(' ', '', $item->kategori->name))) }}">
                                            {{ $item->kategori->name }}
                                        </a>
                                        <a class="text-body" href="">
                                            <small>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('D MMMM Y') }}</small>
                                        </a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                       href="{{ route('frontend.beritaDetail', $item->slug) }}">
                                        {{ $item->judul }}
                                    </a>
                                    <p class="m-0">{{ Str::limit(strip_tags($item->content), 100) }}</p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <small>{{ $item->user->name }}</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $item->view }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="alert alert-info">
                                Tidak ada hasil yang ditemukan untuk pencarian "{{ $query }}".
                            </div>
                        </div>
                        @endforelse
                        <div class="col-12">
                            {{ $berita->appends(['q' => $query])->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
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
                            @forelse($beritaPopuler ?? [] as $item)
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{ asset('storage/' . $item->image) }}" style="object-fit: cover; width: 110px; height: 110px;" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                            href="{{ route('frontend.' . strtolower(str_replace(' ', '', $item->kategori->name))) }}">
                                            {{ $item->kategori->name }}
                                        </a>
                                        <a class="text-body" href="">
                                            <small>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('D MMMM Y') }}</small>
                                        </a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" 
                                       href="{{ route('frontend.beritaDetail', $item->slug) }}">
                                        {{ Str::limit($item->judul, 50) }}
                                    </a>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-info">
                                Belum ada berita populer.
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
                                @foreach ($kategori ?? [] as $item)
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
