<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\WishList;
class WishListController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->product_id);
        if(!Auth::check())
            return response()->json(
                [
                    'status' => 'error'  , 
                    'message' => 'You Need to login in first' , 
                    'logged_in' => true ,  
                ], 200);


        $user_wishlist = WishList::where('seller_product_id' , $request->product_id)->where('user_id' , Auth::id())->first();

        if($user_wishlist)
            return response()->json(
                [
                    'status' => 'success'  , 
                    'message' => 'this product alreay in your wishlist' , 
                    'logged_in' => false ,  
                ], 200);


        $new_wishlist = new WishList;
        $new_wishlist->seller_product_id = $request->product_id;
        $new_wishlist->user_id = Auth::id();

        $new_wishlist->save();
        return response()->json(
                [
                    'status' => 'success'  , 
                    'message' => 'product added to your wishlist successfully' , 
                    'logged_in' => false ,  
                ], 200);



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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
