@props([
    'href' => '#',
    'active' => false,
])

<x-link :href="$href"
    @class([
        'group inline-flex items-center text-gray-700 font-medium rounded-md px-2 py-1 transition duration-300 ease-in-out',
        'dark:text-gray-300 dark:hover:bg-gray-800',
        'text-primary-900 bg-primary-50 dark:bg-primary-400/20 dark:text-primary-400 dark:ring-1 dark:ring-inset dark:ring-primary-400/30' => $active,
        'bg-transparent hover:bg-gray-50' => ! $active
    ])
>
    {{ $slot }}
</x-link>
