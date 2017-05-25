@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Types</h1>

        <div class="types-content white-panel">
			@include('shared.success')
			
        	<p><a class="orange-btn" href="{{ route('types.create') }}">Add new type</a></p>
	        <table cellspacing="2">
	        	<thead>
	        		<tr>
	        			<th>Type</th>
	        			<th>&nbsp;</th>
	        		</tr>
	        	</thead>
	        	<tbody>
		        	@foreach($types as $type)
			        	<tr>
			        		<td>{{$type->type}}</td>
			        		<td>
				        		<a class="orange-btn" href="{{ route('types.edit', ['id' => $type->id]) }}">Edit</a>
								<form method="post" action="{{ route('types.destroy', ['id' => $type->id]) }}">
									{!! csrf_field() !!}
									<input type="hidden" name="_method" value="DELETE" />
									<input type="submit" value="Delete" class="orange-btn" />
								</form>
			        		</td>
			        	</tr>
		        	@endforeach
	        	</tbody>
	        </table>
	        <p><a class="orange-btn" href="{{ route('types.create') }}">Add new type</a></p>
        </div>
    </div>
@endsection