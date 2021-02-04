@section('title')
Crew Members
@endsection

@extends('includes.master')

@section('main')
<div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <a href="/dashboard">Dashboard</a> / Ranks

            <input type="text" name="searchRanks" id="searchRanks" class="float-right search-input" placeholder="search">

            <br></br>

            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">Ranks</h5>
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

                @if(isset($ranks))
                <table id="rankTable" class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </thead>
                    <tbody id="rankData">
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
                                    data-rank-name="{{ $rank->name }}">
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
                {{ $ranks->links() }}
                @endif
            </div>

            <br>

            <a href="/dashboard" class="btn btn-primary">Back</a>
            <a href="/ranks/create" class="btn btn-primary">Add</a>
        </div>
    </div>
</div>

<div id="rankModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header bg-primary">
                <h2 class="modal-title white">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h5 align="center">Are you sure want to delete this Rank?</h5>
                <span id="rankName" class="text-info" font-weight-bold></span>
            </div>
            <div class="modal-footer">
                <button type="button" name="confirm_button" id="confirm_button" class="btn btn-danger">Confirm</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    var dataRankId, dataUrl, dataRankName;

    $(".remove-rank").on("click", function() {
        dataRankId = $(this).attr('data-rank-id');
        dataRankName = $(this).attr('data-rank-name');
        dataUrl = $(this).attr('data-url');
        $('#rankModal').modal('show');
        $('#rankName').text(dataRankName);
    });

    $("#confirm_button").click(function() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: dataUrl,
            success: function(data) {
                $("#rankModal").modal('hide');
                $("#rankTable").load(location.href + " #rankTable");
            }
        });
    });

    $("#searchRanks").keyup(function() {
        let text = $(this).val();

        console.log(text);

        $.ajax({
            url: "{{ route('search-ranks') }}",
            data: {
                text, text
            },
            success: function(data) {
                $('#rankData').html(data);
                $('#rankData').show();
            }
        });
    });
</script>
@endsection