<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.include.meta')
    <title>Smart Panel - @yield('title')</title>
    @include('admin.include.style')
    @stack('addon-style')
</head>

<body data-layout="horizontal" data-key="body" data-layout-mode="light" data-topbar="dark">
    <div id="layout-wrapper">
        @include('admin.include.header')
        @include('admin.include.menu')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('admin.include.footer')
        </div>
    </div>
    @include('admin.include.script')
    @stack('addon-script')
</body>

</html>
