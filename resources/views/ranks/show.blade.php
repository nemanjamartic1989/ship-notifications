@section('title')
    Show Ship
@endsection

@extends('includes.master')
<div class="container custom-container">
    <div class="row justify-content-center">
        <div class="com-md-10">

            <a href="/dashboard">Dashboard</a> / <a href="/ranks">Ranks</a> / Show Rank

            <br><br>

            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">
                        View Rank: {{ $rank->name }}
                    </h5>
                </div>

                <div class="card-body">
                    <table class="table col-md-6">
                        <thead>
                            @if(isset($rank->name))
                            <tr>
                                <th>
                                    <th scope="col">Rank Name</th>
                                    <td>
                                        {{ $rank->name }}
                                    </td>
                                </th>
                            </tr>
                            @endif
                            
                            @if(isset($rank->fullname))
                            <tr>
                                <th>
                                    <th scope="col">Created By</th>
                                    <td>
                                        {{ $rank->fullname }} at {{ $rank->created_at }}
                                    </td>
                                </th>
                            </tr>
                            @endif
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('main')

@endsection