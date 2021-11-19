@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title"> Shipping Companies </h2>
        </div>
        <div>
            <a href="{{ route('shipping_companies.create') }}" class="btn btn-primary btn-sm rounded">  Add new Shipping Company  </a>
        </div>
    </div>

    @include('dashboard.layouts.messages')
    @livewire('dashboard.shipping-companies.list-all-shipping-companies')

</section> <!-- content-main end// -->
@endsection


@section('scripts')


@endsection