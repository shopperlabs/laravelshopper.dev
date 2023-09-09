@props([
    'navigation',
    'versions',
    'currentVersion',
    'currentSection'
])

<div @keydown.window.escape="navIsOpen = false"
     x-show="navIsOpen"
     x-ref="dialog"
     x-cloak
     aria-modal="true"
     class="relative z-50"
>
    <div x-show="navIsOpen"
         x-transition:enter="ease-in-out duration-500"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in-out duration-500"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-900 bg-opacity-30 transition-opacity backdrop-blur-sm"
    ></div>

    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                <div x-show="navIsOpen"
                     x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:enter-start="translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="translate-x-full"
                     class="pointer-events-auto w-screen max-w-xs"
                     @click.away="navIsOpen = false"
                >
                    <div class="flex h-full flex-col overflow-y-scroll bg-white dark:bg-gray-800 py-6 shadow-xl">
                        <div class="px-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <a href="/" class="pr-4">
                                        <span class="sr-only">Laravel Shopper</span>
                                        <x-brand class="h-6 lg:h-8" />
                                    </a>
                                    <div class="pl-4 border-l border-gray-200 dark:border-gray-700">
                                        <select
                                            name="version"
                                            id="version"
                                            aria-label="Shopper version"
                                            class="block w-full rounded-lg border-0 py-1.5 pl-3 pr-10 text-gray-900 dark:text-white dark:bg-gray-800 ring-1 ring-inset ring-gray-200 dark:ring-white/20 focus:ring-2 focus:ring-primary-600 sm:text-sm sm:leading-6 transition-colors duration-200 ease-in-out"
                                            @change="window.location = $event.target.value"
                                        >
                                            @foreach ($versions as $key => $display)
                                                <option {{ $currentVersion == $key ? 'selected' : '' }} value="{{ url('docs/'.$key.$currentSection) }}">Version {{ $display }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button @click="navIsOpen = false" type="button" class="relative inline-flex items-center ml-4 p-1 rounded-md bg-white ring-1 ring-gray-200 dark:ring-white/10 dark:hover:ring-white/20 dark:bg-transparent text-gray-400 dark:text-gray-500 dark:hover:text-gray-300 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition duration-200 ease-in">
                                    <span class="absolute -inset-2.5"></span>
                                    <span class="sr-only">Close panel</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="relative mt-6 flex-1 px-4 sm:px-6">
                            <nav class="sidebar" id="indexed-nav-mobile">
                                {!! $navigation !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
