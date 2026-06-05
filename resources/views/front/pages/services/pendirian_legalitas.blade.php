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
                            {{-- PMA --}}
                            <div class="tab-pane fade show active" id="pma-tab-pane" role="tabpanel"
                                aria-labelledby="pma-tab" tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Pembuatan Legalitas Penanaman Modal Asing (PMA)</h2>
                                    <p>Kami menyediakan layanan pembuatan legalitas penanaman modal asing dengan proses cepat dan
                                        mudah, memastikan usaha Anda beroperasi sesuai hukum yang berlaku. Dapatkan
                                        legalitas resmi untuk mendukung perkembangan bisnis Anda.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <li><span>Harga Normal:</span>
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
                                                            <li><i class="flaticon-arrow-button"></i> SKT &amp; NPWP Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Pengecekan dan Pemesanan Nama</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akta Pendirian dari Notaris</li>
                                                            <li><i class="flaticon-arrow-button"></i> Surat Keterangan Terdaftar dari KPP</li>
                                                            <li><i class="flaticon-arrow-button"></i> Sertifikat Pendirian Kemenkumham</li>
                                                            
                                                            <li><i class="flaticon-arrow-button"></i> Akun AHU Kemenkumham &amp; OSS RBA</li>
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
                            <div class="tab-pane fade" id="one-tab-pane" role="tabpanel"
                                aria-labelledby="one-tab" tabindex="0">
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
                                                        <li><span>Harga Normal:</span>
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
                                                            <li><i class="flaticon-arrow-button"></i> Pengecekan Nama Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Sertifikat Pendirian Kemenkumham</li>
                                                            <li><i class="flaticon-arrow-button"></i> Pernyataan Pendirian PT. Perorangan</li>
                                                            <li><i class="flaticon-arrow-button"></i> NIB, KBLI, SPPL, &amp; K3L</li>
                                                            <li><i class="flaticon-arrow-button"></i> SKT &amp; NPWP Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akun AHU &amp; OSS RBA</li>
                                                            <li><i class="flaticon-arrow-button"></i> Konsultasi Gratis</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- badan usaha --}}
                            <div class="tab-pane fade" id="two-tab-pane" role="tabpanel"
                                aria-labelledby="one-tab" tabindex="0">
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
                                                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Modal 1 juta - 50 juta
                                                      </button>
                                                    </h2>
                                                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                                        <div class="project__details-info ms-0">
                                                            <h4 class="title">Detail Harga</h4>
                                                            <ul class="list-wrap">
                                                                <li><span>Harga Normal:</span>
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
                                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Modal 51 juta - 1 miliar
                                                      </button>
                                                    </h2>
                                                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                      <div class="project__details-info ms-0">
                                                            <h4 class="title">Detail Harga</h4>
                                                            <ul class="list-wrap">
                                                                <li><span>Harga Normal:</span>
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
                                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Modal 1 miliar - 10 miliar
                                                      </button>
                                                    </h2>
                                                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                      <div class="project__details-info ms-0">
                                                            <h4 class="title">Detail Harga</h4>
                                                            <ul class="list-wrap">
                                                                <li><span>Harga Normal:</span>
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
                                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                        Modal > 10 miliar
                                                      </button>
                                                    </h2>
                                                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
                                                            <li><i class="flaticon-arrow-button"></i> Pengecekan Nama Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Sertifikat Pendirian Kemenkumham</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akta Pendirian dari Notaris</li>
                                                            <li><i class="flaticon-arrow-button"></i> NIB &amp; KBLI</li>
                                                            <li><i class="flaticon-arrow-button"></i> SKT &amp; NPWP Digital Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akun AHU &amp; OSS RBA</li>
                                                            <li><i class="flaticon-arrow-button"></i> Konsultasi Gratis</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- cv --}}
                            <div class="tab-pane fade" id="three-tab-pane" role="tabpanel"
                                aria-labelledby="one-tab" tabindex="0">
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
                                                        <li><span>Harga Normal:</span>
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
                                                            <li><i class="flaticon-arrow-button"></i> Pengecekan Nama Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Sertifikat Pendirian Kemenkumham</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akta Pendirian dari Notaris</li>
                                                            <li><i class="flaticon-arrow-button"></i> NIB &amp; KBLI</li>
                                                            <li><i class="flaticon-arrow-button"></i> SKT &amp; NPWP Digital Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akun AHU &amp; OSS RBA</li>
                                                            <li><i class="flaticon-arrow-button"></i> Konsultasi Gratis</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- yayasan --}}
                            <div class="tab-pane fade" id="four-tab-pane" role="tabpanel"
                                aria-labelledby="one-tab" tabindex="0">
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
                                                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Modal 1 juta - 50 juta
                                                      </button>
                                                    </h2>
                                                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                                        <div class="project__details-info ms-0">
                                                            <h4 class="title">Detail Harga</h4>
                                                            <ul class="list-wrap">
                                                                <li><span>Harga Normal:</span>
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
                                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Modal 51 juta - 1 miliar
                                                      </button>
                                                    </h2>
                                                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                      <div class="project__details-info ms-0">
                                                            <h4 class="title">Detail Harga</h4>
                                                            <ul class="list-wrap">
                                                                <li><span>Harga Normal:</span>
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
                                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Modal 1 miliar - 10 miliar
                                                      </button>
                                                    </h2>
                                                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                      <div class="project__details-info ms-0">
                                                            <h4 class="title">Detail Harga</h4>
                                                            <ul class="list-wrap">
                                                                <li><span>Harga Normal:</span>
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
                                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                        Modal > 10 miliar
                                                      </button>
                                                    </h2>
                                                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
                                                            <li><i class="flaticon-arrow-button"></i> Pengecekan Nama Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Sertifikat Pendirian Kemenkumham</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akta Pendirian dari Notaris</li>
                                                            <li><i class="flaticon-arrow-button"></i> NIB &amp; KBLI</li>
                                                            <li><i class="flaticon-arrow-button"></i> SKT &amp; NPWP Digital Perusahaan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Akun AHU &amp; OSS RBA</li>
                                                            <li><i class="flaticon-arrow-button"></i> Konsultasi Gratis</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- lainnya --}}
                            <div class="tab-pane fade" id="five-tab-pane" role="tabpanel"
                                aria-labelledby="one-tab" tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Legalitas Lainnya</h2>
                                    <p>Kami menyediakan layanan pembuatan legalitas lainnya sesuai kebutuhan perusahaan Anda, memastikan usaha Anda beroperasi sesuai hukum yang berlaku. Dapatkan
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
                                                <button class="nav-link active" id="pma-tab" data-bs-toggle="tab"
                                                    data-bs-target="#pma-tab-pane" type="button" role="tab"
                                                    aria-controls="pma-tab-pane" aria-selected="true">Penanaman Modal Asing</button>
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
                                                    aria-controls="three-tab-pane" aria-selected="true">Legalitas CV</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="four-tab" data-bs-toggle="tab"
                                                    data-bs-target="#four-tab-pane" type="button" role="tab"
                                                    aria-controls="four-tab-pane" aria-selected="true">Legalitas Yayasan</button>
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
