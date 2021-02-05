@section('title')
Create Crew Member
@endsection

@extends('includes.master')

@section('main')
<div class="container custom-container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <a href="/dashboard">Dashboard</a> / <a href="/ranks">Ranks</a> / Create

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
                    <h5 class="text-white">Add Rank</h5>
                </div>

                <div class="card-body">                 
                        <form class="form-horizontal" action="{{ route('store-rank') }}" method="POST">
                        @csrf
                        <div class="form-group p-2">
                            <label for="name" class="col-sm-4">
                                <strong>Name</strong>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" placeholder="name">
                                <span id="rankNameError" class="form-text text-error"></span>
                            </div>
                        </div>

                        <br>

                        <div class="form-group p-2">
                            <a href="/ranks" class="btn btn-primary">Back</a>
                            @if(Auth::user()->access_level_id == 1)
                            <button type="submit" class="btn btn-primary">Save</button>
                            @endif
                        </div>
                </div>
                </form>      
            </div>            
        </div>        


    </div>

</div>
</div>
@endsection