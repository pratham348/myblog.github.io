@extends('layouts.admin')
<x-title data="Deshboard">
</x-title>
@section('content')
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-xs-7">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$bg->count()}}</h3>
            <p>Blogs</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{url('viewblog')}}" class="small-box-footer">Blogs <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-4 col-xs-7">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$cat}}</h3>
            <p>Categories</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{url('viewCategory')}}" class="small-box-footer">Categories <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-4 col-xs-7">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$sub}}</h3>
            <p>Subscribers</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">Subscribers <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
    </div>
<div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Your blogs</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              @foreach($bg as $slider)
              <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
              @endforeach
            </ol>
            <div class="carousel-inner">
              @foreach($bg as $slider)
              <div class="item {{ $loop->first ? ' active' : '' }}" sizes="32x32">
                <img src="../storage/app/images/{{$slider->image}}" alt="{{$slider->description}}" style="height: 50vh; width: 100%;" >
                <div class="carousel-caption">
                    <b style="font-size:30px">{{$slider->description}}</b>
                </div>
              </div>
              @endforeach
            </div>
          
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="fa fa-angle-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="fa fa-angle-right"></span>
          </a>
        </div>
      </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
</section>
@endsection