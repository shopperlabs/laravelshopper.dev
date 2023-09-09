@props(['type', 'color'])

@php
    $cardClass = '';
    $typeClass = '';
    $textClass = '';
@endphp

@switch($color)
    @case('warning')
        @php
            $cardClass = 'ring-warning-200 bg-warning-50 dark:bg-warning-400/10 dark:ring-warning-400/20';
            $typeClass = 'bg-warning-700 ring-warning-700';
            $textClass = 'text-warning-800 dark:text-warning-500'
        @endphp
        @break
    @case('info')
        @php
            $cardClass = 'ring-sky-200 bg-sky-50';
            $typeClass = 'bg-sky-700 ring-sky-700';
            $textClass = 'text-sky-800'
        @endphp
        @break
    @case('primary')
        @php
            $cardClass = 'ring-primary-200 bg-primary-50';
            $typeClass = 'bg-primary-700 ring-primary-700';
            $textClass = 'text-primary-800'
        @endphp
        @break
    @case('gray')
        @php
            $cardClass = 'ring-gray-200 bg-gray-50';
            $typeClass = 'bg-gray-700 ring-gray-700';
            $textClass = 'text-gray-800'
        @endphp
        @break
    @case('danger')
        @php
            $cardClass = 'ring-red-200 bg-red-50';
            $typeClass = 'bg-red-700 ring-red-700';
            $textClass = 'text-red-800'
        @endphp
        @break
@endswitch

<blockquote>
    <div class="relative mb-10 p-6 rounded-lg ring-1 {{ $cardClass }}">
        <span class="inline-flex items-center absolute -left-2 -top-3 px-2.5 py-1 text-sm rounded text-white uppercase font-heading -rotate-6 ring-1 {{ $typeClass }}">
            {{ $type }}
        </span>
        <p class="{{ $textClass }} text-base leading-6">
            {{ $slot }}
        </p>
    </div>
</blockquote>
