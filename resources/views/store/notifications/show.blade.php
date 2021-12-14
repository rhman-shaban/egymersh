@extends('store.layouts.master')

@section('page_title')
{{ $notification->title }}
@endsection

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">@lang('seller.Notifications')</h2>
        <div>
            <a href="{{ route('notification.index') }}" class="btn btn-primary">@lang('seller.All Notifications')</a>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
          <h3 class="card-title">{{ $notification->title }}</h3>
        </header>

        <div class="card-body row flex-row-reverse">

          <div class="col-lg-6 d-flex align-items-center justify-content-center">
          <img src="{{ asset('store_assets\assets\imgs\seller-dashboard/notification-page.png')}}" alt="Notifications" class="img-responsive w-50 ">
        </div>

        <div class="col-lg-6">
            <div class="mt-2">
                <h3>{!! $notification->message !!}</h3>
            </div>
          </div>
        </div>
    </div> <!-- card end// -->
</section>

@endsection
