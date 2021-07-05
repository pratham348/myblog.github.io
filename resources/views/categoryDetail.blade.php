@extends('layouts.blogView')
<x-header data="Categories">
</x-header>
@section('content')

<div class="row pt-4 pb-5">
    <div class="col-12">
        <div class="row tm-catalog-item-list" style="position:relative;" >
            @foreach ($cb as $item)
            <a href="{{url('ShowBlog',$item->id)}}">  
                <div class="col-lg-4 col-md-6 col-sm-12 tm-catalog-item">
                    <div class="position-relative tm-thumbnail-container">
                        <img src="../../storage/app/images/{{$item->image}}" alt="Image-{{$item->id}}" class="img-fluid tm-catalog-item-img">    
                        <a href="{{url('ShowBlog',$item->id)}}" class="position-absolute"></a>
                    </div>    
                    <div class="p-4 tm-bg-gray tm-catalog-item-description">
                        <h3 class="tm-text-primary mb-3 tm-catalog-item-title">{{$item->description}}</h3>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

{!! $cb->links('pagination_custom') !!}

@endsection