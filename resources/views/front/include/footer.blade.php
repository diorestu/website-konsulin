<footer>
    <div class="footer__area-two">
        <div class="footer__top-two">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        <div class="footer-widget">
                            <div class="footer__content-two">
                                <div class="fw-logo mb-25">
                                    <a href="{{ route('homepage') }}"><img
                                            src="{{ asset('frontend-assets/img/logo/logo-white-side.png') }}"
                                            alt=""></a>
                                </div>
                                <p>
                                    Jasa Akuntan dan konsultan yang profesional, berintegritas, berkualitas, dan
                                    berkompetensi dalam rangka mendorong terwujudnya good governance di Indonesia.
                                </p>
                            </div>
                            <div class="footer__social-two mt-4">
                                <ul class="list-wrap">
                                    <li><a href="{{ getCompanyProfile()->social_fb }}"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ getCompanyProfile()->social_ig }}"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ getCompanyProfile()->social_tiktok }}"><i
                                                class="fab fa-tiktok"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-sm-12">
                        <div class="footer-widget">
                            <h4 class="fw-title">Jasa &amp; Layanan</h4>
                            <div class="footer-link-list">
                                <ul class="list-wrap">
                                    <li><a href="{{ route('services.laporan_keuangan') }}">Pembuatan Laporan
                                            Keuangan</a></li>
                                    <li><a href="{{ route('services.model_usaha') }}">Perencanaan Model Usaha</a></li>
                                    <li><a href="{{ route('services.pelaporan_pajak') }}">Pengurusan Laporan
                                            Perpajakan</a></li>
                                    <li><a href="{{ route('services.pendirian_pt') }}">Pendirian Legalitas PT.
                                            Perorangan</a></li>
                                    <li><a href="{{ route('services.npwp') }}">Pengurusan Dokumen</a></li>
                                    <li><a href="{{ route('services.branding') }}">Branding Usaha</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="footer-widget">
                            <h4 class="fw-title">Kontak Kami</h4>
                            <div class="footer-info-list footer-info-two mb-4">
                                <ul class="list-wrap">
                                    <li>
                                        <div class="icon">
                                            <i class="flaticon-phone-call"></i>
                                        </div>
                                        <div class="content">
                                            <a
                                                href="tel:{{ getCompanyProfile()->email_com1 }}">+{{ getCompanyProfile()->phone_com1 }}</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="flaticon-envelope"></i>
                                        </div>
                                        <div class="content">
                                            <a
                                                href="mailto:{{ getCompanyProfile()->email_com1 }}">{{ getCompanyProfile()->email_com1 }}</a>
                                        </div>
                                    </li>
                                    <!--<li>-->
                                    <!--    <div class="icon">-->
                                    <!--        <i class="flaticon-envelope"></i>-->
                                    <!--    </div>-->
                                    <!--    <div class="content">-->
                                    <!--        <a-->
                                    <!--            href="mailto:adiputrarizkillah526@gmail.com">adiputrarizkillah526@gmail.com</a>-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                    <li>
                                        <div class="icon">
                                            <i class="flaticon-pin"></i>
                                        </div>
                                        <div class="content">
                                            <p>{{ getCompanyProfile()->alamat_com1 }}</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom-two">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text-two">
                            <p>Copyright © <a href="{{ route('homepage') }}">PT. Solusi Usaha Adijaya</a> - All Right Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
