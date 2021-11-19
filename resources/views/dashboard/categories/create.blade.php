@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title"> Add New Category </h2>
                <div>
                    <a  href="{{ route('categories.index') }}" class="btn btn-md rounded font-sm hover-up">   Show All Categories </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Basic</h4>
                </div>
                <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data" >
                    <div class="card-body">
                        @csrf

                        <div class="mb-4">
                            <label for="product_name" class="form-label">  Parent  </label>
                            <select name="parent_id" class="form-control">
                                <option value=""></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category['name_en'] }} - {{ $category['name_ar'] }}  </option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="product_name" class="form-label"> Arabic Name </label>
                            <input type="text"  class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ old('name_ar') }}" >
                            @error('name_ar')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="product_name" class="form-label"> English  Name </label>
                            <input type="text"  class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{ old('name_en') }}" >
                            @error('name_en')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="product_name" class="form-label">  Sort </label>
                            <input type="number"  class="form-control @error('sort') is-invalid @enderror" name="sort" value="{{ old('sort') }}" >
                            @error('sort')
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