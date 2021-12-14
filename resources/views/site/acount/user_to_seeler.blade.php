@extends('site.layouts.master')

@section('page_title')
@lang('title.Seller Registeration')
@endsection

@section('page_content')
<main class="main">
    {{-- <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Pages
                <span></span> Contact us
            </div>
        </div>
    </div> --}}
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
                                <a class="btn btn-brand btn-lg font-weight-bold text-white border-radius-5 btn-shadow-brand hover-up" href="{{ url('/about') }}">Start Selling </a>

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
                    <div class="contact-from-area padding-20-row-col wow FadeInUp">
                        <h3 class="mb-10 text-center">Register As A seller / designer </h3>
                        <p class="text-muted mb-30 text-center font-sm">Lorem ipsum dolor sit amet consectetur.</p>

                        <form id="sellersRegister" action="{{ route('user_to_sellers.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <input type="email" class="form-control" name="email" placeholder="Enter email"
                                        value="{{ auth()->guard('seller')->user()->email }}">
                                     <span class="text-danger" id="email-error"></span>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <input type="text" class="form-control" name="name" placeholder="Enter user Name"
                                        value="{{ auth()->guard('seller')->user()->name }}">
                                     <span class="text-danger" id="name-error"></span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="niceCountryInputSelector bg-dark bg-transparent" data-selectedcountry="US" data-showspecial="false" data-showflags="true" data-i18nall="All selected"
                                        data-i18nnofilter="No selection" data-i18nfilter="Filter" data-onchangecallback="onChangeCallback" />
                                    </div>
                                </div> <!-- col .// -->

                                <input type="text" name="country" value="aaaa" id="seller-country" hidden>
                                <input type="text" name="image_country" id="seller-image-country" hidden value="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABsAAAAUCAYAAAB8gkaAAAAB7ElEQVR4XmMwMIn+7Rhc+V9SP/a/kVv+f237LDDbJawaTIP4IHEQG6RO1ijhv4pl6n8zz8L/DRZ+//fauhCNGXSsU7/6JzT/V7dJBxsAwiALIjO7wDRMDCQPUwcSB1ncUz/l+ot9B/YTixmM3fJ/g1yakN8PdjHIsNC0DhQaWT44uQ1sGYi9ctPh/6QABj2zhB9FDXP+K5gl/feJbfzvEVkHZpc1zwPTID5IHMQGqQNZYhtQBnZIo2fc2+ORsY+JxQzaFklfQQZlV06H+yyleBI4jkA0zGcgeZA6UPCC4hAUd+25TTfvzpl3mFgMDsb8mplgzSBfgFwNsii9bAqYBvFB4iB5mDpQHIKCk+Rg1DaO/QEzCORykE9AbJBFIBrEB4nDLAL51tKnBCxPejCaxX8DxQ9IMyi1wXwGEwPxQeLIYiDLQHHWGl3w8HJl3XliMTgYQQZUtS0Exw0opSH7DJbyQPKweITlO5KDUd8y8RssfkA+cAmtBgcXyBcgGsSH+QykDiQGsowsn3k7pz13d8367Gif+tnFKQOMQWxf7/wv6GLo6qYnltxBNxAfZgD67j66d2kFGC6U1+5CdwGtMMPxiNhT6EmUVpi+wXhn+pyN6MUKrfAwDsZnO/esQ6/kaIUZ9to630evvmmFAUOxrmQB62SbAAAAAElFTkSuQmCC">

                                <div class="form-group col-12 col-md-6">
                                    <input type="phone" class="form-control" name="phone" placeholder="Enter Phone"
                                        value="{{ auth()->guard('seller')->user()->phone }}">
                                     <span class="text-danger" id="phone-error"></span>
                                </div>
                                <hr>
                                <div class="col-12 my-2">
                                    <fieldset class="question">
                                        <h4>Have you worked in the Print On Demand business before ?</h4>
                                        <div class="row my-3">
                                            <div class="col-6">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="printing_field" id="printing_field_yes" value="1" checked>
                                                  <label class="form-check-label" for="printing_field_yes">
                                                    Yes
                                                  </label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="printing_field" id="printing_field_no" value="0">
                                                  <label class="form-check-label" for="printing_field_no">
                                                    No
                                                  </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <hr>
                                <div class="col-12 my-2 answe ans">
                                    <h4>I have a store on</h4>
                                    <div class="row my-4">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="merch_by_amazon" id="exampleRadios13" value="Merch By Amazon">
                                                <label class="form-check-label" for="exampleRadios13">Merch By Amazon</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="redbubble" id="exampleRadios14" value="Redbubble">
                                                <label class="form-check-label" for="exampleRadios14">Redbubble</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="etsy" id="exampleRadios15" value="Etsy">
                                                <label class="form-check-label" for="exampleRadios15">Etsy</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="teespring" id="exampleRadios16" value="Teespring (Spring)">
                                                <label class="form-check-label" for="exampleRadios16">Teespring (Spring)</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="spreadshirt" id="exampleRadios17" value="Spreadshirt">
                                                <label class="form-check-label" for="exampleRadios17">Spreadshirt</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="zazzle" id="exampleRadios18" value="Zazzle">
                                                <label class="form-check-label" for="exampleRadios18">Zazzle</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="teepublic" id="exampleRadios19" value="Teepublic">
                                                <label class="form-check-label" for="exampleRadios19">Teepublic</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="others" id="exampleRadios11" value="Others">
                                                <label class="form-check-label" for="exampleRadios11">Others</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="col-12 my-2">
                                    <h4>To work online, I use .. ?</h4>
                                    <div class="row my-3">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="work_online_lap" id="exampleRadios1" value="Pc/lap top" checked>
                                                <label class="form-check-label" for="exampleRadios1">Pc/lap top</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="work_online_mobile" id="exampleRadios2" value="Mobile" checked>
                                                <label class="form-check-label" for="exampleRadios2">Mobile</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12 my-2">
                                    <div class="row col-12">
                                        <h4>I usually get traffic ?</h4>
                                    </div>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-4">
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" name="make_designs_from_social" id="exampleRadios221" value="Free from social">
                                                <label class="form-check-label" for="exampleRadios221">Free from social (Facebook, Instagram, Pinterest, ...)</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="make_designs_from_paid_ad" id="exampleRadios222" value="Paid ads">
                                                <label class="form-check-label" for="exampleRadios222"> Paid ads</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="make_designs_from_organically" id="exampleRadios223" value="Organically (site traffic)">
                                                <label class="form-check-label" for="exampleRadios223">Organically (site traffic)
                                                    <span class="text-danger" id="make_designs_use-error"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group col-12 my-3 ans">
                                    <h4 class="form-check-label">Please add your stores’ links</h4>
                                    <input type="text" class="form-control" name="stores_links" placeholder="Enter user link">
                                </div>
                                <div class="textarea-style mb-30 my-3">
                                <h4 for="">  Tell us more about yourself </h2>
                                <textarea name="about_yourself" placeholder="What’s your experience in (online business, POD, design, marketing). What are your traffic sources? Why would you like to work on EgyMerch?" class="is-invalid"></textarea>
                                 <span class="text-danger" id="about_yourself-error"></span>
                            </div>
                          </div>{{-- end of  row --}}

                          <button type="submit" class="btn btn-primary col-12">Submit</button>

                        </form>

                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('sellersRegister')

<script type="text/javascript">
    $(document).ready(function() {

        $("#printing_field_no").on("click",function() {
            $(".ans").addClass('answer');
        });

        $("#printing_field_yes").on("click",function() {
            $(".ans").removeClass('answer');
        });

        $('#sellersRegister').on('submit', function(e) {
            e.preventDefault();

            $('#seller-image-country').val($('.niceCountryInputMenuCountryFlag').attr('src'));
            $('#seller-country').val($('.country-setting').text());

            var url    = $(this).attr('action');
            var method = $(this).attr('method');
            var data   = $(this).serialize();
            var items  = $(this).serializeArray();
            var redircte  = "{{ route('store.index') }}";

            $("textarea[name='about_yourself']").removeClass('error');

            $.each(items, function(index,item) {

                if (index == 1) {

                    $('#make_designs_use-error').text('');
                }

                $("input[name="+item.name+"]").removeClass('is-invalid');
                $('#' + item.name + '-error').text('');

            });//end of each

            $.ajax({
                url: url,
                method: method,
                data: data,
                success: function(data) {

                    location.reload();
                    window.location.href = redircte;

                }, error: function(data) {

                    $.each(data.responseJSON.errors, function(name,message) {

                        if (name == 'about_yourself') {
                            $("textarea[name="+name+"]").addClass('error');
                        }

                        $("input[name="+name+"]").addClass('is-invalid');
                        $('#' + name + '-error').text(message);

                    });//end of each
                },
            });//end of ajax

        });

    });//end of document ready function
</script>

@endpush
