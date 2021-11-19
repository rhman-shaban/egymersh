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
                        <i class="material-icons md-calendar_today"></i> <b>  </b>
                    </span> <br>
                    <small class="text-muted">Order ID:</small>
                    <span class="badge badge-pill" style='background-color' ></span>
                </div>
                <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                    
                        @csrf
                        @method('PATCH')
                        <select name='order_status_id' class="form-select d-inline-block mb-lg-0 mb-15 mw-200">
                            
                            <option> jnjnln</option>
                            <option> nklnl</option>
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
                                 <br>  <br> 
                            </p>
                            <a href="">View profile</a>
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
                             

                         </p>
                         <a href="">View profile</a>
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
                                <td>
                                    <a class="itemside" href="#">
                                        <div class="left">
                                            <img src="" class="order-image-download" width="70" height="70" alt="Item">
                                        </div>
                                    </a>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                 <div class="col-lg-2 col-sm-2 col-4 col-status"> 
                                            <span class="btn btn-sm p-3 color-front b-radius"
                                             data-id="" style="background-color"></span>
                                         </div> 
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td class="text-end"> 
   
                                </td>
                                <td>
                                    <a href="" download="" class="btn btn-xs"> <i class="fa fa-download"></i></a>
                                    <a href="" download="" class="btn btn-xs"> <i class="fa fa-download"></i></a>
                                </td>
                            </tr>
                            


                            <tr>
                                <td colspan="4">
                                    <article class="float-end">
                                        <dl class="dlist">
                                            <dt>Subtotal:</dt>
                                            <dd> </dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt>Shipping cost:</dt>
                                            <dd>00.00</dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt>Grand total:</dt>
                                            <dd> <b class="h5">$983.00</b> </dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt class="text-muted">Payment Status:</dt>
                                            <dd>
                                                <span class="badge rounded-pill 
                                                "> 
                                                </span>
                                            </dd>
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
                          
                            <li>
                                <div>
                                    <ul >   
                                        <li style="display:inline" >  <a href=""> </a> </li>
                                        <li style="display:inline" >  </li>
                                        <li style="display:inline" > 
                                            <form style="display:inline;float: right;"
                                                
                                                <button class="btn btn-danger btn-xs delete"> <i class='fas fa-trash-alt' ></i> </button>  
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <span class='lead' >  </span>
                            </li>
                            <hr>
                            
                        </ul>
                    </p>
                </div>
                <div class="h-25 pt-4">
                        
                        <div class="mb-3">
                            <label>Notes</label>
                            <textarea class="form-control  " name="comment" id="notes" placeholder="Type some note"></textarea>
                           
                        </div>
                        <button class="btn btn-primary">Add Comment</button>
                    </form>
                </div>
            </div> <!-- col// -->
        </div>
    </div> <!-- card-body end// -->
</div>
</section>


@endsection


@section('scripts')