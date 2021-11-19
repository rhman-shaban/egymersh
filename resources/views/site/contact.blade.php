@extends('site.layouts.master')

@section('page_content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Pages
                <span></span> Contact us
            </div>
        </div>
    </div>
    <section class="hero-2 bg-green">
        <div class="hero-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                        <div class="text-center">
                            <h4 class="text-brand mb-20">Get in touch</h4>
                            <h1 class="mb-20 wow fadeIn animated font-xxl fw-900">
                                Let's Talk About <br>Your <span class="text-style-1">Idea</span>
                            </h1>
                            <p class="w-50 m-auto mb-50 wow fadeIn animated">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum quam eius placeat, a quidem mollitia at accusantium reprehenderit pariatur provident nam ratione incidunt magnam sequi.</p>
                            <p class="wow fadeIn animated">
                                <a class="btn btn-brand btn-lg font-weight-bold text-white border-radius-5 btn-shadow-brand hover-up" href="{{ url('/about') }}">About Us</a>
                                <a class="btn btn-outline btn-lg btn-brand-outline font-weight-bold text-brand bg-white text-hover-white ml-15 border-radius-5 btn-shadow-brand hover-up">Support Center</a>
                            </p>
                        </div>
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
                        <h3 class="mb-10 text-center">Drop Us a Line</h3>
                        <p class="text-muted mb-30 text-center font-sm">Lorem ipsum dolor sit amet consectetur.</p>
                        <form method="get" action="{{ url('/send_mail') }}"  class="contact-form-style text-center" >
                             @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="name" placeholder="First Name" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="email" class="@error('email') is-invalid @enderror" placeholder="Your Email" type="email">
                                    </div>
                                                                            @error('email')
                                        <p class="text-danger"> {{ $message }} </p>
                                        @enderror
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="phone" class="@error('phone') is-invalid @enderror" placeholder="Your Phone" type="tel">
                                    </div>
                                     @error('phone')
                                        <p class="text-danger"> {{ $message }} </p>
                                        @enderror
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="subject" placeholder="Subject" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="textarea-style mb-30">
                                        <textarea name="message" class="@error('message') is-invalid @enderror" placeholder="Message"></textarea>
                                    </div>
                                    @error('message')
                                        <p class="text-danger"> {{ $message }} </p>
                                        @enderror
                                    <button type="submit" class="submit submit-auto-width" >Send message</button>
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