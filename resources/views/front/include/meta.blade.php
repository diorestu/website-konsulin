<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="@yield('meta_desc')" />
<meta name="keywords" content="@yield('meta_key')" />
<meta name="author" content="Adi Putra Rizkillah" />
<meta name=robots content="index, follow">
<meta name=googlebot content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<meta name=bingbot content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
{{-- meta og --}}
<meta property=og:locale content=id_ID>
<meta property=og:locale:alternate content=en_GB>
<meta property=og:type content=website>
<meta property=og:site_name content="Konsulin.id - Konsultan Bisnis & Keuangan">
<meta property=article:modified_time content=2020-10-27T07:27:11+00:00>
<meta name=twitter:card content=summary_large_image>
<meta property="og:url" content="https://www.konsulin.id" />
<meta property="og:title" content="@yield('title')" />
<meta property="og:description" content="@yield('meta_desc')" />
<meta property="og:image" content="{{ asset('frontend-assets/img/meta/image.jpg') }}" />

<!-- Meta Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '918103947534550');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=918103947534550&ev=PageView&noscript=1" /></noscript>
<!-- End Meta Pixel Code -->
