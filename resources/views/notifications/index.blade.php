@section('title')
Crew Members
@endsection

@extends('includes.master')

@section('main')
<div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <a href="/dashboard">Dashboard</a> / Notifications

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

                @if(isset($notifications))
                <table id="rankTable" class="table table-hover">
                    <thead>
                        <th>Type</th>
                        <th>Data</th>
                        <th>Actions</th>
                    </thead>
                    <tbody id="rankData">
                        
                            @foreach($notifications as $notification)
                            <tr>
                                <td>{{ $notification->type }}</td>
                                <td>{{ $notification->data }}</td>
                                <td>
                                    @if(Auth::user()->access_level_id == 1)
                                    <a href="javascript:void(0)" class="remove-notification btn btn-danger" 
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
                {{ $notifications->links() }}
                @endif
            </div>

            <br>

            <a href="/dashboard" class="btn btn-primary">Back</a>
            <a href="/notifications/create" class="btn btn-primary">Add</a>
        </div>
    </div>
</div>




@endsection