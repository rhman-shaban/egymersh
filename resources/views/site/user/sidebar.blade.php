@php
$segment = Request::segment(3);

$account = $orders = $returns = $addresses = '';

switch ($segment) {
    case null:
    $account = 'active';
    break;
    case 'orders':
    $orders = 'active';
    break;
    case 'returns':
    $returns = 'active';
    break;
    case 'addresses':
    $addresses = 'active';
    break;
    default:
    break;
}
@endphp




<ul class="nav flex-column" role="tablist">
    <li class="nav-item">
        <a class="nav-link {{ $account }}"  href="{{ route('user.account') }}"><i class="fi-rs-user mr-10" id="edit-prfile-button"></i>Account details</a>
    </li>

{{--     <li class="nav-item">
        <a class="nav-link " id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link {{ $orders }}"  href="{{ route('user.orders') }}"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.account.logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
    </li>
</ul>