@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">offers</h2>
        </div>
        <div>
            <a href="{{ route('offers.create') }}" class="btn btn-primary btn-sm rounded">Add new offers</a>
        </div>
    </div>

    @include('dashboard.layouts.messages')

<div wire:id="tG6jH8fMaJatb2ndvohv">
    <div class="card mb-4">
        <header class="card-header">
            <div class="row align-items-center">

            <div class="box-header with-border">

                <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.offers') <small>{{ $offers->count() }}</small></h3>

                <form action="{{ route('offers.index') }}" method="get">

                    <div class="row">

                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                        </div>

                        <div class="col-md-2 row">
                            <button type="submit" class="btn btn-primary btn-sm rounded">
                                <i class="fa fa-search"></i> 
                            </button>
                        </div>

                    </div>
                </form><!-- end of form -->

            </div><!-- end of box header -->
                
            </div>
        </header>
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="align-middle" scope="col">ID</th>
                                <th class="align-middle" scope="col">Name</th>
                                <th class="align-middle" scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $index=>$offer)
                                <tr>
                                    <td>{{ $index++ }}</td>
                                    <td>{!! $offer->name !!}</td>
                                    <td>
                                        <div class="col-lg-2 col-sm-2 col-4 col-action text-end d-inline">
                                            <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-sm font-sm rounded btn-brand">
                                                <i class="material-icons md-edit"></i>
                                            </a>
                                            <form action="{{ route('offers.destroy', $offer->id) }}" method="post" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}

                                                <button class="btn btn-sm font-sm btn-light rounded delete">
                                                    	<i class="material-icons md-delete_forever"></i>
                                                </button>
                                            </form><!-- end of form -->
                                        </div>
                                    </td>
                                </tr> 
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div> <!-- table-responsive end// -->
        </div>
    </div>
    <div class="pagination-area mt-30 mb-50">

          <div>
    </div>


        <nav aria-label="Page navigation example">
    	{{-- {{ $coupons->appends(request()->query())->links() }} --}}
            <ul class="pagination justify-content-start">
                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                <li class="page-item"><a class="page-link" href="#">02</a></li>
                <li class="page-item"><a class="page-link" href="#">03</a></li>
                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">16</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li>
            </ul>
        </nav>
    </div>
</div>

</section>
    

</section> <!-- content-main end// -->
@endsection


@section('scripts')


@endsection