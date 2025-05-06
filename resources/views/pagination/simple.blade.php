@if ($paginator->hasPages())
    <div class="flex flex-row items-center justify-center gap-[16px]">
        @if ($paginator->onFirstPage())
            <x-pagination-button class="pagination-button opacity-50" disabled>&lt;</x-pagination-button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">
                <x-pagination-button class="pagination-button">&lt;</x-pagination-button>
            </a>
        @endif
        
        <p class="lato-regular">Halaman {{ $paginator->currentPage() }} dari {{ $paginator->lastPage() }}</p>
        
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">
                <x-pagination-button class="pagination-button">&gt;</x-pagination-button>
            </a>
        @else
            <x-pagination-button class="pagination-button opacity-50" disabled>&gt;</x-pagination-button>
        @endif
    </div>
@endif