<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingCompanyPrice;
use App\Models\OrderItemColor;
use App\Models\OrderItemSize;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    
    
    public function index()
    {
        if (auth()->guard('seller')->check()) {
            
            return view('site.order');

        } else {

            return redirect()->route('user.login_form');
        }

    }//end of index

    

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'full_name'  => 'required',
            'addres'     => 'required',
            'phone'      => 'required',
            // 'additional' => 'required',
        ]);

        try {

            $request['total_price'] = preg_replace('/,/', '', Cart::subtotal());
            // $request_data                = $request->except(['total_price','image','payment_option']);
            if (session()->has('price')) {
                
                $request['total_price'] +=  session()->get('price');
            }

            if (session()->has('coupon_value')) {

                $request['total_price'] +=  session()->get('coupon_value');
                
            }

            $request['user_id']   = auth()->guard('seller')->user()->id;

            if (Cart::count() < 0) {

                return redirect()->back()->with('no data');
                
            } else {

                $orders = Order::create($request->all());
                
                foreach (Cart::content() as $products) {

                    OrderItem::create([
                        'seller_products_id' => $products->id,
                        'quantity'   => $products->qty,
                        'price'      => number_format($products->model->price,2),
                        'order_id'   => $orders->id,
                    ]);
                    
                }//endo of foreach

                if (session()->has('cart_color')) {
                    
                    foreach (session()->get('cart_color') as $color) {
                        
                        OrderItemColor::create([
                            'order_item_id' => $color['product_id'],
                            'color_id'      => $color['color_id'],
                            'color'         => $color['color'],
                            'order_id'      => $orders->id,
                        ]);

                        $colo_quntty = ProductSize::where('product_color_id',$color['color_id'])->get();

                        foreach ($colo_quntty as $colors) {
                            
                            $colors->update([
                                'quantity' => $colors->quantity - 1,
                            ]);
                        }
                        
                    }//endo of foreach

                }//endof cart_color

                if (session()->has('cart_size')) {
                    
                    foreach (session()->get('cart_size') as $size) {
                            
                        OrderItemSize::create([
                            'order_item_id' => $size['product_id'],
                            'size_id'       => $size['size_id'],
                            'size'          => $size['size'],
                            'order_id'      => $orders->id,
                        ]);

                        $size_quntty = ProductSize::where('size_id',$size['size_id'])->get();

                        foreach ($size_quntty as $sizes) {
                            
                            $sizes->update([
                                'quantity' => $sizes->quantity - 1,
                            ]);
                        }
                        
                    }//endo of foreach

                }//end of cart_size

                session()->forget(['cart_color','cart_size','price']);

                Cart::destroy();

                return redirect()->route('user.account');

            }//end fo if count cart



        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try catch

    }//end of store

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function shipping($id)
    {
        $date = ShippingCompanyPrice::where('governorate_id',$id)->first();

        session()->put('price', $date->price);

        return response()->json($date);

    }//end of shipping


}//end of controller
