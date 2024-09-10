@props([
    'versions',
    'currentVersion',
    'currentSection',
])

<div {{ $attributes }}>
    <select
        name="version"
        aria-label="Shopper version"
        class="block w-full rounded-lg border-0 py-1.5 pl-3 pr-10 text-gray-900 dark:text-white dark:bg-gray-800 ring-1 ring-inset ring-gray-200 dark:ring-white/20 focus:ring-2 focus:ring-primary-600 sm:text-sm sm:leading-6 transition-colors duration-200 ease-in-out"
        @change="window.location = $event.target.value"
    >
        @foreach ($versions as $key => $display)
            <option {{ $currentVersion == $key ? 'selected' : '' }} value="{{ url('docs/'.$key.$currentSection) }}">
                {{ $display }}
            </option>
        @endforeach
    </select>
</div>
