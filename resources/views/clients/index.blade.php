@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Clients</h1>

        <div class="white-panel">
			@if(session()->has('status'))
			    <div class="alert"> 
				    {!! session('status') !!}
			    </div>
			@endif
        	<p><a class="orange-btn" href="{{ route('clients.create') }}">Add new client</a></p>
	        <table cellspacing="2">
	        	<thead>
	        		<tr>
	        			<th>Client</th>
	        			<th>View Details</th>
	        			<th>&nbsp;</th>
	        		</tr>
	        	</thead>
	        	<tbody>
		        	@foreach($clients as $client)
			        	<tr>
			        		<td>{{$client->client_name}}</td>
			        		<td><a href="/client/details/{{$client->id}}">Details</a></td>
			        		<td>
				        		<a class="orange-btn" href="{{ route('clients.edit', ['id' => $client->id]) }}">Edit</a>
								<form method="post" action="{{ route('clients.destroy', ['id' => $client->id]) }}">
									{!! csrf_field() !!}
									<input type="hidden" name="_method" value="DELETE" />
									<input type="submit" value="Delete" class="orange-btn" />
								</form>
			        		</td>
			        	</tr>
		        	@endforeach
	        	</tbody>
	        </table>
	        <p><a class="orange-btn" href="{{ route('clients.create') }}">Add new client</a></p>
        </div>
    </div>
@endsection