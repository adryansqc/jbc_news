@php
    $beritaPopuler = App\Models\Berita::with(['kategori', 'user'])->where('status', true)->whereBetween('created_at', [ now()->startOfWeek(), now()->endOfWeek()])->orderBy('view', 'desc')->take(6)->get();
@endphp
<div class="container-fluid py-3">
    <div class="container">
        <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            @forelse($beritaPopuler as $berita)
            <div class="position-relative overflow-hidden" style="height: 180px;">
                <img class="img-fluid h-100 w-100" src="{{ asset('storage/' . $berita->image) }}">
                <div class="overlay">
                    <div class="mb-1">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-1 small"
                            href="" style="font-size: 10px;">{{ $berita->kategori->first()->name }}</a>
                        <small class="text-white">{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</small>
                    </div>
                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold small"
                           href="{{ route('frontend.beritaDetail', $berita->slug) }}">{{ Str::limit($berita->judul, 10) }}</a>
                </div>
            </div>
            @empty
            <div class="position-relative overflow-hidden" style="height: 180px;">
                <img class="img-fluid h-100 w-100" src="{{ asset('news') }}/img/news-700x435-1.jpg">
                <div class="overlay">
                    <div class="mb-1">
                        <span class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2">Info</span>
                        <small class="text-white">Tidak ada berita</small>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>