@extends('front.layout.front_layout')

@section('title')
    Jasa Pendirian Legalitas PT. Perorangan
@endsection

@section('meta_desc')
    Dapatkan jasa pendirian legalitas PT. Perorangan yang cepat dan mudah. Konsulin membantu Anda mendirikan usaha dengan
    prosedur yang tepat, memastikan kepatuhan hukum dan kemudahan dalam berbisnis.
@endsection

@section('meta_key')
    konsulin, layanan pajak, akuntansi terbaik, pertumbuhan usaha, perencanaan keuangan, kepatuhan pajak, solusi pajak,
    konsultasi bisnis, layanan akuntansi, pajak usaha, pengelolaan keuangan, jasa pendirian PT Perorangan, legalitas usaha,
    pendirian perusahaan, jasa legalitas, konsultasi hukum, pendaftaran PT, kepatuhan hukum, layanan pendirian usaha,
    pengurusan legalitas, pendirian bisnis yang efisien
@endsection

@push('addon-style')
    <style>
        .services__details-area {
            position: relative;
            overflow: visible;
            padding: 96px 0;
            background:
                radial-gradient(circle at 10% 8%, rgba(18, 104, 255, 0.08), transparent 28%),
                radial-gradient(circle at 92% 18%, rgba(18, 104, 255, 0.06), transparent 28%),
                linear-gradient(180deg, #f8fbff 0%, #ffffff 100%);
        }

        .services__details-wrap>.row {
            display: grid;
            grid-template-columns: 340px minmax(0, 1fr);
            gap: 34px;
            align-items: start;
            margin: 0;
        }

        .services__details-wrap>.row>.col-70,
        .services__details-wrap>.row>.col-30 {
            width: 100%;
            max-width: 100%;
            padding: 0;
        }

        .services__details-content {
            padding: 42px;
            background: #ffffff;
            border: 1px solid #e6edf5;
            border-radius: 26px;
            box-shadow: 0 22px 70px rgba(15, 23, 42, 0.08);
        }

        .services__details-content h2.title {
            margin: 0 0 18px;
            color: #07152f;
            font-size: clamp(30px, 4vw, 44px);
            font-weight: 900;
            line-height: 1.15;
            letter-spacing: -0.045em;
        }

        .services__details-content>p {
            max-width: 850px;
            margin-bottom: 18px;
            color: #64748b;
            font-size: 16px;
            line-height: 1.85;
        }

        .services__details-list {
            margin-top: 32px;
        }

        .services__details-list>.row {
            row-gap: 22px;
        }

        .services__details-area,
        .services__details-wrap,
        .services__details-row {
            overflow: visible !important;
        }

        .services__details-row {
            align-items: flex-start;
        }

        .services__sidebar-col {
            position: relative;
            align-self: stretch;
            min-width: 0;
        }

        .services__sidebar {
            border-radius: 24px;
        }

        .services__sidebar-js {
            width: 100%;
            will-change: top, left;
        }

        .services__sidebar-js.is-fixed {
            position: fixed;
            top: 110px;
            z-index: 99;
        }

        .services__sidebar-js.is-bottom {
            position: absolute;
            top: auto;
            bottom: 0;
            left: 0;
            z-index: 99;
        }

        .services__sidebar .sidebar__cat-list-two,
        .services__sidebar .sidebar__contact {
            padding: 2rem;
        }

        @media (max-width: 991px) {

            .services__sidebar-js,
            .services__sidebar-js.is-fixed,
            .services__sidebar-js.is-bottom {
                position: static !important;
                top: auto !important;
                left: auto !important;
                bottom: auto !important;
                width: 100% !important;
            }

            .services__sidebar-col {
                margin-bottom: 30px;
            }
        }

        .project__details-info {
            height: 100%;
            padding: 30px;
            background: #07152f;
            border-radius: 22px;
            box-shadow: 0 20px 55px rgba(15, 23, 42, 0.16);
        }

        .project__details-info .title {
            margin: 0 0 22px;
            color: #ffffff;
            font-size: 22px;
            font-weight: 900;
        }

        .project__details-info ul {
            display: grid;
            gap: 14px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .project__details-info li {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding-bottom: 14px;
            color: #ffffff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
            font-size: 15px;
            font-weight: 900;
            line-height: 1.5;
        }

        .project__details-info li:last-child {
            display: block;
            padding-bottom: 0;
            border-bottom: 0;
        }

        .project__details-info li span {
            color: rgba(255, 255, 255, 0.68);
            font-weight: 700;
        }

        .project__details-info del {
            color: rgba(255, 255, 255, 0.48);
        }

        .project__details-info .btn {
            width: 100%;
            min-height: 54px;
            margin-top: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #07152f;
            background: #ffffff;
            border: 0;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 900;
            text-decoration: none;
            transition: 0.25s ease;
        }

        .project__details-info .btn:hover {
            color: #07152f;
            transform: translateY(-2px);
        }

        .services__details-list-box {
            height: 100%;
            padding: 30px;
            display: flex;
            gap: 18px;
            background: #f8fbff;
            border: 1px solid #e6edf5;
            border-radius: 22px;
            transition: 0.25s ease;
        }

        .services__details-list-box:hover {
            transform: translateY(-4px);
            background: #ffffff;
            border-color: rgba(18, 104, 255, 0.25);
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.07);
        }

        .services__details-list-box .icon {
            flex: 0 0 64px;
            width: 64px;
            height: 64px;
            display: grid;
            place-items: center;
            color: #1268ff;
            background: #eef6ff;
            border: 1px solid #dce8ff;
            border-radius: 18px;
            font-size: 32px;
        }

        .services__details-list-box .content {
            flex: 1;
        }

        .services__details-list-box .title {
            margin: 0 0 10px;
            color: #07152f;
            font-size: 21px;
            font-weight: 900;
            line-height: 1.3;
        }

        .services__details-list-box p {
            margin: 0;
            color: #64748b;
            font-size: 15px;
            line-height: 1.75;
        }

        .services__details-inner {
            margin-top: 34px;
        }

        .services__details-inner-content {
            padding: 32px;
            background: #ffffff;
            border: 1px solid #e6edf5;
            border-radius: 22px;
            box-shadow: 0 14px 42px rgba(15, 23, 42, 0.04);
        }

        .services__details-inner-content .title {
            margin: 0 0 12px;
            color: #07152f;
            font-size: 24px;
            font-weight: 900;
            line-height: 1.3;
        }

        .services__details-inner-content>p {
            margin: 0;
            color: #64748b;
            font-size: 16px;
            line-height: 1.75;
        }

        .about__list-box .list-wrap {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px 18px;
            margin: 24px 0 0;
            padding: 0;
            list-style: none;
        }

        .about__list-box .list-wrap li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 14px 16px;
            color: #07152f;
            background: #f8fbff;
            border: 1px solid #e6edf5;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 800;
            line-height: 1.55;
        }

        .about__list-box .list-wrap li i {
            flex: 0 0 22px;
            width: 22px;
            height: 22px;
            margin-top: 1px;
            display: grid;
            place-items: center;
            color: #ffffff;
            background: #1268ff;
            border-radius: 50%;
            font-size: 10px;
        }

        /* Accordion harga */
        .services__details-area .accordion {
            display: grid;
            gap: 14px;
        }

        .services__details-area .accordion-item {
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e6edf5;
            border-radius: 18px;
            box-shadow: 0 12px 34px rgba(15, 23, 42, 0.05);
        }

        .services__details-area .accordion-header {
            margin: 0;
        }

        .services__details-area .accordion-button {
            padding: 18px 22px;
            color: #07152f;
            background: #ffffff;
            border: 0;
            box-shadow: none;
            font-size: 15px;
            font-weight: 900;
            line-height: 1.4;
        }

        .services__details-area .accordion-button:not(.collapsed) {
            color: #ffffff;
            background: #1268ff;
            box-shadow: none;
        }

        .services__details-area .accordion-button:focus {
            box-shadow: none;
            border-color: transparent;
        }

        .services__details-area .accordion-button::after {
            width: 18px;
            height: 18px;
            background-size: 18px;
            filter: none;
        }

        .services__details-area .accordion-button:not(.collapsed)::after {
            filter: brightness(0) invert(1);
        }

        .services__details-area .accordion-collapse {
            background: #ffffff;
        }

        .services__details-area .accordion-collapse .project__details-info {
            border-radius: 0;
            box-shadow: none;
        }

        /* Sidebar */
        /* .services__sidebar {
                position: sticky;
                top: 110px;
            } */

        .services__sidebar .sidebar__widget-two {
            padding: 26px;
            background: #ffffff;
            border: 1px solid #e6edf5;
            border-radius: 24px;
            box-shadow: 0 22px 70px rgba(15, 23, 42, 0.08);
        }

        .services__sidebar .sidebar__widget-two+.sidebar__widget-two {
            margin-top: 24px;
        }

        .services__sidebar .sidebar__widget-title {
            position: relative;
            margin: 0 0 20px;
            padding-bottom: 16px;
            color: #07152f;
            font-size: 20px;
            font-weight: 900;
            line-height: 1.3;
        }

        .services__sidebar .sidebar__widget-title::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 48px;
            height: 3px;
            background: #1268ff;
            border-radius: 999px;
        }

        .services__sidebar .services__tab-wrap {
            margin: 0;
        }

        .services__sidebar .nav-tabs,
        .services__sidebar .list-wrap {
            display: grid;
            gap: 10px;
            margin: 0;
            padding: 0;
            border: 0;
            list-style: none;
        }

        .services__sidebar .nav-item {
            width: 100%;
            margin: 0;
        }

        .services__sidebar .nav-link {
            position: relative;
            width: 100%;
            min-height: 54px;
            padding: 14px 44px 14px 16px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            color: #07152f;
            background: #f8fbff;
            border: 1px solid #e6edf5;
            border-radius: 14px;
            text-align: left;
            font-size: 14px;
            font-weight: 800;
            line-height: 1.45;
            transition: 0.25s ease;
        }

        .services__sidebar .nav-link::after {
            content: "→";
            position: absolute;
            right: 16px;
            top: 50%;
            color: #94a3b8;
            font-size: 15px;
            font-weight: 900;
            transform: translateY(-50%);
            transition: 0.25s ease;
        }

        .services__sidebar .nav-link:hover {
            color: #1268ff;
            background: #ffffff;
            border-color: rgba(18, 104, 255, 0.25);
            transform: translateX(3px);
        }

        .services__sidebar .nav-link:hover::after {
            color: #1268ff;
            transform: translate(3px, -50%);
        }

        .services__sidebar .nav-link.active {
            color: #ffffff;
            background: #1268ff;
            border-color: #1268ff;
            box-shadow: 0 14px 34px rgba(18, 104, 255, 0.24);
        }

        .services__sidebar .nav-link.active::after {
            color: #ffffff;
        }

        .services__sidebar .sidebar__contact {
            position: relative;
            overflow: hidden;
            padding: 0;
            background: transparent;
        }

        .services__sidebar .sidebar__contact::before {
            content: "";
            position: absolute;
            right: -55px;
            bottom: -70px;
            width: 160px;
            height: 160px;
            background: rgba(18, 104, 255, 0.08);
            border-radius: 50%;
        }

        .services__sidebar .sidebar__contact .title {
            position: relative;
            z-index: 1;
            margin: 0 0 18px;
            color: #07152f;
            font-size: 22px;
            font-weight: 900;
            line-height: 1.3;
            letter-spacing: -0.025em;
        }

        .services__sidebar .sidebar__contact .btn {
            position: relative;
            z-index: 1;
            width: 100%;
            min-height: 54px;
            padding: 0 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: #ffffff;
            background: #1268ff;
            border: 0;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 900;
            text-decoration: none;
            box-shadow: 0 16px 38px rgba(18, 104, 255, 0.24);
            transition: 0.25s ease;
        }

        .services__sidebar .sidebar__contact .btn:hover {
            color: #ffffff;
            background: #0054e6;
            transform: translateY(-2px);
        }

        .services__sidebar .sidebar__contact .btn i {
            font-size: 18px;
            line-height: 1;
        }

        @media (max-width: 991px) {
            .services__details-area {
                padding: 74px 0;
            }

            .services__details-wrap>.row {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .services__sidebar {
                position: static;
            }

            .services__details-content {
                padding: 32px;
            }

            .services__sidebar .nav-tabs,
            .services__sidebar .list-wrap {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 575px) {
            .services__details-area {
                padding: 62px 0;
            }

            .services__details-content {
                padding: 24px;
                border-radius: 22px;
            }

            .project__details-info,
            .services__details-list-box,
            .services__details-inner-content,
            .services__sidebar .sidebar__widget-two {
                padding: 22px;
                border-radius: 20px;
            }

            .project__details-info li {
                align-items: flex-start;
                flex-direction: column;
                gap: 4px;
            }

            .services__details-list-box {
                flex-direction: column;
            }

            .about__list-box .list-wrap {
                grid-template-columns: 1fr;
            }

            .services__sidebar .nav-tabs,
            .services__sidebar .list-wrap {
                grid-template-columns: 1fr;
            }

            .services__sidebar .nav-link {
                min-height: 50px;
                font-size: 13px;
            }

            .services__sidebar .sidebar__contact .title {
                font-size: 20px;
            }
        }
    </style>
@endpush

@section('content')
    <section class="breadcrumb__area breadcrumb__bg"
        data-background="{{ asset('frontend-assets/img/bg/breadcrumb_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__content">
                        <h2 class="title">Jasa Pendirian Legalitas PT. Perorangan</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('service') }}">Jasa dan Layanan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Jasa Pendirian Legalitas PT.
                                    Perorangan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__shape">
            <img src="{{ asset('frontend-assets/img/images/breadcrumb_shape01.png') }}" alt="">
            <img src="{{ asset('frontend-assets/img/images/breadcrumb_shape02.png') }}" alt="" class="rightToLeft">
            <img src="{{ asset('frontend-assets/img/images/breadcrumb_shape03.png') }}" alt="">
            <img src="{{ asset('frontend-assets/img/images/breadcrumb_shape04.png') }}" alt="">
            <img src="{{ asset('frontend-assets/img/images/breadcrumb_shape05.png') }}" alt=""
                class="alltuchtopdown">
        </div>
    </section>

    <section class="services__details-area">
        <div class="container">
            <div class="services__details-wrap">
                <div class="row services__details-row">
                    <div class="col-70 order-0 order-lg-2">
                        <div class="tab-content" id="myTabContent">
                            {{-- PMA --}}
                            <div class="tab-pane fade show active" id="pma-tab-pane" role="tabpanel"
                                aria-labelledby="pma-tab" tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Pembuatan Legalitas Penanaman Modal Asing (PMA)</h2>
                                    <p>Kami menyediakan layanan pembuatan legalitas penanaman modal asing dengan proses
                                        cepat dan
                                        mudah, memastikan usaha Anda beroperasi sesuai hukum yang berlaku. Dapatkan
                                        legalitas resmi untuk mendukung perkembangan bisnis Anda.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <li><span>Harga Mulai:</span>
                                                            <del>Rp. 15.000.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 13.000.000</li>
                                                        <li><span>Periode Harga:</span>per Pendirian</li>
                                                        <li>
                                                            <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Legalitas PMA*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
                                                                class="btn">Hubungi Kami</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-life-insurance"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Konsultasi Gratis</h4>
                                                        <p>Dapatkan layanan konsultasi gratis dari tim ahli kami untuk
                                                            membantu Anda menemukan solusi bisnis terbaik sesuai kebutuhan.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="services__details-inner">
                                        <div class="row gutter-24 align-items-center">
                                            <div class="col-100">
                                                <div class="services__details-inner-content">
                                                    <h4 class="title">Dapatkan Paket Pembuatan Legalitas PMA
                                                    </h4>
                                                    <p>Dengan membeli paket diatas, Anda akan mendapatkan:</p>
                                                    <div class="about__list-box">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-arrow-button"></i> NIB Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> SKT &amp; NPWP
                                                                Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Pengecekan dan
                                                                Pemesanan Nama</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akta Pendirian dari
                                                                Notaris</li>
                                                            <li><i class="flaticon-arrow-button"></i> Surat Keterangan
                                                                Terdaftar dari KPP</li>
                                                            <li><i class="flaticon-arrow-button"></i> Sertifikat Pendirian
                                                                Kemenkumham</li>

                                                            <li><i class="flaticon-arrow-button"></i> Akun AHU Kemenkumham
                                                                &amp; OSS RBA</li>
                                                            <li><i class="flaticon-arrow-button"></i> Konsultasi Gratis</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- perorangan --}}
                            <div class="tab-pane fade" id="one-tab-pane" role="tabpanel" aria-labelledby="one-tab"
                                tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Pembuatan Legalitas PT. Perorangan</h2>
                                    <p>Kami menyediakan layanan pembuatan legalitas PT Perorangan dengan proses cepat dan
                                        mudah, memastikan usaha Anda beroperasi sesuai hukum yang berlaku. Dapatkan
                                        legalitas resmi untuk mendukung perkembangan bisnis Anda.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <li><span>Harga Mulai:</span>
                                                            <del>Rp. 2.750.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 1.800.000</li>
                                                        <li><span>Periode Harga:</span>per Pendirian</li>
                                                        <li>
                                                            <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Legalitas PT. Perorangan*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
                                                                class="btn">Hubungi Kami</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-life-insurance"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Konsultasi Gratis</h4>
                                                        <p>Dapatkan layanan konsultasi gratis dari tim ahli kami untuk
                                                            membantu Anda menemukan solusi bisnis terbaik sesuai kebutuhan.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="services__details-inner">
                                        <div class="row gutter-24 align-items-center">
                                            <div class="col-100">
                                                <div class="services__details-inner-content">
                                                    <h4 class="title">Dapatkan Paket Pembuatan Legalitas PT. Perorangan
                                                    </h4>
                                                    <p>Dengan membeli paket diatas, Anda akan mendapatkan:</p>
                                                    <div class="about__list-box">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-arrow-button"></i> Pengecekan Nama
                                                                Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Sertifikat Pendirian
                                                                Kemenkumham</li>
                                                            <li><i class="flaticon-arrow-button"></i> Pernyataan Pendirian
                                                                PT. Perorangan</li>
                                                            <li><i class="flaticon-arrow-button"></i> NIB, KBLI, SPPL,
                                                                &amp; K3L</li>
                                                            <li><i class="flaticon-arrow-button"></i> SKT &amp; NPWP
                                                                Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akun AHU &amp; OSS
                                                                RBA</li>
                                                            <li><i class="flaticon-arrow-button"></i> Konsultasi Gratis
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- badan usaha --}}
                            <div class="tab-pane fade" id="two-tab-pane" role="tabpanel" aria-labelledby="one-tab"
                                tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Pembuatan Legalitas PT. Badan Usaha</h2>
                                    <p>Kami menyediakan layanan pembuatan legalitas PT. Badan Usaha dengan proses cepat dan
                                        mudah, memastikan usaha Anda beroperasi sesuai hukum yang berlaku. Dapatkan
                                        legalitas resmi untuk mendukung perkembangan bisnis Anda.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="accordion" id="accordionExample">
                                                    <!---->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Modal 1 juta - 50 juta
                                                            </button>
                                                        </h2>
                                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="project__details-info ms-0">
                                                                <h4 class="title">Detail Harga</h4>
                                                                <ul class="list-wrap">
                                                                    <li><span>Harga Mulai:</span>
                                                                        <del>Rp. 4.750.000</del>
                                                                    </li>
                                                                    <li><span>Diskon Menjadi:</span>Rp. 4.500.000</li>
                                                                    <li><span>Periode Harga:</span>per Pendirian</li>
                                                                    <li>
                                                                        <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Legalitas PT. Badan Usaha*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
                                                                            class="btn">Hubungi Kami</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!---->

                                                    <!---->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                                aria-expanded="false" aria-controls="collapseTwo">
                                                                Modal 51 juta - 1 miliar
                                                            </button>
                                                        </h2>
                                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="project__details-info ms-0">
                                                                <h4 class="title">Detail Harga</h4>
                                                                <ul class="list-wrap">
                                                                    <li><span>Harga Mulai:</span>
                                                                        <del>Rp. 5.750.000</del>
                                                                    </li>
                                                                    <li><span>Diskon Menjadi:</span>Rp. 5.000.000</li>
                                                                    <li><span>Periode Harga:</span>per Pendirian</li>
                                                                    <li>
                                                                        <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Legalitas PT. Badan Usaha*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
                                                                            class="btn">Hubungi Kami</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!---->

                                                    <!---->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                                aria-expanded="false" aria-controls="collapseThree">
                                                                Modal 1 miliar - 10 miliar
                                                            </button>
                                                        </h2>
                                                        <div id="collapseThree" class="accordion-collapse collapse"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="project__details-info ms-0">
                                                                <h4 class="title">Detail Harga</h4>
                                                                <ul class="list-wrap">
                                                                    <li><span>Harga Mulai:</span>
                                                                        <del>Rp. 8.950.000</del>
                                                                    </li>
                                                                    <li><span>Diskon Menjadi:</span>Rp. 8.000.000</li>
                                                                    <li><span>Periode Harga:</span>per Pendirian</li>
                                                                    <li><span>BONUS:</span>Virtual Office 1 Tahun</li>
                                                                    <li>
                                                                        <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Legalitas PT. Badan Usaha*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
                                                                            class="btn">Hubungi Kami</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!---->

                                                    <!---->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                                aria-expanded="false" aria-controls="collapseFour">
                                                                Modal > 10 miliar
                                                            </button>
                                                        </h2>
                                                        <div id="collapseFour" class="accordion-collapse collapse"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="project__details-info ms-0">
                                                                <h4 class="title">Detail Harga</h4>
                                                                <ul class="list-wrap">
                                                                    <li><span>Harga:</span>Negotiable</li>
                                                                    <li><span>Periode Harga:</span>per Pendirian</li>
                                                                    <li>
                                                                        <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Legalitas PT. Badan Usaha*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
                                                                            class="btn">Hubungi Kami</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!---->

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-life-insurance"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Konsultasi Gratis</h4>
                                                        <p>Dapatkan layanan konsultasi gratis dari tim ahli kami untuk
                                                            membantu Anda menemukan solusi bisnis terbaik sesuai kebutuhan.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="services__details-inner">
                                        <div class="row gutter-24 align-items-center">
                                            <div class="col-100">
                                                <div class="services__details-inner-content">
                                                    <h4 class="title">Dapatkan Paket Pembuatan Legalitas PT. Badan Usaha
                                                    </h4>
                                                    <p>Dengan membeli paket diatas, Anda akan mendapatkan:</p>
                                                    <div class="about__list-box">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-arrow-button"></i> Pengecekan Nama
                                                                Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Sertifikat Pendirian
                                                                Kemenkumham</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akta Pendirian dari
                                                                Notaris</li>
                                                            <li><i class="flaticon-arrow-button"></i> NIB &amp; KBLI</li>
                                                            <li><i class="flaticon-arrow-button"></i> SKT &amp; NPWP
                                                                Digital Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akun AHU &amp; OSS
                                                                RBA</li>
                                                            <li><i class="flaticon-arrow-button"></i> Konsultasi Gratis
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- cv --}}
                            <div class="tab-pane fade" id="three-tab-pane" role="tabpanel" aria-labelledby="one-tab"
                                tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Pembuatan Legalitas CV</h2>
                                    <p>Kami menyediakan layanan pembuatan legalitas CV dengan proses cepat dan
                                        mudah, memastikan usaha Anda beroperasi sesuai hukum yang berlaku. Dapatkan
                                        legalitas resmi untuk mendukung perkembangan bisnis Anda.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <li><span>Harga Mulai:</span>
                                                            <del>Rp. 4.500.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 4.000.000</li>
                                                        <li><span>Periode Harga:</span>per Pendirian</li>
                                                        <li>
                                                            <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Legalitas CV*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
                                                                class="btn">Hubungi Kami</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-life-insurance"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Konsultasi Gratis</h4>
                                                        <p>Dapatkan layanan konsultasi gratis dari tim ahli kami untuk
                                                            membantu Anda menemukan solusi bisnis terbaik sesuai kebutuhan.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="services__details-inner">
                                        <div class="row gutter-24 align-items-center">
                                            <div class="col-100">
                                                <div class="services__details-inner-content">
                                                    <h4 class="title">Dapatkan Paket Pembuatan Legalitas CV
                                                    </h4>
                                                    <p>Dengan membeli paket diatas, Anda akan mendapatkan:</p>
                                                    <div class="about__list-box">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-arrow-button"></i> Pengecekan Nama
                                                                Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Sertifikat Pendirian
                                                                Kemenkumham</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akta Pendirian dari
                                                                Notaris</li>
                                                            <li><i class="flaticon-arrow-button"></i> NIB &amp; KBLI</li>
                                                            <li><i class="flaticon-arrow-button"></i> SKT &amp; NPWP
                                                                Digital Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akun AHU &amp; OSS
                                                                RBA</li>
                                                            <li><i class="flaticon-arrow-button"></i> Konsultasi Gratis
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- yayasan --}}
                            <div class="tab-pane fade" id="four-tab-pane" role="tabpanel" aria-labelledby="one-tab"
                                tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Pembuatan Legalitas Yayasan</h2>
                                    <p>Kami menyediakan layanan pembuatan legalitas Yayasan dengan proses cepat dan
                                        mudah, memastikan usaha Anda beroperasi sesuai hukum yang berlaku. Dapatkan
                                        legalitas resmi untuk mendukung perkembangan bisnis Anda.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="accordion" id="accordionExample">
                                                    <!---->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Modal 1 juta - 50 juta
                                                            </button>
                                                        </h2>
                                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="project__details-info ms-0">
                                                                <h4 class="title">Detail Harga</h4>
                                                                <ul class="list-wrap">
                                                                    <li><span>Harga Mulai:</span>
                                                                        <del>Rp. 5.750.000</del>
                                                                    </li>
                                                                    <li><span>Diskon Menjadi:</span>Rp. 5.000.000</li>
                                                                    <li><span>Periode Harga:</span>per Pendirian</li>
                                                                    <li>
                                                                        <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Legalitas Yayasan*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
                                                                            class="btn">Hubungi Kami</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!---->

                                                    <!---->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                                aria-expanded="false" aria-controls="collapseTwo">
                                                                Modal 51 juta - 1 miliar
                                                            </button>
                                                        </h2>
                                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="project__details-info ms-0">
                                                                <h4 class="title">Detail Harga</h4>
                                                                <ul class="list-wrap">
                                                                    <li><span>Harga Mulai:</span>
                                                                        <del>Rp. 5.750.000</del>
                                                                    </li>
                                                                    <li><span>Diskon Menjadi:</span>Rp. 5.000.000</li>
                                                                    <li><span>Periode Harga:</span>per Pendirian</li>
                                                                    <li>
                                                                        <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Legalitas Yayasan*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
                                                                            class="btn">Hubungi Kami</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!---->

                                                    <!---->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                                aria-expanded="false" aria-controls="collapseThree">
                                                                Modal 1 miliar - 10 miliar
                                                            </button>
                                                        </h2>
                                                        <div id="collapseThree" class="accordion-collapse collapse"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="project__details-info ms-0">
                                                                <h4 class="title">Detail Harga</h4>
                                                                <ul class="list-wrap">
                                                                    <li><span>Harga Mulai:</span>
                                                                        <del>Rp. 8.950.000</del>
                                                                    </li>
                                                                    <li><span>Diskon Menjadi:</span>Rp. 8.000.000</li>
                                                                    <li><span>Periode Harga:</span>per Pendirian</li>
                                                                    <li><span>BONUS:</span>Virtual Office 1 Tahun</li>
                                                                    <li>
                                                                        <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Legalitas Yayasan*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
                                                                            class="btn">Hubungi Kami</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!---->

                                                    <!---->
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                                aria-expanded="false" aria-controls="collapseFour">
                                                                Modal > 10 miliar
                                                            </button>
                                                        </h2>
                                                        <div id="collapseFour" class="accordion-collapse collapse"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="project__details-info ms-0">
                                                                <h4 class="title">Detail Harga</h4>
                                                                <ul class="list-wrap">
                                                                    <li><span>Harga:</span>Negotiable</li>
                                                                    <li><span>Periode Harga:</span>per Pendirian</li>
                                                                    <li>
                                                                        <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Legalitas Yayasan*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
                                                                            class="btn">Hubungi Kami</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!---->

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-life-insurance"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Konsultasi Gratis</h4>
                                                        <p>Dapatkan layanan konsultasi gratis dari tim ahli kami untuk
                                                            membantu Anda menemukan solusi bisnis terbaik sesuai kebutuhan.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="services__details-inner">
                                        <div class="row gutter-24 align-items-center">
                                            <div class="col-100">
                                                <div class="services__details-inner-content">
                                                    <h4 class="title">Dapatkan Paket Pembuatan Legalitas Yayasan
                                                    </h4>
                                                    <p>Dengan membeli paket diatas, Anda akan mendapatkan:</p>
                                                    <div class="about__list-box">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-arrow-button"></i> Pengecekan Nama
                                                                Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Sertifikat Pendirian
                                                                Kemenkumham</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akta Pendirian dari
                                                                Notaris</li>
                                                            <li><i class="flaticon-arrow-button"></i> NIB &amp; KBLI</li>
                                                            <li><i class="flaticon-arrow-button"></i> SKT &amp; NPWP
                                                                Digital Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akun AHU &amp; OSS
                                                                RBA</li>
                                                            <li><i class="flaticon-arrow-button"></i> Konsultasi Gratis
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- lainnya --}}
                            <div class="tab-pane fade" id="five-tab-pane" role="tabpanel" aria-labelledby="one-tab"
                                tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Legalitas Lainnya</h2>
                                    <p>Kami menyediakan layanan pembuatan legalitas lainnya sesuai kebutuhan perusahaan
                                        Anda, memastikan usaha Anda beroperasi sesuai hukum yang berlaku. Dapatkan
                                        legalitas resmi untuk mendukung perkembangan bisnis Anda.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-report"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Akta Jual Beli Saham / Hibah</h4>
                                                        <p>Rp. 4.000.000 per Pendirian</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-report"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Akta PPJB</h4>
                                                        <p>Negotiable - Minimal Rp. 1.500.000
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-report"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Akta Surat Keterangan Waris</h4>
                                                        <p>Rp. 7.000.000 per Akta</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-report"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Akta Pendirian Perkumpulan</h4>
                                                        <p>Rp. 4.000.000 per Akta
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-report"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Akta Pembukaan Cabang PT, CV, Yayasan</h4>
                                                        <p>Rp. 3.500.000 per Akta</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-report"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Akta Pernyataan</h4>
                                                        <p>Rp. 2.500.000 per Akta
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-finance"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Personal Guarentee</h4>
                                                        <p>Rp. 2.500.000 per Dokumen</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-finance"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Corporate Guarantee</h4>
                                                        <p>Rp. 3.500.000 per Dokumen
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-finance"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Legalisasi</h4>
                                                        <p>Rp. 1.000.000 per Dokumen</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-finance"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Beneficial Owner</h4>
                                                        <p>Rp. 2.000.000 per Dokumen
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ route('services.npwp') }}" class="col-md-6">
                                                <div class="services__details-list-box">
                                                    <div class="icon">
                                                        <i class="flaticon-finance"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">Jasa Pengurusuan Dokument</h4>
                                                        <p>Rp. 2.000.000 per Dokumen
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-30 services__sidebar-col">
                        <aside class="services__sidebar services__sidebar-js">
                            <div class="sidebar__widget sidebar__widget-two">
                                <div class="sidebar__cat-list-two" style="padding: 2rem;">
                                    <h4 class="sidebar__widget-title">Jenis Layanan &amp; Jasa</h4>
                                    <div class="services__tab-wrap">
                                        <ul class="list-wrap nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <button class="nav-link active" id="pma-tab" data-bs-toggle="tab"
                                                    data-bs-target="#pma-tab-pane" type="button" role="tab"
                                                    aria-controls="pma-tab-pane" aria-selected="true">Penanaman Modal
                                                    Asing</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="one-tab" data-bs-toggle="tab"
                                                    data-bs-target="#one-tab-pane" type="button" role="tab"
                                                    aria-controls="one-tab-pane" aria-selected="true">Legalitas PT.
                                                    Perorangan</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="two-tab" data-bs-toggle="tab"
                                                    data-bs-target="#two-tab-pane" type="button" role="tab"
                                                    aria-controls="two-tab-pane" aria-selected="true">Legalitas PT.
                                                    Badan Usaha</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="three-tab" data-bs-toggle="tab"
                                                    data-bs-target="#three-tab-pane" type="button" role="tab"
                                                    aria-controls="three-tab-pane" aria-selected="true">Legalitas
                                                    CV</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="four-tab" data-bs-toggle="tab"
                                                    data-bs-target="#four-tab-pane" type="button" role="tab"
                                                    aria-controls="four-tab-pane" aria-selected="true">Legalitas
                                                    Yayasan</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="five-tab" data-bs-toggle="tab"
                                                    data-bs-target="#five-tab-pane" type="button" role="tab"
                                                    aria-controls="five-tab-pane" aria-selected="true">Lainnya</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__widget sidebar__widget-two">
                                <div class="sidebar__contact" style="padding: 2rem;">
                                    <h2 class="title">Perlu Bantuan? Kontak Kami Sekarang</h2>
                                    <a href="tel:{{ getCompanyProfile()->phone_com1 }}" class="btn"><i
                                            class="flaticon-phone-call"></i>+{{ getCompanyProfile()->phone_com1 }}</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <x-related-services/>
    @include('front.include.cta')
@endsection

@push('addon-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const OFFSET_TOP = 110;
            const BREAKPOINT = 992;

            const stickySections = document.querySelectorAll('.services__details-area');

            stickySections.forEach(function(section) {
                const sidebarCol = section.querySelector('.services__sidebar-col');
                const sidebar = section.querySelector('.services__sidebar-js');

                if (!sidebarCol || !sidebar) return;

                function resetSidebar() {
                    sidebar.classList.remove('is-fixed', 'is-bottom');
                    sidebar.style.width = '';
                    sidebar.style.left = '';
                    sidebar.style.top = '';
                    sidebar.style.bottom = '';
                }

                function updateSidebar() {
                    if (window.innerWidth < BREAKPOINT) {
                        resetSidebar();
                        return;
                    }

                    const sectionRect = section.getBoundingClientRect();
                    const colRect = sidebarCol.getBoundingClientRect();

                    const scrollY = window.scrollY || window.pageYOffset;

                    const sectionTop = sectionRect.top + scrollY;
                    const sectionBottom = sectionTop + section.offsetHeight;

                    const sidebarHeight = sidebar.offsetHeight;
                    const colWidth = sidebarCol.offsetWidth;
                    const colLeft = colRect.left;

                    const startSticky = sectionTop - OFFSET_TOP;
                    const stopSticky = sectionBottom - sidebarHeight - OFFSET_TOP;

                    if (scrollY < startSticky) {
                        resetSidebar();
                    } else if (scrollY >= startSticky && scrollY < stopSticky) {
                        sidebar.classList.add('is-fixed');
                        sidebar.classList.remove('is-bottom');

                        sidebar.style.width = colWidth + 'px';
                        sidebar.style.left = colLeft + 'px';
                        sidebar.style.top = OFFSET_TOP + 'px';
                        sidebar.style.bottom = 'auto';
                    } else {
                        sidebar.classList.remove('is-fixed');
                        sidebar.classList.add('is-bottom');

                        sidebar.style.width = colWidth + 'px';
                        sidebar.style.left = '0';
                        sidebar.style.top = 'auto';
                        sidebar.style.bottom = '0';
                    }
                }

                let ticking = false;

                function requestUpdate() {
                    if (!ticking) {
                        window.requestAnimationFrame(function() {
                            updateSidebar();
                            ticking = false;
                        });

                        ticking = true;
                    }
                }

                window.addEventListener('scroll', requestUpdate);
                window.addEventListener('resize', requestUpdate);
                window.addEventListener('load', updateSidebar);

                updateSidebar();
            });
        });
    </script>
@endpush
