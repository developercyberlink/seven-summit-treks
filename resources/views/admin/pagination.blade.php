@if ($paginator->hasPages())
    	<div class="pagination-plugin">
		  <ul class="pagination-list">
        @if ($paginator->onFirstPage())
            <!--<li class="prev"><span uk-pagination-previous disabled>Prev</span></li>-->
        @else
            <li class="prev"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="prev page-numbers">Prev</a></li>
        @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-numbers"><span class="pagination-ellipsis"><span>{{ $element }}</span></span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                             <li class="page-numbers current"><span>{{ $page }}</span></li>
                        @else
                            <li class="page-numbers current"><a href="{{ $url }}" class="page-numbers">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

        @if ($paginator->hasMorePages())
           <li class="next"> <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
        @else
            <!--<li class="next"><span uk-pagination-next disabled>Next</span></li>-->
        @endif 
        </ul>
    </div>
@endif