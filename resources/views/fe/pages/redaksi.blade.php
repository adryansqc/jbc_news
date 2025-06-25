@extends('fe.layouts.app')

@section('title')
    Redaksi
@endsection

@section('content')
    <!-- Editorial Team Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <!-- Header Section -->
                    <div class="position-relative mb-5">
                        <div class="header-section text-center">
                            <h1 class="page-title mb-2">Tim Redaksi</h1>
                            <p class="page-subtitle">JAMBISNIS.COM</p>
                            <div class="title-divider"></div>
                        </div>
                    </div>

                    <!-- Editorial Team Grid -->
                    <div class="editorial-grid">
                        <!-- Chief Editor -->
                        <div class="team-card chief-editor">
                            <div class="card-content">
                                <div class="position-badge">Pemimpin Redaksi</div>
                                <h3 class="member-name">Darmanto Zebua</h3>
                            </div>
                        </div>

                        <!-- Senior Positions -->
                        <div class="team-card">
                            <div class="card-content">
                                <div class="position-badge">Redaktur</div>
                                <h3 class="member-name">Deddy Rachmawan</h3>
                            </div>
                        </div>

                        <div class="team-card">
                            <div class="card-content">
                                <div class="position-badge">Koordinator Liputan</div>
                                <h3 class="member-name">Syaiful Amri</h3>
                            </div>
                        </div>

                        <div class="team-card">
                            <div class="card-content">
                                <div class="position-badge">Editor Video</div>
                                <h3 class="member-name">Sony Triatmaja</h3>
                            </div>
                        </div>

                        <!-- Reporters Section -->
                        <div class="reporters-section">
                            <h4 class="section-title">Wartawan</h4>
                            <div class="reporters-grid">
                                <div class="reporter-item">
                                    <h5 class="reporter-name">Kurnia Sandi</h5>
                                </div>
                                <div class="reporter-item">
                                    <h5 class="reporter-name">Fitri Amalia</h5>
                                </div>
                                <div class="reporter-item">
                                    <h5 class="reporter-name">Sandra Agustin</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Editorial Team End -->

    <style>
        /* Typography */
        .page-title {
            font-size: 2.5rem;
            font-weight: 300;
            color: #2c3e50;
            letter-spacing: -0.5px;
        }

        .page-subtitle {
            font-size: 1rem;
            color: #7f8c8d;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 2rem;
        }

        .title-divider {
            width: 60px;
            height: 1px;
            background: #3498db;
            margin: 0 auto;
        }

        /* Editorial Grid */
        .editorial-grid {
            display: grid;
            gap: 1.5rem;
        }

        .team-card {
            background: #fff;
            border: 1px solid #ecf0f1;
            border-radius: 4px;
            transition: all 0.2s ease;
            overflow: hidden;
        }

        .team-card:hover {
            border-color: #3498db;
            box-shadow: 0 2px 12px rgba(52, 152, 219, 0.1);
        }

        .team-card.chief-editor {
            border-left: 4px solid #3498db;
        }

        .card-content {
            padding: 2rem;
        }

        .position-badge {
            display: inline-block;
            font-size: 0.75rem;
            color: #7f8c8d;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .member-name {
            font-size: 1.5rem;
            font-weight: 400;
            color: #2c3e50;
            margin: 0;
            line-height: 1.3;
        }

        /* Reporters Section */
        .reporters-section {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #ecf0f1;
        }

        .section-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .reporters-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .reporter-item {
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 4px;
            text-align: center;
            transition: all 0.2s ease;
        }

        .reporter-item:hover {
            background: #e9ecef;
            transform: translateY(-2px);
        }

        .reporter-name {
            font-size: 1rem;
            font-weight: 500;
            color: #2c3e50;
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }
            
            .card-content {
                padding: 1.5rem;
            }
            
            .member-name {
                font-size: 1.25rem;
            }
            
            .reporters-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 1.75rem;
            }
            
            .card-content {
                padding: 1.25rem;
            }
        }

        /* Subtle Animations */
        .team-card,
        .reporter-item {
            animation: fadeInUp 0.5s ease-out;
        }

        .team-card:nth-child(1) { animation-delay: 0.1s; }
        .team-card:nth-child(2) { animation-delay: 0.2s; }
        .team-card:nth-child(3) { animation-delay: 0.3s; }
        .team-card:nth-child(4) { animation-delay: 0.4s; }

        .reporter-item:nth-child(1) { animation-delay: 0.5s; }
        .reporter-item:nth-child(2) { animation-delay: 0.6s; }
        .reporter-item:nth-child(3) { animation-delay: 0.7s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Clean Focus States */
        .team-card:focus-within,
        .reporter-item:focus-within {
            outline: 2px solid #3498db;
            outline-offset: 2px;
        }
    </style>
@endsection