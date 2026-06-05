@extends('front.layout.front_layout')

@section('title')
    Jasa Penyewaan Virtual Office
@endsection

@section('meta_desc')
    Tingkatkan citra bisnis Anda dengan jasa pengelolaan branding usaha terbaik. Konsulin membantu menciptakan strategi
    branding yang kuat dan efektif untuk memperkuat identitas dan pertumbuhan bisnis Anda.
@endsection

@section('meta_key')
    konsulin, layanan pajak, akuntansi terbaik, pertumbuhan usaha, perencanaan keuangan, kepatuhan pajak, solusi pajak,
    konsultasi bisnis, layanan akuntansi, pajak usaha, pengelolaan keuangan, jasa branding usaha, pengelolaan branding,
    strategi branding, branding bisnis, citra usaha, jasa pengembangan brand, identitas brand, solusi branding, pertumbuhan
    bisnis, branding efektif, jasa perencanaan model usaha, strategi bisnis,
    pengembangan usaha, model bisnis efektif, perencanaan usaha, solusi bisnis, konsultasi model usaha, pertumbuhan usaha,
    perencanaan strategis, analisis model usaha
@endsection

@push('addon-style')
<link href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery-bundle.min.css" rel="stylesheet">
@endpush

@section('content')
    <section class="breadcrumb__area breadcrumb__bg"
        data-background="{{ asset('frontend-assets/img/bg/breadcrumb_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__content">
                        <h2 class="title">Jasa Penyewaan Virtual Office</h2>
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
                                    <h2 class="title">Virtual Office 1 Tahun Medium Bisnis</h2>
                                    <p>Kami menyediakan solusi kantor virtual modern yang dirancang untuk memenuhi kebutuhan bisnis Anda tanpa harus memiliki ruang fisik. Dengan Virtual Office kami, Anda bisa menikmati alamat bisnis yang bergengsi, layanan penerimaan surat, nomor telepon khusus, serta ruang rapat yang dapat disewa sesuai kebutuhan.</p>
                                    
                                    <div class="mb-4">    
                                        <p><b>Virtual Office Sahid Sudirman (PKP/non PKP)</b>
                                        <br>Sahid Sudirman Residence Ground Floor, Jl. Jenderal Sudirman No.86, RT.10/RW.11, Karet Tengsin,
                                        <br>Kec. Tanah Abang, Jakarta Pusat, DKI Jakarta 10220</p>
                                    </div>
                                    
                                    <div class="mb-4">    
                                        <p><b>Virtual Office Citicon (PKP/non PKP)</b>
                                        <br>Jl. Letjen S. Parman No.Kav 72 4, RT.4/RW.3, Slipi, Kec. Palmerah
                                        <br>Jakarta Barat, DKI Jakarta 11410 (Lantai 19 Unit A)</p>
                                        
                                    </div>
                                    
                                    <div class="mb-4">    
                                        <p><b>Virtual Office Starwork Tebet (PKP/non PKP)</b>
                                        <br>The Royal Palace, Blok A.12&15 Jl. Prof. DR. Soepomo No.178A RT.1/RW.15, Menteng Dalam, 
                                        <br>Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12870</p>
                                    </div>
                                    
                                    <div class="mb-4">    
                                        <p><b>Virtual Office Citi Hub Harton (PKP/non PKP)</b>
                                        <br>Jl. Boulevard Artha Gading, RT.18/RW.8, Klp. Gading Bar., 
                                        <br>Kec. Klp. Gading, Jakarta, Daerah Khusus Ibukota Jakarta 14240</p>
                                    </div>
                                    
                                    <div class="mb-4">    
                                        <p><b>Virtual Office The Suite Tower (PKP/non PKP)</b>
                                        <br>Jkt Outer Ring Road No.1 7 7, RT.OFSRT/RW.2, Kamal Muara, 
                                        <br>Kec. Penjaringan, Jakarta Utara, DKI Jakarta 14470</p>
                                    </div>
                                    <div class="mb-4">    
                                        <p><b>Virtual Office PIK Avenue (PKP/non PKP)</b>
                                        <br>PIK Avenue, Jl. Pantai Indah Kapuk No.6 Level 6, RT.6/RW.2, Kamal Muara, 
                                        <br>Kec. Penjaringan, Jakarta Utara, DKI Jakarta 14470</p>
                                        <div class="row" id="lightgallery">
                                            <a class="col-3 mb-3" href="{{ asset('frontend-assets/img/virtual_office/jakarta/pik_avenue/1.webp') }}">
                                                <img src="{{ asset('frontend-assets/img/virtual_office/jakarta/pik_avenue/1.webp') }}" alt="">
                                            </a>
                                            <a class="col-3 mb-3" href="{{ asset('frontend-assets/img/virtual_office/jakarta/pik_avenue/2.webp') }}">
                                                <img src="{{ asset('frontend-assets/img/virtual_office/jakarta/pik_avenue/2.webp') }}" alt="">
                                            </a>
                                            <a class="col-3 mb-3" href="{{ asset('frontend-assets/img/virtual_office/jakarta/pik_avenue/3.webp') }}">
                                                <img src="{{ asset('frontend-assets/img/virtual_office/jakarta/pik_avenue/3.webp') }}" alt="">
                                            </a>
                                            <a class="col-3 mb-3" href="{{ asset('frontend-assets/img/virtual_office/jakarta/pik_avenue/4.webp') }}">
                                                <img src="{{ asset('frontend-assets/img/virtual_office/jakarta/pik_avenue/4.webp') }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-4">    
                                        <p><b>Virtual Office Burza Tower (PKP/non PKP)</b>
                                        <br>Jl. Pantai Indah Selatan No.8, RT.3/RW.3, Kamal Muara, 
                                        <br>Kec. Penjaringan, Jakarta Utara, DKI Jakarta 14470</p>
                                    </div>

                                    
                                    <div class="mb-4">    
                                        <p><b>Virtual Office SCBD (PKP/non PKP)</b>
                                        <br>TREASURY TOWER, SCBD Kawasan District 8 No.LOT 28 Lantai 5 Unit J, Senayan,
                                        <br>Kec. Kby. Baru, Jakarta, Daerah Khusus Ibukota Jakarta 12190</p>
                                        
                                    </div>
                                        
                                    <div class="services__details-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="project__details-info ms-0">
                                                    <h4 class="title">Detail Harga</h4>
                                                    <ul class="list-wrap">
                                                        <!--<li><span>Harga Normal:</span>-->
                                                        <!--    <del>Rp. 3.200.000</del>-->
                                                        <!--</li>-->
                                                        <li><span>Mulai dari:</span>Rp. 3.000.000</li>
                                                        <li><span>Mekanisme:</span> per tahun</li>
                                                        <li>
                                                            <a href="https://wa.me/6285183440300?text=Halo, Saya tertarik dengan jasa *Penyewaan Virtual Office*. Bisakah saya mendapatkan info lebih lanjut? Terima kasih. [WEBSITE]"
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
                                                    <h4 class="title">Dapatkan Paket Penyewaan Virtual Office</h4>
                                                    <p>Dengan membeli paket diatas, Anda akan mendapatkan:</p>
                                                    <div class="about__list-box">
                                                        <ul class="list-wrap">
                                                            <li><i class="flaticon-arrow-button"></i> Free Ruang Meeting 4 jam/bulan</li>
                                                            <li><i class="flaticon-arrow-button"></i> Free Surat Keterangan Domisili</li>
                                                            <li><i class="flaticon-arrow-button"></i> Notif surat menyurat via WA/email</li>
                                                            <li><i class="flaticon-arrow-button"></i> Deposit biaya pengantaran surat Rp. 200.000,- via ekspedisi</li>
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
                                                    aria-controls="one-tab-pane" aria-selected="true">Virtual Office</button>
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
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/lightgallery.min.js"></script>
<script>
    lightGallery(document.getElementById('lightgallery'), {
        speed: 400,
    });
    // lightGallery(document.getElementById('lightgallery2'), {
    //     speed: 500,
    // });
    // lightGallery(document.getElementById('lightgallery3'), {
    //     speed: 500,
    // });
</script>
@endpush
