<?php

namespace App\Http\Livewire\Dashboard\Admins;

use Livewire\Component;
use App\Models\Admin;
use Livewire\WithPagination;
class ListAllAdmins extends Component
{
    use WithPagination;


    public $rows = 10;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function updatingRows()
    {
        $this->resetPage();
    }


    protected $paginationTheme = 'bootstrap';



    public function render()
    {
        $admins = Admin::query()
        ->with('admin')
        ->where('name' , 'LIKE' , "%{$this->search}%" )
        ->where('username' , 'LIKE' , "%{$this->search}%" )
        ->latest()->paginate($this->rows);
        return view('livewire.dashboard.admins.list-all-admins' , compact('admins'));
    }
}
