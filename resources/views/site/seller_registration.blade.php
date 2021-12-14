@extends('site.layouts.master')

@section('page_title')
@lang('title.Seller Registeration')
@endsection

@section('page_content')
<main class="main">

  <section class="bg-green">
          <div class="container">
              <div class="row">
                  <!-- image -->
                  <div class="col-md-6 d-flex align-items-center mb-20">
                    <img class="img-responsive" src="{{ asset('site_assets/assets/imgs/register/register-seller.png') }}" alt="Register Seller Egymerch">
                  </div>
                  <!-- main text -->
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="text-center pt-50 pb-50">
                            <h4 class="text-brand mb-20">@lang('seller-register.Sell on EgyMerch')</h4>
                            <h1 class="mb-20 wow fadeIn animated font-xxl fw-900">
                              @lang('seller-register.We Value Your Passion')
                            </h1>
                            <p class="w-50 m-auto mb-10 wow fadeIn animated">@lang('seller-register.line-1')</p>
                            <p class="w-50 m-auto mb-10 wow fadeIn animated">@lang('seller-register.line-2')</p>
                            <p class="w-50 m-auto mb-50 wow fadeIn animated">@lang('seller-register.line-3')</p>
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
                        <h3 class="mb-10 text-center">@lang('seller-register.Seller Registeration')</h3>
                        <p class="text-muted mb-30 text-center font-sm">@lang('seller-register.form msg')</p>

                        <form id="sellersRegister" action="{{ route('sellers.store') }}" method="post">
                            @csrf
                            <div class="row">
                              <div class="form-group col-12 col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="@lang('seller-register.Username')">
                                <span class="text-danger" id="name-error"></span>
                              </div>
                                <div class="form-group col-12 col-md-6">
                                    <input type="email" class="form-control" name="email" placeholder="@lang('seller-register.Email')">
                                     <span class="text-danger" id="email-error"></span>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <input type="password" class="form-control" name="password" placeholder="@lang('seller-register.Password')">
                                     <span class="text-danger" id="password-error"></span>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="@lang('seller-register.Confirm password')">
                                     <span class="text-danger" id="password_confirmation-error"></span>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                  <div class="niceCountryInputSelector bg-dark bg-transparent" data-selectedcountry="EG" data-showspecial="false" data-showflags="true" data-i18nall="All selected"
                                  data-i18nnofilter="No selection" data-i18nfilter="Filter" data-onchangecallback="onChangeCallback" />
                                </div>

                                </div> <!-- col .// -->
                                <div class="form-group col-12 col-md-6">
                                  <input type="phone" class="form-control" name="phone" placeholder="@lang('seller-register.Phone')">
                                  <span class="text-danger" id="phone-error"></span>
                                </div>

                                <!-- <input type="text" name="country" value="aaaa" id="seller-country" hidden>
                                <input type="text" name="image_country" id="seller-image-country" hidden value="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABsAAAAUCAYAAAB8gkaAAAAB7ElEQVR4XmMwMIn+7Rhc+V9SP/a/kVv+f237LDDbJawaTIP4IHEQG6RO1ijhv4pl6n8zz8L/DRZ+//fauhCNGXSsU7/6JzT/V7dJBxsAwiALIjO7wDRMDCQPUwcSB1ncUz/l+ot9B/YTixmM3fJ/g1yakN8PdjHIsNC0DhQaWT44uQ1sGYi9ctPh/6QABj2zhB9FDXP+K5gl/feJbfzvEVkHZpc1zwPTID5IHMQGqQNZYhtQBnZIo2fc2+ORsY+JxQzaFklfQQZlV06H+yyleBI4jkA0zGcgeZA6UPCC4hAUd+25TTfvzpl3mFgMDsb8mplgzSBfgFwNsii9bAqYBvFB4iB5mDpQHIKCk+Rg1DaO/QEzCORykE9AbJBFIBrEB4nDLAL51tKnBCxPejCaxX8DxQ9IMyi1wXwGEwPxQeLIYiDLQHHWGl3w8HJl3XliMTgYQQZUtS0Exw0opSH7DJbyQPKweITlO5KDUd8y8RssfkA+cAmtBgcXyBcgGsSH+QykDiQGsowsn3k7pz13d8367Gif+tnFKQOMQWxf7/wv6GLo6qYnltxBNxAfZgD67j66d2kFGC6U1+5CdwGtMMPxiNhT6EmUVpi+wXhn+pyN6MUKrfAwDsZnO/esQ6/kaIUZ9to630evvmmFAUOxrmQB62SbAAAAAElFTkSuQmCC"> -->

                                <hr>
                                <div class="col-12 my-2">
                                    <fieldset class="question">
                                        <h4>@lang('seller-register.question-1')</h4>
                                        <div class="row my-3">
                                            <div class="col-6">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="printing_field" id="printing_field_yes" value="1" >
                                                  <label class="form-check-label" for="printing_field_yes">
                                                    @lang('seller-register.Yes, I have.')
                                                  </label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="printing_field" id="printing_field_no" value="0">
                                                  <label class="form-check-label" for="printing_field_no">
                                                    @lang("seller-register.No, it's my first time.")
                                                  </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <hr>
                                <div class="col-12 my-2 answe ans">
                                    <h4>@lang('seller-register.question-2')</h4>
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
                                                <label class="form-check-label" for="exampleRadios11">@lang('seller-register.Others')</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <div class="col-12 my-2">
                                    <h4>@lang('seller-register.question-3')</h4>
                                    <div class="row my-3">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="work_online_lap" id="exampleRadios1" value="Pc/lap top" >
                                                <label class="form-check-label" for="exampleRadios1">@lang('seller-register.My Pc / lap top')</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="work_online_mobile" id="exampleRadios2" value="Mobile" >
                                                <label class="form-check-label" for="exampleRadios2">@lang('seller-register.My Mobile')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12 my-2">
                                    <div class="row col-12">
                                        <h4>@lang('seller-register.question-4')</h4>
                                    </div>
                                    <div class="row d-flex align-items-center mt-3">
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="make_designs_from_social" id="exampleRadios221" value="Free from social">
                                                <label class="form-check-label" for="exampleRadios221">@lang('seller-register.Free from social media')</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="make_designs_from_paid_ad" id="exampleRadios222" value="Paid ads">
                                                <label class="form-check-label" for="exampleRadios222">@lang('seller-register.From paid ads')</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="make_designs_from_organically" id="exampleRadios223" value="Organically (site traffic)">
                                                <label class="form-check-label" for="exampleRadios223">@lang('seller-register.Organically')
                                                    <span class="text-danger" id="make_designs_use-error"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group col-12  ans">
                                  <div class="row my-3 col-12">
                                    <h4 class="form-check-label">@lang('seller-register.question-5')</h4>
                                  </div>
                                    <input type="link" class="form-control" name="stores_links" placeholder="@lang('seller-register.Store link')">
                                  <hr>
                                </div>

                            <div class="textarea-style col-12 mb-30">
                                  <div class="row my-3 col-12">
                                <h4 for="">@lang('seller-register.question-6')</h2>
                                  </div>
                                <textarea name="about_yourself" placeholder="@lang('seller-register.msg placeholder')" class="is-invalid"></textarea>
                                 <span class="text-danger" id="about_yourself-error"></span>
                            </div>
                          </div>{{-- end of  row --}}

                            <div class="d-flex justify-content-end">
                              <button type="submit" class="btn btn-primary">@lang('seller-register.Submit')</button>
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
