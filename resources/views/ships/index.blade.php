@section('title')
Ships
@endsection

@extends('includes.master')



@section('main')
<div class="container custom-container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <a href="/dashboard">Dashboard</a> / Ships

            <input type="text" name="searchShips" id="searchShips" class="float-right search-input" placeholder="search">

            <br></br>

            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">List Of Ships</h5>
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

                <table id="shipTable" class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Serial Number</th>
                        <th>Image</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </thead>
                    <tbody id="shipsData">
                        @foreach($ships as $ship)
                        <tr>
                            <td>{{ $ship->ship_name }}</td>
                            <td>{{ $ship->serial_number }}</td>
                            <td>
                                <a href="{{ url('images/ships', $ship->image)}}">
                                    <img src="{{ url('images/ships', $ship->image) }}" width="10%">
                                </a>
                            </td>
                            <td>{{ $ship->fullname }}</td>
                            <td>
                                @if(Auth::user()->access_level_id == 1)
                                <a href="{{ url('ships/show', $ship->id) }}" class="btn btn-primary">Show</a>
                                <a href="{{ url('ships/edit', $ship->id) }}" class="btn btn-success">Edit</a>
                                <a href="javascript:void(0)" class="remove-ship btn btn-danger" data-ship-id="{{ $ship->id }}" data-url="{{ route('delete-ship', $ship->id) }}" data-ship-name="{{ $ship->ship_name }}">
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
                {{ $ships->links() }}
            </div>

            <br>

            <a href="/dashboard" class="btn btn-primary">Back</a>
            <a href="/ships/create" class="btn btn-primary">Add</a>
        </div>
    </div>
</div>

<div id="shipModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header bg-primary">
                <h2 class="modal-title white">Confirmation</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <h5 align="center">Are you sure want to delete this ship?</h5>
                <span id="shipName" class="text-info" font-weight-bold></span>
            </div>
            <div class="modal-footer">
                <button type="button" name="confirm_button" id="confirm_button" class="btn btn-danger">Confirm</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    var dataShipId, dataUrl, dataShipName;

    $(".remove-ship").on("click", function() {
        dataShipId = $(this).attr('data-ship-id');
        dataShipName = $(this).attr('data-ship-name');
        dataUrl = $(this).attr('data-url');
        $('#shipModal').modal('show');
        $('#shipName').text(datashipName);
    });

    $("#confirm_button").click(function() {
        $.ajax({
            url: dataUrl,
            success: function(data) {
                $("#shipModal").modal('hide');
                $("#shipTable").load(location.href + " #shipTable");
            }
        });
    });

    $("#searchShips").keyup(function() {
        let text = $(this).val();

        console.log(text);

        $.ajax({
            url: "{{ route('search-ships') }}",
            data: {
                text,
                text
            },
            success: function(data) {
                $('#shipsData').html(data);
                $('#shipsData').show();
            }
        });
    });
</script>
@endsection