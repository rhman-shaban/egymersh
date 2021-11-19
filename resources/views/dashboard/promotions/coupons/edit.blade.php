@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title">Edit coupons</h2>
                <div>
                    <a  href="{{ route('coupons.index') }}" class="btn btn-md rounded font-sm hover-up">Show All coupons</a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Basic</h4>
                </div>
                <form method="POST" action="{{ route('coupons.update',$coupon->id) }}">

                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Name English</label>
                            <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $coupon->name }}">
                            @error('name')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="product_name" class="form-label">value coupon</label>
                            <input type="number"  class="form-control @error('value') is-invalid @enderror" name="value" value="{{ $coupon->value }}">
                            @error('value')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="product_name" class="form-label">end coupon</label>
                            <input type="date"  class="form-control @error('end') is-invalid @enderror" name="end" value="{{ $coupon->end }}">
                            @error('end')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>


                        <div class="col-sm-12 mb-3">
                            <label class="form-label @error('categories_id') is-invalid @enderror"> Category </label>
                            <select name="categories_id" class="form-select">
                            	@foreach ($categorys as $category)

                                	<option value="{{ $category->id }}" {{ $coupon->categories_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>

                            	@endforeach
                            </select>
                            @error('categories_id')
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#sortable" ).sortable();
} );
</script>

@endsection