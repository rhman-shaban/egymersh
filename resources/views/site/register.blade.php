@extends('site.layouts.master')

@section('page_title')
@lang('title.Register')
@endsection

@section('page_content')
<main class="main">
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">

              <!-- image -->
              <div class="col-md-6 m-auto d-flex align-items-center mb-20">
                <img class="img-responsive" src="{{ asset('site_assets/assets/imgs/register/register-user.png') }}" alt="register Egymerch">
              </div>

              <!-- register form -->
                <div class="col-lg-6 m-auto">
                    <div class="row">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                <div class="padding_eight_all bg-white">
                                   <div class="heading_s1">
                                    <h3 class="mb-30">@lang('register.Create an Account')</h3>
                                </div>

                                <form method="POST" action="{{ route('users.register') }}" >
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" required="" name="name" class="@error('name')   is-invalid  @enderror"  value="{{ old('name') }}"   placeholder="@lang('register.Name')">
                                        @error('name')
                                        <p class="text-danger" > {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" name="email" class="@error('email')   is-invalid  @enderror"  value="{{ old('email') }}"   placeholder="@lang('register.Email')">
                                        @error('email')
                                        <p class="text-danger" > {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" name="phone" class="@error('phone')   is-invalid  @enderror"  value="{{ old('phone') }}"   placeholder="@lang('register.Phone')">
                                        @error('phone')
                                        <p class="text-danger" > {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="password" name="password"  class="@error('password')   is-invalid  @enderror" placeholder="@lang('register.Password')">
                                        @error('password')
                                        <p class="text-danger" > {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="password" name="password_confirmation" placeholder="@lang('register.Confirm Password')">
                                    </div>
                                    <div class="login_footer form-group">
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up">@lang('register.Register')</button>
                                    </div>
                                </form>

                                </div>
                            </div>

                            <!-- sign up with Facebook or Gmail -->
                        {{-- <div class="col-lg-6">
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
                    </div> --}}

                </div>
            </div>

        </div>
    </div>
</section>
</main>
@endsection
