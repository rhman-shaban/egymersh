<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function status(Request $request)
    {

        $sellers = Seller::find($request->id);

        $sellers->update([
            'status' => $request->status,
        ]);

        if (request()->ajax()) {

            return response()->json(['success' => true]);

        }

        session()->flash('success', __('dashboard.updated_successfully'));

        return redirect()->back();

    }//end of status
   
    public function index()
    {
        if (Auth::guard('admin')->user()->role == 0){
        $sellers = Seller::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.sellers.index',compact('sellers'));
    }else{
        return view('error');
    }
    }//end of index

  

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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller,$id)
    {
        $seller = Seller::find($id);

        $stores = Store::where('seller_id',$seller->id)->get();

        return view('dashboard.sellers.show',compact('seller','stores'));
    }//end of show

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
