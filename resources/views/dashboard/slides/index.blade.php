@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title"> Slides </h2>
        </div>
        <div>
            <a href="{{ route('slides.create') }}" class="btn btn-primary btn-sm rounded">  Add new Slide  </a>
        </div>
    </div>

    @include('dashboard.layouts.messages')
    @livewire('dashboard.slides.list-all-slides')

</section> <!-- content-main end// -->
@endsection


@section('scripts')


@endsection