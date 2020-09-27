@extends('layouts.app')

@section('content')
<div class="container spark-screen">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Add Note</div>
<div class="panel-body">
<form class="form-horizontal" role="form" method="POST" action="{{ url('/postnoteadd') }}">
<input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">

{{ csrf_field() }}
<div class="col-md-6">
<div class="form-group{{ $errors->has('is_public') ? 'has-error' :'' }}">
<select name="is_public">
<option selected disabled>Please select one option</option>
<option value="1">Private</option>
<option value="0">Public</option>
</select>  
@if ($errors->has('is_public'))
<span class="help-block">
<strong>{{ $errors->first('is_public') }}</strong>
</span>
@endif
</div>
<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
<label for="title" class="col-md-4 control-label">Title</label>
<div class="col-md-6">
<input id="title" type="text" class="form-control" name="title">
@if ($errors->has('title'))
<span class="help-block">
<strong>{{ $errors->first('title') }}</strong>
</span>
@endif
</div>
<div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
<label for="title" class="col-md-4 control-label">Link</label>
<div class="col-md-6">
<input id="link" type="text" class="form-control" name="link">
@if ($errors->has('link'))
<span class="help-block">
<strong>{{ $errors->first('link') }}</strong>
</span>
@endif
</div>
<textarea id="body" class="form-control" cols="50" rows="10" name="body"></textarea>
<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
 <i class="fa fa-btn fa-user"></i> Add
</button>
</div>
</div>
</div>
</div>
</div>
@endsection