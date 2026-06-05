<div id="header-fixed-height"></div>
<header class="tg-header__style-two">
    <div class="tg-header__inner-wrap">
        <div class="tg-header__logo-wrap">
            <div class="logo">
                <a href="{{ route('homepage') }}"><img src="{{ asset('frontend-assets/img/logo/logo-color.png') }}"
                        alt="{{ getCompanyProfile()->brand_com }}"></a>
            </div>
        </div>
        <div class="tg-header__right-side">
            <div class="tg-header__top tg-header__top-two">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tg-header__top-info tg-header__top-info-two list-wrap">
                            <li><i class="flaticon-pin"></i>{{ getCompanyProfile()->alamat_com2 }}</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="tg-header__top-right tg-header__top-right-two list-wrap">
                            <li><i class="flaticon-envelope"></i><a
                                    href="mailto:{{ getCompanyProfile()->email_com1 }}">{{ getCompanyProfile()->email_com1 }}</a>
                            </li>
                            <li><i class="flaticon-time"></i>Senin-Jumat: 08:00am - 09:00pm</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="tg-header__area tg-header__area-two">
                <div class="row">
                    <div class="col-12">
                        <div class="tgmenu__wrap">
                            <nav class="tgmenu__nav">
                                <div class="logo d-none">
                                    <a href="{{ route('homepage') }}"><img
                                            src="{{ asset('frontend-assets/img/logo/logo-color-side.png') }}"
                                            alt="{{ getCompanyProfile()->brand_com }}"></a>
                                </div>
                                <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li><a href="{{ route('homepage') }}">Beranda</a></li>
                                        <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                                        <li><a href="{{ route('value') }}">Nilai Kami</a></li>
                                        <li class="menu-item-has-children"><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModal">Jasa &amp; Layanan</a>
                                            <ul class="sub-menu d-lg-none">
                                                <li><a href="{{ route('services.laporan_keuangan') }}">Tax &amp; Accounting</a></li>
                                                <li><a href="{{ route('services.pendirian_pt') }}">Pendirian Legalitas Usaha</a></li>
                                                <li><a href="{{ route('services.npwp') }}">Pengurusan Dokumen</a></li>
                                                <li><a href="{{ route('services.branding') }}">Branding Usaha</a></li>
                                                <li><a href="{{ route('services.virtual_office') }}">Virtual Office</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('testimonial') }}">Testimoni</a></li>
                                        <li><a href="{{ route('contact') }}">Kontak</a></li>
                                    </ul>
                                </div>
                                <div class="tgmenu__action tgmenu__action-two d-none d-md-block">
                                    <ul class="list-wrap">
                                        <li class="offCanvas-menu">
                                            <a href="javascript:void(0)" class="menu-tigger">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"
                                                    fill="none">
                                                    <path
                                                        d="M0 2C0 0.895431 0.895431 0 2 0C3.10457 0 4 0.895431 4 2C4 3.10457 3.10457 4 2 4C0.895431 4 0 3.10457 0 2Z"
                                                        fill="currentcolor" />
                                                    <path
                                                        d="M0 9C0 7.89543 0.895431 7 2 7C3.10457 7 4 7.89543 4 9C4 10.1046 3.10457 11 2 11C0.895431 11 0 10.1046 0 9Z"
                                                        fill="currentcolor" />
                                                    <path
                                                        d="M0 16C0 14.8954 0.895431 14 2 14C3.10457 14 4 14.8954 4 16C4 17.1046 3.10457 18 2 18C0.895431 18 0 17.1046 0 16Z"
                                                        fill="currentcolor" />
                                                    <path
                                                        d="M7 2C7 0.895431 7.89543 0 9 0C10.1046 0 11 0.895431 11 2C11 3.10457 10.1046 4 9 4C7.89543 4 7 3.10457 7 2Z"
                                                        fill="currentcolor" />
                                                    <path
                                                        d="M7 9C7 7.89543 7.89543 7 9 7C10.1046 7 11 7.89543 11 9C11 10.1046 10.1046 11 9 11C7.89543 11 7 10.1046 7 9Z"
                                                        fill="currentcolor" />
                                                    <path
                                                        d="M7 16C7 14.8954 7.89543 14 9 14C10.1046 14 11 14.8954 11 16C11 17.1046 10.1046 18 9 18C7.89543 18 7 17.1046 7 16Z"
                                                        fill="currentcolor" />
                                                    <path
                                                        d="M14 2C14 0.895431 14.8954 0 16 0C17.1046 0 18 0.895431 18 2C18 3.10457 17.1046 4 16 4C14.8954 4 14 3.10457 14 2Z"
                                                        fill="currentcolor" />
                                                    <path
                                                        d="M14 9C14 7.89543 14.8954 7 16 7C17.1046 7 18 7.89543 18 9C18 10.1046 17.1046 11 16 11C14.8954 11 14 10.1046 14 9Z"
                                                        fill="currentcolor" />
                                                    <path
                                                        d="M14 16C14 14.8954 14.8954 14 16 14C17.1046 14 18 14.8954 18 16C18 17.1046 17.1046 18 16 18C14.8954 18 14 17.1046 14 16Z"
                                                        fill="currentcolor" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="header-btn"><a href="{{ route('contact') }}" class="btn"><i
                                                    class="far fa-comment-alt"></i>Kontak Kami</a></li>
                                    </ul>
                                </div>
                                <div class="mobile-nav-toggler mobile-nav-toggler-two">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
                                        <path
                                            d="M0 2C0 0.895431 0.895431 0 2 0C3.10457 0 4 0.895431 4 2C4 3.10457 3.10457 4 2 4C0.895431 4 0 3.10457 0 2Z"
                                            fill="currentcolor" />
                                        <path
                                            d="M0 9C0 7.89543 0.895431 7 2 7C3.10457 7 4 7.89543 4 9C4 10.1046 3.10457 11 2 11C0.895431 11 0 10.1046 0 9Z"
                                            fill="currentcolor" />
                                        <path
                                            d="M0 16C0 14.8954 0.895431 14 2 14C3.10457 14 4 14.8954 4 16C4 17.1046 3.10457 18 2 18C0.895431 18 0 17.1046 0 16Z"
                                            fill="currentcolor" />
                                        <path
                                            d="M7 2C7 0.895431 7.89543 0 9 0C10.1046 0 11 0.895431 11 2C11 3.10457 10.1046 4 9 4C7.89543 4 7 3.10457 7 2Z"
                                            fill="currentcolor" />
                                        <path
                                            d="M7 9C7 7.89543 7.89543 7 9 7C10.1046 7 11 7.89543 11 9C11 10.1046 10.1046 11 9 11C7.89543 11 7 10.1046 7 9Z"
                                            fill="currentcolor" />
                                        <path
                                            d="M7 16C7 14.8954 7.89543 14 9 14C10.1046 14 11 14.8954 11 16C11 17.1046 10.1046 18 9 18C7.89543 18 7 17.1046 7 16Z"
                                            fill="currentcolor" />
                                        <path
                                            d="M14 2C14 0.895431 14.8954 0 16 0C17.1046 0 18 0.895431 18 2C18 3.10457 17.1046 4 16 4C14.8954 4 14 3.10457 14 2Z"
                                            fill="currentcolor" />
                                        <path
                                            d="M14 9C14 7.89543 14.8954 7 16 7C17.1046 7 18 7.89543 18 9C18 10.1046 17.1046 11 16 11C14.8954 11 14 10.1046 14 9Z"
                                            fill="currentcolor" />
                                        <path
                                            d="M14 16C14 14.8954 14.8954 14 16 14C17.1046 14 18 14.8954 18 16C18 17.1046 17.1046 18 16 18C14.8954 18 14 17.1046 14 16Z"
                                            fill="currentcolor" />
                                    </svg>
                                </div>
                            </nav>
                        </div>
                        <!-- Mobile Menu  -->
                        <div class="tgmobile__menu">
                            <nav class="tgmobile__menu-box">
                                <div class="close-btn"><i class="fas fa-times"></i></div>
                                <div class="nav-logo">
                                    <a href="{{ route('homepage') }}"><img
                                            src="{{ asset('frontend-assets/img/logo/logo-color-side.png') }}"
                                            alt="{{ getCompanyProfile()->brand_com }}"></a>
                                </div>
                                <div class="tgmobile__menu-outer">
                                    <!--Here Menu Will Come Automastically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="tgmobile__menu-bottom">
                                    <div class="contact-info">
                                        <ul class="list-wrap">
                                            <li><a
                                                    href="mailto:{{ getCompanyProfile()->email_com1 }}">{{ getCompanyProfile()->email_com1 }}</a>
                                            </li>
                                            <li><a
                                                    href="tel:{{ getCompanyProfile()->phone_com1 }}">{{ '+' . getCompanyProfile()->phone_com1 }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="social-links">
                                        <ul class="list-wrap">
                                            <li><a href="{{ getCompanyProfile()->social_fb }}"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="{{ getCompanyProfile()->social_ig }}"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li><a href="{{ getCompanyProfile()->social_tiktok }}"><i class="fab fa-tiktok"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <div class="tgmobile__menu-backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="offCanvas__info">
        <div class="offCanvas__close-icon menu-close">
            <button><i class="far fa-window-close"></i></button>
        </div>
        <div class="offCanvas__logo mb-10">
            <a href="{{ route('homepage') }}"><img src="{{ asset('frontend-assets/img/logo/logo-color-side.png') }}"
                    alt="{{ getCompanyProfile()->brand_com }}"></a>
        </div>
        <div class="offCanvas__side-info mb-30">
            <div class="contact-list mb-30">
                <h4>Office Address</h4>
                <p>{{ getCompanyProfile()->alamat_com1 }}</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Phone Number</h4>
                <p>+{{ getCompanyProfile()->phone_com1 }}</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Email Address</h4>
                <p>{{ getCompanyProfile()->email_com1 }}</p>
                <!--<p>adiputrarizkillah526@gmail.com</p>-->
            </div>
        </div>
        <div class="offCanvas__social-icon mt-30">
            <a href="{{ getCompanyProfile()->social_fb }}"><i class="fab fa-facebook-f"></i></a>
            <a href="{{ getCompanyProfile()->social_ig }}"><i class="fab fa-instagram"></i></a>
            <a href="{{ getCompanyProfile()->social_tiktok }}"><i class="fab fa-tiktok"></i></a>
        </div>
    </div>
    <div class="offCanvas__overly"></div>
</header>

<div id="exampleModal" class="modal modalMenu" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-body" style="background-image:url('{{ asset('frontend-assets/img/menu/bg-2.jpg') }}'); background-size:cover;">
        <div style="position:absolute;right:10px; top: 20px;">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="row" style="padding: 30px;">
            <div class="col-12 col-xl-6 col-lg-6 mt-4 mb-4">
                <a href="{{ route('services.pendirian_pt') }}" class="d-flex align-items-center menuModal">
                    <div class="icon"><img src="{{ asset('frontend-assets/img/menu/pendirian_legalitas.png') }}" /></div>
                    <div class="judulMenu">
                        <h4 class="mb-0 text-white">Penerbitan Legalitas</h4>
                    </div>
                </a>
            </div>
            
            <div class="col-12 col-xl-6 col-lg-6 mt-4 mb-4">
                <a href="{{ route('services.laporan_keuangan') }}" class="d-flex align-items-center menuModal">
                    <div class="icon"><img src="{{ asset('frontend-assets/img/menu/tax.png') }}" /></div>
                    <div class="judulMenu">
                        <h4 class="mb-0 text-white">Tax &amp; Accounting</h4>
                    </div>
                </a>
            </div>
            
            <div class="col-12 col-xl-6 col-lg-6 mt-4 mb-4">
                <a href="{{ route('services.virtual_office') }}" class="d-flex align-items-center menuModal">
                    <div class="icon"><img src="{{ asset('frontend-assets/img/menu/virtual_office.png') }}" /></div>
                    <div class="judulMenu">
                        <h4 class="mb-0 text-white">Virtual Office</h4>
                    </div>
                </a>
            </div>
            
            <div class="col-12 col-xl-6 col-lg-6 mt-4 mb-4">
                <a href="{{ route('services.branding') }}" class="d-flex align-items-center menuModal">
                    <div class="icon"><img src="{{ asset('frontend-assets/img/menu/branding.png') }}" /></div>
                    <div class="judulMenu">
                        <h4 class="mb-0 text-white">Branding Usaha</h4>
                    </div>
                </a>
            </div>
            
            <div class="offset-xl-3 col-12 col-xl-6 col-lg-6 mt-4">
                <a href="{{ route('services.npwp') }}" class="d-flex align-items-center menuModal">
                    <div class="icon"><img src="{{ asset('frontend-assets/img/menu/pengurusan_dokumen.png') }}" /></div>
                    <div class="judulMenu">
                        <h4 class="mb-0 text-white">Pengurusan Dokumen</h4>
                    </div>
                </a>
            </div>
            
        </div>
      </div>
    </div>
  </div>
</div>
