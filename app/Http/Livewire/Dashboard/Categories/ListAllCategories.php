<?php

namespace App\Http\Livewire\Dashboard\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
class ListAllCategories extends Component
{
    use WithPagination;


    public $rows = 10;
    public $search = '';


    // public function paginationView()

    // {

    //     return 'custom-pagination-links-view';

    // }
    



    public function render()
    {
        $categories = Category::query()
        ->with('admin')
        ->where('name_ar' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('name_en' , 'LIKE' , "%{$this->search}%" )
        ->latest()->paginate($this->rows);
        return view('livewire.dashboard.categories.list-all-categories' , compact('categories'));
    }
}
