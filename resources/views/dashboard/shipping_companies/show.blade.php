@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title"> Shipping Companies </h2>
        </div>
        <div>
            <a href="{{ route('shipping_companies.index') }}" class="btn btn-primary btn-sm rounded">  Show All Shipping Companies  </a>
            <a href="{{ route('shipping_company.prices.create'  , ['company' => $shipping_company->id ] ) }}" class="btn btn-primary btn-sm rounded">  Add New Governorate To Company  </a>
        </div>
    </div>

    @include('dashboard.layouts.messages')


    <div class="card">
        <table class="table table-bordered table-hover">

            <tbody>
                <tr>
                    <th>  name </th>
                    <td> {{ $shipping_company->name }} </td>
                </tr>
                <tr>
                    <th>  main </th>
                    <td> 
                        @if ($shipping_company->main != null)
                        <span class='text-primary' >  Yes</span>
                        @else
                        <span class='text-hide' >No</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>  Active </th>
                    <td> 
                        @switch($shipping_company->active)
                        @case(1)
                        <span class="badge badge-pill badge-soft-success">Active</span>
                        @break
                        @case(0)
                        <span class="badge badge-pill badge-soft-danger">Inactive</span>
                        @break
                        @endswitch
                    </td>
                </tr>
                <tr>
                    <th> governorates count </th>
                    <td> {{ $shipping_company->prices()->count() }} </td>
                </tr>
            </tbody>
        </table>
    </div>



    <hr>



    <div class="card">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th> Governorate </th>
                    <th> price</th>
                    <th>   </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shipping_company->prices as $price)
                <tr>
                    <td>{{  optional($price->governorate)->name_en }} </td>
                    <td> {{ $price->price }} </td>
                    <td>
                        <form action="{{ route('shipping_company.prices.destroy'  , ['price' => $price->id ] ) }}" method='POST'>
                            @csrf
                            @method('DELETE')
                            <button class='btn btn-danger btn-xs'> <i class="fas fa-trash-alt"></i> </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section> 
@endsection


@section('scripts')


@endsection