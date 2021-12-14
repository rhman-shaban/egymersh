<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->user()->role == 0){
          
        $offers = Offer::all();

        return view('dashboard.promotions.offers.index',compact('offers'));
    }else{
        return view('error');
    }
    }//end of index
    
    
    public function create()
    {
        if (Auth::guard('admin')->user()->role == 0){
       
        return view('dashboard.promotions.offers.create');
    }else{
        return view('error');
    }
    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'name_ar'  => 'required|max:255',
            'name_en'  => 'required|max:255',
        ]);//end of  validate

        try {

            Offer::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('offers.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try catch

    }//end of store

  
    public function edit(Offer $offer)
    {
        return view('dashboard.promotions.offers.edit',compact('offer'));
    }//end of edit


    public function update(Request $request, Offer $offer)
    {
        $request->validate([
            'name_ar'  => 'required|max:255',
            'name_en'  => 'required|max:255',
        ]);//end of  validate

        try {

            $offer->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('offers.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try catch
    }

  
    public function destroy(Offer $offer)
    {
        try {

            $offer->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('offers.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
        
    }//end of destroy

}//end of controller
