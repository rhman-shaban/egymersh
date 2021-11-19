@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Requests</h2>
        </div>
        @include('dashboard.layouts.messages')
      
    </div>
    <div class="row">
    <div class="card mb-4">
        <header class="card-header">
          <!-- sales made by customers on the site (not related to manual orders!) -->
          <div class="row align-items-center">
          </div>
        </header>
     
        <div class="card-body">
          <div class="table-responsive">
            <div class="table-responsive">
              <table class="table align-middle table-nowrap mb-0">
                <thead class="table-light">
                  <tr>
                    <th class="align-middle" scope="col">ID</th>
                    <th class="align-middle" scope="col">Amount</th>
                    <th class="align-middle" scope="col">Phone</th>
                    <th class="align-middle" scope="col">Date</th>
                    <th class="align-middle" scope="col">Payment Way</th>
                    <th class="align-middle" scope="col">Status</th>
                    <th class="align-middle" scope="col">Message</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($wallets as $walet)
                  <tr>
                  <td>{{$walet->id}}<a href="#" class="fw-bold"></a> </td>
                    <td>{{$walet->price}}<a href="#" class="fw-bold"></a> </td>
                    <td>{{$walet->phone}}</td>
                    <td>
                    {{ date('d-m-Y', strtotime($walet['created_at'])); }}
                    </td>
                    <td>
                    {{$walet->payway}}        
                    </td>
                    <td>
                      <span class="badge badge-pill badge-soft-success">{{$walet->status_en}}</span>
                    </td>
                    <td>
                    <button type="button"
                     name="id" value="{{$walet->id}}" class="btn btn-primary"
                      data-bs-toggle="modal"
                       data-bs-target="#request_id">
                                 Chnge
                    </button>
                    </td>
                  </tr>
                @endforeach
         
                </tbody>
                </tbody>
              </table>
            </div>
          </div> <!-- table-responsive end// -->
        </div>
      </div>
    </div>  

    
        <div class="modal fade" id="request_id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{route('requset.update')}}">
                @csrf
                
                        <div class="modal-body">
                            <div class="mb-4">
                                <label class="form-label">message</label>
                                <input type="text" name="message" placeholder="Enter message" class="form-control">
                            </div>
                            <div class="mb-4">
                            <label class="form-label">select status</label>
                            <select class="form-select" name="status"  id="selct-store-order">
                                <option>pending</option>
                                <option>confirmed</option>
                            </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="supmit" id="id" value="id" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div> 
            </div>
        </div>
   
                      

</section>
    

@endsection


@section('scripts')
<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

</script>


@endsection