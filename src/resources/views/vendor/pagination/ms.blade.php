@if ($paginator->hasPages())
    <nav class="ms-pagination" aria-label="Paginazione">
        @if ($paginator->onFirstPage())
            <span class="disabled" aria-disabled="true">&lsaquo; Prec.</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo; Prec.</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="disabled">&hellip;</span>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="active" aria-current="page">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">Succ. &rsaquo;</a>
        @else
            <span class="disabled">Succ. &rsaquo;</span>
        @endif
    </nav>
@endif
