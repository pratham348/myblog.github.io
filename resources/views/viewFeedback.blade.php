@extends('layouts.admin')
<x-title data="View Feedback">
</x-title>
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Feedback   
        <small>in detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Feedback</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Feedback Table With Full Features</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Feedback</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($feed as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->feed_back}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div><!-- /.box-body -->
            {!! $feed->links('pagignation_admin') !!}
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
  <!--</div> /.content-wrapper -->

@endsection