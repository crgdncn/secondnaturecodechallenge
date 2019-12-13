@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Widgets</h3>
                    <span class="new-widget"><a class="btn btn-primary" href="{{route('widget.create', [], false)}}">Add</a></span>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                SKU
                            </th>
                            <th>
                                Name
                            </th>
                            <th style="text-align:center">
                                Active
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($widgets as $widget)
                        <tr>
                            <td>
                                {{$widget->id}}
                            </td>
                            <td>
                                <a href="{{route('widget.edit', [$widget->id], false)}}">
                                {{$widget->sku}}
                                </a>
                            </td>
                            <td>
                                {{$widget->name}}
                            </td>

                            <td align="center">
                                {{$widget->active}}
                            </td>
                        </tr>
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
        h3 {
            display: inline;
        }

        .new-widget {
            float: right;
            font-size: 1rem;
        }
    </style>
@endpush
