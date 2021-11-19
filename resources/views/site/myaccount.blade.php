@extends('site.layouts.master')

@section('page_content')
<section class="pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-md-4">
                        <div class="dashboard-menu">
                            <ul class="nav flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10" id="edit-prfile-button"></i>Account details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.account.logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        @include('dashboard.layouts.messages')

                    <div class="tab-content dashboard-content">
                        <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Hello {{ $user->name }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="z-depth-5 main">
                                        <div class="row">
                                            <div class="col-sm-6 picture">
                                                <center><img class="circle-img" src="{{ $user->image_path }}"><span><a class="btn-floating pulse waves-effect waves-light add"></a></span></center>
                                            </div>
                                            <div class="col-sm-6 details my-5">
                                                <center>
                                                    <p class="name"> 
                                                        <i class="fa fa-user"> {{ $user->name }}</i>
                                                    </p>
                                                </center>
                                                <center>
                                                    <p><i class="fa fa-phone"></i> {{ $user->phone }}</p>
                                                </center>
                                                <center>
                                                    <p><i class="fa fa-envelope"></i> {{ $user->email }}</p>
                                                </center>
                                            </div>
                                        </div>
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <p><b>1,236</b></p>
                                                    <p>Order</p>
                                                </td>
                                                <td>
                                                    <p><b>767K</b></p>
                                                    <p>product</p>
                                                </td>
                                                <td>
                                                    <p><b>892</b></p>
                                                    <p>Following</p>
                                                </td>
                                            </tr>
                                        </table>
                                        <center><a class="waves-effect waves-light btn edit col-12" onclick="document.getElementById('edit-prfile-button').click();">Edit Profile</a></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Your Orders</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>notes</th>
                                                    <th>Status</th>
                                                    <th>created</th>
                                                    {{-- <th>Actions</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (App\Models\Order::where('user_id',auth()->guard('seller')->user()->id)->get() as $index=>$element)
                                                    <tr>
                                                        <td>{{ $index }}</td>
                                                        <td>{{ $element->notes }}</td>
                                                        <td>{{ $element->order_status }}</td>
                                                        <td>{{ $element->created_at }}</td>
                                                        {{-- <td><a href="#" class="btn-small d-block">View</a></td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                            <div class="row">
                                {{-- <div class="col-lg-6">
                                    <div class="card mb-3 mb-lg-0">
                                        <div class="card-header">
                                            <h5 class="mb-0">Billing Address</h5>
                                        </div>
                                        <div class="card-body">
                                            <address>3522 Interstate<br> 75 Business Spur,<br> Sault Ste. <br>Marie, MI 49783</address>
                                            <p>New York</p>
                                            <a href="#" class="btn-small">Edit</a>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Shipping Address</h5>
                                        </div>
                                        <div class="card-body">
                                            <address>4299 Express Lane<br>
                                                Sarasota, <br>FL 34249 USA <br>Phone: 1.941.227.4444</address>
                                                <p>Sarasota</p>
                                                <a href="#" class="btn-small">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Account Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="profil-submit" method="post" action="{{ route('user.account.update') }}" enctype="multipart/form-data">
                                            <div class="row">
                                                @csrf
                                                <div class="wrap my-auto">
                                                    <img src="{{ $user->image_path }}" class="main-profile-img" />
                                                    <button class="button-profile" onclick="event.preventDefault();document.getElementById('edit-prfile-image').click();"><i class="fa fa-edit"></i>
                                                    </button>
                                                    <input type="file" name="image" hidden="" id="edit-prfile-image">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Name<span class="required">*</span></label>
                                                    <input class="form-control square" id="name-prfile" name="name" value="{{ $user->name }}" >
                                                    <span class="text-danger" id="name-prfile-error"></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>phone number<span class="required">*</span></label>
                                                    <input class="form-control square" id="phone-prfile" name="phone" value="{{ $user->phone }}" type="text">
                                                    <span class="text-danger" id="phone-prfile-error"></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Email Address <span class="required">*</span></label>
                                                    <input class="form-control square" id="email-prfile" name="email" value="{{ $user->email }}" type="email">
                                                    <span class="text-danger" id="email-prfile-error"></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Address<span class="required">*</span></label>
                                                    <input class="form-control square" value="{{ $user->address }}" id="address-prfile" name="address" type="text">
                                                    <span class="text-danger" id="address-prfile-error"></span>
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
    </div>
</section>
@endsection

@push('profile')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#profil-submit').on('submit', function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                var url      = $(this).attr('action');
                var method   = $(this).attr('method');
                var data     = $(this).serialize();
                var items    = $(this).serializeArray();

                    
                $.each(items, function(index,item) {
                    
                    $('#' + item.name + '-prfile').removeClass('is-invalid');
                    $('#' + item.name + '-prfile-error').text('');

                });//end of each

                $.ajax({
                    url: url,
                    method: method,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                       
                       if (data.success == true) {

                         swal('update success', {
                            type: "success",
                            icon: "success",
                            buttons: false,
                            timer: 3000,
                        });

                       } 

                    }, error: function(data) {

                        $.each(data.responseJSON.errors, function(name,message) {

                            $('#' + name + '-prfile').addClass('is-invalid');
                            $('#' + name + '-prfile-error').text(message);
                            
                        });//end of each

                    },//end of success

                });//end of ajax
                
            });

            $('#edit-prfile-image').on('change', function (e) {
                e.preventDefault();

            if(this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {

                    $('.main-profile-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
            
        });//end of change image

        });//end of  document
    </script>
@endpush
