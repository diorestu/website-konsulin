@extends('front.layout.front_layout')

@section('title')
    Kontak Kami
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
    <style>
        :root {
            --konsulin-primary: #1268ff;
            --konsulin-primary-dark: #0b55d9;
            --konsulin-primary-soft: rgba(18, 104, 255, 0.1);
            --konsulin-dark: #10233f;
            --konsulin-text: #667085;
            --konsulin-border: #e8eef7;
            --konsulin-bg: #f7faff;
            --konsulin-white: #ffffff;
        }

        .konsulin-contact {
            position: relative;
            padding: 100px 0;
            background:
                radial-gradient(circle at top left, rgba(18, 104, 255, 0.1), transparent 35%),
                linear-gradient(180deg, #f8fbff 0%, #ffffff 100%);
            overflow: hidden;
        }

        .konsulin-contact::before {
            content: "";
            position: absolute;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: rgba(18, 104, 255, 0.07);
            right: -150px;
            bottom: -180px;
        }

        .konsulin-contact .container {
            position: relative;
            z-index: 2;
        }

        .konsulin-contact-content {
            padding-right: 28px;
        }

        .konsulin-contact-content .section-title .title {
            color: var(--konsulin-dark);
            font-size: 42px;
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: -0.7px;
            margin-bottom: 18px;
        }

        .konsulin-contact-content .section-title p {
            color: var(--konsulin-text);
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 14px;
        }

        .konsulin-contact-info {
            margin-top: 34px;
        }

        .konsulin-contact-info ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: grid;
            gap: 16px;
        }

        .konsulin-contact-info li {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 20px;
            border-radius: 22px;
            background: #ffffff;
            border: 1px solid var(--konsulin-border);
            box-shadow: 0 16px 42px rgba(16, 35, 63, 0.06);
            transition: all 0.3s ease;
        }

        .konsulin-contact-info li:hover {
            transform: translateY(-5px);
            border-color: rgba(18, 104, 255, 0.25);
            box-shadow: 0 22px 55px rgba(16, 35, 63, 0.1);
        }

        .konsulin-contact-info .icon {
            width: 52px;
            height: 52px;
            min-width: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: var(--konsulin-primary-soft);
            color: var(--konsulin-primary);
            font-size: 24px;
        }

        .konsulin-contact-info .content .title {
            color: var(--konsulin-dark);
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .konsulin-contact-info .content p,
        .konsulin-contact-info .content a {
            color: var(--konsulin-text);
            font-size: 15px;
            line-height: 1.6;
            margin: 0;
        }

        .konsulin-contact-info .content a:hover {
            color: var(--konsulin-primary);
        }

        .konsulin-form-card {
            position: relative;
            padding: 42px;
            border-radius: 30px;
            background: #ffffff;
            border: 1px solid var(--konsulin-border);
            box-shadow: 0 28px 80px rgba(16, 35, 63, 0.12);
            overflow: hidden;
        }

        .konsulin-form-card::before {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(18, 104, 255, 0.09);
            right: -70px;
            top: -70px;
        }

        .konsulin-form-card > * {
            position: relative;
            z-index: 2;
        }

        .konsulin-form-card .title {
            color: var(--konsulin-dark);
            font-size: 30px;
            line-height: 1.3;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .konsulin-form-card > p {
            color: var(--konsulin-text);
            font-size: 15px;
            line-height: 1.7;
            margin-bottom: 28px;
        }

        .konsulin-form-card .form-grp {
            margin-bottom: 16px;
        }

        .konsulin-form-card input,
        .konsulin-form-card textarea {
            width: 100%;
            border: 1px solid var(--konsulin-border);
            background: #f8fbff;
            color: var(--konsulin-dark);
            border-radius: 16px;
            padding: 15px 18px;
            font-size: 15px;
            outline: none;
            transition: all 0.25s ease;
        }

        .konsulin-form-card textarea {
            min-height: 160px;
            resize: vertical;
        }

        .konsulin-form-card input::placeholder,
        .konsulin-form-card textarea::placeholder {
            color: #98a2b3;
        }

        .konsulin-form-card input:focus,
        .konsulin-form-card textarea:focus {
            border-color: rgba(18, 104, 255, 0.55);
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(18, 104, 255, 0.1);
        }

        .konsulin-form-card .checkbox-grp {
            margin: 4px 0 22px;
        }

        .konsulin-form-card .checkbox-grp p {
            margin: 0;
            color: var(--konsulin-text);
            font-size: 14px;
            line-height: 1.6;
        }

        .konsulin-form-card .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 52px;
            padding: 14px 28px;
            border-radius: 999px;
            background: var(--konsulin-primary);
            color: #ffffff;
            font-size: 15px;
            font-weight: 800;
            border: 0;
            box-shadow: 0 16px 34px rgba(18, 104, 255, 0.28);
            transition: all 0.25s ease;
        }

        .konsulin-form-card .btn:hover {
            background: var(--konsulin-primary-dark);
            color: #ffffff;
            transform: translateY(-2px);
        }

        .konsulin-response {
            font-size: 14px;
        }

        @media (max-width: 991px) {
            .konsulin-contact {
                padding: 80px 0;
            }

            .konsulin-contact-content {
                padding-right: 0;
                margin-bottom: 40px;
            }

            .konsulin-contact-content .section-title .title {
                font-size: 34px;
            }

            .konsulin-form-card {
                padding: 34px;
            }
        }

        @media (max-width: 575px) {
            .konsulin-contact {
                padding: 65px 0;
            }

            .konsulin-contact-content .section-title .title {
                font-size: 29px;
            }

            .konsulin-contact-content .section-title p {
                font-size: 15px;
            }

            .konsulin-contact-info li {
                padding: 18px;
                border-radius: 18px;
            }

            .konsulin-contact-info .icon {
                width: 46px;
                height: 46px;
                min-width: 46px;
                font-size: 21px;
            }

            .konsulin-form-card {
                padding: 26px 22px;
                border-radius: 24px;
            }

            .konsulin-form-card .title {
                font-size: 24px;
            }

            .konsulin-form-card textarea {
                min-height: 140px;
            }

            .konsulin-form-card .btn {
                width: 100%;
            }
        }
    </style>
@endpush

@section('content')
    <section class="contact__area konsulin-contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="contact__content konsulin-contact-content">
                        <div class="section-title mb-35">
                            <h2 class="title">Bagaimana kami dapat membantu Anda?</h2>

                            <p>
                                Kami siap membantu Anda dengan berbagai kebutuhan dan pertanyaan. Apakah Anda membutuhkan
                                bantuan dalam memecahkan masalah, mencari solusi, atau hanya ingin mendapatkan informasi
                                lebih lanjut?
                            </p>

                            <p>
                                Tim kami akan dengan senang hati memberikan dukungan yang Anda perlukan.
                                Jangan ragu untuk menghubungi kami!
                            </p>
                        </div>

                        <div class="contact__info konsulin-contact-info">
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-pin"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Alamat Kantor</h4>
                                        <p>{{ getCompanyProfile()->alamat_com1 }}</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="flaticon-phone-call"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Telepon</h4>
                                        <a href="tel:{{ getCompanyProfile()->phone_com1 }}">
                                            +{{ getCompanyProfile()->phone_com1 }}
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="flaticon-mail"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">E-mail</h4>
                                        <a href="mailto:{{ getCompanyProfile()->email_com1 }}">
                                            {{ getCompanyProfile()->email_com1 }}
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="contact__form-wrap konsulin-form-card">
                        <h2 class="title">Kirim Pesan Kepada Kami</h2>

                        <p>
                            Jika Anda memiliki pertanyaan atau butuh bantuan, jangan ragu untuk mengirimkan pesan kepada
                            kami.
                        </p>

                        <div class="ajax-response konsulin-response mb-3 rounded-md"></div>

                        <form id="whatsapp-form" action="{{ route('send.message') }}" method="POST">
                            @csrf
                            @method('POST')

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-grp">
                                        <input type="text" name="name" placeholder="Nama Lengkap" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-grp">
                                        <input type="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-grp">
                                        <input type="number" name="phone" placeholder="Nomor Telepon" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-grp">
                                <textarea name="message" required placeholder="Pesan"></textarea>
                            </div>

                            <div class="form-grp checkbox-grp">
                                <p>Tim kami akan segera merespons untuk membantu Anda.</p>
                            </div>

                            <button type="submit" class="btn">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('addon-script')
    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire('Berhasil', '{{ \Session::get('success') }}', 'success')
        </script>
    @endif
    @if (Session::has('error'))
        <script type="text/javascript">
            Swal.fire('Gagal', '{{ \Session::get('error') }}', 'error')
        </script>
    @endif
@endpush
