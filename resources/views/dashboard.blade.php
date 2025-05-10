<x-app-layout>
    <x-slot name="header">
        <h2 class="main-title lato-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main class="w-screen h-fit flex flex-col items-center justify-center">
        <!-- Cover image -->
        <div class="w-screen h-[360px] flex items-center justify-center overflow-hidden">
            <img class="opacity-[0.5] w-full" src="{{ asset('img/illustration_fit.jpg') }}">
            <div class="absolute z-1 flex flex-row items-center justify-center gap-[12px] w-screen px-[200px]">
                <form action="{{ route('dashboard') }}" method="GET" class="w-full flex flex-row items-center justify-center gap-[12px]">
                    <x-text-input class="w-full lato-regular"
                                type="text"
                                name="keyword"
                                placeholder="Cari beasiswa"
                                value="{{ request('keyword') }}"
                    ></x-text-input>

                    <x-primary-button class="w-[100px] solid-button lato-regular">
                        {{ __('Cari') }}
                    </x-primary-button>
                </form>
            </div>
        </div>

        <!-- Recomendation section -->
        <section class="w-screen flex flex-col items-center justify-center py-[32px] px-[160px] gap-[24px]">
            <div class="w-full">
                <h1 class="lato-bold" style="font-size: 16pt;">Rekomendasi</h1>
            </div>
            
            <div class="w-full h-fit flex flex-col items-center justify-center gap-[16px]">
                @if(isset($beasiswa) && count($beasiswa) > 0)
                    @foreach($beasiswa as $item)
                        <x-scholar-rec 
                            src="{{ $item->cover ? asset($item->cover) : asset('https://t3.ftcdn.net/jpg/05/79/68/24/360_F_579682465_CBq4AWAFmFT1otwioF5X327rCjkVICyH.jpg') }}"
                            name="{{ $item->nama_beasiswa }}"
                            date="{{ $item->tanggal_buka }} - {{ $item->tanggal_tutup }}"
                            desc="{{ $item->deskripsi }}"
                            manurl="{{ $item->url_panduan }}"
                            srcurl="{{ $item->url_sumber }}"
                        >
                        </x-scholar-rec>
                    @endforeach
                @else
                    <div class="w-full p-4 text-center">
                        <p class="lato-regular">Tidak ada beasiswa yang ditemukan</p>
                    </div>
                @endif
            </div>
            
            @if(isset($beasiswa) && method_exists($beasiswa, 'links'))
                <div class="flex flex-row items-center justify-center gap-[16px]">
                    {{ $beasiswa->appends(request()->except('page'))->links('pagination.simple') }}
                </div>
            @endif
        </section>
    </main>
</x-app-layout>