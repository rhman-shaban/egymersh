<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Models\Page;
use App\Models\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // $data['categories'] = Category::where('active' , 1)->with('categories')->where('parent_id' ,'=' , null)->get();
        // $data['pages'] = Page::where('active' , 1)->latest()->get();

        // View::share('data', $data);
    }
}
