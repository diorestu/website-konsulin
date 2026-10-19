<!DOCTYPE html>
<html lang="id">
<head>
    @php($seo = $page['props']['seo'])
    <title data-inertia="">{{ $seo['title'] }} — Konsulin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    @if ($seo['tagManagerId'])
        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer',@json($seo['tagManagerId']));
        </script>
    @endif
    @if ($seo['metaPixelId'])
        <script>
            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}
            (window,document,'script','https://connect.facebook.net/en_US/fbevents.js');
            fbq('set', 'autoConfig', false, @json($seo['metaPixelId']));
            fbq('init', @json($seo['metaPixelId']));
        </script>
    @endif
    <meta name="description" data-inertia="description" content="{{ $seo['description'] }}">
    <meta name="robots" data-inertia="robots" content="{{ $seo['robots'] }}">
    @if (config('seo.google_verification'))
        <meta name="google-site-verification" content="{{ config('seo.google_verification') }}">
    @endif
    @if (config('seo.bing_verification'))
        <meta name="msvalidate.01" content="{{ config('seo.bing_verification') }}">
    @endif
    <script type="application/ld+json">@json(\App\Support\PageSeo::organization())</script>
    <link rel="canonical" data-inertia="canonical" href="{{ $seo['canonical'] }}">
    <meta property="og:title" data-inertia="og:title" content="{{ $seo['title'] }} — Konsulin">
    <meta property="og:description" data-inertia="og:description" content="{{ $seo['description'] }}">
    <meta property="og:url" data-inertia="og:url" content="{{ $seo['canonical'] }}">
    <meta name="twitter:title" data-inertia="twitter:title" content="{{ $seo['title'] }} — Konsulin">
    <meta name="twitter:description" data-inertia="twitter:description" content="{{ $seo['description'] }}">
    <script type="application/ld+json" data-inertia="breadcrumbs">@json($seo['schema'])</script>
    <meta name="theme-color" content="#14213d">
    <link rel="icon" href="{{ asset('favicon.webp') }}" type="image/webp" sizes="64x64">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Konsulin.id">
    <meta property="og:locale" content="id_ID">
    <meta property="og:image" data-inertia="og:image" content="{{ $seo['image'] }}">
    <meta property="og:image:type" content="image/webp">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="1200">
    <meta property="og:image:alt" content="Konsulin.id — Adi Putra &amp; Partners, Kantor Jasa Akuntan &amp; Konsultan Hukum Perpajakan">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" data-inertia="twitter:image" content="{{ $seo['image'] }}">
    <meta name="twitter:image:alt" content="Konsulin.id — Adi Putra &amp; Partners">
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.tsx'])
    @inertiaHead
</head>
<body>
    @if ($seo['tagManagerId'])
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $seo['tagManagerId'] }}" height="0" width="0" style="display:none;visibility:hidden" title="Google Tag Manager"></iframe></noscript>
    @endif
    @if ($seo['metaPixelId'])
        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id={{ $seo['metaPixelId'] }}&amp;ev=PageView&amp;noscript=1" alt=""></noscript>
    @endif
    @inertia
</body>
</html>
