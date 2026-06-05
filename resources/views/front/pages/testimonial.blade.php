@extends('front.layout.front_layout')

@section('title')
    Testimonial
@endsection

@section('meta_desc')
@endsection

@section('meta_desc')
    Dapatkan layanan pajak dan akuntansi terbaik untuk mendukung pertumbuhan usaha Anda. Konsulin menyediakan solusi tepat
    guna dalam perencanaan keuangan dan kepatuhan pajak, membantu bisnis berkembang dengan lancar dan efisien.
@endsection

@section('meta_key')
    konsulin, layanan pajak, akuntansi terbaik, pertumbuhan usaha, perencanaan keuangan, kepatuhan pajak, solusi pajak,
    konsultasi bisnis, layanan akuntansi, pajak usaha, pengelolaan keuangan, testimoni klien
@endsection

@section('content')
    <section class="testimonial__area-two">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title white-title text-center mb-50 tg-heading-subheading animation-style3">
                        <span class="sub-title">Testimoni Klien</span>
                        <h2 class="title tg-element-title">Lihat Bagaimana Tanggapan Klien Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center gutter-24">
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial__item-two">
                        <div class="testimonial__avatar">
                            <img src="{{ asset('frontend-assets/img/images/testi_avatar01.png') }}" alt="">
                        </div>
                        <div class="testimonial__info-two">
                            <h2 class="title">Geovany Christine</h2>
                            <span>CEO, PT. Tambar Malem Bhakti Sejahtera</span>
                        </div>
                        <div class="testimonial__rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>Proses yang semula terasa rumit menjadi lebih mudah dengan bimbingan yang diberikan oleh tim
                            Konsulin.id. Selain itu, Konsulin.id juga memberikan panduan yang berguna dalam merencanakan
                            usaha saya untuk jangka panjang.</p>
                        <div class="icon">
                            <img src="{{ asset('frontend-assets/img/icon/quote.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial__item-two">
                        <div class="testimonial__avatar">
                            <img src="{{ asset('frontend-assets/img/images/testi_avatar02.png') }}" alt="">
                        </div>
                        <div class="testimonial__info-two">
                            <h2 class="title">Andi</h2>
                            <span>CEO, Ultra Jaya Anugerah</span>
                        </div>
                        <div class="testimonial__rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>Terima kasih, Konsulin.id telah membantu menyusun laporan keuangan usaha saya. Sekarang
                            saya mempunyai laporan keuangan yang rapi dan membantu saya dalam melihat kondisi keuangan
                            usaha. Saya semakin semangat untuk berbisnis.</p>
                        <div class="icon">
                            <img src="{{ asset('frontend-assets/img/icon/quote.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial__item-two">
                        <div class="testimonial__avatar">
                            <img src="{{ asset('frontend-assets/img/testimonial/lala.jpg') }}" alt="">
                        </div>
                        <div class="testimonial__info-two">
                            <h2 class="title">Laila Karimah</h2>
                            <span>CEO, Bali Nusa Bersatu</span>
                        </div>
                        <div class="testimonial__rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>Thank you ya Konsulin.id ! Finally aku punya PT sendiri setelah bolak-balik cari konsultan!
                            Harga affordable dan pengerjaan cuman 2 jam beres! Thanks again Konsulin. Sukses selalu buat
                            Konsulin.</p>
                        <div class="icon">
                            <img src="{{ asset('frontend-assets/img/icon/quote.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial__shape-two">
            <img src="{{ asset('frontend-assets/img/images/h2_testimonial_shape.png') }}" alt="" data-aos="fade-up"
                data-aos-delay="400">
        </div>
    </section>

    <div class="brand__area-two">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <div class="section-title dark-title text-center mb-50 tg-heading-subheading animation-style3">
                        <span class="sub-title">Klien Kami</span>
                        <h2 class="title tg-element-title">Bergabunglah Bersama Lebih dari 100 Perusahaan untuk Kesuksesan
                            Bisnis Anda</h2>
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
    </div>

    @include('front.include.cta')
@endsection

@push('addon-script')
@endpush
