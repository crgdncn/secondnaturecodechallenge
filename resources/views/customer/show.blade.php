@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    My Widgets
                </div>
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
                                <a class="btn btn-primary add-widget" href="#" onclick="getWidgetList('{{ route('widget.list', [], false)}}')">Add Widget</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
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
            font-size: 0.8rem;
            /*color: red;*/
        }
    </style>
@endpush
