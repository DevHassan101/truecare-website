@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'flex items-center mt-4 py-2 px-6 bg-blue-500 bg-opacity-50 text-gray-100 mx-3 rounded-lg'
                : 'flex items-center mt-4 py-2 px-6 text-gray-100';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $icon ?? '' }}
    <span class="mx-3">{{ $slot }}</span>
</a>
