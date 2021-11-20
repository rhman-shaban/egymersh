@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">statistics</h2>
            
        </div>
        <div>

        </div>
    </div>
<div class="card-body">
          <div class="table-responsive">
            <div class="table-responsive">
              <table class="table align-middle table-nowrap mb-0">
                <thead class="table-light">
                  <tr>
                    <th class="align-middle" scope="col">ID</th>
                    <th class="align-middle" scope="col">Customer Name</th>
                    <th class="align-middle" scope="col">Date</th>
                    <th class="align-middle" scope="col">Status</th>
                    <th class="align-middle" scope="col">Total</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td><a href="{{route('manual.order.show' ,$order -> id )}}" class="fw-bold">M{{$order->id}}</a> </td>
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
                  
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div> <!-- table-responsive end// -->
        </div>


@endsection


@section('scripts')


@endsection