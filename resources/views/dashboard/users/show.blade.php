@extends('dashboard.layouts.master')

@section('page_content')


<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title"> Users </h2>
        </div>
    </div>

    @include('dashboard.layouts.messages')
    
    <table class="table table-bordered table-hover">

        <tbody>
            <tr>
                <th> name </th>
                <td> {{ $user->name }} </td>
            </tr>
             <tr>
                <th> phone </th>
                <td> {{ $user->phone }} </td>
            </tr>

             <tr>
                <th> email </th>
                <td> {{ $user->email }} </td>
            </tr>

             <tr>
                <th> created at </th>
                <td> {{ $user->created_at->diffForHumans() }} </td>
            </tr>
        </tbody>
    </table>

</section> <!-- content-main end// -->


@endsection


@section('scripts')


@endsection