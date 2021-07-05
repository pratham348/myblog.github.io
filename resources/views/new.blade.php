@extends('layouts.blogView')
<x-header data="New Uploads">
</x-header>
@section('content')

<div class="row tm-catalog-item-list">
    @foreach ($blog as $item)
    <a href="{{url('ShowBlog',$item->id)}}">  
    <div class="col-lg-4 col-md-6 col-sm-12 tm-catalog-item">
        <div class="position-relative tm-thumbnail-container">
            <img src="../storage/app/images/{{$item->image}}" alt="Image-{{$item->id}}" class="img-fluid tm-catalog-item-img">    
            <a href="{{url('ShowBlog',$item->id)}}" class="position-absolute tm-img-overlay">
                
            </a>
        </div>    
        <div class="p-4 tm-bg-gray tm-catalog-item-description">
            <h3 class="tm-text-primary mb-3 tm-catalog-item-title">{{$item->description}}</h3>
        </div>
    </div>
    </a>
    @endforeach
</div>

{!! $blog->links('pagination_custom') !!}



@endsection