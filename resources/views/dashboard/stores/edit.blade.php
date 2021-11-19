@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title"> Add New Admin </h2>
                <div>
                    <a  href="{{ route('admins.index') }}" class="btn btn-md rounded font-sm hover-up">   Show All Admins</a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Basic</h4>
                </div>
                <form method="POST" action="{{ route('admins.update' , ['admin' => $admin->id ] ) }}" enctype="multipart/form-data" >
                    <div class="card-body">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="product_name" class="form-label">  Name </label>
                            <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $admin->name }}" >
                            @error('name')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">  Username </label>
                            <input type="text"  class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $admin->username }}" >
                            @error('username')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">  Password </label>
                            <input type="password"  class="form-control @error('password') is-invalid @enderror" name="password" >
                            @error('password')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">  Password Confirmation </label>
                            <input type="password"  class="form-control" name="password_confirmation" >
                        </div>

                        <div class="mb-4">
                            <label for="product_name" class="form-label"> Profile Image  </label>
                            <input type="file"  class="form-control @error('image') is-invalid @enderror" name="image" >
                            @error('image')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                       

                        <div class="col-sm-12 mb-3">
                            <label class="form-label"> Activation </label>
                            <select name="active" class="form-select">
                                <option value="1" {{ $admin->active == 1 ? 'selected="selected"' : '' }} > Enabled </option>
                                <option value="0" {{ $admin->active == 0 ? 'selected="selected"' : '' }} > Disabled </option>
                            </select>
                        </div>

                         <div class="mb-4">
                            <label for="product_name" class="form-label"> Current Profile Image  </label>
                           <img src="{{ Storage::disk('public')->url('admins/'.$admin->image) }}" alt="">
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-md rounded font-sm hover-up" style="float:right">  Edit  <i class="fas fa-edit"></i> </button>
                        <a  class="btn btn-md rounded font-sm hover-up"><i class="fas fa-arrow-left"></i>  back  </a>

                    </div>
                </form>
            </div> <!-- card end// -->

        </div>
    </div>
</section> <!-- content-main end// -->
@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#sortable" ).sortable();
} );
</script>

@endsection