@extends('dashboard.layouts.master')
@php
$lang = LaravelLocalization::getCurrentLocale();
@endphp
@section('page_content')
<section class="content-main">
    @include('dashboard.layouts.messages')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Order detail</h2>
            <p>Details for Order ID: {{ $orders->id }}</p>
        </div>
    </div>
    <div class="card">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                    <span>
                        <i class="material-icons md-calendar_today"></i> <b>{{ $orders->created_at->diffForHumans() }} - {{ $orders->created_at->toDayDateTimeString() }}  </b>
                    </span> <br>
                    <small class="text-muted">Order ID: {{ $orders->id }}</small>
                    <span class="badge badge-pill" style='background-color' >{{ $orders->status }}</span>
                </div>
                <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                <form action="{{ route('update.orders' , $orders->id ) }}" method='POST'>
                        @csrf
                        <select name='status' class="form-select d-inline-block mb-lg-0 mb-15 mw-200">
                            <option>Poccessing </option>
                            <option>Preparing </option>
                            <option>Shipped </option>
                            <option>Delivered </option>
                            <option>Cancelled </option>
                        </select>
                        <button class="btn btn-primary" type='submit'>Save</button>
                    </form>
                </div>
            </div>
        </header>
        <div class="card-body">
            <div class="row mb-50 mt-20 order-info-wrap">
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-person"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Customer</h6>
                            <p class="mb-1">
                                 {{$orders->name}}<br>{{$orders->phone}}  <br>
                            </p>
                        </div>
                    </article>
                </div> <!-- col// -->
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-local_shipping"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Order info</h6>
                            <p class="mb-1">
                            Notes : {{ $orders->notes }}
                            </p>
                        </div>
                    </article>
                </div> <!-- col// -->
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-place"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Deliver to Address</h6>
                            <p class="mb-1">
                             {{$orders->government}}<br>{{$orders->address}}

                         </p>
                     </div>
                 </article>
             </div> <!-- col// -->
         </div> <!-- row // -->
         <div class="row">
            <div class="col-lg-7">
                <div class="table-responsive">
                    <td>
                        <a class="btn btn-xs btn-print"> <i class="fa fa-print"></i></a>
                        {{-- <a class="btn btn-xs btn-print"> <i class="fa fa-file-image"></i></a> --}}
                        <button id="convert" class="btn btn-xs">
                            <i class="fa fa-file-image"></i>
                        </button>
                        <a class="btn btn-xs btn-print" id="all-download"> <i class="fa fa-download"></i></a>
                              <div id="result">
                                 <!-- Result will appear be here -->
                              </div>
                    </td>
                    <table class="table" id="print-order-list">
                        <thead>
                        @php
                            $total = 0;
                            @endphp

                            <tr>
                                <th width="40%">Product</th>
                                <th width="20%">Unit Price</th>
                                <th width="20%">Quantity</th>
                                <th width="20%">color</th>
                                <th width="20%">size</th>
                                <th width="20%" class="text-end">Total</th>
                                <th width="20%" class="text-end">download</th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr>
                            @foreach ($orders->product_order as $item)
                                <td>
                                    <a class="itemside" href="#">
                                        <div class="left">
                                            <img src="{{ $item->SellerProduct->image_path }}" class="order-image-download" width="70" height="70" alt="Item">
                                        </div>
                                    </a>
                                </td>

                                <td>{{ $item->price }}</td>


                                <td>{{ $item->quantity }}</td>

                                <td>
                                 <div class="col-lg-2 col-sm-2 col-4 col-status">
                                            <span class="btn btn-sm p-3 color-front b-radius"
                                             data-id="" style="background-color: {{ $item->color }};"></span>
                                         </div>

                                </td>
                                <td>
                                {{ $item->size }}
                                </td>
                                <td class="text-end">
                                {{ number_format($item->price * $item->quantity) }}
                                </td>
                                <td>
                                    <a href="" download="" class="btn btn-xs"> <i class="fa fa-download"></i></a>
                                    <a href="" download="" class="btn btn-xs"> <i class="fa fa-download"></i></a>
                                </td>
                            </tr>
                            @endforeach



                            <tr>
                                <td colspan="4">
                                    <article class="float-end">
                                        <dl class="dlist">
                                            <dt>Subtotal:</dt>
                                            <dd> {{$orders->total_price}}</dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt>Shipping cost:</dt>
                                            <dd>{{$orders->shipping}}</dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt>Grand total:</dt>
                                            <dd> <b class="h5">{{number_format($orders->total_price+$orders->shipping)}}</b> </dd>
                                        </dl>
                                        <dl class="dlist">

                                            <dt>Shipping cost:</dt>
                                               <dd> {{$orders->status}} </dd>

                                            </dt>
                                        </dl>
                                    </article>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- table-responsive// -->
            </div> <!-- col// -->
            <img src="" id="Ali" width="10">
            <div class="col-lg-12">
                <div class="box shadow-sm bg-light">
                    <h6 class="mb-15">Comments on Order</h6>
                    <p>
                        <ul>
                            @foreach ($orders->comments as $comment)
                            <li>
                                <div>
                                    <ul >
                                        <li style="display:inline" >  <a href=""> {{ optional($comment->admin)->name }} </a> </li>
                                        <li style="display:inline" > {{ $comment->created_at->diffForHumans() }}  </li>
                                        <li style="display:inline" >
                                            <form style="display:inline;float: right;" action="{{ route('manual_comments.destroy' , $comment->id ) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-xs delete"> <i class='fas fa-trash-alt' ></i> </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <span class='lead' > {{ $comment->comment }}  </span>
                            </li>
                            <hr>
                            @endforeach
                        </ul>
                    </p>
                </div>
                <div class="mb-0">
                    <form action="{{ route('stoe.comment' , $orders->id ) }}" method='POST' >
                        @csrf
                        <div class="mb-3">
                            <label>Notes</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror " name="comment" id="notes" placeholder="Type some note"></textarea>
                            @error('comment')

                            <span class='text-danger' > {{ $message }} </span>

                            @enderror
                        </div>
                        <button class="btn btn-primary">Add Comment</button>
                    </form>
                </div>

                <div class="mb-0">
                    <form action="{{ route('store.message' , $orders->id ) }}" method='POST' >
                        @csrf
                        <div class="mb-3">
                            <label>message</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror " name="message" id="notes" placeholder="Type some message"></textarea>
                            @error('comment')

                            <span class='text-danger' > {{ $message }} </span>

                            @enderror
                        </div>
                        <button class="btn btn-primary">Add message</button>
                    </form>
                </div>
            </div> <!-- col// -->
        </div>
    </div> <!-- card-body end// -->
</div>
</section>


@endsection


@section('scripts')
<script type="text/javascript">
        $(document).ready(function() {

            $(document).on('click','.btn-print', function (e) {
                e.preventDefault();

                $('#print-order-list').printThis();

            });

            $(document).on('click','#all-download', function (e) {
                e.preventDefault();

                $('.order-image-download').each(function(index) {

                    $('#all-download').attr('download',$(this).attr('src'));

                    $('#all-download').click();

                });//end of download all image

            });//end of click download

        });//end fo document redy function
    </script>

@endsection
