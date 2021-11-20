@extends('store.layouts.master')

@section('page_content')


<section class="content-main">

    <div class="content-header">
        <div>
            <h2 class="content-title card-title">wallet</h2>
            
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <div class="center hideform">
            <button id="close"class="btn btn-md rounded font-sm hover-up" style="float: right;">X</button>
        <div class="row">
            <form method="POST" action="{{route('store.wallet')}}">
                @csrf
            <div class="mb-4">

                <label class="form-label">price</label>
                <input type="text" name="price" placeholder="Enter client name" class="form-control">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="mb-4">
                <label class="form-label">phone</label>
                <input type="text" name="phone" placeholder="Enter client name" class="form-control">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="mb-4">
            <label class="form-label">select payment way</label>
                <select class="form-select" name="payway"  id="selct-store-order">
                    <option >vodafone cash</option>
                    <option >bank</option>
                    <option >paypal</option>
                </select>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
                <br><br>
                <button class="btn btn-md rounded font-sm hover-up"type="supmit">Send</button>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                
            </form>
  
        </div>
        
        </div>
        <button id="show" class="btn btn-md rounded font-sm hover-up">Show form</button>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Current balance</h6>
                        <span>{{$profit}}</span>
                        <span class="text-sm">
                            current balance , which could be withdrwalled
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Expected profit</h6>
                        <span>{{$balnce_expected}}</span>
                        <span class="text-sm">
                        Expected income from the site
                        </span>
                    </div>
                </article>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Pindding order</h6>
                        <span>1</span>
                        <span class="text-sm">
                            the pidding order
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="card mb-4">

        <div class="card-body">
          <div class="table-responsive">
            <div class="table-responsive">
              <table class="table align-middle table-nowrap mb-0">
                <thead class="table-light">
                    
                  <tr>
                    <th class="align-middle" scope="col">Amount</th>
                    <th class="align-middle" scope="col">Phone</th>
                    <!-- final product name 'by the seller' -->
                    <th class="align-middle" scope="col">Payment Way</th>
                    <th class="align-middle" scope="col">Payment Status</th>
                    <th class="align-middle" scope="col">Notes</th>
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
    </div>



    
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