<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Category;
use App\Models\Page;
use App\Models\About;
use App\Models\Message;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\SellerProductColor;
use App\Models\Size;
use App\Models\Store;
use App\Models\SellerProduct;
use App\Models\ProductSellerImage;
use App\Models\UserReview;
use Validator;
use Mailchimp;
use App\Http\Requests\Site\Messages\StoreMessageRequest;

class HomeController extends Controller
{
    
    public function index()
    {
        $slides = Slide::where('active' , 1)->latest()->get();

        $new_products = SellerProduct::with('product')->latest()->limit(10)->get();
        $best_selling = SellerProduct::with('product')->orderBy('count_order' , 'DESC' )->limit(10)->get();
        $reviews = UserReview::with('user')->latest()->get();
        $stores = Store::latest()->get();
        return view('site.index' , compact('slides' , 'new_products' , 'best_selling' , 'reviews' , 'stores' ));
    }

    
    public function about()
    {
        $about = About::first();
        return view('site.about' , compact('about'));
    }//end of about


    public function page(Page $page)
    {
        
        return view('site.page' , compact('page'));

    }//end of page


    public function contact()
    {
        return view('site.contact');

    }//end of contact

    public function contact_us(StoreMessageRequest $request)
    {
        $message = new Message;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->phone = $request->phone;
        $message->save();

        return back()->with('success' , 'Message Sent Succussfully  , we will contact you soon');

    }//en dof contact_us

   
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'email' => 'required|email'
        ]);

        if($validator->fails()) {
            return response()->json( [
                'status' => 'error' , 
                'message' => $validator->errors()->first()  , 
            ] , 200);
        }

        Mailchimp::subscribe('9f2c4c59e7' , $request->email);

        return response()->json( [
            'status' => 'success' , 
            'message' => 'You Have Been subscribed in the newsletter Succussfully...please confirm'  , 
        ] , 200);

    }//end of subscribe



    public function search(Request $request)
    {
        $products = SellerProduct::where('title' , 'like', '%'.$request->keywords.'%' )
        ->orWhere('description'  , 'like', '%'.$request->keywords.'%' )
        ->orWhere('tag'  , 'like', '%'.$request->keywords.'%' )
        ->latest()->paginate(1);

        return view('site.search' , compact('products'));

    }//end of search

    public function store_details($id)
    {
        $store    = Store::find($id);
        
        $products = SellerProduct::where('store_id', $store->id)->get();

        return view('site.store',compact('store','products'));

    }//end of store details

    public function product_details($id)
    {
        $product       = SellerProduct::Find($id);

        if ($product == null) {

            return 'not found';
            return redirect()->back();
            
        } else {

            $product_color = SellerProductColor::where('seller_product_id', $id)->get();
            $product_id    = Product::where('id', $product->product_id)->first();
            $product_size  = ProductSize::where('product_id', $product_id->id)->get();
            $products      = SellerProduct::inRandomOrder()->limit('4')->get();

            return view('site.product',compact('product','products','product_size','product_color'));
        }


    }//end of product_details


    public function chouse_color($id)
    {
        $product_color = ProductColor::find($id);
        $product_size  = ProductSize::where('product_color_id', $product_color->id)->with('size')->get();
        return response()->json($product_size);

    }//end of chouse_color

    public function product_quick_view(Request $request)
    {
        $product = SellerProduct::find($request->product_id);

        $product_color = SellerProductColor::where('seller_product_id', $request->product_id)->get();
        $product_id    = Product::where('id', $product->product_id)->first();
        $product_size  = ProductSize::where('product_id', $product_id->id)->get();

        return view('site.modal' , compact('product','product_size','product_color'));
    }

}//end of controller
