@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title"> Categories </h2>
        </div>
        <div>
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm rounded">  Add new Category  </a>
        </div>
    </div>

    @include('dashboard.layouts.messages')
    @livewire('dashboard.categories.list-all-categories')

</section> <!-- content-main end// -->
@endsection


@section('scripts')


@endsection