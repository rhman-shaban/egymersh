@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Orders</h2>
        </div>
 
    </div>

    @include('dashboard.layouts.messages')

    
    @livewireStyles
            <livewire:ordermanual>
    @livewireScripts


</section>
    

@endsection


@section('scripts')


@endsection