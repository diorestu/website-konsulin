@extends('front.layout.front_layout')

@section('title')
    Jasa Pengurusan Dokumen
@endsection

@section('meta_desc')
    Dapatkan jasa pengurusan dokumen NPWP yang cepat dan terpercaya. Konsulin membantu proses pendaftaran NPWP untuk
    individu dan usaha, memastikan kepatuhan pajak yang mudah dan efisien.
@endsection

@section('meta_key')
    konsulin, layanan pajak, akuntansi terbaik, pertumbuhan usaha, perencanaan keuangan, kepatuhan pajak, solusi pajak,
    konsultasi bisnis, layanan akuntansi, pajak usaha, pengelolaan keuangan, jasa pengurusan NPWP, pendaftaran NPWP, dokumen
    pajak, layanan NPWP, pengurusan pajak, kepatuhan pajak, NPWP cepat, konsultasi pajak, dokumen pajak usaha, solusi NPWP
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
                        <h2 class="title">Jasa Pengurusan Dokumen</h2>
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
                                    <h2 class="title">Pengurusan NPWP Untuk Orang Pribadi</h2>
                                    <p>Kami menyediakan layanan pengurusan NPWP untuk orang pribadi dengan proses yang
                                        cepat, mudah, dan sesuai peraturan perpajakan. Layanan ini dirancang untuk membantu
                                        Anda memperoleh NPWP tanpa repot, sehingga Anda dapat memenuhi kewajiban pajak
                                        dengan lebih efisien. Tim profesional kami siap memandu setiap langkahnya,
                                        memastikan semua dokumen dan persyaratan terpenuhi dengan benar.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <li><span>Harga Normal:</span>
                                                            <del>Rp. 550.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 300.000</li>
                                                        <li><span>Mekanisme:</span>Sekali bayar per dokumen</li>
                                                        <li>
                                                            <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pengurusan NPWP Orang Pribadi*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
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
                                </div>
                            </div>
                            {{-- a --}}
                            <div class="tab-pane fade" id="two-tab-pane" role="tabpanel" aria-labelledby="two-tab"
                                tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Pengurusan NPWP Untuk Badan Usaha</h2>
                                    <p>Kami menawarkan layanan pengurusan NPWP untuk orang pribadi dengan cepat dan tanpa
                                        ribet. Tim kami akan membantu mengurus segala persyaratan administratif sesuai
                                        dengan ketentuan perpajakan yang berlaku, sehingga Anda dapat memenuhi kewajiban
                                        pajak dengan mudah dan tepat waktu.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <li><span>Harga Normal:</span>
                                                            <del>Rp. 700.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 500.000</li>
                                                        <li><span>Mekanisme:</span>Sekali bayar per dokumen</li>
                                                        <li>
                                                            <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pengurusan NPWP Badan Usaha*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
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
                                </div>
                            </div>
                            {{-- b --}}
                            <div class="tab-pane fade" id="three-tab-pane" role="tabpanel" aria-labelledby="three-tab"
                                tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Pengurusan EFIN Untuk Orang Pribadi</h2>
                                    <p>Kami menyediakan layanan pengurusan EFIN (Electronic Filing Identification Number)
                                        bagi orang pribadi dengan proses yang cepat dan mudah. EFIN diperlukan untuk
                                        melakukan pelaporan pajak secara online. Tim kami akan membantu Anda mengurus semua
                                        persyaratan agar Anda dapat mengakses layanan pajak digital dengan lancar dan aman.
                                    </p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <li><span>Harga Normal:</span>
                                                            <del>Rp. 800.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 500.000</li>
                                                        <li><span>Periode:</span>Sekali bayar per dokumen</li>
                                                        <li>
                                                            <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pengurusan EFIN Orang Pribadi*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
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
                                </div>
                            </div>
                            {{-- c --}}
                            <div class="tab-pane fade" id="four-tab-pane" role="tabpanel" aria-labelledby="four-tab"
                                tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Pengurusan EFIN Untuk Badan Usaha</h2>
                                    <p class="text-danger"><b>Khusus Area Jabodetabek</b></p>
                                    <p>Kami menawarkan layanan pengurusan EFIN (Electronic Filing Identification Number)
                                        untuk badan usaha di wilayah Jabodetabek. Dengan bantuan tim profesional kami,
                                        proses pengurusan EFIN menjadi lebih cepat dan efisien, memungkinkan perusahaan Anda
                                        untuk melakukan pelaporan pajak online dengan mudah dan sesuai ketentuan yang
                                        berlaku.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <li><span>Harga Normal:</span>
                                                            <del>Rp. 1.000.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 800.000</li>
                                                        <li><span>Periode:</span>Sekali bayar per dokumen</li>
                                                        <li>
                                                            <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pengurusan EFIN Badan Usaha*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
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
                                                    aria-controls="one-tab-pane" aria-selected="true">NPWP Orang
                                                    Pribadi</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="two-tab" data-bs-toggle="tab"
                                                    data-bs-target="#two-tab-pane" type="button" role="tab"
                                                    aria-controls="two-tab-pane" aria-selected="true">NPWP Badan
                                                    Usaha</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="three-tab" data-bs-toggle="tab"
                                                    data-bs-target="#three-tab-pane" type="button" role="tab"
                                                    aria-controls="three-tab-pane" aria-selected="true">EFIN Orang
                                                    Pribadi</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="four-tab" data-bs-toggle="tab"
                                                    data-bs-target="#four-tab-pane" type="button" role="tab"
                                                    aria-controls="four-tab-pane" aria-selected="true">EFIN Badan
                                                    Usaha</button>
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
