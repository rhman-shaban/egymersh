@if (session('success'))
<div class="alert alert-success alert-dismissible text-white" role="alert">
  <div class="d-flex">

    <h4>
     {{ session('success') }}
    </h4>
  </div>
  <div class="alert-close">
 <!--<a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close">-->
  <a class="btn-close">
       <i class="fa fa-close"></i>
  </a>
  </div>
</div>
@endif

@if (session('error'))

<div class="alert  alert-danger alert-dismissible  text-white" role="alert">
  <div class="d-flex">

    <h4>
     {{ session('error') }}
    </h4>
  </div>
  <div class="alert-close">
  <a class="btn-close">
       <i class="fa fa-close"></i>
  </a>
  </div>
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning alert-dismissible  text-white" role="alert">
  <div class="d-flex">

    <h4>
     {{ session('warning') }}
    </h4>
  </div>
  <div class="alert-close">
  <a class="btn-close">
       <i class="fa fa-close"></i>
  </a>
  </div>
</div>

@endif



