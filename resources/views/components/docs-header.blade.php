@props(['versions', 'currentVersion', 'currentSection'])

<header class="sticky top-0 backdrop-blur-xl z-50 border-b divide-y divide-gray-100 dark:divide-gray-800 border-gray-100 dark:border-gray-800 bg-white/95 dark:bg-gray-900/90">
    <div class="py-4">
        <div class="max-w-8xl mx-auto px-4 lg:px-6 flex flex-grow items-center justify-between">
            <div class="flex items-center divide-x divide-gray-200 dark:divide-gray-700">
                <a href="/" class="pr-4">
                    <span class="sr-only">Laravel Shopper</span>
                    <x-brand class="h-6 lg:h-8" />
                </a>
                <a href="/docs" class="pl-4 hover:text-primary-500 dark:text-gray-300 dark:hover:text-primary-600 lg:text-lg transition-colors font-heading">
                    Documentation
                </a>
            </div>
            <div class="flex items-center space-x-3 lg:space-x-6">
                <div class="flex items-center space-x-3 rounded-lg p-1 ring-1 ring-gray-200/75 bg-white dark:ring-white/10 dark:bg-gray-900">
                    <button type="button" onclick="toLightMode()" class="flex items-center justify-center select-none p-1.5 ring-1 ring-gray-900/5 text-amber-400 dark:text-gray-400 bg-gray-100 dark:bg-transparent rounded-md transition duration-200 dark:hover:ring-white/20">
                        <x-untitledui-sun class="h-4 w-4" />
                    </button>
                    <button type="button" onclick="toDarkMode()" class="flex items-center justify-center select-none p-1.5 ring-1 ring-transparent text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-gray-200 rounded-md bg-white hover:bg-gray-50 hover:ring-gray-200/50 transition duration-200 dark:bg-gray-800 dark:hover:ring-white/20">
                        <x-untitledui-moon class="h-4 w-4" />
                    </button>
                    <button type="button" onclick="toSystemMode()" class="flex items-center justify-center select-none p-1.5 ring-1 ring-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 rounded-md bg-white hover:bg-gray-50 hover:ring-gray-200/50 transition duration-200 dark:bg-transparent dark:hover:ring-white/20">
                        <x-untitledui-monitor-02 class="h-4 w-4" />
                    </button>
                </div>
                <button type="button" class="lg:hidden inline-flex items-center rounded-lg text-gray-500 dark:text-gray-400 p-2 ring-1 ring-gray-200/75 bg-white dark:ring-white/10 dark:bg-gray-900">
                    <x-untitledui-search-md class="h-5 w-5" />
                </button>
                <nav class="hidden lg:flex lg:items-center sm:ml-6">
                    <ul class="flex space-x-6 text-sm leading-6 font-semibold text-gray-700 dark:text-gray-300">
                        <li>
                            <a href="{{ route('twitter') }}" class="block hover:text-gray-500 dark:hover:text-white">
                                <span class="sr-only">Twitter</span>
                                <x-icons.twitter class="h-5 w-5" />
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('github') }}" class="block hover:text-gray-500 dark:hover:text-white">
                                <span class="sr-only">GitHub</span>
                                <x-icons.github class="h-5 w-5" />
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('discord') }}" class="block hover:text-gray-500 dark:hover:text-white">
                                <span class="sr-only">Discord</span>
                                <x-icons.discord class="h-5 w-5" />
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="relative py-2.5">
        <div class="max-w-8xl mx-auto lg:px-6 flex items-center justify-between">
            <div class="flex items-center flex-1 overflow-hidden">
                <div class="hidden lg:block pr-4">
                    <select
                        name="version"
                        aria-label="Shopper version"
                        class="block w-full rounded-lg border-0 py-1.5 pl-3 pr-10 text-gray-900 dark:text-white dark:bg-gray-800 ring-1 ring-inset ring-gray-200 dark:ring-white/20 focus:ring-2 focus:ring-primary-600 sm:text-sm sm:leading-6 transition-colors duration-200 ease-in-out"
                        @change="window.location = $event.target.value"
                    >
                        @foreach ($versions as $key => $display)
                            <option {{ $currentVersion == $key ? 'selected' : '' }} value="{{ url('docs/'.$key.$currentSection) }}">Version {{ $display }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="lg:hidden px-4">
                    <div class="bg-gradient-to-r dark:from-gray-800 absolute h-full w-16 left-0 inset-y-0"></div>
                    <button @click="navIsOpen = true" type="button" class="relative inline-flex items-center text-gray-500 dark:text-gray-400">
                        <x-untitledui-menu-02 class="h-6 w-6" />
                    </button>
                </div>
                <div
                    x-data="{
                        displayLeftArrow: false,
                        displayRightArrow: false,
                        element: document.getElementById('menu-tabs'),
                        currentTab: document.getElementById('menu-tabs').querySelector('.current'),

                        slideLeft() {
                            this.element.scrollLeft -= 20
                            this.onScroll()
                        },
                        slideRight() {
                            this.element.scrollLeft += 20
                            this.onScroll()
                        },
                        onScroll() {
                            this.displayLeftArrow = this.element.scrollLeft >= 10
                            let maxScrollPosition = this.element.scrollWidth - this.element.clientWidth - 10
                            this.displayRightArrow = this.element.scrollLeft <= maxScrollPosition
                        },
                        scrollToActive() {
                            if (this.currentTab) {
                                this.element.scrollLeft = this.currentTab.offsetLeft - 150
                            }
                       }
                    }"
                    x-init="scrollToActive()"
                    class="pr-4 border-l border-gray-200 dark:border-gray-700 overflow-x-auto"
                >
                    <div x-cloak x-show="displayLeftArrow"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 -translate-x-2"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 translate-x-0"
                         x-transition:leave-end="opacity-0 -translate-x-2"
                         class="flex items-center absolute h-full w-16 top-0 px-1.5 bg-gradient-to-r from-white dark:from-gray-900 sm:hidden"
                    >
                        <button @click="slideLeft()" type="button" class="flex items-center justify-center text-gray-400 w-8 h-8 focus:outline-none rounded-full dark:text-gray-500 hover:bg-gray-50 dark:bg-gray-800 transition duration-300 ease-in-out">
                            <x-untitledui-chevron-left class="w-6 h-6" />
                        </button>
                    </div>
                    <ul @scroll="onScroll()" class="px-6 flex items-center space-x-3 hide-scroll overflow-x-auto scroll-smooth" aria-label="Tabs" id="menu-tabs">
                        <li @class(['current' => request()->routeIs('docs.version')])>
                            <x-menu-item href="/docs" :active="request()->routeIs('docs.version')">
                                <x-untitledui-code
                                    @class([
                                        'h-4 w-4 mr-2.5 text-gray-400 dark:text-gray-500',
                                        'text-primary-700 dark:text-primary-500' => request()->routeIs('docs.version'),
                                    ])
                                />
                                Docs
                            </x-menu-item>
                        </li>
                        <li>
                            <x-menu-item :href="route('youtube')">
                                <x-untitledui-video-recorder class="h-4 w-4 mr-2.5 text-gray-400 dark:text-gray-500" />
                                Screencasts
                            </x-menu-item>
                        </li>
                        <li @class(['current' => request()->routeIs('docs.extending')])>
                            <x-menu-item href="/docs/{{ $currentVersion }}/extending" :active="request()->routeIs('docs.extending')">
                                <x-untitledui-maximize
                                    @class([
                                        'h-4 w-4 mr-2.5 text-gray-400 dark:text-gray-500',
                                        'text-primary-700 dark:text-primary-500' => request()->routeIs('docs.extending')
                                    ])
                                />
                                Extending
                            </x-menu-item>
                        </li>
                        <li>
                            <x-menu-item href="/themes">
                                <x-untitledui-palette class="h-4 w-4 mr-2.5 text-gray-400 dark:text-gray-500" />
                                Themes
                            </x-menu-item>
                        </li>
                        <li>
                            <x-menu-item href="/community">
                                <x-untitledui-rss class="h-4 w-4 mr-2.5 text-gray-400 dark:text-gray-500" />
                                Community
                            </x-menu-item>
                        </li>
                    </ul>
                    <div x-show="displayRightArrow"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-x-2"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 translate-x-0"
                         x-transition:leave-end="opacity-0 translate-x-2"
                         class="flex items-center justify-end absolute h-full w-16 top-0 right-0 px-1.5 bg-gradient-to-l from-white dark:from-gray-900 sm:hidden"
                    >
                        <button @click="slideRight()" type="button" class="flex items-center justify-center w-8 h-8 focus:outline-none rounded-full text-gray-400 dark:text-gray-500 hover:bg-gray-50 dark:bg-gray-800 transition duration-300 ease-in-out">
                            <x-untitledui-chevron-right class="w-6 h-6" />
                        </button>
                    </div>
                </div>
            </div>
            <div class="ml-4 hidden lg:block" id="docsearch">
                <div class="bg-white dark:bg-gray-900 relative pointer-events-auto">
                    <button type="button" class="w-64 flex items-center text-sm leading-6 text-gray-400 rounded-md ring-1 ring-gray-900/10 shadow-sm py-1.5 pl-2 pr-3 hover:ring-gray-300 dark:bg-gray-800 dark:highlight-white/5 dark:hover:bg-gray-700">
                        <svg width="24" height="24" fill="none" aria-hidden="true" class="mr-3 flex-none">
                            <path d="m19 19-3.5-3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Search
                        <span class="ml-auto pl-3 flex-none text-xs font-semibold">Ctrl K</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
