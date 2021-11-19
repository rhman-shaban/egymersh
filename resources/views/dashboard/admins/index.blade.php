@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Admins</h2>
        </div>
        <div>
            <a href="{{ route('admins.create') }}" class="btn btn-primary btn-sm rounded">Add new Admin</a>
        </div>
    </div>

    @include('dashboard.layouts.messages')

    @livewire('dashboard.admins.list-all-admins')


</section>
    

</section> <!-- content-main end// -->
@endsection


@section('scripts')


@endsection