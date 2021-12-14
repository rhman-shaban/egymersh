@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title"> Add New Product </h2>
                <div>
                    <a  href="{{ route('products.index') }}" class="btn btn-md rounded font-sm hover-up">   Show All Products </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Product Information</h4>
                </div>
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf


                        <div class='row mb-4' >

                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2">
                                <a href="" class='add_new_item'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <line x1="9" y1="12" x2="15" y2="12"></line>
                                        <line x1="12" y1="9" x2="12" y2="15"></line>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>


                        </div>

                        <div class="items">
                            <div class="row item">
                                <div class="mb-4 col-md-4">
                                    <label  class="form-label"> Front Image </label>
                                    <input type="file" id="front_image"  class="form-control @error('image') is-invalid @enderror" name="front_images[]">
                                    @error('image')
                                    <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                                {{-- <img src="" class="front_image" width="200"> --}}
                                {{-- <div class="mb-4 col-md-2">
                                    <label  class="form-label"> Back image  </label>
                                    <input type="file" id="back_image" class="form-control @error('images') is-invalid @enderror" name="back_images[]">
                                </div> --}}
                                {{--       <img src="" class="back_image" width="200"> --}}
                                <div class="col-md-2">
                                    <label  class="form-label"> Color </label>
                                    <input type="color" name="colors[]" class="form-control" >
                                </div>
                                <div class="col-md-5">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>size </th>
                                                <th> quantity</th>
                                                <th>
                                                    <a href="" class="add_more_tr">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                                        </svg>
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class='col-md-8'>
                                                    <select name="sizes[0][]"  class="form-control" >
                                                        @foreach ($sizes as $size)
                                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class='col-md-3'>
                                                 <div class="form-group">
                                                    <input type="text" class='form-control' name='quantity[0][]' >
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm delete_tr"> delete </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class='col-md-1'>
                                <button  class="btn btn-danger btn-block mt-4 btn-sm delete_item" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="4" y1="7" x2="20" y2="7"></line>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>


                </div>

                <hr>





                <div class="mb-4">
                    <label for="product_name" class="form-label">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="product_name" class="form-label">Arabic Name</label>
                    <input type="text"  class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ old('name_ar') }}" >
                    @error('name_ar')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="product_name" class="form-label"> English  Name </label>
                    <input type="text"  class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{ old('name_en') }}" >
                    @error('name_en')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>



                <div class="mb-4">
                    <label for="product_name" class="form-label">  Price </label>
                    <input type="number"  class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" >
                    @error('price')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="col-sm-12 mb-3">
                    <label class="form-label"> Activation </label>
                    <select name="active" class="form-select">
                        <option value="1" > Enabled </option>
                        <option value="0" > Disabled </option>
                    </select>
                </div>


                <div class="mb-4">
                    <label for="product_name" class="form-label"> Arabic Description </label>
                    <textarea   class="form-control @error('description_ar') is-invalid @enderror" name="description_ar"> {{  old('description_ar') }} </textarea>
                    @error('description_ar')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="product_name" class="form-label"> English  Description </label>
                    <textarea   class="form-control @error('description_en') is-invalid @enderror" name="description_en"> {{  old('description_en') }} </textarea>
                    @error('description_en')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>


            </div>
            <div class="card-footer">
                <button class="btn btn-md rounded font-sm hover-up" style="float:right">  Add  <i class="fas fa-plus"></i> </button>
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


    $(document).ready(function() {


        $(document).on('click', 'button.delete_tr', function(event) {
            event.preventDefault();
            $(this).parent().parent().remove();
        });

        $(document).on('click' , 'a.add_more_tr' , function(event) {
            event.preventDefault();
            var tr = $(this).parent().parent().parent().next().find('tr').first().clone();
            $(this).parent().parent().parent().next().find('tr').last().after(tr);
        });


        $('a.add_new_item').on('click', function(event) {
            event.preventDefault();
            var  items_count = $('div.items').find('div.item').length;
            console.log(items_count);
            $.ajax({
                url: '{{ url('/add_new_item') }}',
                type: 'GET',
                dataType: 'html',
                data: {items:items_count},
            })
            .done(function(data) {
                $('div.items').find('div.item').last().after(data);
            });
        });

        $(document).on('click', 'button.delete_item', function(event) {
            event.preventDefault();
            $(this).parent().parent().remove();
        });


    });
</script>

@endsection