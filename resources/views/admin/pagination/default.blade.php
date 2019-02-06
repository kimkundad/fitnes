@if ($paginator->lastPage() > 1)
<nav class="pagination-rounded" aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a href="{{ $paginator->url(1) }}" class="page-link" aria-label="Previous"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}"><a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a></li>
        @endfor


        <li class="page-item"><a href="javascript:void(0);" class="page-link" aria-label="Next"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
    </ul>
</nav>
@endif
