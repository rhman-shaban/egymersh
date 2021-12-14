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
            
            return view('site.checkout');

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
        
        $request->validate([
            'full_name'  => 'required',
            'phone'      => 'required',
            'address_id' => 'required',
            'addres'     => 'required',
        ]);

        try {

            $request['user_id']        = auth()->guard('seller')->user()->id;
            $request['order_number']   = '1';
            $request['shipping']       =  session()->get('governorate_price');

            if (Cart::count() < 0) {

                return redirect()->back()->with('no data');
                
            } else {

                $orders = Order::create($request->all());
                $total_price = 0;
                foreach (session()->get('cart_color') as $color) {

                    foreach (Cart::content() as $products) {

                        if ($products->id == $color['product_id']) {
                            
                            OrderItem::create([
                                'seller_products_id' => $products->id,
                                'order_id'           => $orders->id,
                                'quantity'           => $color['quantity'],
                                'price'              => number_format($color['quantity'] * $products->price,2),
                                'color_id'           => $color['color_id'],
                                'color'              => $color['color'],
                                'size_id'            => $color['size_id'],
                                'size'               => $color['size'],
                            ]);

                            $total_price += $color['quantity'] * $products->price;

                        }//end of if
                        
                    }//endo of foreach cart

                }//endof foreach sesstion color

                $total = 0;

                if (session()->has('governorate_price')) {

                    $total +=  session()->get('governorate_price');
                }

                if (session()->has('coupon_value')) {

                    $total -= session()->get('coupon_value');
                }


                $orders->update([
                    'total_price' => $orders->total_price + $total_price,
                    'total'       => $orders->total =  $total_price + $total,
                ]);

                session()->forget(['cart_color','governorate_price','governorate_id']);
                session()->forget(['coupon_value','coupon_name','end']);

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

        $total_price = 0;

        foreach (session()->get('cart_color') as $color) {

            foreach (Cart::content() as $products) {

                if ($products->id == $color['product_id']) {

                    $total_price += $color['quantity'] * $products->price;

                }//end of if
                
            }//endo of foreach cart

        }//endof foreach sesstion color

        if (session()->has('coupon_value')) {
            
            $total_price -= session()->get('coupon_value');
        }

        $total_price += $date->price;

        $price = $date->price;
        session()->put('governorate_price', $date->price);
        session()->put('governorate_id', $id);

        return response()->json(['price'=>$price,'total_price'=>$total_price]);

    }//end of shipping


}//end of controller
