<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\SellerProduct;
use App\Models\Size;
use App\Models\ProductColor;
use Livewire\WithPagination;
class Shop extends Component
{
    use WithPagination;

    protected $queryString = ['rows' , 'sort_by' , 'sizes'];

    public $rows = 10;
    public $sort_by = '';
    public $sizes = [];
    protected $paginationTheme = 'bootstrap';

    public function updatingRows()
    {
        $this->resetPage();
    }

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function updatingSizes($value)
    {
        array_push($this->sizes,$value);
    }


    public function render()
    {
        $all_sizes = Size::all();
        $all_colors = ProductColor::get()->unique('color');
        // dd($all_colors);
        $products = SellerProduct::query();
        $products->with(['store' , 'category']);

        if($this->sort_by != '') {

            switch ($this->sort_by) {
                case 'price_low_to_high':
                    $products = $products->orderBy('price' , 'ASC' );
                break;
                case 'price_high_to_low':
                    $products = $products->orderBy('price' , 'DESC' );
                break;
                case 'date':
                   $products = $products->latest();
                break;
                case 'rating':
                   $products = $products->orderBy('price' , 'ASC' );
                break;
                case 'best_selling':
                   $products = $products->orderBy('count_order' , 'DESC' );
                break;
                
                default:
                  $products = $products->latest();
                break;
            }
        }


        // if (count($this->sizes)) {
        //     $product_sizes = $this->sizes;
        //     $products->with(['product' => function($query) use($product_sizes) {
        //         $query->whereHas('sizes' , function($query1)use($product_sizes){
        //             $query1->whereIn('id' , $product_sizes );
        //         });
        //     }]);
        // }



        $products = $products->paginate($this->rows);
        return view('livewire.site.shop' , compact('products' , 'all_sizes'));
    }
}
