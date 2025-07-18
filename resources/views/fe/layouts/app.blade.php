
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')- JAMBISNIS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Jambisnis, Bisnis, Jambi, Peluang Usaha, Peluang Bisnis, Ide Bisnis, Ide Usaha, UMKM, Tren Bisnis, Bisnis kekinian, Info Bisnis, Info Usaha" name="keywords">
    <meta content="Jambisnis adalah media digital informasi seputar bisnis. Hadir dalam berbagai platfom berupa; Website, Instagram, Tiktok, Youtube, Facebook. Kami menyajikan berita dan informasi akurat, paling update, dan terpercaya. Dapatkan juga pilihan informasi bisnis lokal, nasional, internasional yang bisa kamu akses kapan dan dimana saja." name="description">

    {{-- @if(isset($berita))
    <meta property="og:title" content="{{ $berita->judul }}" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($berita->content), 200) }}" />
    <meta property="og:image" content="{{ asset('storage/' . $berita->image) }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $berita->judul }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($berita->content), 200) }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $berita->image) }}">
    @endif --}}

    @yield('meta')
    <!-- Favicon -->
    <link href="{{ asset('news') }}/img/favicon.jpeg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('news') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('news') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('news') }}/css/mobile.css" rel="stylesheet">

    @stack('style')

    <!-- OpenGraph Meta Tags -->

</head>

<body>
<!-- Topbar Start -->
<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center bg-dark px-lg-5">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-n2">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#" id="liveTime">Loading...</a>
                    </li>
                    {{-- <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">Advertise</a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">Contact</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link text-body small" href="{{ url('/admin/login') }}">Login</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-lg-3 text-right d-none d-md-block">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-auto mr-n2">
                    {{-- <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href=""><small class="fab fa-facebook-f"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link text-body" href="https://www.instagram.com/jambisniscom/" target="_blank"><small class="fab fa-instagram"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="https://www.tiktok.com/@jambisnisnews" target="_blank"><small class="fab fa-tiktok"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="https://www.facebook.com/jambisnisdotcom" target="_blank"><small class="fab fa-facebook-f"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="https://www.youtube.com/@Jambisnis" target="_blank"><small class="fab fa-youtube"></small></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row align-items-center bg-white py-3 px-lg-5">
        <div class="col-lg-4">
            <div class="col-lg-4">
                <a href="/" class="navbar-brand p-0 d-none d-lg-block">
                    <img src="{{ asset('news') }}/img/logo3.jpg" alt="JamBisnis Logo" style="height: 60px;">
                </a>
            </div>
        </div>
        <div class="col-lg-8">
            <form action="{{ route('frontend.search') }}" method="GET" class="float-right">
            {{-- <form action="#" method="GET" class="float-right"> --}}
                <div class="input-group" style="max-width: 300px;">
                    <input type="text" class="form-control" name="q" placeholder="Cari berita..." value="{{ request('q') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        {{-- <div class="col-lg-8 text-center text-lg-right">
            <a href="https://htmlcodex.com"><img class="img-fluid" src="img/ads-728x90.png" alt=""></a>
        </div> --}}
    </div>
</div>
<!-- Topbar End -->

<!-- Script untuk Live Time -->
<script>
function updateLiveTime() {
    const now = new Date();
    const dateOptions = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        timeZone: 'Asia/Jakarta'
    };

    const timeOptions = {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        timeZone: 'Asia/Jakarta',
        hour12: false
    };

    const dateString = now.toLocaleDateString('id-ID', dateOptions);
    const timeString = now.toLocaleTimeString('id-ID', timeOptions);

    document.getElementById('liveTime').textContent = `${dateString} ${timeString}`;
}

// Update waktu setiap detik
setInterval(updateLiveTime, 1000);

// Jalankan sekali saat halaman dimuat
updateLiveTime();
</script>


    <!-- Navbar Start -->
    @include('fe.components.navbar')
    <!-- Navbar End -->


    @yield('content')


    @include('fe.components.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('news') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('news') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('news') }}/js/main.js"></script>
</body>

</html>