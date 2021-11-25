<?php
$month='';
//$data='';
foreach( $sumProfit as $profitMonth ){
  //$month .= "'".date("F", mktime(0, 0, 0, $profitMonth->month, 1))."',";
  $data[$profitMonth->month] = $profitMonth->profit; 
}

function valueMonths( $array )
{
  $result="";
  for($i = 1; $i <= 12; $i++){
     if( isset($array [$i]) ){
      $result .= $array [$i] .",";
     }else{
      $result .= 0 .",";
     }
  }

  return $result;
}

?>
@extends('store.layouts.master')

@section('page_content')

    <!-- Start main section -->
    <section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">statistics</h2>
            
        </div>
        <div>

        </div>
    </div>

      <!-- start small cards -->
      <div class="row">
        <div class="col-lg-3">
          <div class="card card-body mb-4">
            <article class="icontext">
              <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
              <div class="text">
                <h5 class="mb-1 card-title">Profit</h5>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$profit}}</span>
                  </div>
                  <span>L.E</span>
                </div>
                <span class="text-sm">
                  All time profit </span>
              </div>
            </article>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="card card-body mb-4">
            <article class="icontext">
              <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-local_shipping"></i></span>
              <div class="text">
                <h5 class="mb-1 card-title">Manual Orders</h5>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$manual_order}}</span>
                  </div>
                </div>
                <span class="text-sm">
                  All time orders </span>
              </div>
            </article>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="card card-body mb-4">
            <article class="icontext">
              <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-local_shipping"></i></span>
              <div class="text">
                <h5 class="mb-1 card-title">Sales</h5>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$numperofsale}}</span>
                  </div>
                </div>
                <span class="text-sm">
                  All time sales </span>
              </div>
            </article>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="card card-body mb-4">
            <article class="icontext">
              <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-qr_code"></i></span>
              <div class="text">
                <h5 class="mb-1 card-title">Products</h5>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$all_product}}</span>
                  </div>
                </div>
                <span class="text-sm">
                  Total Product Created </span>
              </div>
            </article>
          </div>
        </div>
      </div>
      <!-- end small cards -->

      <!-- start of revenue chart -->
      <div class="row card flex-row">
        <div class="col-lg-12">
          <article class="card-body">
            <h4 class="card-title chart">Manual Orders Profit</h4>
            <canvas id="profit-chart-seller" height="100"></canvas>
          </article>
        </div>
      </div>
      <!-- end of revenue chart  -->

      <!-- products row -->
      <!-- start of products stats -->
      <!-- <div class="row card flex-row">
        <div class="col-lg-7">
          <div class="card-body mb-2">
            <article class="card-body ">
              <h3 class="card-title">Profit by base products</h3>
              <div class="card-stats">

                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="d-flex align-items-center">
                    <div class="stat-name">
                      <h4>Total profit</h4>
                    </div>
                  </div>

                  <div class="d-flex align-items-center">
                    <div class="stat-value-main">
                      <span>13500</span>
                    </div>
                    <span>L.E</span>
                  </div>
                </div>

                <hr>

                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="d-flex align-items-center">
                    <div class="stat-name">
                      <h5>Base product one</h5>
                    </div>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="stat-value-sub">
                      <span>10000</span>
                    </div>
                    <span>L.E</span>
                  </div>
                </div>

                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="d-flex align-items-center">
                    <div class="stat-name">
                      <h5>Base product two</h5>
                    </div>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="stat-value-sub">
                      <span>3000</span>
                    </div>
                    <span>L.E</span>
                  </div>
                </div>

                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="d-flex align-items-center">
                    <div class="stat-name">
                      <h5>Base product one</h5>
                    </div>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="stat-value-sub">
                      <span>500</span>
                    </div>
                    <span>L.E</span>
                  </div>
                </div>

              </div>
            </article>
          </div>
        </div> -->
      <!-- end of products stats -->

      <!-- start of products chart -->
      <!-- <div class="col-lg-5">
        <article class="card-body">
          <h4 class="card-title chart">Base Product x Profit</h4>
          <canvas id="base-product-profit-chart" height="400"></canvas>
        </article>
      </div> -->
      <!-- start of products chart -->
     
      <!-- end of products row -->

      <!-- orders row -->
      <!-- start of orders stats -->
      <!-- <div class="row card flex-row">
        <div class="col-lg-12">
          <div class="card-body mb-2">
            <article class="card-body ">
              <h3 class="card-title">Orders</h3>
              <div class="card-stats">

                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="d-flex align-items-center">
                    <div class="stat-name">
                      <h4>Total Delivered</h4>
                    </div>
                  </div>

                  <div class="d-flex align-items-center">
                    <div class="stat-value-main">
                      <span>200</span>
                    </div>
                    <span>Order</span>
                  </div>
                </div>

                <hr>

                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="d-flex align-items-center">
                    <div class="d-flex">
                      <h5 class="stat-name">Manual</h5>
                      <span>(by you)</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="stat-value-sub">
                      <span>150</span>
                    </div>
                    <span>Order</span>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="d-flex align-items-center">
                    <div class="d-flex">
                      <h5 class="stat-name">Organic</h5>
                      <span>(by customers)</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="stat-value-sub">
                      <span>50</span>
                    </div>
                    <span>Order</span>
                  </div>
                </div>

              </div>
            </article>
          </div>
        </div> -->
      <!-- end of orders stats -->

      <!-- start of orders chart -->
      <!-- <div class="col-lg-7">
          <article class="card-body">
            <h4 class="card-title chart">Orders Over Time</h4>
            <canvas id="orders-chart-seller" height="150"></canvas>
          </article>
        </div> -->
      <!-- start of orders chart -->
     
      <!-- end of orders row -->

      <!-- start of recent sales table -->
      <div class="card mb-4">
        <header class="card-header">
          <h4 class="card-title">Latest Sales</h4>
          <!-- sales made by customers on the site (not related to manual orders!) -->
          <div class="row align-items-center">


          </div>
        </header>
        <div class="card-body">
          <div class="table-responsive">
            <div class="table-responsive">
              <table class="table align-middle table-nowrap mb-0">
                <thead class="table-light">
                  <tr>
                    <th class="align-middle" scope="col">Sale ID</th>
                    <th class="align-middle" scope="col">Product</th>
                    <!-- final product name 'by the seller' -->
                    <th class="align-middle" scope="col">Date</th>
                   
                    <th class="align-middle" scope="col">Payment Status</th>
                    <th class="align-middle" scope="col">Profit</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($sales as $sale)
                  <tr>
                    <td><a href="#" class="fw-bold">S{{$sale['id']}}</a> </td>
                    <td>{{$sale['title']}}</td>
                    <td>
                      {{ date('d-m-Y', strtotime($sale['created_at'])); }}
                    </td>
                    
                    @foreach($status as $state)
                    <td>
                      <span class="badge badge-pill badge-soft-success">{{$state->name_en}}</span>
                    </td>
                    @endforeach
                    <td>
                  {{$sale['selling_price']}} .LE
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
      <!-- end of recent sales table -->

      <!-- start of manual orders table -->
      <div class="card mb-4">
        <header class="card-header">
          <h4 class="card-title">Your Manual Orders</h4>
        </header>
        <div class="card-body">
          <div class="table-responsive">
            <div class="table-responsive">
              <table class="table align-middle table-nowrap mb-0">
                <thead class="table-light">
                  <tr>
                    <th class="align-middle" scope="col">Order ID</th>
                    <th class="align-middle" scope="col">Customer Name</th>
                    <th class="align-middle" scope="col">Date</th>
                    <th class="align-middle" scope="col">Status</th>
                    <th class="align-middle" scope="col">Total</th>
                    <th class="align-middle" scope="col">Profit</th>
                    <th class="align-middle" scope="col">Shoe</th>
                    <th class="align-middle" scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td><a href="#" class="fw-bold">M{{$order->id}}</a> </td>
                    <td>{{$order->name}}</td>
                    <td>
                    {{ date('d-m-Y', strtotime($order['created_at'])); }}
                    </td>
                    <td>
                      <span class="badge badge-pill badge-soft-success">{{$order->status}}</span>
                    </td>
                    <td>
                     {{$order->total_price}}
                    </td>
                    <td> 
                    {{$order->profit}} L.E
                    </td>
                    <td>
                    <a href="{{ route('show-order'  , $order->id ) }}" class="btn btn-xs"> <i class="far fa-eye"></i> </a>

                    </td>
                    @if($order->status=='pending')
                    <td>
                   
                    <form action="{{ route('delete.order', $order->id ) }}" style="display:inline;" method="POST"  >
                                @method('delete')
                                        @csrf
                            <button class="btn btn-xs btn-danger delete"> <i class="fas fa-trash-alt"></i> </button>
                    </td>	
</form>
                    
                    @endif
                 

                  </tr>

                  @endforeach
                </tbody>
              </table>
            </div>
          </div> <!-- table-responsive end// -->
        </div>
      </div>

     

      
        <!-- end of manual orders table -->

      <!-- [View more] should have (Customer Name - address - phone
       // products details
       // seller notes
       // any comments from admins)

 show it as a pop-up (if possible)
with Cancel options -->

  </main>




  <style>
    .card-body {
      padding: 0.8rem 0.8rem;
    }

    .stat-value-main {
      padding-right: 5px;
      font-size: 22px;
      font-weight: 600;
      display: block;
    }

    .stat-value-sub {
      padding-right: 4px;
      font-size: 18px;
      font-weight: 600;
      display: block;
    }

    .stat-name {
      padding-right: 3px;
    }

    .flex-row {
      flex-direction: row;
    }

    .flex-col {
      flex-direction: column;
    }

    .flex-end {
      justify-content: flex-end;
    }

    .chart {
      text-align: center;
    }

    /* start of aside top card */

    .sellerCard {
      padding: 10px 10px 0px;
    }

    .cardLogo {
      border: 3px solid #eee;
      border-radius: 50%;
      margin: 8px 0px;
    }

    .sellerName {
      margin-bottom: 5px;
      padding: 0 5px;
    }
  </style>


  @endsection


  
  @section('scripts')
  <!--script src="{{asset('store_assets/assets/js/custom-chart.js')}}" type="text/javascript"></script-->
  <script>
        var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    /*Start profit chart*/
  if ($('#profit-chart-seller').length) {
    var ctx = document.getElementById('profit-chart-seller').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Profit L.E',
          tension: 0.3,
          fill: true,
          backgroundColor: 'rgb(70, 220, 44, 0.2)',
          borderColor: 'rgb(70, 220, 44)',
          data: [{{ valueMonths( $data )}}]
        }]
      },
      options: {
        plugins: {
          legend: {
            labels:{
              usePointStyle: true,
            },
          }
        }
      }
    });
  } //End if -- profit chart

    </script>
  @stop
  


