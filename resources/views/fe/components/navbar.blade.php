<div class="w-100 m-0 p-0">
    <nav class="navbar navbar-expand-lg navbar-dark py-2 py-lg-0 px-lg-5 modern-navbar">
        <a href="{{ route('frontend.index') }}" class="navbar-brand d-block d-lg-none">
            <img src="{{ asset('news') }}/img/logo3.jpg" alt="JamBisnis Logo" class="img-fluid logo-mobile">
        </a>

        <!-- Mobile Icons Container -->
        <div class="d-flex d-lg-none mobile-icons-container">
            <button type="button" class="btn mobile-search-toggle" data-toggle="collapse" data-target="#mobileSearchCollapse">
                <i class="fa fa-search"></i>
            </button>
            <button type="button" class="navbar-toggler modern-toggler ml-2" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- Mobile Search Bar (separate collapse) -->
        <div class="collapse mobile-search-container-outer" id="mobileSearchCollapse">
            <div class="mobile-search-container-inner">
                <form action="{{ route('frontend.search') }}" method="GET">
                    <div class="input-group modern-search-group-mobile">
                        <input type="text" class="form-control modern-search-input-mobile" name="q" placeholder="Cari berita..." value="{{ request('q') }}">
                        <div class="input-group-append">
                            <button class="btn modern-search-btn-mobile" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{ route('frontend.index') }}" class="nav-item nav-link small nav-link-modern {{ Route::is('frontend.index') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('frontend.bisnisjambi') }}" class="nav-item nav-link small nav-link-modern {{ Route::is('frontend.bisnisjambi') ? 'active' : '' }}">Bisnis Jambi</a>
                <a href="{{ route('frontend.peluangusaha') }}" class="nav-item nav-link small nav-link-modern {{ Route::is('frontend.peluangusaha') ? 'active' : '' }}">Peluang Usaha</a>
                <a href="{{ route('frontend.perbankan') }}" class="nav-item nav-link small nav-link-modern {{ Route::is('frontend.perbankan') ? 'active' : '' }}">Perbankan</a>
                <a href="{{ route('frontend.properti') }}" class="nav-item nav-link small nav-link-modern {{ Route::is('frontend.properti') ? 'active' : '' }}">Properti</a>
                <a href="{{ route('frontend.nasional') }}" class="nav-item nav-link small nav-link-modern {{ Route::is('frontend.nasional') ? 'active' : '' }}">Nasional</a>
                <a href="{{ route('frontend.internasional') }}" class="nav-item nav-link small nav-link-modern {{ Route::is('frontend.internasional') ? 'active' : '' }}">Internasional</a>
                <a href="{{ route('frontend.kuliner') }}" class="nav-item nav-link small nav-link-modern {{ Route::is('frontend.kuliner') ? 'active' : '' }}">Kuliner</a>
                <a href="{{ route('frontend.otobiz') }}" class="nav-item nav-link small nav-link-modern {{ Route::is('frontend.otobiz') ? 'active' : '' }}">Otobiz</a>
                {{-- Dropdown "Lainnya" --}}
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle small nav-link-modern {{ Route::is('frontend.regional') || Route::is('frontend.olahraga') ? 'active' : '' }}" data-toggle="dropdown">Lainnya</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('frontend.regional') }}" class="dropdown-item small nav-link-modern {{ Route::is('frontend.regional') ? 'active' : '' }}">Regional</a>
                        <a href="{{ route('frontend.olahraga') }}" class="dropdown-item small nav-link-modern {{ Route::is('frontend.olahraga') ? 'active' : '' }}">Olahraga</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <style>
        /* Modern Navbar Styling - Desktop tetap biru */
        .modern-navbar {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Mobile Navbar - Ubah ke putih */
        @media (max-width: 991px) {
            .modern-navbar {
                background: #ffffff !important;
                box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            }
        }

        /* Logo Mobile */
        .logo-mobile {
            max-height: 45px !important;
            border-radius: 4px;
        }

        /* Mobile Icons Container */
        .mobile-icons-container {
            align-items: center;
        }

        /* Mobile Search Toggle Button */
        .mobile-search-toggle {
            background: transparent !important;
            border: 1px solid #6c757d !important;
            color: #6c757d !important;
            border-radius: 6px;
            padding: 10px 12px;
            font-size: 16px;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dropdown-menu {
            background-color: #254a91 !important;
        }

        .mobile-search-toggle:hover,
        .mobile-search-toggle:focus {
            background: #f8f9fa !important;
            color: #495057 !important;
            border-color: #495057 !important;
        }

        /* Modern Toggle Button - Mobile putih */
        .modern-toggler {
            border-radius: 6px;
            padding: 10px 12px;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (min-width: 992px) {
            .modern-toggler {
                border: 1px solid rgba(255, 255, 255, 0.2) !important;
                background: rgba(255, 255, 255, 0.1);
            }

            .modern-toggler:focus {
                box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
            }
        }

        @media (max-width: 991px) {
            .modern-toggler {
                border: 1px solid #6c757d !important;
                background: transparent;
            }

            .modern-toggler:focus {
                box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.25);
            }

            .modern-toggler .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2833, 37, 41, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }
            .dropdown-menu {
                background-color: #9bb7eb !important;
            }
        }

        /* Navigation Links */
        .nav-link-modern {
            font-weight: 500 !important;
            letter-spacing: 0.3px;
            padding: 10px 15px !important;
            margin: 0 2px;
            border-radius: 5px;
        }

        /* Desktop Navigation Links - tetap putih */
        @media (min-width: 992px) {
            .nav-link-modern {
                color: rgba(255, 255, 255, 0.9) !important;
            }

            .nav-link-modern:hover {
                background: rgba(255, 255, 255, 0.15) !important;
                color: #ffffff !important;
            }

            .nav-link-modern.active {
                background: rgba(255, 255, 255, 0.2) !important;
                color: #ffffff !important;
                font-weight: 600 !important;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            }
        }

        /* Mobile Navigation Links - ubah ke hitam */
        @media (max-width: 991px) {
            .nav-link-modern {
                color: #495057 !important;
                padding: 12px 15px !important;
                margin: 2px 0 !important;
                border-radius: 6px;
            }

            .nav-link-modern:hover {
                background: #f8f9fa !important;
                color: #212529 !important;
            }

            .nav-link-modern.active {
                background: #e9ecef !important;
                color: #212529 !important;
                font-weight: 600 !important;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .navbar-nav {
                padding-top: 10px;
            }
        }

        /* Mobile Search Container Outside Navbar Collapse */
        .mobile-search-container-outer {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #ffffff;
            border-top: 1px solid #e9ecef;
            z-index: 1000;
        }

        @media (min-width: 992px) {
            .mobile-search-container-outer {
                display: none !important;
            }
        }

        .mobile-search-container-inner {
            padding: 15px;
        }

        /* Modern Search Group Mobile */
        .modern-search-group-mobile {
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid #e1e5e9;
            background: #ffffff;
        }

        .modern-search-input-mobile {
            border: none !important;
            background: transparent !important;
            padding: 12px 20px !important;
            font-size: 14px;
            color: #495057;
            font-weight: 400;
            height: auto;
        }

        .modern-search-input-mobile:focus {
            box-shadow: none !important;
            background: transparent !important;
            outline: none;
        }

        .modern-search-input-mobile::placeholder {
            color: #9ca3af;
            font-weight: 400;
        }

        .modern-search-btn-mobile {
            background: #3b82f6 !important;
            border: none !important;
            color: white !important;
            padding: 12px 20px;
            font-size: 14px;
            border-radius: 0 25px 25px 0 !important;
            min-width: 50px;
        }

        .modern-search-btn-mobile:hover {
            background: #2563eb !important;
        }

        .modern-search-btn-mobile:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2) !important;
        }

        /* Professional Color Scheme */
        @media (min-width: 992px) {
            .modern-navbar {
                padding-top: 0.75rem !important;
                padding-bottom: 0.75rem !important;
            }
        }

        /* Clean Focus States */
        .nav-link-modern:focus {
            outline: none;
        }

        @media (min-width: 992px) {
            .nav-link-modern:focus {
                box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.3);
            }
        }

        @media (max-width: 991px) {
            .nav-link-modern:focus {
                box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
            }
        }

        /* Improved Typography */
        .nav-link-modern {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
    </style>

    <script>
        // Tidak diperlukan JavaScript tambahan karena menggunakan Bootstrap collapse
    </script>
</div>