@extends('front.layout.front_layout')

@section('title')
    Konsultan Bisnis dan Keuangan Terbaik
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
@endpush

@section('content')
    <!-- slider-area-old-start -->

    {{-- <section class="slider__area">
        <div class="swiper-container slider__active">
            <div class="swiper-wrapper">
                <div class="swiper-slide slider__single">
                    <div class="slider__bg" data-background="{{ asset('frontend-assets/img/slider/slider_bg01.jpg') }}"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider__content">
                                    <span class="sub-title">maju bersama konsulin.id</span>
                                    <h2 class="title">Persiapkan Usaha Anda Dengan Matang</h2>
                                    <p>Kami hadir guna membantu para pelaku usaha baik UMKM maupun UKM dalam penyusunan
                                        perencanaan bisnis serta pembukuan laporan keuangan dengan Pernyataan Standar
                                        Akuntansi Keuangan (PSAK) yang berlaku di Indonesia</p>

                                    <a href="https://wa.me/6285183440300?text=Halo, Saya ingin berbicara lebih lanjut terkait konsultasi bisnis dan keuangan [WEBSITE]"
                                        class="btn">Konsultasi Gratis</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider__shape">
                        <img src="{{ asset('frontend-assets/img/slider/slider_shape01.png') }}" alt="">
                        <img src="{{ asset('frontend-assets/img/slider/slider_shape02.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- slider-area-old-end -->


    <!-- slider-area-new-start -->
    <section class="konsulin-hero">
        <div class="container">
            <div class="konsulin-hero-wrapper">

                <div class="konsulin-hero-content">
                    <span class="konsulin-hero-badge">
                        MAJU BERSAMA KONSULIN.ID
                    </span>

                    <h1>
                        Persiapkan Usaha anda Dengan Matang

                    </h1>

                    <p>
                        Kami hadir guna membantu para pelaku usaha baik UMKM maupun
                        UKM dalam penyusunan perencanaan bisnis serta pembukuan laporan
                        keuangan dengan Pernyataan Standar Akuntasi Keuangan (PSAK) yang berlaku di Indonesia.
                    </p>

                    <div class="konsulin-hero-actions">
                        <a href="{{ route('service') }}" class="konsulin-btn-primary">
                            Lihat Layanan
                        </a>

                        <a href="{{ route('contact') }}" class="konsulin-btn-outline">
                            Konsultasi Sekarang
                        </a>
                    </div>
                </div>

                @php
                    $meetingImages = [
                        asset('frontend-assets/img/hero/hero1.jpeg'),
                        asset('frontend-assets/img/hero/hero2.jpeg'),
                        asset('frontend-assets/img/hero/hero3.jpeg'),
                        asset('frontend-assets/img/hero/hero4.jpeg'),
                        asset('frontend-assets/img/hero/hero5.jpeg'),
                        asset('frontend-assets/img/hero/hero6.jpeg'),
                    ];
                @endphp

                <div class="konsulin-hero-visual">
                    <div class="meeting-stack" id="meetingStack">
                        @foreach ($meetingImages as $index => $image)
                            <div class="meeting-card">
                                <img src="{{ $image }}" alt="Monthly Meeting {{ $index + 1 }}">
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- slider-area-new-end -->




    <!-- Klien start -->
    <section class="kons-trusted">
        <div class="kons-trusted-container">


            <div class="kons-trusted-box">
                <div class="kons-trusted-heading">
                    <span>Klien Kami</span>
                    <h2>Dipercaya Lebih dari 100 Perusahaan untuk Kesuksesan Bisnis</h2>
                </div>
                @php
                    $clients = [
                        ['image' => '1.png', 'alt' => 'Client 1'],
                        ['image' => '2.png', 'alt' => 'Client 2'],
                        ['image' => '3.png', 'alt' => 'Client 3'],
                        ['image' => '4.png', 'alt' => 'Client 4'],
                        ['image' => '5.png', 'alt' => 'Client 5'],
                        ['image' => '6.png', 'alt' => 'Client 6'],
                        ['image' => '7.png', 'alt' => 'Client 7'],
                        ['image' => '8.png', 'alt' => 'Client 8'],
                        ['image' => '9.png', 'alt' => 'Client 9'],
                        ['image' => '10.png', 'alt' => 'Client 10'],
                        ['image' => '11.jpg', 'alt' => 'Client 11'],
                        ['image' => '12.png', 'alt' => 'Client 12'],
                        ['image' => '13.jpg', 'alt' => 'Stori Digital'],
                    ];
                @endphp

                <div class="kons-trusted-marquee">
                    <div class="kons-trusted-track">
                        @foreach ($clients as $client)
                            <div class="kons-trusted-logo">
                                <img src="{{ asset('frontend-assets/img/clients/' . $client['image']) }}"
                                    alt="{{ $client['alt'] }}">
                            </div>
                        @endforeach

                        {{-- duplicate supaya animasi mulus --}}
                        @foreach ($clients as $client)
                            <div class="kons-trusted-logo">
                                <img src="{{ asset('frontend-assets/img/clients/' . $client['image']) }}"
                                    alt="{{ $client['alt'] }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Klien end -->

    <!-- Layanan start -->
    <section class="kons-services">
        <div class="kons-services-container">
            <div class="kons-services-heading">
                <span>Layanan Kami</span>
                <h2>Solusi Terintegrasi untuk Kebutuhan Bisnis Anda</h2>
                <p>
                    Kami menyediakan layanan profesional untuk membantu bisnis Anda lebih siap,
                    tertata, dan berkembang secara berkelanjutan.
                </p>
            </div>

            <div class="kons-services-grid">
                <a href="{{ route('services.laporan_keuangan') }}" class="kons-service-card">
                    <div class="kons-service-icon">
                        <img src="{{ asset('frontend-assets/img/menu/tax.png') }}" alt="Tax & Accounting">
                    </div>

                    <h3>Tax &amp; Accounting</h3>
                    <p>
                        Layanan pajak, pembukuan, dan laporan keuangan untuk membantu bisnis
                        lebih rapi dan patuh regulasi.
                    </p>

                    <span class="kons-service-link">
                        Pelajari Selengkapnya
                        <i>→</i>
                    </span>
                </a>

                <a href="{{ route('services.pendirian_pt') }}" class="kons-service-card">
                    <div class="kons-service-icon">
                        <img src="{{ asset('frontend-assets/img/menu/pendirian_legalitas.png') }}"
                            alt="Penerbitan Legalitas">
                    </div>

                    <h3>Penerbitan Legalitas</h3>
                    <p>
                        Pengurusan legalitas usaha dan dokumen perusahaan agar bisnis berjalan
                        aman dan profesional.
                    </p>

                    <span class="kons-service-link">
                        Pelajari Selengkapnya
                        <i>→</i>
                    </span>
                </a>

                <a href="{{ route('services.business_advisory') }}" class="kons-service-card">
                    <div class="kons-service-icon">
                        <img src="{{ asset('frontend-assets/img/menu/pengurusan_dokumen.png') }}" alt="Pengurusan Dokumen">
                    </div>

                    <h3>Business Advisory</h3>
                    <p>
                         Membantu pelaku usaha, UMKM, startup, maupun perusahaan dalam menyusun strategi, memperbaiki proses operasional, mengelola keuangan, serta mengambil keputusan bisnis yang lebih tepat dan terukur.
                    </p>

                    <span class="kons-service-link">
                        Pelajari Selengkapnya
                        <i>→</i>
                    </span>
                </a>
            </div>
            <div class="kons-services-cta">
                <a href="{{ route('service') }}" class="kons-btn-all-services">
                    Lihat Semua Layanan
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- Layanan end -->




    {{-- <section class="features__area">
        <div class="container-fluid p-0">
            <div class="features__item-wrap">
                <div class="row g-0">
                    <div class="col-lg-4 col-md-6">
                        <div class="features__item">
                            <div class="features__icon">
                                <i class="flaticon-financial-profit"></i>
                            </div>
                            <div class="features__content">
                                <h4 class="title"><a href="javascript:void(0);">Finance Planning</a></h4>
                                <p>Konsulin membantu perencanaan keuangan bisnis yang efektif dan efisien.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="features__item">
                            <div class="features__icon">
                                <i class="flaticon-light-bulb"></i>
                            </div>
                            <div class="features__content">
                                <h4 class="title"><a href="javascript:void(0);">Strategic Idea</a></h4>
                                <p>Konsulin membantu solusi strategis bisnis melalui konsultasi efektif.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="features__item">
                            <div class="features__icon">
                                <i class="flaticon-profit"></i>
                            </div>
                            <div class="features__content">
                                <h4 class="title"><a href="javascript:void(0);">Marketing Growth</a></h4>
                                <p>Konsulin membantu pertumbuhan pemasaran dengan strategi efektif.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <!-- features-area-end -->
    <!-- about-area-old-start -->
    {{-- <section class="about__area-two about__bg" data-background="{{ asset('frontend-assets/img/bg/about_bg.jpg') }}">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="about__img-wrap-two">
                        <img src="{{ asset('frontend-assets/img/about/about-5.jpg?v=2') }}" alt="">
                        <div class="shape">
                            <img src="{{ asset('frontend-assets/img/images/h2_about_img_shape.png') }}" alt=""
                                class="alltuchtopdown">
                        </div>
                        <div class="experience__box-two">
                            <div class="experience__shape">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 82 295" fill="none"
                                    preserveAspectRatio="none">
                                    <path
                                        d="M70.7685 260.479C77.6405 257.127 82 250.15 82 242.503L82 44.8205C82 36.5032 76.8524 29.054 69.0724 26.1128L-3.51784e-06 9.7784e-07L0 295L70.7685 260.479Z"
                                        fill="currentcolor" />
                                </svg>
                            </div>
                            <div class="experience__content">
                                <h4 class="title">10</h4>
                                <p>Pengalaman <br> Tahun</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__content-two">
                        <div class="section-title mb-20 tg-heading-subheading animation-style3">
                            <span class="sub-title">Tentang Konsulin.id</span>
                            <h2 class="title tg-element-title">Layanan Pajak dan Akuntansi Terbaik untuk
                                Mendukung Pertumbuhan Usaha Anda.</h2>
                        </div>
                        <p>Didirikan pada tahun 2024, Konsulin.ID merupakan pionir Virtual Assistant Business Consultant di
                            Indonesia, dimana kami tidak selalu hadir secara fisik, namun kami bertanggung jawab atas
                            tugas-tugas yang telah didelegasikan.</p>
                        <div class="about__content-inner">
                            <div class="about__list-box">
                                <ul class="list-wrap">
                                    <li><i class="flaticon-arrow-button"></i>Tax &amp; Accounting</li>
                                    <li><i class="flaticon-arrow-button"></i>Pendirian Legalitas Usaha</li>
                                    <li><i class="flaticon-arrow-button"></i>Pengurusan Dokumen</li>
                                    <li><i class="flaticon-arrow-button"></i>Branding Usaha</li>
                                    <li><i class="flaticon-arrow-button"></i>Virtual Office</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about__shape-wrap-two">
            <img src="{{ asset('frontend-assets/img/images/h2_about_shape01.png') }}" alt=""
                data-parallax='{"x" : -80 , "y" : 80 , "rotateZ":80}'>
            <img src="{{ asset('frontend-assets/img/images/h2_about_shape02.png') }}" alt=""
                data-parallax='{"y" : 100 }'>
            <img src="{{ asset('frontend-assets/img/images/h2_about_shape03.png') }}" alt=""
                data-aos="fade-left" data-aos-delay="400">
        </div>
    </section> --}}
    <!-- about-area-old-end -->

    <!-- about-area-new-start -->
    <section class="kons-about">
        <div class="kons-about-container">
            <div class="kons-about-image-wrap">
                <div class="kons-about-image">
                    <img src="{{ asset('frontend-assets/img/about/about-5.jpg?v=2') }}" alt="Tentang Konsulin.id">
                </div>

                <div class="kons-about-badge">
                    <strong>10+</strong>
                    <span>Tahun Pengalaman</span>
                </div>
            </div>

            <div class="kons-about-content">
                <span class="kons-about-subtitle">Tentang Konsulin.id</span>

                <h2>
                    Layanan Pajak dan Akuntansi Terbaik untuk Mendukung Pertumbuhan Usaha Anda
                </h2>

                <p>
                    Didirikan pada tahun 2024, Konsulin.ID merupakan pionir Virtual Assistant Business
                    Consultant di Indonesia. Kami tidak selalu hadir secara fisik, namun kami bertanggung
                    jawab atas tugas-tugas yang telah didelegasikan.
                </p>

                <div class="kons-about-list">
                    <div class="kons-about-list-item">
                        <span>✓</span>
                        <p>Tax &amp; Accounting</p>
                    </div>

                    <div class="kons-about-list-item">
                        <span>✓</span>
                        <p>Pendirian Legalitas Usaha</p>
                    </div>

                    <div class="kons-about-list-item">
                        <span>✓</span>
                        <p>Pengurusan Dokumen</p>
                    </div>

                    <div class="kons-about-list-item">
                        <span>✓</span>
                        <p>Branding Usaha</p>
                    </div>

                    <div class="kons-about-list-item">
                        <span>✓</span>
                        <p>Virtual Office</p>
                    </div>
                </div>

                <div class="kons-about-action">
                    <a href="{{ route('about') }}" class="kons-about-btn">
                        Selengkapnya Tentang Kami
                        <span>→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-new-end -->

    <!-- about2-area-old-start -->
    {{-- <section class="about__area-three about__bg-two"
        data-background="{{ asset('frontend-assets/img/bg/h3_about_bg.jpg') }}">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-9">
                    <div id="lightgallery" class="choose__img-wrap-five">
                        <img src="{{ asset('frontend-assets/img/about/about-3.jpg?v=2') }}" alt="">
                        <img width="256" src="{{ asset('frontend-assets/img/about/about-6.jpeg') }}" alt="">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about__content-three">
                        <div class="section-title mb-25">
                            <span class="sub-title">Dikutip oleh indonesianews.id</span>
                            <h2 class="title">Bertujuan Bantu UMKM dalam Mengatur Keuangan
                            </h2>
                        </div>
                        <p>Direktur PT Solusi Usaha Adijaya, Adi Putra Rizkillah mengungkapkan, Konsulin.id didirikan dengan
                            tujuan utama membantu para pelaku usaha, khsusunya UMKM untuk mengelola manajemen usaha dengan
                            lebih baik. Konsulin.id dapat memberikan solusi terkait perpajakan usaha dengan membantu para
                            pelaku usaha untuk memahami dan mematuhi pajak dengan baik.</p>
                        <p>Selain itu, Konsulin.id melayani Pendirian Legalitas seperti PT ,CV, maupun yayasan sehingga para
                            pelaku usaha dapat memulai bisnis nya memiliki legalitas yang kuat, kemudian perencanaan bisnis.
                            Layanan tersebut termasuk panduan strategis untuk merancang rencana bisnis yang beorientasi
                            keberhasilan dalam jangka panjang ...</p>
                        <a href="https://indonesianews.id/ribet-ngurusin-pajak-buat-bisnis-anda-konsulin-id-saja/"
                            class="btn">Baca Selengkapnya di indonesianews.id</a>
                        <div class="about__shape-wrap-three">
                            <img src="{{ asset('frontend-assets/img/images/h3_about_shape01.png') }}" alt=""
                                class="rotateme">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- about2-area-old-end -->


    <!-- about2-area-new-start -->
    <section class="kons-media">
        <div class="kons-media-container">
            <div class="kons-media-image-wrap" id="lightgallery">
                <div class="kons-media-main-image">
                    <img src="{{ asset('frontend-assets/img/about/about-3.jpg?v=2') }}" alt="Konsulin.id membantu UMKM">
                </div>

                <div class="kons-media-small-image">
                    <img src="{{ asset('frontend-assets/img/about/about-6.jpeg') }}"
                        alt="Konsulin.id dikutip Indonesianews.id">
                </div>

                <div class="kons-media-badge">
                    <span>Dikutip oleh</span>
                    <strong>indonesianews.id</strong>
                </div>
            </div>

            <div class="kons-media-content">
                <span class="kons-media-subtitle">Dikutip oleh indonesianews.id</span>

                <h2>
                    Bertujuan Bantu UMKM dalam Mengatur Keuangan
                </h2>

                <p>
                    Direktur PT Solusi Usaha Adijaya, Adi Putra Rizkillah mengungkapkan,
                    Konsulin.id didirikan dengan tujuan utama membantu para pelaku usaha,
                    khususnya UMKM, untuk mengelola manajemen usaha dengan lebih baik.
                </p>

                <p>
                    Konsulin.id juga memberikan solusi terkait perpajakan usaha, legalitas,
                    perencanaan bisnis, serta pendampingan agar pelaku usaha dapat membangun
                    bisnis dengan lebih tertata dan berkelanjutan.
                </p>

                <a href="https://indonesianews.id/ribet-ngurusin-pajak-buat-bisnis-anda-konsulin-id-saja/"
                    class="kons-media-btn" target="_blank" rel="noopener">
                    Baca Selengkapnya di INDONESIANEWS.ID
                    <span>→</span>
                </a>
            </div>
        </div>
    </section>
    <!-- about2-area-new-end -->


    <!-- Why Choose start -->
    <section class="kons-why">
        <div class="kons-why-container">


            <div class="kons-why-grid">
                <div class="kons-why-card">
                    <div class="kons-why-icon">
                        <i class="flaticon-financial-profit"></i>
                    </div>
                    <h3>Perencanaan Keuangan</h3>
                    <p>
                        Membantu bisnis menyusun perencanaan keuangan yang lebih efektif,
                        efisien, dan mudah dipahami.
                    </p>
                </div>

                <div class="kons-why-card">
                    <div class="kons-why-icon">
                        <i class="flaticon-light-bulb"></i>
                    </div>
                    <h3>Solusi Strategis</h3>
                    <p>
                        Memberikan arahan dan solusi bisnis yang sesuai dengan kebutuhan
                        serta kondisi usaha Anda.
                    </p>
                </div>

                <div class="kons-why-card">
                    <div class="kons-why-icon">
                        <i class="flaticon-profit"></i>
                    </div>
                    <h3>Pertumbuhan Bisnis</h3>
                    <p>
                        Mendukung pertumbuhan usaha melalui layanan yang terstruktur,
                        profesional, dan berkelanjutan.
                    </p>
                </div>
            </div>

            <div class="kons-counter-grid">
                <div class="kons-counter-card">
                    <div class="kons-counter-icon">
                        <i class="flaticon-trophy"></i>
                    </div>
                    <h3><span class="kons-count-number" data-count="135">0</span>+</h3>
                    <p>Project terselesaikan dengan baik</p>
                </div>

                <div class="kons-counter-card">
                    <div class="kons-counter-icon">
                        <i class="flaticon-time"></i>
                    </div>
                    <h3><span class="kons-count-number" data-count="11">0</span>+</h3>
                    <p>Tahun pengalaman di industri keuangan</p>
                </div>

                <div class="kons-counter-card">
                    <div class="kons-counter-icon">
                        <i class="flaticon-happy"></i>
                    </div>
                    <h3><span class="kons-count-number" data-count="99">0</span>%</h3>
                    <p>Kepuasan dari klien kami</p>
                </div>

                <div class="kons-counter-card">
                    <div class="kons-counter-icon">
                        <i class="flaticon-china"></i>
                    </div>
                    <h3><span class="kons-count-number" data-count="22">0</span>+</h3>
                    <p>Kota jaringan klien di seluruh Indonesia</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose end -->


    <!-- Our value new end -->
    <section class="kons-value">
        <div class="kons-value-container">
            <div class="kons-value-content">
                <span class="kons-value-subtitle">Our Value</span>

                <h2>
                    Optimalisasi Kualitas dan Pelayanan Terbaik untuk Bisnis Anda
                </h2>

                <p>
                    Konsulin.id hadir sebagai konsultan bisnis dan keuangan profesional yang
                    berintegritas, berkualitas, dan berkompetensi dalam membantu terwujudnya
                    tata kelola usaha yang lebih baik.
                </p>

                <div class="kons-value-checklist">
                    <div>
                        <span>✓</span>
                        <p>Terbaik untuk bisnis dan perpajakan</p>
                    </div>

                    <div>
                        <span>✓</span>
                        <p>Akurat, efektif, dan efisien</p>
                    </div>

                    <div>
                        <span>✓</span>
                        <p>Certified Professional Financial Planner</p>
                    </div>

                    <div>
                        <span>✓</span>
                        <p>Certified Financial Advisors</p>
                    </div>
                </div>
            </div>

            <div class="kons-value-grid">
                <div class="kons-value-card">
                    <div class="kons-value-icon">
                        <i class="flaticon-happy"></i>
                    </div>
                    <h3>Pelayanan Terbaik</h3>
                    <p>Kami berkomitmen memberikan layanan yang tepat, jelas, dan profesional.</p>
                </div>

                <div class="kons-value-card">
                    <div class="kons-value-icon">
                        <i class="flaticon-handshake"></i>
                    </div>
                    <h3>Kolaborasi</h3>
                    <p>Menjaga hubungan positif dan kerja sama yang baik dengan setiap klien.</p>
                </div>

                <div class="kons-value-card">
                    <div class="kons-value-icon">
                        <i class="flaticon-light-bulb"></i>
                    </div>
                    <h3>Hadirkan Solusi</h3>
                    <p>Selalu mencari solusi yang sesuai untuk kebutuhan dan tujuan bisnis.</p>
                </div>

                <div class="kons-value-card">
                    <div class="kons-value-icon">
                        <i class="flaticon-life-insurance"></i>
                    </div>
                    <h3>Integritas</h3>
                    <p>Bertindak jujur, objektif, dan sesuai dengan kode etik profesi.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Our value new  start -->


    <!-- services-area-our-value-old-start -->

    {{-- <section class="services__area-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title white-title mb-50 tg-heading-subheading animation-style3">
                        <span class="sub-title">Our Value</span>
                        <h2 class="title tg-element-title">Optimalisasi Kualitas dan Pelayanan Terbaik dengan Harga
                            Kompetitif dari Konsulin</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center gutter-24">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="services__item-two">
                        <div class="services__icon-two">
                            <i class="flaticon-happy"></i>
                        </div>
                        <div class="services__content-two">
                            <h2 class="title"><a href="#">Pelayanan Terbaik</a></h2>
                            <p>Kami memiliki strategi untuk menyajikan sesuatu dengan benar.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="services__item-two">
                        <div class="services__icon-two">
                            <i class="flaticon-handshake"></i>
                        </div>
                        <div class="services__content-two">
                            <h2 class="title"><a href="#">Kolaborasi</a></h2>
                            <p>Menjaga hormat diri, hubungan positif, dan lingkungan kerja</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="services__item-two">
                        <div class="services__icon-two">
                            <i class="flaticon-light-bulb"></i>
                        </div>
                        <div class="services__content-two">
                            <h2 class="title"><a href="#">Hadirkan Solusi</a></h2>
                            <p>Selalu membuka dan mencari solusi untuk kesuksesan bisnis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="services__item-two">
                        <div class="services__icon-two">
                            <i class="flaticon-life-insurance"></i>
                        </div>
                        <div class="services__content-two">
                            <h2 class="title"><a href="#">Integritas</a></h2>
                            <p>Bertindak jujur dan berintegritas sesuai kode etik profesi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="services__shape-wrap">
            <img src="{{ asset('frontend-assets/img/images/h2_services_shape01.png') }}" alt=""
                data-aos="fade-right" data-aos-delay="400">
            <img src="{{ asset('frontend-assets/img/images/h2_services_shape02.png') }}" alt=""
                data-aos="fade-left" data-aos-delay="400">
        </div>
    </section> --}}

    <!-- services-area-our-value-old-end -->

    <!-- choose-area-old-start -->

    {{-- <section class="choose__area-two" style="margin-top:0px;">
        <div class="choose__bg" data-background="{{ asset('frontend-assets/img/bg/choose_bg.jpg') }}"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-10">
                    <div class="choose__content-two">
                        <div class="section-title mb-20 tg-heading-subheading animation-style3">
                            <span class="sub-title">Konsulin.id</span>
                            <h2 class="title tg-element-title">Konsultan Bisnis dan Keuangan Profesional untuk Good
                                Governance</h2>
                        </div>
                        <p> Konsulin merupakan jasa akuntan dan konsultan yang profesional, berintegritas, berkualitas, dan
                            berkompetensi dalam rangka mendorong terwujudnya good governance di Indonesia</p>
                        <div class="choose__tab">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="goal-tab" data-bs-toggle="tab"
                                        data-bs-target="#goal-tab-pane" type="button" role="tab"
                                        aria-controls="goal-tab-pane" aria-selected="true">Focus On Goal</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="management-tab" data-bs-toggle="tab"
                                        data-bs-target="#management-tab-pane" type="button" role="tab"
                                        aria-controls="management-tab-pane" aria-selected="false">Risk Management</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="goal-tab-pane" role="tabpanel"
                                    aria-labelledby="goal-tab" tabindex="0">
                                    <div class="choose__tab-content">
                                        <p>Kami memberikan jasa profesional konsultasi usaha dengan kompetensi tinggi,
                                            integeritas, obyektif dan sesuai standar profesional yang berlaku.</p>
                                        <ul class="list-wrap">
                                            <li><i class="fas fa-check"></i>Terbaik Untuk Bisnis dan Perpajakan</li>
                                            <li><i class="fas fa-check"></i>Akurat, Efektif, Efisien</li>
                                            <li><i class="fas fa-check"></i>Certified Professional Financial Planner</li>
                                            <li><i class="fas fa-check"></i>Certified Financial Advisors</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="choose__shape-wrap-two">
            <img src="{{ asset('frontend-assets/img/images/h2_choose_shape01.png') }}" alt=""
                data-parallax='{"x" : -80 , "y" : 80 , "rotateZ":80}'>
            <img src="{{ asset('frontend-assets/img/images/h2_choose_shape02.png') }}" alt=""
                data-aos="fade-left" data-aos-delay="400">
        </div>
    </section> --}}

    <!-- choose-area-old-end -->


    <!-- choose-area-new-start-->
    <section class="kons-governance">
        <div class="kons-governance-container">

            @php
                $governanceMainImage = asset('frontend-assets/img/hero/hero4.jpeg');

                
            @endphp

            <div class="kons-governance-image">
                <div class="kons-governance-main-photo">
                    <img src="{{ $governanceMainImage }}" alt="Konsultan Bisnis dan Keuangan Konsulin.id">
                </div>


                <div class="kons-governance-badge">
                    <span>Good</span>
                    <strong>Governance</strong>
                </div>
            </div>

            <div class="kons-governance-content">
                <span class="kons-governance-subtitle">Konsulin.id</span>

                <h2>
                    Konsultan Bisnis dan Keuangan Profesional untuk Good Governance
                </h2>

                <p>
                    Konsulin merupakan jasa akuntan dan konsultan yang profesional, berintegritas,
                    berkualitas, dan berkompetensi dalam rangka mendorong terwujudnya tata kelola
                    usaha yang lebih baik di Indonesia.
                </p>

                <div class="kons-governance-box">
                    <p>
                        Kami memberikan jasa profesional konsultasi usaha dengan kompetensi tinggi,
                        integritas, objektif, dan sesuai standar profesional yang berlaku.
                    </p>

                    <div class="kons-governance-list">
                        <div>
                            <span>✓</span>
                            <p>Terbaik untuk bisnis dan perpajakan</p>
                        </div>

                        <div>
                            <span>✓</span>
                            <p>Akurat, efektif, dan efisien</p>
                        </div>

                        <div>
                            <span>✓</span>
                            <p>Certified Professional Financial Planner</p>
                        </div>

                        <div>
                            <span>✓</span>
                            <p>Certified Financial Advisors</p>
                        </div>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="kons-governance-btn">
                    Konsultasi Sekarang
                    <span>→</span>
                </a>
            </div>
        </div>
    </section>
    <!-- choose-area-new-end -->




    <!-- counter-area -->
    {{-- <section class="counter-area-two">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="counter-item">
                        <div class="icon">
                            <i class="flaticon-trophy"></i>
                        </div>
                        <div class="content">
                            <h2 class="count"><span class="odometer" data-count="135"></span>+</h2>
                            <p>Project terselesaikan <br> dengan baik </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="counter-item">
                        <div class="icon">
                            <i class="flaticon-time"></i>
                        </div>
                        <div class="content">
                            <h2 class="count"><span class="odometer" data-count="11"></span>+</h2>
                            <p>Tahun pengalaman <br> di industri keuangan </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="counter-item">
                        <div class="icon">
                            <i class="flaticon-happy"></i>
                        </div>
                        <div class="content">
                            <h2 class="count"><span class="odometer" data-count="99"></span>%</h2>
                            <p>Kepuasan <br> dari klien kami</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="counter-item">
                        <div class="icon">
                            <i class="flaticon-china"></i>
                        </div>
                        <div class="content">
                            <h2 class="count"><span class="odometer" data-count="22"></span>+</h2>
                            <p>Kota jaringan klien <br>di seluruh Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="counter-shape-two">
            <img src="{{ asset('frontend-assets/img/images/h2_counter_shape.png') }}" alt="" class="rotateme">
        </div>
    </section> --}}
    <!-- counter-area-end -->

    

    <!-- project-area -->
    {{-- <section class="services__area-two services__bg-six">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="section-title white-title mb-40 tg-heading-subheading animation-style3">
                        <span class="sub-title">Layanan dan Jasa Konsulin</span>
                        <h2 class="title tg-element-title">Temukan Layanan Yang Tepat <br> Untuk Kebutuhan Perusahaan
                            Anda</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="services__tab-wrap">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="health-tab" data-bs-toggle="tab"
                                    data-bs-target="#health-tab-pane" type="button" role="tab"
                                    aria-controls="health-tab-pane" aria-selected="true">Laporan Keuangan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="travel-tab" data-bs-toggle="tab"
                                    data-bs-target="#travel-tab-pane" type="button" role="tab"
                                    aria-controls="travel-tab-pane" aria-selected="false">Perencanaan Model Usaha</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="vehicle-tab" data-bs-toggle="tab"
                                    data-bs-target="#vehicle-tab-pane" type="button" role="tab"
                                    aria-controls="vehicle-tab-pane" aria-selected="false">Pelaporan Pajak</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="cargo-tab" data-bs-toggle="tab"
                                    data-bs-target="#cargo-tab-pane" type="button" role="tab"
                                    aria-controls="cargo-tab-pane" aria-selected="false">Pendirian Badan Usaha</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="fire-tab" data-bs-toggle="tab"
                                    data-bs-target="#fire-tab-pane" type="button" role="tab"
                                    aria-controls="fire-tab-pane" aria-selected="false">Pengurusan Dokumen</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="bike-tab" data-bs-toggle="tab"
                                    data-bs-target="#bike-tab-pane" type="button" role="tab"
                                    aria-controls="bike-tab-pane" aria-selected="false">Branding Usaha</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="health-tab-pane" role="tabpanel"
                                aria-labelledby="health-tab" tabindex="0">
                                <div class="services__item-four shine-animate-item">
                                    <div class="services__thumb-four shine-animate">
                                        <img src="{{ asset('frontend-assets/img/services/1_laporan_keuangan.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="services__content-four">
                                        <h2 class="title"><a href="{{ route('services.laporan_keuangan') }}">Jasa
                                                Pembuatan Laporan
                                                Keuangan</a></h2>
                                        <p>Kami menyediakan laporan keuangan akurat dan sesuai standar akuntansi, untuk
                                            membantu Anda memantau bisnis dan membuat keputusan yang tepat.
                                        </p>
                                        <div class="about__list-box">
                                            <ul class="list-wrap">
                                                <li><i class="fas fa-check"></i>UMKM</li>
                                                <li><i class="fas fa-check"></i>Perusahaan Menengah</li>
                                                <li><i class="fas fa-check"></i>dan lainnya</li>
                                            </ul>
                                        </div>
                                        <a href="{{ route('services.laporan_keuangan') }}" class="btn">Lihat
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="travel-tab-pane" role="tabpanel" aria-labelledby="travel-tab"
                                tabindex="0">
                                <div class="services__item-four shine-animate-item">
                                    <div class="services__thumb-four shine-animate">
                                        <img src="{{ asset('frontend-assets/img/services/2_business_planning.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="services__content-four">
                                        <h2 class="title"><a href="{{ route('services.model_usaha') }}">Perancangan
                                                Model Bisnis</a>
                                        </h2>
                                        <p>Kami membantu Anda merancang model bisnis yang efektif dan berkelanjutan, untuk
                                            mendukung pertumbuhan usaha dan mencapai tujuan jangka panjang.</p>
                                        <div class="about__list-box">
                                            <ul class="list-wrap">
                                                <li><i class="fas fa-check"></i>Business Model</li>
                                                <li><i class="fas fa-check"></i>Business Fundraising</li>
                                                <li><i class="fas fa-check"></i>dan lainnya</li>
                                            </ul>
                                        </div>
                                        <a href="{{ route('services.model_usaha') }}" class="btn">Lihat
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vehicle-tab-pane" role="tabpanel"
                                aria-labelledby="vehicle-tab" tabindex="0">
                                <div class="services__item-four shine-animate-item">
                                    <div class="services__thumb-four shine-animate">
                                        <img src="{{ asset('frontend-assets/img/services/3_tax.jpg') }}" alt="">
                                    </div>
                                    <div class="services__content-four">
                                        <h2 class="title"><a href="{{ route('services.pelaporan_pajak') }}">Pengurusan
                                                Pelaporan Pajak</a>
                                        </h2>
                                        <p>Kami menyediakan layanan pengurusan pelaporan pajak yang tepat waktu dan sesuai
                                            regulasi, membantu Anda memenuhi kewajiban perpajakan tanpa repot.</p>
                                        <div class="about__list-box">
                                            <ul class="list-wrap">
                                                <li><i class="fas fa-check"></i>Pajak Perorangan</li>
                                                <li><i class="fas fa-check"></i>Pajak Badan Usaha</li>
                                                <li><i class="fas fa-check"></i>dan lainnya</li>
                                            </ul>
                                        </div>
                                        <a href="{{ route('services.pelaporan_pajak') }}" class="btn">Lihat
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cargo-tab-pane" role="tabpanel" aria-labelledby="cargo-tab"
                                tabindex="0">
                                <div class="services__item-four shine-animate-item">
                                    <div class="services__thumb-four shine-animate">
                                        <img src="{{ asset('frontend-assets/img/services/4_legalitas.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="services__content-four">
                                        <h2 class="title"><a href="{{ route('services.pendirian_pt') }}">Pendirian Badan
                                                Usaha</a></h2>
                                        <p>Kami menawarkan layanan pendirian PT Perorangan dengan proses cepat dan mudah,
                                            memastikan legalitas usaha Anda terpenuhi sesuai dengan peraturan yang berlaku.
                                        </p>
                                        <div class="about__list-box">
                                            <ul class="list-wrap">
                                                <li><i class="fas fa-check"></i>Pengecekan Nama Usaha</li>
                                                <li><i class="fas fa-check"></i>Sertifikat Kemenkumham</li>
                                                <li><i class="fas fa-check"></i>dan lainnya</li>
                                            </ul>
                                        </div>
                                        <a href="{{ route('services.pendirian_pt') }}" class="btn">Lihat
                                            Selangkapnya</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="fire-tab-pane" role="tabpanel" aria-labelledby="fire-tab"
                                tabindex="0">
                                <div class="services__item-four shine-animate-item">
                                    <div class="services__thumb-four shine-animate">
                                        <img src="{{ asset('frontend-assets/img/services/5_npwp.jpg') }}" alt="">
                                    </div>
                                    <div class="services__content-four">
                                        <h2 class="title"><a href="{{ route('services.npwp') }}">Pengurusan Dokumen</a>
                                        </h2>
                                        <p>Kami menyediakan layanan pengurusan NPWP yang cepat dan praktis, membantu Anda
                                            memperoleh dokumen perpajakan yang diperlukan tanpa repot.</p>
                                        <div class="about__list-box">
                                            <ul class="list-wrap">
                                                <li><i class="fas fa-check"></i>NPWP Pribadi</li>
                                                <li><i class="fas fa-check"></i>NPWP Badan Usaha</li>
                                                <li><i class="fas fa-check"></i>dan lainnya</li>
                                            </ul>
                                        </div>
                                        <a href="{{ route('services.npwp') }}" class="btn">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="bike-tab-pane" role="tabpanel" aria-labelledby="bike-tab"
                                tabindex="0">
                                <div class="services__item-four shine-animate-item">
                                    <div class="services__thumb-four shine-animate">
                                        <img src="{{ asset('frontend-assets/img/services/7_branding.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="services__content-four">
                                        <h2 class="title"><a href="{{ route('services.branding') }}">Branding
                                                Perusahaan</a></h2>
                                        <p>Kami membantu membangun identitas merek yang kuat dan unik untuk perusahaan Anda,
                                            meningkatkan visibilitas dan daya tarik di pasar.</p>
                                        <div class="about__list-box">
                                            <ul class="list-wrap">
                                                <li><i class="fas fa-check"></i>Logo</li>
                                                <li><i class="fas fa-check"></i>Website</li>
                                                <li><i class="fas fa-check"></i>dan lainnya</li>
                                            </ul>
                                        </div>
                                        <a href="{{ route('services.branding') }}" class="btn">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="services__shape-wrap">
            <img src="{{ asset('frontend-assets/img/images/h2_services_shape01.png') }}" alt=""
                data-aos="fade-right" data-aos-delay="400">
            <img src="{{ asset('frontend-assets/img/images/h2_services_shape02.png') }}" alt=""
                data-aos="fade-left" data-aos-delay="400">
        </div>
    </section> --}}

    {{-- <div class="brand__area-two">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <div class="section-title dark-title text-center mb-50 tg-heading-subheading animation-style3">
                        <span class="sub-title">Klien Kami</span>
                        <h2 class="title tg-element-title">Dipercaya Lebih dari 100 Perusahaan untuk Kesuksesan Bisnis</h2>
                    </div>
                </div>
            </div>
            <div class="swiper-container brand-active">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('frontend-assets/img/clients/1.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('frontend-assets/img/clients/2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('frontend-assets/img/clients/3.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('frontend-assets/img/clients/4.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('frontend-assets/img/clients/5.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('frontend-assets/img/clients/6.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('frontend-assets/img/clients/7.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('frontend-assets/img/clients/8.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('frontend-assets/img/clients/9.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('frontend-assets/img/clients/10.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('frontend-assets/img/clients/11.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('frontend-assets/img/clients/12.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('frontend-assets/img/clients/13.jpg') }}" alt="Stori Digital">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @include('front.include.cta')
@endsection

@push('addon-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stack = document.querySelector('#meetingStack');
            const cards = Array.from(document.querySelectorAll('#meetingStack .meeting-card'));

            if (!stack || cards.length <= 1) return;

            const positionClasses = [
                'is-active',
                'is-second',
                'is-third',
                'is-fourth',
                'is-hidden'
            ];

            const directions = ['from-right', 'from-top', 'from-back'];
            let directionIndex = 0;
            let order = cards.map((_, index) => index);

            function renderCards() {
                cards.forEach(card => {
                    card.classList.remove(...positionClasses);
                });

                order.forEach((cardIndex, positionIndex) => {
                    const card = cards[cardIndex];

                    if (positionIndex === 0) {
                        card.classList.add('is-active');
                    } else if (positionIndex === 1) {
                        card.classList.add('is-second');
                    } else if (positionIndex === 2) {
                        card.classList.add('is-third');
                    } else if (positionIndex === 3) {
                        card.classList.add('is-fourth');
                    } else {
                        card.classList.add('is-hidden');
                    }
                });
            }

            function nextPhoto() {
                const currentDirection = directions[directionIndex];

                stack.classList.remove('from-right', 'from-top', 'from-back', 'is-changing');

                order.unshift(order.pop());

                renderCards();

                stack.classList.add('is-changing', currentDirection);

                directionIndex = (directionIndex + 1) % directions.length;

                setTimeout(() => {
                    stack.classList.remove('is-changing');
                }, 900);
            }

            renderCards();

            let autoplay = setInterval(nextPhoto, 2800);

            stack.addEventListener('mouseenter', () => {
                clearInterval(autoplay);
            });

            stack.addEventListener('mouseleave', () => {
                autoplay = setInterval(nextPhoto, 2800);
            });
        });
    </script>
@endpush


@include('scripts.script')
@include('scripts.animation')
