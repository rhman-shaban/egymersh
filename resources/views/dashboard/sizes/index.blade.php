@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title"> Sizes </h2>
        </div>
        <div>
            <a href="{{ route('sizes.create') }}" class="btn btn-primary btn-sm rounded">  Add new Size  </a>
        </div>
    </div>

    @include('dashboard.layouts.messages')
    @livewire('dashboard.sizes.list-all-sizes')

</section> <!-- content-main end// -->
@endsection


@section('scripts')


@endsection