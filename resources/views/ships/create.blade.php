@section('title')
    Create Ship
@endsection

@extends('includes.master')

@section('main')
<div class="container block-template">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <a href="/dashboard">Dashboard</a> / <a href="/ships">Ships</a> / Create

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
                    <h5 class="text-white">Add Ship</h5>
                </div>

                <div class="card-body">                 
                    <form action="{{ route('ships-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="name">
                            <span id="shipNameError" class="form-text text-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="serial_number">Serial Number</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number" placeholder="serial_number">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="ship_image">Image</label>
                            <input type="file" class="form-control" id="ship_image" name="image">
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