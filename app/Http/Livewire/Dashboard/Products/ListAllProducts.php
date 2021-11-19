<?php

namespace App\Http\Livewire\Dashboard\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
class ListAllProducts extends Component
{
    use WithPagination;


    public $rows = 10;
    public $search = '';

    public function render()
    {
        $products = Product::query()
        ->with(['admin' , 'category'])
        ->where('name_ar' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('name_en' , 'LIKE' , "%{$this->search}%" )
        ->latest()->paginate($this->rows);
        return view('livewire.dashboard.products.list-all-products' , compact('products'));
    }
}
