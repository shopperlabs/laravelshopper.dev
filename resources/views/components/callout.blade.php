@props(['title', 'color'])

<div {{ $attributes->merge(['class' => 'hint '. $color]) }}>
    <span class="hint-title">
        {{ $title }}
    </span>
    <div class="hint-content">
        {{ $slot }}
    </div>
</div>
