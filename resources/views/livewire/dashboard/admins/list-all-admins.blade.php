<div>
    <div class="card mb-4">
        <header class="card-header">
            <h4 class="card-title"> List All Admins </h4>
            <div class="row align-items-center">

                <div class="col-md-2 col-6">
                    <input type="text" placeholder="Search BY Name" wire:model="search" class="form-control">
                </div>
                <div class="col-md-2 col-6">
                    <div class="custom_select">
                        <select wire:model="rows" class="form-select">
                            <option selected value="10" >10</option>
                            <option value="15" > 15</option>
                            <option value="20" > 20</option>
                            <option value="30" > 30</option>
                        </select>
                    </div>
                </div>
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
                                <th class="align-middle" scope="col">Username</th>
                                <th class="align-middle" scope="col">Added By</th>
                                <th class="align-middle" scope="col">Image</th>
                                <th class="align-middle" scope="col">Status</th>
                                <th class="align-middle" scope="col">Settings</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $i = 1;
                            @endphp
                            @foreach ($admins as $admin)
                            <tr>
                                <td> {{ $i++ }} </td>
                                <td>{{ $admin->name }}</td>
                                <td>
                                    {{ $admin->username }}
                                </td>
                                <td>
                                    <a href="{{ route('admins.show' , ['admin' => $admin->admin_id ] ) }}"> {{ optional($admin->admin)->username }} </a> 
                                </td>
                                <td>
                                    <img class="img-sm img-avatar" src="{{ Storage::disk('s3')->url('admins/'.$admin->image) }}" alt="">
                                </td>
                                <td>
                                    @switch($admin->active)
                                    @case(1)
                                    <span class="badge badge-pill badge-soft-success">Active</span>
                                    @break
                                    @case(0)
                                    <span class="badge badge-pill badge-soft-danger">Inactive</span>
                                    @break
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('admins.show'  , ['admin' => $admin->id ] ) }}" class="btn btn-xs"> <i class="far fa-eye"></i> </a>
                                    <a href="{{ route('admins.edit'  , ['admin' => $admin->id ] ) }}" class="btn btn-xs"> <i class="far fa-edit"></i> </a>
                                    <form action="{{ route('admins.destroy'  , ['admin' => $admin->id ] ) }}" style="display:inline;" method="POST"  >
                                        
                                        @method('delete')
                                        @csrf

                                        <button class="btn btn-xs btn-danger"> <i class="fas fa-trash-alt"></i> </button>
                                    </form>
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
          {{ $admins->links() }}
    </div>
</div>
