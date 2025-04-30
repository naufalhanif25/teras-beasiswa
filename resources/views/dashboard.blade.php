<x-app-layout>
    <x-slot name="header">
        <h2 class="main-title lato-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main class="w-screen h-fit flex flex-col items-center justify-center">
        <!-- Cover image -->
        <div class="w-screen h-[360px] flex items-center justify-center overflow-hidden">
            <img class="opacity-[0.5] w-full" src="img/illustration_fit.jpg">
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
                @forelse($beasiswa as $item)
                    <x-scholar-rec 
                        src="{{ $item->cover ? asset($item->cover) : 'img/illustration.jpg' }}"
                        name="{{ $item->nama_beasiswa }}"
                        date="{{ $item->tanggal_buka }} - {{ $item->tanggal_tutup }}"
                        desc="{{ $item->deskripsi }}"
                        manurl="{{ $item->url_panduan }}"
                        srcurl="{{ $item->url_sumber }}"
                    >
                    </x-scholar-rec>
                @empty
                    <div class="w-full p-4 text-center">
                        <p class="lato-regular">Tidak ada beasiswa yang ditemukan</p>
                    </div>
                @endforelse
            </div>
            <div class="flex flex-row items-center justify-center gap-[16px]">
                @if($beasiswa->previousPageUrl())
                    <a href="{{ $beasiswa->previousPageUrl() }}">
                        <x-pagination-button class="pagination-button">&lt;</x-pagination-button>
                    </a>
                @else
                    <x-pagination-button class="pagination-button opacity-50" disabled>&lt;</x-pagination-button>
                @endif
                
                <p class="lato-regular">Halaman {{ $beasiswa->currentPage() }} dari {{ $beasiswa->lastPage() }}</p>
                
                @if($beasiswa->nextPageUrl())
                    <a href="{{ $beasiswa->nextPageUrl() }}">
                        <x-pagination-button class="pagination-button">&gt;</x-pagination-button>
                    </a>
                @else
                    <x-pagination-button class="pagination-button opacity-50" disabled>&gt;</x-pagination-button>
                @endif
            </div>
        </section>
    </main>
</x-app-layout>