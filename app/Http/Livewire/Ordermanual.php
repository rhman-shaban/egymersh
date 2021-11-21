<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\order_seller;

use Livewire\WithPagination;

class Ordermanual extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    
    public function render()
    {
        return view('livewire.ordermanual', [
            'users' => order_seller::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
        ]);
    }
}