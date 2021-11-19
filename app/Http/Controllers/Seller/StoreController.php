<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\SellerProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{

    public function __construct()
    {
        //middleware seller status
        $this->middleware('status_seller')->except('create','show');

    } //end of constructor


    public function active(Request $request)
    {
        try {

            $id = Store::where('id',$request->id)->first();

            $id->update(['active' => $request->active]);

            return response()->json(['success' => true]);

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end fo index


    public function create()
    {
        return view('store.stores.create');   
    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'name'   => ['required','max:20'],
            'logo'   => ['required'],
            'banner' => ['required'],
            'active' => ['required'],
            'bio'    => ['required'],
            'active' => ['required'],
            // 'banner' => ['image','dimensions:min_width=100,min_height=100,max_width500,max_height=500'],
        ]);

        try {

            $request_data           = $request->except(['logo','banner']);


            // $logo_image             = $request->file('logo')->store('products_seller' , 's3');
            // $request_data['logo']   = basename($logo_image);

            // $banner_image           = $request->file('banner')->store('products_seller' , 's3');
            // $request_data['banner'] = basename($banner_image);

            $request_data['logo']   = $request->file('logo')->store('store_images',['disk' => 'public_uploads']);
            $request_data['banner'] = $request->file('banner')->store('store_images',['disk' => 'public_uploads']);

            // $request_data['logo']   = basename($request->file('logo')->store('stores' , 's3'));
            // $request_data['banner'] = basename($request->file('banner')->store('stores' , 's3'));

            $request_data['seller_id'] = auth()->guard('seller')->user()->id;
            $store = Store::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));

            return redirect()->route('stores.show',$store->id);

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }

    }


    public function show(Store $store)
    {
        $products = SellerProduct::where('store_id', $store->id)->get();

        return view('store.stores.show',compact('store','products')); 

    }//end fo show


    public function edit(Store $store)
    {
        return view('store.stores.edit',compact('store')); 
    }//end fo edit


    public function update(Request $request, Store $store)
    {

        $request->validate([
            'name'   => ['required','max:20'],
            'active' => ['required'],
            'bio'    => ['required'],
            'active' => ['required'],
            'logo'   => ['image'],
            'banner' => ['image'],
            // 'banner' => ['image','dimensions:min_width=100,min_height=100,max_width500,max_height=500'],
        ]);

        try {

            $request_data = $request->except(['logo','banner']);

            if ($request->logo) {
                
                $request_data['logo']   = basename($request->file('logo')->store('stores',['disk' => 's3']));
            }

            if ($request->banner) {
                
                $request_data['banner'] = basename($request->file('banner')->store('stores',['disk' => 's3']));
            }

            $request_data['seller_id'] = auth()->guard('seller')->user()->id;
            
            $store->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));

            return redirect()->route('stores.show',$store->id);

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end fo update


    public function destroy(Store $store)
    {

        try {

            Storage::disk('public_uploads')->delete($store->logo);
            Storage::disk('public_uploads')->delete($store->banner);

            $store->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('stores.create');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end fo destroy

}//end of  controller
