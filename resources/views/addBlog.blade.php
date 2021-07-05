@extends('layouts.admin')
<x-title data="Add Blog">
</x-title>
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Blog
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Blog</li>
      </ol>
    </section>
    
    
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Make New Blog</h3>
            </div><!-- /.box-header -->

            <form action="{{url('add')}}" method="POST" enctype="multipart/form-data">
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
                  <input class="form-control" name="bTitle" placeholder="Title"/>
                </div>
                <div class="form-group">
                  <input class="form-control" name="bDescriptionn" placeholder="Short Description"/>
                </div>
                <div class="form-group">
                  <input type="file" class="form-control" name="bImage" />
                </div>
                <div class="form-group"><!-- Category-->
                  <select name="bCategory" class="form-control" style="width:250px">
                      <option value="">--- Select Category ---</option>
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <textarea id="compose-textarea" name="bFullDes" class="form-control" style="height: 300px" placeholder="Full Description">
                    
                  </textarea>
                </div>
                <p style="color: green">Note: Copy and Past Your prefferd platform link link </p>
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-primary">Tweet</button>
                  </div><!-- /btn-group -->
                  <input type="text" name="tweet" class="form-control">
                </div><!-- /input-group -->
                
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-primary">Facebook</button>
                  </div><!-- /btn-group -->
                  <input type="text" name="facebook" class="form-control">
                </div><!-- /input-group -->
              
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-primary">Instagram</button>
                  </div><!-- /btn-group -->
                  <input type="text" name="instagram" class="form-control">
                </div><!-- /input-group -->
                
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-primary">Youtube</button>
                  </div><!-- /btn-group -->
                  <input type="text" name="youtube" class="form-control">
                </div><!-- /input-group -->
                
              </div><!-- /.box-body -->
              <div class="box-footer">
                <div class="pull-right">
                  <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Post</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
              </div><!-- /.box-footer -->
            </form>
          </div><!-- /. box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
@endsection