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
                                <x-select-version
                                    :versions="$versions"
                                    :current-section="$currentSection"
                                    :current-version="$currentVersion"
                                />
                                <button @click="navIsOpen = false" type="button" class="relative inline-flex items-center ml-4 p-1 rounded-lg bg-white ring-1 ring-gray-200 dark:ring-white/10 dark:hover:ring-white/20 dark:bg-transparent text-gray-400 dark:text-gray-500 dark:hover:text-gray-300 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition duration-200 ease-in">
                                    <span class="absolute -inset-2.5"></span>
                                    <span class="sr-only">Close panel</span>
                                    <x-untitledui-x class="size-5" stroke-width="1.5" aria-hidden="true" />
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
