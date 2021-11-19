@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title"> Whats New </h2>
            </div>
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        
 
            <div class="card mb-4">
                <div class="card-header">
                    <h4>news</h4>
                </div>
                <form method="POST" action="{{ route('store-news' ) }}" enctype="multipart/form-data" >
                <div class="mb-4">
                            <label class="form-label">select Category</label>
                            <select class="form-select" name="category"  id="selct-store-order">
                                <option>News</option>
                                <option>Tips to grow</option>
                            </select>
                            </div>
        <div class="col-lg-12">
                    <div class="card-body">
                        @csrf
                        
                        <div class="mb-4">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" placeholder="Enter message" class="form-control">
                            </div>
                        <div class="mb-4">
                            <label for="news" class="form-label"> Add yor News </label>
                            <textarea name="body" id="input"  class="form-control @error('body') is-invalid @enderror" rows="3" required="required"> </textarea>
                            @error('body')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-md rounded font-sm hover-up" style="float:right">  Save  <i class="fas fa-plus"></i> </button>
                        <a  class="btn btn-md rounded font-sm hover-up" href="{{ route('Dashboard') }}"><i class="fas fa-arrow-left" ></i>  Go To Home  </a>

                    </div>
                </form>
            </div> <!-- card end// -->

        </div>
    </div>
</section> <!-- content-main end// -->
@endsection


@section('scripts')
 <script src="https://cdn.tiny.cloud/1/ic4s7prz04qh4jzykmzgizzo1lize2ckglkcjr9ci9sgkbuc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
   });
  </script>
@endsection
