<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SellerProduct;
use App\Models\SellerProductColor;
use App\Models\ProductSize;

class ProductSeller extends Controller
{
    public function index()
    {   
        $product_seller = SellerProduct::whenSearch(request()->search)->latest()->paginate(20);

        return view('dashboard.products_sellers.index',compact('product_seller'));
    }//end of index

    public function show($id)
    {   

        $product       = SellerProduct::find($id);

        $product_color = SellerProductColor::where('seller_product_id', $id)->get();
        
        $product_id    = Product::where('id', $product->product_id)->first();

        $product_size  = ProductSize::where('product_id', $product_id->id)->get();

        return view('dashboard.products_sellers.show',compact('product','product_size','product_color'));

    }//end of show

}//end of controller
