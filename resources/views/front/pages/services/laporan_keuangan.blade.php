@extends('front.layout.front_layout')

@section('title')
    Tax &amp; Accounting
@endsection

@section('meta_desc')
    Dapatkan jasa pembuatan laporan keuangan profesional untuk membantu usaha Anda. Konsulin menyediakan layanan akuntansi
    akurat dan tepat waktu, memastikan transparansi dan kepatuhan keuangan.
@endsection

@section('meta_key')
    konsulin, layanan pajak, akuntansi terbaik, pertumbuhan usaha, perencanaan keuangan, kepatuhan pajak, solusi pajak,
    konsultasi bisnis, layanan akuntansi, pajak usaha, pengelolaan keuangan, jasa pembuatan laporan keuangan, laporan
    keuangan profesional, akuntansi akurat, layanan akuntansi, kepatuhan keuangan, jasa akuntansi, laporan keuangan usaha,
    laporan keuangan bulanan, solusi keuangan, pengelolaan keuangan, pajak usaha, pengelolaan keuangan, asa pelaporan pajak, pengurusan pajak,
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
                        <h2 class="title">Tax &amp; Accounting</h2>
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
                            <!--<div class="tab-pane fade show active" id="one-tab-pane" role="tabpanel"-->
                            <!--    aria-labelledby="one-tab" tabindex="0">-->
                            <!--    <div class="services__details-content">-->
                            <!--        <h2 class="title">Laporan Keuangan Terbaik Untuk UMKM</h2>-->
                            <!--        <p><b>Untuk perusahaan baru atau omzet pertahun 50 juta s/d 1 Milyar</b></p>-->
                            <!--        <p>Kami menyediakan layanan pembuatan laporan keuangan yang dirancang khusus untuk UMKM.-->
                            <!--            Dengan laporan yang akurat dan mudah dipahami, Anda dapat memantau arus kas,-->
                            <!--            mengelola anggaran, serta membuat keputusan bisnis yang lebih tepat untuk mendukung-->
                            <!--            pertumbuhan usaha.</p>-->
                            <!--        <div class="services__details-list">-->
                            <!--            <div class="row">-->
                            <!--                <div class="col-md-6">-->
                            <!--                    <div class="project__details-info ms-0">-->
                            <!--                        <h4 class="title">Detail Harga</h4>-->
                            <!--                        <ul class="list-wrap">-->
                            <!--                            <li><span>Harga Normal:</span>-->
                            <!--                                <del>Rp. 1.500.000</del>-->
                            <!--                            </li>-->
                            <!--                            <li><span>Diskon Menjadi:</span>Rp. 1.000.000</li>-->
                            <!--                            <li><span>Periode:</span>Bulanan</li>-->
                            <!--                            <li>-->
                            <!--                                <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Laporan Keuangan untuk UMKM*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"-->
                            <!--                                    class="btn">Hubungi Kami</a>-->
                            <!--                            </li>-->
                            <!--                        </ul>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="col-md-6">-->
                            <!--                    <div class="services__details-list-box">-->
                            <!--                        <div class="icon">-->
                            <!--                            <i class="flaticon-life-insurance"></i>-->
                            <!--                        </div>-->
                            <!--                        <div class="content">-->
                            <!--                            <h4 class="title">Konsultasi Gratis</h4>-->
                            <!--                            <p>Dapatkan layanan konsultasi gratis dari tim ahli kami untuk-->
                            <!--                                membantu Anda menemukan solusi bisnis terbaik sesuai kebutuhan.-->
                            <!--                            </p>-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                </div>-->

                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="services__details-inner">-->
                            <!--            <div class="row gutter-24 align-items-center">-->
                            <!--                <div class="col-100">-->
                            <!--                    <div class="services__details-inner-content">-->
                            <!--                        <h4 class="title">Dapatkan Paket Pembuatan Laporan Keuangan Terbaik-->
                            <!--                            Untuk UMKM</h4>-->
                            <!--                        <p>Dengan membeli paket diatas, Anda akan mendapatkan:</p>-->
                            <!--                        <div class="about__list-box">-->
                            <!--                            <ul class="list-wrap">-->
                            <!--                                <li><i class="flaticon-arrow-button"></i>Konsultasi gratis</li>-->
                            <!--                                <li><i class="flaticon-arrow-button"></i>Pengurusan SPT Tahunan-->
                            <!--                                </li>-->
                            <!--                                <li><i class="flaticon-arrow-button"></i>Laporan Keuangan &amp;-->
                            <!--                                    Perpajakan Rutin (All Tax) Bulanan &amp; Tahunan</li>-->
                            <!--                                <li><i class="flaticon-arrow-button"></i>Penyusunan Laporan-->
                            <!--                                    Rutin Bulanan &amp; Tahunan</li>-->
                            <!--                                <li><i class="flaticon-arrow-button"></i>Keuangan (Neraca,-->
                            <!--                                    Laba/Rugi, Arus Kas, Perubahan Modal Jika Ada)</li>-->
                            <!--                                <li><i class="flaticon-arrow-button"></i>Bonus SPT Tahunan</li>-->
                            <!--                            </ul>-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            {{-- a --}}
                            <div class="tab-pane fade show active" id="two-tab-pane" role="tabpanel" aria-labelledby="two-tab"
                                tabindex="0">
                                <div class="services__details-content">
                                    <h2 class="title">Laporan Keuangan Untuk Perusahaan Kecil</h2>
                                    <p><b>Untuk perusahaan omzet per tahun 0 Milyar s/d 5 Milyar</b></p>
                                    <p>Layanan kami membantu perusahaan kecil dalam menyusun laporan keuangan yang akurat
                                        dan sesuai standar. Dengan laporan yang jelas dan terstruktur, Anda dapat mengelola
                                        keuangan dengan lebih baik, memantau profitabilitas, serta mendukung pertumbuhan
                                        bisnis yang berkelanjutan.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <li><span>Harga Normal:</span>
                                                            <del>Rp. 3.000.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 2.500.000</li>
                                                        <li><span>Periode:</span>Bulanan</li>
                                                        <li>
                                                            <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Laporan Keuangan untuk Perusahaan Kecil*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
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
                                                    <h4 class="title">Dapatkan Paket Pembuatan Laporan Keuangan Untuk
                                                        Perusahaan Kecil</h4>
                                                    <p>Dengan membeli paket diatas, Anda akan mendapatkan:</p>
                                                    <div class="about__list-box">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Keuangan &amp; Perpajakan Rutin (All Tax) Bulanan &amp; Tahunan</li>
                                                            <li><i class="flaticon-arrow-button"></i>Penyusunan Laporan Rutin Bulanan &amp; Tahunan Keuangan</li>
                                                            <li><i class="flaticon-arrow-button"></i>Pembukaan Faktur Pajak jika Perusahaan Sudah PKP</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Neraca Saldo</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Laba &amp; Rugi</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Arus Kas</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Perubahan Modal (Optional)</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan PPh dan PPN Bulanan</li>
                                                            <li><i class="flaticon-arrow-button"></i>Bonus SPT Tahunan</li>
                                                            <li><i class="flaticon-arrow-button"></i>Konsultasi dan Meeting Gratis</li>
                                                        </ul>
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
                                    <h2 class="title">Laporan Keuangan Untuk Perusahaan Menengah</h2>
                                    <p><b>Untuk perusahaan omzet per tahun 5 Milyar s/d 10 Milyar</b></p>
                                    <p>Kami menyediakan layanan pembuatan laporan keuangan yang komprehensif dan sesuai
                                        standar bagi perusahaan menengah. Dengan analisis keuangan yang mendalam, Anda dapat
                                        mengoptimalkan pengelolaan aset, mengontrol pengeluaran, serta membuat keputusan
                                        strategis untuk meningkatkan kinerja dan pertumbuhan bisnis.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <li><span>Harga Normal:</span>
                                                            <del>Rp. 4.000.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 3.000.000</li>
                                                        <li><span>Periode:</span>Bulanan</li>
                                                        <li>
                                                            <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Laporan Keuangan untuk Perusahaan Menengah*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
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
                                                    <h4 class="title">Dapatkan Paket Pembuatan Laporan Keuangan Untuk
                                                        Perusahaan Menengah</h4>
                                                    <p>Dengan membeli paket diatas, Anda akan mendapatkan:</p>
                                                    <div class="about__list-box">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Keuangan &amp; Perpajakan Rutin (All Tax) Bulanan &amp; Tahunan</li>
                                                            <li><i class="flaticon-arrow-button"></i>Penyusunan Laporan Rutin Bulanan &amp; Tahunan Keuangan</li>
                                                            <li><i class="flaticon-arrow-button"></i>Pembukaan Faktur Pajak jika Perusahaan Sudah PKP</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Neraca Saldo</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Laba &amp; Rugi</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Arus Kas</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Perubahan Modal (Optional)</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan PPh dan PPN Bulanan</li>
                                                            <li><i class="flaticon-arrow-button"></i>Bonus SPT Tahunan</li>
                                                            <li><i class="flaticon-arrow-button"></i>Konsultasi dan Meeting Gratis</li>
                                                        </ul>
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
                                    <h2 class="title">Laporan Keuangan Untuk Perusahaan Besar</h2>
                                    <p><b>Untuk perusahaan omzet diatas 10 Milyar per tahun</b></p>
                                    <p>Layanan kami menyajikan laporan keuangan yang detail dan sesuai dengan standar
                                        internasional untuk perusahaan besar. Dengan data yang akurat dan analisis mendalam,
                                        Anda dapat mengelola keuangan dengan lebih efektif, mendukung transparansi, serta
                                        mengambil keputusan strategis yang berkelanjutan untuk pertumbuhan bisnis.</p>
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <li><span>Harga Normal:</span>
                                                            <del>Rp. 5.500.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 4.500.000</li>
                                                        <li><span>Periode:</span>Bulanan</li>
                                                        <li>
                                                            <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Pembuatan Laporan Keuangan untuk Perusahaan Besar*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
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
                                                    <h4 class="title">Dapatkan Paket Pembuatan Laporan Keuangan Untuk
                                                        Perusahaan Besar</h4>
                                                    <p>Dengan membeli paket diatas, Anda akan mendapatkan:</p>
                                                    <div class="about__list-box">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Keuangan &amp; Perpajakan Rutin (All Tax) Bulanan &amp; Tahunan</li>
                                                            <li><i class="flaticon-arrow-button"></i>Penyusunan Laporan Rutin Bulanan &amp; Tahunan Keuangan</li>
                                                            <li><i class="flaticon-arrow-button"></i>Pembukaan Faktur Pajak jika Perusahaan Sudah PKP</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Neraca Saldo</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Laba &amp; Rugi</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Arus Kas</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan Perubahan Modal (Optional)</li>
                                                            <li><i class="flaticon-arrow-button"></i>Laporan PPh dan PPN Bulanan</li>
                                                            <li><i class="flaticon-arrow-button"></i>Bonus SPT Tahunan</li>
                                                            <li><i class="flaticon-arrow-button"></i>Konsultasi dan Meeting Gratis</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- spt pribadi --}}
                            <div class="tab-pane fade" id="five-tab-pane" role="tabpanel"
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
                                                            <del>Rp. 2.999.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 1.500.000</li>
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
                            <div class="tab-pane fade" id="six-tab-pane" role="tabpanel" aria-labelledby="six-tab"
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
                                                            <del>Rp. 3.890.000</del>
                                                        </li>
                                                        <li><span>Diskon Menjadi:</span>Rp. 3.000.000</li>
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
                                            <!--<li class="nav-item">-->
                                            <!--    <button class="nav-link active" id="one-tab" data-bs-toggle="tab"-->
                                            <!--        data-bs-target="#one-tab-pane" type="button" role="tab"-->
                                            <!--        aria-controls="one-tab-pane" aria-selected="true">Laporan Keuangan-->
                                            <!--        UMKM</button>-->
                                            <!--</li>-->
                                            <li class="nav-item">
                                                <button class="nav-link active" id="two-tab" data-bs-toggle="tab"
                                                    data-bs-target="#two-tab-pane" type="button" role="tab"
                                                    aria-controls="two-tab-pane" aria-selected="true">Laporan Keuangan
                                                    A</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="three-tab" data-bs-toggle="tab"
                                                    data-bs-target="#three-tab-pane" type="button" role="tab"
                                                    aria-controls="three-tab-pane" aria-selected="true">Laporan Keuangan
                                                    B</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="four-tab" data-bs-toggle="tab"
                                                    data-bs-target="#four-tab-pane" type="button" role="tab"
                                                    aria-controls="four-tab-pane" aria-selected="true">Laporan Keuangan
                                                    C</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="five-tab" data-bs-toggle="tab"
                                                    data-bs-target="#five-tab-pane" type="button" role="tab"
                                                    aria-controls="five-tab-pane" aria-selected="true">SPT Tahunan Orang
                                                    Pribadi</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="six-tab" data-bs-toggle="tab"
                                                    data-bs-target="#six-tab-pane" type="button" role="tab"
                                                    aria-controls="six-tab-pane" aria-selected="true">SPT Tahunan Badan
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
