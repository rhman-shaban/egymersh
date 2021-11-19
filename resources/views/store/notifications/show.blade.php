@extends('store.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <h2 class="content-title"> page Notifications</h2>
        <div>
            <a href="{{ route('notification.index') }}" class="btn btn-primary">All Notifications</a>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <h4>Card header</h4>
        </header>
        <div class="card-body">
            <h5 class="card-title">{{ $notification->title }}</h5>
            <div class="mt-4">
                <div class="text-muted font-size-14">
                    {!! $notification->message !!}
                </div>
            </div>
        </div>
    </div> <!-- card end// -->
</section>

@endsection