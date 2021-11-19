<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSize;
use App\Models\Size;
use App\Http\Requests\Dashboard\Products\UpdateProductSizeRequest;
use App\Http\Requests\Dashboard\Products\StoreProductSizeRequest;

class ProductSizeController extends Controller
{


    public function create(Request $request)
    {
        $sizes = Size::all();
        $product_color = $request->product_color;
        $product_id = $request->product_id;
        return view('dashboard.products.add_new_size' , compact('sizes'  ,'product_color' , 'product_id' ) );
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductSizeRequest $request)
    {   

        $product_size = new ProductSize;
        $product_size->size_id = $request->size_id;
        $product_size->quantity = $request->quantity;
        $product_size->product_color_id = $request->product_color;
        $product_size->product_id = $request->product_id;
        $product_size->save();
        return redirect(route('products.edit' , ['product' => $request->product_id ] ))->with('success'  , 'Size Added Successfully' );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductSizeRequest $request,ProductSize $product_size)
    {
        $product_size->quantity = $request->quantity;
        $product_size->save();


        return back()->with('success'  , 'product Size updated Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSize $product_size)
    {
        $product_size->delete();
        return back()->with('success'  , 'product Size Deleted Successfully' );
    }
}
