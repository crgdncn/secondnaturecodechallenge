@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="customer-name">
                        {{ $customer->first_name . ' ' . $customer->last_name }}
                    </span>
                    <a class="ml-2 edit-details" href="{{ route('customer.edit', [$customer->id], false) }}">(edit account details</a>)
                </div>

                <h5 class="ml-2 mt-2">My Widgets<h5>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="th">
                                SKU
                            </th>
                            <th class="th">
                                Name
                            </th>
                            <th>
                                <a class="add-widget" href="#">Add Widget</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer->widgets as $widget)
                            @include('customer.partials.widget_row')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
     <style>
        .customer-name {
            font-weight: bold;
            font-size: 1.3rem;
        }

        .edit-details {
            font-size: 0.8rem;
        }

        .th {
            font-size: 0.8rem;
            font-weight: bold;
        }

        td {
            font-size: 0.7rem;
        }

        .add-widget {
            font-size: 0.6rem;
        }
    </style>
@endpush
