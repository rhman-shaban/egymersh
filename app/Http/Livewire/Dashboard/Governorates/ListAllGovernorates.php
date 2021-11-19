<?php

namespace App\Http\Livewire\Dashboard\Governorates;

use Livewire\Component;
use App\Models\Governorate;
use App\Models\Category;
use Livewire\WithPagination;
class ListAllGovernorates extends Component
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
        $governorates = Governorate::query()
        ->where('name_ar' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('name_en' , 'LIKE' , "%{$this->search}%" )
        ->latest()->paginate($this->rows);
        return view('livewire.dashboard.governorates.list-all-governorates' , compact('governorates'));
    }
}
