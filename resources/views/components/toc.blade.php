@props(['headings'])

@php($previousLevel = 2)

<ul {{ $attributes }}>
    <li>
        @foreach ($headings as $item)
            @if (! $loop->first)
                @if ($item['level'] > $previousLevel)
                    <ul class="ml-4">
                        <li>
                            @endif

                            @if ($item['level'] < $previousLevel)
                        </li>
                    </ul>
                @endif

                @if ($item['level'] <= $previousLevel)
        </li>
        <li>
            @endif
            @endif

            <x-link href="#{{ $item['anchor'] }}"
               class="block whitespace-wrap py-1.5 hover:text-primary-500 transition duration-300 ease-out hover:translate-x-2"
               x-bind:class="current === '{{ $item['anchor'] }}' ? 'text-primary-500 font-medium translate-x-2' : 'text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-300 hover:translate-x-2'"
            >
                {{ $item['title'] }}
            </x-link>

            @if ($loop->last && $item['level'] === 3)
        </li>
    </ul>
    @endif

    @php($previousLevel = $item['level'])
    @endforeach
    </li>
</ul>
