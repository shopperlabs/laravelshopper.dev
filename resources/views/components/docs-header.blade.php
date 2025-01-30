@props([
    'versions',
    'currentVersion',
    'currentSection',
])

<x-banner />

<header class="sticky top-0 backdrop-blur-xl z-50 border-b divide-y divide-gray-100 dark:divide-gray-800 border-gray-100 dark:border-gray-800 bg-white/95 dark:bg-gray-900/90">
    <div class="bg-gradient-to-r z-0 absolute h-full w-16 left-0 inset-y-0 dark:from-gray-800"></div>
    <div class="relative z-10 max-w-8xl mx-auto p-4 lg:px-6 flex flex-grow items-center justify-between">
        <div class="flex items-center flex-1">
            <div class="flex items-center">
                <a href="/docs" class="hidden lg:block">
                    <span class="sr-only">Laravel Shopper</span>
                    <x-brand class="h-6 lg:h-8" aria-hidden="true" />
                </a>
                <button @click="navIsOpen = true" type="button" class="inline-flex relative items-center text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400 lg:hidden">
                    <x-untitledui-flex-align-left
                        class="size-6"
                        stroke-width="1.5"
                        aria-hidden="true"
                    />
                </button>
            </div>
            <div class="flex items-center justify-center flex-1 lg:hidden">
                <a href="/docs">
                    <span class="sr-only">Laravel Shopper</span>
                    <x-brand.lg class="h-7 w-auto text-gray-800 dark:text-white" aria-hidden="true" />
                </a>
            </div>
            <nav class="ml-6 hidden items-center gap-2 lg:flex">
                <x-menu-item
                    href="/docs/{{ $currentVersion }}/extending"
                    :active="request()->routeIs('docs.extending')"
                >
                    Extending
                </x-menu-item>
                <x-menu-item href="https://www.youtube.com/@laravelshopper">Screencasts</x-menu-item>
                <x-menu-item href="https://github.com/shopperlabs/starter-kits">Starters kit</x-menu-item>
            </nav>
        </div>
        <div class="flex items-center gap-3">
            <x-select-version
                class="hidden lg:block"
                :versions="$versions"
                :current-section="$currentSection"
                :current-version="$currentVersion"
            />
            <div class="flex items-center space-x-2 rounded-lg p-1 ring-1 ring-gray-200/75 bg-white dark:ring-white/10 dark:bg-gray-900">
                <button type="button" onclick="toLightMode()" class="flex items-center justify-center select-none p-1.5 ring-1 ring-gray-900/5 text-amber-400 dark:text-gray-400 bg-gray-100 dark:bg-transparent rounded-md transition duration-200 dark:hover:ring-white/20">
                    <x-untitledui-sun class="size-4" aria-hidden="true" />
                </button>
                <button type="button" onclick="toDarkMode()" class="flex items-center justify-center select-none p-1.5 ring-1 ring-transparent text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-gray-200 rounded-md bg-white hover:bg-gray-50 hover:ring-gray-200/50 transition duration-200 dark:bg-gray-800 dark:hover:ring-white/20">
                    <x-untitledui-moon class="size-4" aria-hidden="true" />
                </button>
            </div>
            <div id="docsearch">
                <button type="button" class="inline-flex items-center rounded-lg text-gray-500 dark:text-gray-400 p-2 ring-1 ring-gray-200/75 bg-white dark:ring-white/10 dark:bg-gray-900 lg:hidden">
                    <x-untitledui-search-md class="size-5" aria-hidden="true" />
                </button>
                <button type="button" class="hidden w-52 items-center gap-2 text-sm leading-6 text-gray-400 rounded-lg bg-white ring-1 ring-gray-900/10 shadow-sm py-1.5 pl-3 pr-2 hover:ring-gray-300 dark:bg-gray-900 dark:ring-white/20 dark:hover:bg-gray-800 lg:inline-flex">
                    <x-untitledui-search-sm class="size-5" aria-hidden="true" />
                    Search
                    <span class="ml-auto inline-flex items-center px-2 bg-gray-50 text-gray-500 rounded-md text-[8px] font-semibold dark:bg-white/5 dark:text-gray-300">
                        Ctrl K
                    </span>
                </button>
            </div>
            <nav class="hidden lg:flex lg:items-center">
                <a href="https://github.com/shopperlabs/shopper" class="block text-sm leading-6 font-semibold text-gray-700 hover:text-gray-500 dark:hover:text-white dark:text-gray-300">
                    <span class="sr-only">GitHub</span>
                    <x-icons.github class="size-5" aria-hidden="true" />
                </a>
            </nav>
        </div>
    </div>
    <div class="bg-gradient-to-l z-0 absolute h-full w-16 right-0 inset-y-0 dark:from-gray-800"></div>
</header>
