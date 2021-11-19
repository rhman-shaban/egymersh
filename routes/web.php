<?php
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProductColorController;
use App\Http\Controllers\Dashboard\ProductSizeController;
use App\Http\Controllers\Dashboard\AdminAuthController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\SlideController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\AjaxController;
use App\Http\Controllers\Dashboard\CouponController;
use App\Http\Controllers\Dashboard\OfferController;
use App\Http\Controllers\Dashboard\SizeController;
use App\Http\Controllers\Dashboard\SellerDetlseController;
use App\Http\Controllers\Dashboard\ReplyController;
use App\Http\Controllers\Dashboard\ProductSeller;
use App\Http\Controllers\Dashboard\email;
use App\Http\Controllers\Dashboard\newscontroller;
use App\Http\Controllers\Dashboard\GovernorateController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\OrderCommentController;
use App\Http\Controllers\Dashboard\ShippingCompanyController;
use App\Http\Controllers\Dashboard\ShippingCompanyPriceController;
use App\Http\Controllers\Dashboard\statisticsController;
use App\Http\Controllers\Dashboard\staticssellerController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Site\Auth\User\RegisterController;
use App\Http\Controllers\Site\Auth\User\LoginController;
use App\Http\Controllers\Site\SellerController;

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ShopController;
use App\Http\Controllers\Site\WishListController;

use App\Http\Controllers\Seller\OrderSellerController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Seller\StoreController;
use App\Http\Controllers\Seller\SettingController;
use App\Http\Controllers\Seller\WelcomController;
use App\Http\Controllers\Seller\walletcontroller;

use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\User\ProfileController as UserProfileContoller;

require __DIR__.'/auth.php';

Route::get('/add_new_item' , [AjaxController::class , 'add_new_item']);
Route::get('/add_new_size' , [AjaxController::class , 'add_new_size']);
    
Route::get('/test' , function(){
    return session()->forget(['cart_color','cart_size','price']);
    return Cart::destroy();
    $user = App\Models\Seller::find(1);
    Auth::guard('seller')->login($user);

});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

########################################################################################################################
#######################################################|| Route DAshboard ||############################################
########################################################################################################################


    Route::get('/Dashboard/login', [AdminAuthController::class , 'login_form'])->name('login_form');
    Route::post('/Dashboard/login/admin', [AdminAuthController::class , 'login'])->name('dashboard.login');

    Route::group(['middleware' => 'adminLoggedIn','prefix'=>'Dashboard'], function() {
        Route::get('send-mail', function () {
   
            $details = [
                'title' => 'Mail from ItSolutionStuff.com',
                'body' => 'This is for testing email using smtp'
            ];
           
            \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));
           
            dd("Email is Sent.");
        });

        Route::get('/'  , [DashboardController::class , 'index'])->name('Dashboard');
        Route::post('admin.logout'  , [AdminAuthController::class , 'logout'])->name('admin.logout');
        Route::get('/profile/edit'  , [ProfileController::class , 'profile_edit'])->name('profile.edit');
        Route::patch('/profile'  , [ProfileController::class , 'update_profile'])->name('profile.update');
        Route::resource('admins', AdminController::class);
        Route::resource('sellering', App\Http\Controllers\Dashboard\SellerController::class);
        Route::post('status.sellering', [App\Http\Controllers\Dashboard\SellerController::class, 'status'])->name('status.sellering');
        Route::get('seller_prfile', [SellerDetlseController::class,'prfile'])->name('seller.prfile');
        Route::get('seller_stores/{id}', [SellerDetlseController::class,'stores'])->name('seller.stores');
        Route::get('seller_products/{id}', [SellerDetlseController::class,'products'])->name('seller.products');
        Route::resource('categories', CategoryController::class);
        Route::get('statistics',[statisticsController::class,'index'])->name("statistics");
        Route::resource('products', ProductController::class);
        Route::get('all_product_seller', [ProductSeller::class,'index'])->name('product_seller.index');
        Route::get('product_seller_show/{id}', [ProductSeller::class,'show'])->name('product_seller.show');
        Route::post('replys.store', [ReplyController::class,'reply_store'])->name('replys.store');
        Route::post('replys.destroy', [ReplyController::class,'reply_destroy'])->name('replys.destroy');
        Route::resource('product_colors', ProductColorController::class);
        Route::resource('product_sizes', ProductSizeController::class);
        Route::resource('notifications', NotificationController::class);
        Route::resource('slides', SlideController::class);
        Route::resource('pages', PageController::class);
        Route::resource('sizes', SizeController::class);
        Route::resource('users', UserController::class);
        Route::resource('shipping_companies', ShippingCompanyController::class);
        Route::resource('governorates', GovernorateController::class);
        Route::resource('stores', App\Http\Controllers\Dashboard\StoreController::class);
        Route::resource('coupons', CouponController::class)->except(['show']);
        Route::resource('offers', OfferController::class)->except(['show']);
        Route::resource('orders', App\Http\Controllers\Dashboard\OrderController::class);
        Route::patch('orders/{order}/update_status'  , [App\Http\Controllers\Dashboard\OrderController::class , 'update_status'] )->name('orders.update_status');

        Route::delete('/shipping_company_prices/{price}' , [ShippingCompanyPriceController::class , 'destroy'] )->name('shipping_company.prices.destroy');

        Route::get('/shipping_company/{company}/prices/create' , [ShippingCompanyPriceController::class , 'create'] )->name('shipping_company.prices.create');
        Route::post('/shipping_company/{company}/prices' , [ShippingCompanyPriceController::class , 'store'] )->name('shipping_company.prices.store');

        Route::delete('order_comments/{comment}' , [OrderCommentController::class , 'destroy'] )->name('order_comments.destroy');

        Route::post('orders/{order}/comments' , [OrderCommentController::class , 'store'] )->name('orders.comments.store');
        Route::get('about/edit'  , [AboutController::class , 'edit'] )->name('about.edit');
        Route::patch('about'  , [AboutController::class , 'update'] )->name('about.update');
        Route::get('messages', [MessageController::class , 'index'])->name('messages.index');
        Route::get('messages/{message}', [MessageController::class , 'show'])->name('messages.show');
        Route::delete('messages/{message}', [MessageController::class , 'destroy'])->name('messages.destroy');
        Route::get('requset', [walletcontroller::class , 'confirm'])->name('requset.confirm');
        Route::post('requset-update', [walletcontroller::class , 'update'])->name('requset.update');
        Route::get('replay/{id}', [email::class , 'index'])->name('replay');
        Route::post('send', [email::class , 'sendEmail'])->name('send-email');

        Route::get('whats-new', [newscontroller::class , 'index'])->name('news');
        Route::post('store-news', [newscontroller::class , 'store'])->name('store-news'); 
        Route::get('order-manual', [OrderController::class , 'manual_order'])->name('manual.order');
        Route::get('show_order-manual/{id}', [OrderController::class , 'show_manual_order'])->name('manual.order.show');
       
    });//endof route group


########################################################################################################################
#######################################################|| Route Dashboard ||############################################
########################################################################################################################










########################################################################################################################
#######################################################|| Route Store ||################################################
########################################################################################################################



    Route::resource('sellers', SellerController::class);
    Route::post('darkmode'  , [WelcomController::class , 'darkmode'])->name('darkmode');

    Route::group(['prefix' => 'myStore','middleware'=>'seller'], function() {

        Route::get('/', [WelcomController::class , 'index'])->name('store.index');
        Route::get('category_product/{id}'  , [SellerProductController::class , 'product'])->name('category.product');
        Route::post('show_product'  , [SellerProductController::class , 'show_product'])->name('show.product');
        Route::get('product.index'  , [SellerProductController::class , 'products_index'])->name('product.index');
        Route::get('/products/create'  , [SellerProductController::class , 'products_create'])->name('product.create');
        Route::get('prod_index'  , [SellerProductController::class , 'index'])->name('prod.index');
        Route::post('sellers.store.product'  , [SellerProductController::class , 'store'])->name('sellers.store.product');
        Route::get('product/edit/{id}'  , [SellerProductController::class , 'edit'])->name('sellers.edit.product');
        Route::patch('product/update/{id}'  , [SellerProductController::class , 'update'])->name('sellers.update.product');
        Route::delete('destroy/{id}'  , [SellerProductController::class , 'destroy'])->name('sellers.destroy.product');
            //route orders;
        Route::get('order'  , [OrderSellerController::class, 'index'])->name('order.seller.index');
        Route::get('/store/productds/{id}'  , [OrderSellerController::class, 'store_product'])->name('order.seller.store');
        Route::get('/store/productd/details'  , [OrderSellerController::class, 'product_details'])->name('order.seller.product');
        Route::get('chouse.color'  , [OrderSellerController::class, 'chouse_color'])->name('chouse.color.size');
        Route::post('store_order'  , [OrderSellerController::class, 'store_order'])->name('store.order');
            //route stores
        Route::resource('stores', StoreController::class)->except(['index']);
        Route::post('update.active'  , [StoreController::class , 'active'])->name('update.active');
        Route::get('stores.create'  , [StoreController::class , 'create'])->name('stores.create');
            //route setting

        Route::get('profile.password'  , [SettingController::class , 'password_index'])->name('profile.password');
        Route::post('profile.password'  , [SettingController::class , 'password_update'])->name('profile.password');
        Route::post('profile.store'  , [SettingController::class , 'profile_store'])->name('profile.store');
        Route::get('notification/{id}'  , [SettingController::class , 'notification_show'])->name('notification.show');
        Route::get('all_notification'  , [SettingController::class , 'notification_index'])->name('notification.index');

        Route::get('/statistics' , function(){
            return view('store.statistics');
        })->middleware('status_seller');

        Route::get('/add-product-seller' , function(){
            return view('store.products-seller.create');
        })->name('add-product-seller');

        

        Route::get('/settings' , function(){
            return view('store.settings');
        });

        Route::get('profile.password'  , [SettingController::class , 'password_index'])->name('profile.password');
        Route::post('profile.password'  , [SettingController::class , 'password_update'])->name('profile.password');
        Route::post('profile.store'  , [SettingController::class , 'profile_store'])->name('profile.store');
        Route::get('notification/{id}'  , [SettingController::class , 'notification_show'])->name('notification.show');
        Route::get('all_notification'  , [SettingController::class , 'notification_index'])->name('notification.index');   
        Route::get('/static'  , [staticssellerController::class , 'index'])->name('static');
        Route::get('/wallet'  , [walletcontroller::class , 'index'])->name('wallet');
        Route::post('store_wallet'  , [walletcontroller::class , 'create'])->name('store.wallet');
        route::post('get_price' ,[OrderSellerController::class,'get_shipping_price'])->name('get.price');
        Route::get('shownews/{id}', [WelcomController::class , 'show'])->name('show-news');
    });//route guarp


########################################################################################################################
#######################################################|| Route Store ||################################################
########################################################################################################################








########################################################################################################################
#######################################################|| Route site ||#################################################
########################################################################################################################

    Route::get('/add_new_item' , [AjaxController::class , 'add_new_item']);
    Route::get('/add_new_size' , [AjaxController::class , 'add_new_size']);
    Route::get('/product_quick_view' , [HomeController::class , 'product_quick_view' ]);

    //seller Rote
    Route::get('/user_to_seeler' , [SellerController::class , 'user_to_seeler'])->name('user_to_sellers.index');
    Route::post('/user_to_seeler' , [SellerController::class , 'user_to_seeler_store'])->name('user_to_sellers.store');

    Route::get('/register', [RegisterController::class  , 'create' ] )->name('users.register.form');
    Route::post('/register', [RegisterController::class  , 'store' ] )->name('users.register');


    // Route::group(['middleware' => 'UserMustBeLoggedIn'], function() {
    Route::group(['middleware' => 'auth:seller'], function() {
        Route::get('/account', [UserProfileContoller::class , 'account'] )->name('user.account');
        Route::get('/account/orders', [UserProfileContoller::class , 'orders'] )->name('user.orders');
        Route::get('/account/orders/{id}', [UserProfileContoller::class , 'show_order'] )->name('user.orders.show');
        Route::post('/account', [UserProfileContoller::class , 'update'] )->name('user.account.update');
        Route::get('/account/wishlist', [UserProfileContoller::class , 'wishlist'] )->name('user.account.wishlist');  
        Route::delete('/account/withlist/{id}' ,  [UserProfileContoller::class , 'remove_item_from_wishlist']  )->name('user.account.wishlist.destroy');     
    });

    Route::post('/wishlist' , [WishListController::class , 'store'])->name('wishlist.store');
    Route::get('/login'  , [LoginController::class , 'form'] )->name('user.login_form');
    Route::post('/login'  , [LoginController::class , 'login'])->name('user.login');
    Route::get('/logout', [LoginController::class , 'logout'] )->name('user.account.logout');       
    Route::post('seller.logout'  , [LoginController::class , 'seller_logout'])->name('seller.logout');
    Route::get('/subscribe'  ,[ HomeController::class , 'subscribe'] );
    Route::get('/search'  ,[ HomeController::class , 'search'] );
    Route::get('/about', [HomeController::class , 'about']);
    Route::get('/pages/{page}', [HomeController::class , 'page']);
    Route::get('/'  , [HomeController::class , 'index'] )->name('welcome.index');
    Route::get('/contact', [HomeController::class , 'contact'] );
    Route::get('/send_mail', [HomeController::class , 'contact_us'] );
        //store details
    Route::get('/store/{id}', [HomeController::class , 'store_details'])->name('store.seller');
        //product details
    Route::get('/product/{id}', [HomeController::class , 'product_details'])->name('product.details');
        //product details
    Route::get('/chouse_color/{id}', [HomeController::class , 'chouse_color'])->name('chouse.color');
        //rpute card
    Route::get('/cart', [CartController::class, 'cart_index'])->name('cart.index');
    Route::post('/cart.store/{id}', [CartController::class, 'add_cart'])->name('cart.store');
    Route::post('/cart_update/{id}', [CartController::class, 'update_cart'])->name('cart.update');
    Route::delete('/destroy_cart/{id}', [CartController::class, 'destroy_cart'])->name('cart.destroy');
    Route::post('/coupon_cart', [CartController::class, 'add_coupon_cart'])->name('cart.coupon');
    Route::get('/destroy_cart', [CartController::class, 'destroy_coupon_cart'])->name('cart.destroy.coupon');
    Route::get('/shop' , [ShopController::class , 'index']);
    //route order

    Route::resource('checkout', CheckoutController::class);
    Route::get('governorate_shipping/{id}' , [CheckoutController::class , 'shipping']);

    Route::get('ordersstore'  , [OrderController::class , 'store']);



########################################################################################################################
#######################################################|| Route site ||#################################################
########################################################################################################################


});//enf of LaravelLocalization
