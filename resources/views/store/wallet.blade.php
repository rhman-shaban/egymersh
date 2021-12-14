@extends('store.layouts.master')

@section('page_title')
@lang('title.Wallet')
@endsection

@section('page_content')


<section class="content-main">

    <div class="content-header">
        <div>
            <h2 class="content-title card-title">@lang('seller.Wallet')</h2>

        </div>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
      @endif
        <div class="card center hideform withdrawForm">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">
               @lang('seller.New Withdrawal Request')
            </h3>
            <div class="">
              <button id="close" class="btn btn-md rounded font-sm hover-up" style="float: right;">X</button>
            </div>
            </div>
        <div class="row">
            <form method="POST" action="{{route('store.wallet')}}">
                @csrf
            <div class="mb-4">

                <label class="form-label">@lang('seller.Amount')</label>
                <input type="text" name="price" placeholder="@lang('seller.Enter withdrawal amount')" class="form-control">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="mb-4">
                <label class="form-label">@lang('seller.Phone')</label>
                <input type="text" name="phone" placeholder="@lang('seller.Enter your phone number')" class="form-control">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="mb-4">
            <label class="form-label">@lang('seller.Wallet')</label>
                <select class="form-select" name="payway"  id="selct-store-order">
                    <option>@lang('seller.Vodafone Cash')</option>
                    <option>@lang('seller.Etisalat Cash')</option>
                    <option>@lang('seller.Orange Cash')</option>
                    <option>@lang('seller.We Pay')</option>
                </select>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
              <div class="d-flex justify-content-center">
                <button class="btn btn-md rounded font-sm hover-up"type="supmit">@lang('seller.Send Withdrawal Request')</button>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

              </div>
            </form>
        </div>
        </div>
        <button id="show" class="btn btn-md rounded font-sm hover-up">@lang('seller.Withdraw')</button>
    </div>

    <div class="card">
      <div class="card-body row flex-row-reverse justify-content-center align-items-center" style="background-color: rgba(8, 129, 120, 0.2)">

        <!-- image section  -->
        <div class="col-lg-5 d-flex justify-content-center">
          <img src="{{ asset('store_assets\assets\imgs\seller-dashboard/wallet.png')}}" alt="Tip To Grow" class="img-responsive w-75">
        </div>

        <div class="col-lg-7 ">
        <!-- first two cards -->
      <div class="row d-flex align-items-center">
        <div class="col-lg-6">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success fas fa-wallet"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">@lang('seller.Current Balance')</h6>
                        <span>{{$total}}</span>
                        <span class="text-sm">
                            @lang('seller.Available for withdrawal')
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success fas fa-clock"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">@lang('seller.Expected Profit')</h6>
                        <span>{{$balnce_expected}}</span>
                        <span class="text-sm">
                        @lang('seller.Profit of pending sales & orders')
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
                    <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary fas fa-shipping-timed"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">@lang('seller.Pending Orders')</h6>
                        <span>{{$pinding}}</span>
                        <span class="text-sm">
                          @lang('seller.Manual Orders Shipped')
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary fas fa-shipping-timed"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">@lang('seller.Pending Sales')</h6>
                        <span>000</span>
                        <span class="text-sm">
                            @lang('seller.Sales Shipped')
                        </span>
                    </div>
                </article>
            </div>
        </div>
      </div>

      </div>

      </div>

        <div class="card mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <div class="table-responsive">
              <table class="table align-middle table-nowrap mb-0">
                <thead class="table-light">

                  <tr>
                    <th class="align-middle" scope="col">@lang('seller.Amount')</th>
                    <th class="align-middle" scope="col">@lang('seller.Phone')</th>
                    <!-- final product name 'by the seller' -->
                    <th class="align-middle" scope="col">@lang('seller.Wallet')</th>
                    <th class="align-middle" scope="col">@lang('seller.Payment Status')</th>
                    <th class="align-middle" scope="col">@lang('seller.Notes')</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($wallets as $wallet)
                  <tr>
                    <td>{{$wallet->price}}<a href="#" class="fw-bold"></a> </td>
                    <td>{{$wallet->phone}}</td>
                    <td>
                    {{$wallet->payway}}
                    </td>

                    <td>
                      <span class="badge badge-pill badge-soft-success">{{$wallet->status_en}}</span>
                    </td>
                    <td>
                    {{$wallet->message}}
                    </td>

                  </tr>
                  @endforeach

                </tbody>
                </tbody>
              </table>
            </div>
          </div> <!-- table-responsive end// -->
        </div>
      </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style>
    .center {
    margin: auto;
    width: 60%;
    padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}


.hideform {
    display: none;
}

.withdrawForm{
   position: absolute;
   top: 40%;
   right: 20%;
   z-index: 5;
}

</style>
<script>
$('#show').on('click', function () {
    $('.center').show();
    $(this).hide();
})

$('#close').on('click', function () {
    $('.center').hide();
    $('#show').show();
})
</script>

</section>
@endsection
