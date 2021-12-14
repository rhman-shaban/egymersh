@extends('store.layouts.master')

@section('page_title')
@lang('title.Create New Product')
@endsection

@section('page_content')
<section class="content-main">
    <div class="row">
        <div class="col-9">
            <div class="content-header">
                <h2 class="content-title">@lang('seller.Create New Product')</h2>
                <div id="aaa"></div>
            </div>
        </div>

        <form action="{{ route('sellers.store.product') }}" method="post" id="add-product" class="row" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>@lang('seller.Product Type')</h4>
                    </div>

                    <div class="card-body">

                        <div class="col-sm-12 mb-3">
                            <label class="form-label">@lang('seller.Store')</label>
                            <select id="stores" name="store_id" class="form-select">
                                <option value=""></option>

                                @foreach (App\Models\Store::all() as $store)

                                    <option value="{{ $store->id }}">
                                            {{ $store->name }}
                                    </option>

                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-12 mb-3 d-none cat">
                            <label class="form-label">@lang('seller.Category')</label>
                            <select id="Category" name="category_id" class="form-select">
                                <option value=""></option>
                                @foreach (App\Models\Category::all() as $category)

                                    <option data-url="{{ route('category.product',$category->id) }}"
                                            data-id="{{ $category->id }}"
                                            data-method="get"
                                            value="{{ $category->id }}">
                                            {{ $category->name_ar }}
                                    </option>

                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-12 mb-3 seller-product d-none">
                            <label class="form-label">@lang('seller.Product')</label>
                            <select id="sellerProduct" name="product_id" class="form-select">
                                    <option>@lang('seller.select product')</option>
                            </select>
                        </div>

                        <div class="input-upload d-none">
                            <a href="#" class="btn btn-primary btn-sm col-12" id="add-logo" onclick="document.getElementById('add-file-pro').click();">
                                <i class="fas fa-image">@lang('seller.Upload Design')</i>
                            </a>
                            <input type="file" name="logoo" id="add-file-pro" hidden>

                            <a class="btn btn-primary btn-sm col-12 mt-5 pt-5 d-none" id="clear-logo">
                                <i class="fas fa-image"></i>@lang('seller.Clear Design')
                            </a>
                        </div>

                        <div class="mt-4">
                          <strong>@lang('seller.Choose Colors')</strong>
                        </div>

                        <div class="attr-detail attr-color mb-15 my-3 d-none">
                            <div class="product-color btn-group"></div>
                        </div>

                    </div>
                </div> <!-- card end// -->
            </div>

            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>@lang('seller.Adjust Design')</h4>
                    </div>
                    <div class="card-body">
                    <div class="product-color-image btn-group"></div>

                            {{-- <img src="" id="myImggg"> --}}
                        <div class="containter">
                        <!-- this part is for logos -->
                        <div class="logo-and-img">
                            <div class="dragContainer">
                              <!-- the allowable drag area -->
                              <div class="logoContainer">

                              </div>

                            </div>
                            <!-- this part is for images -->
                            <div class="imageContainer"></div>
                        </div>{{-- containter --}}

                      <div id="canvas-app-input"></div>

                      </div>

                    </div>
                </div> <!-- card end// -->

            </div>

           <div class="input-hiiding"></div>
           <div id="product-image-seller"></div>
           <div id="product-image-coloe"></div>

           <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>@lang('seller.Product Final Info')</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="mb-4 col-6">
                                <label class="form-label">@lang('seller.Title')</label>

                                <input type="text" id="title" name="title" placeholder="@lang('seller.Type here')" class="form-control">
                                <span class="text-danger" id="title-error"></span>
                            </div>
                            <div class="mb-4 col-6">
                                <label class="form-label">@lang('seller.Price')  <span style="color:green">( @lang('seller.Profit'): <span class="new-price"></span>)</span></label>
                                <div class="row gx-2">
                                    <input placeholder="$" required id="productPrice" name="price" id="price" min="0" max="" type="number" class="form-control">
                                    <span class="text-danger" id="price-error"></span>
                                    <input name="selling_price" required id="selling_price" type="number" hidden>
                                </div>
                                </div>
                            </div>
                            <div class="mb-4 col-12">
                                <label class="form-label">@lang('seller.Tags')</label><br>
                                <input name='tag' id="tag" placeholder="@lang('seller.tags msg')" class="form-control" value="">
                                <span class="text-danger" id="tag-error"></span>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">@lang('seller.Description')</label>
                                <textarea placeholder="@lang('seller.product description msg')" id="description" name="description" class="form-control" rows="4"></textarea>
                                <span class="text-danger" id="description-error"></span>
                            </div>

                            <input type="text" name="logo" id="input-logo" hidden>

                            <div class="d-flex form-check mb-5 pb-5">
                                  <input class="form-check-input" required type="checkbox" value="" id="defaultCheck1">
                                  <label class="form-check-label" for="defaultCheck1" style="margin-right:30px;margin-left:15px">
                                    @lang('seller.add product msg')
                                  </label>
                            </div>

                            @if (auth()->guard('seller')->user()->status == 'true')


                                <button class="btn btn-md rounded font-sm hover-up publich-product">@lang('seller.Create')</button>
                                {{-- <button class="btn btn-md col-1 rounded font-sm hover-up publich-product" id="add">add</button> --}}

                            @else

                                <a href="" class="btn btn-primary col-6 btn-sm rounded">@lang('seller.only active seller')</a>

                            @endif

                        </div>

                    </div> <!-- card end// -->

                </div> <!-- card end// -->

            </div>
        </form>
        </div>
</section> <!-- content-main end// -->
<div id="getLocale" class="d-none">{{ app()->getLocale() }}</div>
<div id="canvas-app"></div>
<div id="canvas-app-input-image"></div>
@endsection


@section('scripts')

@endsection
