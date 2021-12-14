@extends('store.layouts.master')

@section('page_title')
@lang('title.Payment Settings')
@endsection

@section('page_content')
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Profile setting </h2>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row gx-5">
                <aside class="col-lg-3 border-end">
                    <nav class="nav nav-pills flex-lg-column mb-4">
                        <a class="nav-link" aria-current="page" href="{{ url('myStore/settings') }}">General</a>
                        <a class="nav-link active" aria-current="page" href="{{ url('myStore/settings/payment') }}">payment</a>
                                <a class="nav-link " aria-current="page" href="{{ url('myStore/settings/verify') }}"> Ask For Verification </a>
                            </nav>
                        </aside>
                        <div class="col-lg-9">
                            <section class="content-body p-xl-4">
                                <form>

                                    <div class="row border-bottom mb-4 pb-4">
                                        <div class="col-md-5">
                                            <h5>Payment preferance</h5>
                                            <p class="text-muted" style="max-width:90%">Give access of all pages including each product lorem ipsum dolor sit amet,
                                            consectetur adipisicing</p>
                                        </div> <!-- col.// -->
                                        <div class="col-md-7">
                                            <label class="mb-2 form-check">
                                                <input class="form-check-input" checked="" name="mycheck_a1" type="radio">
                                                <span class="form-check-label"> Bank Account </span>
                                            </label>
                                            <label class="mb-2 form-check">
                                                <input class="form-check-input" name="mycheck_a1" type="radio">
                                                <span class="form-check-label"> Paypal </span>
                                            </label>
                                            <label class="mb-2 form-check">
                                                <input class="form-check-input" name="mycheck_a1" type="radio">
                                                <span class="form-check-label"> Vodafone Cache </span>
                                            </label>
                                        </div> <!-- col.// -->
                                    </div> <!-- row.// -->

                                    <div class="row border-bottom mb-4 pb-4">
                                        <div class="col-md-5">
                                            <h5>bank account details name</h5>
                                        </div> <!-- col.// -->
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label class="form-label">Full name</label>
                                                <input class="form-control" type="text" name="" placeholder="Type here">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">bank account number</label>
                                                <input class="form-control" type="text" name="" placeholder="Type here">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">swift code </label>
                                                <input class="form-control" type="text" name="" placeholder="Type here">
                                            </div>
                                             <div class="mb-3">
                                                <label class="form-label">bank </label>
                                                <select name="" id="input" class="form-control" required="required">
                                                    <option value="">Qnb alahli</option>
                                                    <option value="">Bank msr</option>
                                                    <option value="">  alhi bank  </option>

                                                </select>
                                            </div>
                                        </div> <!-- col.// -->
                                    </div> <!-- row.// -->
                                    <div class="row border-bottom mb-4 pb-4">
                                        <div class="col-md-5">
                                            <h5>Paypal details</h5>
                                        </div> <!-- col.// -->
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label class="form-label">Email </label>
                                                <input class="form-control" type="text" name="" placeholder="Type here">
                                            </div>

                                        </div> <!-- col.// -->
                                    </div> <!-- row.// -->
                                    <div class="row border-bottom mb-4 pb-4">
                                        <div class="col-md-5">
                                            <h5>Vodafone Cache Details</h5>
                                        </div> <!-- col.// -->
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label class="form-label"> Phone Number  </label>
                                                <input class="form-control" type="text" name="" placeholder="Type here">
                                            </div>

                                        </div> <!-- col.// -->
                                    </div> <!-- row.// -->





                                    <button class="btn btn-primary" type="submit">Save all changes</button> &nbsp;
                                    <button class="btn btn-light rounded font-md" type="reset">Reset</button>
                                </form>
                            </section> <!-- content-body .// -->
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- card body end// -->
            </div> <!-- card end// -->
        </section> <!-- content-main end// -->
        @endsection
