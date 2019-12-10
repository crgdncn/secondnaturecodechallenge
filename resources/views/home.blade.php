@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Customer List</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Admin</th>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>
                                    <a href="{{route('customer.show', [$customer], false)}}">{{$customer->first_name}} {{$customer->last_name}}</a>
                                </td>
                                <td>
                                    {{$customer->email}}
                                </td>
                                <td>
                                    {{$customer->admin ? 'Y' : 'N'}} {{$customer->id}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
