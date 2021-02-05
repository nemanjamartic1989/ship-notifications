@section('title')
    Show Ship
@endsection

@extends('includes.master')
<div class="container custom-container">
    <div class="row justify-content-center">
        <div class="com-md-10">

            <a href="/dashboard">Dashboard</a> / <a href="/ships">Ships</a> / Show Ship

            <br><br>

            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">
                        View Ship: {{ $ship->ship_name }}
                    </h5>
                </div>

                <div class="card-body">
                    <table class="table col-md-6">
                        <thead>
                            @if(isset($ship->ship_name))
                            <tr>
                                <th>
                                    <th scope="col">Ship Name</th>
                                    <td>
                                        {{ $ship->ship_name }}
                                    </td>
                                </th>
                            </tr>
                            @endif
                            @if(isset($ship->serial_number))
                            <tr>
                                <th>
                                    <th scope="col">Serial Number</th>
                                    <td>
                                        {{ $ship->serial_number }}
                                    </td>
                                </th>
                            </tr>
                            @endif
                            @if(isset($ship->image))
                            <tr>
                                <th>
                                    <th scope="col">Image Of Ship</th>
                                    <td>
                                        <a href="{{ url('images/ships', $ship->image)}}">
                                            <img src="{{ url('images/ships', $ship->image) }}" width="10%">
                                        </a>
                                    </td>
                                </th>
                            </tr>
                            @endif
                            @if(isset($ship->fullname))
                            <tr>
                                <th>
                                    <th scope="col">Created By</th>
                                    <td>
                                        {{ $ship->fullname }} at {{ $ship->created_at }}
                                    </td>
                                </th>
                            </tr>
                            @endif
                            @if(isset($ship->crewMembers))
                            <tr>
                                <th>
                                    <th scope="col">Crew Members assigned to <span class="text-danger">{{ $ship->ship_name }}</span></th>
                                    <td>
                                    @foreach ($ship->crewMembers as $crewMember)
                                        @if($crewMember->is_deleted == 0)
                                        {{ $crewMember->name }} {{ $crewMember->surname }}, <br> 
                                        @endif   
                                    @endforeach           
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