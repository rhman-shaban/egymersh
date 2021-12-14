@extends('dashboard.layouts.master')

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title"> Edit Product Details </h2>
                <div>
                    <a  href="{{ route('products.index') }}" class="btn btn-md rounded font-sm hover-up">   Show All Products </a>
                </div>
            </div>
        </div>

        @include('dashboard.layouts.messages')
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Product Information</h4>
                </div>
                <form method="POST" action="{{ route('products.update'  , ['product' => $product->id ] ) }}" enctype="multipart/form-data" >
                    <div class="card-body">
                        @csrf
                        @method('PATCH')

                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label"> Activation </label>
                                    <select name="active" class="form-select">
                                        <option value="1" {{ $product->active == 1 ? 'selected="selected"' : '' }} > Enabled </option>
                                        <option value="0" {{ $product->active == 0 ? 'selected="selected"' : '' }} > Disabled </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">  Category  </label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected="selected"' : '' }} > {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label"> Arabic Name </label>
                                    <input type="text"  class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ $product->name_ar }}" >
                                    @error('name_ar')
                                    <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label"> English  Name </label>
                                    <input type="text"  class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{ $product->name_en }}" >
                                    @error('name_en')
                                    <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">  Price </label>
                                    <input type="number"  class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" >
                                    @error('price')
                                    <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="product_name" class="form-label"> Arabic Description </label>
                                    <textarea   class="form-control @error('description_ar') is-invalid @enderror" name="description_ar"> {{  $product->description_ar }} </textarea>
                                    @error('description_ar')
                                    <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="product_name" class="form-label"> English  Description </label>
                                    <textarea   class="form-control @error('description_en') is-invalid @enderror" name="description_en"> {{  $product->description_en }} </textarea>
                                    @error('description_en')
                                    <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                        </div>                      
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-md rounded font-sm hover-up" style="float:right">   Edit  <i class="fas fa-edit"></i>  </button>
                        <a href='{{ route('products.index') }}' class="btn btn-md rounded font-sm hover-up"><i class="fas fa-arrow-left"></i>  back  </a>
                    </div>
                </form>
            </div> <!-- card end// -->

        </div>



        @foreach ($product_color as $color)
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Product Colors  <span class="badge" style="background-color:{{ $color->color }}" > {{ $color->color }} </span> </h4>
                    <a href='{{ route('product_colors.create'  , ['product_id' => $product->id  ] ) }}' class='add_more_sizes' class='btn btn-primary btn-sm' > 
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <line x1="9" y1="12" x2="15" y2="12"></line>
                            <line x1="12" y1="9" x2="12" y2="15"></line>
                        </svg>
                    </a>
                </div>
                
                <div class="card-body">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-11">
                            <form method="POST" class='row' action="{{ route('product_colors.update'  , ['product_color' => $color->id ] ) }}" enctype="multipart/form-data">

                                @csrf
                                @method('PATCH')
                                <div class="col-md-3">
                                    <div class="mb-4">
                                        <label  class="form-label">  </label>
                                        <input type="file"  class="form-control" name="front_image" accept="image/png, image/gif, image/jpeg, image/jpg" >
                                        @error('front_image')
                                        <p class="text-danger"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <img height="100" width="100" class="img-thumbnail img-responsive" src="{{ asset('storage/products'.$color->front_image) }}" alt="">
                                </div>
                                {{-- <div class="col-md-3">
                                    <div class="mb-4">
                                        <label  class="form-label">  </label>
                                        <input type="file"  class="form-control" name="back_image" accept="image/*" accept="image/png, image/gif, image/jpeg, image/jpg" >
                                        @error('back_image')
                                        <p class="text-danger"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <img height="100" width="100" class="img-thumbnail img-responsive" src="{{ Storage::url('products/'.$color->back_image) }}" alt="">
                                </div> --}}
                                <div class="col-md-3">
                                    <div class="mb-4">
                                        <label  class="form-label">  </label>
                                        <input type="color"  class="form-control" name="color" value="{{ $color->color }}" >
                                        @error('color')
                                        <p class="text-danger"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mt-4">
                                        <button type="submit" class='btn btn-warning mb-4 btn-sm' > Edit </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-md-1">
                            <form method="POST" class='row' action="{{ route('product_colors.destroy' , ['product_color' => $color->id ] ) }}">
                                @csrf
                                @method('DELETE')
                                <div class="mt-4">
                                    <button type="submit" class='btn btn-danger mb-4 btn-sm' > delete </button>
                                </div>
                            </form>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Size </th>
                                        <th> quantity </th>
                                        <th> 
                                            <a href='{{ route('product_sizes.create'  , ['product_color' => $color->id , 'product_id' => $product->id  ] ) }}' class='add_more_sizes' class='btn btn-primary btn-sm' > 
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="12" cy="12" r="9"></circle>
                                                    <line x1="9" y1="12" x2="15" y2="12"></line>
                                                    <line x1="12" y1="9" x2="12" y2="15"></line>
                                                </svg>
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody data-color_id='{{ $color->id }}' >
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @php
                                    $i = 1;
                                    @endphp

                                    @foreach ($color->sizes as $size)
                                    <tr>
                                        <td> {{ $i++ }} </td>
                                        <td> {{  optional($size->size)->name }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('product_sizes.update'  , ['product_size' => $size->id ] ) }}">
                                                @csrf
                                                @method('PATCH')
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input type="number" class="form-control" name='quantity' value="{{ $size->quantity }}" > 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button class="btn btn-sm btn-warning" > Edit </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        <td> 
                                            <form method="POST" action="{{ route('product_sizes.destroy'  , ['product_size' => $size->id ] ) }}">
                                                <button class="btn btn-sm btn-danger" > delete </button>

                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>                   
                </div>
            </div> 
        </div>
        @endforeach

    </div>
</section> <!-- content-main end// -->
@endsection


@section('scripts')
@endsection