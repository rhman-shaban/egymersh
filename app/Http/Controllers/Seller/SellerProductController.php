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
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;

// use App\Http\Resources\SellerProductImage;

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
        
        return view('store.products-seller.index',compact('seller_product'));
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


        try {

            $request_data   = $request->except(['image','color','defult_image']);
            $logo      = ImageManagerStatic::make($request->logo)->encode('png');
            $logo_name = Str::random() . '.png';
            Storage::disk('products_seller')->put($logo_name, $logo);
            $request_data['logo'] = $logo_name;

            $request_data['seller_id'] = auth()->guard('seller')->user()->id;

            //deflte image store image to folder
            $de_imgge    = ImageManagerStatic::make($request->defult_image)->encode('png');
            $de_img_name = Str::random() . '.png';
            Storage::disk('products_seller')->put($de_img_name, $de_imgge);
            $request_data['defult_image'] = $de_img_name;

            $products = SellerProduct::create($request_data);

            // $products;
            $products->product_Color()->sync($request->color);

            //image store image to folder
            foreach ($request->image as $date) {

                $min_image = ImageManagerStatic::make($date)->encode('png');

                $name      = Str::random() . '.png';

                Storage::disk('products_seller')->put($name, $min_image);

                ProductSellerImage::create([
                    'seller_products_id' => $products->id,
                    'image'              => $name,
                ]);
                
            }//end of foreach image

            return response()->json(['success' => true]);

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//enf of store product
    

    public function edit($id)
    {
        $product = SellerProduct::where('id',$id)->first();

        $product_color = SellerProductColor::where('seller_product_id',$id)->get();

        return view('store.products-seller.edit',compact('product','product_color'));

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
            $seller_images   = ProductSellerImage::where('seller_products_id' ,$seller_product->id)->get();
                
            Storage::disk('local')->delete('public/products_seller/' . $seller_product->defult_image);
            Storage::disk('local')->delete('public/products_seller/' . $seller_product->logo);

            foreach ($seller_images as $imag) {

                Storage::disk('products_seller')->delete($imag->image);
                
            }//end of foreach

            $seller_product->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->back();

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end fo controller
