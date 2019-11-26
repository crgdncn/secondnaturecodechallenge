<table class="table table-striped">
    <thead>
        <tr>
            <th>
                SKU
            </th>
            <th>
                Name
            </th>
            <th colspan="2">
                Description
            </th>
        <tr>
    </thead>
    <tbody>
    @foreach($widgets as $widget)
        <tr id="widget-{{$widget->id}}">
            <td>
                {{$widget->sku}}
            </td>
            <td>
                {{$widget->name}}
            </td>
            <td>
                {{$widget->description}}
            </td>
            <td>
                <a href="#" onclick="addWidget('{{route('customer.addwidget', [$customer->id], false)}}', {{$widget->id}});">Add</a>
            </td>
        <tr>
@endforeach
    </tbody>
</table>
