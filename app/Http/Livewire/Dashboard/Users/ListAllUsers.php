<?php

namespace App\Http\Livewire\Dashboard\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
class ListAllUsers extends Component
{
    use WithPagination;


    public $rows = 10;
    public $search = '';




    public function render()
    {

        $users = User::query()
        ->where('name' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('email' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('phone' , 'LIKE' , "%{$this->search}%" )
        ->latest()->paginate($this->rows);
        return view('livewire.dashboard.users.list-all-users' , compact('users'));
    }
}
