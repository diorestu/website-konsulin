<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Konsulin</title>
    <link rel="icon" href="{{ asset('favicon.webp') }}" type="image/webp">
    @viteReactRefresh
    @vite('resources/js/admin.tsx')
    @inertiaHead
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    @inertia
</body>
</html>
