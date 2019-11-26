<tr id="row-{{$widget->id}}">
    <td>
        {{$widget->sku}}
    </td>
    <td>
        {{$widget->name}}
    </td>
    <td>
        <a href="#" onclick="removeWidget('{{route('customer.removewidget', [$customer->id], false)}}', {{$widget->id}});">remove</a>
    </td>
</tr>
