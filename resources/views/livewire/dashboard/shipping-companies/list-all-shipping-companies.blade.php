<div>
    <div class="card mb-4">
        <header class="card-header">
            <h4 class="card-title"> List All Categories </h4>
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
                                <th class="align-middle" scope="col">Comapny Name</th>

                                <th class="align-middle" scope="col">Main</th>
                                <th class="align-middle" scope="col">Status</th>
                                <th class="align-middle" scope="col">Settings</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $i = 1;
                            @endphp
                            @foreach ($companies as $company)
                            <tr>
                                <td> {{ $i++ }} </td>
                                <td>{{ $company->name }}</td>
                                <td>
                                    @if ($company->main != null)
                                    <span class='text-primary' >  Yes</span>
                                    @else
                                    <span class='text-hide' >No</span>
                                    @endif
                                </td>
                                <td>
                                    @switch($company->active)
                                    @case(1)
                                    <span class="badge badge-pill badge-soft-success">Active</span>
                                    @break
                                    @case(0)
                                    <span class="badge badge-pill badge-soft-danger">Inactive</span>
                                    @break
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('shipping_companies.show'  , ['shipping_company' => $company->id ] ) }}" class="btn btn-xs"> <i class="far fa-eye"></i> </a>
                                    <a href="{{ route('shipping_companies.edit'  , ['shipping_company' => $company->id ] ) }}" class="btn btn-xs"> <i class="far fa-edit"></i> </a>
                                    <form action="{{ route('shipping_companies.destroy'  , ['shipping_company' => $company->id ] ) }}" style="display:inline;" method="POST"  >
                                        
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
          {{ $companies->links() }}
    </div>
</div>
