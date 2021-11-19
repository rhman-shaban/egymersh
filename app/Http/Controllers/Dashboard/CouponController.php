<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Category;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function index()
    {
        $coupons = Coupon::all();

        return view('dashboard.promotions.coupons.index',compact('coupons'));

    }//end of index


    public function create()
    {
        $categorys = Category::all();

        return view('dashboard.promotions.coupons.create',compact('categorys'));
    }

    
    public function store(Request $request)
    {

        $request->validate([
            'name'         => 'required|max:255',
            'value'        => 'required|max:255',
            'end'          => 'required',
            'categories_id'=> 'required|numeric',
        ]);//end of  validate

        try {

            Coupon::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('coupons.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try catch

    }//end of store


    public function edit(Coupon $coupon)
    {   
        $categorys = Category::all();

        return view('dashboard.promotions.coupons.edit',compact('coupon','categorys'));
    }//end of edit



    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'name'         => 'required|max:255',
            'value'        => 'required|max:255',
            'end'          => 'required',
            'categories_id'=> 'required',
        ]);//end of  validate

        try {

            $coupon->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('coupons.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try catch

    }//end of update

   
    public function destroy(Coupon $coupon)
    {
        try {

            $coupon->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('coupons.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
