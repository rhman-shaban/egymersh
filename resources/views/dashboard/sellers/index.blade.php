@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Sellers list</h2>
        <div>
            <a href="#" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <form action="{{ route('sellering.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-8">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>

                        </div>
                    </form><!-- end of form -->
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <select class="form-select">
                        <option>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <select class="form-select">
                        <option>Show 20</option>
                        <option>Show 30</option>
                        <option>Show 40</option>
                    </select>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Seller</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Registered</th>
                            <th>action status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sellers as $seller)
                            <tr>    
                                <td width="40%">
                                    <a href="#" class="itemside">
                                                   {{--  <div class="left">
                                            <img src="assets/imgs/people/avatar1.jpg" class="img-sm img-avatar" alt="Userpic">
                                        </div> --}}
                                        <div class="info pl-3">
                                            <h6 class="mb-0 title">{{ $seller->name }}</h6>
                                            {{-- <small class="text-muted">Seller ID: #439</small> --}}
                                        </div>
                                    </a>
                                </td>
                                <td>{{ $seller->email }}</td>
                                <td><span class="badge rounded-pill alert-{{ $seller->status == 'false' ? 'danger' : 'success' }}">
                                        {{ $seller->status == 'false' ? 'inactive' : 'Active' }}
                                    </span>
                                </td>
                                <td>{{ $seller->created_at }}</td>
                                <td class="text-end">
                                    @if ($seller->status == 'false')

                                        <form action="{{ route('status.sellering') }}" method="POST"> 
                                            @csrf

                                            <input type="text" name="status" value="true" hidden>
                                            <input type="number" name="id" value="{{ $seller->id }}" hidden>
                                            <button type="submit" class="btn btn-success btn-xs d-flix text-center">
                                                <i class="fas fa-toggle-on"></i>
                                                active
                                            </button>
                    
                                        </form>
                                        
                                    @else

                                        <form action="{{ route('status.sellering') }}" method="POST"> 
                                            @csrf

                                            <input type="text" name="status" value="false" hidden>
                                            <input type="number" name="id" value="{{ $seller->id }}" hidden>
                                            <button type="submit" class="btn btn-danger btn-xs d-flix text-center">
                                                <i class="fas fa-toggle-off"></i>
                                                inactive
                                            </button>
                                            
                                        </form>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('sellering.show',$seller->id) }}" class="btn btn-xs mx-2"> 
                                        <i class="far fa-eye"></i> 
                                        View details
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> <!-- table-responsive.// -->
            </div>
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
    <div class="pagination-area mt-15 mb-50">
        <nav aria-label="Page navigation example">
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
</section>
@endsection


@section('scripts')


@endsection