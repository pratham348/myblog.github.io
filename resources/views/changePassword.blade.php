@extends('layouts.admin')
<x-title data="Change Password">
</x-title>
@section('content')
<section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Change Password</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{url('changePass')}}" method="POST">
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
            @csrf
            <div class="box-body">
              <div class="form-group">
                <input type="password" name="npassword" class="form-control" id="exampleInputEmail1" placeholder="Enter Your New Password">
              </div>
              <div class="form-group">
                <input type="password" name="cPassworrd" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Confirm Password">
              </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Change</button>
            </div>
          </form>
        </div><!-- /.box -->

        <!-- Form Element sizes -->
        
      </div>
    </div>
</section>
@endsection