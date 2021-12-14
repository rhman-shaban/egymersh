@extends('site.layouts.master')

@section('page_title')
@lang('title.Contact Us')
@endsection

@section('page_content')
<main class="main">
    <section class="bg-green">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 d-flex align-items-center">
                     <img class="img-responsive" src="{{ asset('site_assets/assets/imgs/contact/contact.png') }}" alt="Contact Egymerch">
                    </div>

                    <div class="col-md-6 d-flex align-items-center">
                        <div class="text-center pt-50 pb-50">
                            <h4 class="text-brand mb-20">@lang('contact.Get in touch')</h4>
                            <h1 class="mb-20 wow fadeIn animated font-xxl fw-900">
                                @lang('contact.We would love to hear from YOU')
                            </h1>
                            <p class="w-50 m-auto mb-50 wow fadeIn animated">@lang('contact.contact main msg')</p>
                            <p class="wow fadeIn animated">
                                <a class="btn btn-brand btn-lg font-weight-bold text-white border-radius-5 btn-shadow-brand hover-up" href="{{ url('/about') }}">@lang('contact.About Us')</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
    </section>

    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 m-auto">

                    @include('dashboard.layouts.messages')
                    <div class="contact-from-area padding-20-row-col wow FadeInUp">
                        <h3 class="mb-10 text-center">@lang('contact.Contact Us')</h3>
                        <p class="text-muted mb-30 text-center font-sm"></p>
                        <form method="get" action="{{ url('/send_mail') }}"  class="contact-form-style text-center" >
                             @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="name" placeholder="@lang('contact.Name')" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="email" required class="@error('email') is-invalid @enderror" placeholder="@lang('contact.Email')" type="email" value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                        <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="phone" required class="@error('phone') is-invalid @enderror" placeholder="@lang('contact.Phone')" type="tel"
                                        value="{{ old('phone') }}">
                                    </div>
                                     @error('phone')
                                        <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="subject" required placeholder="@lang('contact.Subject')" type="text" value="{{ old('Subject') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="textarea-style mb-30">
                                        <textarea name="message" required class="@error('message') is-invalid @enderror" placeholder="@lang('contact.Message')">{{ old('message') }}</textarea>
                                    </div>
                                    @error('message')
                                        <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                    <button type="submit" class="submit submit-auto-width">@lang('contact.Send Message')</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
