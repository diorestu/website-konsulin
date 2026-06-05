@extends('front.layout.front_layout')

@section('title')
    Jasa Pendirian Legalitas PT. Badan Usaha
@endsection

@section('meta_desc')
    Dapatkan jasa pendirian legalitas PT. Badan Usaha yang cepat dan mudah. Konsulin membantu Anda mendirikan usaha dengan
    prosedur yang tepat, memastikan kepatuhan hukum dan kemudahan dalam berbisnis.
@endsection

@section('meta_key')
    konsulin, layanan pajak, akuntansi terbaik, pertumbuhan usaha, perencanaan keuangan, kepatuhan pajak, solusi pajak,
    konsultasi bisnis, layanan akuntansi, pajak usaha, pengelolaan keuangan, jasa pendirian PT Badan Usaha, legalitas usaha,
    pendirian perusahaan, jasa legalitas, konsultasi hukum, pendaftaran PT, kepatuhan hukum, layanan pendirian usaha,
    pengurusan legalitas, pendirian bisnis yang efisien
@endsection

@push('addon-style')
@endpush

@section('content')
    <section class="breadcrumb__area breadcrumb__bg"
        data-background="{{ asset('frontend-assets/img/bg/breadcrumb_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__content">
                        <h2 class="title">Jasa Pendirian Legalitas PT. Badan Usaha</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Jasa dan Layanan</li>
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
                <div class="row">
                    <div class="col-70 order-0 order-lg-2">
                        <div class="tab-content" id="myTabContent">
                            {{-- umkm --}}
                            <div class="tab-pane fade show active" id="one-tab-pane" role="tabpanel"
                                aria-labelledby="one-tab" tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Pembuatan Legalitas PT. Badan Usaha</h2>
                                    <p>Kami menyediakan layanan pembuatan legalitas PT Badan Usaha dengan proses cepat dan
                                        mudah, memastikan usaha Anda beroperasi sesuai hukum yang berlaku. Dapatkan
                                        legalitas resmi untuk mendukung perkembangan bisnis Anda.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <li><span>Harga Normal:</span>
                                                            <del>Rp. 750.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 350.000</li>
                                                        <li><span>Periode Harga:</span>Sekali Bayar</li>
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
                                                            <li><i class="flaticon-arrow-button"></i> NIB, KBLI, SPPL, &amp;
                                                                K3L</li>
                                                            <li><i class="flaticon-arrow-button"></i> SKT &amp; NPWP
                                                                Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akun AHU &amp; OSS RBU
                                                            </li>
                                                            <li><i class="flaticon-arrow-button"></i> Konsultasi Gratis</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-30">
                        <aside class="services__sidebar">
                            <div class="sidebar__widget sidebar__widget-two">
                                <div class="sidebar__cat-list-two">
                                    <h4 class="sidebar__widget-title">Jenis Layanan &amp; Jasa</h4>
                                    <div class="services__tab-wrap">
                                        <ul class="list-wrap nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <button class="nav-link active" id="one-tab" data-bs-toggle="tab"
                                                    data-bs-target="#one-tab-pane" type="button" role="tab"
                                                    aria-controls="one-tab-pane" aria-selected="true">Legalitas PT.
                                                    Perorangan</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__widget sidebar__widget-two">
                                <div class="sidebar__contact">
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

    @include('front.include.cta')
@endsection

@push('addon-script')
@endpush
