<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <title> Egymerch | @yield('page_title') </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('site_assets/assets/imgs/theme/favicon.svg') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('site_assets/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('site_assets/assets/css/vendors/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site_assets/assets/css/acount.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    
    {{-- niceCountryInput --}}
    <link rel="stylesheet" href="{{ asset('plugin/country/niceCountryInput.css') }}">

    <!-- vendor min  css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/sweetalert/sweetalert2.min.css') }}">

    <style type="text/css">
    .answer { display:none }
    .error {border-color: #dc3545}
    .center-image {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }
    .bg-border {
       border-radius: 50%; 
       padding: 10px
    }
</style>
@livewireStyles
</head>

<body>
    <!-- Modal -->
{{--     <div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">              
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>       
                <div class="modal-body">
                    <div class="deal" style="background-image: url('{{ asset('site_assets/assets/imgs/banner/menu-banner-7.png') }}')">
                        <div class="deal-top">
                            <h2 class="text-brand">Deal of the Day</h2>
                            <h5>Limited quantities.</h5>
                        </div>
                        <div class="deal-content">
                            <h6 class="product-title"><a href="shop-product-right.html">Summer Collection New Morden Design</a></h6>
                            <div class="product-price"><span class="new-price">$139.00</span><span class="old-price">$160.99</span></div>
                        </div>
                        <div class="deal-bottom">
                            <p>Hurry Up! Offer End In:</p>
                            <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"><span class="countdown-section"><span class="countdown-amount hover-up">03</span><span class="countdown-period"> days </span></span><span class="countdown-section"><span class="countdown-amount hover-up">02</span><span class="countdown-period"> hours </span></span><span class="countdown-section"><span class="countdown-amount hover-up">43</span><span class="countdown-period"> mins </span></span><span class="countdown-section"><span class="countdown-amount hover-up">29</span><span class="countdown-period"> sec </span></span></div>
                            <a href="shop-grid-right.html" class="btn hover-up">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
    --}}
    <!-- Quick view -->

    @include('site.layouts.header')
    
    <main class="main">       
        @yield('page_content')
    </main>
    @include('site.layouts.footer')
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <h5 class="mb-10">Now Loading</h5>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->

    <script src="{{ asset('site_assets/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/plugins/jquery.elevatezoom.js') }}"></script>

    @livewireScripts

    {{-- <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ Storage::disk('s3')->url('site_assets/assets/js/plugins/jquery.elevatezoom.js') }}"></script> --}}
    
    <!-- Template  JS -->
    <script src="{{ asset('site_assets/assets/js/main.js') }}"></script>
    <script src="{{ asset('site_assets/assets/js/shop.js') }}"></script>
    
    {{-- niceCountryInput js --}}
    <script src="{{ asset('plugin/country/niceCountryInput.js') }}" type="text/javascript"></script>

    <!-- min sweetalert -->
    <script src="{{ asset('plugin/sweetalert/sweetalert2.all.min.js') }}"></script>

    <!-- min sweetalert -->
    <script src="{{ asset('site_assets/assets/js/cart.js') }}"></script>

    {{--jquery number--}}

    <script src="{{ asset('plugin/jquery.number.min.js') }}"></script>

    <script src="{{ asset('plugin/jquery.number.min.js') }}"></script>
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    @yield('scripts')
    @stack('sellersRegister')
    @stack('profile')
    <script>
        $(function() {


            // $(document).on('click', 'a.quickViewProduct', function(event) {
            //     event.preventDefault();
            //     $('#quickViewModal').modal('show');
            // });

            $(document).on('click', 'a.quickViewProduct', function(event) {
                event.preventDefault();
                var product_id = $(this).attr('data-product_id');
                console.log(product_id);
                var modal_name = $(this).attr('data-modal_name');
                console.log(modal_name);
                $.ajax({
                    url: '{{ url('/product_quick_view') }}',
                    type: 'GET',
                    dataType: 'html',
                    data: {product_id:product_id},
                })
                .done(function(data) {
                 $(document).find('body').append(data);
                 $(document).find('body').find(modal_name).modal('show');
             });
                
                
            });


            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })




            $(document).on('click', 'a.add_to_wishlist' , function(event) {
                event.preventDefault();
                var product_id = $(this).attr('data-product_id');
                console.log(product_id);
                $.ajax({
                    url: '{{ route('wishlist.store') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {product_id: product_id , _token:"{{ csrf_token() }}"  , _method:"POST" },
                })
                .done(function(data) {
                    Toast.fire({
                        icon: data.status,
                        title: data.message
                    })
                });

            });
        });
    </script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function onChangeCallback(ctr){
            // console.log("The country was changed: " + ctr);
            //$("#selectionSpan").text(ctr);
        }

        $(document).ready(function () {
            $(".niceCountryInputSelector").each(function(i,e){
                new NiceCountryInput(e).init();
            });
        });

    </script>

    <script type="text/javascript">

        $(document).ready(function() {

            $('button.subscribe').on('click', function(event) {
                event.preventDefault();

                var button = $(this);
                button.attr('disabled' , true);
                email = $(this).prev().val();
                $.ajax({
                    url: '{{ url('/subscribe') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {email:email},
                })
                .done(function(data) {
                    Swal.fire({
                        icon: data.status,
                        text: data.message,
                    });
                    button.attr('disabled' , false);

                });

            });

        });//end of document ready function

    </script>

</body>

</html>