@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title"> Messages </h2>
        </div>
    </div>

    @include('dashboard.layouts.messages')
    <table border="1" class="table table-bordered table-primary table-hover ">
        <tbody>
            <tr>
                <th> status </th>
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
               
            </tr>
            <tr>
                <th> Email </th>
                <td> {{ $message->email }} </td>
            </tr>
            <tr>
                <th> Phone </th>
                <td> {{ $message->phone }} </td>
            </tr>
            <tr>
                <th> Subject </th>
                <td> {{ $message->subject }} </td>
            </tr>
            <tr>
                <th> Name </th>
                <td> {{ $message->name }} </td>
            </tr>
            <tr>
                <th> Message </th>
                <td> {{ $message->message }} </td>
            </tr>
            <tr>
            <td>                                                    
                <a href="{{route('replay' ,$message -> id )}}"
                 class="btn btn-sm btn-primary">replay<i class="la la-pencil"></i></a>
            </td>
            </tr>

        </tbody>
    </table>
</section> <!-- content-main end// -->
@endsection


@section('scripts')


@endsection