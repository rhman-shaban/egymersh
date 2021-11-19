@extends('site.layouts.master')
@php
    $lang = $lang = LaravelLocalization::getCurrentLocale();
@endphp
@section('page_content')
       <main class="main">
       {{--  <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Pages
                    <span></span> Terms of Service
                </div>
            </div>
        </div> --}}
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                            <div class="single-header style-2">
                                <h2>{{ $page['title_'.$lang] }}</h2>
                            </div>

                            <div class="single-content">
                              {!! $page['content_'.$lang] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection