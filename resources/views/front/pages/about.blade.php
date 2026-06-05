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
                        <a href="{{ asset('frontend-assets/img/legalitas/legalitas-2-large.jpg') }}" style="
                        border-radius: 20px;
                        border: 6px solid var(--tg-color-white-default);
                        position: absolute;
                        right: 10%;
                        bottom: 0;">
                            <img src="{{ asset('frontend-assets/img/legalitas/legalitas-2.jpg') }}" alt="">
                        </a>
                        <img src="{{ asset('frontend-assets/img/images/h5_choose_shape01.jpg') }}" alt="" data-parallax="{&quot;x&quot; : 40}" style="transform:translate3d(0.029px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(0.029px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); ">
                        <img src="{{ asset('frontend-assets/img/images/h5_choose_shape01.png') }}" alt="" class="alltuchtopdown">
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
                                    <img src="{{ asset('frontend-assets/img/legalitas/ceo.jpg') }}" alt="Adi Putra Rizkillah">
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

    <section class="services__area-two services__bg-six">
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
                                        <h2 class="title"><a href="{{ route('services.pendirian_pt') }}">Pendirian Badan Usaha</a></h2>
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
@endpush
