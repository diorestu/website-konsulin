<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.include.meta')
    <title>@yield('title')</title>
    @include('admin.include.style')
    @stack('addon-style')
</head>

<body data-topbar="dark">
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-5 col-md-5">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-3 pb-3 text-center">
                                    <img class="img-fluid" src="{{ asset('logo-new.png') }}" alt=""
                                        width='200px'>
                                </div>
                                @yield('content')
                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script>
                                        &copy; CV. Yakini Creative
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 d-none d-md-block">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        <div class="bg-overlay"></div>
                        <div class="row justify-content-center align-items-end">
                            <div class="col-12 text-center">
                                <div class="p-0 p-sm-4 px-xl-0">
                                    <div class="testi-contain text-center text-white">
                                        <div class="mt-4 pt-1 pb-5 mb-5 w-100 d-block">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.include.script')
    @stack('addon-script')
</body>

</html>
