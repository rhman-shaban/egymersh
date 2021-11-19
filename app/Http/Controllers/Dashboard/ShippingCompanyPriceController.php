<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingCompanyPrice;
use App\Models\ShippingCompany;
use App\Models\Governorate;
class ShippingCompanyPriceController extends Controller
{
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ShippingCompany $company)
    {

        $governorates_id = $company->prices()->pluck('governorate_id')->toArray();
        $governorates = Governorate::whereNotIn('id' , $governorates_id )->get();
        return view('dashboard.shipping_companies.create_new_governorate' , compact('governorates' , 'company')  );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , ShippingCompany $company)
    {
         for ($i = 0; $i <count($request->governorate_id) ; $i++) {
            $price = new ShippingCompanyPrice;
            $price->governorate_id = $request->governorate_id[$i];
            $price->shipping_company_id = $company->id;
            $price->price = $request->prices[$request->governorate_id[$i]];
            $price->save();
        }


        return redirect(route('shipping_companies.show' , ['shipping_company' => $company->id ]))->with('success'  , 'Governorate and price Added Successfully' );
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
    public function destroy(ShippingCompanyPrice $price)
    {
        $price->delete();
        return back()->with('success' , 'Shipping Company Price Deleted Successfully');
    }
}
