@section('title')
Create Ship
@endsection

@extends('includes.master')

@section('main')
<div class="container custom-container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <a href="/dashboard">Dashboard</a> / <a href="/ships">Ships</a> / Create

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
                    <h5 class="text-white">Add Ship</h5>
                </div>

                <div class="card-body">                 
                        <form class="form-horizontal" action="{{ route('ships-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group p-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="name">
                            <span id="shipNameError" class="form-text text-error"></span>
                        </div>
                        <div class="form-group p-2">
                            <label for="serial_number">Serial Number</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number" value="{{ old('serial_number') }}" placeholder="serial_number">
                        </div>
                        <div class="form-group p-2">
                            <label for="ship_image">Image</label>
                            <input type="file" class="form-control" id="ship_image" name="image" value="{{ old('image') }}">
                        </div>
                        <div class="form-group p-2">
                            <a href="/ships" class="btn btn-primary">Back</a>
                            @if(Auth::user()->access_level_id == 1)
                            <button type="submit" class="btn btn-primary">Save</button>
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