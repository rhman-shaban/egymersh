<?php

namespace App\Http\Livewire\Dashboard\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Seller;
use Livewire\WithPagination;

class ListAllUsers extends Component
{
    use WithPagination;

    public $rows = 10;
    public $search = '';

    public function render()
    {

        // $users = Seller::where('seller','0')
        // ->where('name' , 'LIKE' , "%{$this->search}%" )
        // ->orWhere('email' , 'LIKE' , "%{$this->search}%" )
        // ->orWhere('phone' , 'LIKE' , "%{$this->search}%" )
        // ->latest()->paginate($this->rows);

        $users = Seller::where('seller','0')->get();
        
        return view('livewire.dashboard.users.list-all-users' , compact('users'));

    }//end of reander

}//end of controller
