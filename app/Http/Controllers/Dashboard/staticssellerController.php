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
        $orders=order_seller::where('seller_id' ,$seller_id)->orderBy('id', 'DESC')->get();
        $sumProfit =order_seller::where('seller_id' ,$seller_id)->where('status' ,'Delivered')->select(DB::raw('sum(profit) as "profit"')
        ,DB::raw('MONTH(created_at) month'))->groupby('month')->get();


        $order    =Order::where('order_status_id','4')->pluck('id')->toarray();
        $product = OrderItem::wherein('order_id', $order)->get();
        $details=0;
        foreach($product as $i){
            if($i->product->seller_id==$seller_id)
            $details =($i->product->selling_price+  $details) *$i->quantity;
        }

        $order_seller    =order_seller::where('status','Delivered')->sum('profit');
        $price=wallet::where('status_en','confirmed')->sum('price');
        $profit=$details + $order_seller;

        $manual_order=$orders->count('id');
        $numperofsale=$sales->count('id');
        $all_product=SellerProduct::where('seller_id' ,$seller_id)->count('id');




        return view('store.sellerstatics' ,compact(
            'profit','sales','status','manual_order','orders','numperofsale','sumProfit','all_product'
        ));




    }
    public function delete_order($id)
    {

        $doctor = order_seller::findOrFail($id)->delete();
        return back()->with('success'  , 'Order Deleted successfully' );

    }
    public function show($id)
    {
        $orders=order_seller::find($id);
        return view('store.showorder', compact('orders'));



    }
}
