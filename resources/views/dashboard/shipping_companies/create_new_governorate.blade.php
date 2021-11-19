@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title"> Add New shipping company Governorate </h2>

            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Governorate and price  information</h4>
                </div>
                <form method="POST" action="{{ route('shipping_company.prices.store' , ['company' => $company->id ] ) }}" enctype="multipart/form-data" >
                    <div class="card-body">
                        @csrf
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