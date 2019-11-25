@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Customer</div>
                @include('partials.user_form')
            </div>
        </div>
    </div>
</div>
@endsection
