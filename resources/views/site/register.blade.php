@extends('site.layouts.master')

@section('page_content')
<main class="main">
    {{-- <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Pages
                <span></span>  Register
            </div>
        </div>
    </div> --}}
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div style="border-right: 2px solid #088178;" class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                <div class="padding_eight_all bg-white">
                                   <div class="heading_s1">
                                    <h3 class="mb-30">Create an Account</h3>
                                </div>
                                <p class="mb-50 font-sm">
                                    Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy
                                </p>
                                <form method="POST" action="{{ route('users.register') }}" >
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" required="" name="name" class="@error('name')   is-invalid  @enderror"  value="{{ old('name') }}"   placeholder="name">
                                        @error('name')
                                        <p class="text-danger" > {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" name="email" class="@error('email')   is-invalid  @enderror"  value="{{ old('email') }}"   placeholder="email">
                                        @error('email')
                                        <p class="text-danger" > {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" name="phone" class="@error('phone')   is-invalid  @enderror"  value="{{ old('phone') }}"   placeholder="phone">
                                        @error('phone')
                                        <p class="text-danger" > {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="password" name="password"  class="@error('password')   is-invalid  @enderror" placeholder="Password">
                                        @error('password')
                                        <p class="text-danger" > {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="password" name="password_confirmation" placeholder="confirm password">
                                    </div>
                                    <div class="login_footer form-group">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up">Register</button>
                                    </div>
                                </form>
                                    {{-- <div class="divider-text-center mt-15 mb-15">
                                        <span> or</span>
                                    </div>
                                    
                                    <div class="text-muted text-center"> forget your password ? <a href="{{ url('/register') }}">reset password</a></div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="divider-text-center mt-15 mb-15">
                                        <span> or</span>
                                    </div>
                                    <ul class="btn-login list_none text-center mb-15">
                                        <li style="display: block; margin-top:10px ; "><a href="#" class="btn btn-facebook hover-up mb-lg-0 mb-sm-4">Register With Facebook</a></li>
                                        <li style="display: block; margin-top:10px ; " ><a href="#" class="btn btn-google hover-up">Register With Google</a></li>
                                    </ul>
                                    <div class="text-muted text-center"> Already have an account ? </div>
                                    <div class="text-muted text-center">
                                     <ul>
                                        <li style="display: block; margin-top:10px ; " ><a href="#" class="btn btn-fill-out btn-block hover-up">Sign in Now </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
</main>
@endsection