@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Create Type</h1>

        <div class="white-panel">
			@if($errors->any())
			    <div class="alert alert-danger">
			        @foreach($errors->all() as $error)
			            <p>{{ $error }}</p>
			        @endforeach
			    </div>
			@endif
			
	        <form method="post" action="{{ route('types.store') }}">
	        	{!! csrf_field() !!}
	        	<ul class="form">
	        		<li>
	        			<label>Type</label>
	        			<input type="text" name="type" value="" placeholder="Enter type..." />
	        		</li>
	        		<li class="submit-area">
	        			<input type="submit" value="Create" class="orange-btn" />
	        		</li>
	        	</ul>
	        </form>
	        <p><a class="orange-btn" href="{{ route('types.index') }}">Back to type list</a></p>
        </div>
    </div>
@endsection