@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit Type</h1>

        <div class="white-panel">
			@include('shared.errors')
			
	        <form method="post" action="{{ route('types.update', ['id' => $type->id]) }}">
	        	{!! csrf_field() !!}
	        	<input type="hidden" name="_method" value="PUT" />
	        	<ul class="form">
	        		<li>
	        			<label>Type</label>
	        			<input type="text" name="type" value="{{ (old('type')) ? old('type') : $type->type}}" />
	        		</li>
	        		<li class="submit-area">
	        			<input type="submit" value="Update" class="orange-btn" />
	        		</li>
	        	</ul>
	        </form>
	        <p><a class="orange-btn" href="{{ route('types.index') }}">Back to type list</a></p>
        </div>
    </div>
@endsection