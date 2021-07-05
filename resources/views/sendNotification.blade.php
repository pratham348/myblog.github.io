@extends('layouts.admin')
<x-title data="Send Notification">
</x-title>
@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            
          </div><!-- /.box-header -->

          <form action="{{url('send-mail')}}" method="get">
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
            
            <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send Notifications</button>
            </div><!-- /.box-footer -->
          </form>
        </div><!-- /. box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
@endsection