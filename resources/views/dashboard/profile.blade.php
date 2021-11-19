@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title"> Profile Editing </h2>
    </div>
    <div class="card">

        @include('dashboard.layouts.messages')
        <div class="card-body">
            <div class="row gx-5">
                <aside class="col-lg-3 border-end">
                    <nav class="nav nav-pills flex-lg-column mb-4">
                        <a class="nav-link active" aria-current="page">General</a>
                    </nav>
                </aside>
                <div class="col-lg-9">
                    <section class="content-body p-xl-4">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" >
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row gx-3">
                                        <div class="col-12  mb-3">
                                            <label class="form-label">Name</label>
                                            <input class="form-control @error('name') is-invalid  @enderror" type="text" name="name" value="{{ $admin->name }}"  >
                                            @error('name')
                                            <p class="text-danger"> {{ $message }} </p>
                                            @enderror



                                        </div> 
                                        <div class="col-12  mb-3">
                                            <label class="form-label">Username</label>
                                            <input class="form-control @error('username') is-invalid  @enderror" type="text" name="username" value="{{ $admin->username }}"  >
                                            @error('username')
                                            <p class="text-danger"> {{ $message }} </p>
                                            @enderror
                                        </div> 
                                        <div class="col-12  mb-3">
                                            <label class="form-label">Profile Picture</label>
                                            <input class="form-control @error('image') is-invalid  @enderror" type="file" name="image" >
                                        </div>
                                        @error('image')
                                            <p class="text-danger"> {{ $message }} </p>
                                        @enderror

                                    </div> <!-- row.// -->
                                </div> <!-- col.// -->
                                <aside class="col-lg-4">
                                    <figure class="text-lg-center">
                                        <img class="img-lg mb-3 img-avatar" src="{{ Storage::disk('s3')->url('admins/'.$admin->image) }}" alt="User Photo">
                                    </figure>
                                </aside> <!-- col.// -->
                            </div> <!-- row.// -->
                            <br>
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                        <hr class="my-5">
                    </section> <!-- content-body .// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card body end// -->
    </div> <!-- card end// -->
</section> <!-- content-main end// -->
@endsection