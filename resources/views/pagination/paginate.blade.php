@if ($paginator->hasPages())

    <ul class="pager paginations">
        @if ($paginator->currentPage() >= 5)
            <li class=""><a href="{{$paginator->url(1)}}">First page</a></li>
        @endif
        @if ($paginator->onFirstPage())
            {{-- <li class="disabled"><span class="flaticon-left-arrow-2"></span></li> --}}
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><span
                        class="flaticon-left-arrow-2"></span></a></li>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a href="">{{ $page }}</a></li>
                    @elseif ($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2 || $page == $paginator->lastPage())
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @elseif ($page == $paginator->lastPage() - 1)
                        <li class="disabled"><span><i class="fa fa-ellipsis-h"></i></span></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><span class="flaticon-next-2"></span></a></li>
        @else
            {{-- <li class="disabled"><span class="flaticon-next-2"></span></li> --}}
        @endif
    </ul>
@endif
