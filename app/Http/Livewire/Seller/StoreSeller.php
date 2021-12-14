<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;
use App\Models\Store;

class StoreSeller extends Component
{
    public function render()
    {   
        $store = Stores::all();

        return view('livewire.seller.stores',compact('store'));

    }//end of render

}//end of Component
