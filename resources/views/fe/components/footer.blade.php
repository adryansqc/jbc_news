@php
    $kategories = App\Models\Categorie::all();
    $beritaPopuler = App\Models\Berita::with(['kategori', 'user'])->where('status', true)->orderBy('view', 'desc')->take(3)->get();
@endphp
<!-- Footer Start -->
<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
    <div class="row py-4">
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
            <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
            <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
            <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
            <div class="d-flex justify-content-start">
                {{-- <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a> --}}
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://www.tiktok.com/@jambisnisnews?_t=ZS-8wLophnIGGG&_r=1"><i class="fab fa-tiktok"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://www.instagram.com/jambisnis_?igsh=ajFkaGh4ZHlraWVi"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square" href="https://youtube.com/@jbc_tv?si=aklVYdEIt-vMIzTx" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
            <div class="mb-3">
                @foreach ($beritaPopuler as $item)
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                       href="{{ route('frontend.' . strtolower(str_replace(' ', '', $item->kategori->name))) }}">
                        {{ $item->kategori->name }}
                    </a>
                    <a class="text-body" href="">
                        <small>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('D MMMM Y') }}</small>
                    </a>
                </div>
                <a class="small text-body text-uppercase font-weight-medium"
                   href="{{ route('frontend.beritaDetail', $item->slug) }}">
                    {{ $item->judul }}
                </a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
            <div class="m-n1">
                @foreach ($kategories as $item)
                <a href="" class="btn btn-sm btn-secondary m-1">{{ $item->name }}</a>
                @endforeach
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Tentang Kami</h5>
            <div class="d-flex flex-column">
                <a href="{{ route('frontend.aboutus') }}" class="text-white mb-2">
                    <i class="fa fa-angle-right mr-2"></i>About Us
                </a>
                <a href="{{ route('frontend.redaksi') }}" class="text-white mb-2">
                    <i class="fa fa-angle-right mr-2"></i>Redaksi
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
    <p class="m-0 text-center">&copy; <a href="#"></a>

    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
    Design by <a href="https://htmlcodex.com">Jambisnis.com</a></p>
</div>
<!-- Footer End -->