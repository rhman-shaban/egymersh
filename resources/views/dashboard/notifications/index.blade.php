@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title"> notification </h2>
        </div>
        <div>
            <a href="{{ route('notifications.create') }}" class="btn btn-primary btn-sm rounded">  Add new notification  </a>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search..." class="form-control">
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
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
                            <th>#ID</th>
                            <th scope="col">title</th>
                            <th scope="col">message</th>
                            <th scope="col">admin</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-end"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                    	@if ($notifications->count() > 0)
                    	
                    	@foreach ($notifications as $index=>$notification)
                    		
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $notification->title }}</td>
                            <td>{!! $notification->message !!}</td>
                            <td>{{ $notification->admin->name }}</td>
                            <td>{{ $notification->status == '0' ? 'in active' : 'active' }}</td>
                            <td>
                                <div class="col-lg-2 col-sm-2 col-4 col-action text-end d-inline">
                                    <a href="{{ route('notifications.edit', $notification->id) }}" class="btn btn-sm font-sm rounded btn-brand">
                                        <i class="material-icons md-edit"></i>
                                    </a>
                                    <form action="{{ route('notifications.destroy', $notification->id) }}" method="post" style="display: inline-block">
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

                    	@else

                    		<h2>@lang('dashboard.no_data_found')</h2>

                    	@endif
                    </tbody>
                </table>
            </div> <!-- table-responsive //end -->
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