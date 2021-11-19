@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title"> Add New Size </h2>
                <div>
                    <a  href="{{ route('sizes.index') }}" class="btn btn-md rounded font-sm hover-up">   Show All Sizes </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Basic</h4>
                </div>
                <form method="POST" action="{{ route('sizes.store') }}" enctype="multipart/form-data" >
                    <div class="card-body">
                        @csrf

                        <div class="mb-4">
                            <label for="product_name" class="form-label"> Name </label>
                            <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" >
                            @error('name')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>


                    </div>
                    <div class="card-footer">
                        <button class="btn btn-md rounded font-sm hover-up" style="float:right">  Add  <i class="fas fa-plus"></i> </button>
                        <a  href="{{ route('sizes.index') }}" class="btn btn-md rounded font-sm hover-up"><i class="fas fa-arrow-left"></i>  back  </a>

                    </div>
                </form>
            </div> <!-- card end// -->

        </div>
    </div>
</section> <!-- content-main end// -->
@endsection


@section('scripts')

@endsection