@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>New Widget</h3></div>
                @include('widget.partials.form')
            </div>
        </div>
    </div>
</div>
@endsection
