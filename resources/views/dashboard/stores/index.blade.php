@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            {{-- <h2 class="content-title card-title">Stores</h2> --}}
        </div>
        <div>
            {{-- <a href="{{ route('stores.create') }}" class="btn btn-primary btn-sm rounded">Add new Admin</a> --}}
        </div>
    </div>

    @include('dashboard.layouts.messages')

    @livewire('dashboard.stores.list-all-stores')


</section>
    

</section> <!-- content-main end// -->
@endsection


@section('scripts')


@endsection