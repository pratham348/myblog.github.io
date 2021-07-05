<div>
@if ($paginator->hasPages())
    <ul class="nav tm-paging-links">
       
        @if ($paginator->onFirstPage())
            <li class="nav-item"><a class="nav-link tm-paging-link"><</a></li>
        @else
            <li class="nav-item active"><a href="{{ $paginator->previousPageUrl() }}" class="nav-link tm-paging-link"><</a></li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="nav-item"><a class="nav-link tm-paging-link">{{ $element }}</a></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="nav-item active"><a class="nav-link tm-paging-link">{{ $page }}</a></li>
                    @else
                        <li class="nav-item"><a href="{{ $url }}" class="nav-link tm-paging-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li class="nav-item active"><a href="{{ $paginator->nextPageUrl() }}" class="nav-link tm-paging-link">></a></li>
        @else
            <li class="nav-item"><a class="nav-link tm-paging-link">></a></li>
        @endif
    </ul>
@endif 
</div>