@extends('store.layouts.master')

@section('page_title')
@lang('title.Store Verification')
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
                        <a class="nav-link active" aria-current="page" href="{{ url('myStore/settings/verify') }}"> Ask For Verification </a>
                    </nav>
                </aside>
                <div class="col-lg-9">
                    <section class="content-body p-xl-4">
                        <form>

                            <div class="row border-bottom mb-4 pb-4">
                                <div class="col-md-5">
                                    <h5>Select Store </h5>
                                </div> <!-- col.// -->
                                <div class="col-md-7">
                                    <label class="mb-2 form-check">
                                        <input class="form-check-input" checked="" name="mycheck_a1" type="radio">
                                        <span class="form-check-label"> Store 1 </span>
                                    </label>
                                    <label class="mb-2 form-check">
                                        <input class="form-check-input" name="mycheck_a1" type="radio">
                                        <span class="form-check-label"> Store 2 </span>
                                    </label>
                                    <label class="mb-2 form-check">
                                        <input class="form-check-input" name="mycheck_a1" type="radio">
                                        <span class="form-check-label"> Store 3 </span>
                                    </label>
                                </div> <!-- col.// -->
                            </div> <!-- row.// -->

                            <div class="row border-bottom mb-4 pb-4">
                                <div class="col-md-5">
                                    <h5> Social Media type  </h5>
                                </div> <!-- col.// -->
                                <div class="col-md-7">
                                    <label class="mb-2 form-check">
                                        <input class="form-check-input" checked="" name="mycheck_a1" type="radio">
                                        <span class="form-check-label"> Facebook </span>
                                    </label>
                                    <label class="mb-2 form-check">
                                        <input class="form-check-input" name="mycheck_a1" type="radio">
                                        <span class="form-check-label"> Instgram </span>
                                    </label>
                                    <label class="mb-2 form-check">
                                        <input class="form-check-input" name="mycheck_a1" type="radio">
                                        <span class="form-check-label"> Snapshat </span>
                                    </label>
                                </div> <!-- col.// -->
                            </div> <!-- row.// -->

                            <div class="row border-bottom mb-4 pb-4">
                                <div class="col-md-5">
                                    <h5>Social link</h5>
                                </div> <!-- col.// -->
                                <div class="col-md-7">
                                    <div class="mb-3">
                                        <label class="form-label"> Link </label>
                                        <input class="form-control" type="text" name="" placeholder="Type here">
                                    </div>

                                </div> <!-- col.// -->
                            </div> <!-- row.// -->


                            <div class="row border-bottom mb-4 pb-4">
                                <div class="col-md-5">
                                    <h5>Talk about your traffic</h5>
                                </div> <!-- col.// -->
                                <div class="col-md-7">
                                    <div class="mb-3">
                                        <label class="form-label"> content </label>
                                        <textarea class="form-control"  ></textarea>
                                    </div>

                                </div> <!-- col.// -->
                            </div> <!-- row.// -->








                            <button class="btn btn-primary" type="submit">Send </button> &nbsp;
                            <button class="btn btn-light rounded font-md" type="reset">Reset</button>
                        </form>
                    </section> <!-- content-body .// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card body end// -->
    </div> <!-- card end// -->
</section> <!-- content-main end// -->
@endsection
