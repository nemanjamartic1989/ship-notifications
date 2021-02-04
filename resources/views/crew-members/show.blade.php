@section('title')
    Show Ship
@endsection

@extends('includes.master')
<div class="container custom-container">
    <div class="row justify-content-center">
        <div class="com-md-10">

            <a href="/dashboard">Dashboard</a> / <a href="/crew-members">Crew Members</a> / Show Ship

            <br><br>

            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">
                        View Ship: {{ $crewMember->name }} {{ $crewMember->surname }}
                    </h5>
                </div>

                <div class="card-body">
                    <table class="table col-md-6">
                        <thead>
                            @if(isset($crewMember->name))
                            <tr>
                                <th>
                                    <th scope="col">Crew Member Name</th>
                                    <td>
                                        {{ $crewMember->name }}
                                    </td>
                                </th>
                            </tr>
                            @endif
                            @if(isset($crewMember->surname))
                            <tr>
                                <th>
                                    <th scope="col">Crew Member Surname</th>
                                    <td>
                                        {{ $crewMember->surname }}
                                    </td>
                                </th>
                            </tr>
                            @endif
                            @if(isset($crewMember->email))
                            <tr>
                                <th>
                                    <th scope="col">Crew Member Email</th>
                                    <td>
                                        {{$crewMember->email}}
                                    </td>
                                </th>
                            </tr>
                            @endif
                            @if(isset($crewMember->ship->name))
                            <tr>
                                <th>
                                    <th scope="col">Ship Name</th>
                                    <td>
                                        {{ $crewMember->ship->name }}
                                    </td>
                                </th>
                            </tr>
                            @endif
                            @if(isset($crewMember->created_by))
                            <tr>
                                <th>
                                    <th scope="col">Created By</th>
                                    <td>
                                        {{ $crewMember->created_by }} at {{ $crewMember->created_at }}
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