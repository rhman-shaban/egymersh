<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Seller;
use App\Models\Store;
use App\Models\Order;
use App\Models\SellerProduct;
use App\Models\order_seller;
use App\Models\OrderItem;
use App\Models\product_order;


 

class statisticsController extends Controller
{
    public function index(){

        $Products = Product::get();
        //$dd= SellerProduct::where('product_id',22)->with('product')->count('id');
        
        //dd($dd);
        //$items = SellerProduct::groupby('product_id')->get();
        

        foreach($Products as $Product)
        $Products_id=Product::pluck('id')->toarray();
        $product_used=SellerProduct::pluck('product_id')->toarray();
        

        $start = Carbon::now()->subWeek()->startOfWeek();
        $end = Carbon::now()->subWeek()->endOfWeek();
       
        //users statistics
        $users = User::get();
        $usersChart = User::select('id', 'created_at')
        ->get()
        ->groupBy(function($date) {
        //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
        return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });

        

        foreach ($usersChart as $key => $value) {
        $usersChartresult[(int)$key] = count($value);
        }
         
        for($i = 1; $i <= 12; $i++){
        if(!empty($usersChartresult[$i])){
            $uc[$i] = $usersChartresult[$i];    
        }else{
            $uc[$i] = 0;    
        }
        }
        $usersChat = User::whereYear('created_at', Carbon::now()->year);
        $usersToday = User::where('created_at', Carbon::today())->count();
        $userLastWeek =  User::whereBetween('created_at', [$start, $end])->count();
        $userLastMonth = USer::whereMonth(
            'created_at', '=', Carbon::now()->subMonth()->month
        )->count();

         //sellers statistics
         $sellers = Seller::get();
         $sellersChart = Seller::select('id', 'created_at')
                ->get()
                ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
                });

                $sellersChartresult = [];
                $sc = [];

                foreach ($sellersChart as $key => $value) {
                $sellersChartresult[(int)$key] = count($value);
                }
                for($i = 1; $i <= 12; $i++){
                if(!empty($sellersChartresult[$i])){
                    $sc[$i] = $sellersChartresult[$i];    
                }else{
                    $sc[$i] = 0;    
                }
                }
         $sellersActive = Seller::where('status','true')->count();
         $sellersInActive = Seller::where('status','false')->count();
         $sellersToday = Seller::where('created_at', Carbon::today())->count();
         $sellersLastWeek =  Seller::whereBetween('created_at', [$start, $end])->count();
         $sellersLastMonth = Seller::whereMonth(
             'created_at', '=', Carbon::now()->subMonth()->month
         )->count();

         //stores statistics
         $stores = Store::get();
         $storesChart = Store::select('id', 'created_at')
         ->get()
         ->groupBy(function($date) {
         //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
         return Carbon::parse($date->created_at)->format('m'); // grouping by months
         });

         $storesChartresult = [];
         $storesChartr = [];

         foreach ($storesChart as $key => $value) {
         $storesChartresult[(int)$key] = count($value);
         }

         for($i = 1; $i <= 12; $i++){
         if(!empty($storesChartresult[$i])){
             $storesChartr[$i] = $storesChartresult[$i];    
         }else{
             $storesChartr[$i] = 0;    
         }
         }
      
         $storesChat = Store::whereYear('created_at', Carbon::now()->year);
         $storesactive = Store::where('active',1)->count();
         $storesInactive = Store::where('active','!=',1)->count();

         //orders statistics
         $orders = Order::get();
         $ordersChartManual = Order::where('Manual','!=','null')->select('id', 'created_at')
         ->get()
         ->groupBy(function($date) {
         //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
         return Carbon::parse($date->created_at)->format('m'); // grouping by months
         });

         $usermcount = [];
         $userArr = [];

         foreach ($ordersChartManual as $key => $value) {
         $ordersChartresult[(int)$key] = count($value);
         }

         for($i = 1; $i <= 12; $i++){
         if(!empty($ordersChartresult[$i])){
             $ordersChartManualr[$i] = $ordersChartresult[$i];    
         }else{
             $ordersChartManualr[$i] = 0;    
         }
         }

         $ordersChartOrganic = Order::where('Organic','!=','null')->select('id', 'created_at')
         ->get()
         ->groupBy(function($date) {
         //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
         return Carbon::parse($date->created_at)->format('m'); // grouping by months
         });

    
         foreach ($ordersChartOrganic as $key => $value) {
         $ordersOrganicChartresult[(int)$key] = count($value);
         }

         for($i = 1; $i <= 12; $i++){
         if(!empty($ordersOrganicChartresult[$i])){
             $ordersOrganicChartManualr[$i] = $ordersOrganicChartresult[$i];    
         }else{
             $ordersOrganicChartManualr[$i] = 0;    
         }
         }
         
         $ordersChat = Order::whereYear('created_at', Carbon::now()->year);
         $ordersManual = order_seller::count();
         $ordersOrganic = Order::where('Organic','!=','null')->count();
         $ordersDelivered = Order::where('Delivered','!=','null')->count();
         $orderdeleverd    =order_seller::where('status','delivred')->count();
        $totalorder=$ordersDelivered +  $orderdeleverd ;
        $totalorder = Order::count();
        $allorder= $ordersManual  + $totalorder ;

        //profit

        $order    =Order::where('order_status_id','4')->pluck('id')->toarray();
        $product = OrderItem::wherein('order_id', $order)->get();
        $details=0;
        $revenu=0;
        foreach($product as $i){
                
            $details =($i->product->selling_price+  $details) *$i->quantity;
            $revenu =($i->product->price+  $revenu) *$i->quantity;
        }
        $order_seller    =order_seller::where('status','delivred')->select('total_price','profit')->get();
    
        $balnce=$details + $order_seller->sum('profit');
        
        $total_revenue =$revenu  + $order_seller->sum('total_price');

        $base_revenue=$total_revenue  -  $balnce;
        
        

        return view("dashboard.statistics.index",compact(
        'Products','users','usersToday','userLastWeek',
        'userLastMonth','sellers','sellersActive',
        'sellersInActive','sellersToday',
        'sellersLastWeek','sellersLastMonth','stores',
        'storesactive','storesInactive',
        'orders','ordersManual','ordersOrganic','ordersDelivered',
        'uc','storesChartr','ordersChat','sc','ordersChartManualr',
        'ordersOrganicChartManualr','totalorder','allorder','balnce','base_revenue','total_revenue','balnce'
    ));
    }
}
