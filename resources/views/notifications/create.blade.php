@section('title')
Create Crew Member
@endsection

@extends('includes.master')

@section('main')
<div class="container custom-container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <a href="/dashboard">Dashboard</a> / <a href="/notifications">Notifications</a> / Create

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
                    <h5 class="text-white">Create Notification</h5>
                </div>

                <div class="card-body">                 
                        <form class="form-horizontal" action="{{ route('store-notification') }}" method="POST">
                        @csrf
                        <div class="form-group p-2 col-md-6">
                            <label for="crew_member_id">Select Ship</label>
                            <select id="crew_member_id" name="crew_member_id" class="form-control">
                                @foreach($crewMembers as $crewMember)
                                <option value="{{ $crewMember->id }}">{{ $crewMember->name }} {{ $crewMember->surname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group p-2">
                            <label for="name" class="col-sm-4">
                                <strong>Content</strong>
                            </label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="content" name="content" placeholder="name"></textarea>
                                <span id="rankNameError" class="form-text text-error"></span>
                            </div>
                        </div>

                        <br>

                        <div class="form-group p-2">
                            <a href="/ranks" class="btn btn-primary">Back</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </div>
                </form>      
            </div>            
        </div>        


    </div>

</div>
</div>
<script>
    $(document).ready(function() {

$('#content').summernote({

  height:300,

});

});
</script>
@endsection