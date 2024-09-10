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
    <meta property="og:image" content="https://laravelshopper.dev/img/og-image.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://laravelshopper.dev/">
    <meta property="twitter:title" content="Laravel Shopper - The E-commerce TALL Stack Framework">
    <meta property="twitter:description" content="Shopper is a Headless e-commerce administration built with Laravel for Laravel Developers to create & manage online store.">
    <meta property="twitter:image" content="https://laravelshopper.dev/img/og-image.jpg">

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @production
        <!-- Fathom - beautiful, simple website analytics -->
        <script src="https://cdn.usefathom.com/script.js" data-site="DVMEKBYF" defer></script>
        <!-- / Fathom -->
    @endproduction

    @include('partials.theme')
</head>
<body x-data="{ navIsOpen: false }"
      {{ $attributes->twMerge(['min-h-screen font-sans antialiased language-php selection:bg-primary-100/70 dark:selection:bg-white/10 dark:bg-gray-900']) }}
>

    {{ $slot }}

    @livewireScriptConfig
</body>
</html>