<?php

namespace App\Http\Controllers\Site\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Auth;
use Hash;
use App\Models\Order;
use App\Models\WishList;
use App\Models\Seller;


class ProfileController extends Controller
{
    public function account()
    {
        if (Auth::guard('seller')->check()) {

            $user = Auth::guard('seller')->user();

            return view('site.myaccount', compact('user'));

        } 

        return redirect()->route('welcome.index');

    }//end fo account


    public function update(Request $request)
    {   
        
        $id = Seller::find(\Auth::guard('seller')->user()->id);

        $request->validate([
            'email'   => ['required', Rule::unique('sellers')->ignore($id)],
            'name'    => ['required'],
            'phone'   => ['required'],
            'address' => ['required'],
        ]);

        // try {


            $request_data = $request->except(['image']);
            // return $request_data;
            if ($request->image) {

                $request_data['image']  = $request->file('image')->store('seller_images',['public']);
            }

            $id->update($request_data);

            return response()->json(['success'=> true]);

        // } catch (\Exception $e) {

            // return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        // }//end try

    }//end of update

    public function orders()
    {
        $orders = Order::with('status')->where('user_id' , Auth::id() )->latest()->get();
        return view('site.user.orders', compact('orders'));
    }


    public function show_order($id)
    {
        $order = Order::where('order_number' , $id )->first();

        if(!$order)
            return redirect(route('user.orders'));

        if($order->user_id != Auth::id())
            return redirect(route('user.orders'));

        $order->load(['status' , 'items' ]);

        return view('site.user.order', compact('order'));
    }


    public function wishlist()
    {
        $products = WishList::with('product')->where('user_id' , Auth::id() )->get();
        return view('site.user.wishlist', compact('products'));
    }

    public function remove_item_from_wishlist($id)
    {
        WishList::where('id' , $id)->delete();
        return back();
    }


    public function logout()
    {
        \Auth::guard('seller')->logout();

        return view('site.login');

    }//end of logout

    
}//end of controller
