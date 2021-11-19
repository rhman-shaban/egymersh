<?php

namespace App\Http\Livewire\Dashboard\Stores;

use Livewire\Component;
use App\Models\Store;
use Livewire\WithPagination;
class ListAllStores extends Component
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
        $stores = Store::query()
        ->where('name' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('bio' , 'LIKE' , "%{$this->search}%" )
        ->latest()->paginate($this->rows);
        return view('livewire.dashboard.stores.list-all-stores' , compact('stores'));
    }
}
