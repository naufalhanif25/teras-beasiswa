<x-app-layout>
    <x-slot name="header">
        <h2 class="main-title lato-bold">
            {{ __('Riwayat') }}
        </h2>
    </x-slot>

    <main class="w-screen h-fit flex flex-col items-center justify-center pt-[42px]">
        <section class="w-screen flex flex-col items-center justify-center py-[32px] px-[160px] gap-[24px]">
            <div class="w-full">
                <h1 class="lato-bold" style="font-size: 16pt;">Riwayat</h1>
            </div>
            
            <div class="w-full h-fit flex flex-col items-center justify-center gap-[16px]">
                @forelse($histories as $history)
                    <x-history-container
                        date="{{ $history->tanggal }}"
                        name="{{ $history->query }}"
                        id_history="{{ $history->id_history }}"
                    >
                    </x-history-container>
                @empty
                    <div class="w-full p-4 text-center">
                        <p class="lato-regular opacity-[0.5]">Belum ada riwayat pencarian</p>
                    </div>
                @endforelse
            </div>
        </section>
    </main>
</x-app-layout>
