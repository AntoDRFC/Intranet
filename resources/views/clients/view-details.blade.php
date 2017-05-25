@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Client Details for {{$client->client_name}}</h1>

        <div class="white-panel">
			@if(session()->has('status'))
			    <div class="alert"> 
				    {!! session('status') !!}
			    </div>
			@endif
        	<p><a class="orange-btn" href="{{ route('client-details.create', ['id' => $client->id]) }}">Add new client details</a></p>
	        <table cellspacing="2">
	        	<thead>
	        		<tr>
	        			<th>Type</th>
	        			<th>URL</th>
	        			<th>Description</th>
	        			<th>Username</th>
	        			<th>Password</th>
	        			<th>&nbsp;</th>
	        		</tr>
	        	</thead>
	        	<tbody>
		        	@foreach($details as $detail)
			        	<tr>
			        		<td>{{$detail->type->type}}</td>
			        		<td>{{$detail->url}}</td>
			        		<td>{{$detail->description}}</td>
			        		<td>{{$detail->username}}</td>
			        		<td>{{$detail->password}}</td>
			        		<td>
				        		<a class="orange-btn" href="{{ route('client-details.edit', ['id' => $detail->id]) }}">Edit</a>
								<form method="post" action="{{ route('client-details.destroy', ['id' => $detail->id]) }}">
									{!! csrf_field() !!}
									<input type="hidden" name="_method" value="DELETE" />
									<input type="submit" value="Delete" class="orange-btn" />
								</form>
			        		</td>
			        	</tr>
		        	@endforeach
	        	</tbody>
	        </table>
	        <p><a class="orange-btn" href="{{ route('client-details.create', ['id' => $client->id]) }}">Add new client details</a></p>
	        <p><a class="orange-btn" href="{{ route('clients.index') }}">Back to client list</a></p>
        </div>
    </div>
@endsection