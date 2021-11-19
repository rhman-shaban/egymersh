<?php

namespace App\Http\Livewire\Dashboard\Messages;

use Livewire\Component;
use App\Models\Message;
use Livewire\WithPagination;
class ListAllMessages extends Component
{
    use WithPagination;


    public $rows = 10;
    public $search = '';
    public $status = 'all';


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function updatingRows()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }


    protected $paginationTheme = 'bootstrap';




    public function render()
    {
        $messages = Message::query()
        ->where('phone' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('subject' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('email' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('name' , 'LIKE' , "%{$this->search}%" );

        if($this->status =! 'all') {
            $messages->where('seen' , '=' , $this->status);
        }

        $messages = $messages->latest()->paginate($this->rows);
        return view('livewire.dashboard.messages.list-all-messages' , compact('messages'));
    }
}
