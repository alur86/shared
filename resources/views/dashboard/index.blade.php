@extends('layouts.app')

@section('content')
<div class="container spark-screen">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading"><h2>Notes Area</h2></div>
<div class="panel-body">
<div class="row">
<div class="col-md-3">
 <p>Search notes:</p>
<form class="navbar-form navbar-right" role="search" method="GET" action="{{ url('/search') }}">
<div class="input-group">
@if ($errors->has('query'))
<span class="help-block">
<strong>{{ $errors->first('query') }}</strong>
</span>
@endif
<input type="text" name="query" id="query"  class="form-control" placeholder="Search...">
<span class="input-group-btn">
<button type="submit" class="btn btn-default">
<span class="glyphicon glyphicon-search"></span>
</button>
</span>
</div>
</form> 
</div>
<h3>Notes</h3>
<table class="table table-striped">  
<thead>  
<tr>  
<th>Id</th>  
<th>Note Link</th> 
<th>Note Body</th>
</tr>  
</thead>  
<tbody> 
@foreach( $notes as $note)   
<tr>  
<td>{{ $note->id }}</td>  
<td>
<a href={{$note->link}}>{{ $note->title}}</a>
</td> 
<td>
{{ $note->body }}
</td>  
<td>
<td><a href="{{ URL::to('/new_shared',$note->id) }}"><span class="glyphicon glyphicon-wrench" title="Add Shared Link">Add Shared Link</span></a></td>           
</tr>
@endforeach
</tbody>  
</table>     
{!! $notes->links() !!}

<h3> Shared Links</h3>
<table class="table table-striped"></th>
<thead>  
<tr>    
<th>Notes Shared Links Title</th>
</tr>  
</thead>  
<tbody> 
@foreach( $shared_notes as $note)   
<tr>    
<td>
<a href={{$note->link}}>{{ $note->title}}</a>
</td>
<tr>
@endforeach
</tbody>  
</table>   
</div>
@endsection

