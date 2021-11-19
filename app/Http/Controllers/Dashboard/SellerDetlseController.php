<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Store;
use App\Models\SellerProduct;

class SellerDetlseController extends Controller
{
    public function prfile()
    {
        $sellers = Seller::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.sellers.profile',compact('sellers'));
    }//end of profile

    public function stores($id)
    {
        $stores = Store::where('seller_id',$id)->get();
        $seller = Seller::where('id',$id)->first();

        return view('dashboard.sellers.store',compact('stores','seller'));   
    }//end of stores


    public function products($id)
    {
        $products = SellerProduct::where('store_id',$id)->get();

        return view('dashboard.sellers.products',compact('products'));   
    }//end of products

}//end of controller
