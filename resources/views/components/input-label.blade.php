@props(['value'])

<label {{ $attributes->merge(['class' => 'lato-regular']) }}>
    {{ $value ?? $slot }}
</label>
