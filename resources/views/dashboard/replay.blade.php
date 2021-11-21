@extends('dashboard.layouts.master')

@section('page_content')
@include('dashboard.layouts.messages')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">send message </h2>
        </div>
    </div>
   
    <form class="mt-8 space-y-6" action="{{route('send-email')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" value="{{$email->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">subject</label>
            <input type="subject" name="subject" value="" class="form-control" id="" aria-describedby="">
            
        </div>  
        <div class="mb-4">
            <label for="message" class="form-label"> Add yor message </label>
            <textarea name="body" id="input"  class="form-control @error('body') is-invalid @enderror" rows="3" required="required"> </textarea>
            @error('body')
                <p class="text-danger"> {{ $message }} </p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</section>



@endsection