@section('title')
Users
@endsection

@extends('includes.master')



@section('main')
<div class="container custom-container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <a href="/dashboard">Dashboard</a> / Users

            <input type="text" name="searchUsers" id="searchUsers" class="float-right search-input" placeholder="search">

            <br></br>

            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">List Of Users</h5>
                </div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>

                <table id="userTable" class="table table-hover">
                    <thead>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </thead>
                    <tbody id="usersData">
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if($user->access_level_id == 1)
                            <td>
                                <a href="{{ url('users/show', $user->id) }}" class="btn btn-primary">Show</a>
                                <a href="javascript:void(0)" class="change-user-status btn btn-danger" data-user-id="{{ $user->id }}" data-user-status="{{ $user->status_activity }}" data-url="{{ route('delete-user', $user->id) }}" data-user-name="{{ $user->name }}">
                                    Delete
                                </a>
                            </td>
                            @else
                            <td>/</td>
                            @endif
                        </tr>
                        @endforeach
                        </tbdy>
                </table>
                {{ $users->links() }}
            </div>

            <br>

            <a href="/dashboard" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>

<div id="userModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header bg-primary">
                <h2 class="modal-title white">Confirmation</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <h5 align="center">Are you surewant to deactivate this user?</h5>
                <span id="userName" class="text-info" font-weight-bold></span>
            </div>
            <div class="modal-footer">
                <button type="button" name="confirm_button" id="confirm_button" class="btn btn-danger">Confirm</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    var dataUserId, dataUserStatus, dataUrl, dataUserName;

    $(".change-user-status").on("click", function() {
        dataUserId = $(this).attr('data-user-id');
        dataUserStatus = $(this).attr('data-user-status');
        dataUserName = $(this).attr('data-user-name');
        dataUrl = $(this).attr('data-url');
        $('#userModal').modal('show');
        $('#userName').text(dataUserName);
    });

    $("#confirm_button").click(function() {
        $.ajax({
            url: dataUrl,
            method: "PUT",
            success: function(data) {
                $("#userModal").modal('hide');
                $("#userTable").load(location.href + " #userTable");
            }
        });
    });

    $("#searchUsers").keyup(function() {
        let text = $(this).val();

        console.log(text);

        $.ajax({
            url: "{{ route('search-users') }}",
            data: {
                text,
            },
            success: function(data) {
                $('#usersData').html(data);
                $('#usersData').show();
            }
        });
    });
</script>
@endsection