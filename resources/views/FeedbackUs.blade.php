@extends('layouts.blogView')
<x-header data="Feedback">
</x-header>
@section('content')

<div class="col-xl-12 col-lg-12 mb-4">
    <div class="tm-bg-gray p-5 h-100">
        <h3 class="tm-text-primary mb-3">Feedback from</h3>
        <p class="mb-5">
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
        </p>
        <form action="{{url('submitFeedback')}}" method="post" class="tm-form-group">
            
              @csrf
            <div class="form-group">
            <input type="text" name="name" placeholder="Your Name" class="form-control" required>
            </div>
            <div class="form-group">
            <input type="email" name="email" placeholder="Your Email" class="form-control" required>
            </div>
            <div class="form-group">
            <textarea name="feedback" placeholder="Your Feedback" class="form-control" required></textarea>
            </div>
            <div class="form-group">
            <button type="submit" class="btn rounded-1 btn-primary tm-btn-big">Submit</button>
            </div>  
        </form>
    </div>
</div>
@endsection