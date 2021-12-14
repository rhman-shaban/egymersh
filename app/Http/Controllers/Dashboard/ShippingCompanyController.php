<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingCompany;
use App\Models\ShippingCompanyPrice;
use App\Models\Governorate;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Dashboard\ShippingCompanies\StoreShippingCompanyRequest;
use App\Http\Requests\Dashboard\ShippingCompanies\UpdateShippingCompanyRequest;
class ShippingCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
        if (Auth::guard('admin')->user()->role == 0){
        return view('dashboard.shipping_companies.index');
    }else{
        return view('error');
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard('admin')->user()->role == 0){
        $governorates = Governorate::where('active' , 1)->get();
        return view('dashboard.shipping_companies.create' , compact('governorates'));
    }else{
        return view('error');
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShippingCompanyRequest $request)
    {
        // dd($request->all());
        $company = new ShippingCompany;
        $company->add($request->all());

        for ($i = 0; $i <count($request->governorate_id) ; $i++) {
            $price = new ShippingCompanyPrice;
            $price->governorate_id = $request->governorate_id[$i];
            $price->shipping_company_id = $company->id;
            $price->price = $request->prices[$request->governorate_id[$i]];
            $price->save();
        }


        return redirect(route('shipping_companies.index'))->with('success'  , 'company Added Successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingCompany $shipping_company)
    {
        $shipping_company->load('prices'  , 'prices.governorate' );
        return view('dashboard.shipping_companies.show'  , compact('shipping_company') );
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
    public function destroy(ShippingCompany $shipping_company)
    {
        $shipping_company->prices()->delete();
        $shipping_company->delete();

        return back()->with('success'  , 'company deleted Successfully' );
    }
}
