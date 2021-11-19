@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title"> Add New offers </h2>
                <div>
                    <a  href="{{ route('offers.index') }}" class="btn btn-md rounded font-sm hover-up">   Show All offers</a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Basic</h4>
                </div>
                <form method="POST" action="{{ route('offers.store') }}">

                    <div class="card-body">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="form-label"> Arabic name </label>
                        <textarea name="name_ar" id="input" class="form-control @error('name_ar') is-invalid @enderror" rows="3" required="required"> {{ old('name_ar') }} </textarea>
                        @error('name_ar')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label"> English name </label>
                        <textarea name="name_en" id="input" class="form-control @error('name_en') is-invalid @enderror" rows="3" required="required"> {{ old('content_ar') }} </textarea>
                        @error('name_en')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                    </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-md rounded font-sm hover-up" style="float:right">
                              back  <i class="fas fa-arrow-left"></i>
                        </button>
                        <button class="btn btn-md rounded font-sm hover-up">
                        	<i class="fas fa-plus"></i> Add 
                        </button>
                    </div>
                </form>
            </div> <!-- card end// -->

        </div>
    </div>
</section> <!-- content-main end// -->
@endsection


@section('scripts')
<script src="{{ asset('plugin/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
        $( "#sortable" ).sortable();
  });
  tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
   });
</script>

@endsection