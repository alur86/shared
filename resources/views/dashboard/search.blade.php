@extends('layouts.app')

@section('content')
<div class="container spark-screen">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading"><h3>Notes</h3></div>
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
@if (count($notes) > 0) 
<p>Found: <i>{{$query}} </i></p>
<p>Total: {{$total}} matches</p>     
</div> 
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
</tr>
@endforeach
</tbody>  
</table> 
{!! $notes->links() !!}
@else
<p>Found: <i>{{$query}} </i></p>
<p>Total: {{$total}} matches</p> 
@endif
</div>

@endsection

