@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title"> Pages </h2>
        </div>
        <div>
            <a href="{{ route('pages.create') }}" class="btn btn-primary btn-sm rounded">  Add new Page  </a>
        </div>
    </div>

    @include('dashboard.layouts.messages')
    @livewire('dashboard.pages.list-all-pages')

</section> <!-- content-main end// -->
@endsection


@section('scripts')


@endsection