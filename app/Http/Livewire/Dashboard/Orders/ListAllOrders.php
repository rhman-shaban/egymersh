<?php

namespace App\Http\Livewire\Dashboard\Orders;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
class ListAllOrders extends Component
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
        $orders = Order::query()
        ->where('order_number' , 'LIKE' , "%{$this->search}%" )
        ->latest()->paginate($this->rows);
        return view('livewire.dashboard.orders.list-all-orders' , compact('orders'));
    }
}
