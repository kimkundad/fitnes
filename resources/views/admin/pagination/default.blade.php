



@if ($paginator->hasPages())
<nav class="pagination-rounded" aria-label="Page navigation example">
    <ul class="pagination pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span>«</span></li>
        @else
            <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Previous" rel="prev"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
        @endif

        @if($paginator->currentPage() > 3)
            <li class="page-item hidden-xs"><a href="{{ $paginator->url(1) }}" class="page-link">1</a></li>
        @endif
        @if($paginator->currentPage() > 4)
            <li class="page-item"><span>...</span></li>
        @endif
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                @if ($i == $paginator->currentPage())
                    <li class="active"><span>{{ $i }}</span></li>
                @else
                    <li><a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a></li>
                @endif
            @endif
        @endforeach
        @if($paginator->currentPage() < $paginator->lastPage() - 3)
            <li class="page-item"><span>...</span></li>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <li class="page-item hidden-xs"><a href="{{ $paginator->url($paginator->lastPage()) }}" class="page-link">{{ $paginator->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next">»</a></li>
        @else
            <li class="page-item disabled"><span>»</span></li>
        @endif
    </ul>
    </nav>
@endif
