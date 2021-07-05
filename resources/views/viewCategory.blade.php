@extends('layouts.admin')
<x-title data="View Category">
</x-title>
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    View Category   
    <small>in detail</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">View Category</li>
  </ol>
</section>
<section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <!-- Form Element sizes -->
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Category</h3>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($coll as $item)
                <tr>
                  <td>{{$item['id']}}</td>
                  <td>{{$item['name']}}</td>
                </tr>
              @endforeach
              
            </table>
          </div><!-- /.box-body -->
          {!! $coll->links('pagignation_admin') !!}
        </div><!-- /.box -->
      </div>
    </div>
</section>
@endsection