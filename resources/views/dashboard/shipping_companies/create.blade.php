@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title"> Add New shipping company </h2>
                <div>
                    <a  href="{{ route('shipping_companies.index') }}" class="btn btn-md rounded font-sm hover-up">   Show All Shipping Companies </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Governorate information</h4>
                </div>
                <form method="POST" action="{{ route('shipping_companies.store') }}" enctype="multipart/form-data" >
                    <div class="card-body">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label"> Company Name </label>
                                    <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" >
                                    @error('name')
                                    <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class=" mb-3">
                                    <label class="form-label"> Activation </label>
                                    <select name="active" class="form-select">
                                        <option value="1" > Enabled </option>
                                        <option value="0" > Disabled </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-4">
                                    <div class="checkbox mt-4">
                                        <label>
                                            <input type="checkbox" name="main" value="1">
                                            Main Shipping Company
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> 
                                            <input type="checkbox" >
                                        </th>
                                        <th> Delivery Price </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($governorates as $governorate)
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="governorate_id[]" value="{{ $governorate->id }}">
                                                    {{ $governorate->name_en }} 
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number" class='form-control' name="prices[{{ $governorate->id }}]"  >
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-md rounded font-sm hover-up" style="float:right">  Add  <i class="fas fa-plus"></i> </button>
                        <a href='{{ route('shipping_companies.index') }}' class="btn btn-md rounded font-sm hover-up"><i class="fas fa-arrow-left"></i>  back  </a>

                    </div>
                </form>
            </div> <!-- card end// -->

        </div>
    </div>
</section> <!-- content-main end// -->
@endsection


@section('scripts')
@endsection