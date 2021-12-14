<?php

namespace App\Http\Livewire\Dashboard\ShippingCompanies;

use Livewire\Component;
use App\Models\ShippingCompany;
use Livewire\WithPagination;
class ListAllShippingCompanies extends Component
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
        $companies = ShippingCompany::query()
        ->where('name' , 'LIKE' , "%{$this->search}%" )
        ->latest()->paginate($this->rows);
        return view('livewire.dashboard.shipping-companies.list-all-shipping-companies' , compact('companies'));
    }
}
