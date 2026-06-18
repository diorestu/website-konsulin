@extends('front.layout.front_layout')

@section('title')
    Our Value
@endsection

@section('meta_desc')
    Dapatkan layanan pajak dan akuntansi terbaik untuk mendukung pertumbuhan usaha Anda. Konsulin menyediakan solusi tepat
    guna dalam perencanaan keuangan dan kepatuhan pajak, membantu bisnis berkembang dengan lancar dan efisien.
@endsection

@section('meta_key')
    konsulin, layanan pajak, akuntansi terbaik, pertumbuhan usaha, perencanaan keuangan, kepatuhan pajak, solusi pajak,
    konsultasi bisnis, layanan akuntansi, pajak usaha, pengelolaan keuangan
@endsection

@push('addon-style')
    <style>
        .konsulin-about {
            position: relative;
            padding: 110px 0 90px;
            background: linear-gradient(180deg, #f8fbff 0%, #ffffff 100%);
            overflow: hidden;
        }

        .konsulin-about::before {
            content: "";
            position: absolute;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: rgba(18, 104, 255, 0.08);
            top: -160px;
            right: -120px;
            z-index: 0;
        }

        .konsulin-about .container {
            position: relative;
            z-index: 2;
        }

        .konsulin-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(18, 104, 255, 0.1);
            color: #1268ff;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .konsulin-about-title {
            font-size: 46px;
            line-height: 1.15;
            font-weight: 800;
            color: #10233f;
            margin-bottom: 20px;
            letter-spacing: -0.8px;
        }

        .konsulin-about-title span {
            color: #1268ff;
        }

        .konsulin-about-text {
            font-size: 16px;
            line-height: 1.8;
            color: #637083;
            margin-bottom: 18px;
            max-width: 620px;
        }

        .konsulin-feature-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin: 28px 0 0;
            padding: 0;
            list-style: none;
        }

        .konsulin-feature-list li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 14px 16px;
            border-radius: 16px;
            background: #ffffff;
            border: 1px solid #edf1f5;
            box-shadow: 0 12px 30px rgba(16, 35, 63, 0.06);
            color: #26384d;
            font-size: 15px;
            font-weight: 600;
        }

        .konsulin-feature-list i {
            width: 22px;
            height: 22px;
            min-width: 22px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #1268ff;
            color: #ffffff;
            font-size: 11px;
            margin-top: 1px;
        }

        .konsulin-image-card {
            position: relative;
            border-radius: 30px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 28px 70px rgba(16, 35, 63, 0.14);
            min-height: 520px;
        }

        .konsulin-image-card img {
            width: 100%;
            height: 520px;
            object-fit: cover;
            display: block;
        }

        .konsulin-image-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(16, 35, 63, 0.05), rgba(16, 35, 63, 0.35));
        }

        .konsulin-image-info {
            position: absolute;
            left: 24px;
            right: 24px;
            bottom: 24px;
            z-index: 2;
            padding: 22px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px);
        }

        .konsulin-image-info h4 {
            margin: 0 0 6px;
            color: #10233f;
            font-size: 20px;
            font-weight: 800;
        }

        .konsulin-image-info p {
            margin: 0;
            color: #637083;
            font-size: 14px;
            line-height: 1.6;
        }

        .konsulin-values {
            position: relative;
            padding: 95px 0;
            background: #10233f;
            overflow: hidden;
        }

        .konsulin-values::before {
            content: "";
            position: absolute;
            width: 520px;
            height: 520px;
            border-radius: 50%;
            background: rgba(18, 104, 255, 0.13);
            left: -180px;
            top: -200px;
        }

        .konsulin-values .container {
            position: relative;
            z-index: 2;
        }

        .konsulin-section-head {
            max-width: 760px;
            margin-bottom: 46px;
        }

        .konsulin-section-head .sub-title {
            display: inline-block;
             color: #5b92ff;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 0.4px;
            margin-bottom: 12px;
        }

        .konsulin-section-head h2 {
            color: #ffffff;
            font-size: 38px;
            line-height: 1.25;
            font-weight: 800;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .konsulin-value-card {
            height: 100%;
            padding: 30px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            transition: all 0.3s ease;
        }

        .konsulin-value-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.12);
        }

        .konsulin-value-icon {
            width: 62px;
            height: 62px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            background: #1268ff;
            color: #ffffff;
            font-size: 32px;
            margin-bottom: 24px;
        }

        .konsulin-value-card h3 {
            color: #ffffff;
            font-size: 21px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .konsulin-value-card p {
            color: rgba(255, 255, 255, 0.72);
            line-height: 1.7;
            margin: 0;
            font-size: 15px;
        }

        @media (max-width: 991px) {
            .konsulin-about {
                padding: 80px 0;
            }

            .konsulin-about-title {
                font-size: 36px;
            }

            .konsulin-image-card {
                margin-top: 40px;
                min-height: auto;
            }

            .konsulin-image-card img {
                height: 420px;
            }

            .konsulin-values {
                padding: 75px 0;
            }

            .konsulin-section-head h2 {
                font-size: 32px;
            }
        }

        @media (max-width: 575px) {
            .konsulin-about {
                padding: 65px 0;
            }

            .konsulin-about-title {
                font-size: 30px;
            }

            .konsulin-about-text {
                font-size: 15px;
            }

            .konsulin-feature-list {
                grid-template-columns: 1fr;
            }

            .konsulin-image-card {
                border-radius: 22px;
            }

            .konsulin-image-card img {
                height: 340px;
            }

            .konsulin-image-info {
                left: 14px;
                right: 14px;
                bottom: 14px;
                padding: 18px;
            }

            .konsulin-section-head h2 {
                font-size: 27px;
            }

            .konsulin-value-card {
                padding: 24px;
            }
        }
    </style>
@endpush

@section('content')
    <section class="konsulin-about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="konsulin-about-content">
                        <span class="konsulin-badge">
                            <i class="fas fa-circle-check"></i>
                            Konsulin.id
                        </span>

                        <h1 class="konsulin-about-title">
                            Konsultan Bisnis dan Keuangan Profesional untuk
                            <span>Good Governance</span>
                        </h1>

                        <p class="konsulin-about-text">
                            Konsulin merupakan jasa akuntan dan konsultan yang profesional,
                            berintegritas, berkualitas, dan berkompetensi dalam rangka mendorong
                            terwujudnya good governance di Indonesia.
                        </p>

                        <p class="konsulin-about-text">
                            Kami memberikan jasa profesional konsultasi usaha dengan kompetensi tinggi,
                            integritas, obyektif, dan sesuai standar profesional yang berlaku.
                        </p>

                        <ul class="konsulin-feature-list">
                            <li>
                                <i class="fas fa-check"></i>
                                Terbaik untuk Bisnis dan Perpajakan
                            </li>
                            <li>
                                <i class="fas fa-check"></i>
                                Akurat, Efektif, dan Efisien
                            </li>
                            <li>
                                <i class="fas fa-check"></i>
                                Certified Professional Financial Planner
                            </li>
                            <li>
                                <i class="fas fa-check"></i>
                                Certified Financial Advisors
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="konsulin-image-card">
                        <img src="{{ asset('frontend-assets/img/hero/hero1.jpeg') }}" alt="Konsulin.id Consultant">

                        <div class="konsulin-image-info">
                            <h4>Solusi Profesional untuk Bisnis Anda</h4>
                            <p>
                                Pendampingan bisnis, keuangan, akuntansi, dan perpajakan
                                dengan pendekatan yang terukur dan profesional.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="konsulin-values">
        <div class="container">
            <div class="konsulin-section-head">
                <span class="sub-title">Our Value</span>
                <h2>
                    Optimalisasi kualitas dan pelayanan terbaik dengan harga kompetitif dari Konsulin.
                </h2>
            </div>

            <div class="row justify-content-center gutter-24">
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                    <div class="konsulin-value-card">
                        <div class="konsulin-value-icon">
                            <i class="flaticon-happy"></i>
                        </div>
                        <h3>Pelayanan Terbaik</h3>
                        <p>
                            Kami memiliki strategi untuk menyajikan layanan secara tepat,
                            profesional, dan sesuai kebutuhan klien.
                        </p>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                    <div class="konsulin-value-card">
                        <div class="konsulin-value-icon">
                            <i class="flaticon-handshake"></i>
                        </div>
                        <h3>Kolaborasi</h3>
                        <p>
                            Menjaga hubungan positif, saling menghormati, dan membangun
                            lingkungan kerja yang produktif.
                        </p>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                    <div class="konsulin-value-card">
                        <div class="konsulin-value-icon">
                            <i class="flaticon-light-bulb"></i>
                        </div>
                        <h3>Hadirkan Solusi</h3>
                        <p>
                            Selalu terbuka dalam mencari solusi terbaik untuk membantu
                            pertumbuhan dan kesuksesan bisnis.
                        </p>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                    <div class="konsulin-value-card">
                        <div class="konsulin-value-icon">
                            <i class="flaticon-life-insurance"></i>
                        </div>
                        <h3>Integritas</h3>
                        <p>
                            Bertindak jujur, obyektif, dan berintegritas sesuai kode etik
                            serta standar profesional yang berlaku.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('front.include.cta')
@endsection

@push('addon-script')
@endpush
