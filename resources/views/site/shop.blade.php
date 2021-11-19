@extends('site.layouts.master')

@section('page_title')
Shop
@endsection
@section('page_content')
<main class="main">
    {{-- <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow">Home</a>
                <span></span> Shop

            </div>
        </div>
    </div> --}}
    <section class="mt-50 mb-50">
        <div class="container">
            @livewire('site.shop')
        </div>
    </section>
</main>
@endsection



