@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="customer-name">{{ $customer->first_name . ' ' . $customer->last_name }}</span>
                    <a class="ml-2 edit-details" href="{{ route('customer.edit', [$customer->id], false) }}">(edit account details</a>)
                </div>
                // show widgets here
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
     <style>
        .customer-name {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .edit-details {
            font-size: 0.8rem;
        }
    </style>
@endpush
