@if($message = Session::get('created'))
<div class="card-body text-center">
    <span class="alert alert-success" role="alert">{{ $message }}</span>
</div>
@endif

@if($message = Session::get('updated'))
<div class="card-body text-center">
    <span class="alert alert-success" role="alert">{{ $message }}</span>
</div>
@endif

@if($message = Session::get('deleted'))
<div class="card-body text-center">
    <span class="alert alert-success" role="alert">{{ $message }}</span>
</div>
@endif