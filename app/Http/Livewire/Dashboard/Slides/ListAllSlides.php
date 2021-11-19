<?php

namespace App\Http\Livewire\Dashboard\Slides;

use Livewire\Component;
use App\Models\Slide;
use Livewire\WithPagination;
class ListAllSlides extends Component
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
        $slides = Slide::query()
        ->with('admin')
        ->where('title_ar' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('title_en' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('sub_title_ar' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('sub_title_en' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('button_text_ar' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('button_text_en' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('big_title_ar' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('big_title_en' , 'LIKE' , "%{$this->search}%" )
        ->orWhere('link' , 'LIKE' , "%{$this->search}%" )
        ->latest()->paginate($this->rows);
        return view('livewire.dashboard.slides.list-all-slides' , compact('slides'));
    }
}
