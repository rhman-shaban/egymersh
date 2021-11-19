@extends('store.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">notification</h2>
        </div>
    </div>

    <div wire:id="tG6jH8fMaJatb2ndvohv">
        <div class="card mb-4">
            <header class="card-header">
                <div class="row align-items-center">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">notifications <small>{{ $notifications->count() }}</small></h3>

                    <form action="{{ route('notification.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-1 row">
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
                                    <th class="align-middle" scope="col">title</th>
                                    <th class="align-middle" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notifications as $index=>$notification)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $notification->title }}</td>
                                        <td>
                                            <div class="col-lg-2 col-sm-2 col-4 col-action text-end d-inline">
                                                <a href="{{ route('notification.show', $notification->id) }}" class="btn btn-sm font-sm rounded btn-brand">
                                                    <i class="material-icons md-edit">View</i>
                                                </a>
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
    </div>

</section>
    

</section> <!-- content-main end// -->

@endsection