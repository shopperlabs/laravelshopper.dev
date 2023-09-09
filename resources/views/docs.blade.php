<x-layout.base :title="$title" :current-version="$currentVersion">
    <x-docs-header
        :current-version="$currentVersion"
        :versions="$versions"
        :current-section="$currentSection"
    />

    <div class="relative isolate">
        <svg class="absolute inset-0 opacity-75 -z-10 h-[10%] dark:hidden w-full stroke-gray-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
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
        <svg class="absolute inset-0 -z-10 h-[10%] opacity-60 w-full hidden dark:block stroke-white/10 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
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

        <main class="mx-auto flex w-full max-w-8xl flex-auto justify-center sm:px-4 lg:px-6" id="documentation">
            <div class="hidden lg:relative lg:block lg:flex-none main-sidebar">
                <div class="absolute inset-y-0 right-0 w-[50vw] bg-primary-50/50 dark:bg-gray-950"></div>
                <div class="sticky top-[4.75rem] -ml-0.5 h-[calc(100vh-4.75rem)] w-64 overflow-y-auto overflow-x-hidden py-16 pl-0.5 pr-8 lg:w-72 lg:pr-16">
                    <nav class="sidebar" id="indexed-nav">
                        {!! $index !!}
                    </nav>
                </div>
            </div>

            <div class="min-w-0 max-w-2xl flex-auto px-4 py-12 lg:max-w-none lg:py-20 lg:pl-8 lg:pr-0 xl:px-10">
                <section class="docs_main max-w-prose lg:max-w-none">
                    @unless ($currentVersion === 'main' || version_compare($currentVersion, DEFAULT_VERSION) >= 0)
                        <x-callout color="warning">
                            <x-slot:type>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                                Warning
                            </x-slot:type>

                            You're browsing the documentation for an old version of Laravel Shopper.
                            Consider upgrading your project to <a href="{{ route('docs.version', DEFAULT_VERSION) }}" class="underline font-heading font-medium">Laravel Shopper {{ DEFAULT_VERSION }}</a>.
                        </x-callout>
                    @endunless

                    @if ($currentVersion === 'main' || version_compare($currentVersion, DEFAULT_VERSION) > 0)
                        <x-callout color="warning">
                            <x-slot:type>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                                Warning
                            </x-slot:type>

                            You're browsing the documentation for an upcoming version of Laravel Shopper.
                            The documentation and features of this release are subject to change.
                        </x-callout>
                    @endif

                    <x-accessibility.main>
                        {!! $content !!}
                    </x-accessibility.main>
                </section>
            </div>

            <aside class="hidden lg:sticky lg:top-[4.75rem] lg:-mr-6 lg:block lg:h-[calc(100vh-4.75rem)] lg:flex-none overflow-hidden lg:overflow-y-auto lg:py-16 xl:pt-20">
                <nav aria-labelledby="on-this-page-title" class="w-56" id="table-of-contents">
                    @if($headings->isNotEmpty())
                        <h4 class="text-gray-900 font-semibold mb-4 text-sm leading-6 dark:text-white">On this page</h4>
                        <div
                            x-data="tableOfContents({{ json_encode($headings->toArray(), true) }})"
                            x-on:scroll.window="updateCurrentSection"
                        >
                            <x-toc class="mt-4 text-sm leading-6 table-of-content" :headings="$headings" />
                        </div>
                    @endif
                </nav>
            </aside>
        </main>
    </div>

</x-layout.base>
