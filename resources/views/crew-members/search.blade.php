@foreach($crewMembers as $crewMember)
<tr>
    <td>{{ $crewMember->name }}</td>
    <td>{{ $crewMember->surname }}</td>
    <td>{{ $crewMember->email }}</td>
    <td>{{ $crewMember->ship->name }}</td>
    <td>{{ $crewMember->created_by }}</td>
    <td>
        @if(Auth::user()->access_level_id == 1)
        <a href="{{ url('crew-members/show', $crewMember->id) }}" class="btn btn-primary">Show</a>
        <a href="{{ url('crew-members/edit', $crewMember->id) }}" class="btn btn-success">Edit</a>
        <a href="javascript:void(0)" class="remove-crew-member btn btn-danger" data-crew-member-id="{{ $crewMember->id }}" data-url="{{ route('delete-crew-member', $crewMember->id) }}" data-crew-member-name="{{ $crewMember->name }} {{ $crewMember->surname }}">
            Delete
        </a>
        @else
        /
        @endif
    </td>
</tr>
@endforeach