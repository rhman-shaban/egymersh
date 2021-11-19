<?php

namespace App\Http\Livewire\Dashboard\Pages;

use Livewire\Component;
use App\Models\Page;
use Livewire\WithPagination;
class ListAllPages extends Component
{
    use WithPagination;


    public $rows = 10;
    public $search = '';

    public function render()
    {
        $pages = Page::query()
        ->with('admin')
        ->where('title_ar' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('title_en' , 'LIKE' , "%{$this->search}%" )
        ->latest()->paginate($this->rows);
        return view('livewire.dashboard.pages.list-all-pages' , compact('pages'));
    }
}
