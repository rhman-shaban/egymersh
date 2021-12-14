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
        $product = OrderItem::wherein('order_id', $order)->get();
        $details=0;
        foreach($product as $i){
            if($i->product->seller_id==$seller_id){
            $details =($i->product->selling_price+  $details) *$i->quantity;

        }}

 


        $order_seller    =order_seller::where('status','Delivered')->sum('profit');
        $price=wallet::where('status_en','confirmed')->sum('price');
        $profit=$details + $order_seller;
        $total=$profit -$price;


//get price is done confirmed

       ///// exepted   !=
        $order_expected    =Order::where('order_status_id',  3)->pluck('id')->toarray();
        $product_expected = OrderItem::wherein('order_id', $order_expected)->get();
        $details_expected=0;
        foreach($product_expected as $profit){
            if($profit->product->seller_id==$seller_id) {
            $details_expected =($profit->product->selling_price+  $details_expected) *$profit->quantity;
        }}


        //dd($details_expected);





        $order_seller_expected    =order_seller::where('status', 'Shipped')->where('seller_id' ,$seller_id)->sum('profit');
        $balnce_expected= $details_expected + $order_seller_expected;
 

        $pinding   =order_seller::where('status', 'Shipped')->where('seller_id' ,$seller_id)->count('id');





        ///pending order



        ////request datat
        $wallets=wallet::where('seller_id',$seller_id)->get();
        //d
       // $wallets_ex=wallet::where('seller_id',$seller_id)->where()->get();

        return view('store.wallet' ,compact('profit','balnce_expected','wallets','pinding','total'));
    }
    public function create(Request $request){
        $order_seller    =order_seller::where('status','Delivered')->sum('profit');
        $order    =Order::where('order_status_id','4')->pluck('id')->toarray();
        $product = OrderItem::wherein('order_id', $order)->get();
        $details=0;
        foreach($product as $i){
            if($i->product->seller_id==$seller_id){
            $details =($i->product->selling_price+  $details) *$i->quantity;

        }}
        $price=wallet::where('status_en','confirmed')->sum('price');
        $profit=$details + $order_seller;
        $total=$profit -$price;
        $seller_id=Auth::guard('seller')->user()->id;
        //dd($total);
        $this->validate($request, [
            'price' => 'required|max:'.$total,
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
