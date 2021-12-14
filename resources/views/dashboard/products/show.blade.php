@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title"> Products </h2>
        </div>
        <div>
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm rounded">  Add new Product  </a>
        </div>
    </div>

    @include('dashboard.layouts.messages')



    <table class="table table-striped table-bordered table-hover">

        <tbody>
           <tr>
            <th> Added By (admin)</th>
            <td> {{ optional($product->admin)->name }} </td>
        </tr>

        <tr>
            <th> created At </th>
            <td> {{ $product->created_at->diffForHumans() }} - {{ $product->created_at }} </td>
        </tr>

        <tr>
            <th> Status </th>
            <td>
                @switch($product->active)
                @case(0)
                <span class="badge bg-danger" > Inactive </span>
                @break
                @case(1)
                <span class="badge bg-primary" > Active </span>
                @break
                @endswitch
            </td>
        </tr>

        <tr>
            <th> Arabic name </th>
            <td> {{ $product->name }} </td>
        </tr>
        <tr>
            <th> English name </th>
            <td> {{ $product->name }} </td>
        </tr>
        <tr>
            <th> Price </th>
            <td> {{ $product->price }} </td>
        </tr>
        <tr>
            <th> Category </th>
            <td> {{ optional($product->category)->name_en }} </td>
        </tr>
        <tr>
            <th> Arabic Description </th>
            <td> {{ $product->description_ar }} </td>
        </tr>
        <tr>
            <th> English Description </th>
            <td> {{ $product->description_en }} </td>
        </tr>
    </tbody>
</table>



<table class="table table-striped table-bordered table-hover">

    <thead>
        <tr>
            <th>#</th>
            <th> Front image  </th>
            {{-- <th> Back Image </th> --}}
            <th> Color </th>
            <th> sizes </th>
        </tr>
    </thead>

    <tbody>
        @php
        $i = 1;
        @endphp
        @foreach ($product->colors as $color)
        <tr>
            <td> {{ $i++ }}</td>
           
            <td> <img  height="100" width="100" src="{{ asset('storage/products/'.$color->front_image) }}" alt=""> </td>
            {{-- <td>  <img height="100" width="100"  src="{{ Storage::url('products/'.$color->back_image) }}" alt=""> </td> --}}
            <td><span class="badge" style="background-color: {{ $color->color }};"> {{ $color->color }} </span> </td>
            <td>
                <ul>
                    @foreach ($color->sizes as $size)
                    <li> {{ optional($size->size)->name }} -- {{ $size->quantity }} </li>
                    @endforeach
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


</section> <!-- content-main end// -->
@endsection


@section('scripts')
@endsection