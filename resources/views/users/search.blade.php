@foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        @if($user->access_level_id == 1)
        <td>
            <a href="{{ url('users/show', $user->id) }}" class="btn btn-primary">Show</a>
            <a href="javascript:void(0)" class="change-user-status btn btn-danger" data-user-id="{{ $user->id }}"
                data-user-status="{{ $user->status_activity }}"
                data-url="{{ route('delete-user', $user->id) }}"
                data-user-name="{{ $user->name }}">
                Delete
            </a>
        </td>
        @else
        <td>/</td>
        @endif
    </tr>
@endforeach