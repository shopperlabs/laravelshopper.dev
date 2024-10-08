<x-layout.base :title="$title" :current-version="$currentVersion" class="bg-primary-50/30">
    <x-docs-header
        :current-version="$currentVersion"
        :versions="$versions"
        :current-section="$currentSection"
    />

    <x-sidebar
        :navigation="$index"
        :current-version="$currentVersion"
        :versions="$versions"
        :current-section="$currentSection"
    />

    <main class="relative isolate" role="main">
        <svg class="absolute inset-0 opacity-30 -z-10 h-[10%] dark:hidden w-full stroke-gray-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
            <defs>
                <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                    <path d="M100 200V.5M.5 .5H200" fill="none" />
                </pattern>
            </defs>
            <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                <path d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z" stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)" />
        </svg>
        <svg class="absolute inset-0 -z-10 h-[10%] opacity-30 w-full hidden dark:block stroke-white/10 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
            <defs>
                <pattern id="983e3e4c-de6d-4c3f-8d64-b9761d1534cc" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                    <path d="M.5 200V.5H200" fill="none" />
                </pattern>
            </defs>
            <svg x="50%" y="-1" class="overflow-visible fill-gray-800/20">
                <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z" stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#983e3e4c-de6d-4c3f-8d64-b9761d1534cc)" />
        </svg>

        <div class="max-w-8xl w-full mx-auto px-6 flex flex-wrap justify-between gap-10" id="documentation">
            <div class="hidden lg:relative lg:block lg:flex-none main-sidebar">
                <div class="absolute inset-y-0 right-0 w-[50vw]"></div>
                <div class="hidden sticky top-[4.75rem] -ml-0.5 h-[calc(100vh-4.75rem)] overflow-y-auto overflow-x-hidden py-16 pl-0.5 lg:block lg:w-60 lg:pr-6">
                    <nav class="sidebar" id="indexed-nav">
                        {!! $index !!}
                    </nav>
                </div>
            </div>

            <section class="py-12 docsearch-content flex-1 mx-auto max-w-[70ch] w-full">
                @unless ($currentVersion === 'main' || version_compare($currentVersion, DEFAULT_VERSION) >= 0)
                    <x-callout title="Warning" color="warning" class="mt-0">
                        You're browsing the documentation for an old version of Laravel Shopper.
                        Consider upgrading your project to <a href="{{ route('docs.version', DEFAULT_VERSION) }}" class="underline font-medium">Laravel Shopper {{ DEFAULT_VERSION }}</a>.
                    </x-callout>
                @endunless

                @if ($currentVersion === 'main' || version_compare($currentVersion, DEFAULT_VERSION) > 0)
                    <x-callout title="Warning" color="warning" class="mt-0">
                        You're browsing the documentation for an upcoming version of <strong>Laravel Shopper</strong>.
                        The documentation and features of this release are subject to change.
                    </x-callout>
                @endif

                <x-accessibility.main>
                    {!! $content !!}
                </x-accessibility.main>

                <div class="relative gap-4 mt-16 pt-10 border-t border-gray-200 text-gray-500 dark:border-gray-700 dark:text-gray-400 sm:flex sm:items-center sm:justify-between">
                    <div class="text-sm">© {{ date('Y') }} Shopper Labs</div>
                    @if($currentSection)
                        <a class="inline-flex items-center gap-2 text-sm hover:text-gray-900 dark:hover:text-white"
                           href="https://github.com/shopperlabs/shopper/blob/{{ $currentVersion }}/packages/admin/docs/content{{ $currentSection }}.md"
                           target="_blank"
                        >
                            <x-icons.github class="size-4" aria-hidden="true" />
                            <span>Edit this page on GitHub</span>
                        </a>
                    @endif
                </div>
            </section>

            <aside class="hidden lg:sticky lg:top-[4.75rem] lg:-mr-6 lg:block lg:h-[calc(100vh-4.75rem)] lg:flex-none overflow-hidden lg:overflow-y-auto lg:py-16 xl:pt-20">
                <nav aria-labelledby="on-this-page-title" class="w-56" id="table-of-contents">
                    @if($headings->isNotEmpty())
                        <h4 class="text-gray-900 font-semibold text-sm leading-6 dark:text-white">On this page</h4>
                        <div
                            x-data="tableOfContents({{ json_encode($headings->toArray(), true) }})"
                            x-on:scroll.window="updateCurrentSection"
                        >
                            <x-toc class="mt-4 text-sm leading-6 table-of-content" :headings="$headings" />
                        </div>
                    @endif
                </nav>
            </aside>
        </div>
    </main>

</x-layout.base>
