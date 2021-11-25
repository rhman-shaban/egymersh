@extends('store.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="row">
        <div class="col-9">
            <div class="content-header">
                <h2 class="content-title">Order</h2>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                 <!-- Button trigger modal -->     

            <form method="POST" id="addProduct" action="{{route('store_product')}}" >
                @csrf
                <div class="card-body" id="add_order" >
                	<div class="mb-4">
                		<h3>Products information</h3> <br>
                        <label class="form-label">Select Store</label>
                        <select class="form-select" name="store"  id="store">
                            <option value="">Select Store</option>
                        	@foreach (App\Models\Store::all() as $store)

                            	<option value="{{ $store->id }}"  data-id="{{ $store->id }}" data-url="{{ route('order.seller.store',$store->id) }}">{{ $store->name }}</option>
                        		
                        	@endforeach
                        </select>
                        <span id="msg_validate_store" class="invalid-input  msg_validate"></span>
                    </div>
                    <div class="mb-4">
                        <label for="product_title" class="form-label">Select Product</label>
                        <select class="form-select" name="product" id="product">
                            <option value="">Select Store befor</option>
                        </select>
                        <span id="msg_validate_product" class="invalid-input  msg_validate"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-4  mb-3">
                            <div class="mb-4">
		                    	<div class="left">
		                            <img width="150" id="product-order-image" src="" class="img-thumbnail" alt="Item">
		                        </div>
		                    </div>
                        </div>
                        <input type="" id="input-color" name="color" hidden="">
                        <div class="col-md-4  mb-3">
                            <label for="product_sku" class="form-label">color</label> <br>
                            <div id="product-order-color">
                            </div>
                        </div>
                        
                        <div class="col-md-4  mb-3">
                            <label for="product_sku" class="form-label">size</label> <br>
                            <div id="product-order-size-item">
                            
                            </div>
                        </div>

                        <div class="row col-12">

		                    <div class="mb-4 col-6">
		                        <label class="form-label">Unit Price</label>
		                        <input type="number" name="price" id="price" min="" placeholder="Type here" class="form-control">
                                <span id="msg_validate_price" class="invalid-input  msg_validate"></span>
                            </div>

		                    <div class="mb-0 col-6">
		                        <label class="form-label">Quantity</label>
		                        <input type="number" id="quantity" name="quantity" min="1" placeholder="Type here" class="form-control">
                                <span id="msg_validate_quantity" class="invalid-input  msg_validate"></span>
                            </div>
		                    <div class="">
		                    </div>
                         
	                    </div>
                    </div>                    
                    <a  class="test btn btn-primary addProduct" onclick="add_product('#addProduct' )">+</a>
                </form>                
                <hr>
                <div class="card-body">
                    <form method="POST" id="addOrderSeller" action="{{route('store.order')}}">
                    @csrf
                    <div class="card-body">                   
                        <div class="mb-4">
                            <h3>Client information</h3> <br>
                            <label class="form-label">Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter client name" class="form-control">
                            <span id="msg_validate_name" class="invalid-input  msg_validate"></span>
                        </div>
                        <div class="row">

                            <div class="mb-4 col-6">
                                <label class="form-label">Phone</label>
                                <input type="phone" id="phone" name="phone" placeholder="Enter client phone number" class="form-control">
                                <span id="msg_validate_phone" class="invalid-input  msg_validate"></span>
                            </div>

                            <div class="mb-4 col-6">
                                <label class="form-label">Government</label>
                                <select class="form-select" name="government"  id="government">
                                    <option value="">Select government</option>
                                    @foreach( $governorates as $governorate)
                                        <option value="{{$governorate->id}}">{{$governorate->name_en}}</option>
                                    @endforeach
                                </select>
                                <span id="msg_validate_government" class="invalid-input  msg_validate"></span>
                            </div>
                           

                        </div>
                  
                        <div class="mb-0">
                            <label class="form-label">Address</label>
                            <input type="text" id="address" name="address" placeholder="Enter client shipping address" class="form-control">
                            <span id="msg_validate_address" class="invalid-input  msg_validate"></span>
                        </div>
                    </div>
                    <p> 
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Additional Information
                    </a>
                        
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                                <label class="form-label">Notes<span class="text-success">"Optional"</span></label>
                            <textarea placeholder="Additional notes about the order" id="notees" name="notees" class="form-control"></textarea>
                            <span id="msg_validate_notees" class="invalid-input  msg_validate"></span>

                            <label class="form-label">Page link<span class="text-success">"Optional"</span></label>
                        <input type="text" id="link" name="link" placeholder="Enter your Facebook page link" class="form-control">
                        <span id="msg_validate_link" class="invalid-input  msg_validate"></span>
                        </div>
                    </div>           
                
                    <a  class="test btn btn-primary addOrder " onclick="add_order('#addOrderSeller' )">Add Order </a>
                </form>
                </div>           
            
            </div>
            
        </div> <!-- card end// -->
        </div>
        <div class="col-lg-6">
            <div class="card mb-4" style="position:fixed;">
                    <article class="itemlist" id="add-item-product-order">
                    <table class="table" id="print-order-list">
                        <thead>
                            <tr>
                                <th >Product</th>
                                <th >Unit Price</th>
                                <th >Quantity</th>
                                <th >color</th>
                                <th >size</th>                               
                                <th>Total</th>
                                <th>profit</th>
                                <th>T profit</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tb_products" >
                            @if( session('products') )
                                @foreach (session('products') as $keyParent  => $valueParent )
                                    @foreach ($valueParent as $keyChild  => $valueChild)
                                    <tr id="{{$keyParent}}-{{$keyChild}}">
                                        
                                        <td >
                                            {{$valueChild['productName']}}
                                        </td>
                                        <td>{{$valueChild['price']}}</td>
                                        <td>{{$valueChild['quantity']}}</td>
                                        <td>
                                            <span class="btn btn-sm p-3  b-radius"
                                                style="background-color:{{$valueChild['color']}}">
                                            </span>                                    
                                        </td>
                                        <td>{{$valueChild['size']}}</td>
                                        <td class="totalPrice" > {{$valueChild['price'] * $valueChild['quantity']}}</td>
                                        <td>{{$valueChild['Profit']}}</td>
                                        <td class="totalProfit" >{{$valueChild['Profit'] * $valueChild['quantity'] }}</td>
                                        <td>
                                            <button parenKey="{{$keyParent}}" childKey = "{{$keyChild}}" title="Delete Product" class="btn btn-danger btn-xs delete-product"> <i class='fas fa-trash-alt' ></i> </button>  
                                        </td>
                                    </tr>
                                    @endforeach
                                @endforeach
                            @endif
                        </tbody>
                    </table>
            <div class="">
                <!-- itemlist  .// -->
                <tr>
                    <td colspan="4">
                        <article class="my-4">
                            {{-- float-end class --}}
                            <dl class="dlist">
                                <dt>Products price :</dt>
                                <dd id="totalPrice" >$973.35</dd>
                            </dl>
                            <dl class="dlist">
                                <dt>Shipping:</dt>
                                <dd id="shippingCost" > </dd>
                            </dl>
                            <dl class="dlist">
                                <dt class="text-success">Total profit:</dt>
                                <dd id="totalProfit" class="text-success">$983.00</dd>
                            </dl>
                            <dl class="dlist">
                                <dt>Total cost:</dt>
                                <dd id="totalCost" > </dd>
                            </dl>
                        </article>
                    </td>
                </tr>
                </div>
            </div> <!-- card end// -->
            </article>
        </div>
    </div>
   

</section>

<!-- Modal -->
<div class="modal fade" id="msgSuccessul" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="txt-msg"class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">OK</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('store_assets/assets/js/customJs.js')}}" type="text/javascript"></script>
</script>$('.collapse').collapse()</script>
<script type="text/javascript">
    var _token = "{{csrf_token()}}";
    var shipping_price ="";
    var indexChildKey = 0;
    var shipping = 0;
    function total_profit_price( shipping ){
        var totalPrice =0 ;
        var totalProfit = 0;

        $('.totalPrice').each(function(){
            totalPrice += parseFloat($(this).html());
        });

        $('.totalProfit').each(function(){
            totalProfit += parseFloat($(this).html());
        });

        $("#totalPrice").html(totalPrice);
        $("#totalProfit").html(totalProfit);
        $("#totalCost").html(parseFloat(totalPrice) + parseFloat(shipping) );
        
    }
    
    $( "#tb_products" ).delegate( ".delete-product", "click", function() {
        var parentId = $(this).attr( 'parenKey');
        var childKey = $(this).attr( 'childKey');

        $.ajax({
            type: "delete",
            url: '{{route("delete_product")}}',
            data: {'_token':_token,'parentId':parentId ,'childKey':childKey},
            dataType: 'json',
            success : function( response ) {
                if (response.status === true) {
                    $( "#"+parentId+'-'+childKey ).remove();
                    total_profit_price( shipping);
                }
            }
        });
    });

 

    $("#government").change(function(){
       // $("#shipping_company").val('');
       // $("#shipping_price").text('');

       // shipping_price = '';
              
        var government = $("#government").val();
        
        
            var government = $(this).val();

            $.ajax({
                type: "POST",
                url: '{{route("get.price")}}',
                data: {'_token':_token,'government':government},
                dataType: 'json',
                success : function( response ) {
                    if (response.status === true) {
                        $("#shippingCost").text(response.price);
                        $("#shipping_price").text(response.price);
                        shipping_price = response.price

                        shipping = response.price;
                        total_profit_price( shipping );
                    }
                }
            });
        
    });
    var ordeId='';
    

    function add_product( formId ){
        post_ajax( formId , 'update'  ).done(function(data) {

            var result = data.data
            $("#tb_products").append(
                '<tr id="'+result.productId+'-'+data.keyChild+'">'+                                        
                    '<td>'+ result.productName +'</td>'+
                    '<td>'+result.price+'</td>'+
                    '<td>'+result.quantity+'</td>'+
                    '<td>'+
                        '<span class="btn btn-sm p-3  b-radius"'+
                            'style="background-color:'+result.color+'">'+
                        '</span>'+                                   
                    '</td>'+
                    '<td>'+result.size+'</td>'+
                    '<td class="totalPrice" >'+parseInt(result.price) * parseInt(result.quantity)+'</td>'+
                    '<td>'+result.Profit+'</td>'+
                    '<td class="totalProfit">'+parseInt(result.Profit) * parseInt(result.quantity)+'</td>'+
                    '<td>'+
                        '<button parenKey="'+result.productId+'" childKey = "'+data.keyChild+'" title="Delete Product" class="btn btn-danger btn-xs delete-product"> <i class="fas fa-trash-alt" ></i> </button> '+ 
                    '</td>'+
                '</tr>'
            );
            total_profit_price( shipping);

        }).fail(function() {

        });
    }

    function add_order( formId ){
        post_ajax( formId , 'update'  ).done(function(result) {

            if ( result.status == 'true' ){
                
               $("#order_id").val( result.orderId );
               $("#txt-msg").html(  result.msg );
               $('#msgSuccessul').modal('show');
               location.reload();

               
            }

        }).fail(function() {

        });
    }
    

    $(document).ready(function() {

        $('#product').on('change', function (e) {
            e.preventDefault();
        });
        $( "#product-order-color" ).click(function() {
            var color = $(this).children().attr( 'data-color');
            $("#input-color").val(color);
        });
        
        
        $(document).on('click','.test',function(e) {
            $(':input','#add_order') .not(':button, :submit, :reset, :hidden') .val('').prop('checked', false).prop('selected', false);
        });

        $('#store').on('change', function (e) {
            e.preventDefault();

            var $option  = $(this).find(":selected");
            var id       = $option.data('id');
            var url      = $option.data('url');
            var method   = 'get';

            $.ajax({
                url: url,
                method: method,
                success: function(data) {

                	$('#product').empty('');
                    $('#product').append('<option value="">Select product</option>');
				    $.each(data.products, function(index, product) {

                		$('#product').append('<option value="'+product.id+'" data-id="'+product.id+'">'+product.title+'</option>');
                        
                    });
                   
                }//end of success

            });//end of ajax

        });//end of change store

        $('#product').on('change', function (e) {
            e.preventDefault();

            var $option  = $(this).find(":selected");
            var id       = $option.data('id');
            var url      = "{{ route('order.seller.product') }}";
            var method   = 'get';

            $.ajax({
                url: url,
                method: method,
                data:{id:id},
                success: function(data) {

                	$('#product-order-image').attr('src',data.product.image_path);

                	$('#product-order-color').empty('');
                    
                    $('#price').val(data.product.price);

                    $('#price').attr('min',data.product.price);
                	
                    $.each(data.colors, function(index, color) {

                		$('#product-order-color').append('<span data-color="'+color.product_color.color+'" data-color-id="'+color.product_color.id+'" class="btn btn-sm p-3 m-2 color-front product-order-size" style="background-color:'+color.product_color.color+';"></span>');
                        
                    });
                   
                }//end of success

            });//end of ajax

        });//end of change store

        $(document).on('click','#add-cart-order',function(e) {
            e.preventDefault();

                //calculate the total        
            calculateTotal();

            var html = '<div class="row align-items-center mb-5">'+
                            '<div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">'+
                                '<a class="itemside" href="#">'+
                                    '<div class="left">'+
                                        '<img src="http://127.0.0.1:8000/uploads/seller_products_image/1633179135.png" class="img-sm img-thumbnail" alt="Item">'+
                                    '</div>'+
                                    '<div class="info">'+
                                        '<h6 class="mb-0">Title</h6>'+
                                    '</div>'+
                                '</a>'+
                            '</div>'+
                            '<div class="col-lg-2 col-sm-2 col-4 col-price"> <span>$34.50</span> </div>'+
                            '<div class="col-lg-2 col-sm-2 col-4 col-status">'+
                                {{-- <span class="btn btn-sm p-3 color-front b-radius" data-id="" style="background-color: green;"></span> --}}
                                '<span class="btn btn-sm p-3 color-front b-radius" data-id="" style="background-color: yellow;"></span>'+
                            '</div>'+
                            '<div class="col-lg-1 col-sm-2 col-4 col-date">'+
                                {{-- <span class="btn btn-sm">Lg</span> --}}
                                {{-- <span class="btn btn-sm">SM</span> --}}
                                '<span class="btn btn-sm">XL</span>'+
                            '</div>'+
                            '<div class="col-lg-2 col-sm-2 col-4 col-action text-end">'+
                                '<a href="#" class="btn btn-sm font-sm btn-light rounded">'+
                                    '<i class="material-icons md-delete_forever"></i>'+
                                '</a>'+
                            '</div>'+
                        '</div>';
        
            $('#add-item-product-order').append(html);

        });//end of on click

        function calculateTotalColor() {

            var color = '';

            $('.b-radius').each(function(index) {
                
                // price += $(this).data('size') + ',';

            });//end of product price


        }//end of calculate total

        

        function calculateTotalCSize() {

            var size = '';

            $('.bg-btn-size').each(function(index) {
                
                size += $(this).data('size') + ',';

            });//end of product price


        }//end of calculate total


        $(document).on('click','.product-order-size',function(e) {
	        e.preventDefault();
	        var url     = "{{ route('chouse.color.size') }}";
	        var id      = $(this).data('color-id');
	        var method  = 'get';
	        
	        $.ajax({
	            url: url,
	            method: method,
	            data:{id:id},
	            success: function (data) {

	                $('#product-order-size-item').empty('');
	                // $('#size-product-item-none').removeClass('d-none');

	                $.each(data, function(index, product) {

	                	//$('#product-order-size-item').append('<span class="btn btn-sm size-btn" data-size="'+product.size.name+'" data-size-id="'+product.size.id+'">'+product.size.name+'</span>');
                        $('#product-order-size-item').append('<input type="radio" class="product-size" name="size" value="'+product.size.name+'"> <label > '+product.size.name+'</label><br>');
	                     
	                });//end of each

	            }//end fof success
	        });//endي dof ajax

	    });//end of on click

        $(document).on('click','.size-btn', function(e) {
            e.preventDefault();

            var sizeId = $(this).data('size-id');
            var size   = $(this).data('size');
            
            $(this).toggleClass('bg-btn-size');

        });//end of click color-front

        $(document).on('click','.color-front', function(e) {
            e.preventDefault();

            var color = $(this).data('color-id');
            var colorID = $(this).data('color');
            
            $(this).toggleClass('b-radius');
            // $('#input-color').val(color);
            // $('#input-color-id').val(colorID);

        });//end of click color-front
                
    });//end of document redy 

    total_profit_price( shipping);
</script>
@endsection