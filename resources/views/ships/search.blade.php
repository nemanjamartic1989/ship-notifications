@foreach($ships as $ship)
<tr>
    <td>{{ $ship->ship_name }}</td>
    <td>{{ $ship->serial_number }}</td>
    <td class="col-sm-6"><a href="{{ url('images/ships', $ship->image)}}">
            <img src="{{ url('images/ships', $ship->image) }}" width="10%">
        </a>
    </td>
    <td>{{ $ship->fullname }}</td>
    <td>
        <a href="{{ url('ships/show', $ship->id) }}" class="btn btn-primary">Show</a>
        <a href="{{ url('ships/edit', $ship->id) }}" class="btn btn-info">Edit</a>
        <a href="javascript:void(0)" class="change-ships-status btn btn-danger" data-ship-id="{{ $ship->id }}" data-url="{{ route('delete-ship', $ship->id) }}" data-ship-name="{{ $ship->name }}">
            Delete
        </a>
    </td>
</tr>
@endforeach