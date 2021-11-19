@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title"> Governorates </h2>
        </div>
        <div>
            <a href="{{ route('governorates.create') }}" class="btn btn-primary btn-sm rounded">  Add new Governorate  </a>
        </div>
    </div>

    @include('dashboard.layouts.messages')
    @livewire('dashboard.governorates.list-all-governorates')

</section> <!-- content-main end// -->
@endsection


@section('scripts')


@endsection