@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
	<div class="row">
		<div class="col-12">
			<div class="content-header">
				<h2 class="content-title"> Add New Size To Product  </h2>
				<div>
					<a  href="{{ route('products.index') }}" class="btn btn-md rounded font-sm hover-up">   Show All Products </a>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			

			<form action="{{ route('product_sizes.store' , ['product_color' => $product_color , 'product_id' => $product_id ] ) }}" method="POST">
				@csrf
				<div class="card mb-4">
					<div class="card-header">
						<h4>Size Information</h4>
					</div>

					<div class="card-body">
						@csrf
						<div class="mb-4">
							<label for=""> Size  </label>
							<select name="size_id"  class="form-control" >
								@foreach ($sizes as $size)
								<option value="{{ $size->id }}">{{ $size->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="mb-4">
							<label for=""> Quantity </label>
							<input type="text" class='form-control @error('quantity') is-invalid @enderror ' name='quantity' >
							@error('quantity') 
							<p class='text-danger ' > {{ $message }} </p>
							@enderror

						</div>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-md rounded font-sm hover-up" style="float:right">  Add  <i class="fas fa-plus"></i> </button>
					<a  class="btn btn-md rounded font-sm hover-up"><i class="fas fa-arrow-left"></i>  back  </a>
				</div>

			</form>
		</div> 

	</div>

</section> 
@endsection


@section('scripts')

@endsection
