<table class="table table-striped">  
<thead>  
<tr>   
<th>Notes Links What Shared with Me</th> 
</tr> 
<tr>  
<th>Id</th>  
<th>Note Link</th> 
<th>Note Body</th>
</tr> 
</thead>  
<tbody> 
@foreach( $shared_notes as $note)   
<tr> 
<td>{{ $note->id }}</td>    
<td>
<a href={{$note->link}}>{{ $note->title}}</a>
</td>
<td>
{{ $note->body }}
</td>
<tr>           
</tr>
@endforeach
</tbody>  
</table> 
