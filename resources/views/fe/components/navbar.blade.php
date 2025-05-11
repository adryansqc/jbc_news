<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="index.html" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-5 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{ route('frontend.index') }}" class="nav-item nav-link small {{ Route::is('frontend.index') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('frontend.ekbisjambi') }}" class="nav-item nav-link small {{ Route::is('frontend.ekbisjambi') ? 'active' : '' }}">Ekbis Jambi</a>
                <a href="{{ route('frontend.peluangusaha') }}" class="nav-item nav-link small {{ Route::is('frontend.peluangusaha') ? 'active' : '' }}">Peluang Usaha</a>
                <a href="{{ route('frontend.perbankan') }}" class="nav-item nav-link small {{ Route::is('frontend.perbankan') ? 'active' : '' }}">Perbankan</a>
                <a href="{{ route('frontend.properti') }}" class="nav-item nav-link small {{ Route::is('frontend.properti') ? 'active' : '' }}">Properti</a>
                <a href="{{ route('frontend.nasional') }}" class="nav-item nav-link small {{ Route::is('frontend.nasional') ? 'active' : '' }}">Nasional</a>
                <a href="{{ route('frontend.internasional') }}" class="nav-item nav-link small {{ Route::is('frontend.internasional') ? 'active' : '' }}">Internasional</a>
                <a href="{{ route('frontend.kuliner') }}" class="nav-item nav-link small {{ Route::is('frontend.kuliner') ? 'active' : '' }}">Kuliner</a>
                <a href="{{ route('frontend.otobiz') }}" class="nav-item nav-link small {{ Route::is('frontend.otobiz') ? 'active' : '' }}">Otobiz</a>
            </div>
        </div>
    </nav>
</div>