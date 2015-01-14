@extends('master')

@section('title', 'About')

@section('content')


	<div class="container">
	<div class="col-md-12">
		<a href="#" class="btn btn-lg btn-success pull-right">CREATE AN ALBUM</a>

	</div>
	<h1>Create a gallery and insert image into it.</h1>
	Upload an Image
	{{ Form::model($pictures, ['method' => 'PATCH', 'files' => true , 'route' => ['imagegallery.update',Sentry::getUser()->id]]) }}
    
		<!-- profile image field -->
		<div class="form-group">
			{{ Form::file('galleryimage') }}
		</div>
	{{ Form::close() }}

	</div>


@stop