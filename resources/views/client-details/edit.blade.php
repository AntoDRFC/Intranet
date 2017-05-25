@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit Client Detail Record</h1>

        <div class="white-panel">
			@include('shared.errors')
			
	        <form method="post" action="{{ route('client-details.update', ['id' => $clientDetail->id]) }}">
	        	{!! csrf_field() !!}
	        	<input type="hidden" name="_method" value="PUT" />

	        	<ul class="form">
	        		<li>
		        		<label>Client</label>
		        		<select name="client_id">
		        			<option value="">- Select -</option>
		        			@foreach($clients as $client)
			        			<option value="{{$client->id}}" {{{ ($client->id == $clientDetail->client_id) ? 'selected="selected"' : '' }}}>{{$client->client_name}}</option>
		        			@endforeach;
		        		</select>
	        		</li>
	        		<li>
		        		<label>Type</label>
		        		<select name="type_id">
		        			<option value="">- Select -</option>
		        			@foreach($types as $type)
			        			<option value="{{$type->id}}" {{{ ($type->id == $clientDetail->type_id) ? 'selected="selected"' : '' }}}>{{$type->type}}</option>
		        			@endforeach;
		        		</select>
	        		</li>
	        		<li>
	        			<label>URL</label>
	        			<input type="text" name="url" value="{{ (old('url')) ? old('url') : $clientDetail->url}}" />
	        		</li>
	        		<li>
	        			<label>Description</label>
	        			<input type="text" name="description" value="{{ (old('description')) ? old('description') : $clientDetail->description}}" />
	        		</li>
	        		<li>
	        			<label>Username</label>
	        			<input type="text" name="username" value="{{ (old('username')) ? old('username') : $clientDetail->username}}" />
	        		</li>
	        		<li>
	        			<label>Password</label>
	        			<input type="text" name="password" value="{{ (old('password')) ? old('password') : $clientDetail->password}}" />
	        		</li>
	        		<li class="submit-area">
	        			<input type="submit" value="Update" class="orange-btn" />
	        		</li>
	        	</ul>
	        </form>
	        
	        <p><a class="orange-btn" href="/client/details/{{$clientDetail->client_id}}">Back to client details</a></p>
        </div>
    </div>
@endsection