<div>
    <div class="card mb-4">
        <header class="card-header">
            <h4 class="card-title"> List All Governorates </h4>
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
                                <th class="align-middle" scope="col">Arabic Name</th>
                                <th class="align-middle" scope="col">English Name</th>
                                <th class="align-middle" scope="col">Status</th>
                                <th class="align-middle" scope="col">Settings</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $i = 1;
                            @endphp
                            @foreach ($governorates as $governorate)
                            <tr>
                                <td> {{ $i++ }} </td>
                                <td>{{ $governorate->name_ar }}</td>
                                <td>
                                    {{ $governorate->name_en }}
                                </td>
                                <td>
                                    @switch($governorate->active)
                                    @case(1)
                                    <span class="badge badge-pill badge-soft-success">Active</span>
                                    @break
                                    @case(0)
                                    <span class="badge badge-pill badge-soft-danger">Inactive</span>
                                    @break
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('governorates.show'  , ['governorate' => $governorate->id ] ) }}" class="btn btn-xs"> <i class="far fa-eye"></i> </a>
                                    <a href="{{ route('governorates.edit'  , ['governorate' => $governorate->id ] ) }}" class="btn btn-xs"> <i class="far fa-edit"></i> </a>
                                    <form action="{{ route('governorates.destroy'  , ['governorate' => $governorate->id ] ) }}" style="display:inline;" method="POST"  >
                                        
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
          {{ $governorates->links() }}
    </div>
</div>
