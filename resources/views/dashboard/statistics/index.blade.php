@extends('dashboard.layouts.master')

@section('page_content')
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
  
    .flex-row {
      flex-direction: row;
    }
  
    .chart {
      text-align: center;
    }
  
    .sellerCard {
      padding: 10px 10px 0px;
    }
  
    .cardLogo {
      border: 3px solid #eee;
      border-radius: 50%;
      margin: 8px 0px;
      width: 50px;
    }
  
    .sellerName {
      margin-bottom: 5px;
      padding: 0 5px;
    }
</style>  
 <!-- Start main section -->
 <section class="content-main">
    <div class="content-header">
      <div>
        <h2 class="content-title card-title">Statistics</h2>
        <p>Whole site data, your key to grow!</p>
      </div>
      {{-- <div>
        <a href="#" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Some button :)</a>
      </div> --}}
    </div>
    <!-- products row --> 
    <!-- start of products stats -->
    <div class="row card flex-row">
      <div class="col-lg-7">
        <div class="card-body mb-2">
          <article class="card-body ">
            <h3 class="card-title">Products</h3>
            <div class="card-stats">

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h4>Total Created</h4>
                  </div>
                </div>

                <div class="d-flex align-items-center">
                  <div class="stat-value-main">
                    <span>{{$Products->count()}}</span>
                  </div>
                  <span>Product</span>
                </div>
              </div>

              <hr>
              @foreach($Products as $Product)
              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>{{$Product->name_en}}</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>250</span>
                  </div>
                  <span>Product</span>
                </div>
              </div>
              @endforeach

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Product Two</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>150</span>
                  </div>
                  <span>Product</span>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
      <!-- end of products stats -->

      <!-- start of products chart -->
      <div class="col-lg-5">
        <article class="card-body">
          <h4 class="card-title chart">All Products Chart</h4>
          <canvas id="productsChart" height="300"></canvas>
        </article>
      </div>
      <!-- start of products chart -->
    </div>
    <!-- end of products row -->

    <!-- users row -->
    <!-- start of users stats -->
    <div class="row card flex-row">
      <div class="col-lg-5">
        <div class="card-body mb-2">
          <article class="card-body ">
            <h3 class="card-title">Users</h3>
            <div class="card-stats">

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h4>Total Registered</h4>
                  </div>
                </div>

                <div class="d-flex align-items-center">
                  <div class="stat-value-main">
                    <span>{{$users->count()}}</span>
                  </div>
                  <span>User</span>
                </div>
              </div>

              <hr>

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Today</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$usersToday}}</span>
                  </div>
                  <span>User</span>
                </div>
              </div>

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Last 7 days</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$userLastWeek}}</span>
                  </div>
                  <span>User</span>
                </div>
              </div>

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Last 30 days</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$userLastMonth}}</span>
                  </div>
                  <span>User</span>
                </div>
              </div>

            </div>
          </article>
        </div>
      </div>
      <!-- end of users stats -->

      <!-- start of users chart -->
      <div class="col-lg-7">
        <article class="card-body">
          <h4 class="card-title chart">Users Over Time</h4>
          <canvas id="usersChart" height="150"></canvas>
        </article>
      </div>
      <!-- start of users chart -->
    </div>
    <!-- end of users row -->

    <!-- sellers row -->
    <!-- start of sellers stats -->
    <div class="row card flex-row">
      <div class="col-lg-5">
        <div class="card-body mb-2">
          <article class="card-body ">
            <h3 class="card-title">Seller ♥</h3>
            <div class="card-stats">

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h4>Total Registered</h4>
                  </div>
                </div>

                <div class="d-flex align-items-center">
                  <div class="stat-value-main">
                    <span>{{$sellers->count()}}</span>
                  </div>
                  <span>Seller</span>
                </div>
              </div>

              <hr>

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Today</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$sellersToday}}</span>
                  </div>
                  <span>Seller</span>
                </div>
              </div>

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Last 7 days</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$sellersLastWeek}}</span>
                  </div>
                  <span>Seller</span>
                </div>
              </div>

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Last 30 days</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$sellersLastMonth}}</span>
                  </div>
                  <span>Seller</span>
                </div>
              </div>

              <hr>

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Active</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$sellersActive}}</span>
                  </div>
                  <span>Seller</span>
                </div>
              </div>
              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Inactive</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$sellersInActive}}</span>
                  </div>
                  <span>Seller</span>
                </div>
              </div>

            </div>
          </article>
        </div>
      </div>
      <!-- end of sellers stats -->

      <!-- start of sellers chart -->
      <div class="col-lg-7">
        <article class="card-body">
          <h4 class="card-title chart">Seller Over Time</h4>
          <canvas id="sellersChart" height="150"></canvas>
        </article>
      </div>
      <!-- start of sellers chart -->
    </div>
    <!-- end of sellers row -->

    <!-- stores row -->
    <!-- start of stores stats -->
    <div class="row card flex-row">
      <div class="col-lg-5">
        <div class="card-body mb-2">
          <article class="card-body ">
            <h3 class="card-title">Stores</h3>
            <div class="card-stats">

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h4>Total Created</h4>
                  </div>
                </div>

                <div class="d-flex align-items-center">
                  <div class="stat-value-main">
                    <span>{{$stores->count()}}</span>
                  </div>
                  <span>Store</span>
                </div>
              </div>

              <hr>

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Active</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$storesactive}}</span>
                  </div>
                  <span>Store</span>
                </div>
              </div>
              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Inactive</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$storesInactive}}</span>
                  </div>
                  <span>Store</span>
                </div>
              </div>

            </div>
          </article>
        </div>
      </div>
      <!-- end of stores stats -->

      <!-- start of stores chart -->
      <div class="col-lg-7">
        <article class="card-body">
          <h4 class="card-title chart">Stores Over Time</h4>
          <canvas id="storesChart" height="150"></canvas>
        </article>
      </div>
      <!-- start of stores chart -->
    </div>
    <!-- end of stores row -->

    <!-- orders row -->
    <!-- start of orders stats -->
    <div class="row card flex-row">
      <div class="col-lg-5">
        <div class="card-body mb-2">
          <article class="card-body ">
            <h3 class="card-title">Orders</h3>
            <div class="card-stats">

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h4>Total Created</h4>
                  </div>
                </div>

                <div class="d-flex align-items-center">
                  <div class="stat-value-main">
                    <span>{{$allorder}}</span>
                  </div>
                  <span>Order</span>
                </div>
              </div>

              <hr>

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Manual</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$ordersManual}}</span>
                  </div>
                  <span>Order</span>
                </div>
              </div>
              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Organic</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$orders->count()}}</span>
                  </div>
                  <span>Order</span>
                </div>
              </div>

              <hr>

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h4>Total Delivered</h4>
                  </div>
                </div>

                <div class="d-flex align-items-center">
                  <div class="stat-value-main">
                    <span>{{$totalorder}}</span>
                  </div>
                  <span>Order</span>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
      <!-- end of orders stats -->

      <!-- start of orders chart -->
      <div class="col-lg-7">
        <article class="card-body">
          <h4 class="card-title chart">Orders Over Time</h4>
          <canvas id="ordersChart" height="150"></canvas>
        </article>
      </div>
      <!-- start of orders chart -->
    </div>
    <!-- end of orders row -->

    <!-- revenue row -->
    <!-- start of revenue stats -->
    <div class="row card flex-row">
      <div class="col-lg-5">
        <div class="card-body mb-2">
          <article class="card-body ">
            <h3 class="card-title">Revenue </h3>
            <div class="card-stats">

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h4>Total Revenue</h4>
                  </div>
                </div>

                <div class="d-flex align-items-center">
                  <div class="stat-value-main">
                    <span>{{$all_balance}}</span>
                  </div>
                  <span>L.E</span>
                </div>
              </div>

              <hr>

              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Base Revenue</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$balnce_all}}</span>
                  </div>
                  <span>L.E</span>
                </div>
              </div>
              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <div class="stat-name">
                    <h5>Sellers Profit</h5>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="stat-value-sub">
                    <span>{{$balnce}}</span>
                  </div>
                  <span>L.E</span>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
      <!-- end of revenue stats -->

      <!-- start of revenue chart -->
      <div class="col-lg-7">
        <article class="card-body">
          <h4 class="card-title chart">Revenue Over Time</h4>
          <canvas id="revenueChart" height="150"></canvas>
        </article>
      </div>
      <!-- start of revenue chart -->
    </div>
    <!-- end of revenue row -->


</main>

@endsection

@section('scripts')

<script>
  (function($) {
  "use strict";

  /*Start products chart*/
  if ($('#productsChart').length) {
    var ctx = document.getElementById("productsChart");
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Product One", "Product Two", "Product Three"],
        datasets: [{
          backgroundColor: ["#5897fb", "#7bcf86", "#fb5858"],
          data: [250, 150, 100]
        }]
      },

      options: {}
    });
  } //end if -- product chart

  /*Start users chart*/
  if ($('#usersChart').length) {
    var ctx = document.getElementById('usersChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Users Registered',
          tension: 0.3,
          fill: true,
          backgroundColor: 'rgba(4, 209, 130, 0.2)',
          borderColor: 'rgb(4, 209, 130)',
          
          data: [
            @foreach ($uc as $i)
              {{$i}},
            @endforeach]
        }]
      },
      options: {
        plugins: {
          legend: {
            labels: {
              usePointStyle: true,
            },
          }
        }
      }
    });
  } //End if -- users chart

  /*Start sellers chart*/
  if ($('#sellersChart').length) {
    var ctx = document.getElementById('sellersChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Sellers Registered',
          tension: 0.3,
          fill: true,
          backgroundColor: 'rgb(44, 120, 220, 0.2)',
          borderColor: 'rgb(44, 120, 220)',
         
          data: [
            @foreach ($sc as $i)
              {{$i}},
            @endforeach
         ]
        }]
      },
       
      options: {
        plugins: {
          legend: {
            labels: {
              usePointStyle: true,
            },
          }
        }
      }
    });
  } //End if -- sellers chart

  /*Start stores chart*/
  if ($('#storesChart').length) {
    var ctx = document.getElementById('storesChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Stores Created',
          tension: 0.3,
          fill: true,
          backgroundColor: 'rgba(380, 200, 230, 0.2)',
          borderColor: 'rgb(380, 200, 230)',
          data: [
            @foreach ($storesChartr as $i)
              {{$i}},
            @endforeach
          ]
        }]
      },
      options: {
        plugins: {
          legend: {
            labels: {
              usePointStyle: true,
            },
          }
        }
      }
    });
  } //End if -- stores chart

  /*Start orders chart*/
  if ($('#ordersChart').length) {
    var ctx = document.getElementById('ordersChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Manual',
            tension: 0.3,
            fill: true,
            backgroundColor: 'rgb(44, 120, 220, 0.2)',
            borderColor: 'rgb(44, 120, 220)',
            data: [
              @foreach ($ordersChartManualr as $i)
              {{$i}},
            @endforeach
              
            ]
          },
          {
            label: 'Organic',
            tension: 0.3,
            fill: true,
            backgroundColor: 'rgba(4, 209, 130, 0.2)',
            borderColor: 'rgb(4, 209, 130)',
            data: [
              @foreach ($ordersOrganicChartManualr as $i)
              {{$i}},
            @endforeach
              
            ]
          }
        ]
      },
      options: {
        plugins: {
          legend: {
            labels: {
              usePointStyle: true,
            },
          }
        }
      }
    });
  } //End if -- orders chart


  /*Start revenue chart*/
  if ($('#revenueChart').length) {
    var ctx = document.getElementById('revenueChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Total Revenue',
            tension: 0.3,
            fill: true,
            backgroundColor: 'rgb(44, 120, 220, 0.2)',
            borderColor: 'rgb(44, 120, 220)',
            data: [18, 17, 4, 3, 2, 20, 25, 31, 25, 22, 20, 9]
          },
          {
            label: 'Base Revenue',
            tension: 0.3,
            fill: true,
            backgroundColor: 'rgb(70, 220, 44, 0.2)',
            borderColor: 'rgb(70, 220, 44)',
            data: [40, 20, 17, 9, 23, 35, 39, 30, 34, 25, 27, 17]
          }
        ]
      },
      options: {
        plugins: {
          legend: {
            labels: {
              usePointStyle: true,
            },
          }
        }
      }
    });
  } //End if -- revenue chart

})(jQuery);
    </script>
@endsection