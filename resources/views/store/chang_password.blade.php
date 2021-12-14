@extends('store.layouts.master')

@section('page_title')
@lang('title.Password Change')
@endsection

@section('page_content')
 <section class="content-main">
    <div class="content-header">
        <h2 class="content-title">@lang('seller.Change Password')</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row gx-5">
                <!-- <aside class="col-lg-3 border-end">
                    <nav class="nav nav-pills flex-lg-column mb-4">
                        <a class="nav-link active" aria-current="page" href="{{ url('myStore/settings') }}">@lang('seller.General')</a>
                        <a class="nav-link " aria-current="page" href="{{ url('myStore/settings/verify') }}">@lang('seller.Verification')</a>
                  </nav>
                </aside> -->
                <div class="col-lg-12">
                    <section class="content-body p-xl-4">
                        <form id="save-seeting-password" method="post" action="{{ route('profile.password') }}">

                            @csrf
                            @method('post')

                            <div class="row flex-row-reverse justify-content-center align-items-center">
                              <div class="col-lg-6 d-flex justify-content-center">
                                <img src="{{ asset('store_assets\assets\imgs\seller-dashboard/change-password.png')}}" alt="settings" class="img-responsive w-75">
                              </div>
                                    <div class="col-lg-6">

                                        <div class="col-12 mb-3">
                                            <label class="form-label">@lang('seller.Old Password')</label>
                                            <input class="form-control" type="passwrod" id="current_password" name="current_password" placeholder="@lang('seller.Type here')" value="">
                                            <span class="text-danger" id="current_password-error"></span>
                                        </div> <!-- col .// -->

                                        <div class="col-12 mb-3">
                                            <label class="form-label">@lang('seller.New Password')</label>
                                            <input class="form-control" type="passwrod" id="new_password" name="new_password" placeholder="@lang('seller.Type here')" value="">
                                            <span class="text-danger" id="new_password-error"></span>
                                        </div> <!-- col .// -->

                                        <div class="col-12 mb-3">
                                            <label class="form-label">@lang('seller.Confirm New Password')</label>
                                            <input class="form-control" type="passwrod" id="new_confirm_password" name="new_confirm_password" placeholder="@lang('seller.Type here')" value="">
                                            <span class="text-danger" id="new_confirm_password-error"></span>
                                        </div> <!-- col .// -->


                                    </div> <!-- row.// -->
                            </div> <!-- row.// -->
                            <br>
                            <div class="text-center">
                            <button class="btn btn-primary" type="submit">@lang('seller.Save')</button>
                          </div>
                        </form>
                    </section> <!-- content-body .// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card body end// -->
    </div> <!-- card end// -->
</section> <!-- content-main end// -->

@endsection

@section('scripts')
<script type="text/javascript">

    $(document).ready(function() {

        $('#save-seeting-password').on('submit', function (e) {
            e.preventDefault();

            var url      = $(this).attr('action');
            var method   = $(this).attr('method');
            var date     = $(this).serialize();
            var items    = $(this).serializeArray();

            $.each(items, function(index,item) {

                $('#' + item.name).removeClass('is-invalid');
                $('#' + item.name + '-error').text('');

            });//end of each

            $.ajax({
                url: url,
                method: method,
                data: date,
                success: function(data) {

                   if (data.success == true) {

                        new Noty({
                            layout: 'topRight',
                            text: "@lang('dashboard.updated_successfully')",
                            killer: true,
                            timeout: 2000,
                        }).show();

                        $.each(items, function(index,item) {

                            $('#' + item.name).val('');

                        });//end of each

                   }//end of data success

                }, error: function(data) {

                    $.each(data.responseJSON.errors, function(name,message) {

                        $('#' + name).addClass('is-invalid');
                        $('#' + name + '-error').text(message);

                    });//end of each

                },//end of success

            });//end of ajax

        });//end of change image

    });//end of document redy

</script>
@endsection
