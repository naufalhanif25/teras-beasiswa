@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-b-color h-full lato-regular flex flex-col items-center justify-center'
            : 'nav-b-color-none h-full lato-regular flex flex-col items-center justify-center';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
