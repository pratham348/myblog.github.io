@extends('layouts.admin')
<x-title data="View Subscriber">
</x-title>
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Subscribers
        <small>in detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Subscribers</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Subscriber Table With Full Features</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($sub as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->email}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div><!-- /.box-body -->
            {!! $sub->links('pagignation_admin') !!}
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
  <!--</div> /.content-wrapper -->

@endsection