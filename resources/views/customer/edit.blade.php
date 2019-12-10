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
                        <div class="col-md-4 text-md-right py-2">Line One</div>
                        <div class="col-md-6 py-2">
                            {{$address->address_1}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 text-md-right py-2">Line Two</div>
                        <div class="col-md-6 py-2">
                            {{$address->address_2}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 text-md-right py-2">City</div>
                        <div class="col-md-6 py-2">
                            {{$address->city}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 text-md-right py-2">State</div>
                        <div class="col-md-6 py-2">
                        {{$address->state}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 text-md-right py-2">Post Code</div>
                        <div class="col-md-6 py-2">
                            {{$address->post_code}}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
