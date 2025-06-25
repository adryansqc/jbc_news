@extends('fe.layouts.app')

@section('title')
    Tentang Kami
@endsection

@section('content')
    <!-- About Us Start -->
    <div class="container-fluid mt-3 mt-md-5 pt-2 pt-md-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-10 col-xl-8 mx-auto">
                    <!-- Hero Header Section -->
                    <div class="position-relative mb-4 mb-md-6">
                        <div class="hero-header bg-gradient-primary text-white rounded-lg shadow-lg overflow-hidden">
                            <div class="hero-overlay"></div>
                            <div class="position-relative p-3 p-md-5 text-center">
                                <div class="hero-icon mb-3 mb-md-4">
                                    <i class="fas fa-building fa-2x fa-md-3x text-white opacity-90"></i>
                                </div>
                                <h1 class="display-5 display-md-4 font-weight-bold mb-3 mb-md-4 text-white">Tentang Kami</h1>
                                <p class="lead mb-0 text-white-90 px-2">
                                    <strong>Jambisnis</strong> - Informasi Akurat, Bisnis Melesat
                                </p>
                                <div class="hero-divider mt-3 mt-md-4">
                                    <div class="divider-line"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vision Section -->
                    <div class="card border-0 shadow-sm mb-4 mb-md-5 hover-card">
                        <div class="card-body p-3 p-md-5">
                            <div class="section-header mb-3 mb-md-4">
                                <div class="section-icon">
                                    <i class="fas fa-eye text-primary"></i>
                                </div>
                                <h3 class="section-title text-primary mb-0">Visi Kami</h3>
                            </div>
                            <p class="section-content text-muted mb-0 font-size-lg leading-relaxed">
                                Menjadi media digital bisnis terbesar di Jambi dan berpengaruh di tingkat Nasional.
                            </p>
                        </div>
                    </div>

                    <!-- Mission Section -->
                    <div class="card border-0 shadow-sm mb-4 mb-md-5 hover-card">
                        <div class="card-body p-3 p-md-5">
                            <div class="section-header mb-3 mb-md-4">
                                <div class="section-icon">
                                    <i class="fas fa-rocket text-primary"></i>
                                </div>
                                <h3 class="section-title text-primary mb-0">Misi Kami</h3>
                            </div>
                            <div class="mission-list">
                                <div class="mission-item">
                                    <div class="mission-number">01</div>
                                    <div class="mission-content">
                                        <p class="mb-0 text-muted leading-relaxed">
                                            Menyajikan informasi bisnis lokal, nasional, dan internasional yang akurat, aktual, dan relevan.
                                        </p>
                                    </div>
                                </div>
                                <div class="mission-item">
                                    <div class="mission-number">02</div>
                                    <div class="mission-content">
                                        <p class="mb-0 text-muted leading-relaxed">
                                            Mengembangkan konten yang disesuaikan dengan karakteristik tiap platform digital.
                                        </p>
                                    </div>
                                </div>
                                <div class="mission-item">
                                    <div class="mission-number">03</div>
                                    <div class="mission-content">
                                        <p class="mb-0 text-muted leading-relaxed">
                                            Mendukung pertumbuhan pelaku usaha dan ekosistem bisnis di Jambi melalui edukasi dan publikasi.
                                        </p>
                                    </div>
                                </div>
                                <div class="mission-item">
                                    <div class="mission-number">04</div>
                                    <div class="mission-content">
                                        <p class="mb-0 text-muted leading-relaxed">
                                            Membangun kepercayaan publik dengan integritas dan profesionalisme dalam setiap pemberitaan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Core Values Section -->
                    <div class="card border-0 shadow-sm mb-4 mb-md-5">
                        <div class="card-body p-3 p-md-5">
                            <div class="section-header mb-4 mb-md-5 text-center">
                                <div class="section-icon mx-auto">
                                    <i class="fas fa-gem text-primary"></i>
                                </div>
                                <h3 class="section-title text-primary mb-2 mb-md-3">Nilai Perusahaan</h3>
                                <p class="text-muted mb-0 px-2">Core values yang menjadi fondasi dalam setiap langkah kami</p>
                            </div>
                            
                            <div class="row">
                                <div class="col-12 col-sm-6 mb-3 mb-md-4">
                                    <div class="value-card h-100">
                                        <div class="value-icon">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div class="value-content">
                                            <h5 class="value-title">Akurat</h5>
                                            <p class="value-description">
                                                Informasi berdasarkan fakta, data, dan sumber yang kredibel.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-3 mb-md-4">
                                    <div class="value-card h-100">
                                        <div class="value-icon">
                                            <i class="fas fa-bolt"></i>
                                        </div>
                                        <div class="value-content">
                                            <h5 class="value-title">Cepat</h5>
                                            <p class="value-description">
                                                Responsif terhadap perkembangan bisnis dan tren terkini.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-3 mb-md-4">
                                    <div class="value-card h-100">
                                        <div class="value-icon">
                                            <i class="fas fa-bullseye"></i>
                                        </div>
                                        <div class="value-content">
                                            <h5 class="value-title">Relevan</h5>
                                            <p class="value-description">
                                                Konten disesuaikan dengan kebutuhan audiens di tiap platform.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-3 mb-md-4">
                                    <div class="value-card h-100">
                                        <div class="value-icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div class="value-content">
                                            <h5 class="value-title">Kolaboratif</h5>
                                            <p class="value-description">
                                                Terbuka untuk bekerja sama dengan pelaku bisnis, komunitas, dan media lainnya.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3 mb-md-4">
                                    <div class="value-card h-100 value-featured">
                                        <div class="value-icon">
                                            <i class="fas fa-lightbulb"></i>
                                        </div>
                                        <div class="value-content">
                                            <h5 class="value-title">Inspiratif</h5>
                                            <p class="value-description">
                                                Mendorong pertumbuhan dan inovasi dunia usaha melalui cerita dan wawasan bisnis.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us End -->

    <style>
        /* Hero Section Styles */
        .hero-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            min-height: 280px;
            display: flex;
            align-items: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.1);
        }

        .hero-divider {
            display: flex;
            justify-content: center;
        }

        .divider-line {
            width: 60px;
            height: 3px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 2px;
        }

        .text-white-90 {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        /* Card Hover Effects */
        .hover-card {
            transition: all 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1) !important;
        }

        /* Section Header Styles */
        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-header.text-center {
            flex-direction: column;
            gap: 8px;
        }

        .section-icon {
            width: 45px;
            height: 45px;
            background: rgba(0, 123, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .section-title {
            font-weight: 700;
            font-size: 1.5rem;
        }

        /* Mission Styles */
        .mission-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .mission-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 18px;
            background: rgba(0, 123, 255, 0.02);
            border-radius: 12px;
            border-left: 4px solid #007bff;
            transition: all 0.3s ease;
        }

        .mission-item:hover {
            background: rgba(0, 123, 255, 0.05);
            transform: translateX(3px);
        }

        .mission-number {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            font-weight: bold;
            font-size: 16px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .mission-content {
            flex: 1;
            padding-top: 6px;
        }

        /* Value Card Styles */
        .value-card {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #007bff, #0056b3);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .value-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .value-card:hover::before {
            transform: scaleX(1);
        }

        .value-featured {
            background: linear-gradient(135deg, rgba(0, 123, 255, 0.05), rgba(0, 86, 179, 0.02));
        }

        .value-icon {
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
            margin-bottom: 18px;
        }

        .value-title {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .value-description {
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 0;
            font-size: 0.95rem;
        }

        /* Typography Enhancements */
        .font-size-lg {
            font-size: 1.1rem;
        }

        .leading-relaxed {
            line-height: 1.7;
        }

        .section-content {
            font-size: 1.1rem;
            line-height: 1.7;
        }

        /* Mobile Specific Styles */
        @media (max-width: 575.98px) {
            .hero-header {
                min-height: 220px;
            }
            
            .hero-header .display-5 {
                font-size: 2rem;
            }
            
            .hero-header .lead {
                font-size: 1rem;
            }
            
            .section-header {
                flex-direction: column;
                text-align: center;
                gap: 8px;
            }
            
            .section-icon {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }
            
            .section-title {
                font-size: 1.3rem;
            }
            
            .mission-item {
                flex-direction: column;
                text-align: center;
                gap: 12px;
                padding: 15px;
            }
            
            .mission-number {
                width: 35px;
                height: 35px;
                font-size: 14px;
            }
            
            .value-card {
                padding: 18px;
                text-align: center;
            }
            
            .value-icon {
                width: 50px;
                height: 50px;
                font-size: 20px;
                margin: 0 auto 15px;
            }
            
            .value-title {
                font-size: 1.1rem;
            }
            
            .value-description {
                font-size: 0.9rem;
            }
            
            .section-content {
                font-size: 1rem;
            }
            
            .font-size-lg {
                font-size: 1rem;
            }
            
            /* Disable hover effects on mobile */
            .hover-card:hover,
            .mission-item:hover,
            .value-card:hover {
                transform: none;
            }
        }

        /* Tablet Styles */
        @media (min-width: 576px) and (max-width: 767.98px) {
            .hero-header {
                min-height: 250px;
            }
            
            .section-icon {
                width: 42px;
                height: 42px;
                font-size: 17px;
            }
            
            .section-title {
                font-size: 1.4rem;
            }
            
            .mission-number {
                width: 38px;
                height: 38px;
                font-size: 15px;
            }
            
            .value-icon {
                width: 52px;
                height: 52px;
                font-size: 21px;
            }
        }

        /* Large Mobile Styles */
        @media (min-width: 768px) {
            .hero-header {
                min-height: 300px;
            }
            
            .section-icon {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
            
            .section-title {
                font-size: 1.75rem;
            }
            
            .mission-item {
                gap: 20px;
                padding: 20px;
            }
            
            .mission-number {
                width: 45px;
                height: 45px;
                font-size: 18px;
            }
            
            .value-card {
                padding: 25px;
            }
            
            .value-icon {
                width: 60px;
                height: 60px;
                font-size: 24px;
                margin-bottom: 20px;
            }
            
            .value-title {
                font-size: 1.25rem;
            }
            
            .section-content,
            .font-size-lg {
                font-size: 1.125rem;
            }
        }

        /* Animation Classes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeInUp 0.6s ease-out;
        }

        .card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .card:nth-child(3) {
            animation-delay: 0.2s;
        }

        .card:nth-child(4) {
            animation-delay: 0.3s;
        }

        /* Reduce motion for users who prefer it */
        @media (prefers-reduced-motion: reduce) {
            .card,
            .hover-card,
            .mission-item,
            .value-card {
                animation: none;
                transition: none;
            }
            
            .hover-card:hover,
            .mission-item:hover,
            .value-card:hover {
                transform: none;
            }
        }
    </style>
@endsection