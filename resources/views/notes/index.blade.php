@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notes Area</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

<a href="{{ URL::to('/new') }}"><span class="glyphicon glyphicon-wrench" title="Add Note">Add Note</span></a>
<br>
<hr>
<br>
<table class="table table-striped">  
<thead> 
<th>Your Notes</th>  
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
<tr>  
<td><a href="{{ URL::to('edit/'.$note->id) }}"><span class="glyphicon glyphicon-wrench" title="Edit Note">Edit</span></a></td>           
</tr>           
@endforeach
</tbody>  
</table> 
{!! $notes->links() !!}

@include ('includes.shared')

@endsection
