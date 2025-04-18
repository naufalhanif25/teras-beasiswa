<x-app-layout>
    <x-slot name="header">
        <h2 class="main-title lato-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main class="w-screen h-fit flex flex-col items-center justify-center pt-[42px]">
        <!-- Recomendation section -->
        <section class="w-screen flex flex-col items-center justify-center py-[32px] px-[160px] gap-[24px]">
            <div class="w-full">
                <h1 class="lato-bold" style="font-size: 16pt;">Riwayat</h1>
            </div>
            <div class="w-full h-fit flex flex-col items-center justify-center gap-[16px]">
                <x-history-container
                    date="18 April 2025"
                    name="Beasiswa prestasi"
                >
                </x-history-container>
                <x-history-container
                    date="18 April 2025"
                    name="Beasiswa prestasi"
                >
                </x-history-container>
                <x-history-container
                    date="18 April 2025"
                    name="Beasiswa prestasi"
                >
                </x-history-container>
                <x-history-container
                    date="18 April 2025"
                    name="Beasiswa prestasi"
                >
                </x-history-container>
                <x-history-container
                    date="18 April 2025"
                    name="Beasiswa prestasi"
                >
                </x-history-container>
            </div>
        </section>
    </main>
</x-app-layout>
