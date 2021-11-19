<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SellerProduct;
use App\Models\ProductColor;
use App\Models\ProductSellerImage;
use App\Models\SellerProductColor;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SellerProductImageResource;
class SellerProductController extends Controller
{

    public function __construct()
    {
        //middleware seller status
        // $this->middleware('status_seller')->except('products_index','products_create');

    } //end of constructor
    public function products_index()
    {
        $seller_product = SellerProduct::latest()->paginate(20);;
        
        return view('store.products.index',compact('seller_product'));
    }//end of products_index

    public function products_create()
    {
        return view('store.products.create');
    }

    public function product($id)
    {
        $products = Product::where('category_id', $id)->get();

        return response()->json($products);

    }//end of product

    public function show_product(Request $request)
    {
        $product = Product::where('id', $request->id)->first();

        $colors  = ProductColor::where('product_id', $product->id)->get();
        $color   = ProductColor::where('product_id', $product->id)->first();

        return response()->json(['product' => $product,'colors'=> $colors ,'color'=>$color]);

    }//end of show_product

    public function store(Request $request)
    {
        
        $request->validate([
            'title'        => ['required','max:40'],
            'tag'          => ['required','max:100'],
            'description'  => ['required','max:300'],
            'price'        => ['required'],
        ]);

        // try {

            $request_data   = $request->except(['addImage','colorSelectorBrushes','image','color','default_color','ali']);
            
            // foreach ($request->image as $dataimage) {
                
            //     // $image     = str_replace("data:image/octet-stream;base64,", ' ', $dataimage);

            //     $imageName = time().".png";
            //     // dd(base64_decode($image,'.png'));
            //     // Storage::disk('public_uploads')->put('seller_products/',$imageName, base64_decode($image));
            //     Storage::disk('public_uploads')->put($imageName, base64_decode($dataimage));
            // }
            // return 'fdf';

            // $imageName = Storage::disk('public_uploads')->put('seller_products/', base64_decode($image));

            // $request_data['image']     = basename($imageName);
            $request_data['seller_id'] = auth()->guard('seller')->user()->id;

            $products = SellerProduct::create($request_data);
            // $products;
            $products->product_Color()->sync($request->color);

            foreach ($request->image as $image) {
                ProductSellerImage::create([
                    'seller_products_id' => $products->id,
                    'image'              => $image,
                ]);
            }

            return response()->json(['success' => true]);

        // } catch (\Exception $e) {

            // return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        // }//end try

    }//enf of store product
    

    public function edit($id)
    {
        $product = SellerProduct::where('id',$id)->first();

        return view('store.products-seller.edit',compact('product'));
        // return view('store.products.edit',compact('product'));

    }//end of edit

    public function update(Request $request , $id)
    {
        dd($request->all());
        $request->validate([
            'title'        => ['required','max:40'],
            'tag'          => ['required','max:100'],
            'description'  => ['required','max:300'],
            'price'        => ['required'],
        ]);
        
        try {
            
            $id_product = SellerProduct::find($id);

            if ($id_product->image != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/seller_products_image/' . $id_product->image);

            }

            $request_data  = $request->except(['addImage','colorSelectorBrushes','image','color','default_color']);
            
            $image     = $request->image;
            $imageInfo = explode(";base64,", $image);
            $imgExt    = str_replace('data:image/', '', $imageInfo[0]);      
            $image     = str_replace(' ', '+', $imageInfo[1]);
            $imageName = time().".png";

            Storage::disk('public_seller')->put($imageName, base64_decode($image));

            $request_data['image']     = $imageName;
            $request_data['seller_id'] = auth()->guard('seller')->user()->id;

            $id_product->update($request_data);

            $id_product->product_Color()->sync($request->color);

            return response()->json(['success' => true]);

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    public function destroy($id)
    {
        try {

            $seller_product  = SellerProduct::where('id' ,$id)->first();

            if ($seller_product->image != 'default.png') {
                
                Storage::disk('public_uploads')->delete('/seller_products_image/' . $seller_product->image);
                
            }

            $seller_product->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->back();

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end fo controller
