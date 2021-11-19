<?php

namespace App\Http\Livewire\Dashboard\Sizes;

use Livewire\Component;
use App\Models\Size;
use Livewire\WithPagination;
class ListAllSizes extends Component
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
        $sizes = Size::query()
        ->where('name' , 'LIKE' , "%{$this->search}%" )
        ->latest()->paginate($this->rows);
        return view('livewire.dashboard.sizes.list-all-sizes' , compact('sizes'));
    }
}
