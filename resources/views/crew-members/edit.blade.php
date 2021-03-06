@section('title')
Edit Crew Member
@endsection

@extends('includes.master')

@section('main')
<div class="container custom-container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a href="/dashboard">Dashboard</a> / <a href="/crew-members">Crew members</a> / Edit

            <br></br>

            <div class="card-body">
                @if(session('errors'))
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">Edit Crew Member</h5>
                </div>

                <div class="card-body">                 
                        <form action="{{ route('update-crew-member', $crewMember->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group p-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ $crewMember->name}}">
                            <span id="crewMemberNameError" class="form-text text-error"></span>
                        </div>
                        <div class="form-group p-2">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" placeholder="surname" value="{{ $crewMember->surname }}">
                            <span id="crewMemberSurnameError" class="form-text text-error"></span>
                        </div>
                        <div class="form-group p-2">
                            <label for="email">Email</label>
                            <input type="text" class="form-control email-validation" id="email" name="email" placeholder="email" value="{{ $crewMember->email}}">
                            <span id="crewMemberEmailError" class="form-text email-error text-danger"></span>
                        </div>
                        <div class="form-group p-2">
                            <label for="ship_id">Select Ship</label>
                            <select id="ship_id" name="ship_id" class="form-control">
                                @foreach($ships as $ship)
                                <option value="{{ $ship->id }}" {{($ship->id == $crewMember->ship_id) ? 'selected' : ''}}>{{ $ship->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group p-2">
                            <a href="/crew-members" class="btn btn-primary">Back</a>
                            @if(Auth::user()->access_level_id == 1)
                            <button type="submit" class="btn btn-primary">Update</button>
                            @endif
                        </div>
                    </form>      
                </div>            
            </div>        

        </div>

        <br>

    </div>
</div>
@endsection