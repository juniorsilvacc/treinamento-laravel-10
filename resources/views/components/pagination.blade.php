@if (isset($paginator))
@php
    $queryParams = (isset($appends) && gettype($appends) === 'array') ? '&' . http_build_query($appends) : ''
@endphp
    <nav role="navigation" aria-label="Pagination Navigation" class="custom_navigation">
        <div class="custom_previous">
            @if ($paginator->isFirstPage())
                <span>
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="?page={{ $paginator->getNumberPreviousPage() }}{{ $queryParams }}" rel="prev">
                    {!! __('pagination.previous') !!}
                </a>
            @endif
        </div>

        <div class="custom_next">
            @if (!$paginator->isLastPage())
                <a href="?page={{ $paginator->getNumberNextPage() }}{{ $queryParams }}" rel="next">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="inline-flex items-center">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>
    </nav>
@endif
