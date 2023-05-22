
@if ($paginator->hasPages())

    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination">

                    @if ($paginator->onFirstPage())
                        <li class="page-item">
                            <a class="disabled page-link page-link-nav" href="#" aria-label="Previous">
                                <span aria-hidden="true"><i class="la la-angle-left"></i></span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        {{--                        <li class="disabled"><span>← Previous</span></li>--}}
                    @else<li class="page-item">
                        <a class="page-link page-link-nav" rel="prev" href="{{'/dashboard/collector/account'. $paginator->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true"><i class="la la-angle-left"></i></span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    {{--                        <li><a href="{{'/dashboard/collector/account'. $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>--}}
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="disabled"><span>{{ $element }}</span></li>
                        @endif
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active">
                                        <a class="page-link page-link-nav" href="#">{{ $page }} <span class="sr-only">(current)</span></a>
                                    </li>
                                    {{--                                    <li class="active my-active"><span>{{ $page }}</span></li>--}}
                                @else

                                    <li class="page-item"><a class="page-link page-link-nav" href="{{ '/dashboard/collector/account'. $url }}">{{ $page }}</a></li>
                                    {{--                                    <li><a href="{{ '/dashboard/collector/account'. $url }}">{{ $page }}</a></li>--}}
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    @if ($paginator->hasMorePages())
                            <li class="page-item">
                                <a class="page-link page-link-nav" href="{{'/dashboard/collector/account'.  $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                                    <span aria-hidden="true"><i class="la la-angle-right"></i></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
{{--                        <li><a href="{{'/dashboard/collector/account'.  $paginator->nextPageUrl() }}" rel="next">Next →</a></li>--}}
                    @else
                            <li class="page-item">
                                <a class="disabled page-link page-link-nav" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="la la-angle-right"></i></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
{{--                        <li class="disabled"><span>Next →</span></li>--}}
                    @endif
                </ul>
            </nav>
        </div>
    </div>

@endif
