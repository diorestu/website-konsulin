@extends('front.layout.front_layout')

@section('title')
    Jasa Pengurusan Pelaporan Pajak
@endsection

@section('meta_desc')
    Percayakan jasa pengurusan pelaporan pajak Anda kepada kami. Konsulin menyediakan layanan pelaporan pajak yang akurat
    dan tepat waktu, memastikan kepatuhan dan mengurangi risiko pajak.
@endsection

@section('meta_key')
    konsulin, layanan pajak, akuntansi terbaik, pertumbuhan usaha, perencanaan keuangan, kepatuhan pajak, solusi pajak,
    konsultasi bisnis, layanan akuntansi, pajak usaha, pengelolaan keuangan, asa pelaporan pajak, pengurusan pajak,
    pelaporan pajak akurat, layanan pajak, kepatuhan pajak, konsultasi pajak, solusi pelaporan pajak, pengelolaan pajak,
    laporan pajak tepat waktu, jasa pajak terpercaya
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
                        <h2 class="title">Jasa Pengurusan Pelaporan Pajak</h2>
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
                            {{-- spt pribadi --}}
                            <div class="tab-pane fade show active" id="one-tab-pane" role="tabpanel"
                                aria-labelledby="one-tab" tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Pelaporan SPT Tahunan Untuk Orang Pribadi</h2>
                                    <p>Kami menyediakan layanan pelaporan SPT Tahunan untuk perorangan, memastikan proses
                                        yang cepat, akurat, dan sesuai dengan peraturan perpajakan. Dapatkan bantuan
                                        profesional agar kewajiban pajak Anda terpenuhi dengan mudah tanpa kerumitan.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <li><span>Harga Normal:</span>
                                                            <del>Rp. 699.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 500.000</li>
                                                        <li><span>Mekanisme:</span>Harga per tahun laporan</li>
                                                        <li>
                                                            <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pelaporan SPT Tahunan Orang Pribadi*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
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
                            {{-- spt badan usaha --}}
                            <div class="tab-pane fade" id="two-tab-pane" role="tabpanel" aria-labelledby="two-tab"
                                tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Pelaporan SPT Tahunan Untuk Badan Usaha</h2>
                                    <p>Kami menawarkan layanan pelaporan SPT Tahunan bagi badan usaha dengan akurasi tinggi
                                        dan sesuai regulasi. Tim profesional kami akan membantu memastikan kewajiban
                                        perpajakan perusahaan Anda terpenuhi secara efisien, sehingga Anda dapat fokus pada
                                        pengembangan bisnis.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <li><span>Harga Normal:</span>
                                                            <del>Rp. 1.200.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 700.000</li>
                                                        <li><span>Mekanisme:</span>Harga per tahun laporan</li>
                                                        <li>
                                                            <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pelaporan SPT Tahunan Badan Usaha*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
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
                                                    aria-controls="one-tab-pane" aria-selected="true">SPT Tahunan Orang
                                                    Pribadi</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="two-tab" data-bs-toggle="tab"
                                                    data-bs-target="#two-tab-pane" type="button" role="tab"
                                                    aria-controls="two-tab-pane" aria-selected="true">SPT Tahunan Badan
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
