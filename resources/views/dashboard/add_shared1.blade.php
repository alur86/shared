@extends('layouts.app')

@section('content')
<div class="container spark-screen">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading"><h3>Shared Link This Note</h3></div>
<div class="panel-body">
<form class="form-horizontal" role="form" method="POST" action="{{ url('/postsharedlink1') }}">
<input id="note_id" type="hidden" class="form-control" name="note_id" value="{{ $note->id }}">
{{ csrf_field() }}
<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
<label for="title" class="col-md-4 control-label">User to Shared Link</label>
<div class="col-md-6">
<select  name="user_email">
<option selected disabled>Please select one option</option>
@foreach($users as $user)
<option value="{{ $user->email }}">{{ $user->email }}</option>
@endforeach
</select>  
</div> 
<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
<label for="title" class="col-md-4 control-label">Title</label>
<div class="col-md-6">
<input id="title" type="text" class="form-control" name="title" value="{{$note->title }}" readonly>
@if ($errors->has('title'))
<span class="help-block">
<strong>{{ $errors->first('title') }}</strong>
</span>
 @endif
 </div>
</div>
<div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
<label for="title" class="col-md-4 control-label">Link</label>
<div class="col-md-6">
<input id="link" type="text" class="form-control" name="link" value="{{$note->link}}" readonly>
@if ($errors->has('link'))
<span class="help-block">
<strong>{{ $errors->first('link') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
 <i class="fa fa-btn fa-user"></i> Submit
</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection