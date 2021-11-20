<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Models\order_seller;
use App\Models\product_order;
use App\Models\SellerProduct;


class OrderController extends Controller
{
    
    public function index()
    {
        return view('dashboard.orders.index');

    }

    public function orders_sellers()
    {
        // $orders = Order::
        
        return view('dashboard.orders.sellers.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order_status = OrderStatus::all();
        $order->load(['user'  , 'address' , 'items' , 'items.product'  , 'status' , 'comments' , 'comments.admin']);
        
        return view('dashboard.orders.show' , compact('order', 'order_status') );
        
    }


    public function update_status(Request $request , Order $order)
    {
        $order->order_status_id = $request->order_status_id;
        $order->save();
        return back()->with('success'  , 'Order Status changed successfully' );         
    }
    
    public function update_status_order(Request $request , Order $order)
    {
        $order->order_status_id = $request->order_status_id;
        $order->save();
        return back()->with('success'  , 'Order Status changed successfully' );         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->items()->delete();
        $order->delete();
        return back()->with('success'  , 'Order Deleted successfully' );   
    }
    public function manual_order()

    {
        $orders=order_seller::get();
        return view('dashboard.orders.ordermanual', compact('orders'));
          
    }
    public function show_manual_order($id)

    {

        $orders=order_seller::find($id);
      
        
        
        return view('dashboard.orders.showmanual', compact('orders'));
          
    }
    

    

}
