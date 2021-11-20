<?php

namespace App\Http\Controllers\Seller;
use App\Models\Order_seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SellerProduct;
use App\Models\ProductColor;
use App\Models\SellerProductColor;
use App\Models\ProductSize;
use App\Models\Store;
use App\Models\Product;
use App\Models\Governorate;
use App\Models\ShippingCompany;
use App\Models\ShippingCompanyPrice;
use Session;


use Illuminate\Support\Facades\Auth;

class OrderSellerController extends Controller
{
    public function index()
    {

        $governorates = Governorate::select('id' , 'name_en')->where('active' , 1)->get();
        $companies_shipping = ShippingCompany::select('id' , 'name')->where('active' , 1)->get();
        

        return view('store.order' , compact('governorates' ,'companies_shipping'));
    }
    //end of index
    public function get_shipping_price( Request $request){
        
        $price = ShippingCompanyPrice::where([
                'shipping_company_id'     => $request->company_id,
                'governorate_id'          => $request->government,
        ])->pluck('price')->first();
        
        if( $price )
            return response()->json([
                'status' => true,
                'price'=> $price
            ]);

        return response()->json([
            'status' => 'notFount',
        ]);

    }

    public function store_product($id)
    {
        $products = SellerProduct::where('store_id',$id)->get();

        return response()->json(['products' => $products]);

    }//end of store_product

    public function product_details(Request $request)
    {
        //product seller
        $product_seller = SellerProduct::find($request->id);

        $product_color  = SellerProductColor::where('seller_product_id', $product_seller->id)->with('product_color')->get();

        return response()->json(['product' => $product_seller,'colors' => $product_color,]);

    }//end of product_details

    public function chouse_color(Request $request)
    {

        $product_color = ProductColor::find($request->id);

        $product_size  = ProductSize::where('product_id', $product_color->product_id)->with('size')->get();

        return response()->json($product_size);

    }//end of chouse_color

    public function store_order(Request $request)
    {

        $this->validate($request, [
            'name'       => 'required',
            'phone'      => 'required',
            'government'      => 'required',
            'address'      => 'required',            
        ]); 

        $seller_id= Auth::guard('seller')->user()->id;
        $order = Order_seller::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'government' => $request->government,
            'address' => $request->address,
            'seller_id' => $seller_id,

        ]);

        if( $order ){
            return response()->json([
                'status' => 'true',
                'msg'    => 'Added Successfully',
                'orderId'=> $order->id
            ]);
        }



         /*'product'      => 'required',
        'store'      => 'required',
        'color'      => 'required',
        'size'      => 'required',
        'price'      => 'required',
        'quantity'      => 'required',
        ]);*/

        /*$data_product= product_order::create([
            
            'color' => $request->color,
            'size' => $request->size,
            'order_id' => $request->quantity,
            'order_id'=>$request->order_id,

         
        ]);*/
        
        
      
        

    }

    public function add_product( Request $request)
    {
        $this->validate($request, [
            'product'    => 'required',
            'store'      => 'required',
            'color'      => 'required',
            'size'       => 'required',
            'price'      => 'required',
            'quantity'   => 'required',           
        ]); 
       

        $product[$request->product] = [
                'product_id'=> $request->product,
                'color'     => $request->color,
                'size'      => $request->size,
                'price'     => $request->price,
                'quantity'  => $request->quantity
        ];
        $products = session('products');
        $products = $product;
        session()->put('products',$product );
        
        return json_encode( session('products') );
    }

    public function manual_order()
    {
        $order=Order::get();  

    }


}
