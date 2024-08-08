@props([
    'title' => config('app.name'),
    'currentVersion' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">

    <title>{{ $title ? $title . ' - ' : null }} Laravel Shopper {{ isset($currentVersion) ? $currentVersion . ' ' : null }} - The TALL E-commerce Framework</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    @isset($canonical)
        <link rel="canonical" href="{{ url($canonical) }}">
    @endisset

    <meta name="title" content="Laravel Shopper - The E-commerce TALL Stack Framework">
    <meta name="description" content="Laravel Shopper is a an eCommerce administration built with Laravel for Laravel Developers to create & manage online store.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://laravelshopper.dev/">
    <meta property="og:title" content="Laravel Shopper - The E-commerce TALL Stack Framework">
    <meta property="og:description" content="Laravel Shopper is a an eCommerce administration built with Laravel for Laravel Developers to create & manage online store.">
    <meta property="og:image" content="https://laravelshopper.dev/img/og-image.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://laravelshopper.dev/">
    <meta property="twitter:title" content="Laravel Shopper - The E-commerce TALL Stack Framework">
    <meta property="twitter:description" content="Laravel Shopper is a an eCommerce administration built with Laravel for Laravel Developers to create & manage online store.">
    <meta property="twitter:image" content="https://laravelshopper.dev/img/og-image.jpg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#ff2d20">
    <link rel="shortcut icon" href="/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#ff2d20">
    <meta name="msapplication-config" content="/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="color-scheme" content="light">

    @googlefonts

    @vite('resources/css/app.css')

    @production
        <!-- Fathom - beautiful, simple website analytics -->
        <script src="https://cdn.usefathom.com/script.js" data-site="DVMEKBYF" defer></script>
        <!-- / Fathom -->
    @endproduction

    @include('partials.theme')
</head>
<body x-data="{ navIsOpen: false }"
      class="w-full h-full font-sans antialiased language-php dark:bg-gray-900"
>

    {{ $slot }}

    @vite('resources/js/app.js')
</body>
</html>
