@foreach($ranks as $rank)
    <tr>
        <td>{{ $rank->name }}</td>
        <td>{{ $rank->fullname }}</td>
        <td>
            @if(Auth::user()->access_level_id == 1)
            <a href="{{ url('ranks/show', $rank->id) }}" class="btn btn-primary">Show</a>
            <a href="{{ url('ranks/edit', $rank->id) }}" class="btn btn-success">Edit</a>
            <a href="javascript:void(0)" class="remove-rank btn btn-danger" 
                data-rank-id="{{ $rank->id }}" data-url="{{ route('delete-rank', $rank->id) }}" 
                data-rank-name="{{ $rank->name }} {{ $rank->surname }}">
                Delete
            </a>
            @else
                /
            @endif
        </td>
    </tr>
@endforeach