<aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a href="{{ url('/myStore') }}" class="brand-wrap">
                <img src="{{ asset('store_assets/assets/imgs/theme/logo.svg') }}" class="logo" alt="Evara Dashboard">
            </a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
            </div>
        </div>
        <nav>
            <ul class="menu-aside">
                <li class="menu-item active">
                    <a class="menu-link" href="{{ url('/myStore') }}"> <i class="icon material-icons md-home"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-products-list.html"> <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Products</span>
                    </a>
                    <div class="submenu">
                        <a href="{{ route('product.index') }}">Product List</a>
                        <a href="{{ route('product.create') }}">Add New Product</a>
                        <a href="{{ route('add-product-seller') }}">Add Product seller</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-sellers-cards.html"> <i class="icon material-icons md-store"></i>
                        <span class="text">my Store </span>
                    </a>
                    <div class="submenu">
                        
                        <a href="{{ route('stores.create') }}"> Create New Store </a>    

                        @foreach (App\Models\Store::all() as $store)

                            <a href="{{ route('stores.show',$store->id) }}">{{ $store->name }}</a>
                            
                        @endforeach

                    </div>
                </li>
                
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-products-list.html"> <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Orders</span>
                    </a>
                    <div class="submenu">
                        <a href="{{ route('product.create') }}">Place new order</a>
                        <a href="{{ route('order.seller.index') }}">My Order</a>
                    </div>
                </li>

                <li class="menu-item">
                    <a class="menu-link" href="{{ route('static') }}"> <i class="icon material-icons md-pie_chart"></i>
                        <span class="text">Statistics</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link" href="{{ route('notification.index') }}"> <i class="icon material-icons md-notifications"></i>
                        <span class="text">Notification</span>
                    </a>
                </li>
                

                <li class="menu-item">
                    <a class="menu-link" href="{{ url('/myStore/wallet') }}"> <i class="icon material-icons md-monetization_on"></i>
                        <span class="text">Wallet</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="{{ url('/myStore/settings') }}"> <i class="icon material-icons md-settings"></i>
                        <span class="text">Settings</span>
                    </a>
                </li>                
            </ul>
            <hr>
            <ul class="menu-aside">
                
                <li class="menu-item">
                    <a class="menu-link" href="{{ url('/') }}"> <i class="icon material-icons md-local_offer"></i>
                        <span class="text"> Website </span>
                    </a>
                </li>
                <li class="menu-item">

                    <a class="menu-link" onclick="event.preventDefault();document.getElementById('logout-seller-form').submit();">
                        <i class="icon material-icons md-exit_to_app"></i>
                        <span class="text"> Logout </span>
                    </a>

                    <form id="logout-seller-form" action="{{ route('seller.logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
            <br>
            <br>
        </nav>
    </aside>