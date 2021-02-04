@section('title')
Edit Crew Member
@endsection

@extends('includes.master')

@section('main')
<div class="container custom-container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a href="/dashboard">Dashboard</a> / <a href="/ranks">Ranks</a> / Edit

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
                    <h5 class="text-white">Rank Member</h5>
                </div>

                <div class="card-body">                 
                        <form action="{{ route('update-rank', $rank->id) }}" method="POST">
                        @csrf
                        <div class="form-group p-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ $rank->name}}">
                            <span id="rankNameError" class="form-text text-error"></span>
                        </div>
                        <div class="form-group p-2">
                            <a href="/ranks" class="btn btn-primary">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>      
                </div>            
            </div>        

        </div>

        <br>

    </div>
</div>
@endsection