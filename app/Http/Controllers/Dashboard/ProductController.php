<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Products\StoreProductRequest;
use App\Http\Requests\Dashboard\Products\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\SellerProduct;
use App\Models\Size;
use Storage;
use Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.products.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();
        return view('dashboard.products.create' , compact('categories' , 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product;


        $product->add($request->all());

        // dd($product);

        for ($i = 0; $i <count($request->colors) ; $i++) {
            $front_image = $request->file('front_images')[$i]->store( 'products' , 's3');
            $front_image = basename($front_image);

            $back_image = $request->file('back_images')[$i]->store( 'products' , 's3');
            $back_image = basename($back_image);

            $product_color = new ProductColor([
                'product_id' => $product->id, 
                'color' => $request->colors[$i],
                'back_image' => $back_image, 
                'front_image' => $front_image, 
            ]);
            $product_color->save();

            
            for ($r = 0; $r <count($request->sizes[$i]) ; $r++) {

                $product_size = new ProductSize([
                    'product_id' => $product->id, 
                    'product_color_id' => $product_color->id, 
                    'quantity' => $request->quantity[$i][$r], 
                    'size_id' => $request->sizes[$i][$r], 
                ]);
                $product_size->save();
            }

        }


        // dd('done');
        return redirect(route('products.index'))->with('success' , 'product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load(['admin' , 'category' , 'colors' ]);
        return view('dashboard.products.show' , compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories    = Category::all();
        $product_color = ProductColor::where('product_id', $product->id)->get();
        
        $sizes = Size::all();

        return view('dashboard.products.edit'  , compact('product','categories','product_color' , 'sizes' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->edit($request->all());

        return redirect(route('products.index'))->with('success' , 'product updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'))->with('success' , 'product deleted Successfully');
    }
}