<div class="row">
    <div class="col-xs-4">
        <div class="dataTables_paginate paging_bootstrap">
            @if ($paginator->hasPages())
            <ul class="pagination">
            
                @if ($paginator->onFirstPage())
                    <li class="prev disabled"><span>← Previous</span></li>
                @else
                    <li class="prev"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
                @endif


            
                @foreach ($elements as $element)
                
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif


                
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active"><span>{{ $page }}</span></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach


                
                @if ($paginator->hasMorePages())
                    <li class="next"><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
                @else
                    <li class="disabled"><span>Next →</span></li>
                @endif
            </ul>
            @endif 
        </div>
    </div>
</div>