@extends('site.layouts.master')

@section('page_title')
@lang('title.Shop')
@endsection

@section('page_content')
<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">
            @livewire('site.shop')
        </div>
    </section>
</main>
@endsection
