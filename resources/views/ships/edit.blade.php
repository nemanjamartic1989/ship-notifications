@section('title')
Edit Ship
@endsection

@extends('includes.master')

@section('main')
<div class="container custom-container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <a href="/dashboard">Dashboard</a> / <a href="/ships">Ships</a> / Edit

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
                    <h5 class="text-white">Edit Ship</h5>
                </div>

                <div class="card-body">                 
                        <form action="{{ route('update-ship', $ship->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group p-2">
                            <label for="name">Name</label>
                            <input type="email" class="form-control" id="name" name="name" placeholder="name" value="{{ $ship->name }}">
                            <span id="shipNameError" class="form-text text-error"></span>
                        </div>
                        <div class="form-group p-2">
                            <label for="serial_number">Serial Number</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number" placeholder="serial_number" value="{{ $ship->serial_number }}">
                        </div>
                        <div class="form-control p-2">
                            <label class="form-check-label" for="ship_image">Image</label>
                            <input type="file" class="form-control" id="ship_image" name="image">
                            <a href="{{ url('images/ships', $ship->image)}}">
                                <img src="{{ url('images/ships', $ship->image) }}" width="10%">
                            </a>
                        </div>
                        <div class="form-control p-2">
                            <a href="/ships" class="btn btn-primary">Back</a>
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