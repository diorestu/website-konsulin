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
@endpush

@section('content')
    <!-- breadcrumb-area-end -->
    <!-- contact-area -->
    <section class="contact__area" style="padding:60px 0px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="contact__content">
                        <div class="section-title mb-35">
                            <h2 class="title">Bagaimana kami dapat membantu Anda?</h2>
                            <p>Kami siap membantu Anda dengan berbagai kebutuhan dan pertanyaan. Apakah Anda membutuhkan
                                bantuan dalam memecahkan masalah, mencari solusi, atau hanya ingin mendapatkan informasi
                                lebih lanjut?
                            </p>
                            <p>Tim kami akan dengan senang hati memberikan dukungan yang Anda
                                perlukan.
                                Jangan ragu untuk menghubungi kami!</p>
                        </div>
                        <div class="contact__info">
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
                                        <a
                                            href="tel:{{ getCompanyProfile()->phone_com1 }}">+{{ getCompanyProfile()->phone_com1 }}</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-mail"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">E-mail</h4>
                                        <a
                                            href="mailto:{{ getCompanyProfile()->email_com1 }}">{{ getCompanyProfile()->email_com1 }}</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact__form-wrap">
                        <h2 class="title">Kirim Pesan Kepada Kami</h2>
                        <p>Jika Anda memiliki pertanyaan atau butuh bantuan, jangan ragu untuk mengirimkan pesan kepada
                            kami.</p>
                        <div class="ajax-response mb-3 rounded-md"></div>
                        <!-- id="contact-form" untuk ajax -->
                        <form id="whatsapp-form" action="{{ route('send.message') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-grp">
                                <textarea name="message" required placeholder="Pesan"></textarea>
                            </div>
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

    @include('front.include.cta')
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
