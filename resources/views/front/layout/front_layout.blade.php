<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('front.include.meta')
    <title>@yield('title') | Konsulin.id - Konsultan Bisnis &amp; Keuangan</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend-assets/img/favicon.png') }}">
    @include('front.include.style')
    @stack('addon-style')
</head>

<body>
    <div id="preloader">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="{{ asset('frontend-assets/img/logo/preloader.png') }}"
                        alt="Preloader"></div>
            </div>
        </div>
    </div>
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <a id="wa-float" class="scroll__top scroll-to-target" title='Whatsapp kami'
        href="https://wa.me/6285183440300?text=Halo, Saya ingin berbicara lebih lanjut terkait konsultasi bisnis dan keuangan [WEBSITE]">
        <i style='font-size:25px;' class="fab fa-whatsapp"></i>
    </a>
    @include('front.include.header')
    <main class="fix">
        @yield('content')
    </main>
    @include('front.include.footer')

    @include('front.include.script')
    @stack('addon-script')
</body>

</html>
