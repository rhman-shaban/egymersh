<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;
use App\Models\SellerProduct;
use Livewire\WithPagination;

class ProductSeller extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $rows = 10;
    public $search = '';

    public function updatingRows()
    {
        $this->resetPage();
    }

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = SellerProduct::query()
        ->where('id' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('title' , 'LIKE' , "%{$this->search}%" )
        ->latest()->paginate($this->rows);

        return view('livewire.seller.product-seller', compact('products'));

    }//end of render

}//end pf Component
