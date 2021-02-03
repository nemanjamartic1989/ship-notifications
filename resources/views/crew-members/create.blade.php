@section('title')
    Create Crew Member
@endsection

@extends('includes.master')

@section('main')
<div class="container block-template">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <a href="/dashboard">Dashboard</a> / <a href="/crew-members">Crew members</a> / Create

            <br></br>

            <div class="card-body">
                @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                @if(session('status'))
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
                    <h5 class="text-white">Add Crew Member</h5>
                </div>

                <div class="card-body">                 
                    <form action="{{ route('store-crew-member') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="name">
                            <span id="crewMemberNameError" class="form-text text-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" placeholder="surname">
                            <span id="crewMemberSurnameError" class="form-text text-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="email">
                            <span id="crewMemberEmailError" class="form-text text-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="ship_id">Select Ship</label>
                            <select id="ship_id" name="ship_id" class="form-control">
                                @foreach($ships as $ship)
                                <option value="{{ $ship->id }}">{{ $ship->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>      
                </div>            
            </div>        

                
            </div>

            <br>

            <a href="/dashboard" class="btn btn-primary">Back</a>
            <a href="/ships/create" class="btn btn-primary">Add</a>
        </div>
    </div>
@endsection