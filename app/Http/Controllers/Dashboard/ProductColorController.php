<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Product;
use App\Models\Size;


use App\Http\Requests\Dashboard\Products\StoreProductColorRequest;
use App\Http\Requests\Dashboard\Products\UpdateProductColorRequest;



class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product_id = $request->product_id;
        $sizes = Size::all();
        return view('dashboard.products.add_new_color' , compact('product_id' , 'sizes' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = Product::find($request->product_id);


        for ($i = 0; $i <count($request->colors) ; $i++) {
            $front_image = $request->file('front_images')[$i]->store( 'products' , 'public');
            $front_image = basename($front_image);

            // $back_image = $request->file('back_images')[$i]->store( 'products' , 'public');
            // $back_image = basename($back_image);

            $product_color = new ProductColor([
                'product_id' => $product->id , 
                'color' => $request->colors[$i] , 
                // 'back_image' => $back_image , 
                'front_image' => $front_image , 
            ]);
            $product_color->save();

            
            for ($r = 0; $r <count($request->sizes[$i]) ; $r++) {

                $product_size = new ProductSize([
                    'product_id' => $product->id , 
                    'product_color_id' => $product_color->id , 
                    'quantity' => $request->quantity[$i][$r] , 
                    'size_id' => $request->sizes[$i][$r] , 
                ]);
                $product_size->save();
            }

        }


        return back()->with('success' , 'product Color Added Successfully' );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductColorRequest $request,ProductColor $product_color)
    {
        if($request->hasFile('front_image')) {
            $front_image = $request->file('front_image')->store( 'products' , 'public');
            $front_image = basename($front_image);
            $product_color->front_image = $front_image;
        }

        // if($request->hasFile('back_image')) {
        //     $back_image = $request->file('back_image')->store( 'products' , 'public');
        //     $back_image = basename($back_image);
        //     $product_color->back_image = $back_image;
        // }

        $product_color->color = $request->color;
        $product_color->save();
        return redirect()->back()->with('success'  , 'product Color Updated Successfully' );


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductColor $product_color)
    {
        $product_color->sizes()->delete();
        $product_color->delete();

        return redirect()->back()->with('success'  , 'product Color deleted Successfully' );
    }
}
