@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Account Details
                    <span style="float: right;">
                        <a href="{{$address_route}}">Address</a>
                    </span>
                </div>
                @include('partials.user_form')
            </div>
        </div>
    </div>
</div>
@endsection
