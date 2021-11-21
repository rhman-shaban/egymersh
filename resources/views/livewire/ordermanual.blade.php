<div>
    <div class="card mb-4">
        <header class="card-header">
            <h4 class="card-title"> List All Orders </h4>
            <div class="row align-items-center">

                <div class="col-md-2 col-6">
                    <input wire:model.debounce.300ms="search" type="text" placeholder="Search BY order number" wire:model="search" class="form-control">
                </div>
                <div class="col-md-2 col-6">
                    <div class="custom_select">
                        <select wire:model="perPage" class="form-select">
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
                                <th class="align-middle" scope="col">Customer Name</th>
                                <th class="align-middle" scope="col">Seller Name</th>
                                <th class="align-middle" scope="col">Status</th>
                                <th class="align-middle" scope="col">Created At</th>
                                <th class="align-middle" scope="col">Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($users as $order)
                            <tr>
                                <td> M{{ $order->id}} </td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->seller->name }}</td>
                                <td>
                                   {{ $order->created_at->diffForHumans() }}
                                </td>

{{--                                 <td>
                                    <span class="badge badge-pill" style='background-color: {{ optional($order->status)->color }}' >{{ optional($order->status)->name_en }}</span>
                                </td> --}}
                                <td>{{ $order->status == '0' ? 'inactive' : 'active'}}</td>
                                <td>
                                <a href="{{ route('manual.order.show'  , $order->id ) }}" class="btn btn-xs"> <i class="far fa-eye"></i> </a>
                                <form action="{{ route('delete_order', $order->id ) }}" style="display:inline;" method="POST"  >
                                @method('delete')
                                        @csrf

                                        <button class="btn btn-xs btn-danger delete"> <i class="fas fa-trash-alt"></i> </button>
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
          {{ $users->links() }}
    </div>
</div>
