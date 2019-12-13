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
                            <th></th>
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
                                <td id="admin_{{$customer->id}}">
                                    {{$customer->isAdmin() ? 'Y' : 'N'}}
                                </td>
                                <td>
                                    @if($customer->id != \Auth::user()->id)
                                        @can('admin_customers')
                                            <a id="remove-admin-{{$customer->id}}"  class="{{$customer->isAdmin() ? '' : 'hidden'}}" href="#" onclick="removeAdmin({{$customer->id}}); return false;">Remove Admin</a>
                                            <a id="make-admin-{{$customer->id}}"  class="{{$customer->isAdmin() ? 'hidden' : ''}}" href="#" onclick="makeAdmin({{$customer->id}}); return false;">Make Admin</a>
                                        @endcan
                                    @else
                                        --
                                    @endif
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

@push('scripts')
<script type="text/javascript">
    function makeAdmin(customerId) {
        url = '/customer/' + customerId + '/makeadmin';
        data = {};

        var jqxhr = $.post(url, data)
        .done(function(response) {
            $('#admin_' + customerId).text('Y');
            $('#make-admin-' + customerId).toggleClass('hidden');
            $('#remove-admin-' + customerId).toggleClass('hidden');

        }).fail(function(response) {
            alert('Ooops, something went wrong!');
        })
    }

    function removeAdmin(customerId) {
        url = '/customer/' + customerId + '/removeadmin';
        data = {};

        var jqxhr = $.post(url, data)
        .done(function(response) {
            $('#admin_' + customerId).text('N');
            $('#make-admin-' + customerId).toggleClass('hidden');
            $('#remove-admin-' + customerId).toggleClass('hidden');
        }).fail(function(response) {
            alert('Ooops, something went wrong!');
        })
    }
</script>
@endpush

@push('styles')
<style type="text/css">
    .hidden {display: none;}
</style>
@endpush
