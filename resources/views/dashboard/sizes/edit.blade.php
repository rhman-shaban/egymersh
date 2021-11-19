@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title"> Edit Size Details </h2>
                <div>
                    <a  href="{{ route('sizes.index') }}" class="btn btn-md rounded font-sm hover-up">   Show All Size </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Basic</h4>
                </div>
                <form method="POST" action="{{ route('sizes.update' , ['size' => $size->id ]) }}" enctype="multipart/form-data" >
                    <div class="card-body">
                        @csrf
                        @method('PATCH')
    

                        <div class="mb-4">
                            <label for="product_name" class="form-label">  Name </label>
                            <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $size->name }}" >
                            @error('name')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                      

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-md rounded font-sm hover-up" style="float:right">  Edit   <i class="fas fa-edit"></i> </button>
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