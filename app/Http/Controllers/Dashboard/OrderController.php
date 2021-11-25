<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Models\order_seller;
use App\Models\product_order;
use App\Models\SellerProduct;
use App\Models\comment_manual;
use Illuminate\Support\Facades\Auth;


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
        
        return view('dashboard.orders.ordermanual');
          
    }
    public function show_manual_order($id)

    {

        $orders=order_seller::find($id);
      
        
        
        return view('dashboard.orders.showmanual', compact('orders'));
          
    }
    
    
    public function delete_order($id)
    {
        $doctor = order_seller::findOrFail($id)->delete();
        return back()->with('success'  , 'Order Deleted successfully' );   
    }
    
    public function update_orders(Request $request, $id)
    {
        $order = order_seller::findOrFail($id);
        $order->update([

            'status' => $request-> status,
        ]);
        return back()->with('success'  , 'Change status successfully' );   
    }
    public function comment_manual(Request $request ,$id)
    {
        $this->validate($request , [
            'comment' => "required" , 
        ]);
        $comment = new comment_manual;
        $comment->comment = $request->comment;
        $comment->order_id = $id;
        $comment->admin_id = Auth::guard('admin')->id();
        $comment->save();
        return back()->with('success'  , 'Comment added successfully' );
    }
    public function delete_comment($id)
    {
        $comment = comment_manual::findOrFail($id)->delete();
        return back()->with('success'  , 'Order Deleted successfully' );   
    }
    public function message(Request $request ,$id)
    {
        $order = order_seller::findOrFail($id);
        $order->update([

            'message' => $request-> message,
        ]);
        return back()->with('success'  , 'Add Message successfully' );
    }

        
    
    

}
