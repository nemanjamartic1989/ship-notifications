@section('title')
Crew Members
@endsection

@extends('includes.master')

@section('main')
<div class="container custom-container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <a href="/dashboard">Dashboard</a> / Crew Members

            <input type="text" name="searchCrewMembers" id="searchCrewMembers" class="float-right search-input" placeholder="search">

            <br></br>

            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">List Of Crew Members</h5>
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

                @if(isset($crewMembers))
                <table id="crewMemberTable" class="table table-hover">
                    <thead>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Ship</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </thead>
                    <tbody id="crewMemberData">
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
                                <a href="javascript:void(0)" class="remove-crew-member btn btn-danger" 
                                    data-crew-member-id="{{ $crewMember->id }}" data-url="{{ route('delete-crew-member', $crewMember->id) }}" 
                                    data-crew-member-name="{{ $crewMember->name }} {{ $crewMember->surname }}">
                                    Delete
                                </a>
                                @else
                                    /
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbdy>
                </table>
                {{ $crewMembers->links() }}
                @endif
            </div>

            <br>

            <a href="/dashboard" class="btn btn-primary">Back</a>
            <a href="/crew-members/create" class="btn btn-primary">Add</a>
        </div>
    </div>
</div>

<div id="crewMemberModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header bg-primary">
                <h2 class="modal-title white">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h5 align="center">Are you sure want to delete this Crew member?</h5>
                <span id="crewMemberName" class="text-info" font-weight-bold></span>
            </div>
            <div class="modal-footer">
                <button type="button" name="confirm_button" id="confirm_button" class="btn btn-danger">Confirm</button>
                <button type="button" class="btn btn-default close-modal" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    var dataCrewMemberId, dataUrl, dataCrewMemberName;

    $(".remove-crew-member").on("click", function() {
        dataCrewMemberId = $(this).attr('data-crew-member-id');
        dataCrewMemberName = $(this).attr('data-crew-member-name');
        dataUrl = $(this).attr('data-url');
        $('#crewMemberModal').modal('show');
        $('#crewMemberName').text(dataCrewMemberName);
    });

    $("#confirm_button").click(function() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: dataUrl,
            success: function(data) {
                $("#crewMemberModal").modal('hide');
                $("#crewMemberTable").load(location.href + " #crewMemberTable");
            }
        });
    });

    $("#searchCrewMembers").keyup(function() {
        let text = $(this).val();

        console.log(text);

        $.ajax({
            url: "{{ route('search-crew-members') }}",
            data: {
                text, text
            },
            success: function(data) {
                $('#crewMemberData').html(data);
                $('#crewMemberData').show();
            }
        });
    });
</script>
@endsection