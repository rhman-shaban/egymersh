@extends('store.layouts.master')

@section('page_title')
@lang('title.Dashboard')
@endsection

@section('page_content')

 <section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">@lang('seller.Welcome')</h2>
            <p>@lang('seller.quick overview')</p>
        </div>
        <div>
            @php
                $count_product = App\Models\SellerProduct::count();
            @endphp

            <a href="{{ route('order.seller.index') }}" class="btn btn-primary btn-sm rounded">@lang('seller.New Manual Order')</a>

            @if ($count_product >= 50)
                <a href="" class="btn btn-primary btn-sm rounded">@lang('seller.product limit msg')</a>
            @else
                <a href="{{ route('add-product-seller') }}" class="btn btn-primary btn-sm rounded">@lang('seller.Create new product')</a>
            @endif
        </div>
    </div>
    <div class="card">

      <div class="card-body row flex-row-reverse justify-content-center align-items-center" style="background-color: rgba(8, 129, 120, 0.2)">

        <!-- image section  -->
        <div class="col-lg-5 d-flex justify-content-center">
          <img src="{{ asset('store_assets\assets\imgs\seller-dashboard/dark-mode.png')}}" alt="dark mode" class="img-responsive ">
        </div>

        <!-- cards section  -->

       <div class="col-lg-7 ">
         <div class="row d-flex align-items-center">

        <div class="col-lg-6">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success fad fa-dollar-sign"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">@lang('seller.Profit')</h6>
                        <span>{{$balnce}} @lang('seller.price sympol')</span>
                        <span class="text-sm">
                            @lang('seller.All time profit')
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary fas fa-truck"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">@lang('seller.Orders')</h6> <span>{{$manual_order}}</span>
                        <span class="text-sm">
                            @lang('seller.orders msg')
                        </span>
                    </div>
                </article>
            </div>
        </div>
      </div>


        <div class="row d-flex align-items-center">

        <div class="col-lg-6">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning fas fa-tshirt"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">@lang('seller.Products')</h6> <span>{{$all_product}}</span>
                        <span class="text-sm">
                        @lang('seller.products msg')
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning fas fa-store-alt"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">@lang('seller.Stores')</h6> <span>{{$all_stores}}</span>
                        <span class="text-sm">
                        @lang('seller.stores msg')
                        </span>
                    </div>
                </article>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>

    <!-- Tips & News setions -->

       <div class="row">

        <div class="col-lg-6">
          <div class="card card-body mb-4">
            <div class="d-flex justify-content-between align-items-center mb-4 p-20" style="background-color: rgba(8, 129, 120, 0.2);border-radius: 10px">
              <h2 class="mb-1 card-title">@lang('seller.Tips to grow')</h2>
              <img src="{{ asset('store_assets\assets\imgs\seller-dashboard/tips-to-grow.png')}}" alt="Tip To Grow" class="img-responsive w-50">
            </div>
            @foreach($posts as $title)
            <h4>{{$title->title}}</h4>
            <p>{{ Str::limit(strip_tags($title->body), 30) }} <a href="{{ route('show-news',$title->id) }}" class="mx-2">@lang('seller.Learn More')</a></p>
            <hr>
            @endforeach
          </div>
        </div>
        <div class="col-lg-6">
              <div class="card card-body mb-4">
                <div class="d-flex justify-content-between align-items-center mb-4 p-20" style="background-color: rgba(8, 129, 120, 0.2);border-radius: 10px">
                  <h2 class="mb-3 card-title">@lang('seller.Latest News')</h2>
                  <img src="{{ asset('store_assets\assets\imgs\seller-dashboard/Latest-news.png')}}" alt="Latest News" class="img-responsive w-50">
                </div>
              @foreach($news as $title)
              <h4>{{$title->title}}</h4>
              <p>{{ Str::limit(strip_tags($title->body), 30) }}<a href="{{ route('show-news',$title->id) }}" class="mx-2">@lang('seller.Learn More')</a></p>
              <hr>
              @endforeach
            </div>
        </div>
      </div>


</section> <!-- content-main end// -->
@endsection
