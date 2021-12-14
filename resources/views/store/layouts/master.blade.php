<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <title> @yield('page_title')</title>
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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('store_assets/assets/imgs/theme/favicon.png') }}">
    <!-- Template CSS -->
    @if (app()->getLocale() == 'ar')

        <link href="{{ asset('store_assets/assets/css/main-rtl.css') }}" rel="stylesheet" type="text/css"/>

    @else

        <link href="{{ asset('store_assets/assets/css/main.css') }}" rel="stylesheet" type="text/css" />

    @endif

    <link rel="stylesheet" href="{{ asset('site_assets/assets/css/vendors/fontawesome-all.min.css') }}">
    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('plugin/noty/noty.css') }}">
    <script src="{{ asset('plugin/noty/noty.min.js') }}"></script>

    {{-- niceCountryInput --}}
    <link rel="stylesheet" href="{{ asset('plugin/country/niceCountryInput.css') }}">

    {{-- jquery-ui --}}
    <link rel="stylesheet" href="{{ asset('plugin/image-processing/jquery-ui.css') }}">

    {{-- Tag --}}
    <link rel="stylesheet" href="{{ asset('plugin/tag/tagify.css') }}">

    <!-- vendor min  css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/sweetalert/sweetalert2.min.css') }}">

    <style type="text/css">


        .containter {
          position: relative;
        }

        .logo-and-img{
          position: relative;
          height: 720px;
          margin-bottom: 20px;
          background-color: #eee;
        }

        .dragContainer {
          position: absolute;
          top: 150px;
          left: 200px;
          width: 200px;
          height: 300px;
          overflow: hidden;

          border: 2px red;
          border-style: dotted;
          border-radius: 2%;

          z-index: 12
        }

        .logoContainer {
          position: absolute;
          top: 0;
          left: 0;
          z-index: 10;
        }

        .imageContainer {
          position: absolute;
          top: 0;
          left: 0;
          /* margin-left: 100px; */
        }
        .row li {
          width: 33.3%;
          float: left;
        }

        img {
          border: 0 none;
          display: inline-block;
          height: auto;
          max-width: 100%;
          vertical-align: middle;
        }
        .containter {
          position: relative;
        }

        .logoContainer {
          position: absolute;
          z-index: 1;
        }

        .imageContainer {
          position: absolute;
          top: 0;
          left: 0;
        }
        .d-none {
            display: none !important;
        }
        .bg-btn-size { background: #088178; }
        .b-radius {
            border: solid 4px #088178;
            border-radius: 50% !important;
        }
        .center-image {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
        }
        .new-price {
            color: green;
            font-weight: bold;
        }

        .center-image {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .btn-radius {
            /*border-radius: 10px;*/
        }
        #blah{
            z-index: 10;
            /*position: absolute;*/
            left: 0;
            /*top: -100%;*/
            margin: 0px 0px 0px 0px;
        }

        #drag-1, #drag-2 {
          width: 25%;
          min-height: 6.5em;
          margin: 1rem 0 0 1rem;
          background-color: #29e;
          color: white;
          border-radius: 0.75em;
          padding: 4%;
          touch-action: none;
          user-select: none;
          transform: translate(0px, 0px);
        }

        .resize-drag {
          width: 50%;
          border: 2px red solid;

          touch-action: none;

          /* This makes things *much* easier */
          box-sizing: border-box;
          position: absolute;
        }
        .bg-logo {
            position: absolute;
            left: 0px;
            /*right: 0px!important;*/
            /*height: 0px!important;*/
            /*width: 0px!important;*/
            object-fit: none!important;
        }


        .cover-image {
            position: absolute;
            z-index: 2;
            top: auto;
            left: auto;
            width: 308px;
            height: 374px;
            border: 1px dotted #e86767;
            overflow: hidden;
        }
        .noty_theme__mint.noty_type__warning {
                background-color: #ffffff;
                color: red;
        }
        .text-light-country,
        .niceCountryInputMenuDropdownContent a{
            @if (session()->get('darkmode') == 'dark')
                color: #fff;
            @else
                color: black;
            @endif

        }
        .text-ligh {
            color: #fff;
        }
    </style>
</head>

<body class="{{ session()->get('darkmode') == 'dark' ? 'dark' : 'nodark'}}">
    <div class="screen-overlay text-li"></div>
    @include('store.layouts.sidebar')
    <main class="main-wrap">
        @include('store.layouts.header')
        @yield('page_content')
        @include('store.layouts.footer')
        @include('partials._session')
    </main>
    <script src="{{ asset('store_assets/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/select2.min.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/chart.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('store_assets/assets/js/main.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('store_assets/assets/js/custom-chart.js') }}" type="text/javascript"></script>
    <script src="{{ asset('store_assets/assets/js/add-product.js') }}" type="text/javascript"></script>
    <script src="{{ asset('store_assets/assets/js/manual-order.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugin/interact.min.js') }}" type="text/javascript"></script>

    {{-- niceCountryInput js --}}
    <script src="{{ asset('plugin/country/niceCountryInput.js') }}" type="text/javascript"></script>

    {{-- Tag js --}}
    <script src="{{ asset('plugin/tag/jQuery.tagify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugin/tag/tagify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugin/tag/tagify.polyfills.min.js') }}" type="text/javascript"></script>

    <!-- min sweetalert -->
    <script src="{{ asset('plugin/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('plugin/jquery.number.min.js') }}"></script>
    {{--noty--}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script> --}}
    @yield('scripts')
    @yield('setting')
    <script type="text/javascript">

        function onChangeCallback(ctr){
            console.log("The country was changed: " + ctr);
            //$("#selectionSpan").text(ctr);
        }

        $(document).ready(function () {
            $(".niceCountryInputSelector").each(function(i,e){
                new NiceCountryInput(e).init();
            });
        });

          interact('.resize-drag').draggable({
            onmove(event) {
              // console.log(event.pageX, event.pageY)
            },
          })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {

            $('.delete').click(function (e) {

                var that = $(this)

                e.preventDefault();

                var n = new Noty({
                    text: "@lang('dashboard.confirm_delete')",
                    type: "warning",
                    killer: true,
                    buttons: [
                        Noty.button("@lang('dashboard.yes')", 'btn btn-success mx-2 text-light', function () {
                            that.closest('form').submit();
                        }),

                        Noty.button("@lang('dashboard.no')", 'btn btn-primary mx-2 text-light', function () {
                            n.close();
                        })
                    ]
                });

                n.show();

            });//end of delete

        });//end of document ready
    </script>
    <script type="text/javascript">
    var inputElm = document.querySelector('input[name=tag]')

    new Tagify(inputElm, {
        // whitelist: ['abb', 'cbb', 'bb', 'bb1', 'aaabb', 'bbb', 'aa', 'bba'],
        // whitelist: ["ac", "aab", "aaa", "b", "bb", "ccc"],
        enforceWhitelist: false,
        dropdown: {
            enabled: 0,
            // sortby: 'startsWith',
            // sortby(suggestions, query){
            //     console.log(suggestions, query)
            //     return suggestions;
            // }
        }
    })
    </script>
    {{-- imageMaker js & jquery-ui.min.js --}}
    <script src="{{ asset('plugin/image-merge/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('store_assets/assets/js/seller/product.js') }}" type="text/javascript"></script>
</body>
</html>
