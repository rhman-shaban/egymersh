@extends('site.layouts.master')

@section('page_content')
<section class="pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="row">
                    <div class="col-md-3">
                        <div class="dashboard-menu">
                            @include('site.user.sidebar')
                        </div>
                    </div>
                    <div class="col-md-9">
                        @include('dashboard.layouts.messages')

                    <div class="tab-content dashboard-content">
                         <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Account Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="profil-submit" method="post" action="{{ route('user.account.update') }}" enctype="multipart/form-data">
                                            <div class="row">
                                                @csrf
                                                <div class="form-group col-md-12">
                                                    <label>Name <span class="required">*</span></label>
                                                    <input class="form-control square" id="name-prfile" name="name" value="{{ $user->name }}" >
                                                    <span class="text-danger" id="name-prfile-error"></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label> phone number <span class="required">*</span></label>
                                                    <input class="form-control square" id="phone-prfile" name="phone" value="{{ $user->phone }}" type="text">
                                                    <span class="text-danger" id="phone-prfile-error"></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Email Address <span class="required">*</span></label>
                                                    <input class="form-control square" id="email-prfile" name="email" value="{{ $user->email }}" type="email">
                                                    <span class="text-danger" id="email-prfile-error"></span>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

