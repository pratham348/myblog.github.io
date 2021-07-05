@extends('layouts.admin')
<x-title data="View Blog">
</x-title>
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Blog
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Blog</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Blog Table With Full Features</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              @if (Session::get('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
                @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Short Description</th>
                    <th>Category</th>
                    <th>Full Description</th>
                    <th>Status</th>
                    <th colspan="3" >Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($collection as $item)            
                  <tr>
                    
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td><img src="../storage/app/images/{{$item->image}}" width="100px" height="100px"></td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->full_description}}</td>
                    
                    <td>
                        @if ($item->status==1)
                        <a href="{{url('inactive-status',$item->id)}}" ><p class="label bg-green">Active</p></a>
                        @else
                        <a href="{{url('active-status',$item->id)}}" ><p class="label bg-red">InActive</p></a>
                        @endif
                    </td>
                    <td>
                      <a href="{{url('viewIndetail',$item->id)}}" ><p class="label bg-blue">View</p></a><br>
                    </td>
                    <td>
                      <a href="{{url('edit',$item->id)}}" ><p class="label bg-yellow">Edit</p></a><br>
                    </td>
                    <td>
                      <a href="{{url('delete',$item->id)}}" ><p class="label bg-red">Delete</p></a><br>
                    </td>
                    
                  </tr>               
                @endforeach
                </tbody>
              </table>
            </div><!-- /.box-body -->
            {!! $collection->links('pagignation_admin') !!}
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
  <!--</div> /.content-wrapper -->
@endsection