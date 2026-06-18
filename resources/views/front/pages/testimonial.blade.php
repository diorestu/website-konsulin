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

@push('addon-style')
    <style>
        :root {
            --konsulin-primary: #1268ff;
            --konsulin-primary-soft: rgba(18, 104, 255, 0.1);
            --konsulin-dark: #10233f;
            --konsulin-text: #667085;
            --konsulin-border: #e8eef7;
            --konsulin-bg: #f7faff;
            --konsulin-white: #ffffff;
        }

        .konsulin-testimonial {
            position: relative;
            padding: 105px 0;
            background:
                radial-gradient(circle at top right, rgba(18, 104, 255, 0.22), transparent 35%),
                linear-gradient(180deg, #10233f 0%, #0b1a30 100%);
            overflow: hidden;
        }

        .konsulin-testimonial::before {
            content: "";
            position: absolute;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: rgba(18, 104, 255, 0.12);
            left: -160px;
            bottom: -180px;
        }

        .konsulin-testimonial .container {
            position: relative;
            z-index: 2;
        }

        .konsulin-section-title {
            max-width: 760px;
            margin: 0 auto 52px;
            text-align: center;
        }

        .konsulin-section-title .sub-title {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 15px;
            border-radius: 999px;
            background: rgba(18, 104, 255, 0.14);
            color: #8bb4ff;
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .konsulin-section-title .title {
            color: #ffffff;
            font-size: 40px;
            line-height: 1.25;
            font-weight: 800;
            letter-spacing: -0.6px;
            margin: 0;
        }

        .konsulin-testimonial-card {
            position: relative;
            height: 100%;
            padding: 32px;
            border-radius: 28px;
            background: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 24px 70px rgba(0, 0, 0, 0.16);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .konsulin-testimonial-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.22);
        }

        .konsulin-testimonial-top {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 22px;
        }

        .konsulin-testimonial-card .testimonial__avatar {
            width: 68px;
            height: 68px;
            min-width: 68px;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid rgba(18, 104, 255, 0.14);
            margin: 0;
        }

        .konsulin-testimonial-card .testimonial__avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .konsulin-testimonial-card .testimonial__info-two .title {
            color: var(--konsulin-dark);
            font-size: 19px;
            line-height: 1.3;
            font-weight: 800;
            margin: 0 0 4px;
        }

        .konsulin-testimonial-card .testimonial__info-two span {
            display: block;
            color: var(--konsulin-text);
            font-size: 14px;
            line-height: 1.5;
            font-weight: 600;
        }

        .konsulin-testimonial-card .testimonial__rating {
            display: flex;
            gap: 5px;
            margin-bottom: 18px;
        }

        .konsulin-testimonial-card .testimonial__rating i {
            color: #f6b800;
            font-size: 15px;
        }

        .konsulin-testimonial-card p {
            color: var(--konsulin-text);
            font-size: 15px;
            line-height: 1.8;
            margin: 0;
            position: relative;
            z-index: 2;
        }

        .konsulin-testimonial-card .icon {
            position: absolute;
            right: 28px;
            bottom: 24px;
            width: 64px;
            opacity: 0.08;
            z-index: 1;
        }

        .konsulin-testimonial-card .icon img {
            width: 100%;
        }

        .konsulin-brand {
            position: relative;
            padding: 95px 0;
            background: linear-gradient(180deg, #ffffff 0%, #f7faff 100%);
            overflow: hidden;
        }

        .konsulin-brand::before {
            content: "";
            position: absolute;
            width: 440px;
            height: 440px;
            border-radius: 50%;
            background: rgba(18, 104, 255, 0.07);
            top: -170px;
            right: -150px;
        }

        .konsulin-brand .container {
            position: relative;
            z-index: 2;
        }

        .konsulin-brand-title {
            max-width: 820px;
            margin: 0 auto 48px;
            text-align: center;
        }

        .konsulin-brand-title .sub-title {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 15px;
            border-radius: 999px;
            background: var(--konsulin-primary-soft);
            color: var(--konsulin-primary);
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .konsulin-brand-title .title {
            color: var(--konsulin-dark);
            font-size: 38px;
            line-height: 1.28;
            font-weight: 800;
            letter-spacing: -0.6px;
            margin: 0;
        }

        .konsulin-brand-slider {
            padding: 12px 0;
        }

        .konsulin-brand-slider .brand-item {
            height: 118px;
            padding: 24px;
            border-radius: 22px;
            background: #ffffff;
            border: 1px solid var(--konsulin-border);
            box-shadow: 0 16px 40px rgba(16, 35, 63, 0.06);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .konsulin-brand-slider .brand-item:hover {
            transform: translateY(-6px);
            border-color: rgba(18, 104, 255, 0.28);
            box-shadow: 0 22px 55px rgba(16, 35, 63, 0.1);
        }

        .konsulin-brand-slider .brand-item img {
            max-width: 100%;
            max-height: 68px;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: 0.72;
            transition: all 0.3s ease;
        }

        .konsulin-brand-slider .brand-item:hover img {
            filter: grayscale(0%);
            opacity: 1;
        }

        @media (max-width: 991px) {
            .konsulin-testimonial,
            .konsulin-brand {
                padding: 80px 0;
            }

            .konsulin-section-title .title,
            .konsulin-brand-title .title {
                font-size: 32px;
            }
        }

        @media (max-width: 575px) {
            .konsulin-testimonial,
            .konsulin-brand {
                padding: 65px 0;
            }

            .konsulin-section-title,
            .konsulin-brand-title {
                margin-bottom: 36px;
            }

            .konsulin-section-title .title,
            .konsulin-brand-title .title {
                font-size: 27px;
            }

            .konsulin-testimonial-card {
                padding: 26px 22px;
                border-radius: 24px;
            }

            .konsulin-testimonial-top {
                align-items: flex-start;
            }

            .konsulin-testimonial-card .testimonial__avatar {
                width: 58px;
                height: 58px;
                min-width: 58px;
            }

            .konsulin-brand-slider .brand-item {
                height: 105px;
                padding: 20px;
                border-radius: 18px;
            }
        }
    </style>
@endpush

@section('content')
    <section class="testimonial__area-two konsulin-testimonial">
        <div class="container">
            <div class="konsulin-section-title tg-heading-subheading animation-style3">
                <span class="sub-title">Testimoni Klien</span>
                <h2 class="title tg-element-title">Lihat Bagaimana Tanggapan Klien Kami</h2>
            </div>

            <div class="row justify-content-center gutter-24">
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial__item-two konsulin-testimonial-card">
                        <div class="konsulin-testimonial-top">
                            <div class="testimonial__avatar">
                                <img src="{{ asset('frontend-assets/img/images/testi_avatar01.png') }}" alt="">
                            </div>
                            <div class="testimonial__info-two">
                                <h2 class="title">Geovany Christine</h2>
                                <span>CEO, PT. Tambar Malem Bhakti Sejahtera</span>
                            </div>
                        </div>

                        <div class="testimonial__rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>

                        <p>
                            Proses yang semula terasa rumit menjadi lebih mudah dengan bimbingan yang diberikan oleh tim
                            Konsulin.id. Selain itu, Konsulin.id juga memberikan panduan yang berguna dalam merencanakan
                            usaha saya untuk jangka panjang.
                        </p>

                        <div class="icon">
                            <img src="{{ asset('frontend-assets/img/icon/quote.svg') }}" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="testimonial__item-two konsulin-testimonial-card">
                        <div class="konsulin-testimonial-top">
                            <div class="testimonial__avatar">
                                <img src="{{ asset('frontend-assets/img/images/testi_avatar02.png') }}" alt="">
                            </div>
                            <div class="testimonial__info-two">
                                <h2 class="title">Andi</h2>
                                <span>CEO, Ultra Jaya Anugerah</span>
                            </div>
                        </div>

                        <div class="testimonial__rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>

                        <p>
                            Terima kasih, Konsulin.id telah membantu menyusun laporan keuangan usaha saya. Sekarang
                            saya mempunyai laporan keuangan yang rapi dan membantu saya dalam melihat kondisi keuangan
                            usaha. Saya semakin semangat untuk berbisnis.
                        </p>

                        <div class="icon">
                            <img src="{{ asset('frontend-assets/img/icon/quote.svg') }}" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="testimonial__item-two konsulin-testimonial-card">
                        <div class="konsulin-testimonial-top">
                            <div class="testimonial__avatar">
                                <img src="{{ asset('frontend-assets/img/testimonial/lala.jpg') }}" alt="">
                            </div>
                            <div class="testimonial__info-two">
                                <h2 class="title">Laila Karimah</h2>
                                <span>CEO, Bali Nusa Bersatu</span>
                            </div>
                        </div>

                        <div class="testimonial__rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>

                        <p>
                            Thank you ya Konsulin.id ! Finally aku punya PT sendiri setelah bolak-balik cari konsultan!
                            Harga affordable dan pengerjaan cuman 2 jam beres! Thanks again Konsulin. Sukses selalu buat
                            Konsulin.
                        </p>

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

    <div class="brand__area-two konsulin-brand">
        <div class="container">
            <div class="konsulin-brand-title tg-heading-subheading animation-style3">
                <span class="sub-title">Klien Kami</span>
                <h2 class="title tg-element-title">
                    Bergabunglah Bersama Lebih dari 100 Perusahaan untuk Kesuksesan Bisnis Anda
                </h2>
            </div>

            <div class="swiper-container brand-active konsulin-brand-slider">
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
