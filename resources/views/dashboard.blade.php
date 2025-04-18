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
                <x-text-input class="w-full lato-regular"
                            type="text"
                            name="keyword"
                            placeholder="Cari beasiswa"
                            required
                ></x-text-input>

                <x-primary-button class="w-[100px] solid-button lato-regular">
                    {{ __('Cari') }}
                </x-primary-button>
            </div>
        </div>

        <!-- Recomendation section -->
        <section class="w-screen flex flex-col items-center justify-center py-[32px] px-[160px] gap-[24px]">
            <div class="w-full">
                <h1 class="lato-bold" style="font-size: 16pt;">Rekomendasi</h1>
            </div>
            <div class="w-full h-fit flex flex-col items-center justify-center gap-[16px]">
                <!-- TODO: Rekomendasi beasiswa -->
                <x-scholar-rec 
                    src="img/illustration.jpg"
                    name="Nama beasiswa"
                    date="18 April 2025 - 8 Mei 2025"
                    desc="Deskripsi beasiswa disini. ini adalah deskripsi beasiswa, diisi dengan variabel yang datanya diambil dari database (tabel beasiwa)."
                    manurl="https://github.com/naufalhanif25"
                    srcurl="https://github.com/naufalhanif25"
                >
                </x-scholar-rec>
                <x-scholar-rec 
                    src="img/illustration.jpg"
                    name="Nama beasiswa"
                    date="18 April 2025 - 8 Mei 2025"
                    desc="Deskripsi beasiswa disini. ini adalah deskripsi beasiswa, diisi dengan variabel yang datanya diambil dari database (tabel beasiwa)."
                    manurl="https://github.com/naufalhanif25"
                    srcurl="https://github.com/naufalhanif25"
                >
                </x-scholar-rec>
                <x-scholar-rec 
                    src="img/illustration.jpg"
                    name="Nama beasiswa"
                    date="18 April 2025 - 8 Mei 2025"
                    desc="Deskripsi beasiswa disini. ini adalah deskripsi beasiswa, diisi dengan variabel yang datanya diambil dari database (tabel beasiwa)."
                    manurl="https://github.com/naufalhanif25"
                    srcurl="https://github.com/naufalhanif25"
                >
                </x-scholar-rec>
            </div>
            <div class="flex flex-row items-center justify-center gap-[16px]">
                <x-pagination-button class="pagination-button">&lt;</x-pagination-button>
                <p class="lato-regular">Halaman 1 dari 100</p>
                <x-pagination-button class="pagination-button">&gt;</x-pagination-button>
            </div>
        </section>
    </main>
</x-app-layout>
