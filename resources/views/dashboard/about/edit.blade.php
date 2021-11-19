@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title"> Edit About Us Details </h2>
            </div>
        </div>
        <div class="col-lg-12">
            @include('dashboard.layouts.messages')
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Information</h4>
                </div>
                <form method="POST" action="{{ route('about.update' ) }}" enctype="multipart/form-data" >
                    <div class="card-body">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="product_name" class="form-label"> Arabic Content </label>
                            <textarea name="content_ar" id="input" class="form-control @error('content_ar') is-invalid @enderror" rows="3" required="required"> {{ $about->content_ar }} </textarea>
                            @error('content_ar')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="product_name" class="form-label"> Arabic Content </label>
                            <textarea name="content_en" id="input" class="form-control @error('content_en') is-invalid @enderror" rows="3" required="required"> {{ $about->content_en }} </textarea>
                            @error('content_en')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>


                    </div>
                    <div class="card-footer">
                        <button class="btn btn-md rounded font-sm hover-up" style="float:right">  Edit  <i class="fas fa-plus"></i> </button>
                        <a  class="btn btn-md rounded font-sm hover-up"><i class="fas fa-arrow-left"></i>  back  </a>

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
