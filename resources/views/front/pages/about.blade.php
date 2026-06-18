@extends('front.layout.front_layout')

@section('title')
    Tentang Kami
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
    <link href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery-bundle.min.css" rel="stylesheet">

    <style>
        .hero-gallery-section {
    position: relative;
    padding: 96px 0;
    overflow: hidden;
    background:
        radial-gradient(circle at 12% 20%, rgba(18, 104, 255, 0.08), transparent 28%),
        linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
}

.hero-gallery-header {
    max-width: 720px;
    margin: 0 auto 42px;
    text-align: center;
}

.hero-gallery-header .sub-title {
    display: inline-flex;
    margin-bottom: 14px;
    padding: 8px 16px;
    color: #1268ff;
    background: #eef6ff;
    border: 1px solid #dce8ff;
    border-radius: 999px;
    font-size: 14px;
    font-weight: 900;
}

.hero-gallery-header .title {
    margin: 0 0 16px;
    color: #07152f;
    font-size: clamp(30px, 4vw, 44px);
    font-weight: 900;
    line-height: 1.15;
    letter-spacing: -0.045em;
}

.hero-gallery-header p {
    margin: 0;
    color: #64748b;
    font-size: 16px;
    line-height: 1.8;
}

.hero-photo-gallery {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    grid-auto-rows: 175px;
    gap: 20px;
}

.hero-photo-card {
    position: relative;
    display: block;
    overflow: hidden;
    border-radius: 26px;
    background: #ffffff;
    border: 1px solid #e6edf5;
    box-shadow: 0 22px 60px rgba(15, 23, 42, 0.08);
}

.hero-photo-main {
    grid-column: span 6;
    grid-row: span 2;
}

.hero-photo-small {
    grid-column: span 3;
    grid-row: span 1;
}

.hero-photo-wide {
    grid-column: span 4;
    grid-row: span 1;
}

.hero-photo-tall {
    grid-column: span 5;
    grid-row: span 1;
}

.hero-photo-card::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 1;
    background: linear-gradient(180deg, transparent 45%, rgba(7, 21, 47, 0.32) 100%);
    opacity: 0;
    transition: 0.3s ease;
}

.hero-photo-card img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    object-position: center;
    transition: 0.45s ease;
}

.hero-photo-card:hover::before {
    opacity: 1;
}

.hero-photo-card:hover img {
    transform: scale(1.06);
}

@media (max-width: 991px) {
    .hero-gallery-section {
        padding: 74px 0;
    }

    .hero-photo-gallery {
        grid-template-columns: repeat(2, 1fr);
        grid-auto-rows: 240px;
        gap: 18px;
    }

    .hero-photo-main,
    .hero-photo-small,
    .hero-photo-wide,
    .hero-photo-tall {
        grid-column: span 1;
        grid-row: span 1;
    }

    .hero-photo-main {
        grid-column: span 2;
    }
}

@media (max-width: 575px) {
    .hero-gallery-section {
        padding: 62px 0;
    }

    .hero-gallery-header {
        margin-bottom: 30px;
        text-align: left;
    }

    .hero-photo-gallery {
        grid-template-columns: 1fr;
        grid-auto-rows: 230px;
        gap: 16px;
    }

    .hero-photo-main,
    .hero-photo-small,
    .hero-photo-wide,
    .hero-photo-tall {
        grid-column: span 1;
        grid-row: span 1;
    }

    .hero-photo-card {
        border-radius: 20px;
    }
}
    </style>
@endpush



@section('content')
    <section class="about__area-three about__bg-two" data-background="{{ asset('frontend-assets/img/bg/h3_about_bg.jpg') }}">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-9">
                    <div id="lightgallery" class="choose__img-wrap-five">
                        <a href="{{ asset('frontend-assets/img/legalitas/legalitas-1-large.jpg?v=2') }}">
                            <img src="{{ asset('frontend-assets/img/legalitas/legalitas-1.jpg?v=2') }}" alt="">
                        </a>
                        <a href="{{ asset('frontend-assets/img/legalitas/legalitas-2-large.jpg') }}"
                            style="
                        border-radius: 20px;
                        border: 6px solid var(--tg-color-white-default);
                        position: absolute;
                        right: 10%;
                        bottom: 0;">
                            <img src="{{ asset('frontend-assets/img/legalitas/legalitas-2.jpg') }}" alt="">
                        </a>
                        <img src="{{ asset('frontend-assets/img/images/h5_choose_shape01.jpg') }}" alt=""
                            data-parallax="{&quot;x&quot; : 40}"
                            style="transform:translate3d(0.029px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(0.029px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); ">
                        <img src="{{ asset('frontend-assets/img/images/h5_choose_shape01.png') }}" alt=""
                            class="alltuchtopdown">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about__content-three">
                        <div class="section-title mb-25">
                            <span class="sub-title">Tentang Konsulin</span>
                            <h2 class="title">Solusi Pajak dan Akuntansi Terdepan untuk Mempercepat Pertumbuhan Bisnis Anda
                            </h2>
                        </div>
                        <p>Dengan layanan profesional dan terpercaya, kami siap membantu Anda mengelola pajak dan akuntansi
                            secara efektif, sehingga Anda dapat fokus pada pengembangan bisnis.</p>
                        <div class="about__content-inner about__content-inner-two">
                            <div class="experience__box-three">
                                <div class="title">
                                    <span>10</span>
                                </div>
                                <p>Years <span>Experience</span> in Business &amp; <span>Accounting</span></p>
                            </div>
                            <div class="about__list-box about__list-box-two">
                                <ul class="list-wrap">
                                    <li><i class="flaticon-arrow-button"></i>Pelayanan Terbaik</li>
                                    <li><i class="flaticon-arrow-button"></i>Menghadirkan Solusi</li>
                                    <li><i class="flaticon-arrow-button"></i>Kolaborasi</li>
                                    <li><i class="flaticon-arrow-button"></i>Integritas</li>
                                </ul>
                            </div>
                        </div>
                        <div class="about-bottom about-bottom-two">
                            <div class="author-wrap">
                                <div class="thumb">
                                    <img src="{{ asset('frontend-assets/img/legalitas/ceo.jpg') }}"
                                        alt="Adi Putra Rizkillah">
                                </div>
                                <div class="content">
                                    <!--<img src="{{ asset('frontend-assets/img/images/sign.png') }}" alt="">-->
                                    <h4 class="title">Adi Putra Rizkillah <span>, CEO</span></h4>
                                </div>
                            </div>
                            <div class="about__phone">
                                <div class="icon">
                                    <i class="flaticon-phone-call"></i>
                                </div>
                                <div class="content">
                                    <span>Hot Line Number</span>
                                    <a
                                        href="tel:{{ getCompanyProfile()->phone_com1 }}">+{{ getCompanyProfile()->phone_com1 }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="about__shape-wrap-three">
                            <img src="{{ asset('frontend-assets/img/images/h3_about_shape01.png') }}" alt=""
                                class="rotateme">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hero-gallery-section">
        <div class="container">
            <div class="hero-gallery-header">
                <span class="sub-title">Dokumentasi Konsulin</span>
                <h2 class="title">Momen Profesional Bersama Klien dan Tim Konsulin</h2>
                <p>
                    Beberapa dokumentasi kegiatan dan suasana profesional Konsulin dalam mendampingi kebutuhan
                    pajak, akuntansi, legalitas, dan pengembangan bisnis.
                </p>
            </div>

            <div id="heroPhotoGallery" class="hero-photo-gallery">
                <a href="{{ asset('frontend-assets/img/hero/hero1.jpeg') }}" class="hero-photo-card hero-photo-main">
                    <img src="{{ asset('frontend-assets/img/hero/hero1.jpeg') }}" alt="Dokumentasi Konsulin">
                </a>

                <a href="{{ asset('frontend-assets/img/hero/hero4.jpeg') }}" class="hero-photo-card hero-photo-small">
                    <img src="{{ asset('frontend-assets/img/hero/hero4.jpeg') }}" alt="Dokumentasi Meeting Konsulin">
                </a>

                <a href="{{ asset('frontend-assets/img/hero/hero3.jpeg') }}" class="hero-photo-card hero-photo-small">
                    <img src="{{ asset('frontend-assets/img/hero/hero3.jpeg') }}" alt="Dokumentasi Klien Konsulin">
                </a>
                <a href="{{ asset('frontend-assets/img/hero/hero2.jpeg') }}" class="hero-photo-card hero-photo-main">
                    <img src="{{ asset('frontend-assets/img/hero/hero2.jpeg') }}" alt="Dokumentasi Konsulin">
                </a>

                <a href="{{ asset('frontend-assets/img/hero/hero5.jpeg') }}" class="hero-photo-card hero-photo-small">
                    <img src="{{ asset('frontend-assets/img/hero/hero5.jpeg') }}" alt="Dokumentasi Meeting Konsulin">
                </a>

                <a href="{{ asset('frontend-assets/img/hero/hero6.jpeg') }}" class="hero-photo-card hero-photo-small">
                    <img src="{{ asset('frontend-assets/img/hero/hero6.jpeg') }}" alt="Dokumentasi Klien Konsulin">
                </a>
            </div>
        </div>
    </section>

    

    @include('front.include.cta')
@endsection

@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/lightgallery.min.js"></script>
    <script>
        lightGallery(document.getElementById('lightgallery'), {
            speed: 500,
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof lightGallery !== 'undefined') {
                lightGallery(document.getElementById('heroPhotoGallery'), {
                    selector: 'a',
                    speed: 500,
                    download: false,
                });
            }
        });
    </script>
@endpush
