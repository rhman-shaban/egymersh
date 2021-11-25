<?php

namespace App\Http\Controllers\Seller;
use App\Models\Order_seller;
use App\Models\SellerProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductColor;
use App\Models\product_order;
use App\Models\SellerProductColor;
use App\Models\ProductSize;
use App\Models\Store;
use App\Models\Product;
use App\Models\Governorate;
use App\Models\ShippingCompany;
use App\Models\ShippingCompanyPrice;
use Session;
use Redirect;


use Illuminate\Support\Facades\Auth;

class OrderSellerController extends Controller
{
    public function index()
    {

        $governorates = Governorate::select('id' , 'name_en')->where('active' , 1)->get();
        
        

        return view('store.order' , compact('governorates'));
    }
    //end of index
    public function get_shipping_price( Request $request){
        
        
        $price = ShippingCompanyPrice::where([
                'shipping_company_id'     => 9,
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
        $price_shipping = ShippingCompanyPrice::where([
            'shipping_company_id'     => 9,
            'governorate_id'          => $request->government,
    ])->pluck('price')->first();
    $shipping=Governorate::where('id',$request->government)->pluck('name_en')->first();
        $order = Order_seller::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'government' => $shipping,
            'address' => $request->address,
            'seller_id' => $seller_id,
            'shipping' => $price_shipping,
            'notes' => $request->notes,
            'link' => $request->link  ,
            

        ]);
        

        $order_id=$order->id;
        $total=0 ;
        $profitorder=0 ;
        foreach (session('products') as $keyParent  => $valueParent ){
            foreach ($valueParent as $keyChild  => $valueChild){
                $product = product_order::create([
                    'color' => $valueChild['color'],
                    'size' => $valueChild['size'],
                    'quantity' => $valueChild['quantity'],
                    'price' => $valueChild['price'],
                    'order_id'=>$order_id ,
                    'product_id'=>$keyParent,
                ]);
                $total=($valueChild['quantity']  *  $valueChild['price']) +$total ; 
                $profitorder= ($valueChild['quantity']  *  $valueChild['Profit']) +$profitorder ;   
             }       
        }
        $add_total = Order_seller::findOrFail($order_id);
        $add_total->update([
            'total_price'=>$total ,
            'profit' =>$profitorder ,
        ]);
        
        session()->put('products', []);
        
        if( $order ){
            return response()->json([
                'status' => 'true',
                'msg'    => 'Added Successfully',
                'orderId'=> $order->id
                
                
                
            ]);
            
        }
        
        return redirect('static'); 
        
           
        
        
        
        
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
       
        $products  = session()->get('products', []); //session('products');

        $pfoductInfo = SellerProduct::where('id' , $request->product)->select('title','selling_price','image','price')->first();
        $profit = $pfoductInfo->selling_price + ( $request->price - $pfoductInfo->price );
        
        $requestProduct = [
            'color'     => $request->color,
            'productName'=> $pfoductInfo->title,
            'productId'  => $request->product,
            'size'      => $request->size,
            'price'     => $request->price,
            'quantity'  => $request->quantity,
            'Profit'    => $profit,
        ];
        $products[$request->product][] = $requestProduct;
        
          
        session()->put('products', $products);
        

        return response()->json([
            'data' => $requestProduct,
            'keyChild'    =>  count(session('products')[$request->product])-1,
        ]);

    }
    public function delete_product( Request $request )
    {
        $products = session('products');
        unset($products[$request->parentId][$request->childKey]);

        session()->put('products', $products);
        
        return response()->json([
            'status' => true,
        ]);
    }

    


}
