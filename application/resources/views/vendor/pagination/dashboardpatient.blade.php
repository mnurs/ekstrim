@if ($paginator->hasPages())
<nav class="w-100">
    <ul class="pagination w-100">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <a href="#" class="page-btn previous bg-success pagin text-white"><i class="fas fa-arrow-left"></i>
            <span>{{ __('Previous') }}</span></a>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" class="page-btn pagin previous"><i class="fas fa-arrow-left"></i>
            <span>{{ __('Previous') }}</span></a>
        @endif
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="page-btn pagin next"><span>{{ __('Next') }}</span> <i class="fas fa-arrow-right"></i></a>
        @else
        <a href="javascript:void(0)" class="page-btn next bg-success text-white"><span>{{ __('Next') }}</span> <i class="fas fa-arrow-right"></i></a>
        @endif
    </ul>
</nav>
@endif
