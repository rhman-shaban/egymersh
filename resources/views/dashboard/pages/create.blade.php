@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title"> Add New Page </h2>
                <div>
                    <a  href="{{ route('pages.index') }}" class="btn btn-md rounded font-sm hover-up">   Show All Pages </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Slide Information</h4>
                </div>
                <form method="POST" action="{{ route('pages.store') }}" enctype="multipart/form-data" >
                    <div class="card-body">
                        @csrf
                        <div class="col-sm-12 mb-3">
                            <label class="form-label"> Activation </label>
                            <select name="active" class="form-select">
                                <option value="1" > Enabled </option>
                                <option value="0" > Disabled </option>
                            </select>
                        </div>




                        <div class="mb-4">
                            <label for="product_name" class="form-label"> Arabic title </label>
                            <input type="text"  class="form-control @error('title_ar') is-invalid @enderror" name="title_ar" value="{{ old('title_ar') }}" >
                            @error('title_ar')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="product_name" class="form-label"> Arabic Content </label>
                            <textarea name="content_ar" id="input" class="form-control @error('content_ar') is-invalid @enderror" rows="3" required="required"> {{ old('content_ar') }} </textarea>
                            @error('content_ar')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label"> English  title </label>
                            <input type="text"  class="form-control @error('title_en') is-invalid @enderror" name="title_en" value="{{ old('title_en') }}" >
                            @error('title_en')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="product_name" class="form-label"> Arabic Content </label>
                            <textarea name="content_en" id="input" class="form-control @error('content_en') is-invalid @enderror" rows="3" required="required"> {{ old('content_en') }} </textarea>
                            @error('content_en')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>


                    </div>
                    <div class="card-footer">
                        <button class="btn btn-md rounded font-sm hover-up" style="float:right">  Add  <i class="fas fa-plus"></i> </button>
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
