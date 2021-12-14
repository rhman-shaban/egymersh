<?php

namespace App\Http\Controllers\Seller;

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
use App\Models\News;
use App\Models\Store;
use DB;

class WelcomController extends Controller
{
    
    public function index()
    {
 
        if (Auth::guard('seller')->user()->seller == '1') {
            $seller_id=Auth::guard('seller')->user()->id;
            $order    =Order::where('order_status_id','4')->pluck('id')->toarray();
            $product = OrderItem::wherein('order_id', $order)->get();
            $details=0;
            foreach($product as $i){
                if($i->product->seller_id==$seller_id){    
                $details =($i->product->selling_price+  $details) *$i->quantity;
                
            }}
            $order_seller    =order_seller::where('status','Delivered')->sum('profit');
            $price=wallet::where('status_en','confirmed')->sum('price');
            $balnce=$details + $order_seller;
            $manual_order=order_seller::where('seller_id' ,$seller_id)->count('id');

        $all_product=SellerProduct::where('seller_id' ,$seller_id)->count('id');
        $all_stores=Store::where('seller_id' ,$seller_id)->count('id');
        
        $posts=News::where('category','Tips to grow')->paginate(10);
        $news=News::where('category','News')->paginate(10);
        //dd($news);

            return view('store.index' ,compact(
                'balnce' ,'manual_order','all_product','all_stores','posts','news'
            ));
            
        } else {

            return redirect()->route('user.account');
        }

    }//end of index
    public function show($id)
    {
        $id=News::find($id);
        //dd($id);
        return view('store.shownews' ,compact(
            'id'
        ));

    }

    public function darkmode(Request $request)
    {
        if (session()->get('darkmode') == 'dark') {
            
            session()->put('darkmode', 'nodark');

        } else {

            session()->put('darkmode', 'dark');

        }//end of if

    }//end of darkmode
    
}//end fo class
