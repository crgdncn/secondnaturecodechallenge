<tr id="row-{{$widget->id}}">
    <td>
        {{$widget->sku}}
    </td>
    <td>
        {{$widget->name}}
    </td>
    <td>
        @can('edit-user', $customer)
        <a href="#" onclick="removeWidget('{{route('customer.removewidget', [$customer->id], false)}}', {{$widget->id}});">remove</a>
        @endcan
    </td>
</tr>
