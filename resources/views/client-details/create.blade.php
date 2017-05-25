@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Create Client Detail Record</h1>

        <div class="white-panel">
			@include('shared.errors')
			
	        <form method="post" action="{{ route('client-details.store') }}">
	        	{!! csrf_field() !!}

	        	@if($id)
		        	<input type="hidden" name="id" value="{{$id}}" />
	        	@endif
	        	<ul class="form">
	        		<li>
		        		<label>Client</label>
		        		<select name="client_id">
		        			<option value="">- Select -</option>
		        			@foreach($clients as $client)
			        			<option value="{{$client->id}}" {{{ ($client->id == $id) ? 'selected="selected"' : '' }}}>{{$client->client_name}}</option>
		        			@endforeach;
		        		</select>
	        		</li>
	        		<li>
		        		<label>Type</label>
		        		<select name="type_id">
		        			<option value="">- Select -</option>
		        			@foreach($types as $type)
			        			<option value="{{$type->id}}">{{$type->type}}</option>
		        			@endforeach;
		        		</select>
	        		</li>
	        		<li>
	        			<label>URL</label>
	        			<input type="text" name="url" value="" />
	        		</li>
	        		<li>
	        			<label>Description</label>
	        			<input type="text" name="description" value="" />
	        		</li>
	        		<li>
	        			<label>Username</label>
	        			<input type="text" name="username" value="" />
	        		</li>
	        		<li>
	        			<label>Password</label>
	        			<input type="text" name="password" value="" />
	        		</li>
	        		<li class="submit-area">
	        			<input type="submit" value="Create" class="orange-btn" />
	        		</li>
	        	</ul>
	        </form>
	        @if($id)
		        <p><a class="orange-btn" href="/client/details/{{$id}}">Back to client details</a></p>
	        @else
		        <p><a class="orange-btn" href="{{ route('clients.index') }}">Back to client list</a></p>
	        @endif
        </div>
    </div>
@endsection