@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title"> Messages </h2>
        </div>
    </div>

    @include('dashboard.layouts.messages')
    @livewire('dashboard.messages.list-all-messages')

</section> <!-- content-main end// -->
@endsection


@section('scripts')


@endsection