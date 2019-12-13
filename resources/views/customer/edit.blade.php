@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Account Details
                </div>
                @include('partials.user_form')
            </div>
        </div>
    </div>
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Address
                    <span style="float: right;">
                        <a href="{{$address_route}}">@if($address)Edit @else Add @endif</a>
                    </span>
                </div>
                @if($address)
                    <div class="row">
                        <div class="col-md-6 py-2 pl-5">
                            {{$address->address_1}}
                            @if($address->address_2)
                               <br> {{$address->address_2}}
                            @endif
                            <br>
                            {{$address->city}}, {{$address->state}} {{$address->post_code}}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
