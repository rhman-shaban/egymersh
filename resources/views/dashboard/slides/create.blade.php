@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title"> Add New Slide </h2>
                <div>
                    <a  href="{{ route('slides.index') }}" class="btn btn-md rounded font-sm hover-up">   Show All Slides </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Slide Information</h4>
                </div>
                <form method="POST" action="{{ route('slides.store') }}" enctype="multipart/form-data" >
                    <div class="card-body">
                        @csrf


                        <div class="mb-4">
                            <label  class="form-label"> Image </label>
                            <input type="file"  class="form-control @error('image') is-invalid @enderror" name="image"  >
                            @error('image')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

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
                            <label for="product_name" class="form-label"> English  title </label>
                            <input type="text"  class="form-control @error('title_en') is-invalid @enderror" name="title_en" value="{{ old('title_en') }}" >
                            @error('title_en')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="product_name" class="form-label"> Arabic Big Title </label>
                            <input type="text"  class="form-control @error('big_title_ar') is-invalid @enderror" name="big_title_ar" value="{{ old('big_title_ar') }}" >
                            @error('big_title_ar')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="product_name" class="form-label"> English Big Title </label>
                            <input type="text"  class="form-control @error('big_title_en') is-invalid @enderror" name="big_title_en" value="{{ old('big_title_en') }}" >
                            @error('big_title_en')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="product_name" class="form-label"> Arabic Sub Title </label>
                            <input type="text"  class="form-control @error('sub_title_ar') is-invalid @enderror" name="sub_title_ar" value="{{ old('sub_title_ar') }}" >
                            @error('sub_title_ar')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="product_name" class="form-label"> English Sub Title </label>
                            <input type="text"  class="form-control @error('sub_title_en') is-invalid @enderror" name="sub_title_en" value="{{ old('sub_title_en') }}" >
                            @error('sub_title_en')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="product_name" class="form-label">  Link </label>
                            <input type="text"  class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}" >
                            @error('link')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="product_name" class="form-label"> Arabic Button Text </label>
                            <input type="text"  class="form-control @error('button_text_ar') is-invalid @enderror" name="button_text_ar" value="{{ old('button_text_ar') }}" >
                            @error('button_text_ar')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="product_name" class="form-label"> English Button Text </label>
                            <input type="text"  class="form-control @error('button_text_en') is-invalid @enderror" name="button_text_en" value="{{ old('button_text_en') }}" >
                            @error('button_text_en')
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#sortable" ).sortable();
} );
</script>

@endsection