@props(['src', 'name', 'date', 'desc', 'manurl', 'srcurl'])

<div class="w-full container flex flex-row items-center justify-center gap-[24px]">
    <img src="{{ $src }}" alt="" class="cover-img w-[200px] h-[200px] object-cover">
    <div class="h-full flex-grow flex flex-col items-start justify-center gap-[8px]">
        <h1 class="title lato-bold">{{ $name }}</h1>
        <h2 class="date lato-regular">{{ $date }}</h2>
        <p class="lato-regular text-justify">{{ $desc }}</p>
        <div class="w-full flex flex-row gap-[12px] items-end justify-end">
            <x-link-button class="w-[100px] solid-button lato-regular" href="{{ $manurl }}" target="_blank" style="padding: 6px">
                {{ __('Panduan') }}
            </x-link-button>
            <x-link-button class="w-[100px] solid-button lato-regular" href="{{ $srcurl }}" target="_blank" style="padding: 6px">
                {{ __('Sumber') }}
            </x-link-button>
        </div>
    </div>
</div>