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
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('store_assets/assets/imgs/theme/favicon.png') }}">
    <!-- Template CSS -->
    <link href="{{ asset('store_assets/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <main>

        <section class="content-main mt-80 mb-80">
            <div class="card mx-auto card-login">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sign in To Dashboard</h4>
                    <form method="POST"  action="{{ route('dashboard.login') }}">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username" type="text">
                            @error('username')
                            <p class="text-danger" > {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input name="password" class="form-control @error('password') is-invalid  @enderror" placeholder="Password" type="password">
                             @error('password')
                            <p class="text-danger" > {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <a href="#" class="float-end font-sm text-muted">Forgot password?</a>
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" checked="">
                                <span class="form-check-label">Remember</span>
                            </label>
                        </div> <!-- form-group form-check .// -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100"> Login </button>
                        </div> <!-- form-group// -->
                    </form>



                </div>
            </div>
        </section>
        <footer class="main-footer text-center">
            <p class="font-xs">
                <script>
                document.write(new Date().getFullYear())
                </script> ©, Evara - HTML Ecommerce Template .
            </p>
            <p class="font-xs mb-30">All rights reserved</p>
        </footer>
    </main>
    <script src="{{ asset('store_assets/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('store_assets/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('store_assets/assets/js/main.js') }}" type="text/javascript"></script>
</body>

</html>
