<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;
use App\Models\Store;

class Stores extends Component
{
    
    // public $id;

    // public function mount($id)
    // {
    //     return %id;
    //     $session->put("post.{$post->id}.last_viewed", now());
 
    //     $this->title = $post->title;
    //     $this->content = $post->content;
    // }

    public function render()
    {   
        return 'fda';
        $store = Store::find(1);

        return view('livewire.seller.stores',compact('store'));
    }

}//end of Component
