@extends('store.layouts.master')

@section('page_content')

 <section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Dashboard </h2>
            <p>Whole data about your business here</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Revenue</h6>
                        <span>{{$balnce}} .LE</span>
                        <span class="text-sm">
                            Shipping fees are not included
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-local_shipping"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Orders</h6> <span>{{$manual_order}}</span>
                        <span class="text-sm">
                            Excluding orders in transit
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-qr_code"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Products</h6> <span>{{$all_product}}</span>
                        <span class="text-sm">
                        All products you own
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-qr_code"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Stores</h6> <span>{{$all_stores}}</span>
                        <span class="text-sm">
                        All stores you own
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-3">
                <div class="mx-auto">
                    <div class="text">
                        <h5 class="mb-1 card-title">Welcome back! 🤙😊</h5>
                        <img class="welcomeImg mb-2" src="http://placekitten.com/500/220" alt="Welcome_img">
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-lg-5">
            <div class="card card-body mb-4">
            <h4 class="mb-3 card-title">Latest News 🎉</h4>
            @foreach($posts as $title)
            <h5>{{$title->title}}</h5>
            <p>{{ Str::limit(strip_tags($title->body), 20) }}<a href="{{ route('show-news',$title->id) }}">Learn More</a></p>
            @endforeach
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card card-body mb-4">
                <h4 class="mb-1 card-title">Tips to grow 💸</h4>
                @foreach($news as $title)
                <h5>{{$title->title}}</h5>
                <p>{{ Str::limit(strip_tags($title->body), 20) }} <a href="{{ route('show-news',$title->id) }}">Learn more!</a></p>
                @endforeach
            </div>
        </div>

</section> <!-- content-main end// -->
@endsection