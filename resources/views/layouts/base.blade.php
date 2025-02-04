@props([
    'title' => config('app.name'),
    'currentVersion' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <!-- Favicon -->
    @include('partials.favicon')
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title>
        {{ $title ? $title . ' - ' : null }}
        {{ isset($currentVersion) ? $currentVersion . ' - ' : null }}
        The TALL Stack E-commerce Framework
    </title>

    @isset($canonical)
        <link rel="canonical" href="{{ url($canonical) }}">
    @endisset

    <meta name="title" content="Laravel Shopper - The E-commerce TALL Stack Framework">
    <meta name="description" content="Shopper is a Headless e-commerce administration built with Laravel for Laravel Developers to create & manage online store.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://laravelshopper.dev/">
    <meta property="og:title" content="Laravel Shopper - The E-commerce TALL Stack Framework">
    <meta property="og:description" content="Shopper is a Headless e-commerce administration built with Laravel for Laravel Developers to create & manage online store.">
    <meta property="og:image" content="https://laravelshopper.dev/img/socialcard.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://laravelshopper.dev/">
    <meta property="twitter:title" content="Laravel Shopper - The E-commerce TALL Stack Framework">
    <meta property="twitter:description" content="Shopper is a Headless e-commerce administration built with Laravel for Laravel Developers to create & manage online store.">
    <meta property="twitter:image" content="https://laravelshopper.dev/img/socialcard.png">

    @livewireStyles
    @vite([
       'resources/css/app.css',
       'resources/js/app.js',
       ...request()->is('docs/*') ? ['resources/js/docs.js'] : [],
   ])

    @production
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-NNZ07903B6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-NNZ07903B6');
        </script>
    @endproduction

    @include('partials.theme')
</head>
<body
    x-data="{ navIsOpen: false }"
    {{ $attributes->twMerge(['min-h-screen font-sans antialiased language-php selection:bg-primary-100/70 dark:selection:bg-white/10 dark:bg-gray-900']) }}
>

    {{ $slot }}

    @livewireScriptConfig

    <script>
        var algolia_app_id = '{{ config('algolia.connections.main.id', false) }}';
        var algolia_search_key = '{{ config('algolia.connections.main.search_key', false) }}';
        var version = '{{ $currentVersion ?? DEFAULT_VERSION }}';
    </script>
</body>
</html>
