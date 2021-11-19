@if (Auth::guard('seller')->user()->status == 'false')
    
    @if (App\Models\Reply::count() > 0)
        
        @foreach (App\Models\Reply::where('seller_id',auth()->guard('seller')->user()->id)->get(); as $reply)
                        
        <div class="alert alert-danger alert-dismissible">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>{{ $reply->message }}</strong> 
            <a type="button" class="btn-close send-seller-remove" data-bs-dismiss="alert"></a>
        </div>

        @endforeach

    @else

        <div class="alert alert-danger" role="alert">

            <span>Welcome to your "Seller dashboard" 🥳 , you will be able to open a store and add products once your application is accepted! 🥰 </span>

        </div>

    @endif

@endif

<header class="main-header navbar">
    <div class="col-search">
        <form class="searchform">
            <datalist id="search_terms">
                <option value="Products">
                <option value="New orders">
                <option value="Apple iphone">
                <option value="Ahmed Hassan">
            </datalist>
        </form>
    </div>
    <div class="col-nav">
        <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="material-icons md-apps"></i> </button>
        <ul class="nav">
            <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false">
                    @php
                        $n = App\Models\Notification::count();
                        $s = App\Models\NotificationEye::where('seller_id',auth()->guard('seller')->user()->id)->count();
                    @endphp
                    <i class="material-icons md-notifications {{ $n - $s == 0 ? '' : 'animation-shake' }}"></i>
                    <span class="badge rounded-pill">{{ $n - $s }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                    @foreach (App\Models\Notification::all() as $notification)

                        <a class="dropdown-item" href="{{ route('notification.show',$notification->id) }}">
                            <i class="material-icons md-help_outline"></i>
                            {{ $notification->title }}
                        </a>
                    
                    @endforeach
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-icon darkmode" data-dark="{{ session()->get('darkmode') == 'dark' ? 'dark' : 'nodark'}}" data-method='post' data-url="{{ route('darkmode') }}" href="#"> <i class="material-icons md-nights_stay"></i> </a>
            </li>
{{--             <li class="nav-item">
                <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
            </li> --}}
            <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownLanguage" aria-expanded="false"><i class="material-icons md-public"></i></a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item text-brand" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <img src="{{ asset('site_assets/assets/imgs/lang') }}/{{ $properties['native'] == 'English' ? 'en.jpeg' : 'ar.jpeg' }}" alt="English">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
            </li>
            <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="{{ Auth::guard('seller')->user()->image_path }}" alt="User"></a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                    <a class="dropdown-item" href="{{ url('/myStore/settings') }}"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account Settings</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-account_balance_wallet"></i>Wallet</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-receipt"></i>Billing</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-help_outline"></i>Help center</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" onclick="event.preventDefault();document.getElementById('logout-navbar-seller-form').submit();">
                        <i class="icon material-icons md-exit_to_app"></i>
                        Logout
                    </a>

                    <form id="logout-navbar-seller-form" action="{{ route('seller.logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>