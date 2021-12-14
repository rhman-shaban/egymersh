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
            <p>Details for Order ID: R{{ $order->order_number }}</p>
        </div>
    </div>
    <div class="card">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                    <span>
                        <i class="material-icons md-calendar_today"></i> <b> {{ $order->created_at->diffForHumans() }} - {{ $order->created_at->toDayDateTimeString() }} </b>
                    </span> <br>
                    <small class="text-muted">Order ID: R{{ $order->order_number }}</small>
                    <span class="badge badge-pill" style='background-color: {{ optional($order->status)->color }}' >{{ optional($order->status)->name_en }}</span>
                </div>
                <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                    <form action="{{ route('orders.update_status' , ['order' => $order->id ] ) }}" method='POST'>
                        @csrf
                        @method('PATCH')
                        <select name='order_status_id' class="form-select d-inline-block mb-lg-0 mb-15 mw-200">
                            @foreach ($order_status as $status)
                            <option value="{{ $status->id }}" {{ $order->order_status_id == $status->id ? 'selected="selected"' : '' }} > {{ $status->name_en }} </option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type='submit'>Save</button>
                    </form>
                </div>
            </div>
        </header> <!-- card-header end// -->
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
                                {{ optional($order->user)->name }} <br> {{ optional($order->user)->email }} <br> {{ optional($order->user)->phone }}
                            </p>
                            <a href="{{ route('users.show'  , ['user' => $order->user_id ] ) }}">View profile</a>
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
                                Notes : {{ $order->notes }}
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
                             {{ optional(optional($order->address)->governorate)['name_'.$lang] }} <br>
                             {{ optional($order->address)->city }} <br>
                             {{ optional($order->address)->full_address }} <br>

                         </p>
                         <a href="">View profile</a>
                     </div>
                 </article>
             </div> <!-- col// -->
         </div> <!-- row // -->
         <div class="row">
            <div class="col-lg-12">
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
                            <tr>
                                <th width="20%">Product</th>
                                <th width="25%">Title</th>
                                <th width="5%">Quantity</th>
                                <th width="10%">Unit Price</th>
                                <th width="10%">Color</th>
                                <th width="10%">Size</th>
                                <th width="10%" class="text-end">Total</th>
                                <!-- <th width="5%">download</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $total = 0;
                            @endphp
                            @foreach ($order->items as $item)
                            <tr>
                                <td>
                                    <a class="itemside" href="#">
                                        <div class="left">
                                            <img src="{{ $item->product->image_path }}" class="order-image-download" width="70" height="70" alt="Item">
                                        </div>
                                    </a>
                                </td>
                                <td>
                                Product Name
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}</td>
                                <td>
                                    <span class="btn btn-sm p-3 color-front b-radius"
                                             data-id="" style="background-color: {{ $item->color }};"></span>
                                </td>
                                <td>
                                    {{ $item->size }}
                                </td>
                                <td class="text-end">
                                    {{ number_format(preg_replace('/,/', '', $item->price) * $item->quantity,2) }}
                                    {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}
                                </td>
                                <!-- <td>
                                    <a href="{{ $item->product->image_path }}" download="{{ $item->product->image_path }}" class="btn btn-xs"> <i class="fa fa-download"></i></a>
                                    <a href="{{ $item->product->defult_logo }}" download="{{ $item->product->defult_logo }}" class="btn btn-xs"> <i class="fa fa-download"></i></a>
                                </td> -->
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="4">
                                  <article>
                                    <hr>
                                      <dl class="dlist">
                                          <dt>Client Name:</dt>
                                          <dd> </dd>
                                      </dl>
                                      <dl class="dlist">
                                          <dt>Phone:</dt>
                                          <dd> </dd>
                                      </dl>
                                      <dl class="dlist">
                                          <dt>Governorate</dt>
                                          <dd> <b class="h6"></dd>
                                      </dl>
                                      <dl class="dlist">
                                          <dt>Address:</dt>
                                          <dd>   </dd>
                                      </dl>
                                  </article>

                                </td>

                                <td colspan="4">
                                    <article>
                                      <hr>
                                        <dl class="dlist">
                                            <dt>Subtotal:</dt>
                                            <dd>{{ number_format($order->total_price,2) }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}} </dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt>Shipping cost:</dt>
                                            <dd>{{ number_format($order->shipping,2) }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}</dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt>Total:</dt>
                                            <dd> <b class="h6">{{ number_format($order->total,2) }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}</b> </dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt class="text-muted">Payment Status:</dt>
                                            <dd>
                                                <span class="badge rounded-pill
                                                {{ $item->status == 0 ? 'alert-danger text-danger' : 'alert-success text-success'  }}">
                                                {{ $item->status == 0 ? 'Cash on delivery' : 'Cash on delivery' }} </span>
                                            </dd>
                                        </dl>
                                    </article>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- table-responsive// -->
            </div> <!-- col// -->

            <hr>

            <img src="" id="Ali" width="10">
            <div class="col-lg-12">
                <div class="box shadow-sm bg-light">
                    <h6 class="mb-15">Admins Comments</h6>
                    <p>
                        <ul>
                            @foreach ($order->comments as $comment)
                            <li>
                                <div>
                                    <ul >
                                        <li style="display:inline" >  <a href=""> {{ optional($comment->admin)->name }} </a> </li>
                                        <li style="display:inline" > {{ $comment->created_at->diffForHumans() }}  </li>
                                        <li style="display:inline" >
                                            <form style="display:inline;float: right;" action="{{ route('order_comments.destroy' , ['comment' => $comment->id ] ) }}" method="POST">
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
                <div class="h-25 pt-4">
                    <form action="{{ route('orders.comments.store' , ['order' => $order->id ]) }}" method='POST' >
                        @csrf
                        <div class="mb-3">
                            <label class="mb-2">Add New Comment</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror " name="comment" id="notes" placeholder="Be Informative!"></textarea>
                            @error('comment')

                            <span class='text-danger' > {{ $message }} </span>

                            @enderror
                        </div>
                        <button class="btn btn-primary">Add Comment</button>
                    </form>
                </div>
            </div> <!-- col// -->
        </div>
    </div> <!-- card-body end// -->
</div> <!-- card end// -->


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
                alert('aSome');
                $('.order-image-download').each(function(index) {

                    $('#all-download').attr('download',$(this).attr('src'));

                    $('#all-download').click();

                });//end of download all image

            });//end of click download

        });//end fo document redy function
    </script>

      <script src="{{ asset('plugin/image-processing/html2canvas.js') }}" type="text/javascript"></script>
      <script>
         //click event
         var convertBtn = document.getElementById("convert");
         convertBtn.addEventListener('click', convertToImage);
         //convert table to image
         function convertToImage() {
            var resultDiv = document.getElementById("result");
            html2canvas(document.getElementById("print-order-list"), {
                onrendered: function(canvas) {
                var img = canvas.toDataURL("image/png");
                    result.innerHTML = '<a download="'+img+'" href="'+img+'">Download</a>';
                    $('#Ali').attr('src',img);
                }
            });
         }
      </script>

@endsection
