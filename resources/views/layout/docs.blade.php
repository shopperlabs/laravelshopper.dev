@props([
    'title',
    'versions',
    'currentVersion',
    'currentSection',
    'canonical',
    'index'
])

<x-layout.base :title="$title">
    <header class="sticky top-0 backdrop-blur-xl lg:z-50 border-b divide-y divide-gray-100 border-gray-100 bg-white/50">
        <div class="py-4">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 flex flex-grow items-center justify-between">
                <div class="flex items-center divide-x divide-gray-200">
                    <a href="/" class="pr-4">
                        <span class="sr-only">Laravel Shopper</span>
                        <x-brand class="h-8" />
                    </a>
                    <a href="/docs" class="pl-4 font-medium hover:text-primary-500 text-lg transition-colors">
                        Documentation
                    </a>
                </div>
                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-3 rounded-lg p-1 ring-1 ring-gray-200/75 bg-white">
                        <button type="button" class="flex items-center justify-center select-none p-1.5 ring-1 ring-gray-900/5 text-gray-700 bg-gray-100 rounded-md transition duration-200">
                            <x-untitledui-sun class="h-4 w-4 text-amber-400" />
                        </button>
                        <button type="button" class="flex items-center justify-center select-none p-1.5 ring-1 ring-transparent text-gray-500 hover:text-gray-700 rounded-md bg-white hover:bg-gray-50 hover:ring-gray-200/50 transition duration-200">
                            <x-untitledui-moon class="h-4 w-4" />
                        </button>
                        <button type="button" class="flex items-center justify-center select-none p-1.5 ring-1 ring-transparent text-gray-500 hover:text-gray-700 rounded-md bg-white hover:bg-gray-50 hover:ring-gray-200/50 transition duration-200">
                            <x-untitledui-monitor-02 class="h-4 w-4" />
                        </button>
                    </div>
                    <nav class="hidden lg:flex lg:items-center sm:ml-6">
                        <ul class="flex space-x-6 text-sm leading-6 font-semibold text-gray-700">
                            <li>
                                <a href="{{ route('twitter') }}" class="block hover:text-gray-500">
                                    <span class="sr-only">Twitter</span>
                                    <x-icons.twitter class="h-5 w-5" />
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('github') }}" class="block hover:text-gray-500">
                                    <span class="sr-only">GitHub</span>
                                    <x-icons.github class="h-5 w-5" />
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('discord') }}" class="block hover:text-gray-500">
                                    <span class="sr-only">Discord</span>
                                    <x-icons.discord class="h-5 w-5" />
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="py-2">
            <div class="max-w-8xl mx-auto px-4 py-3 sm:px-6 flex items-center justify-between">
                <div class="flex items-center divide-x divide-gray-200">
                    <div class="pr-4">
                        <select
                            name="version"
                            aria-label="Shopper version"
                            class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            @change="window.location = $event.target.value"
                        >
                            @foreach ($versions as $key => $display)
                                <option {{ $currentVersion == $key ? 'selected' : '' }} value="{{ url('docs/'.$key.$currentSection) }}">Version {{ $display }}</option>
                            @endforeach
                        </select>
                    </div>
                    <ul class="pl-4">
                        <li>Bonjour</li>
                    </ul>
                </div>
                <div></div>
            </div>
        </div>
    </header>

    <main class="relative">
        {{ $slot }}
    </main>
</x-layout.base>
