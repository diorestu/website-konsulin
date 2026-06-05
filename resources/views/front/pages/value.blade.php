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
@endpush

@section('content')
    <section class="choose__area-two" style="margin-top:0px;">
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
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="management-tab" data-bs-toggle="tab"
                                        data-bs-target="#management-tab-pane" type="button" role="tab"
                                        aria-controls="management-tab-pane" aria-selected="false">Risk Management</button>
                                </li> --}}
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
            <img src="{{ asset('frontend-assets/img/images/h2_choose_shape02.png') }}" alt="" data-aos="fade-left"
                data-aos-delay="400">
        </div>
    </section>

    <section class="services__area-two">
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
            <img src="{{ asset('frontend-assets/img/images/h2_services_shape02.png') }}" alt="" data-aos="fade-left"
                data-aos-delay="400">
        </div>
    </section>

    @include('front.include.cta')
@endsection

@push('addon-script')
@endpush
