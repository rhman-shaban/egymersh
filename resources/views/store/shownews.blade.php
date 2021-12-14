@extends('store.layouts.master')

@section('page_title')
{{$id->title}}
@endsection

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <h2 class="content-title"> {{$id->category}}</h2>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <h4>{{$id->title}}</h4>
        </header>
        <div class="card-body">
            <h5 class="card-title">{{strip_tags($id->body)}}</h5>
        </div>
    </div> <!-- card end// -->
</section>

@endsection
