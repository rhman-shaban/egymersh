<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EgyMerch Dashboard</title>
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
    <link href="{{ asset('store_assets/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site_assets/assets/css/vendors/fontawesome-all.min.css') }}">

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('plugin/noty/noty.css') }}">
    <script src="{{ asset('plugin/noty/noty.min.js') }}"></script>
    @livewireStyles
    @yield('styles')
    <style type="text/css">
        .colorpick-eyedropper-input-trigger {
            min-width: 40px!important;
        }
    </style>
</head>
<body class="{{ session()->get('darkmode') == 'dark' ? 'dark' : 'nodark' }}">

    <div class="screen-overlay"></div>
    @include('dashboard.layouts.sidebar')
    <main class="main-wrap">
        @include('dashboard.layouts.header')
        @yield('page_content')
        @include('dashboard.layouts.footer')
    </main>
    @include('partials._session')
    <script src="{{ asset('store_assets/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/select2.min.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/chart.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('store_assets/assets/js/main.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('plugin/printThis.js') }}" type="text/javascript"></script>

    @livewireScripts
    @yield('scripts')
    <script type="text/javascript">
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

</body>

</html>
