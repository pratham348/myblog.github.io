@extends('layouts.blogView')
<x-header data="Categories">
</x-header>
@section('content')
<div class="row">
    <div class="col-12">
        <h2 class="tm-page-title mb-4">Our Catalog</h2>
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

@endsection