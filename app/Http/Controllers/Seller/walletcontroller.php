<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wallet;
use App\Models\SellerProduct;
use App\Models\order_seller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\product_order;
use Illuminate\Support\Facades\Auth;
use App\Model;


class walletcontroller extends Controller
{

    public function index()
    {
        $seller_id=Auth::guard('seller')->user()->id;
        $order    =Order::where('order_status_id','4')->pluck('id')->toarray();
        $product = OrderItem::wherein('order_id', $order)->pluck('seller_products_id')->toarray();
        $details = SellerProduct::wherein('id',$product)->where('seller_id' ,$seller_id)->pluck('selling_price')->sum();
        $order_seller    =order_seller::where('status','delivred')->pluck('id')->toarray();
        $product_order = product_order::wherein('order_id',$order_seller)->pluck('product_id')->toarray();
        $profit_seller =SellerProduct::wherein('id',$product_order)->pluck('selling_price')->sum();
        $price=wallet::where('status_en','confirmed')->sum('price');
        $balnce=$details + $profit_seller; 
        $profit=$balnce -$price;

//get price is done confirmed

       ///// exepted   !=
        $order_expected    =Order::wherein('order_status_id',  [1,2,3])->pluck('id')->toarray();
        $product_expected = OrderItem::wherein('order_id', $order_expected)->pluck('seller_products_id')->toarray();
        $details_expected = SellerProduct::wherein('id',$product_expected)->where('seller_id' ,$seller_id)->pluck('selling_price')->sum();
        $array=array("Poccessing", "Preparing", "shipped");
        $order_seller_expected    =order_seller::wherein('status', $array)->pluck('id')->toarray();
        $product_order_expected = product_order::wherein('order_id',$order_seller_expected)->pluck('product_id')->toarray();
        $profit_seller_expected =SellerProduct::wherein('id',$product_order_expected)->pluck('selling_price')->sum();
        $balnce_expected=$details_expected + $profit_seller_expected;


        ///pending order
        $pending=count($order_expected) +count($order_seller_expected);
        

        ////request datat
        $wallets=wallet::where('seller_id',$seller_id)->get();
        //d

        return view('store.wallet' ,compact('profit','balnce_expected','pending','wallets'));
    }
    public function create(Request $request){
        $seller_id=Auth::guard('seller')->user()->id;
        $this->validate($request, [
            'price' => 'required',
            'phone' => 'required',
            'payway' => 'required',
        
         ]);

        //  Store data in database
        wallet::create([
            'payway' => $request-> payway,
            'price' => $request->price,
            'phone' => $request->phone,
            'seller_id'=>$seller_id
            ]);
        
        return back()->with('success', 'you are send request and we will confirm your request soon');


    }
    public function confirm(){

        $wallets=wallet::get();

        return view('dashboard.request' ,compact('wallets'));
    }
    public function update(Request $request){
        $id=$request->id ;
        $wallet = wallet::findOrFail($id);
        $wallet->update([
            'message' => $request-> message,
            'status_en' => $request-> status,
        ]);
        return back()->with('success'  , 'changes added' );  
           
      
          
        
    }
    


}


