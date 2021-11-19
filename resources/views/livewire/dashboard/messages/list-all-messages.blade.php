<div>
    <div class="card mb-4">
        <header class="card-header">
            <h4 class="card-title"> List All messages </h4>
            <div class="row align-items-center">

                <div class="col-md-2 col-6">
                    <input type="text" placeholder="Search BY Text" wire:model="search" class="form-control">
                </div>
                <div class="col-md-2 col-6">
                    <div class=>
                        <select wire:model="rows" class="form-select">
                            <option selected value="10" >10</option>
                            <option value="15" > 15</option>
                            <option value="20" > 20</option>
                            <option value="30" > 30</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="">
                        <select wire:model="status" class="form-select">
                            <option selected value="all" >All</option>
                            <option value="1" > seen</option>
                            <option value="0" > un Seen</option>
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
                                <th class="align-middle" scope="col">Email</th>
                                <th class="align-middle" scope="col">Phone</th>
                                <th class="align-middle" scope="col">Subject</th>
                                <th class="align-middle" scope="col">Status</th>
                                <th class="align-middle" scope="col">Settings</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $i = 1;
                            @endphp
                            @foreach ($messages as $message)
                            <tr>
                                <td> {{ $i++ }} </td>
                                <td>{{ $message->name }}</td>
                                <td>
                                    {{ $message->email }}
                                </td>
                                <td>
                                    {{ $message->phone }}
                                </td>
                                 <td>
                                    {{ $message->subject }}
                                </td>
                                <td>
                                    @switch($message->seen)
                                    @case(1)
                                    <span class="badge badge-pill badge-soft-success">Seen</span>
                                    @break
                                    @case(0)
                                    <span class="badge badge-pill badge-soft-primary">New</span>
                                    @break
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('messages.show'  , ['message' => $message->id ] ) }}" class="btn btn-xs"> <i class="far fa-eye"></i> </a>
                                    <form action="{{ route('messages.destroy'  , ['message' => $message->id ] ) }}" style="display:inline;" method="POST"  >
                                        
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
          {{ $messages->links() }}
    </div>
</div>
