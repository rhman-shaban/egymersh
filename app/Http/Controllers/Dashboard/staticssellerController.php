<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\SellerProduct;
use App\Models\wallet;
use App\Models\OrderStatus;
use App\Models\OrderItem;
use App\Models\order_seller;
use App\Models\product_order;
use App\Models\Order;
use DB;
class staticssellerController extends Controller
{
 
    public function index()
    {
       
        $seller_id=Auth::guard('seller')->user()->id;
        $get_product=OrderItem::select('seller_products_id')->get();
        $sales=SellerProduct::where('seller_id',$seller_id)->wherein('id',$get_product)->get();
        $Id = $sales->pluck('id')->toArray();
        $getids=OrderItem::wherein('seller_products_id',$Id)->get();
        $ids = $getids->pluck('order_id')->toArray();
        $orderid=Order::wherein('id',$ids)->select('order_status_id')->get();
        $status=OrderStatus::wherein('id',$orderid)->get();
        //end
        //order manual 
        $orders=order_seller::where('seller_id' ,$seller_id)->get();
        $sumProfit =order_seller::select(DB::raw('sum(profit) as "profit"')
        ,DB::raw('MONTH(created_at) month'))->groupby('month')->get();
        

        $order    =Order::where('order_status_id','4')->pluck('id')->toarray();
        $product = OrderItem::wherein('order_id', $order)->pluck('seller_products_id')->toarray();
        $details = SellerProduct::wherein('id',$product)->where('seller_id' ,$seller_id)->pluck('selling_price')->sum();
        $order_seller    =order_seller::where('status','delivred')->pluck('id')->toarray();
        $product_order = product_order::wherein('order_id',$order_seller)->pluck('product_id')->toarray();
        $profit_seller =SellerProduct::wherein('id',$product_order)->pluck('selling_price')->sum();
        $price=wallet::where('status_en','confirmed')->sum('price');
        $profit=$details + $profit_seller; 
        
        $manual_order=$orders->count('id');
        $numperofsale=$sales->count('id');
        $all_product=SellerProduct::where('seller_id' ,$seller_id)->count('id'); 

        
      
                
        return view('store.sellerstatics' ,compact(
            'profit','sales','status','manual_order','orders','numperofsale','sumProfit','all_product'
        ));



  
    }
    public function delete_order($id)
    {
        $order = order_seller::findOrFail($id)->delete();
        return back()->with('success'  , 'Order Deleted successfully' ); 
        
    }
}
