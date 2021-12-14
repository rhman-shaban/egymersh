<?php

namespace App\Helpers;

class Carted
{
    public static function add($product_model,$request)
    {

        if (session()->has('cart_item')) {

            $cart = session()->get('cart_item');

            foreach ($cart as $id => $date) {

                if ($date['qty'] == 1) {
                    
                    if ($date['product_id'] == $product_model->id) {

                        $date['qty'] +=1;

                        // session()->put('cart_item',$date);  

                    }
                }
                
            }

            
        }

        $rand             = mt_rand(3125, 7315);
        $cart_item        = session()->get('cart_item');
        $cart_item_data   = [
                            'color_id'     => $request->color_id ?? '0',
                            'color'        => $request->color ?? '0',
                            'size_id'      => $request->size_id ?? '0',
                            'size'         => $request->size ?? '0',
                            'product_id'   => $product_model->id,
                            'product_data' => [$product_model],
                            'rand'         => $rand,
                            'price'        => $product_model->price,
                            'name'         => $product_model->title,
                            "qty"          => 1,
                            ];

        $cart_item[$rand] = $cart_item_data;

        session()->put('cart_item',$cart_item);
        $date = session()->get('cart_item');

        return $date;
        
    }//end of function add cart

    public static function count()
    {
        return count(session()->get('cart_item'));

    }//end of count cart

}//end of class