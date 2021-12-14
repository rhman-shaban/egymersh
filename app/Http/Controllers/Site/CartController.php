<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\SellerProduct;
use App\Models\Coupon;
use App\Helpers\Carted;

class CartController extends Controller
{

    public function cart_index()
    {
        return view('site.cart');
    }

    public function add_cart(Request $request,$product)
    { 

        try {

            if (request()->ajax()) {

                $product_model = SellerProduct::FindOrFail($product);

                $product = Cart::add($product_model->id, $product_model->product->name, 1 , $product_model->price,)
                    ->associate('App\Models\SellerProduct');
         
                    
                /////////sesstion color

                $rand_color       = mt_rand(3125, 7315);
                $cart_color       = session()->get('cart_color');
                $cart_color_data  = ['color_id'   => $request->color_id,
                                     'color'      => $request->color,
                                     'size_id'    => $request->size_id,
                                     'size'       => $request->size,
                                     'product_id' => $product_model->id,
                                     'quantity'   => '1',
                                     'rand'       => $rand_color];
                $cart_color[$rand_color] = $cart_color_data;
                session()->put('cart_color',$cart_color);
                
                $total   = Cart::subtotal();
                // $count   = Cart::count();
                $count = 0;
                foreach (session()->get('cart_color') as  $date) {

                    $count += $date['quantity'];
                }
                $local   = app()->getLocale();

                return response()->json(['product' => $product, 'product_model' => $product_model, 'total' => $total, 'local' => $local, 'count' => $count]);

            }//end of if ajax

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of function

    public function update_cart(Request $request)
    {   
        try {

            if (request()->ajax()) {

                $cart  = Cart::update($request->row_id, $request->quantity);
                // $count = Cart::count();
                $app   = app()->getLocale();

                $colors_item = session()->get('cart_color');
                $colors_item[$request->rand]['quantity']  = $request->quantity;
                session()->put('cart_color',$colors_item);

                $count = 0;
                foreach (session()->get('cart_color') as  $date) {

                    $count += $date['quantity'];
                }

                $countt = 0;
                foreach (session()->get('cart_color') as  $date) {

                    if ($request->id == $date['product_id']) {

                        $countt += $date['quantity'];
                        
                    }
                }

                if ($coupon = session()->has('coupon_value') == '') {

                    $coupon = '0';
                    
                } else {

                    $coupon = session()->get('coupon_value'); 

                }//end of if

                return response()->json(['cart' => $cart, 'count' => $count, 'app' => $app,'countt' => $countt, 'coupon' => $coupon,'colors_item' => $colors_item]);

            }//end of ajax

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of function

    public function destroy_cart($id)
    {

        try {

            $cart       = Cart::content()->where('rowId', $id)->first();

            if (request()->ajax()) {

                foreach (session()->get('cart_color') as $date) {
                    
                    if ($cart->id == $date['product_id']) {

                        $rand             = $date['rand'];
                        $cart_color_item  = session()->get('cart_color');

                        unset($cart_color_item[$rand]);

                        session()->put('cart_color',$cart_color_item);

                    }//end of if 

                }//end of foreachcart_color
                
                Cart::remove($id);
                // $count   = Cart::count();
                $count = 0;
                foreach (session()->get('cart_color') as  $date) {

                    $count += $date['quantity'];
                }
                $total   = Cart::subtotal();

                return response()->json(['count' => $count,'total' => $total]);

            }//end of ajax

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
    
    }//end of function

    public function add_coupon_cart(Request $request)
    {
        
        try {

            if (request()->ajax()) {    

                $coupon = Coupon::where('name', $request->coupon)->first();


                if ($coupon == null || $coupon->end <= date('Y-m-d')) {
              
                    return response()->json('error');
                }

                session()->put(['coupon_value' => $coupon->value,'coupon_name' => $coupon->name,'end' => $coupon->end]);
              
                return response()->json(['success' => true]);

            }//end of ajax


        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

    public function destroy_coupon_cart()
    {
        try {

            if (request()->ajax()) {
                
                session()->forget(['coupon_value','coupon_name','end']);

                $app   = app()->getLocale();
                
                return response()->json(['success' => true, 'app' => $app]);

            }//end of ajax

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
