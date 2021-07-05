@extends('layouts.admin')
<x-title data="Add Category">
</x-title>
@section('content')
<section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Add Category</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{url('category')}}" method="POST">
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
                <label for="exampleInputEmail1">Category</label>
                <input type="text" name="bCategory" class="form-control" id="exampleInputEmail1" placeholder="Enter Category name">
              </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div><!-- /.box -->

        <!-- Form Element sizes -->
        
      </div>
    </div>
</section>
@endsection