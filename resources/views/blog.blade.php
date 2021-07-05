@extends('layouts.blogView')
<x-header data="Home">
</x-header>
@section('content')
<div id="tm-video-container">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style=" width:100%; height: 600px !important;" >
    <ol class="carousel-indicators">
        @foreach($blog as $slider)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($blog as $slider)
        <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
            <img class="d-block w-100" src="../storage/app/images/{{$slider->image}}" alt="slide-{{$slider->id}}" style=" width:100%; height: 600px !important;">
            <div class="carousel-caption d-none d-md-block">
                <h1>{{$slider->title}}</h1>
                <h3>{{$slider->description}}</h3>
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
</div>



<div class="row">
    <div class="col-12">
        <div class="tm-categories-container mb-5">
            <h3 class="tm-text-primary tm-categories-text">Categories:</h3>
            <ul class="nav tm-category-list">
                <li class="nav-item tm-category-item"><a class="nav-link tm-category-link">All</a></li>
                @foreach ($category as $item)
                <li class="nav-item tm-category-item"><a href="{{url('SeeCaegory',$item->id)}}" class="nav-link tm-category-link">{{$item->name}}</a></li>
                @endforeach
            </ul>
        </div>        
    </div>
</div>


<div class="row pt-4 pb-5">
    <div class="col-12">
        <div class="row tm-catalog-item-list">
            @foreach ($blog as $item)
            <a href="{{url('ShowBlog',$item->id)}}">  
                <div class="col-lg-4 col-md-6 col-sm-12 tm-catalog-item">
                    <div class="position-relative tm-thumbnail-container">
                        <img src="../storage/app/images/{{$item->image}}" alt="Image-{{$item->id}}" class="img-fluid tm-catalog-item-img">    
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



{!! $blog->links('pagination_custom') !!}



@endsection