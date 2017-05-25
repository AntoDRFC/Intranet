@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Create Client</h1>

        <div class="white-panel">
			@if($errors->any())
			    <div class="alert alert-danger">
			        @foreach($errors->all() as $error)
			            <p>{{ $error }}</p>
			        @endforeach
			    </div>
			@endif
			
	        <form method="post" action="{{ route('clients.store') }}">
	        	{!! csrf_field() !!}
	        	<ul class="form">
	        		<li>
	        			<label>Client Name</label>
	        			<input type="text" name="client_name" value="" />
	        		</li>
	        		<li class="submit-area">
	        			<input type="submit" value="Create" class="orange-btn" />
	        		</li>
	        	</ul>
	        </form>
	        <p><a class="orange-btn" href="{{ route('clients.index') }}">Back to client list</a></p>
        </div>
    </div>
@endsection