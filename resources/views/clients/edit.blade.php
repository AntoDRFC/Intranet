@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit Client</h1>

        <div class="white-panel">
			@include('shared.errors')
			
	        <form method="post" action="{{ route('clients.update', ['id' => $client->id]) }}">
	        	{!! csrf_field() !!}
	        	<input type="hidden" name="_method" value="PUT" />
	        	<ul class="form">
	        		<li>
	        			<label>Client Name</label>
	        			<input type="text" name="client_name" value="{{ (old('client_name')) ? old('client_name') : $client->client_name}}" />
	        		</li>
	        		<li class="submit-area">
	        			<input type="submit" value="Update" class="orange-btn" />
	        		</li>
	        	</ul>
	        </form>
	        <p><a class="orange-btn" href="{{ route('clients.index') }}">Back to client list</a></p>
        </div>
    </div>
@endsection