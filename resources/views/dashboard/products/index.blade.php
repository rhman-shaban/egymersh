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
    @livewire('dashboard.products.list-all-products')

</section> <!-- content-main end// -->
@endsection


@section('scripts')


@endsection