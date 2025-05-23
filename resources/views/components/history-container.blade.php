@props(['id_history', 'date', 'name'])

<div class="w-full container flex flex-row items-center justify-between" style="padding: 12px 24px;">
    <div class="flex flex-row items-center justify-start gap-[24px]">
        <p class="date lato-regular">{{ $date }}</p>
        <h1 class="lato-bold">{{ $name }}</h1> 
    </div>
    <form action="{{ route('history.destroy', $id_history) }}" method="POST" onsubmit="return confirm('Apakah Anda ingin menghapus riwayat {{ e($name) }}?')">
        @csrf
        @method('DELETE')

        <button class="icon">
            <svg width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074zM10 10a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1z"/>
            </svg>
        </button>
    </form>
</div>